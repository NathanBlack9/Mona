<?php
/*
Template Name: sitemap
*/
?>

<?php 

  $menu_pos = carbon_get_theme_option('footer_menu');
  $menu_services = carbon_get_theme_option('footer_services');
  $menu_more = carbon_get_theme_option('footer_more');

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
          <?php foreach ( $menu_pos as $item ) { ?>
            <?php if ( $item['visible'] == 1 ) : ?>
              <li><a href="<?php echo get_template_directory_uri() . $item['url']; ?>"><?php echo $item['name']; ?></a></li>
            <?php endif; ?>
          <?php } ?>
          <?php foreach ( $menu_more as $item ) { ?>
            <?php if ( $item['visible'] == 1 ) : ?>
              <li><a href="<?php echo get_template_directory_uri() . $item['url']; ?>"><?php echo $item['name']; ?></a></li>
            <?php endif; ?>
          <?php } ?>
        </ul>
      </div>
      <div class="sitemap__item">
        <h3 class="h3">Услуги</h3>
        <ul>
          <li><a href="<?php echo get_template_directory_uri(); ?>/services/">Все услуги</a></li>
          <?php foreach ( $menu_services as $item ) { ?>
            <?php if ( $item['visible'] == 1 ) : ?>
              <li><a href="<?php echo get_template_directory_uri() . $item['url']; ?>"><?php echo $item['name']; ?></a></li>
            <?php endif; ?>
          <?php } ?>
        </ul>
      </div>
    </div>
  </div>

</section>

<?php get_footer() ?>
