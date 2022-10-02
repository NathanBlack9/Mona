<?php
/*
Template Name: info
*/
?>

<?php get_header() ?>



<section class="info info-page">
  <div class="wrapper">
    <?php
      if ( function_exists('yoast_breadcrumb') ) {
        yoast_breadcrumb('<ul id="breadcrumbs" class="breadcrumbs"><li>','</li></ul>');
      }
    ?>
    <div class="info__inner">
      <h1 class="info__title h1"><?php the_title(); ?></h1>
      <div class="text-container content">
        <?php the_content(); ?>
      </div>
    </div>
  </div>
</section>

<?php get_footer() ?>
