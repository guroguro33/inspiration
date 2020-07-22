<?php

namespace App\Http\Controllers;

use App\Idea;
use App\Like;
use App\User;
use App\Category;
use App\Purchase;
use App\Mail\PurchaseReport;
use Illuminate\Http\Request;
use App\Http\Requests\IdeaRequest;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\SearchRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class IdeasController extends Controller
{
  // --------------------------------------------
  // ヒラメキ一覧表示
  // --------------------------------------------
  public function index(SearchRequest $request){

    // カテゴリ情報を取得
    $categories = Category::all();

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
      // タイトル検索があった場合
      if(!empty($request->title)){
          $query->where('idea_title', 'like', "%$request->title%");
      }
    }
    
    // ヒラメキ情報を取得
    $ideas = $query->with([
      'user',
      'category',
      'evaluations',
      'avgFive_rank'
    ])->latest()->paginate(20)->appends($request->all());
    
    // 絞り込み条件を再表示するため、取得
    $inputData = $request->all();

    return view('ideas.index', compact('categories', 'ideas', 'inputData'));
  }

  // --------------------------------------------
  // ヒラメキ出品画面表示
  // --------------------------------------------
  public function create(){

    // 未ログインユーザーの場合、新規登録画面へ遷移
    if(!Auth::check()){
      return redirect('/register');
    }

    // ユーザー情報を取得
    $user = Auth::user();

    // カテゴリ情報を取得
    $categories = Category::all();
    
    // ユーザー画像の有無
    if(!empty($user->user_img)){
      $isImage = true;
    }else{
      $isImage = false;
    }
    
    return view('ideas.create', compact('user', 'categories', 'isImage'));
  }

  // --------------------------------------------
  // ヒラメキ出品登録
  // --------------------------------------------
  public function store(IdeaRequest $request){

    // インスタンス生成
    $idea = new Idea;

    // user_idを含めてDBへ登録
    Auth::user()->ideas()->save($idea->fill($request->all()));

    // リダイレクトする
    // sessionフラッシュにメッセージ格納
    return redirect('/mypage')->with('flash_message', __('Registered'));
  }

  // --------------------------------------------
  // ヒラメキ編集画面表示
  // --------------------------------------------
  public function edit($id){
    // GETパラメータが数字か、また存在する商品かチェック
    if(!ctype_digit($id) || empty($idea = Idea::find($id))) {
      return redirect('/mypage')->with('flash_message', __('Invalid operation was performed.'));
    }

    // ユーザー情報を取得
    $user = Auth::user();

    // 自分の出品したもの以外の場合は編集不可
    if($idea->user_id !== $user->id){
      return redirect('/mypage')->with('flash_message', __('Invalid operation was performed.'));
    } 

    // 購入済みの場合は編集不可
    $isBought = $idea->purchases()->first();
    if(!empty($isBought)){
      return redirect('/mypage')->with('flash_message', __('Invalid operation was performed.'));
    }

    // カテゴリ情報を取得
    $categories = Category::all();
    
    // ユーザー画像の有無
    if(!empty($user->user_img)){
      $isImage = true;
    }else{
      $isImage = false;
    }
    
    return view('ideas.edit', compact('user', 'isImage', 'categories', 'idea'));
  }

  // --------------------------------------------
  // ヒラメキ編集登録
  // --------------------------------------------
  public function update(IdeaRequest $request, $id){
    // GETパラメータが数字か、また存在する商品かチェック
    if(!ctype_digit($id) || empty($idea = Idea::find($id))) {
      return redirect('/mypage')->with('flash_message', __('Invalid operation was performed.'));
    }

    // ユーザー情報を取得
    $user = Auth::user();

    // 自分の出品したもの以外の場合は編集不可
    if($idea->user_id !== $user->id){
      return redirect('/mypage')->with('flash_message', __('Invalid operation was performed.'));
    }

    // 購入済みの場合は編集不可
    $isBought = Idea::find($id)->purchases()->first();
    if(!empty($isBought)){
      return redirect('/mypage')->with('flash_message', __('Invalid operation was performed.'));
    }

    // ideasテーブルのデータ更新
    $idea = Idea::find($id);
    $idea->fill($request->all())->save();

    // リダイレクトする
    // sessionフラッシュにメッセージ格納
    return redirect('/mypage')->with('flash_message', __('Registered'));
  }

  // --------------------------------------------
  // ヒラメキ削除
  // --------------------------------------------
  public function delete($id){
    // GETパラメータが数字か、また存在する商品かチェック
    if(!ctype_digit($id) || empty($idea = Idea::find($id))) {
      return redirect('/mypage')->with('flash_message', __('Invalid operation was performed.'));
    }

    // ユーザー情報を取得
    $user = Auth::user();

    // 自分の出品したもの以外の場合は編集不可
    if($idea->user_id !== $user->id){
      return redirect('/mypage')->with('flash_message', __('Invalid operation was performed.'));
    }

    // 購入済みの場合は編集不可
    $isBought = Idea::find($id)->purchases()->first();
    if(!empty($isBought)){
      return redirect('/mypage')->with('flash_message', __('Invalid operation was performed.'));
    }

    // 論理削除する
    Idea::find($id)->delete();

    // リダイレクトする
    // sessionフラッシュにメッセージ格納
    return redirect('/mypage')->with('flash_message', __('Deleted.'));
  }

  // --------------------------------------------
  // ヒラメキ詳細画面表示
  // --------------------------------------------
  public function show($id){
    // GETパラメータが数字か、また存在する商品かチェック
    if(!ctype_digit($id) || empty(Idea::find($id))) {
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
      $isLogin = true;

      // ログインしているユーザー情報取得
      $user = Auth::user();

      // お気に入りリスト
      $likeLists = $user->likes()->pluck('idea_id');
      
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
      
    } else {
      // ログイン状態
      $isLogin = false;

      // 未ログインの時、未定義にならないように0を代入
      $likeLists = array();
      $isBought = false;
      $review = null;
      $user = null;
      
    }
    // jsonに変換
    $isLogin = json_encode($isLogin);
    $isBought = json_encode($isBought);
    $likeLists = json_encode($likeLists);

    return view('ideas.show', compact('isLogin', 'user', 'idea', 'likeLists', 'isBought', 'review'));
  }

  // --------------------------------------------
  // ヒラメキを購入する
  // --------------------------------------------
  public function buy($id){
    // GETパラメータが数字か、また存在する商品かチェック
    if(!ctype_digit($id) || empty(Idea::find($id))) {
      return redirect('/mypage')->with('flash_message', __('Invalid operation was performed.'));
    }

    // ログインしているユーザー情報取得
    $user = Auth::user();

    // 自分の出品したものを購入していないかチェック
    $idea = Idea::find($id);
  
    if($idea->user_id === $user->id) {
      return redirect('/mypage')->with('flash_message', __('Invalid operation was performed.'));
    }

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

    // 購入が完了したら、購入者にメール送信を行う
    Mail::to($user->email)->send(new PurchaseReport($user, $idea, $isBuyer = true));
    // 続いて、販売者にメール送信を行う
    Mail::to($idea->user->email)->send(new PurchaseReport($idea->user, $idea, $isBuyer = false));

    // リダイレクトする
    // sessionフラッシュにメッセージ格納
    return redirect("/ideas/$id/show/")->with('flash_message', __('Bought it'));

  }

  // --------------------------------------------
  // 気になるの着脱
  // --------------------------------------------
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

  // --------------------------------------------
  // プロフィール表示
  // --------------------------------------------
  public function profile($id){
  
    // ユーザー情報を取得
    $user = User::find($id);

    // ユーザー画像の有無
    if(!empty($user->user_img)){
      $isImage = true;
    }else{
      $isImage = false;
    }

    // そのユーザーが出品したヒラメキ情報を取得
    $ideas = Idea::with([
      'user',
      'category',
      'evaluations',
      'avgFive_rank'
    ])->whereHas('user', function($query) use($id){
      $query->where('id', $id);
    })->latest()->paginate(20);

    return view('ideas.profile', compact('user', 'isImage', 'ideas'));
  }
}
