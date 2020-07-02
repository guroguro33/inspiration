@extends('layouts.app')

@section('content')
<div class="l-container l-sidebar">
  <section class="l-sidebar__detail">
    
    <idea-info-component :idea="{{ $idea }}" :like-lists="{{ !empty($likeLists)? $likeLists : '' }}"></idea-info-component>

    <div class="p-detail__review">
      <h3 class="p-detail__review__heading u-pb-l">購入者からのレビュー</h3>
      <div class="p-detail__review__body">

        @foreach($idea->evaluations as $evaluation)
        <div class="p-detail__review__item u-pb-m u-mb-xxl">
          <div class="p-detail__review__sub">
            <p class="p-detail__review__date">{{ date('Y/m/d', strtotime($evaluation->created_at)) }}</p>
            <p class="p-detail__review__date">{{ date('G:i', strtotime($evaluation->created_at))}}</p>
          </div>
          <div class="p-detail__review__desc">
            <h4 class="p-detail__review__text u-pb-s">
              {!! nl2br(e($evaluation->idea_review)) !!}
            </h4>
            <div class="p-detail__review__info u-pb-s">
              <img src="{{ asset('./img/star.svg') }}" alt="星のアイコン" class="p-detail__review__star">
              <span class="p-detail__review__point">{{ $evaluation->five_rank }}</span>
              <span class="p-detail__review__point">by {{ $evaluation->user->name }}</span>
            </div>
          </div>
        </div>
        @endforeach
        
      </div>
    </div>
  </section>

  <section class="l-sidebar__sub">
    <div class="p-checkout__pay">
      <p class="p-checkout__price u-pb-xl">{{ number_format($idea->idea_price) }}円</p>
      <a href="" class="c-btn__main--blue u-m-0auto">購入する</a>
    </div>
  </section>

</div>

@endsection
