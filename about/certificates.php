<?php
/*
Template Name: certificates
*/
?>

<?php get_header() ?>


<section class="certificates-page certificates">
  <div class="wrapper">
    <?php
      if ( function_exists('yoast_breadcrumb') ) {
        yoast_breadcrumb( '<div id="breadcrumbs" class="breadcrumbs">','</div>' );
      }
    ?>
    <div class="h1"><?php the_title(); ?></div>
    <div class="sorting">
      <div class="sorting__controls js-sorting not-mobile">
        <a href="#" class="sorting__btn active" data-sort="all">Все</a>
        <a href="#" class="sorting__btn" data-sort="Аракелян">Аракелян А.С.</a>
        <a href="#" class="sorting__btn" data-sort="Хачатрян">Хачатрян М.А.</a>
      </div>
      <div class="only-mobile">
        <select name="" id="" class="sorting__select js-sorting-select">
          <option value="all">Все</option>
          <option value="Аракелян">Аракелян А.С.</option>
          <option value="Хачатрян">Хачатрян М.А.</option>
        </select>
      </div>
    </div>
    <div class="certificates__inner js-sorting-content">
      <a href="<?php echo get_template_directory_uri(); ?>/build/img/certificate.jpg" data-fancybox="certificates" data-sort="Аракелян">
        <img src="<?php echo get_template_directory_uri(); ?>/build/img/certificate.jpg" alt="">
      </a>
      <a href="<?php echo get_template_directory_uri(); ?>/build/img/certificate2.jpg" data-fancybox="certificates" data-sort="Аракелян">
        <img src="<?php echo get_template_directory_uri(); ?>/build/img/certificate2.jpg" alt="">
      </a>
      <a href="<?php echo get_template_directory_uri(); ?>/build/img/asd.jpg" data-fancybox="certificates" data-sort="Аракелян">
        <img src="<?php echo get_template_directory_uri(); ?>/build/img/asd.jpg" alt="">
      </a>
      <a href="<?php echo get_template_directory_uri(); ?>/build/img/cert.jpg" data-fancybox="certificates" data-sort="Аракелян">
        <img src="<?php echo get_template_directory_uri(); ?>/build/img/cert.jpg" alt="">
      </a>
      <a href="<?php echo get_template_directory_uri(); ?>/build/img/cerdt.jpg" data-fancybox="certificates" data-sort="Аракелян">
        <img src="<?php echo get_template_directory_uri(); ?>/build/img/cerdt.jpg" alt="">
      </a>
      <a href="<?php echo get_template_directory_uri(); ?>/build/img/adsdsaa.jpg" data-fancybox="certificates" data-sort="Аракелян">
        <img src="<?php echo get_template_directory_uri(); ?>/build/img/adsdsaa.jpg" alt="">
      </a>
      <a href="<?php echo get_template_directory_uri(); ?>/build/img/asdasdasda.jpg" data-fancybox="certificates" data-sort="Аракелян">
        <img src="<?php echo get_template_directory_uri(); ?>/build/img/asdasdasda.jpg" alt="">
      </a>
      <a href="<?php echo get_template_directory_uri(); ?>/build/img/asdasdasd.jpg" data-fancybox="certificates" data-sort="Аракелян">
        <img src="<?php echo get_template_directory_uri(); ?>/build/img/asdasdasd.jpg" alt="">
      </a>
      <a href="<?php echo get_template_directory_uri(); ?>/build/img/asddd.jpg" data-fancybox="certificates" data-sort="Хачатрян">
        <img src="<?php echo get_template_directory_uri(); ?>/build/img/asddd.jpg" alt="">
      </a>
      <a href="<?php echo get_template_directory_uri(); ?>/build/img/aaaasda.jpg" data-fancybox="certificates" data-sort="Хачатрян">
        <img src="<?php echo get_template_directory_uri(); ?>/build/img/aaaasda.jpg" alt="">
      </a>
    </div>
  </div>
</section>

<?php get_footer() ?>