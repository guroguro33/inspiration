<section class="l-sidebar__mymenu">
  <div class="c-fixed__mypage">
    <div class="p-mymenu__img u-mb-m">
      @if($isImage)
      <img src="{{ $user->user_img }}" alt="{{ __('Icon of User') }}">
      @else
      <img src="{{ asset('./img/no-img2.svg') }}" alt="{{ __('Icon of User') }}">
      @endif
    </div>
    <p class="p-mymenu__name u-pb-s">{{ $user->name }}</p>
    <a href="{{ route('mypage.edit')}}" class="p-mymenu__prof u-mb-xl">{{ __('Edit profile') }} &gt;</a>
    <div class="p-mymenu__body u-pb-xl">
      <p class="p-mymenu__body__heading u-pb-s u-mb-m">{{ __('Exhibitor menu')}}</p>
      <ul>
        <li>
          <a href="{{ route('ideas.create')}}" class="p-mymenu__body__link u-mb-m">
            <span>{{ __('Sell ​​Hirameki')}}</span>
            <img src="{{ asset('./img/arrow-right.svg') }}" class="p-mymenu__body__arrow" alt="{{ __('Link') }}">
          </a>
        </li>
        <li>
          <a href="{{ route('mypage.lists')}}" class="p-mymenu__body__link u-mb-m">
            <span>{{ __('Manage inspirations') }}</span>
            <img src="{{ asset('./img/arrow-right.svg') }}" class="p-mymenu__body__arrow" alt="{{ __('Link') }}">
          </a>
        </li>
        <li>
          <a href="{{ route('mypage.reviews')}}" class="p-mymenu__body__link u-mb-m">
            <span>{{ __('Reviews from buyers')}}</span>
            <img src="{{ asset('./img/arrow-right.svg') }}" class="p-mymenu__body__arrow" alt="{{ __('Link') }}">
          </a>
        </li>
      </ul>
    </div>
    <div class="p-mymenu__body u-pb-xl">
      <p class="p-mymenu__body__heading u-pb-s u-mb-m">{{ __('Buyer menu')}}</p>
      <ul>
        <li>
          <a href="{{ route('mypage.purchases')}}" class="p-mymenu__body__link u-mb-m">
            <span>{{ __('Purchased inspirations')}}</span>
            <img src="{{ asset('./img/arrow-right.svg') }}" class="p-mymenu__body__arrow" alt="{{ __('Link') }}">
          </a>
        </li>
        <li>
          <a href="{{ route('mypage.likes')}}" class="p-mymenu__body__link u-mb-m">
            <span>{{ __('Anxious list')}}</span>
            <img src="{{ asset('./img/arrow-right.svg') }}" class="p-mymenu__body__arrow" alt="{{ __('Link') }}">
          </a>
        </li>
      </ul>
    </div>
    <a href="{{ URL::previous() }}" class="p-mymenu__back u-pb-m">&lt; {{ __('Back')}}</a>
  </div>
</section>