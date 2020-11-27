<?php

//S3用に追記//
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

    Route::get('/', function () {
        return view('welcome');
    });


/*--------------------------------------------------------------------------
    ユーザ登録
--------------------------------------------------------------------------*/
    
        // ユーザ登録ページ表示
        Route::get('signup', 'Auth\RegisterController@showRegistrationForm')->name('signup.get');
        // ユーザ登録ページから送られたリクエストの作成処理(create ≒ post ≒ store)
        Route::post('signup', 'Auth\RegisterController@register')->name('signup.post');
        
/*--------------------------------------------------------------------------
    認証
--------------------------------------------------------------------------*/
        
        // ログインページ表示
        Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
        // ログイン処理
        Route::post('login', 'Auth\LoginController@login')->name('login.post');
        // ログアウトボタン
        Route::get('logout', 'Auth\LoginController@logout')->name('logout.get');
        
/*-----------------------------------------------------------------------------------------
    ユーザー関連ページ(index:ユーザー一覧 show:ユーザー詳細のみ作成できる)に
    アクセスするには認証を必要とする
    ※将来的にユーザー削除機能もつける場合はdestroyを追加する
-----------------------------------------------------------------------------------------*/

        // 認証付きルート
        Route::group(['middleware' => ['auth']], function () {
            Route::resource('users', 'UsersController', ['only' => ['index', 'show']]);
        });
        
        
/*-----------------------------------------------------------------------------------------
    アーティスト登録機能
-----------------------------------------------------------------------------------------*/

    //下記を追記
    //画像ファイルをアップロードするボタンを設置するページへのルーティング
    Route::get('/upload/image', 'ImageController@input')->name('image.get');
    //画像ファイルをアップロードする処理のルーティング
    Route::post('/upload/image', 'ImageController@upload');
    //アップロードした画像ファイルを表示するページのルーティング
    Route::get('/', 'ImageController@output');