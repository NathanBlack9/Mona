<?php get_header() ?>

<section class="intro">
  <div class="wrapper">
    <div class="intro__inner">
      <h1 class="intro__title">Студия маникюра <span>Mona<span></h1>
      <h2 class="intro__subtitle">маленький уголок заботы о себе</h2>
      <a href="#" class="intro__btn btn">Наши услуги</a>
    </div>
  </div>
</section>

<section class="services">
  <div class="wrapper">
    <div class="services__title h1">Наши услуги</div>
    <div class="services__inner">
      <div class="services__item">
        <img class="services__img" src="<?php echo get_template_directory_uri(); ?>/build/img/service_1.jpg" alt="" >
        <i class="icon"><img src="<?php echo get_template_directory_uri(); ?>/build/img/service_icon1.svg" alt=""></i>
        <a href="#" class="services__btn btn">Подробнее</a>
        <span class="services__name">Маникюр</span>
      </div>
      <div class="services__item">
        <img class="services__img" src="<?php echo get_template_directory_uri(); ?>/build/img/service_2.jpg" alt="" >
        <i class="icon"><img src="<?php echo get_template_directory_uri(); ?>/build/img/service_icon2.svg" alt=""></i>
        <a href="#" class="services__btn btn">Подробнее</a>
        <span class="services__name">Педикюр</span>
      </div>
      <div class="services__item">
        <img class="services__img" src="<?php echo get_template_directory_uri(); ?>/build/img/service_3.jpg" alt="" >
        <i class="icon"><img src="<?php echo get_template_directory_uri(); ?>/build/img/service_icon3.svg" alt=""></i>
        <a href="#" class="services__btn btn">Подробнее</a>
        <span class="services__name">Шугаринг</span>
      </div>
      <div class="services__item">
        <img class="services__img" src="<?php echo get_template_directory_uri(); ?>/build/img/service_4.jpg" alt="" >
        <i class="icon"><img src="<?php echo get_template_directory_uri(); ?>/build/img/service_icon4.svg" alt=""></i>
        <a href="#" class="services__btn btn">Подробнее</a>
        <span class="services__name">Наращивание ресниц</span>
      </div>
      <div class="services__item">
        <img class="services__img" src="<?php echo get_template_directory_uri(); ?>/build/img/service_5.jpg" alt="" >
        <i class="icon"><img src="<?php echo get_template_directory_uri(); ?>/build/img/service_icon5.svg" alt=""></i>
        <a href="#" class="services__btn btn">Подробнее</a>
        <span class="services__name">Коррекция бровей</span>
      </div>
    </div>
  </div>
</section>

<section class="about">
  <div class="wrapper">
    <div class="about__inner">
      <div class="about__slider-block">
        <div class="about__slider js-fade-slider">
          <img src="<?php echo get_template_directory_uri(); ?>/build/img/Group_21.jpg" alt="" class="about__slider-item">
          <img src="<?php echo get_template_directory_uri(); ?>/build/img/aa.jpg" alt="" class="about__slider-item">
          <img src="<?php echo get_template_directory_uri(); ?>/build/img/Group_21.jpg" alt="" class="about__slider-item">
        </div>
        <div class="about__slider-controls">
          <div class="js-fade-slider-prev slick-prev"></div>
          <div class="js-fade-slider-counter about__slider-counter"></div>
          <div class="js-fade-slider-next slick-next"></div>
        </div>
      </div>
      <div class="about__content">
        <div class="about__title h1">О нас</div>
        <div class="about__text">
          <p>Вдали от всех живут они в буквенных домах на берегу Семантика большого языкового океана.</p>
          <p>Вдали от всех живут они в буквенных домах на берегу Семантика большого языкового океана.</p>
          <p>Вдали от всех живут они в буквенных домах на берегу Семантика большого языкового океана. <a href="#">сертификаты наших мастеров</a></p>
        </div>
        <a href="#" class="about__btn btn pink--btn">Подрбонее о нас</a>
      </div>
    </div>
  </div>
</section>

<div class="certificates">
  <div class="wrapper">
    <div class="certificates__title h1">Сертификаты</div>
    <div class="certificates__text">Далеко-далеко за словесными горами в стране гласных и согласных живут рыбные тексты. Вдали от всех живут они в буквенных домах на берегу Семантика большого языкового океана.</div>
    <div class="certificates__inner">
      <div class="certificates__slider js-slideshow">
          <a href="<?php echo get_template_directory_uri(); ?>/build/img/certificate.jpg" data-fancybox="certificates" class="certificates__slider-item">
            <img src="<?php echo get_template_directory_uri(); ?>/build/img/certificate.jpg" alt="" >
          </a>
          <a href="<?php echo get_template_directory_uri(); ?>/build/img/certificate.jpg" data-fancybox="certificates" class="certificates__slider-item">
            <img src="<?php echo get_template_directory_uri(); ?>/build/img/certificate.jpg" alt="" >
          </a>
          <a href="<?php echo get_template_directory_uri(); ?>/build/img/certificate2.jpg" data-fancybox="certificates" class="certificates__slider-item">
            <img src="<?php echo get_template_directory_uri(); ?>/build/img/certificate2.jpg" alt="" >
          </a>
          <a href="<?php echo get_template_directory_uri(); ?>/build/img/certificate.jpg" data-fancybox="certificates" class="certificates__slider-item">
            <img src="<?php echo get_template_directory_uri(); ?>/build/img/certificate.jpg" alt="" >
          </a>
      </div>
      <a href="#" class="certificates__btn btn pink--btn">Смотреть все</a>
    </div>
  </div>
</div>

<?php get_footer() ?>
  
  