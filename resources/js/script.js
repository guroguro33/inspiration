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

  // ページネーションをクリックしたら、ページトップに移動する
  $(function () {
    $('.js-scrollTop').on('click', function () {
      $("html, body").animate({ scrollTop: 0 }, 500);
    })
  })

  // プロフィール画像を更新する際のプレビュー表示
  $('form').on('change', 'input[type="file"]', event => {
    const file = event.target.files[0];
    const reader = new FileReader();
    const $preview = $('.js-preview');

    // 画像ファイル以外は処理停止
    if (file.type.indexOf('image') < 0) {
      return false;
    }
    // ファイル読み込みが完了した際に発火するイベントを登録
    reader.onload = function (e) {
      $preview.attr('src', e.target.result);
    };

    reader.readAsDataURL(file);
  })

  // ヒラメキ出品＆編集の概要文字カウンター
  if ($('.js-count-desc').length) {
    let count = $('.js-count-desc').val().length;
    $('.js-counter-desc').text(count);
  }

  $('.js-count-desc').on('keyup', function () {
    let count = $(this).val().length;
    $('.js-counter-desc').text(count);
  });

  // ヒラメキ出品＆編集の詳細文字カウンター
  if ($('.js-count-detail').length) {
    let count = $('.js-count-detail').val().length;
    $('.js-counter-detail').text(count);
  }

  $('.js-count-detail').on('keyup', function () {
    let count = $(this).val().length;
    $('.js-counter-detail').text(count);
  });

})