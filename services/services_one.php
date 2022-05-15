<?php
/*
Template Name: services_one
*/
?>

<?php get_header() ?>

<section class="service service-page">
  <div class="wrapper">
    <?php
      if ( function_exists('yoast_breadcrumb') ) {
        yoast_breadcrumb('<ul id="breadcrumbs" class="breadcrumbs"><li>','</li></ul>');
      }
    ?>
    <div class="service__inner">
      <div class="service__content content">
        <h1 class="service__title h1"><?php the_title(); ?></h1>
        <?php the_content(); ?>
      </div>
      <div class="service__slider-block">
        <div class="service__slider js-fade-slider">
          <img src="<?php echo get_template_directory_uri(); ?>/build/img/aa.jpg" alt="" class="service__slider-item">
          <img src="<?php echo get_template_directory_uri(); ?>/build/img/Group_21.jpg" alt="" class="service__slider-item">
        </div>
        <div class="service__slider-controls">
          <div class="js-fade-slider-prev slick-prev"></div>
          <div class="js-fade-slider-counter service__slider-counter"></div>
          <div class="js-fade-slider-next slick-next"></div>
        </div>
      </div>
    </div>

    <div class="service__masters">
      <h2 class="h2">Мастера</h2>
      <div class="service__content content">
        <p>Тут наши мастера тока по ресницам. Про них можно еще прочитать <a href="">отзывы.</a></p>
      </div>
      <div class="masters-list">
        <div class="master">
          <img src="<?php echo get_template_directory_uri(); ?>/build/img/master.jpg" alt="" class="master__img">
          <div class="master__name">Аракелян Анжела Станиславовна</div>
          <div class="master__service"></div>
          <div class="master__desc">Сами лучши мастер Сами лучши мастер Сами лучши мастер Сами лучши мастер Сами лучши мастерСами лучши мастерСами лучши мастер.</div>
        </div>
        <div class="master">
          <img src="<?php echo get_template_directory_uri(); ?>/build/img/master.jpg" alt="" class="master__img">
          <div class="master__name">Аракелян Анжела Станиславовна</div>
          <div class="master__service"></div>
          <div class="master__desc">Сами лучши мастер Сами лучши мастер Сами лучши мастер</div>
        </div>
      </div>
    </div>
  </div>
</section>



<?php get_footer() ?>
