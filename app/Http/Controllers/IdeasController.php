<?php

namespace App\Http\Controllers;

use App\Idea;
use App\Like;
use App\Category;
use App\Purchase;
use Illuminate\Http\Request;
use App\Http\Requests\IdeaRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class IdeasController extends Controller
{
  // ヒラメキ一覧表示
  public function index(Request $request){

    // カテゴリ情報を取得
    $categories = Category::all();
    // dd($categories);

    $query = Idea::query();

    // 検索フォームに入力があったら絞り込み
    if($request->input()){

      // カテゴリーの選択があった場合
      if(!empty($request->category)){
        $query->where('category_id', $request->category);
      }
      // 価格(低)の入力があった場合
      if(!empty($request->low)){
        $query->where('idea_price', '>', $request->low);
      }
      // 価格(高)の選択があった場合
      if(!empty($request->high)){
        $query->where('idea_price', '<', $request->high);
      }
      // 出品日付の選択があった場合
      if(!empty($request->day)){
        if($request->day === '1'){
          $query->orderBy('created_at', 'desc');
        }else{
          $query->orderBy('created_at', 'asc');
        }
      }
      // 星の数の選択があった場合
      // if(!empty($request->star)){
      //   if($request->star === '1'){
      //     $query->orderBy('average', 'desc');
      //   }else{
      //     $query->orderBy('avg-five_rank', 'asc');
      //   }
      // }

      dd($query);
    }

    // 表示するヒラメキ取得
    $ideas = $query->with([
      'user',
      'category',
      'evaluations',
      'avgFive_rank' 
      // =>function($query) {
      //   if(!empty($request->star) && $request->star === '1'){
      //     $query->orderBy('average', 'desc');
      //   } elseif(!empty($request->star) && $request->star === '2'){
      //     $query->orderBy('average', 'asc');
      //   }
      // }
    ])->paginate(10)->appends($request->all());
    // dd($ideas->toArray());

    // 絞り込み条件を再表示するため、取得
    $inputData = $request->all();

    return view('ideas.index', compact('categories', 'ideas', 'inputData'));
  }

  // ヒラメキ出品画面表示
  public function create(){

    // ユーザー情報を取得
    $user = Auth::user();

    // カテゴリ情報を取得
    $categories = Category::all();
    
    // ユーザー画像の有無
    $isImage = false;
    // dd($user->toArray());
    if(Storage::disk('local')->exists('public/user_images/' . $user->user_img)){
      $isImage = true;
    }
    
    return view('ideas.create', compact('user', 'categories', 'isImage'));
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
  public function edit($id){
    // GETパラメータが数字かチェック
    if(!ctype_digit($id)) {
      return redirect('/mypage')->with('flash_message', __('Invalid operation was performed.'));
    }

    // ユーザー情報を取得
    $user = Auth::user();
    
    // カテゴリ情報を取得
    $categories = Category::all();
    
    // ユーザー画像の有無
    $isImage = false;
    if(Storage::disk('local')->exists('public/user_images/' . $user->user_img)){
      $isImage = true;
    }

    // ヒラメキ詳細情を取得
    $idea = Idea::find($id);

    // dd($idea->toArray());
    
    return view('ideas.edit', compact('user', 'isImage', 'categories', 'idea'));
  }

  // ヒラメキ編集登録
  public function update(IdeaRequest $request, $id){
    // GETパラメータが数字かチェック
    if(!ctype_digit($id)) {
      return redirect('/mypage')->with('flash_message', __('Invalid operation was performed.'));
    }

    // ideasテーブルのデータ更新
    $idea = Idea::find($id);
    $idea->fill($request->all())->save();

    // リダイレクトする
    // sessionフラッシュにメッセージ格納
    return redirect('/mypage')->with('flash_message', __('Registered'));
  }

  // ヒラメキ削除
  public function delete($id){
    // GETパラメータが数字かチェック
    if(!ctype_digit($id)) {
      return redirect('/mypage')->with('flash_message', __('Invalid operation was performed.'));
    }

    // 自分が出品したものだった場合、論理削除する（リファクタリングの余地がある）
    if(empty(Auth::user()->ideas()->find($id))){
      return redirect('/mypage')->with('flash_message', __('Invalid operation was performed.'));
    } else {
      Auth::user()->ideas()->find($id)->delete();
    }

    // リダイレクトする
    // sessionフラッシュにメッセージ格納
    return redirect('/mypage')->with('flash_message', __('Deleted.'));
  }

  // ヒラメキ詳細画面表示
  public function show($id){
    // GETパラメータが数字かチェック
    if(!ctype_digit($id)) {
      return redirect('/mypage')->with('flash_message', __('Invalid operation was performed.'));
    }

    // ヒラメキ情報を取得
    $idea = Idea::with([
      'category',
      'user',
      'evaluations' => function($query){
        $query->orderBy('created_at', 'desc');
      }, 
      'evaluations.user',
      'avgFive_rank',
    ])->get()->find($id);
    
    // ログイン済みの場合、自分のお気に入りリストと購入済みか、レビュー済みかを取得
    if(Auth::check()){
      // ログイン状態
      $isLogin = json_encode(true);

      // ログインしているユーザー情報取得
      $user = Auth::user();

      // お気に入りリスト
      $likeLists = $user->likes()->pluck('idea_id');
      $likeLists = json_encode($likeLists);
      
      // 購入済みかどうか
      if($user->purchases()->where('idea_id', $id)->first()){
        $isBought = true;
        // レビューデータを取得
        $review = $user->evaluations()->where('idea_id', $id)->first();
      }else{
        $isBought = false;
        // レビューデータが未定義にならないようnullを代入
        $review = null;
      };

      // jsonに変換
      $isBought = json_encode($isBought);
      
      // dd($review);

    } else {
      // ログイン状態
      $isLogin = json_encode(false);

      // 未ログインの時、未定義にならないように0を代入
      $likeLists = json_encode(array());
      $isBought = json_encode(false);
      $review = null;
      // dd($likeLists);
      
    }
      // dd($idea->toArray());
    return view('ideas.show', compact('isLogin', 'idea', 'likeLists', 'isBought', 'review'));
    
  }

  // ヒラメキを購入する
  public function buy($id){
    // GETパラメータが数字かチェック
    if(!ctype_digit($id)) {
      return redirect('/mypage')->with('flash_message', __('Invalid operation was performed.'));
    }

    // ログインしているユーザー情報取得
    $user = Auth::user();

    // 購入済みではないことを確認してpurchaseテーブルへ登録する
    $isBought = $user->purchases()->where('idea_id', $id)->first();

    if($isBought){
      // 購入済みの場合、マイページへリダイレクト
      return redirect('/mypage')->with('flash_message', __('Invalid operation was performed.'));
    } else {
      // DBへ登録
      $purchase = new Purchase;

      $purchase->user_id = $user->id;
      $purchase->idea_id = $id;
      $purchase->save();
    }

    // リダイレクトする
    // sessionフラッシュにメッセージ格納
    return redirect("/ideas/$id/show/")->with('flash_message', __('Bought it'));

  }

  // 気になるの着脱
  public function toggleLike(Request $request){
    // 当該のヒラメキのidを代入
    $idea_id = $request->id;

    // ログインしているユーザー情報取得
    $user = Auth::user();
    // お気に入り済みか確認
    $like = $user->likes()->where('idea_id', $idea_id)->first();
    // お気に入りだった場合、お気に入りから削除
    if($like){
      $like->delete(); 

    } else{
      // お気に入りではない場合、お気に入りに登録
      $like = new Like;

      $like->user_id = $user->id;
      $like->idea_id = $idea_id;
      $like->save();
      
    }
  }
}
