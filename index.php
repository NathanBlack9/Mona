<?php 
  $masters = $wpdb->get_results("SELECT * from masters;");
  $reviews = $wpdb->get_results("SELECT * from reviews order by Id DESC;");

  function defineMaster( $param ) {
    global $wpdb;
    $master = $wpdb->get_results("SELECT * FROM masters where id = {$param}");
    return $master;
  };
?>


<?php get_template_part( 'header__lite' ); ?>

  <section class="intro">
    <div class="wrapper">
      <div class="intro__inner">
        <h1 class="intro__title">Студия маникюра <span>Mona<span></h1>
        <h2 class="intro__subtitle">маленький уголок заботы о себе</h2>
        <a href="<?php echo home_url(); ?>/services/" class="intro__btn btn">Наши услуги</a>
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
          <a href="<?php echo get_template_directory_uri(); ?>/manicure/" class="services__btn btn">Подробнее</a>
          <span class="services__name">Маникюр</span>
        </div>
        <div class="services__item">
          <img class="services__img" src="<?php echo get_template_directory_uri(); ?>/build/img/service_2.jpg" alt="" >
          <i class="icon"><img src="<?php echo get_template_directory_uri(); ?>/build/img/service_icon2.svg" alt=""></i>
          <a href="<?php echo get_template_directory_uri(); ?>/pedicure/" class="services__btn btn">Подробнее</a>
          <span class="services__name">Педикюр</span>
        </div>
        <div class="services__item">
          <img class="services__img" src="<?php echo get_template_directory_uri(); ?>/build/img/service_3.jpg" alt="" >
          <i class="icon"><img src="<?php echo get_template_directory_uri(); ?>/build/img/service_icon3.svg" alt=""></i>
          <a href="<?php echo get_template_directory_uri(); ?>/sugaring/" class="services__btn btn">Подробнее</a>
          <span class="services__name">Шугаринг</span>
        </div>
        <div class="services__item">
          <img class="services__img" src="<?php echo get_template_directory_uri(); ?>/build/img/service_4.jpg" alt="" >
          <i class="icon"><img src="<?php echo get_template_directory_uri(); ?>/build/img/service_icon4.svg" alt=""></i>
          <a href="<?php echo get_template_directory_uri(); ?>/lashes/" class="services__btn btn">Подробнее</a>
          <span class="services__name">Наращивание ресниц</span>
        </div>
        <div class="services__item">
          <img class="services__img" src="<?php echo get_template_directory_uri(); ?>/build/img/service_5.jpg" alt="" >
          <i class="icon"><img src="<?php echo get_template_directory_uri(); ?>/build/img/service_icon5.svg" alt=""></i>
          <a href="<?php echo get_template_directory_uri(); ?>/browes/" class="services__btn btn">Подробнее</a>
          <span class="services__name">Коррекция бровей</span>
        </div>
      </div>
    </div>
  </section>

  <section class="about">
    <div class="wrapper">
      <div class="about__inner">
        <div class="about__title h1 only-mobile">О нас</div>

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
          <div class="about__title h1 not-mobile">О нас</div>
          <div class="about__text">
            <p>Вдали от всех живут они в буквенных домах на берегу Семантика большого языкового океана.</p>
            <p>Вдали от всех живут они в буквенных домах на берегу Семантика большого языкового океана.</p>
            <p>Вдали от всех живут они в буквенных домах на берегу Семантика большого языкового океана. <a href="#">сертификаты наших мастеров</a></p>
          </div>
          <a href="<?php echo get_template_directory_uri(); ?>/about/" class="about__btn btn pink--btn">Подрбонее о нас</a>
        </div>
      </div>
    </div>
  </section>

  <div class="certificates">
    <div class="wrapper">
      <div class="certificates__title h1">Сертификаты</div>
      <div class="certificates__text">Наши мастера имеют высокую квалификацию и&nbsp;регулярно повышают свой уровень, посещая различные мастер-классы, о&nbsp;чем свидетельствуют наши сертификаты.</br>
      Кроме того, наши мастера&nbsp;&mdash; регулярные участники всероссийских и&nbsp;международных конкурсов красоты.
      </div>
      <div class="certificates__inner">
        <div class="certificates__slider js-slideshow slider">
          <a href="<?php echo get_template_directory_uri(); ?>/build/img/certificate.jpg" data-fancybox="certificates" class="slider-item">
            <img src="<?php echo get_template_directory_uri(); ?>/build/img/certificate.jpg" alt="" >
          </a>
          <a href="<?php echo get_template_directory_uri(); ?>/build/img/certificate.jpg" data-fancybox="certificates" class="slider-item">
            <img src="<?php echo get_template_directory_uri(); ?>/build/img/certificate.jpg" alt="" >
          </a>
          <a href="<?php echo get_template_directory_uri(); ?>/build/img/certificate2.jpg" data-fancybox="certificates" class="slider-item">
            <img src="<?php echo get_template_directory_uri(); ?>/build/img/certificate2.jpg" alt="" >
          </a>
          <a href="<?php echo get_template_directory_uri(); ?>/build/img/certificate.jpg" data-fancybox="certificates" class="slider-item">
            <img src="<?php echo get_template_directory_uri(); ?>/build/img/certificate.jpg" alt="" >
          </a>
        </div>
        <a href="#" class="certificates__btn btn pink--btn">Смотреть все</a>
      </div>
    </div>
  </div>

  <section class="reviews">
    <div class="wrapper">
      <div class="reviews__title h1">Отзывы</div>
      <div class="reviews__inner js-review-sort">
        <?php $counter = 0; ?>
        <?php foreach($reviews as $item) { 
          if ($counter >= 4) break;
          if($item->rating >= 4 && $item->view == 1) {

            $master = defineMaster($item->master_id); 
          ?>
            <?php foreach($master as $y) { ?>
              <div class="reviews__item js-reviews-rating" data-rating="<?php echo $item->rating; ?>" data-id="<?php echo $item->id; ?>">
                <div class="reviews__name"><?php echo $item->name; ?></div>
                <div class="reviews__job">
                  <span>мастер</span>
                  <?php echo $y->last_name .' '.$y->first_name ?>
                </div>
                <ul class="reviews__rating">
                  <?php $i = 1 ?>
                  <?php while ($i <= 5) { ?>
                    <li></li>
                  <?php $i++; } ?>
                </ul>
                <div class="reviews__text"><?php echo $item->text; ?></div>
              </div>
            <?php } ?>
            
          <?php $counter++; } ?>
        <?php } ?>
      </div>
      <a href="<?php echo get_template_directory_uri(); ?>/reviews/" class="reviews__btn btn pink--btn">Смотреть все</a>
    </div>
  </section>

  <section class="subscribe">
    <div class="wrapper">
      <div class="subscribe__inner">
        <div class="h1 subscribe__title">Подписаться</div>
        <div class="subscribe__subtitle">Будьте в курсе всех самых свежих новостей и акций</div>
        <form action="" class="subscription__form js-subscribe-form form">
          <div class="inp required">
            <input type="text" name="email" class="subscribe__inp js-input-email" placeholder="info@studiomona.ru">
            <div class="form__error" style="display: none;">Поле должно содержать E-Mail в формате example@site.com</div>
          </div>
          <button type="submit" class="subscribe__submit btn black--btn">Подписаться</button>
        </form>
      </div>
    </div>
  </section>

<?php get_footer() ?>
