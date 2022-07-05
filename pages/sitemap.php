<?php
/*
Template Name: sitemap
*/
?>

<?php get_header() ?>

<section class="sitemap">
  <div class="wrapper">
    <?php
      if ( function_exists('yoast_breadcrumb') ) {
        yoast_breadcrumb('<ul id="breadcrumbs" class="breadcrumbs"><li>','</li></ul>');
      }
    ?>
  </div>
  
  <div class="wrapper">
    <h1 class="h1"><?php the_title(); ?></h1>
    <div class="sitemap__inner">

      <div class="sitemap__item">
        <h3 class="h3">Общая информация</h3>
        <ul>
          <li><a href="<?php echo get_template_directory_uri(); ?>/about/">О нас</a></li>
          <li><a href="<?php echo get_template_directory_uri(); ?>/privacy/">Политика конфиденциальности</a></li>
          <li><a href="<?php echo get_template_directory_uri(); ?>/price/">Цены и оплата</a></li>
          <li><a href="<?php echo get_template_directory_uri(); ?>/certificates/">Сертификаты</a></li>
          <li><a href="<?php echo get_template_directory_uri(); ?>/gallery/">Фотогалерея наших работ</a></li>
          <li><a href="<?php echo get_template_directory_uri(); ?>/reviews/">Отзывы</a></li>
          <li><a href="<?php echo get_template_directory_uri(); ?>/contact/">Контакты</a></li>
          <li><a href="<?php echo get_template_directory_uri(); ?>/discounts/">Акции</a></li>
        </ul>
      </div>
      <div class="sitemap__item">
        <h3 class="h3">Услуги</h3>
        <ul>
          <li><a href="<?php echo get_template_directory_uri(); ?>/services/">Все услуги</a></li>
          <li><a href="<?php echo get_template_directory_uri(); ?>/manicure/">Маникюр</a></li>
          <li><a href="<?php echo get_template_directory_uri(); ?>/pedicure/">Педикюр</a></li>
          <li><a href="<?php echo get_template_directory_uri(); ?>/sugaring/">Шугаринг</a></li>
          <li><a href="<?php echo get_template_directory_uri(); ?>/lashes/">Наращивание ресниц</a></li>
          <li><a href="<?php echo get_template_directory_uri(); ?>/browes/">Коррекция бровей</a></li>
        </ul>
      </div>
    </div>
  </div>

</section>

<?php get_footer() ?>
