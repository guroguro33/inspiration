<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// 認証系
Auth::routes();

// ログイン後はマイページへ
Route::get('/home', function () {
    return redirect('/mypage');
});

// トップページ
Route::get('/', 'EvaluationsController@index')->name('evaluations.index');

// ヒラメキ一覧画面
Route::get('/index', 'IdeasController@index')->name('ideas.index');

// ヒラメキ詳細画面
Route::get('/ideas/{id}/show', 'IdeasController@show')->name('ideas.show');

// ヒラメキ出品画面
Route::get('/ideas/new', 'IdeasController@create')->name('ideas.create');

// プロフィール画面
Route::get('/profile/{id}', 'IdeasController@profile')->name('ideas.profile');

Route::group(['middleware' => 'auth'], function(){
  // ヒラメキ登録
  Route::post('/ideas/new', 'IdeasController@store')->name('ideas.store');
  // ヒラメキ編集画面
  Route::get('/ideas/{id}/edit', 'IdeasController@edit')->name('ideas.edit');
  // ヒラメキ更新
  Route::post('/ideas/{id}/edit', 'IdeasController@update')->name('ideas.update');
  // ヒラメキ削除
  Route::post('/ideas/{id}/del', 'IdeasController@delete')->name('ideas.delete');
  // ヒラメキ購入
  Route::post('/ideas/{id}/buy', 'IdeasController@buy')->name('ideas.buy');
  // お気に入り着脱
  Route::post('/ideas/like', 'IdeasController@toggleLike')->name('ideas.toggleLike');
});

Route::group(['middleware' => 'auth'], function(){
  // レビュー登録
  Route::post('/evaluations/{id}', 'EvaluationsController@store')->name('evaluations.store');
  // レビュー更新
  Route::post('/evaluations/{id}/update', 'EvaluationsController@update')->name('evaluations.update');
});

Route::group(['middleware' => 'auth'], function(){
  // マイページ
  Route::get('/mypage', 'MyPageController@index')->name('mypage.index');
  // プロフィール編集画面
  Route::get('/mypage/edit', 'MyPageController@edit')->name('mypage.edit');
  // プロフィール編集登録
  Route::post('/mypage/edit', 'MyPageController@update')->name('mypage.update');
  // 購入したもの一覧画面
  Route::get('/mypage/purchases', 'MyPageController@purchases')->name('mypage.purchases');
  // お気に入り一覧画面
  Route::get('/mypage/likes', 'MyPageController@likes')->name('mypage.likes');
  // ヒラメキを出品した一覧
  Route::get('/mypage/lists', 'MyPageController@lists')->name('mypage.lists');
  // 貰ったレビュー一覧
  Route::get('/mypage/reviews', 'MyPageController@reviews')->name('mypage.reviews');
});

// 購入通知メールのプレビュー
// Route::get('test/mail', function(){
//   return new App\Mail\purchaseReport();
// });