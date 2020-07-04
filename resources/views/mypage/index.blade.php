@extends('layouts.app')

@section('content')
<div class="l-container l-sidebar--reverse">

  @component('components.mypageSidebar')
    @slot('user', $user);
    @slot('isImage', $isImage);
  @endcomponent

  <section class="l-sidebar__mypage">
    <h1 class="p-mypage__title u-pb-m">マイページ</h1>
    <div class="p-mypage__unit u-mb-xxl">
      <div class="p-mypage__heading u-pb-s u-mb-m">
        <h2 class="p-mypage__heading__text">出品したヒラメキ（最新{{ count($user_data->ideas) }}件）</h2>
        <a href="{{ route('mypage.lists') }}" class="c-btn__sub--mypage">全件表示</a>
      </div>
      @foreach($user_data->ideas as $idea)
      <a href="{{ route('ideas.show', $idea->id) }}" class="p-mypage__item u-pb-l u-mb-m u-opacity">
        <div class="p-mypage__sub">
          <time class="p-mypage__sub__date">{{ date('Y/m/d', strtotime($idea->created_at)) }}</time>
          <p class="p-mypage__sub__date">{{ date('G:i', strtotime($idea->created_at)) }}</p>
          <p class="p-mypage__sub__cat">{{ $idea->category->category_name}}</p>
        </div>
        <div class="p-mypage__desc c-desc">
          <h3 class="c-desc__title">{{ mb_strimwidth($idea->idea_title, 0, 65, "…", "UTF-8") }}</h3>
          <div class="c-desc__info u-pb-s">
            <img src="{{ asset('./img/star.svg') }}" alt="星のアイコン" class="c-desc__star">
            <span class="c-desc__point">4({{ count($idea->evaluations) }}件)</span>
            <span class="c-desc__price">{{ number_format($idea->idea_price) }}円</span>
          </div>
          <p class="c-desc__text">{{ mb_strimwidth($idea->idea_description, 0, 83, "…", "UTF-8") }}</p>
        </div>
      </a>
      @endforeach

    </div>

    <div class="p-mypage__unit u-mb-xxl">
      <div class="p-mypage__heading u-pb-s u-mb-m">
        <h2 class="p-mypage__heading__text">購入者からの<br>レビュー（最新{{ count($evaluations) }}件）</h2>
        <a href="{{ route('mypage.reviews') }}" class="c-btn__sub--mypage">全件表示</a>
      </div>
      @foreach($evaluations as $evaluation)
      <a href="{{ route('ideas.show', $evaluation->idea->id) }}" class="p-mypage__item u-pb-l u-mb-m u-opacity">
        <div class="p-mypage__sub">
          <p class="p-mypage__sub__date">{{ date('Y/m/d', strtotime($evaluation->created_at)) }}</p>
          <p class="p-mypage__sub__date">{{ date('G:i', strtotime($evaluation->created_at)) }}</p>
          <p class="p-mypage__sub__cat">{{ $evaluation->idea->category->category_name}}</p>
        </div>
        <div class="p-mypage__desc c-desc">
          <h3 class="c-desc__title">{{ mb_strimwidth($evaluation->idea_review, 0, 65, "…", "UTF-8") }}</h3>
          <div class="c-desc__info u-pb-s">
            <img src="{{ asset('./img/star.svg') }}" alt="星のアイコン" class="c-desc__star">
            <span class="c-desc__point">{{ $evaluation->five_rank}}</span>
            <span class="c-desc__point">by {{ $evaluation->user->name }}</span>
          </div>
          <div class="p-mypage__desc__post">
            <p class="c-desc__text">{{ mb_strimwidth($evaluation->idea->idea_title, 0, 65, "…", "UTF-8") }}</p>
            <span class="c-desc__price">{{ number_format($evaluation->idea->idea_price) }}円</span>
          </div>
        </div>
      </a>
      @endforeach
    </div>

    <div class="p-mypage__unit u-mb-xxl">
      <div class="p-mypage__heading u-pb-s u-mb-m">
        <h2 class="p-mypage__heading__text">購入したヒラメキ（最新{{ count($user_data->purchases) }}件）</h2>
        <a href="{{ route('mypage.purchases') }}" class="c-btn__sub--mypage">全件表示</a>
      </div>
      @foreach($user_data->purchases as $purchase)
      <a href="{{ route('ideas.show', $purchase->idea_id) }}" class="p-mypage__item u-pb-l u-mb-m u-opacity">
        <div class="p-mypage__sub">
          <p class="p-mypage__sub__date">{{ date('Y/m/d', strtotime($purchase->created_at)) }}</p>
          <p class="p-mypage__sub__date">{{ date('G:i', strtotime($purchase->created_at)) }}</p>
          <p class="p-mypage__sub__cat">{{ $purchase->idea->category->category_name}}</p>
        </div>
        <div class="p-mypage__desc c-desc">
          <h3 class="c-desc__title">{{ mb_strimwidth($purchase->idea->idea_title, 0, 65, "…", "UTF-8") }}</h3>
          <div class="c-desc__info u-pb-s">
            <img src="{{ asset('./img/star.svg') }}" alt="星のアイコン" class="c-desc__star">
            <span class="c-desc__point">3.5({{ count($purchase->idea->evaluations) }}件)</span>
            <span class="c-desc__price">{{ number_format($purchase->idea->idea_price) }}円</span>
          </div>
          <p class="c-desc__text">{{ mb_strimwidth($purchase->idea->idea_description, 0, 83, "…", "UTF-8") }}</p>
        </div>
      </a>
      @endforeach
    </div>

    <div class="p-mypage__unit u-mb-xxl">
      <div class="p-mypage__heading u-pb-s u-mb-m">
        <h2 class="p-mypage__heading__text">気になるリスト（最新{{ count($user_data->likes) }}件）</h2>
        <a href="{{ route('mypage.likes') }}" class="p-mypage__heading__link c-btn__sub--mypage">全件表示</a>
      </div>
      @foreach($user_data->likes as $like)
      <a href="{{ route('ideas.show', $like->idea_id) }}" class="p-mypage__item u-pb-l u-mb-m u-opacity">
        <div class="p-mypage__sub">
          <p class="p-mypage__sub__date">{{ date('Y/m/d', strtotime($like->created_at)) }}</p>
          <p class="p-mypage__sub__date">{{ date('G:i', strtotime($like->created_at)) }}</p>
          <p class="p-mypage__sub__cat">{{ $like->idea->category->cateogry_id }}</p>
        </div>
        <div class="p-mypage__desc c-desc">
          <h3 class="c-desc__title">{{ mb_strimwidth($like->idea->idea_title, 0, 65, "…", "UTF-8") }}</h3>
          <div class="c-desc__info u-pb-s">
            <img src="{{ asset('./img/star.svg') }}" alt="星のアイコン" class="c-desc__star">
            <span class="c-desc__point">3.5({{ count($like->idea->evaluations) }})</span>
            <span class="c-desc__price">{{ number_format($like->idea->idea_price) }}円</span>
          </div>
          <p class="c-desc__text">{{ mb_strimwidth($like->idea->idea_description, 0, 83, "…", "UTF-8") }}</p>
        </div>
      </a>
      @endforeach
    </div>

  </section>

</div>


@endsection