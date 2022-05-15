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
          <li><a href="#">О нас</a></li>
          <li><a href="#">Политика конфиденциальности</a></li>
          <li><a href="#">Цены и оплата</a></li>
          <li><a href="#">Сертификаты</a></li>
          <li><a href="#">Фотогалерея наших работ</a></li>
          <li><a href="#">Отзывы</a></li>
          <li><a href="#">Контакты</a></li>
          <li><a href="#">Акции</a></li>
        </ul>
      </div>
      <div class="sitemap__item">
        <h3 class="h3">Услуги</h3>
        <ul>
          <li><a href="#">Все услуги</a></li>
          <li><a href="#">Маникюр</a></li>
          <li><a href="#">Педикюр</a></li>
          <li><a href="#">Шугаринг</a></li>
          <li><a href="#">Наращивание ресниц</a></li>
          <li><a href="#">Коррекция бровей</a></li>
        </ul>
      </div>
    </div>
  </div>

</section>

<?php get_footer() ?>