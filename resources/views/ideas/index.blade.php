@extends('layouts.app')

@section('content')
<div class="l-container">

  <form action="{{ route('ideas.index') }}" method="GET" class="p-sort u-mb-xl">
    <h4 class="p-sort__title u-pb-xl">絞り込み</h4>
    <div class="p-sort__body u-pb-l">
      <div class="p-sort__item">
        <p class="p-sort__item__title u-pb-s">カテゴリ</p>
        <select name="category" class="p-sort__item__select u-border">
          <option value="">選択してください</option>
          @foreach($categories as $category)
            <option value="{{ $category->id }}" @if((!empty($inputData['category'])? $inputData['category'] : '') == $category->id) selected @endif>{{ $category->category_name}}</option>
          @endforeach
        </select>
      </div>
      <div class="p-sort__price">
        <p class="p-sort__item__title u-pb-s">価格</p>
        <div class="p-sort__price__body">
          <input type="number" name="low" class="p-sort__price__number" min="1" value="{{ !empty($inputData['low'])? $inputData['low'] : '' }}">
          <span>円から</span>
          <input type="number" name="high" class="p-sort__price__number" min="1" value="{{ !empty($inputData['high'])? $inputData['high'] : '' }}">
          <span>円まで</span>
        </div>
      </div>
      <div class="p-sort__item">
        <p class="p-sort__item__title u-pb-s">出品日付</p>
        <select name="day" class="p-sort__item__select u-border">
          <option value="">選択してください</option>
          <option value="1" @if((!empty($inputData['day'])? $inputData['day'] : '') === '1') selected @endif>新しい順</option>
          <option value="2" @if((!empty($inputData['day'])? $inputData['day'] : '') === '2') selected @endif>古い順</option>
        </select>
      </div>
      <div class="p-sort__item">
        <p class="p-sort__item__title u-pb-s">星の数</p>
        <select name="star" class="p-sort__item__select u-border">
          <option value="">選択してください</option>
          <option value="1" @if((!empty($inputData['star'])? $inputData['star'] : '') === '1') selected @endif>多い順</option>
          <option value="2" @if((!empty($inputData['star'])? $inputData['star'] : '') === '2') selected @endif>少ない順</option>
        </select>
      </div>
    </div>
    <input type="submit" class="c-btn__main--gray1 u-mb-m" value="絞り込む">
  </form>

  <section class="p-index">
    <h1 class="p-index__title u-pb-m">ヒラメキ一覧</h1>
    <p class="p-index__sort-result u-pb-xxl">
      {{ $ideas->total() }}件中　{{ $ideas->firstItem()?? '0'}}件〜{{ $ideas->lastItem()?? '0'}}件を表示
    </p>
    <div class="p-index__body u-pb-3l">

      @foreach($ideas as $idea)
      <a href="{{ route('ideas.show', $idea->id) }}" class="p-index__item u-pb-l u-mb-m">
        <div class="p-index__icon">
          <div class="p-index__icon__img">
            <img src="{{ $idea->user->user_img ? asset('/storage/user_images/' . $idea->user->user_img) : asset('./img/no-img2.svg') }}" alt="人のアイコン">
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
            <img src="{{ asset('./img/star.svg') }}" alt="星のアイコン" class="c-desc__star">
            <span class="c-desc__point">{{ (!empty($idea->avgFive_rank[0]->average))? round($idea->avgFive_rank[0]->average, 1) : '-'}} ({{ count($idea->evaluations) }}件)</span>
            <span class="c-desc__price">{{ number_format($idea->idea_price) }}円</span>
          </div>
          <p class="c-desc__text">
            {{ mb_strimwidth($idea->idea_description, 0, 83, "…詳細を見る", "UTF-8") }}</p>
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
