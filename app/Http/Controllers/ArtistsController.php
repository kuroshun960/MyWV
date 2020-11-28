<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


//S3用に追記//
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Artist;

class ArtistsController extends Controller
{
    
/*--------------------------------------------------------------------------
    アーティスト追加ページ
--------------------------------------------------------------------------*/
    
    public function input()
    {
        return view('artists.artist_input');
    }
    
/*--------------------------------------------------------------------------
    アーティスト画像をS3にアップロードする処理
--------------------------------------------------------------------------*/

public function upload(Request $request)
    {        
        
        
        //名前と説明文のバリデーション
        
        $request->validate([
            'name' => 'required|max:20',
            'description' => 'required|max:255',
        ]);
        
        
        // 画像のアップ形式のバリデーション
        $this->validate($request, [
            'file' => [
                // 必須
                'required',
                // アップロードされたファイルであること
                'file',
                // 画像ファイルであること
                'image',
                // MIMEタイプを指定
                'mimes:jpeg,png',
            ]
        ]);
        

        if ($request->file('file')->isValid([])) {
            
            //バリデーションを正常に通過した時の処理
            //S3へのファイルアップロード処理の時の情報を変数$upload_infoに格納する
            $upload_info = Storage::disk('s3')->putFile('/test', $request->file('file'), 'public');
            
            //S3へのファイルアップロード処理の時の情報が格納された変数を用いてアップロードされた画像へのリンクURLを変数に格納する
            $path = Storage::disk('s3')->url($upload_info);
            
            //現在ログイン中のユーザIDを変数$user_idに格納する
            $user_id = Auth::id();
            
            //モデルクラスのインスタンスを作成し、変数に格納
            $new_artist_data = new Artist();
            
            //このインスタンスを、”ログインユーザーが作成したインスタンス”として結びつける。
            $new_artist_data->user_id = $user_id;
            
            /*
            プロパティ(静的メソッド)に
            1.変数$pathに格納されている内容、
            2.$requestのnameの値
            3.$requestのdescriptionの値　を格納する
            */
            $new_artist_data->path = $path;
            $new_artist_data->name = $request->name;
            $new_artist_data->description = $request->description;
            $new_artist_data->style = $request->style;
            $new_artist_data->officialHp = $request->officialHp;
            $new_artist_data->twitter = $request->twitter;
            $new_artist_data->insta = $request->insta;
            
            //インスタンスの内容をDBのテーブルに保存する
            $new_artist_data->save();
            

            /* 認証済みユーザ（閲覧者）の投稿として作成（リクエストされた値をもとに作成）
            $request->user()->artist()->create([
            'name' => $request->name,
            'description' => $request->description,
            'path' => $path->path,
            ]);
            */

            return redirect('/');
            
        }else{
            //バリデーションではじかれた時の処理
            return redirect('/upload/image');
        }
        
        
    }
    
    
    
/*--------------------------------------------------------------------------
    アーティスト画像をページに表示するアクション
--------------------------------------------------------------------------*/
    
    
    public function output()
    {
        //現在ログイン中のユーザIDを変数$user_idに格納する
        $user_id = Auth::id();
        
        //artistテーブルからuser_idカラムが変数$user_idと一致するレコード情報を取得し変数$artistsに格納する
        //artistテーブルからuser_idカラムが変数$user_idと一致するレコード情報を取得し変数$artistsに格納する
        
        $artists = Artist::whereUser_id($user_id)->get();
        return view('welcome', ['artists' => $artists]);
    }
    
    
/*--------------------------------------------------------------------------
    アーティスト詳細情報を表示するアクション
--------------------------------------------------------------------------*/
    
    public function show($id)
    {
        
        // idの値でアーティストを検索して取得
        $artist = Artist::findOrFail($id);

        $artistTags = $artist->tags()->take(8)->get();
        
        // アーティスト詳細ビューでそれを表示
        return view('artists.artist_show', [
            'artist' => $artist,
            'artistTags' => $artistTags,
        ]);
        
        
        
        /*
        $artistTag1 = $artist->tags()->findOrFail(1);
        $artistTag2 = $artist->tags()->findOrFail(2);
        $artistTag3 = $artist->tags()->findOrFail(3);
        $artistTag4 = $artist->tags()->findOrFail(4);
        $artistTag5 = $artist->tags()->findOrFail(5);
        
        $artistTags = [
            $artistTag1,
            $artistTag2,
            $artistTag3,
            $artistTag4,
            $artistTag5,
            ];
        
        
        return view('artists.artist_show', [
        
            'artistTags' => $artistTags,
            
        ]);
        */
        
        
    }
    













}