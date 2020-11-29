<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//ここでは、Userモデルのモデル操作をするので、あらかじめ名前空間をUserに設定しておく
use App\User;

class UsersController extends Controller
{
    
    public function index()
    {
        // ユーザ一覧をidの降順で取得
        $users = User::orderBy('id', 'desc')->paginate(10);

        // ユーザ一覧ビューでそれを表示
        return view('users.index', [
            'users' => $users,
        ]);
    }
    
    
    public function show($id)
    {
        
        // idの値でユーザを検索して取得
        $user = User::findOrFail($id);
        
        $user->loadRelationshipCounts();
        
        $userArtists = $user->artist()->get();

        // ユーザ詳細ビューでそれを表示
        return view('users.usershow', [
            'user' => $user,
            'userArtists' => $userArtists,
        ]);
    }
    
    
    public function followings($id)
    {
        // idの値でユーザを検索して取得
        $usernumber = User::findOrFail($id);

        // 関係するモデルの件数をロード(数をフォロー数を数字で表示)
        $usernumber->loadRelationshipCounts();

        // ユーザのフォロー一覧を取得
        $followingsUsers = $usernumber->followings()->paginate(10);

        // フォロー一覧ビューでそれらを表示
        return view('users.user_followings', [
            'usernumber' => $usernumber,
            'followingsUsers' => $followingsUsers,
        ]);
        
        
    }
    
    public function followers($id)
    {
        // idの値でユーザを検索して取得
        $user = User::findOrFail($id);

        // 関係するモデルの件数をロード
        $user->loadRelationshipCounts();

        // ユーザのフォロワー一覧を取得
        $followers = $user->followers()->paginate(10);

        // フォロワー一覧ビューでそれらを表示
        return view('users.followers', [
            'user' => $user,
            'users' => $followers,
        ]);
    }
    
    
    
  
    
}
