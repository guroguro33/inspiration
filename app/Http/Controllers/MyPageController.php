<?php

namespace App\Http\Controllers;

use App\Idea;
use App\User;
use App\Evaluation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ProfileRequest;
use Illuminate\Support\Facades\Storage;

class MyPageController extends Controller
{
  // マイページ表示
  public function index(){

    // ユーザー情報を取得
    $user = Auth::user();
    // dd($user->toArray());

    // ユーザー画像の有無
    $isImage = false;
    // dd($user->toArray());
    if(Storage::disk('local')->exists('public/user_images/' . $user->user_img)){
      $isImage = true;
    }

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
      'likes.idea.avgFive_rank',
      
      // 購入したヒラメキを最新５件取得
      'purchases' => function($query) use($user) {
        $query->where('user_id', $user->id)
              ->orderBy('created_at', 'desc')
              ->limit(5);
      },
      'purchases.idea.category',
      'purchases.idea.evaluations',
      'purchases.idea.avgFive_rank',

      // 出品したヒラメキを最新５件取得
      'ideas' => function($query) use($user) {
        $query->where('user_id', $user->id)
              ->orderBy('created_at', 'desc')
              ->limit(5);
      },
      'ideas.evaluations',
      'ideas.category',
      'ideas.avgFive_rank',
    ])->get()->find($user->id);

    // 自分の出品したヒラメキに対する全評価のうち最新５件を取得
    $evaluations = Evaluation::with([
      'user',
      'idea.category',
      'idea.avgFive_rank',
    ])->whereHas('idea', function($query) use ($user) {
      $query->where('user_id', $user->id);
    })->orderBy('created_at', 'desc')->limit(5)->get();


    // dd($user_data->toArray());
    // dd($evaluations->toArray());

    return view('mypage.index', compact('user', 'isImage', 'user_data', 'evaluations'));
  }

  // プロフィール編集
  public function edit(){

    // ユーザー情報を取得
    $user = Auth::user();

    // ユーザー画像の有無
    $isImage = false;
    // dd($user->toArray());
    if(Storage::disk('local')->exists('public/user_images/' . $user->user_img)){
      $isImage = true;
    }

    return view('mypage.edit', compact('user', 'isImage'));
  }

  // プロフィール編集登録
  public function update(ProfileRequest $request){

    
    // ユーザー画像を更新
    $file_name = $request->file('user_img')->getClientOriginalName();
    // dd($file_name);
    $request->user_img->storeAs('public/user_images', $file_name);
    
    // ユーザー情報を更新
    // Auth::user()->fill($request->all())->save();
    $user = Auth::user();
    $user->name = $request->name;
    $user->user_introduce = $request->user_introduce;
    $user->user_img = $file_name;
    $user->email = $request->email;
    $user->save();

    // リダイレクトする
    // sessionフラッシュにメッセージ格納
    return redirect('/mypage')->with('flash_message', __('Registered'));
  }

  // 購入済み一覧表示
  public function purchases(){

    // ユーザー情報を取得
    $user = Auth::user();

    // ユーザー画像の有無
    $isImage = false;
    // dd($user->toArray());
    if(Storage::disk('local')->exists('public/user_images/' . $user->user_img)){
      $isImage = true;
    }

    // 購入済みリストを取得
    $user_data = User::with([
      'purchases' => function($query) use($user){
        $query->where('user_id', $user->id)
              ->orderBy('created_at', 'desc');
      },
      'purchases.idea.category',
      'purchases.idea.evaluations',
      'purchases.idea.avgFive_rank',
    ])->get()->find($user->id);

    $user_data = json_encode($user_data);
    // dd($user_data);

    return view('mypage.purchases', compact('user', 'isImage', 'user_data'));
  }

  // 気になる一覧表示
  public function likes(){

    // ユーザー情報を取得
    $user = Auth::user();

    // ユーザー画像の有無
    $isImage = false;
    // dd($user->toArray());
    if(Storage::disk('local')->exists('public/user_images/' . $user->user_img)){
      $isImage = true;
    }

    // 気になるリストを取得
    $user_data = User::with([
      'likes' => function($query) use($user) {
        $query->where('user_id', $user->id)
              ->orderBy('created_at', 'desc');
      },
      'likes.idea.category',
      'likes.idea.evaluations',
      'likes.idea.avgFive_rank',
    ])->get()->find($user->id);
    
    $user_data = json_encode($user_data);
    // dd($user_data->toArray());  

    return view('mypage.likes', compact('user', 'isImage', 'user_data'));
  }

  // ヒラメキ出品一覧表示
  public function lists(){

    // ユーザー情報を取得
    $user = Auth::user();

    // ユーザー画像の有無
    $isImage = false;
    // dd($user->toArray());
    if(Storage::disk('local')->exists('public/user_images/' . $user->user_img)){
      $isImage = true;
    }

    // ヒラメキ出品一覧を取得
    $user_data = User::with([
      'ideas' => function($query) use($user){
        $query->where('user_id', $user->id)
              ->orderBy('created_at', 'desc');
      },
      'ideas.category',
      'ideas.evaluations',
      'ideas.avgFive_rank',
    ])->get()->find($user->id);

    $user_data = json_encode($user_data);
    // dd($user_data->toArray());

    return view('mypage.lists', compact('user', 'isImage', 'user_data'));
  }

  // レビュー一覧表示
  public function reviews(){

    // ユーザー情報を取得
    $user = Auth::user();

    // ユーザー画像の有無
    $isImage = false;
    // dd($user->toArray());
    if(Storage::disk('local')->exists('public/user_images/' . $user->user_img)){
      $isImage = true;
    }

    // レビュー一覧を取得
    $evaluations = Evaluation::with([
      'user',
      'idea.category',
      'idea.evaluations',
      'idea.avgFive_rank',
    ])->whereHas('idea', function($query) use ($user) {
      $query->where('user_id', $user->id);
    })->orderBy('created_at', 'desc')->get();

    $user_data = json_encode($evaluations);
    // dd($evaluations->toArray());

    return view('mypage.reviews', compact('user', 'isImage', 'evaluations'));
  }

}
