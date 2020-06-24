@extends('layouts.app')

@section('content')
<div class="l-container l-sidebar--reverse">

  @component('components.mypageSidebar')
  @endcomponent

  <section class="l-sidebar__mypage">
    <h1 class="p-mypage__title u-pb-m">マイページ</h1>
    <div class="p-mypage__unit u-mb-xxl">
      <div class="p-mypage__heading u-pb-s u-mb-m">
        <h2 class="p-mypage__heading__text">出品したヒラメキ（最新５件）</h2>
        <a href="" class="c-btn__sub--mypage">全件表示</a>
      </div>
      <a href="" class="p-mypage__item u-pb-l u-mb-m u-opacity">
        <div class="p-mypage__sub">
          <p class="p-mypage__sub__date">2020/10/10</p>
          <p class="p-mypage__sub__date">23:59</p>
          <p class="p-mypage__sub__cat">シェアリング</p>
        </div>
        <div class="p-mypage__desc c-desc">
          <h3 class="c-desc__title">タイトルタイトルタイトルタイトルタイトルタイトルタイトルタイトル…</h3>
          <div class="c-desc__info u-pb-s">
            <img src="{{ asset('./img/star.svg') }}" alt="星のアイコン" class="c-desc__star">
            <span class="c-desc__point">3.5(３件)</span>
            <span class="c-desc__price">1,000,000円</span>
          </div>
          <p class="c-desc__text">テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキ…</p>
        </div>
      </a>
      <a href="" class="p-mypage__item u-pb-l u-mb-m u-opacity">
        <div class="p-mypage__sub">
          <p class="p-mypage__sub__date">2020/10/10</p>
          <p class="p-mypage__sub__date">23:59</p>
          <p class="p-mypage__sub__cat">シェアリング</p>
        </div>
        <div class="p-mypage__desc c-desc">
          <h3 class="c-desc__title">タイトルタイトルタイトルタイトルタイトルタイトルタイトルタイトル…</h3>
          <div class="c-desc__info u-pb-s">
            <img src="{{ asset('./img/star.svg') }}" alt="星のアイコン" class="c-desc__star">
            <span class="c-desc__point">3.5(３件)</span>
            <span class="c-desc__price">1,000,000円</span>
          </div>
          <p class="c-desc__text">テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキ…</p>
        </div>
      </a>
      <a href="" class="p-mypage__item u-pb-l u-mb-m u-opacity">
        <div class="p-mypage__sub">
          <p class="p-mypage__sub__date">2020/10/10</p>
          <p class="p-mypage__sub__date">23:59</p>
          <p class="p-mypage__sub__cat">シェアリング</p>
        </div>
        <div class="p-mypage__desc c-desc">
          <h3 class="c-desc__title">タイトルタイトルタイトルタイトルタイトルタイトルタイトルタイトル…</h3>
          <div class="c-desc__info u-pb-s">
            <img src="{{ asset('./img/star.svg') }}" alt="星のアイコン" class="c-desc__star">
            <span class="c-desc__point">3.5(３件)</span>
            <span class="c-desc__price">1,000,000円</span>
          </div>
          <p class="c-desc__text">テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキ…</p>
        </div>
      </a>
      <a href="" class="p-mypage__item u-pb-l u-mb-m u-opacity">
        <div class="p-mypage__sub">
          <p class="p-mypage__sub__date">2020/10/10</p>
          <p class="p-mypage__sub__date">23:59</p>
          <p class="p-mypage__sub__cat">シェアリング</p>
        </div>
        <div class="p-mypage__desc c-desc">
          <h3 class="c-desc__title">タイトルタイトルタイトルタイトルタイトルタイトルタイトルタイトル…</h3>
          <div class="c-desc__info u-pb-s">
            <img src="{{ asset('./img/star.svg') }}" alt="星のアイコン" class="c-desc__star">
            <span class="c-desc__point">3.5(３件)</span>
            <span class="c-desc__price">1,000,000円</span>
          </div>
          <p class="c-desc__text">テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキ…</p>
        </div>
      </a>
      <a href="" class="p-mypage__item u-pb-l u-mb-m u-opacity">
        <div class="p-mypage__sub">
          <p class="p-mypage__sub__date">2020/10/10</p>
          <p class="p-mypage__sub__date">23:59</p>
          <p class="p-mypage__sub__cat">シェアリング</p>
        </div>
        <div class="p-mypage__desc c-desc">
          <h3 class="c-desc__title">タイトルタイトルタイトルタイトルタイトルタイトルタイトルタイトル…</h3>
          <div class="c-desc__info u-pb-s">
            <img src="{{ asset('./img/star.svg') }}" alt="星のアイコン" class="c-desc__star">
            <span class="c-desc__point">3.5(３件)</span>
            <span class="c-desc__price">1,000,000円</span>
          </div>
          <p class="c-desc__text">テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキ…</p>
        </div>
      </a>


    </div>

    <div class="p-mypage__unit u-mb-xxl">
      <div class="p-mypage__heading u-pb-s u-mb-m">
        <h2 class="p-mypage__heading__text">購入者からの<br>レビュー（最新５件）</h2>
        <a href="" class="c-btn__sub--mypage">全件表示</a>
      </div>
      <a href="" class="p-mypage__item u-pb-l u-mb-m u-opacity">
        <div class="p-mypage__sub">
          <p class="p-mypage__sub__date">2020/10/10</p>
          <p class="p-mypage__sub__date">23:59</p>
          <p class="p-mypage__sub__cat">シェアリング</p>
        </div>
        <div class="p-mypage__desc c-desc">
          <h3 class="c-desc__title">レビューレビューレビューレビューレビューレビューレビューレビュー…</h3>
          <div class="c-desc__info u-pb-s">
            <img src="{{ asset('./img/star.svg') }}" alt="星のアイコン" class="c-desc__star">
            <span class="c-desc__point">4</span>
            <span class="c-desc__point">by 名前が入ります</span>
          </div>
          <div class="p-mypage__desc__post">
            <p class="c-desc__text">タイトルタイトルタイトルタイトルタイトルタイトルタイトルタイト…</p>
            <span class="c-desc__price">1,000,000円</span>
          </div>
        </div>
      </a>
      <a href="" class="p-mypage__item u-pb-l u-mb-m u-opacity">
        <div class="p-mypage__sub">
          <p class="p-mypage__sub__date">2020/10/10</p>
          <p class="p-mypage__sub__date">23:59</p>
          <p class="p-mypage__sub__cat">シェアリング</p>
        </div>
        <div class="p-mypage__desc c-desc">
          <h3 class="c-desc__title">レビューレビューレビューレビューレビューレビューレビューレビュー…</h3>
          <div class="c-desc__info u-pb-s">
            <img src="{{ asset('./img/star.svg') }}" alt="星のアイコン" class="c-desc__star">
            <span class="c-desc__point">4</span>
            <span class="c-desc__point">by 名前が入ります</span>
          </div>
          <div class="p-mypage__desc__post">
            <p class="c-desc__text">タイトルタイトルタイトルタイトルタイトルタイトルタイトルタイト…</p>
            <span class="c-desc__price">1,000,000円</span>
          </div>
        </div>
      </a>
      <a href="" class="p-mypage__item u-pb-l u-mb-m u-opacity">
        <div class="p-mypage__sub">
          <p class="p-mypage__sub__date">2020/10/10</p>
          <p class="p-mypage__sub__date">23:59</p>
          <p class="p-mypage__sub__cat">シェアリング</p>
        </div>
        <div class="p-mypage__desc c-desc">
          <h3 class="c-desc__title">レビューレビューレビューレビューレビューレビューレビューレビュー…</h3>
          <div class="c-desc__info u-pb-s">
            <img src="{{ asset('./img/star.svg') }}" alt="星のアイコン" class="c-desc__star">
            <span class="c-desc__point">4</span>
            <span class="c-desc__point">by 名前が入ります</span>
          </div>
          <div class="p-mypage__desc__post">
            <p class="c-desc__text">タイトルタイトルタイトルタイトルタイトルタイトルタイトルタイト…</p>
            <span class="c-desc__price">1,000,000円</span>
          </div>
        </div>
      </a>
      <a href="" class="p-mypage__item u-pb-l u-mb-m u-opacity">
        <div class="p-mypage__sub">
          <p class="p-mypage__sub__date">2020/10/10</p>
          <p class="p-mypage__sub__date">23:59</p>
          <p class="p-mypage__sub__cat">シェアリング</p>
        </div>
        <div class="p-mypage__desc c-desc">
          <h3 class="c-desc__title">レビューレビューレビューレビューレビューレビューレビューレビュー…</h3>
          <div class="c-desc__info u-pb-s">
            <img src="{{ asset('./img/star.svg') }}" alt="星のアイコン" class="c-desc__star">
            <span class="c-desc__point">4</span>
            <span class="c-desc__point">by 名前が入ります</span>
          </div>
          <div class="p-mypage__desc__post">
            <p class="c-desc__text">タイトルタイトルタイトルタイトルタイトルタイトルタイトルタイト…</p>
            <span class="c-desc__price">1,000,000円</span>
          </div>
        </div>
      </a>
      <a href="" class="p-mypage__item u-pb-l u-mb-m u-opacity">
        <div class="p-mypage__sub">
          <p class="p-mypage__sub__date">2020/10/10</p>
          <p class="p-mypage__sub__date">23:59</p>
          <p class="p-mypage__sub__cat">シェアリング</p>
        </div>
        <div class="p-mypage__desc c-desc">
          <h3 class="c-desc__title">レビューレビューレビューレビューレビューレビューレビューレビュー…</h3>
          <div class="c-desc__info u-pb-s">
            <img src="{{ asset('./img/star.svg') }}" alt="星のアイコン" class="c-desc__star">
            <span class="c-desc__point">4</span>
            <span class="c-desc__point">by 名前が入ります</span>
          </div>
          <div class="p-mypage__desc__post">
            <p class="c-desc__text">タイトルタイトルタイトルタイトルタイトルタイトルタイトルタイト…</p>
            <span class="c-desc__price">1,000,000円</span>
          </div>
        </div>
      </a>
    </div>

    <div class="p-mypage__unit u-mb-xxl">
      <div class="p-mypage__heading u-pb-s u-mb-m">
        <h2 class="p-mypage__heading__text">購入したヒラメキ（最新５件）</h2>
        <a href="" class="c-btn__sub--mypage">全件表示</a>
      </div>
      <a href="" class="p-mypage__item u-pb-l u-mb-m u-opacity">
        <div class="p-mypage__sub">
          <p class="p-mypage__sub__date">2020/10/10</p>
          <p class="p-mypage__sub__date">23:59</p>
          <p class="p-mypage__sub__cat">シェアリング</p>
        </div>
        <div class="p-mypage__desc c-desc">
          <h3 class="c-desc__title">タイトルタイトルタイトルタイトルタイトルタイトルタイトルタイトル…</h3>
          <div class="c-desc__info u-pb-s">
            <img src="{{ asset('./img/star.svg') }}" alt="星のアイコン" class="c-desc__star">
            <span class="c-desc__point">3.5(３件)</span>
            <span class="c-desc__price">1,000,000円</span>
          </div>
          <p class="c-desc__text">テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキ…</p>
        </div>
      </a>
      <a href="" class="p-mypage__item u-pb-l u-mb-m u-opacity">
        <div class="p-mypage__sub">
          <p class="p-mypage__sub__date">2020/10/10</p>
          <p class="p-mypage__sub__date">23:59</p>
          <p class="p-mypage__sub__cat">シェアリング</p>
        </div>
        <div class="p-mypage__desc c-desc">
          <h3 class="c-desc__title">タイトルタイトルタイトルタイトルタイトルタイトルタイトルタイトル…</h3>
          <div class="c-desc__info u-pb-s">
            <img src="{{ asset('./img/star.svg') }}" alt="星のアイコン" class="c-desc__star">
            <span class="c-desc__point">3.5(３件)</span>
            <span class="c-desc__price">1,000,000円</span>
          </div>
          <p class="c-desc__text">テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキ…</p>
        </div>
      </a>
      <a href="" class="p-mypage__item u-pb-l u-mb-m u-opacity">
        <div class="p-mypage__sub">
          <p class="p-mypage__sub__date">2020/10/10</p>
          <p class="p-mypage__sub__date">23:59</p>
          <p class="p-mypage__sub__cat">シェアリング</p>
        </div>
        <div class="p-mypage__desc c-desc">
          <h3 class="c-desc__title">タイトルタイトルタイトルタイトルタイトルタイトルタイトルタイトル…</h3>
          <div class="c-desc__info u-pb-s">
            <img src="{{ asset('./img/star.svg') }}" alt="星のアイコン" class="c-desc__star">
            <span class="c-desc__point">3.5(３件)</span>
            <span class="c-desc__price">1,000,000円</span>
          </div>
          <p class="c-desc__text">テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキ…</p>
        </div>
      </a>
      <a href="" class="p-mypage__item u-pb-l u-mb-m u-opacity">
        <div class="p-mypage__sub">
          <p class="p-mypage__sub__date">2020/10/10</p>
          <p class="p-mypage__sub__date">23:59</p>
          <p class="p-mypage__sub__cat">シェアリング</p>
        </div>
        <div class="p-mypage__desc c-desc">
          <h3 class="c-desc__title">タイトルタイトルタイトルタイトルタイトルタイトルタイトルタイトル…</h3>
          <div class="c-desc__info u-pb-s">
            <img src="{{ asset('./img/star.svg') }}" alt="星のアイコン" class="c-desc__star">
            <span class="c-desc__point">3.5(３件)</span>
            <span class="c-desc__price">1,000,000円</span>
          </div>
          <p class="c-desc__text">テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキ…</p>
        </div>
      </a>
      <a href="" class="p-mypage__item u-pb-l u-mb-m u-opacity">
        <div class="p-mypage__sub">
          <p class="p-mypage__sub__date">2020/10/10</p>
          <p class="p-mypage__sub__date">23:59</p>
          <p class="p-mypage__sub__cat">シェアリング</p>
        </div>
        <div class="p-mypage__desc c-desc">
          <h3 class="c-desc__title">タイトルタイトルタイトルタイトルタイトルタイトルタイトルタイトル…</h3>
          <div class="c-desc__info u-pb-s">
            <img src="{{ asset('./img/star.svg') }}" alt="星のアイコン" class="c-desc__star">
            <span class="c-desc__point">3.5(３件)</span>
            <span class="c-desc__price">1,000,000円</span>
          </div>
          <p class="c-desc__text">テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキ…</p>
        </div>
      </a>

    </div>

    <div class="p-mypage__unit u-mb-xxl">
      <div class="p-mypage__heading u-pb-s u-mb-m">
        <h2 class="p-mypage__heading__text">気になるリスト（最新５件）</h2>
        <a href="" class="p-mypage__heading__link c-btn__sub--mypage">全件表示</a>
      </div>
      <a href="" class="p-mypage__item u-pb-l u-mb-m u-opacity">
        <div class="p-mypage__sub">
          <p class="p-mypage__sub__date">2020/10/10</p>
          <p class="p-mypage__sub__date">23:59</p>
          <p class="p-mypage__sub__cat">シェアリング</p>
        </div>
        <div class="p-mypage__desc c-desc">
          <h3 class="c-desc__title">タイトルタイトルタイトルタイトルタイトルタイトルタイトルタイトル…</h3>
          <div class="c-desc__info u-pb-s">
            <img src="{{ asset('./img/star.svg') }}" alt="星のアイコン" class="c-desc__star">
            <span class="c-desc__point">3.5(３件)</span>
            <span class="c-desc__price">1,000,000円</span>
          </div>
          <p class="c-desc__text">テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキ…</p>
        </div>
      </a>
      <a href="" class="p-mypage__item u-pb-l u-mb-m u-opacity">
        <div class="p-mypage__sub">
          <p class="p-mypage__sub__date">2020/10/10</p>
          <p class="p-mypage__sub__date">23:59</p>
          <p class="p-mypage__sub__cat">シェアリング</p>
        </div>
        <div class="p-mypage__desc c-desc">
          <h3 class="c-desc__title">タイトルタイトルタイトルタイトルタイトルタイトルタイトルタイトル…</h3>
          <div class="c-desc__info u-pb-s">
            <img src="{{ asset('./img/star.svg') }}" alt="星のアイコン" class="c-desc__star">
            <span class="c-desc__point">3.5(３件)</span>
            <span class="c-desc__price">1,000,000円</span>
          </div>
          <p class="c-desc__text">テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキ…</p>
        </div>
      </a>
      <a href="" class="p-mypage__item u-pb-l u-mb-m u-opacity">
        <div class="p-mypage__sub">
          <p class="p-mypage__sub__date">2020/10/10</p>
          <p class="p-mypage__sub__date">23:59</p>
          <p class="p-mypage__sub__cat">シェアリング</p>
        </div>
        <div class="p-mypage__desc c-desc">
          <h3 class="c-desc__title">タイトルタイトルタイトルタイトルタイトルタイトルタイトルタイトル…</h3>
          <div class="c-desc__info u-pb-s">
            <img src="{{ asset('./img/star.svg') }}" alt="星のアイコン" class="c-desc__star">
            <span class="c-desc__point">3.5(３件)</span>
            <span class="c-desc__price">1,000,000円</span>
          </div>
          <p class="c-desc__text">テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキ…</p>
        </div>
      </a>
      <a href="" class="p-mypage__item u-pb-l u-mb-m u-opacity">
        <div class="p-mypage__sub">
          <p class="p-mypage__sub__date">2020/10/10</p>
          <p class="p-mypage__sub__date">23:59</p>
          <p class="p-mypage__sub__cat">シェアリング</p>
        </div>
        <div class="p-mypage__desc c-desc">
          <h3 class="c-desc__title">タイトルタイトルタイトルタイトルタイトルタイトルタイトルタイトル…</h3>
          <div class="c-desc__info u-pb-s">
            <img src="{{ asset('./img/star.svg') }}" alt="星のアイコン" class="c-desc__star">
            <span class="c-desc__point">3.5(３件)</span>
            <span class="c-desc__price">1,000,000円</span>
          </div>
          <p class="c-desc__text">テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキ…</p>
        </div>
      </a>
      <a href="" class="p-mypage__item u-pb-l u-mb-m u-opacity">
        <div class="p-mypage__sub">
          <p class="p-mypage__sub__date">2020/10/10</p>
          <p class="p-mypage__sub__date">23:59</p>
          <p class="p-mypage__sub__cat">シェアリング</p>
        </div>
        <div class="p-mypage__desc c-desc">
          <h3 class="c-desc__title">タイトルタイトルタイトルタイトルタイトルタイトルタイトルタイトル…</h3>
          <div class="c-desc__info u-pb-s">
            <img src="{{ asset('./img/star.svg') }}" alt="星のアイコン" class="c-desc__star">
            <span class="c-desc__point">3.5(３件)</span>
            <span class="c-desc__price">1,000,000円</span>
          </div>
          <p class="c-desc__text">テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキ…</p>
        </div>
      </a>

    </div>
  </section>

</div>


@endsection