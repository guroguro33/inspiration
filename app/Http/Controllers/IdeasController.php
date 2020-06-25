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
  public function edit(){

    // ユーザー情報を取得
    $user = Auth::user();
    
    return view('ideas.edit', compact('user'));
  }

  // ヒラメキ編集登録
  public function update(){
    // リダイレクトする
    // sessionフラッシュにメッセージ格納
    return redirect('/mypage')->with('flash_message', __('Registered'));
  }

  // ヒラメキ削除
  public function delete(){
    // リダイレクトする
    // sessionフラッシュにメッセージ格納
    return redirect('/mypage')->with('flash_message', __('Registered'));
  }

  // ヒラメキ詳細画面表示
  public function show(){
    return view('ideas.show');}

}
