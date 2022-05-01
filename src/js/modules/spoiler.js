$('.js-spoiler').find('.js-spoiler-toggler').on('click', function() {
  const $this = $(this);
  const $body = $(this).parent().find('.js-spoiler-body');

  $this.parent().toggleClass('is-expanded');
  $body.toggleClass('is-expanded');
  $this.toggleClass('is-expanded');
});

$('.js-mobile-spoiler').find('.js-spoiler-toggler').on('click', function() {
  const $this = $(this);
  const $body = $(this).parent().find('.js-spoiler-body');
  const $window = $(window);

  if ($window.width() < 480) {
    $this.parent().toggleClass('is-expanded');
    $body.toggleClass('is-expanded');
    $this.toggleClass('is-expanded');
  } else return;
});

