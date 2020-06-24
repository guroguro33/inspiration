@extends('layouts.app')

@section('content')
<div class="l-container l-sidebar">
  <section class="l-sidebar__detail">
    <h1 class="p-detail__title u-pb-m">
      タイトルタイトルタイトルタイトルタイトルタイトルタイトルタイトルタイトルタイトルタイトルタイトル
    </h1>
    <div class="p-detail__note u-pb-m">
      <div class="p-detail__note__info">
        <img src="{{ asset('./img/star.svg') }}" alt="星のアイコン" class="p-detail__note__star">
        <span class="p-detail__note__text">3.5 (３件)</span>
        <span class="p-detail__note__text">by 名前が入ります</span>
      </div>
      <div class="p-detail__btn">
        <a href="https://twitter.com/share?ref_src=twsrc%5Etfw" class="twitter-share-button"
          data-show-count="false" target="_blank" data-size="large">Tweet</a>
        <a href="" class="p-detail__btn--like u-opacity">
          <div class="p-detail__btn--img">
            <i class="fas fa-heart"></i>
          </div>
          <span>お気に入り</span>
        </a>
      </div>
    </div>
    <div class="p-detail__date u-pb-xxl">
      登録日：2020/10/10 23:59
    </div>
    <div class="p-detail__tab u-mb-l">
      <a href="" class="p-detail__tab__btn u-border--bottom">概要</a>
      <a href="" class="p-detail__tab__btn">詳細</a>
    </div>
    <div class="p-detail__text u-mb-xl">
      テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト
      テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト
    </div>
    <div class="p-detail__review">
      <h3 class="p-detail__review__heading u-pb-l">購入者からのレビュー</h3>
      <div class="p-detail__review__body">
        <div class="p-detail__review__item u-pb-m u-mb-xxl">
          <div class="p-detail__review__sub">
            <p class="p-detail__review__date">2020/10/10</p>
            <p class="p-detail__review__date">23:59</p>
          </div>
          <div class="p-detail__review__desc">
            <h4 class="p-detail__review__text u-pb-s">
              レビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビュー
            </h4>
            <div class="p-detail__review__info u-pb-s">
              <img src="{{ asset('./img/star.svg') }}" alt="星のアイコン" class="p-detail__review__star">
              <span class="p-detail__review__point">4</span>
              <span class="p-detail__review__point">by 名前が入ります</span>
            </div>
          </div>
        </div>
        <div class="p-detail__review__item u-pb-m u-mb-xxl">
          <div class="p-detail__review__sub">
            <p class="p-detail__review__date">2020/10/10</p>
            <p class="p-detail__review__date">23:59</p>
          </div>
          <div class="p-detail__review__desc">
            <h4 class="p-detail__review__text u-pb-s">
              レビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビュー
            </h4>
            <div class="p-detail__review__info u-pb-s">
              <img src="{{ asset('./img/star.svg') }}" alt="星のアイコン" class="p-detail__review__star">
              <span class="p-detail__review__point">4</span>
              <span class="p-detail__review__point">by 名前が入ります</span>
            </div>
          </div>
        </div>
        <div class="p-detail__review__item u-pb-m u-mb-xxl">
          <div class="p-detail__review__sub">
            <p class="p-detail__review__date">2020/10/10</p>
            <p class="p-detail__review__date">23:59</p>
          </div>
          <div class="p-detail__review__desc">
            <h4 class="p-detail__review__text u-pb-s">
              レビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビュー
            </h4>
            <div class="p-detail__review__info u-pb-s">
              <img src="{{ asset('./img/star.svg') }}" alt="星のアイコン" class="p-detail__review__star">
              <span class="p-detail__review__point">4</span>
              <span class="p-detail__review__point">by 名前が入ります</span>
            </div>
          </div>
        </div>
        <div class="p-detail__review__item u-pb-m u-mb-xxl">
          <div class="p-detail__review__sub">
            <p class="p-detail__review__date">2020/10/10</p>
            <p class="p-detail__review__date">23:59</p>
          </div>
          <div class="p-detail__review__desc">
            <h4 class="p-detail__review__text u-pb-s">
              レビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビュー
            </h4>
            <div class="p-detail__review__info u-pb-s">
              <img src="{{ asset('./img/star.svg') }}" alt="星のアイコン" class="p-detail__review__star">
              <span class="p-detail__review__point">4</span>
              <span class="p-detail__review__point">by 名前が入ります</span>
            </div>
          </div>
        </div>
        <div class="p-detail__review__item u-pb-m u-mb-xxl">
          <div class="p-detail__review__sub">
            <p class="p-detail__review__date">2020/10/10</p>
            <p class="p-detail__review__date">23:59</p>
          </div>
          <div class="p-detail__review__desc">
            <h4 class="p-detail__review__text u-pb-s">
              レビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビューレビュー
            </h4>
            <div class="p-detail__review__info u-pb-s">
              <img src="{{ asset('./img/star.svg') }}" alt="星のアイコン" class="p-detail__review__star">
              <span class="p-detail__review__point">4</span>
              <span class="p-detail__review__point">by 名前が入ります</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="l-sidebar__sub">
    <div class="p-checkout__pay">
      <p class="p-checkout__price u-pb-xl">1,000,000円</p>
      <a href="" class="c-btn__main--blue u-m-0auto">購入する</a>
    </div>
  </section>

</div>

@endsection
