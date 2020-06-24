@extends('layouts.app')

@section('content')
<div class="l-container l-sidebar--reverse">

  @component('components.mypageSidebar')
  @endcomponent
  
  <section class="l-sidebar__mypage">
    <h1 class="p-mypage__title u-pb-m">ヒラメキを出品する</h1>
    <form action="" method="post" class="c-form">
      <div class="c-form__item u-pb-l">
        <label class="c-form__item__name u-pb-s">
          タイトル（必須）
          <input type="text" name="title" class="c-form__item__input u-mb-s" placeholder="入力してください">
        </label>
        <span class="c-form__item--alert">エラーメッセージが入ります。</span>
      </div>
      <div class="c-form__item u-pb-l">
        <p class="c-form__item__name u-pb-s">カテゴリ（必須）</p>
        <select name="category" class="c-form__item__select">
          <option value="">選択してください</option>
          <option value="1">マッチング</option>
          <option value="2">掲示板</option>
          <option value="3">SNS</option>
          <option value="4">シェアリング</option>
          <option value="5">ECサイト</option>
          <option value="6">情報配信</option>
          <option value="7">その他</option>
        </select>
        <span class="c-form__item--alert">エラーメッセージが入ります。</span>
      </div>
      <div class="c-form__item u-pb-l">
        <p class="c-form__item__name u-pb-s">概要（購入前に表示されます）（必須）</p>
        <textarea name="self" class="c-form__item__text" cols="20" rows="8" placeholder="入力してください"></textarea>
        <span class="c-form__item--alert">エラーメッセージが入ります。</span>
      </div>
      <div class="c-form__item u-pb-l">
        <p class="c-form__item__name u-pb-s">詳細（購入後に表示されます）（必須）</p>
        <textarea name="self" class="c-form__item__text" cols="20" rows="12" placeholder="入力してください"></textarea>
        <span class="c-form__item--alert">エラーメッセージが入ります。</span>
      </div>
      <div class="c-form__item u-pb-l">
        <p class="c-form__item__name u-pb-s">価格（必須）</p>
        <input type="number" name="price" class="c-form__item__price u-mb-s" placeholder="入力してください">円
        <span class="c-form__item--alert">エラーメッセージが入ります。</span>
      </div>
      <input type="submit" class="c-form__btn c-btn__main--gray1 u-mb-xxl" value="登録する">
    </form>

  </section>
</div>

@endsection
