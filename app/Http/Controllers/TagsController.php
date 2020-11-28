<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Artist;
use App\Tag;

class TagsController extends Controller
{

/*--------------------------------------------------------------------------
    タグ追加ページ
--------------------------------------------------------------------------*/
    
    public function input($id)
    {
        
        //受け取ったid情報を変数に格納して、タグ生成ページへ又貸し。
        $artistId = Artist::findOrFail($id);
        
        $artistTags = Artist::findOrFail($id)->tags()->get();
        
        return view('tags.tag_input',[
            'artistId' => $artistId,
            'artistTags' => $artistTags,
            ]);
        
    }


/*--------------------------------------------------------------------------
    タグをアーティストに登録する処理
--------------------------------------------------------------------------*/

    public function create(Request $request, $id)
    {        

        //modelフォームから送られてきたidで目的のアーティストを取得
        $artist = Artist::findOrFail($id);
        
        //※デバッグ用 アーティスト所有してるタグを全て取得
        $artistTag = $artist->tags()->get();
        
        //※デバッグ用 アーティスト所有してるタグを全て取得
        $artist->tags()->create([
            'name' => $request->name,
        ]);


        // 投稿後リダイレクト
        return redirect('artist/'.$id);
        
    }
    
    
/*--------------------------------------------------------------------------
    タグをアーティスト詳細ページに表示する処理
--------------------------------------------------------------------------*/
    

    public function show($id)
    {        


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

        // 投稿後リダイレクト
        return redirect('artist/'.$id);
        
    }

        







    
    

}
