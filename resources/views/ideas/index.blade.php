@extends('layouts.app')

@section('content')
<div class="l-container">

  <form action="{{ route('ideas.index') }}" method="GET" class="p-sort u-mb-xl">
    <h4 class="p-sort__title u-pb-xl">{{ __('Refine search') }}</h4>
    <div class="p-sort__body u-pb-l">
      <div class="p-sort__item">
        <p class="p-sort__item__title u-pb-s">{{ __('Category') }}</p>
        <select name="category" class="p-sort__item__select u-border @error('category') is-invalid @enderror">
          <option value="">{{ __('Please select') }}</option>
          @foreach($categories as $category)
            <option value="{{ $category->id }}" @if((!empty($inputData['category'])? $inputData['category'] : '') == $category->id) selected @endif>{{ $category->category_name}}</option>
          @endforeach
        </select>
      </div>
      <div class="p-sort__price">
        <p class="p-sort__item__title u-pb-s">{{ __("Price") }}</p>
        <div class="p-sort__price__body">
          <input type="number" name="low" class="p-sort__price__number u-border @error('low') is-invalid @enderror" min="1" value="{{ !empty($inputData['low'])? $inputData['low'] : '' }}">
          <span>{{ __('yen or more') }}</span>
          <input type="number" name="high" class="p-sort__price__number u-border @error('hight') is-invalid @enderror" min="1" value="{{ !empty($inputData['high'])? $inputData['high'] : '' }}">
          <span>{{ __('yen or less') }}</span>
        </div>
      </div>
      <div class="p-sort__item">
        <p class="p-sort__item__title u-pb-s">{{ __('Exhibition date') }}</p>
        <select name="day" class="p-sort__item__select u-border @error('day') is-invalid @enderror">
          <option value="">{{ __('Please select') }}</option>
          <option value="1" @if((!empty($inputData['day'])? $inputData['day'] : '') === '1') selected @endif>{{ __('new order')}}</option>
          <option value="2" @if((!empty($inputData['day'])? $inputData['day'] : '') === '2') selected @endif>{{ __('old order')}}</option>
        </select>
      </div>
      <div class="p-sort__item">
        <p class="p-sort__item__title u-pb-s">{{ __('Title search') }}</p>
        <input type="text" name="title" class="p-sort__item__select u-border @error('title') is-invalid @enderror" value="{{ old('title',!empty($inputData['title'])? $inputData['title'] : '') }}" placeholder="{{ __('Please enter') }}" >
        @error('title')
          <span class="c-form__item--alert" role="alert">{{ $message }}</span>
        @enderror
      </div>
    </div>
    <input type="submit" class="c-btn__main--gray1 u-mb-m" value="{{ __('Narrow down') }}">
  </form>

  <section class="p-index">
    <h1 class="p-index__title u-pb-m">{{ __('List of HIRAMEKI') }}</h1>
    <p class="p-index__sort-result u-pb-xxl">
      {{ $ideas->total() }}{{ __('cases') }}　{{ $ideas->firstItem()?? '0'}}{{ __('case') }}〜{{ $ideas->lastItem()?? '0'}}{{ __('case View') }}
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
  </section>

</div>

@endsection
