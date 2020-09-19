<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

class UsersController extends Controller
{
     public function show($id)
    {
        // idの値でユーザを検索して取得
        $user = User::findOrFail($id);
        
        // 関係するモデルの件数をロード
        $user->loadRelationshipCounts();

        // ユーザの投稿一覧を作成日時の降順で取得
        $items = $user->items()->orderBy('created_at', 'desc')->get();

        // ユーザ詳細ビューでそれを表示
        return view('users.show', [
            'user' => $user,
            'items' => $items,
        ]);
    }
}
