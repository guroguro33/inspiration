<?php

namespace App\Http\Controllers;

use App\Idea;
use App\Evaluation;
use Illuminate\Http\Request;
use App\Mail\EvaluationReport;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\EvaluationRequest;

class EvaluationsController extends Controller
{
  // --------------------------------------------
  // TOP画面表示（レビューのうち高評価なものを５つ取得して表示）
  // --------------------------------------------
  public function index(){
    // ログイン済みの場合、マイページへリダイレクトする
    if(Auth::check()){
      return redirect("/mypage");
    }

    // 高評価なレビューを５つ取得
    $evaluations = Evaluation::with([
      'user'
    ])->orderByRaw('five_rank desc , created_at desc')->limit(5)->get();

    return view('top', compact('evaluations'));
  }

  // --------------------------------------------
  // レビュー登録
  // --------------------------------------------
  public function store(EvaluationRequest $request, $id){
    // GETパラメータが数字か、また存在する商品かチェック
    if(!ctype_digit($id) || empty(Idea::find($id))) {
      return redirect('/mypage')->with('flash_message', __('Invalid operation was performed.'));
    }

    // レビューをevaluationテーブルへ登録
    $evaluation = new Evaluation;

    $evaluation->idea_id = $id;
    Auth::user()->evaluations()->save($evaluation->fill($request->all()));

    // 登録後、出品者へメール送信する
    $user = Idea::find($id)->user;
    Mail::to($user->email)->send(new EvaluationReport($user, $evaluation, $isFirstReview = true));

    // リダイレクトする
    // sessionフラッシュにメッセージ格納
    return redirect("/ideas/$id/show/")->with('flash_message', __('Registered'));
  }

  // --------------------------------------------
  // レビュー更新
  // --------------------------------------------
  public function update(EvaluationRequest $request, $id){
    // GETパラメータが数字か、また存在する商品かチェック
    if(!ctype_digit($id) || empty(Idea::find($id))) {
      return redirect('/mypage')->with('flash_message', __('Invalid operation was performed.'));
    }

    // evaluationテーブルの更新
    $evaluation = Auth::user()->evaluations()->where('idea_id', $id)->first();
    $evaluation->fill($request->all())->save();

    // 更新後、出品者へメール送信する
    $user = Idea::find($id)->user;
    Mail::to($user->email)->send(new EvaluationReport($user, $evaluation, $isFirstReview = false));

    // リダイレクトする
    // sessionフラッシュにメッセージ格納
    return redirect("/ideas/$id/show/")->with('flash_message', __('Registered'));
  }

}
