$(function () {

  var $toggle_menu = $('.js-toggle-sp-menu'),
    $menu = $('.p-menu');

  // ハンバーガーメニュー
  $toggle_menu.on('click', function () {
    $(this).toggleClass('active');
    $menu.toggleClass('active');
  });

  // ハンバーガーメニューでリンクを選択したら、メニューが消える
  $('.js-menu-link').on('click', function () {

    $toggle_menu.removeClass('active');
    $menu.removeClass('active');
  });

  // フロートヘッダーメニュー
  var targetHeight = $('.js-float-menu-target').height();
  $(window).on('scroll', function () {
    $('.js-float-menu').toggleClass('float-active', $(this).scrollTop() > targetHeight);
  })

  // フッター下部固定
  $(function () {
    let $ftr = $('#footer');
    if (window.innerHeight > $ftr.offset().top + $ftr.outerHeight()) {
      $ftr.attr({
        'style': 'position:fixed; top:' + (window.innerHeight - $ftr.outerHeight() + 'px;')
      });
    }
  })
  // フラッシュメッセージ
  $(function () {
    let $jsFlashMsg = $('.js-flash-msg');

    $jsFlashMsg.fadeOut(5000);
  })

})