<?php

namespace App\Http\Controllers;

use App\Evaluation;
use Illuminate\Http\Request;

class EvaluationsController extends Controller
{
  // TOP画面表示（レビューのうち高評価なものを５つ取得して表示）
  public function index(){

    $evaluations = Evaluation::with([
      'user'
    ])->orderByRaw('five_rank desc , created_at desc')->limit(5)->get();

    // dd($evaluations->toArray());

    return view('top', compact('evaluations'));
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

  // お気に入り着脱
  public function toggleLike(){
    
  }
}
