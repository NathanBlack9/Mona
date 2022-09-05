<?php
/*
Template Name: services_one
*/
?>

<?php 
  $title = get_the_title();
  $page_ID = get_the_ID();

  $gallery = carbon_get_post_meta( $page_ID, 'one_gallery' );

  $masters = $wpdb->get_results("SELECT * from masters where id in (select master_id from services where category_id in(select id from service_categories where name = '{$title}') );");

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
        
        <?php echo carbon_get_post_meta( $page_ID, 'main_content' ) ?>
      </div>
      
      <?php if($gallery) { ?>
        <div class="service__slider-block">
          <div class="service__slider js-fade-slider">
            <?php foreach($gallery as $item) { ?>
              
              <img src="<?php echo wp_get_attachment_image_url($item, 'full'); ?>" alt="" class="service__slider-item" />
            <?php } ?>
          </div>
          <?php if ( count($gallery) > 1 ) { ?>
            <div class="service__slider-controls">
              <div class="js-fade-slider-prev slick-prev"></div>
              <div class="js-fade-slider-counter service__slider-counter"></div>
              <div class="js-fade-slider-next slick-next"></div>
            </div>
          <?php } ?>
        </div>
      <?php } ?>
    </div>

    <div class="service__masters">
      <h2 class="h2">Мастера</h2>
      <div class="service__content content">
        <?php echo carbon_get_post_meta( $page_ID, 'second_content' ) ?>
      </div>
    </div>


    <div class="masters-list">

      <?php foreach($masters as $item) { ?>

        <div class="master"> 
          <img src="<?php echo get_template_directory_uri() . $item->img; ?>" alt="<?php echo $item->last_name ?>" class="master__img">
          <div class="master__name"><?php echo $item->last_name ." ". $item->first_name ." ". $item->mid_name?></div>
          <div class="master__desc"><?php echo $item->about; ?></div>
        </div>
      <?php } ?>
    </div>
  </div>
</section>

<?php get_footer() ?>
