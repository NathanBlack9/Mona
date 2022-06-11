<?php
/*
* Template Name: certificates
*/
?>

<?php 

  $gallery = carbon_get_theme_option('certificates');

?>

<?php get_header() ?>


<section class="certificates-page certificates">
  <div class="wrapper">
    <?php
      if ( function_exists('yoast_breadcrumb') ) {
        yoast_breadcrumb('<ul id="breadcrumbs" class="breadcrumbs"><li>','</li></ul>');
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
      <?php foreach($gallery as $item) { ?>
        <a href="<?php echo wp_get_attachment_image_url($item, 'full'); ?>" data-fancybox="certificates" data-sort="<?php echo wp_get_attachment_caption($item); ?>">
          <img src="<?php echo wp_get_attachment_image_url($item, 'full'); ?>" alt="">
        </a>
      <?php } ?>
    </div>
  </div>
</section>

<?php get_footer() ?>