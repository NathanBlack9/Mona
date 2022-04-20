$(window).on('mousewheel', function () {
  const $introHeight = $('.intro').innerHeight();
  const $this = $(this);
  const $header = $('.header');

  if ($this.scrollTop() >= ($introHeight * 0.6)) {
    $header.addClass('highlighted');
  } else {
    $header.removeClass('highlighted');
  }
});