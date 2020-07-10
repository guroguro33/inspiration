@extends('layouts.app')

@section('content')
<section class="p-hero l-container js-float-menu-target">
  <div class="p-hero__content">
    <h1 class="p-hero__msg u-pb-4l">「{{ __('HIRAMEKI') }}」<br>{{ __('Buy and Sell') }}</h1>
    <div class="p-hero__links">
      <ul class="p-hero__list">
        <li class="p-hero__item"><a href="{{ route('ideas.index')}}" class="c-btn__sub--top">{{ __('Buy ideas') }}</a></li>
        <li class="p-hero__item">
          <a href="{{ route('ideas.create') }}" class="c-btn__sub--top">{{ __('Sell ideas') }}</a>
          @guest
          <p class="p-hero__intro">({{ __('To registration') }})</p>
          @endguest
        </li>
      </ul>
    </div>
  </div>
</section>

<section class="c-concept">
  <div class="l-container">
    <h2 class="c-section__title u-pb-s">{{ __("What's Inspiration?") }}</h2>
    <p class="c-section__sub-title u-pb-4l">{{ __("A market site for buying and selling") }}<br>{{ __(" inspirational ideas.") }}</p>
    <div class="c-concept__info">
      <div class="c-concept__item">
        <div class="c-concept__icon u-mb-xl">
          <img src="./img/index-icon1.svg" alt="{{ __('Icon of Idea-man')}}">
        </div>
        <h3 class="c-concept__heading u-pb-l">{{ __('Feature') }}</h3>
        <div class="c-concept__body">
          <p class="c-concept__text">・{{ __('If you create an account, you can sell or buy inspirations.') }}</p>
          <p class="c-concept__text">・{{ __('The buyer can give a review and rating about the inspiration, and anyone can see it.')}}</p>
        </div>
      </div>
      <div class="c-concept__item">
        <div class="c-concept__icon u-mb-xl">
          <img src="./img/index-icon2.svg" alt="{{ __('Icon of Clock') }}">
        </div>
        <h3 class="c-concept__heading u-pb-l">{{ __('Background')}}</h3>
        <div class="c-concept__body">
          <p class="c-concept__text">
            ・{{ __("It's a shame that people with ideas don't necessarily have the skills to implement them. I thought that if the inspiration was handed over to other people and provided to the world as a service, the world would become more convenient.") }}</p>
        </div>
      </div>
      <div class="c-concept__item">
        <div class="c-concept__icon u-mb-xl">
          <img src="./img/index-icon3.svg" alt="{{ __('Icon of Handshake') }}">
        </div>
        <h3 class="c-concept__heading u-pb-l">{{ __('Recommended for such people') }}</h3>
        <div class="c-concept__body">
          <p class="c-concept__text">・{{ __("'I have an idea, but I can't shape it because I don't have business funds.' 'I can't make a service because I don't have programming skills.'") }} → {{ __('Want to sell that inspiration?') }}
          </p>
          <p class="c-concept__text">・{{ __("'I can't think of WEB services at all', 'I always think of similar services'") }} → {{ __("Want to buy another person's inspiration?") }}</p>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="p-review">
  <div class="l-container">
    <h2 class="c-section__title u-pb-s">{{ __('Reviews received') }}</h2>
    <p class="c-section__sub-title u-pb-4l">{{ __('Introducing some of the reviews of those who actually purchased') }}</p>
    
    @foreach($evaluations as $evaluation)
    <div class="p-review__item u-mb-xxl">
      <div class="p-review__icon">
        @if($evaluation->user->user_img)
        <img src="{{ asset('/storage/user_images/' . $evaluation->user->user_img) }}" alt="{{ __('Icon of User') }}">
        @else
        <img src="{{ asset('./img/no-img2.svg') }}" alt="{{ __('Icon of User') }}">
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
