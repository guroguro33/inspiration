@extends('layouts.app')

@section('title'){{ __('MyPage') }}@endsection

@section('description')
{{ __('This is my page that displays the latest 5 items of each item.')}}{{ __("Inspiration is a market site for buying and selling ideas. If you have an idea but can't shape it, why not sell that inspiration? If you can't think of an idea for a web service at all, why not buy inspiration for another person? It is a service that matches such people.")}}
@endsection

@section('content')
<div class="l-container l-sidebar--reverse">

  @component('components.mypageSidebar')
    @slot('user', $user);
    @slot('isImage', $isImage);
  @endcomponent

  <section class="l-sidebar__mypage">
    <h1 class="p-mypage__title u-pb-m">{{ __('MyPage') }}</h1>
    <div class="p-mypage__unit u-mb-xxl">
      <div class="p-mypage__heading u-pb-s u-mb-m">
        <h2 class="p-mypage__heading__text">{{ __('Exhibited inspirations') }}（{{ __('Latest') }}  {{ count($user_data->ideas) }}{{ __('case') }}）</h2>
        <a href="{{ route('mypage.lists') }}" class="c-btn__sub--mypage">{{ __('Show all') }}</a>
      </div>
      @if(empty($user_data->ideas->toArray()))
        <p>{{ __('Nothing yet') }}</p>
      @endif
      @foreach($user_data->ideas as $idea)
      <a href="{{ route('ideas.show', $idea->id) }}" class="p-mypage__item u-pb-l u-mb-m u-opacity">
        <div class="p-mypage__sub">
          <time class="p-mypage__sub__date">{{ date('Y/m/d', strtotime($idea->created_at)) }}</time>
          <p class="p-mypage__sub__date">{{ date('G:i', strtotime($idea->created_at)) }}</p>
          <p class="p-mypage__sub__cat">{{ $idea->category->category_name}}</p>
        </div>
        <div class="p-mypage__desc c-desc">
          <h3 class="c-desc__title">{{ mb_substr($idea->idea_title, 0, 32, "UTF-8") }}</h3>
          <div class="c-desc__info u-pb-s">
            <img src="{{ asset('./img/star.svg') }}" alt="{{ __('Icon of Star') }}" class="c-desc__star">
            <span class="c-desc__point">{{ (!empty($idea->avgFive_rank[0]->average))? round($idea->avgFive_rank[0]->average, 1) : '-'}} ({{ count($idea->evaluations) }}{{ __('case') }})</span>
            <span class="c-desc__price">{{ number_format($idea->idea_price) }}{{ __('yen') }}</span>
          </div>
          <p class="c-desc__text">{{ mb_substr($idea->idea_description, 0, 41, "UTF-8") }}</p>
        </div>
      </a>
      @endforeach

    </div>

    <div class="p-mypage__unit u-mb-xxl">
      <div class="p-mypage__heading u-pb-s u-mb-m">
        <h2 class="p-mypage__heading__text">{{ __('Reviews ') }}<br>{{ __('from buyers') }}（{{ __('Latest') }} {{ count($evaluations) }}{{ __('case') }}）</h2>
        <a href="{{ route('mypage.reviews') }}" class="c-btn__sub--mypage">{{ __('Show all') }}</a>
      </div>
      @if(empty($evaluations->toArray()))
        <p>{{ __('Nothing yet') }}</p>
      @endif
      @foreach($evaluations as $evaluation)
      <a href="{{ route('ideas.show', $evaluation->idea->id) }}" class="p-mypage__item u-pb-l u-mb-m u-opacity">
        <div class="p-mypage__sub">
          <p class="p-mypage__sub__date">{{ date('Y/m/d', strtotime($evaluation->created_at)) }}</p>
          <p class="p-mypage__sub__date">{{ date('G:i', strtotime($evaluation->created_at)) }}</p>
          <p class="p-mypage__sub__cat">{{ $evaluation->idea->category->category_name}}</p>
        </div>
        <div class="p-mypage__desc c-desc">
          <h3 class="c-desc__title">{{ mb_substr($evaluation->idea_review, 0, 32, "UTF-8") }}</h3>
          <div class="c-desc__info u-pb-s">
            <img src="{{ asset('./img/star.svg') }}" alt="{{ __('Icon of Star') }}" class="c-desc__star">
            <span class="c-desc__point">{{ $evaluation->five_rank}}</span>
            <span class="c-desc__point">by {{ $evaluation->user->name }}</span>
          </div>
          <div class="p-mypage__desc__post">
            <p class="c-desc__text">{{ mb_substr($evaluation->idea->idea_title, 0, 32, "UTF-8") }}</p>
            <span class="c-desc__price">{{ number_format($evaluation->idea->idea_price) }}{{ __('yen') }}</span>
          </div>
        </div>
      </a>
      @endforeach
    </div>

    <div class="p-mypage__unit u-mb-xxl">
      <div class="p-mypage__heading u-pb-s u-mb-m">
        <h2 class="p-mypage__heading__text">{{ __('Purchased inspirations') }}（{{ __('Latest') }} {{ count($user_data->purchases) }}{{ __('case') }}）</h2>
        <a href="{{ route('mypage.purchases') }}" class="c-btn__sub--mypage">{{ __('Show all') }}</a>
      </div>
      @if(empty($user_data->purchases->toArray()))
        <p>{{ __('Nothing yet') }}</p>
      @endif
      @foreach($user_data->purchases as $purchase)
      <a href="{{ route('ideas.show', $purchase->idea_id) }}" class="p-mypage__item u-pb-l u-mb-m u-opacity">
        <div class="p-mypage__sub">
          <p class="p-mypage__sub__date">{{ date('Y/m/d', strtotime($purchase->created_at)) }}</p>
          <p class="p-mypage__sub__date">{{ date('G:i', strtotime($purchase->created_at)) }}</p>
          <p class="p-mypage__sub__cat">{{ $purchase->idea->category->category_name}}</p>
        </div>
        <div class="p-mypage__desc c-desc">
          <h3 class="c-desc__title">{{ mb_substr($purchase->idea->idea_title, 0, 32, "UTF-8") }}</h3>
          <div class="c-desc__info u-pb-s">
            <img src="{{ asset('./img/star.svg') }}" alt="{{ __('Icon of Star') }}" class="c-desc__star">
            <span class="c-desc__point">{{ (!empty($purchase->idea->avgFive_rank[0]->average))? round($purchase->idea->avgFive_rank[0]->average, 1) : '-'}} ({{ count($purchase->idea->evaluations) }}{{ __('case') }})</span>
            <span class="c-desc__price">{{ number_format($purchase->idea->idea_price) }}{{ __('yen') }}</span>
          </div>
          <p class="c-desc__text">{{ mb_substr($purchase->idea->idea_description, 0, 41, "UTF-8") }}</p>
        </div>
      </a>
      @endforeach
    </div>

    <div class="p-mypage__unit u-mb-xxl">
      <div class="p-mypage__heading u-pb-s u-mb-m">
        <h2 class="p-mypage__heading__text">{{ __('Anxious list') }}（{{ __('Latest') }} {{ count($user_data->likes) }}{{ __('case') }}）</h2>
        <a href="{{ route('mypage.likes') }}" class="p-mypage__heading__link c-btn__sub--mypage">{{ __('Show all') }}</a>
      </div>
      @if(empty($user_data->likes->toArray()))
        <p>{{ __('Nothing yet') }}</p>
      @endif
      @foreach($user_data->likes as $like)
      <a href="{{ route('ideas.show', $like->idea_id) }}" class="p-mypage__item u-pb-l u-mb-m u-opacity">
        <div class="p-mypage__sub">
          <p class="p-mypage__sub__date">{{ date('Y/m/d', strtotime($like->created_at)) }}</p>
          <p class="p-mypage__sub__date">{{ date('G:i', strtotime($like->created_at)) }}</p>
          <p class="p-mypage__sub__cat">{{ $like->idea->category->cateogry_id }}</p>
        </div>
        <div class="p-mypage__desc c-desc">
          <h3 class="c-desc__title">{{ mb_substr($like->idea->idea_title, 0, 32, "UTF-8") }}</h3>
          <div class="c-desc__info u-pb-s">
            <img src="{{ asset('./img/star.svg') }}" alt="{{ __('Icon of Star') }}" class="c-desc__star">
            <span class="c-desc__point">{{ (!empty($like->idea->avgFive_rank[0]->average))? round($like->idea->avgFive_rank[0]->average, 1) : '-'}} ({{ count($like->idea->evaluations) }}{{ __('case') }})</span>
            <span class="c-desc__price">{{ number_format($like->idea->idea_price) }}{{ __('yen') }}</span>
          </div>
          <p class="c-desc__text">{{ mb_substr($like->idea->idea_description, 0, 41, "UTF-8") }}</p>
        </div>
      </a>
      @endforeach
    </div>

  </section>

</div>


@endsection