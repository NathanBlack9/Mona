<?php
/*
Template Name: gallery
*/
?>

<?php get_header() ?>

<section class="gallery-page certificates">
  <div class="wrapper">
    <?php
      if ( function_exists('yoast_breadcrumb') ) {
        yoast_breadcrumb('<ul id="breadcrumbs" class="breadcrumbs"><li>','</li></ul>');
      }
    ?>
    <div class="h1"><?php the_title(); ?></div>
    <div class="certificates__subtitle">В галерее представлены фото наших работ различных услуг. Наводя на фото можно узнать мастера выполневшего работу.</div>
    <div class="sorting">
      <div class="sorting__controls js-sorting not-mobile">
        <a href="#" class="sorting__btn active" data-sort="all">Все</a>
        <a href="#" class="sorting__btn" data-sort="Маникюр">Маникюр</a>
        <a href="#" class="sorting__btn" data-sort="Педикюр">Педикюр</a>
        <a href="#" class="sorting__btn" data-sort="Наращивание ресниц">Наращивание ресниц</a>
        <a href="#" class="sorting__btn" data-sort="Коррекция бровей">Коррекция бровей</a>
      </div>
      <div class="only-mobile">
        <select name="" id="" class="sorting__select js-sorting-select">
          <option value="all">Все</option>
          <option value="Маникюр">Маникюр</option>
          <option value="Педикюр">Педикюр</option>
          <option value="Наращивание ресниц">Наращивание ресниц</option>
          <option value="Коррекция бровей">Коррекция бровей</option>
        </select>
      </div>
    </div>
    <div class="certificates__inner js-sorting-content">
      <a href="<?php echo get_template_directory_uri(); ?>/build/img/aa.jpg" data-fancybox="certificates" data-sort="Маникюр">
        <img src="<?php echo get_template_directory_uri(); ?>/build/img/aa.jpg" alt="">
        <div class="gallery__author">Аракелян Анжела</div>
      </a>
      <a href="<?php echo get_template_directory_uri(); ?>/build/img/pex.jpg" data-fancybox="certificates" data-sort="Педикюр">
        <img src="<?php echo get_template_directory_uri(); ?>/build/img/pex.jpg" alt="">
        <div class="gallery__author">Хачатрян Моника</div>
      </a>
      <a href="<?php echo get_template_directory_uri(); ?>/build/img/aa.jpg" data-fancybox="certificates" data-sort="Коррекция бровей">
        <img src="<?php echo get_template_directory_uri(); ?>/build/img/aa.jpg" alt="">
        <div class="gallery__author">Аракелян Анжела</div>
      </a>
      <a href="<?php echo get_template_directory_uri(); ?>/build/img/pex.jpg" data-fancybox="certificates" data-sort="Наращивание ресниц">
        <img src="<?php echo get_template_directory_uri(); ?>/build/img/pex.jpg" alt="">
        <div class="gallery__author">Хачатрян Моника</div>
      </a>
      <a href="<?php echo get_template_directory_uri(); ?>/build/img/pex.jpg" data-fancybox="certificates" data-sort="Наращивание ресниц">
        <img src="<?php echo get_template_directory_uri(); ?>/build/img/pex.jpg" alt="">
        <div class="gallery__author">Хачатрян Моника</div>
      </a>
    </div>
  </div>
</section>

<?php get_footer() ?>