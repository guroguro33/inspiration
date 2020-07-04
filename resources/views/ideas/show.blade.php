@extends('layouts.app')

@section('content')
<div class="l-container l-sidebar">
  <section class="l-sidebar__detail">
    
    <idea-info-component :is-login="{{ $isLogin }}" :idea="{{ $idea }}" :like-lists="{{ $likeLists }}" :is-bought="{{ $isBought}}"></idea-info-component>

    <div class="p-detail__review">
      <h3 class="p-detail__review__heading u-pb-l">購入者からのレビュー</h3>
      <div class="p-detail__review__body">

        {{-- レビューがない場合 --}}
        @if($idea->evaluations == "[]")
        <p class="u-pb-m u-mb-xxl">
          まだありません
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
                  <img src="{{ asset('./img/star.svg') }}" alt="星のアイコン" class="p-detail__review__star">
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
    <div class="p-checkout__pay u-mb-l">
      <p class="p-checkout__price u-pb-xl">{{ number_format($idea->idea_price) }}円</p>
      {{-- 未ログイン時 --}}
      @if($isLogin === 'false' && $isBought === 'false')
      <a href="{{ route('register') }}" class="c-btn__main--blue u-m-0auto">新規登録後、<br>購入できます</a>
      {{-- ログインしているが、未購入時 --}}
      @elseif($isLogin === 'true' && $isBought === 'false')
      <form action="{{ route('ideas.buy', $idea->id) }}" method="POST">
        @csrf
        <input type="submit" class="c-btn__main--blue u-m-0auto" value="購入する">
      </form>
      {{-- 購入済み時 --}}
      @elseif($isLogin === 'true' && $isBought === 'true')
      <button class="c-btn__main--blue2 u-m-0auto" disabled="true">購入済み</button>
      @endif
    </div>
    {{-- 購入済みでまだレビューしていない時はレビューが可能 --}}
    @if($isBought === 'true' && empty($review) )
    <form action="{{ route('evaluations.store', $idea->id) }}" method="POST" class="p-checkout__review">
      @csrf
      <p class="p-checkout__review__heading u-pb-xxl">レビューをお願いします</p>
      <label class="p-checkout__review__point-area">
        <p class="u-pb-m">５段階評価</p>
        <select name="five_rank" class="p-checkout__review__point">
          <option value="1">1</option>
          <option value="2">2</option>
          <option value="3">3</option>
          <option value="4">4</option>
          <option value="5">5</option>
        </select>
      </label>
      <label class="p-checkout__review__comment-area">
        <p class="u-pb-m">レビュー</p>
        <textarea name="idea_review" cols="18" rows="10" class="p-checkout__review__comment u-mb-m @error('idea_review') is-invalid @enderror" placeholder="レビューを入力してください"  autocomplete="off" required>{{ old('idea_reivew') }}</textarea>
      </label>
      @error('idea_review')
      <span class="c-form__item--alert u-pb-l">{{ $message }}</span>
      @enderror
      <input type="submit" class="c-btn__main--gray2 u-m-0auto" value="登録する">
    </form>
    @elseif($isBought === 'true' && !empty($review))
    <form action="{{ route('evaluations.update', $idea->id) }}" method="POST" class="p-checkout__review">
      @csrf
      <p class="p-checkout__review__heading u-pb-xxl">レビューを修正しますか？</p>
      <label class="p-checkout__review__point-area">
        <p class="u-pb-m">５段階評価</p>
        <select name="five_rank" class="p-checkout__review__point">
          <option value="1" @if(old('five_rank', !empty($review)? $review->five_rank : '') == "1") selected @endif>1</option>
          <option value="2" @if(old('five_rank', !empty($review)? $review->five_rank : '') == "2") selected @endif>2</option>
          <option value="3" @if(old('five_rank', !empty($review)? $review->five_rank : '') == "3") selected @endif>3</option>
          <option value="4" @if(old('five_rank', !empty($review)? $review->five_rank : '') == "4") selected @endif>4</option>
          <option value="5" @if(old('five_rank', !empty($review)? $review->five_rank : '') == "5") selected @endif>5</option>
        </select>
      </label>
      <label class="p-checkout__review__comment-area">
        <p class="u-pb-m">レビュー</p>
        <textarea name="idea_review" cols="18" rows="10" class="p-checkout__review__comment u-mb-m @error('idea_review') is-invalid @enderror" placeholder="レビューを入力してください"  autocomplete="off" required>{{ old('idea_reivew', !empty($review)? $review->idea_review : '') }}</textarea>
      </label>
      @error('idea_review')
      <span class="c-form__item--alert u-pb-l">{{ $message }}</span>
      @enderror
      <input type="submit" class="c-btn__main--gray2 u-m-0auto" value="登録する">
    </form>
    @endif
  </section>

</div>

@endsection
