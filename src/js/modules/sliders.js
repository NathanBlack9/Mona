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
        breakpoint: 700 + 1,
        settings: {
          dots: true,
          arrows: false,
          autoplay: true,
          autoplaySpeed: 2000,
          speed: 1000,
        }
      },
      // {
      //   breakpoint: 480 + 1,
      //   settings: {
      //     dots: true,
      //     arrows: false
      //   }
      // },
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
        breakpoint: 1024 + 1,
        settings: {
          slidesToShow: 2,
        },
      },
      {
        breakpoint: 700 + 1,
        settings: {
          slidesToShow: 1.5,
          arrows: false,
          dots: true,
          adaptiveHeight: true,
        },
      },
      {
        breakpoint: 480 + 1,
        settings: {
          slidesToShow: 1,
          arrows: false,
          dots: true,
          adaptiveHeight: true,
        },
      },
    ],
  });
});
