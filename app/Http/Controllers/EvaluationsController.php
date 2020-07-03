<?php

namespace App\Http\Controllers;

use App\Evaluation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
  public function store(Request $request, $id){
    // GETパラメータが数字かチェック
    if(!ctype_digit($id)) {
      return redirect('/mypage')->with('flash_message', __('Invalid operation was performed.'));
    }

    // バリデーション
    $request->validate([
      'five_rank' => 'required|integer',
      'idea_review' => 'required|string|max:1000'
    ]);

    $evaluation = new Evaluation;

    $evaluation->idea_id = $id;
    Auth::user()->evaluations()->save($evaluation->fill($request->all()));


    // リダイレクトする
    // sessionフラッシュにメッセージ格納
    return redirect("/ideas/$id/show/")->with('flash_message', __('Registered'));
  }

  // レビュー更新
  public function update(Request $request, $id){
    // GETパラメータが数字かチェック
    if(!ctype_digit($id)) {
      return redirect('/mypage')->with('flash_message', __('Invalid operation was performed.'));
    }

    // バリデーション
    $request->validate([
      'five_rank' => 'required|integer',
      'idea_review' => 'required|string|max:1000'
    ]);

    // evaluationテーブルの更新
    $evaluation = Auth::user()->evaluations()->where('idea_id', $id)->first();
    $evaluation->fill($request->all())->save();

    // リダイレクトする
    // sessionフラッシュにメッセージ格納
    return redirect("/ideas/$id/show/")->with('flash_message', __('Registered'));
  }

}
