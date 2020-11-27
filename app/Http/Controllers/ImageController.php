<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


//S3用に追記//
use Illuminate\Support\Facades\Storage;


class ImageController extends Controller
{
    
/*--------------------------------------------------------------------------
    アーティスト追加ページ
--------------------------------------------------------------------------*/
    
    public function input()
    {
        return view('images.input');
    }
    
/*--------------------------------------------------------------------------
    アーティスト画像をS3にアップロードする処理
--------------------------------------------------------------------------*/

    public function upload(Request $request)
    {        
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

        // ファイルが有効かどうかを判定
        if ($request->file('file')->isValid([])) {

            Storage::disk('s3')->putFile('/test', $request->file('file'), 'public');
            return redirect('/');
        }else{
            
        // 不正な場合は、エラーメッセージと共に、ページを再読み込み
            return redirect('/upload/image');
        }
    }
    //上記までを追記
}
