<?php
/*
Template Name: services
*/
?>

<?php get_header() ?>

<div class="services-page">
  <section class="services">
    <div class="wrapper">
      <?php
        if ( function_exists('yoast_breadcrumb') ) {
          yoast_breadcrumb('<ul id="breadcrumbs" class="breadcrumbs"><li>','</li></ul>');
        }
      ?>
      <div class="services__title h1"><?php the_title(); ?></div>
      <div class="services__inner">
        <div class="services__item">
          <img class="services__img" src="<?php echo get_template_directory_uri(); ?>/build/img/service_1.jpg" alt="" >
          <i class="icon"><img src="<?php echo get_template_directory_uri(); ?>/build/img/service_icon1.svg" alt=""></i>
          <a href="<?php echo home_url(); ?>/services/manicure/" class="services__btn btn">Подробнее</a>
          <span class="services__name">Маникюр</span>
        </div>
        <div class="services__item">
          <img class="services__img" src="<?php echo get_template_directory_uri(); ?>/build/img/service_2.jpg" alt="" >
          <i class="icon"><img src="<?php echo get_template_directory_uri(); ?>/build/img/service_icon2.svg" alt=""></i>
          <a href="<?php echo home_url(); ?>/services/pedicure/" class="services__btn btn">Подробнее</a>
          <span class="services__name">Педикюр</span>
        </div>
        <div class="services__item">
          <img class="services__img" src="<?php echo get_template_directory_uri(); ?>/build/img/service_3.jpg" alt="" >
          <i class="icon"><img src="<?php echo get_template_directory_uri(); ?>/build/img/service_icon3.svg" alt=""></i>
          <a href="<?php echo home_url(); ?>/services/sugaring/" class="services__btn btn">Подробнее</a>
          <span class="services__name">Шугаринг</span>
        </div>
        <div class="services__item">
          <img class="services__img" src="<?php echo get_template_directory_uri(); ?>/build/img/service_4.jpg" alt="" >
          <i class="icon"><img src="<?php echo get_template_directory_uri(); ?>/build/img/service_icon4.svg" alt=""></i>
          <a href="<?php echo home_url(); ?>/services/lashes/" class="services__btn btn">Подробнее</a>
          <span class="services__name">Наращивание ресниц</span>
        </div>
        <div class="services__item">
          <img class="services__img" src="<?php echo get_template_directory_uri(); ?>/build/img/service_5.jpg" alt="" >
          <i class="icon"><img src="<?php echo get_template_directory_uri(); ?>/build/img/service_icon5.svg" alt=""></i>
          <a href="<?php echo home_url(); ?>/services/eyebrow/" class="services__btn btn">Подробнее</a>
          <span class="services__name">Коррекция бровей</span>
        </div>
      </div>
    </div>
  </section>
</div>

<?php get_footer() ?>
