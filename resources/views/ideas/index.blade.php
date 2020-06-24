@extends('layouts.app')

@section('content')
<div class="l-container">

  <form action="" method="" class="p-sort u-mb-xl">
    <h4 class="p-sort__title u-pb-xl">絞り込み</h4>
    <div class="p-sort__body u-pb-l">
      <div class="p-sort__item">
        <p class="p-sort__item__title u-pb-s">カテゴリ</p>
        <select name="category" class="p-sort__item__select u-border">
          <option value="">選択してください</option>
          <option value="1">マッチング</option>
          <option value="2">掲示板</option>
          <option value="3">SNS</option>
          <option value="4">シェアリング</option>
          <option value="5">ECサイト</option>
          <option value="6">情報配信</option>
          <option value="7">その他</option>
        </select>
      </div>
      <div class="p-sort__price">
        <p class="p-sort__item__title u-pb-s">価格</p>
        <div class="p-sort__price__body">
          <input type="number" name="low" class="p-sort__price__number">
          <span>円から</span>
          <input type="number" name="hight" class="p-sort__price__number">
          <span>円まで</span>
        </div>
      </div>
      <div class="p-sort__item">
        <p class="p-sort__item__title u-pb-s">出品順</p>
        <select name="new" class="p-sort__item__select u-border">
          <option value="">選択してください</option>
          <option value="1">新しい順</option>
          <option value="2">古い順</option>
        </select>
      </div>
      <div class="p-sort__item">
        <p class="p-sort__item__title u-pb-s">星の数</p>
        <select name="category" class="p-sort__item__select u-border">
          <option value="">選択してください</option>
          <option value="1">多い順</option>
          <option value="2">少ない順</option>
        </select>
      </div>
    </div>
    <input type="submit" class="c-btn__main--gray1 u-mb-m" value="絞り込む">
  </form>

  <section class="p-index">
    <h1 class="p-index__title u-pb-m">ヒラメキ一覧</h1>
    <p class="p-index__sort-result u-pb-xxl">
      1,000,000件中　1件〜10件を表示
    </p>
    <div class="p-index__body u-pb-3l">
      <a href="" class="p-index__item u-pb-l u-mb-m">
        <div class="p-index__icon">
          <div class="p-index__icon__img">
            <img src="./img/no-img2.svg" alt="人のアイコン">
          </div>
          <p class="p-index__icon__name">名前が入ります</p>
        </div>
        <div class="p-index__sub">
          <p class="p-index__sub__date">2020/10/10</p>
          <p class="p-index__sub__date">23:59</p>
          <p class="p-index__sub__cat">シェアリング</p>
        </div>
        <div class="p-index__desc c-desc">
          <h3 class="c-desc__title">タイトルタイトルタイトルタイトルタイトルタイトルタイトルタイトルタイトルタイトルタイトルタイトルタイトルタイトルタイトル…</h3>
          <div class="c-desc__info u-pb-s">
            <img src="{{ asset('./img/star.svg') }}" alt="星のアイコン" class="c-desc__star">
            <span class="c-desc__point">3.5(３件)</span>
            <span class="c-desc__price">1,000,000円</span>
          </div>
          <p class="c-desc__text">
            テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキ…詳細を見る</p>
        </div>
      </a>
      <a href="" class="p-index__item u-pb-l u-mb-m">
        <div class="p-index__icon">
          <div class="p-index__icon__img">
            <img src="./img/no-img2.svg" alt="人のアイコン">
          </div>
          <p class="p-index__icon__name">名前が入ります</p>
        </div>
        <div class="p-index__sub">
          <p class="p-index__sub__date">2020/10/10</p>
          <p class="p-index__sub__date">23:59</p>
          <p class="p-index__sub__cat">シェアリング</p>
        </div>
        <div class="p-index__desc c-desc">
          <h3 class="c-desc__title">タイトルタイトルタイトルタイトルタイトルタイトルタイトルタイトルタイトルタイトルタイトルタイトルタイトルタイトルタイトル…</h3>
          <div class="c-desc__info u-pb-s">
            <img src="{{ asset('./img/star.svg') }}" alt="星のアイコン" class="c-desc__star">
            <span class="c-desc__point">3.5(３件)</span>
            <span class="c-desc__price">1,000,000円</span>
          </div>
          <p class="c-desc__text">
            テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキ…詳細を見る</p>
        </div>
      </a>
      <a href="" class="p-index__item u-pb-l u-mb-m">
        <div class="p-index__icon">
          <div class="p-index__icon__img">
            <img src="./img/no-img2.svg" alt="人のアイコン">
          </div>
          <p class="p-index__icon__name">名前が入ります</p>
        </div>
        <div class="p-index__sub">
          <p class="p-index__sub__date">2020/10/10</p>
          <p class="p-index__sub__date">23:59</p>
          <p class="p-index__sub__cat">シェアリング</p>
        </div>
        <div class="p-index__desc c-desc">
          <h3 class="c-desc__title">タイトルタイトルタイトルタイトルタイトルタイトルタイトルタイトルタイトルタイトルタイトルタイトルタイトルタイトルタイトル…</h3>
          <div class="c-desc__info u-pb-s">
            <img src="{{ asset('./img/star.svg') }}" alt="星のアイコン" class="c-desc__star">
            <span class="c-desc__point">3.5(３件)</span>
            <span class="c-desc__price">1,000,000円</span>
          </div>
          <p class="c-desc__text">
            テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキ…詳細を見る</p>
        </div>
      </a>
      <a href="" class="p-index__item u-pb-l u-mb-m">
        <div class="p-index__icon">
          <div class="p-index__icon__img">
            <img src="./img/no-img2.svg" alt="人のアイコン">
          </div>
          <p class="p-index__icon__name">名前が入ります</p>
        </div>
        <div class="p-index__sub">
          <p class="p-index__sub__date">2020/10/10</p>
          <p class="p-index__sub__date">23:59</p>
          <p class="p-index__sub__cat">シェアリング</p>
        </div>
        <div class="p-index__desc c-desc">
          <h3 class="c-desc__title">タイトルタイトルタイトルタイトルタイトルタイトルタイトルタイトルタイトルタイトルタイトルタイトルタイトルタイトルタイトル…</h3>
          <div class="c-desc__info u-pb-s">
            <img src="{{ asset('./img/star.svg') }}" alt="星のアイコン" class="c-desc__star">
            <span class="c-desc__point">3.5(３件)</span>
            <span class="c-desc__price">1,000,000円</span>
          </div>
          <p class="c-desc__text">
            テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキ…詳細を見る</p>
        </div>
      </a>
      <a href="" class="p-index__item u-pb-l u-mb-m">
        <div class="p-index__icon">
          <div class="p-index__icon__img">
            <img src="./img/no-img2.svg" alt="人のアイコン">
          </div>
          <p class="p-index__icon__name">名前が入ります</p>
        </div>
        <div class="p-index__sub">
          <p class="p-index__sub__date">2020/10/10</p>
          <p class="p-index__sub__date">23:59</p>
          <p class="p-index__sub__cat">シェアリング</p>
        </div>
        <div class="p-index__desc c-desc">
          <h3 class="c-desc__title">タイトルタイトルタイトルタイトルタイトルタイトルタイトルタイトルタイトルタイトルタイトルタイトルタイトルタイトルタイトル…</h3>
          <div class="c-desc__info u-pb-s">
            <img src="{{ asset('./img/star.svg') }}" alt="星のアイコン" class="c-desc__star">
            <span class="c-desc__point">3.5(３件)</span>
            <span class="c-desc__price">1,000,000円</span>
          </div>
          <p class="c-desc__text">
            テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキ…詳細を見る</p>
        </div>
      </a>

    </div>
    <div class="u-pb-3l">
      ページネーション
    </div>
  </section>

</div>

@endsection
