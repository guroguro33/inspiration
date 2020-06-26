<?php

namespace App\Http\Controllers;

use App\Idea;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Requests\IdeaRequest;
use Illuminate\Support\Facades\Auth;

class IdeasController extends Controller
{
  // ヒラメキ一覧表示
  public function index(){
    return view('ideas.index');
  }

  // ヒラメキ出品画面表示
  public function create(){

    // ユーザー情報を取得
    $user = Auth::user();
    // カテゴリ情報を取得
    $categories = Category::all();
    // dd($categories);
    
    return view('ideas.create', compact('user', 'categories'));
  }

  // ヒラメキ出品登録
  public function store(IdeaRequest $request){

    // インスタンス生成
    $idea = new Idea;

    // user_idを含めてDBへ登録
    Auth::user()->ideas()->save($idea->fill($request->all()));

    // リダイレクトする
    // sessionフラッシュにメッセージ格納
    return redirect('/mypage')->with('flash_message', __('Registered'));
  }

  // ヒラメキ編集画面表示
  public function edit($id){
    // GETパラメータが数字かチェック
    if(!ctype_digit($id)) {
      return redirect('/mypage')->with('flash_message', __('Invalid operation was performed.'));
    }

    // ユーザー情報を取得
    $user = Auth::user();
    // カテゴリ情報を取得
    $categories = Category::all();
    // ヒラメキ詳細情を取得
    $idea = Idea::find($id);

    // dd($idea->toArray());
    
    return view('ideas.edit', compact('user', 'categories', 'idea'));
  }

  // ヒラメキ編集登録
  public function update(IdeaRequest $request, $id){
    // GETパラメータが数字かチェック
    if(!ctype_digit($id)) {
      return redirect('/mypage')->with('flash_message', __('Invalid operation was performed.'));
    }

    // ideasテーブルのデータ更新
    $idea = Idea::find($id);
    $idea->fill($request->all())->save();

    // リダイレクトする
    // sessionフラッシュにメッセージ格納
    return redirect('/mypage')->with('flash_message', __('Registered'));
  }

  // ヒラメキ削除
  public function delete($id){
    // GETパラメータが数字かチェック
    if(!ctype_digit($id)) {
      return redirect('/mypage')->with('flash_message', __('Invalid operation was performed.'));
    }

    // 自分が出品したものだった場合、論理削除する（リファクタリングの余地がある）
    if(empty(Auth::user()->ideas()->find($id))){
      return redirect('/mypage')->with('flash_message', __('Invalid operation was performed.'));
    } else {
      Auth::user()->ideas()->find($id)->delete();
    }

    // リダイレクトする
    // sessionフラッシュにメッセージ格納
    return redirect('/mypage')->with('flash_message', __('Deleted.'));
  }

  // ヒラメキ詳細画面表示
  public function show($id){
    // GETパラメータが数字かチェック
    if(!ctype_digit($id)) {
      return redirect('/mypage')->with('flash_message', __('Invalid operation was performed.'));
    }


    return view('ideas.show');}

}
