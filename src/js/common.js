$(window).on('load mousewheel scroll', function () {
  const $introHeight = $('.intro').innerHeight();
  const $this = $(this);
  const $header = $('.header');

  if ($this.scrollTop() >= ($introHeight * 0.6)) {
    $header.addClass('fixed');
    $('.js-go-top-btn').addClass('active');
  } else {
    $header.removeClass('fixed');
    $('.js-go-top-btn').removeClass('active');
  }
});

$(function() {

  $('.js-reviews-rating').each(function() {
    const $this = $(this);
    const $rating = $this.data('rating');
    const $block = $this.find('.reviews__rating');

    for (let i = 0; i <= $rating; i++) {
      $block.find(`li:nth-child(${ i })`).addClass('active');
    }
  })

  $('.js-go-top-btn').click(function (e) {
    
    window.setTimeout(function() {
      $(window).scrollTop(0); 
    }, 0);
  });
});

