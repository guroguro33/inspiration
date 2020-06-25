@extends('layouts.app')

@section('content')
<div class="l-container l-sidebar--reverse">
  
  @component('components.mypageSidebar')
    @slot('user', $user);
  @endcomponent

  <section class="l-sidebar__mypage">
    <h1 class="p-mypage__title u-pb-m">気になるリスト</h1>
    <div class="u-mb-xxl">
      <form action="" method="" class="p-mypage__heading u-pb-m u-mb-l">
        <h2 class="p-mypage__heading__text"></h2>
        <select name="" class="p-mypage__heading__select">
          <option value="1">新しい順</option>
          <option value="2">古い順</option>
        </select>
      </form>
      <div href="" class="p-mypage__item u-pb-l u-mb-m">
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
          <p class="c-desc__text u-pb-m">テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキ…</p>
          <div class="p-mypage__link">
            <a href="" class="c-btn__main--gray2">気になるを解除</a>
            <a href="" class="c-btn__main--blue">詳細を見る</a>
          </div>
        </div>
      </div>
      <div href="" class="p-mypage__item u-pb-l u-mb-m">
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
          <p class="c-desc__text u-pb-m">テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキ…</p>
          <div class="p-mypage__link">
            <a href="" class="c-btn__main--gray2">気になるを解除</a>
            <a href="" class="c-btn__main--blue">詳細を見る</a>
          </div>
        </div>
      </div>
      <div href="" class="p-mypage__item u-pb-l u-mb-m">
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
          <p class="c-desc__text u-pb-m">テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキ…</p>
          <div class="p-mypage__link">
            <a href="" class="c-btn__main--gray2">気になるを解除</a>
            <a href="" class="c-btn__main--blue">詳細を見る</a>
          </div>
        </div>
      </div>
      <div href="" class="p-mypage__item u-pb-l u-mb-m">
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
          <p class="c-desc__text u-pb-m">テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキ…</p>
          <div class="p-mypage__link">
            <a href="" class="c-btn__main--gray2">気になるを解除</a>
            <a href="" class="c-btn__main--blue">詳細を見る</a>
          </div>
        </div>
      </div>
      <div href="" class="p-mypage__item u-pb-l u-mb-m">
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
          <p class="c-desc__text u-pb-m">テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキ…</p>
          <div class="p-mypage__link">
            <a href="" class="c-btn__main--gray2">気になるを解除</a>
            <a href="" class="c-btn__main--blue">詳細を見る</a>
          </div>
        </div>
      </div>


      <div>ページネーション</div>

    </div>
  </section>

</div>

@endsection