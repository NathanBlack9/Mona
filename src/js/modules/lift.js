$(window).on('load mousewheel scroll', function () {
  // const $introHeight = $('.intro').innerHeight();
  const $this = $(this);
  const $header = $('.header');

  if ($this.scrollTop() >= 400) {
    $header.addClass('fixed');
    $('.js-go-top-btn').addClass('active');
  } else {
    $header.removeClass('fixed');
    $('.js-go-top-btn').removeClass('active');
  }
});

$(() => {
  $('.js-go-top-btn').click(function (e) {
    
    window.setTimeout(function() {
      $(window).scrollTop(0); 
    }, 0);
  });
});