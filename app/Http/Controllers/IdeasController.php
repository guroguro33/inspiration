<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IdeasController extends Controller
{
  // ヒラメキ一覧表示
  public function index(){
    return view('ideas.index');
  }

  // ヒラメキ出品画面表示
  public function create(){
    return view('ideas.create');
  }

  // ヒラメキ出品登録
  public function store(){
    // リダイレクトする
    // sessionフラッシュにメッセージ格納
    return redirect('/mypage')->with('flash_message', __('Registered'));
  }

  // ヒラメキ編集画面表示
  public function edit(){
    return view('ideas.edit');}

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
