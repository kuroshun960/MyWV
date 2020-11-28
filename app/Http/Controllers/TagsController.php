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
    

    
    

}
