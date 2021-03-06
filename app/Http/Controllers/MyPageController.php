<?php

namespace App\Http\Controllers;

use App\Idea;
use App\User;
use App\Evaluation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\ProfileRequest;
use Illuminate\Support\Facades\Storage;

class MyPageController extends Controller
{
  // --------------------------------------------
  // マイページ表示
  // --------------------------------------------
  public function index(){

    // ユーザー情報を取得
    $user = Auth::user();

    // ユーザー画像の有無
    if(!empty($user->user_img)){
      $isImage = true;
    }else{
      $isImage = false;
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

    // $user_data = json_encode($user_data);

    // 自分の出品したヒラメキに対する全評価のうち最新５件を取得
    $evaluations = Evaluation::with([
      'user',
      'idea.category',
      'idea.avgFive_rank',
    ])->whereHas('idea', function($query) use ($user) {
      $query->where('user_id', $user->id);
    })->orderBy('created_at', 'desc')->limit(5)->get();

    // $evaluations = json_encode($evaluations);

    return view('mypage.index', compact('user', 'isImage', 'user_data', 'evaluations'));
  }

  // --------------------------------------------
  // プロフィール編集
  // --------------------------------------------
  public function edit(){

    // ユーザー情報を取得
    $user = Auth::user();

    // ユーザー画像の有無
    if(!empty($user->user_img)){
      $isImage = true;
    }else{
      $isImage = false;
    }

    return view('mypage.edit', compact('user', 'isImage'));
  }

  // --------------------------------------------
  // プロフィール編集登録
  // --------------------------------------------
  public function update(ProfileRequest $request){

    // ユーザー画像の選択があったら保存する
    if($request->hasFile('user_img')){
      // ユーザー画像を更新
      if(app()->isLocal()){
        // 開発環境
        $file_name = $request->file('user_img')->getClientOriginalName();
        $request->user_img->storeAs('public/user_images', $file_name);
      }else{
        // 本番環境
        $path = Storage::disk('s3')->put('/', $request->file('user_img'), 'public');
      }
    };
    
    // ユーザー情報を更新
    $user = Auth::user();
    $user->fill([
      'name' => $request->name,
      'email' => $request->email
    ]);
    
    // 新しいPWと確認PWが空ではない場合に変更処理する
    if(!empty($request->new_password) && !empty($request->new_password_confirmation)){
      $user->fill([
        'password' => Hash::make($request->new_password)
      ]);
    }

    // 自己紹介が入力されていた場合に変更する
    if($request->user_introduce){
      $user->fill([
        'user_introduce' => $request->user_introduce,
      ]);
    }
    // ユーザー画像がアップされた場合に変更する
    if($request->hasFile('user_img')){
      if(app()->isLocal()){
        // 開発環境
        $user->fill([
          'user_img' => asset('/storage/user_images/' . $file_name)
        ]);
      }else{
        // 本番環境
        $user->fill([
          'user_img' => Storage::disk('s3')->url($path),
        ]);
      }
    }
    $user->save();

    // リダイレクトする
    // sessionフラッシュにメッセージ格納
    return redirect('/mypage')->with('flash_message', __('Registered'));
  }
  // --------------------------------------------
  // 購入済み一覧表示
  // --------------------------------------------
  public function purchases(){

    // ユーザー情報を取得
    $user = Auth::user();

    // ユーザー画像の有無
    if(!empty($user->user_img)){
      $isImage = true;
    }else{
      $isImage = false;
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

    return view('mypage.purchases', compact('user', 'isImage', 'user_data'));
  }

  // --------------------------------------------
  // 気になる一覧表示
  // --------------------------------------------
  public function likes(){

    // ユーザー情報を取得
    $user = Auth::user();

    // ユーザー画像の有無
    if(!empty($user->user_img)){
      $isImage = true;
    }else{
      $isImage = false;
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

    return view('mypage.likes', compact('user', 'isImage', 'user_data'));
  }

  // --------------------------------------------
  // ヒラメキ出品一覧表示
  // --------------------------------------------
  public function lists(){

    // ユーザー情報を取得
    $user = Auth::user();

    // ユーザー画像の有無
    if(!empty($user->user_img)){
      $isImage = true;
    }else{
      $isImage = false;
    }

    // ヒラメキ出品一覧を取得
    $user_data = User::with([
      'ideas' => function($query) use($user){
        $query->where('user_id', $user->id)
              ->orderBy('created_at', 'desc');
      },
      'ideas.category',
      'ideas.evaluations',
      'ideas.purchases',
      'ideas.avgFive_rank',
    ])->get()->find($user->id);

    $user_data = json_encode($user_data);

    return view('mypage.lists', compact('user', 'isImage', 'user_data'));
  }

  // --------------------------------------------
  // レビュー一覧表示
  // --------------------------------------------
  public function reviews(){

    // ユーザー情報を取得
    $user = Auth::user();

    // ユーザー画像の有無
    if(!empty($user->user_img)){
      $isImage = true;
    }else{
      $isImage = false;
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

    $evaluations = json_encode($evaluations);

    return view('mypage.reviews', compact('user', 'isImage', 'evaluations'));
  }

}
