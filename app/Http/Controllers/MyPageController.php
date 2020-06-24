<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MyPageController extends Controller
{
  // マイページ表示
  public function index(){
    return view('mypage.index');
  }

  // プロフィール編集
  public function edit(){
    return view('mypage.edit');
  }

  // プロフィール編集登録
  public function update(){
    // リダイレクトする
    // sessionフラッシュにメッセージ格納
    return redirect('/mypage')->with('flash_message', __('Registered'));
  }

  // 購入済み一覧表示
  public function purchases(){
    return view('mypage.purchases');
  }

  // 気になる一覧表示
  public function likes(){
    return view('mypage.likes');
  }

  // ヒラメキ出品一覧表示
  public function lists(){
    return view('mypage.lists');
  }

  // レビュー一覧表示
  public function reviews(){
    return view('mypage.reviews');
  }

}
