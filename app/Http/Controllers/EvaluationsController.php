<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EvaluationsController extends Controller
{
  // TOP画面表示
  public function index(){
    return view('top');
  }

  // レビュー登録
  public function store(){
    // リダイレクトする
    // sessionフラッシュにメッセージ格納
    return redirect('/ideas/1')->with('flash_message', __('Registered'));
  }

  // レビュー削除 ボタン未設置
  public function delete(){
    // リダイレクトする
    // sessionフラッシュにメッセージ格納
    return redirect('/ideas/1')->with('flash_message', __('Registered'));
  }

  // お気に入りON-OFF
  public function toggleLike(){
    
  }
}
