@extends('layouts.app')

@section('content')
<div class="l-container l-sidebar">
  <section class="l-sidebar__detail">
    
    <idea-info-component :is-login="{{ $isLogin }}" :idea="{{ json_encode($idea) }}" :like-lists="{{ $likeLists }}" :is-bought="{{ $isBought }}"></idea-info-component>

    <div class="p-detail__review">
      <h3 class="p-detail__review__heading u-pb-l">{{ __('Reviews from buyers') }}</h3>
      <div class="p-detail__review__body">

        {{-- レビューがない場合 --}}
        @if($idea->evaluations == "[]")
        <p class="u-pb-m u-mb-xxl">
          {{ __ ('Nothing yet') }}
        </p>
        {{-- レビューがある場合 --}}
        @else
          @foreach($idea->evaluations as $evaluation)
            <div class="p-detail__review__item u-pb-m u-mb-xxl">
              <div class="p-detail__review__sub">
                <p class="p-detail__review__date">{{ date('Y/m/d', strtotime($evaluation->created_at)) }}</p>
                <p class="p-detail__review__date">{{ date('G:i', strtotime($evaluation->created_at))}}</p>
              </div>
              <div class="p-detail__review__desc">
                <p class="p-detail__review__text u-pb-s">{{$evaluation->idea_review}}</p>
                <div class="p-detail__review__info u-pb-s">
                  <img src="{{ asset('./img/star.svg') }}" alt="{{ __('Icon of Star') }}" class="p-detail__review__star">
                  <span class="p-detail__review__point">{{ $evaluation->five_rank }}</span>
                  <span class="p-detail__review__point">by {{ $evaluation->user->name }}</span>
                </div>
              </div>
            </div>
          @endforeach
        @endif
        
      </div>
    </div>
  </section>

  <section class="l-sidebar__sub">
    <div class="c-fixed__show">
      <div class="p-checkout__pay u-mb-l">
        <p class="p-checkout__price u-pb-xl">{{ number_format($idea->idea_price) }}円</p>
        {{-- 未ログイン時 --}}
        @if($isLogin === 'false' && $isBought === 'false')
        <a href="{{ route('login') }}" class="c-btn__main--blue u-m-0auto">{{ __('After login,') }}<br>{{ __('You can buy') }}</a>
        {{-- ログインしているが、自分の出品したものの場合 --}}
        @elseif($isLogin === 'true' && $idea->user_id === $user->id)
        <button class="c-btn__main--blue2 u-m-0auto" disabled="true">{{ __("Can't buy")}}</button>
        </form>
        {{-- ログインしているが、未購入時 --}}
        @elseif($isLogin === 'true' && $isBought === 'false')
        <form action="{{ route('ideas.buy', $idea->id) }}" method="POST">
          @csrf
          <input type="submit" class="c-btn__main--blue u-m-0auto" value="{{ __('To buy') }}">
        </form>
        {{-- 購入済み時 --}}
        @elseif($isLogin === 'true' && $isBought === 'true')
        <button class="c-btn__main--blue2 u-m-0auto" disabled="true">{{ __('Purchased') }}</button>
        @endif
      </div>
      {{-- 購入済みでまだレビューしていない時はレビューが可能 --}}
      {{-- レビュー投稿フォーム --}}
      @if($isBought === 'true' && empty($review) )
      <form action="{{ route('evaluations.store', $idea->id) }}" method="POST" class="p-checkout__review u-mb-m">
        @csrf
        @component('components.evaluationForm')
          @slot('review', $review);
        @endcomponent
      </form>
      {{-- レビュー修正フォーム --}}
      @elseif($isBought === 'true' && !empty($review))
      <form action="{{ route('evaluations.update', $idea->id) }}" method="POST" class="p-checkout__review u-mb-l">
        @csrf
        @component('components.evaluationForm')
          @slot('review', $review);
        @endcomponent
      </form>
      @endif
      <a href="{{ URL::previous() }}" class="p-mymenu__back u-pb-m">&lt; {{ __('Back') }}</a>
    </div>
  </section>

</div>

@endsection
