$(document).on('click.scroll-to', '.js-scroll-to', function (e) {
  e.preventDefault();

  const $lnk = $(this);
  const $elem_to_scroll = $($lnk.attr('href'));
  const speed = $lnk.data('speed') || 100;
  //   const offset = $lnk.data('offset') || 0;

  if ($elem_to_scroll == '#!' || $elem_to_scroll == '#') return;

  let offset = $($elem_to_scroll).offset().top;

  // $(window).scrollTo($elem_to_scroll, { duration: speed, offset: offset });

  $('html, body').animate({
    scrollTop: offset - 150
  }, speed, 'linear');
});


// aside на странице цен 
$(function () {

  let $nav = $('.js-navigation');

  let $height = ($('.footer').innerHeight() + $('.payment').innerHeight() + 800),
    $maxH = $(document).innerHeight(),
    $finishH = $('.payment').innerHeight() + $('.footer').innerHeight();

  // фиксирование навигации
  $(window).on('scroll load resize', function () {

    let $scrollPos = $(window).scrollTop();

    if ($scrollPos > ($maxH - $height)) {
      $nav.removeClass('fixed');
    } else $nav.addClass('fixed');
  });
});

/*scrollMagic*/
var controller = new ScrollMagic.Controller({ globalSceneOptions: { duration: 200 } });

new ScrollMagic.Scene({ triggerElement: "#manicure" })
  .setClassToggle("#nav1", "active")
  // .addIndicators()
  .offset(150)
  .addTo(controller);

new ScrollMagic.Scene({ triggerElement: "#pedicure" })
  .setClassToggle("#nav2", "active")
  // .addIndicators()
  .offset(150)
  .addTo(controller);

new ScrollMagic.Scene({ triggerElement: "#sugaring" })
  .setClassToggle("#nav3", "active")
  // .addIndicators()
  .offset(150)
  .addTo(controller);

new ScrollMagic.Scene({ triggerElement: "#brows" })
  .setClassToggle("#nav4", "active")
  // .addIndicators()
  .offset(150)
  .addTo(controller);

new ScrollMagic.Scene({ triggerElement: "#lashes" })
  .setClassToggle("#nav5", "active")
  // .addIndicators()
  .offset(150)
  .addTo(controller);



// Homepage animations
$(() => {
  $('.js-inview').each(function inviewHandler() {
    $(this).bind('inview', (event, isInView, visiblePartX, visiblePartY) => {
    // $(this).bind('inview', (event, isInView) => {
      if (
        ($(this).hasClass('js-inview-top') && isInView)
        || (!$(window).width() > 480 ? visiblePartY === 'center' || visiblePartY === 'bottom' : isInView)
        // isInView
      ) {
        $(this).addClass('inview').unbind('inview');
        $(this).trigger('inviewTriggered');
      }
      $(window).trigger('inviewTriggered');
    });
  });
});
