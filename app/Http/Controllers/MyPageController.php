<?php

namespace App\Http\Controllers;

use App\Idea;
use App\User;
use App\Evaluation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MyPageController extends Controller
{
  // マイページ表示
  public function index(){

    // ユーザー情報を取得
    $user = Auth::user();
    // dd($user->toArray());

    // お気に入りと出品リスト情報を取得
    $user_data = User::with([
      // お気に入りを最新５件取得
      'likes' => function($query) use($user) {
        $query->where('user_id', $user->id)
              ->orderBy('created_at', 'desc')
              ->limit(5);
      },
      'likes.idea.category',
      'likes.idea.evaluations',
      
      // 購入したヒラメキを最新５件取得
      'purchases' => function($query) use($user) {
        $query->where('user_id', $user->id)
              ->orderBy('created_at', 'desc')
              ->limit(5);
      },
      'purchases.idea.category',
      'purchases.idea.evaluations',

      // 出品したヒラメキを最新５件取得
      'ideas' => function($query) use($user) {
        $query->where('user_id', $user->id)
              ->orderBy('created_at', 'desc')
              ->limit(5);
      },
      'ideas.evaluations',
      'ideas.category',
    ])->get()->find($user->id);

    // 出品したヒラメキの最新５件に対する評価点の平均を算出

    // global $sum; 
    // foreach($user_data->ideas as $idea){
    //   // 評価の全件数
    //   $total_evaluation = (count($idea->evaluations))? count($idea->evaluations) : 1;
       
    //   foreach($idea->evaluations as $evaluation){
    //     // 評価点数の合計
    //     $sum .=  $evaluation->five_rank;
    //   }
    //   // 評価の平均点を算出
    //   $ave = $sum / $total_evaluation; 

    // $ave = $user_data->selectRaw('ave(five_rank) as vale, ideas')->groupBy('ideas');


    // 自分の出品したヒラメキに対する全評価のうち最新５件を取得
    $idea = Idea::all();
    $evaluations = Evaluation::with([
      'user',
      'idea.category'
    ])->whereHas('idea', function($query) use ($user) {
      $query->where('user_id', $user->id);
    })->orderBy('created_at', 'desc')->limit(5)->get();


    // dd($user_data->toArray());
    // dd($ave);

    return view('mypage.index', compact('user', 'user_data', 'evaluations'));
  }

  // プロフィール編集
  public function edit(){

    // ユーザー情報を取得
    $user = Auth::user();

    return view('mypage.edit', compact('user'));
  }

  // プロフィール編集登録
  public function update(){

    // ユーザー情報を取得
    $user = Auth::user();

    // リダイレクトする
    // sessionフラッシュにメッセージ格納
    return redirect('/mypage')->with('flash_message', __('Registered'));
  }

  // 購入済み一覧表示
  public function purchases(){

    // ユーザー情報を取得
    $user = Auth::user();

    return view('mypage.purchases', compact('user'));
  }

  // 気になる一覧表示
  public function likes(){

    // ユーザー情報を取得
    $user = Auth::user();

    return view('mypage.likes', compact('user'));
  }

  // ヒラメキ出品一覧表示
  public function lists(){

    // ユーザー情報を取得
    $user = Auth::user();

    return view('mypage.lists', compact('user'));
  }

  // レビュー一覧表示
  public function reviews(){

    // ユーザー情報を取得
    $user = Auth::user();

    return view('mypage.reviews', compact('user'));
  }

}
