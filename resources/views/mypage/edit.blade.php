@extends('layouts.app')

@section('content')
<div class="l-container l-sidebar--reverse">

  @component('components.mypageSidebar')
  @endcomponent

  <section class="l-sidebar__mypage">
    <h1 class="p-mypage__title u-pb-m">プロフィール編集</h1>
    <form action="" method="POST" class="c-form">
      <div class="u-mb-xxl">
        <div class="p-mymenu__img u-pb-m">
          <img src="./img/no-img2.svg" alt="人のアイコン">
        </div>
        <input type="file" name="my_img" class="c-form__file" value="ファイルを選択">
      </div>
      <ul>
        <li class="c-form__item u-pb-l">
          <label class="c-form__item__name">
            名前（必須）
            <input type="text" name="name" class="c-form__item__input u-mb-s" placeholder="入力してください">
          </label>
          <span class="c-form__item--alert">エラーメッセージが入ります。</span>
        </li>
        <li class="c-form__item u-pb-l">
          <label class="c-form__item__name">
            メールアドレス（必須）
            <input type="email" name="email" class="c-form__item__input u-mb-s" placeholder="入力してください">
          </label>
          <span class="c-form__item--alert">エラーメッセージが入ります。</span>
        </li>
        <li class="c-form__item u-pb-l">
          <label class="c-form__item__name">
            パスワード（必須）<span>※８文字以上</span>
            <input type="password" name="pass" class="c-form__item__input u-mb-s" placeholder="入力してください">
          </label>
          <span class="c-form__item--alert">エラーメッセージが入ります。</span>
        </li>
        <li class="c-form__item u-pb-l">
          <label class="c-form__item__name">
            パスワード（確認用）
            <input type="password" name="pass_re" class="c-form__item__input u-mb-s" placeholder="入力してください">
          </label>
          <span class="c-form__item--alert">エラーメッセージが入ります。</span>
        </li>
        <li class="c-form__item u-pb-l">
          <label class="c-form__item__name">
            自己紹介
            <textarea name="self" class="c-form__item--text" cols="20" rows="10"
              placeholder="入力してください"></textarea>
          </label>
          <span class="c-form__item--alert">エラーメッセージが入ります。</span>
        </li>
      </ul>
      <input type="submit" class="c-form__btn c-btn__main--gray1 u-mb-xxl" value="登録する">
    </form>

  </section>
</div>
@endsection