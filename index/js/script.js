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
    $('.js-float-menu').toggleClass('float-active', $(this).scrollTop() > targetHeight * 0.8);
  })

  // スムーズスクロール
  $('a[href^="#"').on('click', function () {

    var href = $(this).attr('href'),
      target = $((href == '#' || href == '') ? 'html' : href),
      position = target.offset().top + 50;

    $('html,body').animate({ scrollTop: position }, 500);
    return false; //aタグの機能無効
  });

})