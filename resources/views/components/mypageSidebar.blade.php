<section class="l-sidebar__mymenu">
  <div class="p-mymenu__img u-pb-s">
    <img src="{{ asset('./img/no-img2.svg') }}" alt="人のアイコン">
  </div>
  <p class="p-mymenu__name u-pb-s">名前が入ります</p>
  <a href="{{ route('mypage.edit')}}" class="p-mymenu__prof u-mb-xl">プロフィール編集 &gt;</a>
  <div class="p-mymenu__body u-pb-xl">
    <p class="p-mymenu__body__heading u-pb-s u-mb-m">出品者メニュー</p>
    <ul>
      <li>
        <a href="{{ route('ideas.create')}}" class="p-mymenu__body__link u-mb-m">
          <span>ヒラメキを出品する</span>
          <img src="{{ asset('./img/arrow-right.svg') }}" class="p-mymenu__body__arrow" alt="リンクマーク">
        </a>
      </li>
      <li>
        <a href="{{ route('mypage.lists')}}" class="p-mymenu__body__link u-mb-m">
          <span>出品したものの管理</span>
          <img src="{{ asset('./img/arrow-right.svg') }}" class="p-mymenu__body__arrow" alt="リンクマーク">
        </a>
      </li>
      <li>
        <a href="{{ route('mypage.reviews')}}" class="p-mymenu__body__link u-mb-m">
          <span>購入者からのレビュー</span>
          <img src="{{ asset('./img/arrow-right.svg') }}" class="p-mymenu__body__arrow" alt="リンクマーク">
        </a>
      </li>
    </ul>
  </div>
  <div class="p-mymenu__body u-pb-xl">
    <p class="p-mymenu__body__heading u-pb-s u-mb-m">購入者メニュー</p>
    <ul>
      <li>
        <a href="{{ route('mypage.purchases')}}" class="p-mymenu__body__link u-mb-m">
          <span>購入したヒラメキ</span>
          <img src="{{ asset('./img/arrow-right.svg') }}" class="p-mymenu__body__arrow" alt="リンクマーク">
        </a>
      </li>
      <li>
        <a href="{{ route('mypage.likes')}}" class="p-mymenu__body__link u-mb-m">
          <span>気になるリスト</span>
          <img src="{{ asset('./img/arrow-right.svg') }}" class="p-mymenu__body__arrow" alt="リンクマーク">
        </a>
      </li>
    </ul>
  </div>
  <a href="{{ URL::previous() }}" class="p-mymenu__back u-mb-m">&lt; 戻る</a>
</section>