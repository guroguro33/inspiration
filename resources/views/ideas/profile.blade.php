@extends('layouts.app')

@section('title'){{ __('Edit profile') }}@endsection

@section('description')
{{ __('This is the profile edit page.')}}{{ __("Inspiration is a market site for buying and selling ideas. If you have an idea but can't shape it, why not sell that inspiration? If you can't think of an idea for a web service at all, why not buy inspiration for another person? It is a service that matches such people.")}}
@endsection

@section('content')
<div class="l-container">

  <section class="p-profile u-mb-l">
    <h1 class="p-mypage__title u-pb-m">{{ __('プロフィール紹介') }}</h1>
    <div class="u-mb-l">
      <div class="p-mymenu__img u-mb-m">
        @if($isImage)
        <img src="{{ asset('/storage/user_images/' . $user->user_img) }}" class="js-preview" alt="{{ __('Icon of User') }}">
        @else
        <img src="{{ asset('./img/no-img2.svg') }}" class="js-preview" alt="{{ __('Icon of User') }}">
        @endif
      </div>
    </div>
    <ul>
      <li class="p-profile__name u-pb-l">{{ $user->name }}</li>
      @if(!empty($user->user_introduce))
      <li class="p-profile__intro u-bg--sub u-mb-3l">{{ $user->user_introduce }}</li>
      @else
      <li class="p-profile__intro u-bg--sub u-mb-3l">自己紹介はありません</li>
      @endif
    </ul>
  </section>

  <section class="p-index">
    <h2 class="p-index__title u-pb-m">{{ $user->name }}さんの{{ __('List of HIRAMEKI') }}</h2>
    <p class="p-index__sort-result u-pb-xxl">
      {{ $ideas->total() }}{{ __('cases') }}  {{ $ideas->firstItem()?? '0'}}{{ __('case') }}〜{{ $ideas->lastItem()?? '0'}}{{ __('case View') }}
    </p>
    <div class="p-index__body u-pb-3l">

      @foreach($ideas as $idea)
      <a href="{{ route('ideas.show', $idea->id) }}" class="p-index__item u-pb-l u-mb-m">
        <div class="p-index__icon">
          <div class="p-index__icon__img">
            <img src="{{ $idea->user->user_img ? asset('/storage/user_images/' . $idea->user->user_img) : asset('./img/no-img2.svg') }}" alt="{{ __('Icon of User')}}">
          </div>
        <p class="p-index__icon__name">{{ $idea->user->name }}</p>
        </div>
        <div class="p-index__sub">
          <p class="p-index__sub__date">{{ date('Y/m/d', strtotime($idea->created_at)) }}</p>
          <p class="p-index__sub__date">{{ date('G:i', strtotime($idea->created_at)) }}</p>
          <p class="p-index__sub__cat">{{ $idea->category->category_name}}</p>
        </div>
        <div class="p-index__desc c-desc">
          <h3 class="c-desc__title">{{ mb_strimwidth($idea->idea_title, 0 ,65, "…", "UTF-8") }}</h3>
          <div class="c-desc__info u-pb-s">
            <img src="{{ asset('./img/star.svg') }}" alt="{{ __('Icon of Star') }}" class="c-desc__star">
            <span class="c-desc__point">{{ (!empty($idea->avgFive_rank[0]->average))? round($idea->avgFive_rank[0]->average, 1) : '-'}} ({{ count($idea->evaluations) }}{{ __('case') }})</span>
            <span class="c-desc__price">{{ number_format($idea->idea_price) }}{{ __('yen') }}</span>
          </div>
          <p class="c-desc__text">
            {{ mb_strimwidth($idea->idea_description, 0, 83, "…", "UTF-8") }}</p>
        </div>
      </a>
      @endforeach
      
    </div>
    <div class="u-pb-3l">
      {{ $ideas->appends(request()->query())->links('vendor/pagination/default') }}
    </div>

    <a href="{{ URL::previous() }}" class="p-profile__back u-pb-xxl">&lt; {{ __('Back')}}</a>

  </section>


</div>
@endsection