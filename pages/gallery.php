<?php
/**
 * Template Name: gallery
 */
?>

<?php 

  $services = $wpdb->get_results('SELECT name from service_categories');

  $gallery = carbon_get_theme_option('gallery');

  // echo wp_get_attachment_caption($gallery[0]['photo']); // Подпись картинки
  // echo wp_get_attachment_image_url($gallery[0]['photo'], 'full'); // Ссылка картинки

  // echo $gallery[0]['select'];
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
        <?php foreach( $services as $item ) { ?>
          <a href="#" class="sorting__btn" data-sort="<?php echo $item->name ?>"><?php echo $item->name ?></a>
        <?php } ?>
      </div>
      <div class="only-mobile">
        <select name="" id="" class="sorting__select js-sorting-select">
          <option value="all">Все</option>
          <?php foreach( $services as $item ) { ?>
            <option value="<?php echo $item->name ?>"><?php echo $item->name ?></option>
          <?php } ?>
        </select>
      </div>
    </div>
    <div class="certificates__inner js-sorting-content">
      <?php foreach( $gallery as $item ) { ?> 
        <a href="<?php echo wp_get_attachment_image_url($item['photo'], 'full'); ?>" data-fancybox="gallery" data-sort="<?php echo $item['select']; ?>">
          <img src="<?php echo wp_get_attachment_image_url($item['photo'], 'full'); ?>" alt="">
          <div class="gallery__author">мастер: <?php echo $item['master']; ?></div>
        </a>
      <?php } ?>
    </div>
  </div>
</section>

<?php get_footer() ?>