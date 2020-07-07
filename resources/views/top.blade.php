@extends('layouts.app')

@section('content')
<section class="p-hero l-container js-float-menu-target">
  <div class="p-hero__content">
    <h1 class="p-hero__msg u-pb-4l">「ヒラメキ」<br>を売り買いしよう</h1>
    <div class="p-hero__links">
      <ul class="p-hero__list">
        <li class="p-hero__item"><a href="{{ route('ideas.index')}}" class="c-btn__sub--top">ヒラメキを買う</a></li>
        <li class="p-hero__item">
          <a href="{{ route('ideas.create') }}" class="c-btn__sub--top">ヒラメキを売る</a>
          @guest
          <p class="p-hero__intro">(新規登録へ移動します)</p>
          @endguest
        </li>
      </ul>
    </div>
  </div>
</section>

<section class="c-concept">
  <div class="l-container">
    <h2 class="c-section__title u-pb-s">Inspirationとは</h2>
    <p class="c-section__sub-title u-pb-4l">ヒラめいたアイデアを売買する<br>マーケットサイトです</p>
    <div class="c-concept__info">
      <div class="c-concept__item">
        <div class="c-concept__icon u-mb-xl">
          <img src="./img/index-icon1.svg" alt="アイデアマンのアイコン">
        </div>
        <h3 class="c-concept__heading u-pb-l">特徴</h3>
        <div class="c-concept__body">
          <p class="c-concept__text">・アカウントを作成すれば、ヒラメキを売ることも買うこともできます。</p>
          <p class="c-concept__text">・購入者はそのヒラメキについてのレビューや評価をつけることができ、誰でもそれを見ることができます。</p>
        </div>
      </div>
      <div class="c-concept__item">
        <div class="c-concept__icon u-mb-xl">
          <img src="./img/index-icon2.svg" alt="時計のアイコン">
        </div>
        <h3 class="c-concept__heading u-pb-l">経緯</h3>
        <div class="c-concept__body">
          <p class="c-concept__text">
            ・アイデアマンが必ずしもスキルをもっていて実装できるわけではないのは勿体ない。そのヒラメキを他の人が譲り受け、世の中にサービスとして提供できれば、もっと世の中が便利になるのではないかと考えました。</p>
        </div>
      </div>
      <div class="c-concept__item">
        <div class="c-concept__icon u-mb-xl">
          <img src="./img/index-icon3.svg" alt="握手のアイコン">
        </div>
        <h3 class="c-concept__heading u-pb-l">こんな人におすすめ</h3>
        <div class="c-concept__body">
          <p class="c-concept__text">・「アイデアはあるけど事業資金がなく形にできない」、「プログラミングスキルがないからサービスが作れない」→そのヒラメキを売ってみませんか？
          </p>
          <p class="c-concept__text">・「WEBサービスが全然思いつかない」、「いつも同じようなサービスしか思いつかない」→他の人のヒラメキを買ってみませんか？</p>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="p-review">
  <div class="l-container">
    <h2 class="c-section__title u-pb-s">寄せられたレビュー</h2>
    <p class="c-section__sub-title u-pb-4l">実際に購入した方のレビューの一部をご紹介</p>
    
    @foreach($evaluations as $evaluation)
    <div class="p-review__item u-mb-xxl">
      <div class="p-review__icon">
        @if($evaluation->user->user_img)
        <img src="{{ asset('/storage/user_images/' . $evaluation->user->user_img) }}" alt="ユーザーのアイコン">
        @else
        <img src="{{ asset('./img/no-img2.svg') }}" alt="ユーザーのアイコン">
        @endif
      </div>
      <div class="p-review__body">
        <p class="p-review__text u-pb-m">
          {!! nl2br(e($evaluation->idea_review)) !!}
        </p>
        <p class="p-review__name">By {{ $evaluation->user->name}}</p>
      </div>
    </div>
    @endforeach

</section>
@endsection
