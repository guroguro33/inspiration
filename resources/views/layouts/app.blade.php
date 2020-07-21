<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="description" content="@yield('description')">
  <meta name="keywords" content="アイデア販売,アイデア購入,WEBサービス,ひらめき,儲かる">
  <title>@yield('title') | ヒラメキ売買サイト {{ config('app.name', 'Inspiration') }}</title>
  
  <!-- ファビコン -->
  <link rel="apple-touch-icon" type="image/png" href="{{ asset('img/apple-touch-icon-180x180.png') }}">
  <link rel="icon" type="image/png" href="{{ asset('img/icon-192x192.png') }}">
  
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <!-- Scripts -->
  <script src="{{ asset('js/app.js') }}" defer></script>

  <!-- Fonts -->
  <link rel="dns-prefetch" href="//fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;500;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css"
  integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">

  <!-- Styles -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="u-bg__main">
  <header class="l-container__fluid  l-header u-bg__header">
    <section class="l-header__body">
      <h2 class="l-header__title"><a href="{{ url('/') }}">{{ config('app.name', 'Laravel') }}</a></h2>
      <div class="p-menu__trigger js-toggle-sp-menu">
        <span></span>
        <span></span>
        <span></span>
      </div>
      <nav class="p-menu">
        @guest
          <ul class="p-menu__list">
            <li class="p-menu__item"><a href="{{ route('ideas.index')}}" class="p-menu__link js-menu-link">{{ __('See inspirations') }}</a></li>
            <li class="p-menu__item"><a href="{{ route('login') }}" class="p-menu__link js-menu-link">{{ __('Login') }}</a></li>
            <li class="p-menu__item"><a href="{{ route('register') }}" class="p-menu__link js-menu-link">{{ __('Register') }}</a></li>
          </ul>
        @else
          <ul class="p-menu__list">
            <li class="p-menu__item"><a href="{{ route('mypage.index')}}" class="p-menu__link js-menu-link">{{ __('MyPage') }}</a></li>
            <li class="p-menu__item"><a href="{{ route('ideas.index')}}" class="p-menu__link js-menu-link">{{ __('See inspirations') }}</a></li>
            <li class="p-menu__item"><a href="{{ route('ideas.create')}}" class="p-menu__link js-menu-link">{{ __('Sell inspirations') }}</a></li>
            <li class="p-menu__item"><a href="{{ route('logout') }}" class="p-menu__link js-menu-link" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">{{ __('Logout') }}</a></li>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
            </form>
          </ul>
        @endguest
      </nav>
    </section>
  </header>

  {{-- フラッシュメッセージ --}}
  @if (session('flash_message'))
    <div class="c-alert__register--success js-flash-msg" role="alert">
      {{ session('flash_message') }}
    </div>
  @endif

  {{-- エラー時 --}}
  @if(count($errors) > 0)
    <div class="c-alert__register--error js-flash-msg" role="alert">
      {{ __('There is an error') }}
    </div>
  @endif
  
  <main>
    <div id="app">
      @yield('content')
    </div>

  </main>
  <footer id="footer" class="l-footer">
    <div class="l-container l-footer__body">
      <p class="l-footer__copyright">© Copyright | Inspiration 2020</p>
      <div class="l-footer__sns">
        <a href="" class="l-footer__icon"><i class="fab fa-instagram"></i></a>
        <a href="" class="l-footer__icon"><i class="fab fa-twitter-square"></i></a>
        <a href="" class="l-footer__icon"><i class="fab fa-facebook"></i></a>
      </div>
      <div class="l-footer__contact">
        <p class="l-footer__contact__lead">{{ __('Contact Us') }}</p>
        <div class="l-footer__contact__body">
          <a href="tel:0312345678">03-1234-5678</a>
          <a href="mailto:info@mail.com">info@inspiration.com</a>
        </div>
      </div>
    </div>
  </footer>
</body>
</html>
