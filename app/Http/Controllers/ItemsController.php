<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Item;

class ItemsController extends Controller
{
    public function index()
    {
        $data = [];
        if (\Auth::check()) { // 認証済みの場合
            // 認証済みユーザを取得
            $user = \Auth::user();
            // ユーザの投稿の一覧を作成日時の降順で取得
            $items = $user->items()->orderBy('created_at', 'desc')->get();

            $data = [
                'user' => $user,
                'items' => $items,
            ];
 
        }
           return view('welcome', $data);
    }
    
    public function search($id)
    {
        
        // 認証済みユーザを取得
        $user = \Auth::user();
        
        if($id != 0) {
        
        //where文で$idで、category_idを絞り込む
        $items = $user->items()->where('category_id', $id)->orderBy('created_at', 'desc')->get();
        
        }
        
        else {
        
        // ユーザの投稿の一覧を作成日時の降順で取得
        $items = $user->items()->orderBy('created_at', 'desc')->get();

        }
        
        $data = [
            'user' => $user,
            'items' => $items,
        ];
       return view('welcome', $data);
    }
    
    
    // 新規作成フォーム
    public function create()
    {
        $item = new Item;

        // メッセージ作成ビューを表示
        return view('itemlist.create', [
            'item' => $item,
        ]);
    }
    
    // 新規作成登録処理
    public function store(Request $request)
    {
         $request->validate([
            'category_id' => 'required', 
        ]);
        
        
        
        // メッセージを作成
        $item = new Item;
        $item->user_id = $request->user()->id;
        $item->category_id = $request->category_id;
        $item->note = $request->note;
        $item->save();
        
        
        // トップページへリダイレクトさせる
        return redirect('/');
    }
    
    // S3で画像の登録、保存
    public function upload(Request $request)
    {
        $file = $request->file('file');
        // 第一引数はディレクトリの指定
        // 第二引数はファイル
        // 第三引数はpublickを指定することで、URLによるアクセスが可能となる
        $path = Storage::disk('s3')->putFile('/', $file, 'public');
        // hogeディレクトリにアップロード
        // $path = Storage::disk('s3')->putFile('/hoge', $file, 'public');
        // ファイル名を指定する場合はputFileAsを利用する
        // $path = Storage::disk('s3')->putFileAs('/', $file, 'hoge.jpg', 'public');
        return redirect('/');
    }
    
    public function disp()
    {
        $path = Storage::disk('s3')->url('hoge.jpg');
        return view('itemlist.create', compact('path'));
    }
    
    // 編集
    public function edit($id)
    {
        // idの値でメッセージを検索して取得
        $item = Item::findOrFail($id);

        // メッセージ編集ビューでそれを表示
        return view('itemlist.edit', [
            'item' => $item,
        ]);
    }
    
    // 編集を更新
    public function update(Request $request, $id)
    {
         $request->validate([
            'category_id' => 'required', 
        ]);
        
        // idの値でメッセージを検索して取得
        $item = Item::findOrFail($id);
        // メッセージを更新
        $item->user_id = $request->user()->id;
        $item->category_id = $request->category_id;
        $item->note = $request->note;
        $item->save();

        // トップページへリダイレクトさせる
        return redirect('/');
    }
    
    // 削除
    public function destroy($id)
    {
        // idの値で投稿を検索して取得
        $item = \App\Item::findOrFail($id);

        // 認証済みユーザ（閲覧者）がその投稿の所有者である場合は、投稿を削除
        if (\Auth::id() === $item->user_id) {
            $item->delete();
        }
        
        // 前のURLへリダイレクトさせる
        return back();
    }
}
