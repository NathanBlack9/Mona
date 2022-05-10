<?php
/*
  Template Name: about
*/
?>

<?php get_header() ?>
<section class="about-page">
  <div class="wrapper">
    <?php
      if ( function_exists('yoast_breadcrumb') ) {
        yoast_breadcrumb('<ul id="breadcrumbs" class="breadcrumbs"><li>','</li></ul>');
      }
    ?>
    <h1 class="h1"><?php the_title(); ?></h1>
    <div class="about__content content"><?php the_content(); ?></div>

    <div class="about__inner">
      <div class="about-page__slider js-slideshow slider">
        <a href="<?php echo get_template_directory_uri(); ?>/build/img/Groddup_21.jpg" data-fancybox="certificates" class="slider-item">
          <img src="<?php echo get_template_directory_uri(); ?>/build/img/Groddup_21.jpg" alt="" >
        </a>
        <a href="<?php echo get_template_directory_uri(); ?>/build/img/aa.jpg" data-fancybox="certificates" class="slider-item">
          <img src="<?php echo get_template_directory_uri(); ?>/build/img/aa.jpg" alt="" >
        </a>
        <a href="<?php echo get_template_directory_uri(); ?>/build/img/Groddup_21.jpg" data-fancybox="certificates" class="slider-item">
          <img src="<?php echo get_template_directory_uri(); ?>/build/img/Groddup_21.jpg" alt="" >
        </a>
        <a href="<?php echo get_template_directory_uri(); ?>/build/img/aa.jpg" data-fancybox="certificates" class="slider-item">
          <img src="<?php echo get_template_directory_uri(); ?>/build/img/aa.jpg" alt="" >
        </a>
      </div>
    </div>

    <h2 class="h2">Наши мастера</h2>
    <div class="about__content content">Наша небольшая команда всегда готова сделать вас еще красивее.
Мы покажем вам состав наших мастеров, а про наши заслуги лучше расскажут наши клиенты в отзывах.</div>


  </div>
</section>

<?php get_footer() ?>