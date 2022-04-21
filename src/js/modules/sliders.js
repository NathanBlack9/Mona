$('.js-fade-slider').each(function() {
  const $slider = $(this);
  const $status = $slider.next().find(".js-fade-slider-counter");

  $slider.on("init reInit beforeChange", function (event, slick, currentSlide, nextSlide) {
    const i = (nextSlide ? nextSlide : 0) + 1;
    $status.html(`<span>${i}</span> / ${slick.slideCount}`);
  });

  $slider.slick({
    arrows: true,
    dots: false,
    focusOnSelect: true,
    infinite: false,
    speed: 500,
    slidesToShow: 1,
    slidesToScroll: 1,
    touchThreshold: 100,
    prevArrow: $slider.next().find(".js-fade-slider-prev"),
    nextArrow: $slider.next().find(".js-fade-slider-next"),
    fade: true,
    cssEase: 'ease',
    responsive: [
      {
        breakpoint: 1024 + 1,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 1,
          dots: true
        }
      },
      {
        breakpoint: 480 + 1,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
          dots: true,
        }
      },
    ]
  })
});

$(".js-slideshow").each(function () {
  const $slider = $(this);

  $slider.slick({
    slidesToShow: 3,
    slidesToScroll: 1,
    speed: 500,
    touchThreshold: 100,
    infinite: false,
    dots: false,
    arrows: true,
    responsive: [
      {
        breakpoint: 480 + 1,
        settings: {
          arrows: false,
          dots: true,
        },
      },
    ],
  });
});
