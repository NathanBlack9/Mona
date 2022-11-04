<?php
/*
* Template Name: certificates
*/
?>

<?php 

  $gallery = carbon_get_theme_option('certificates');
  $masters = $wpdb->get_results("SELECT * from masters;");

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

        <?php foreach($masters as $item) { ?>
          <a href="#" class="sorting__btn" data-sort="<?php echo $item->last_name; ?>">
            <?php echo $item->last_name .' '.mb_substr($item->first_name, 0, 1). '.' .mb_substr($item->mid_name, 0, 1).'.' ?>
          </a>
        <?php } ?>
      </div>

      <div class="only-mobile">
        <select name="" id="" class="sorting__select js-sorting-select">
          <option value="all">Все</option>

          <?php foreach($masters as $item) { ?>
            <option value="<?php echo $item->last_name; ?>">
              <?php echo $item->last_name .' '.mb_substr($item->first_name, 0, 1). '.' .mb_substr($item->mid_name, 0, 1).'.' ?>
            </option>
          <?php } ?>
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