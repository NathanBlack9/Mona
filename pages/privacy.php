<?php
/*
Template Name: privacy
*/
?>

<?php get_header() ?>



<section class="privacy">
  <div class="wrapper">
    <?php
      if ( function_exists('yoast_breadcrumb') ) {
        yoast_breadcrumb('<ul id="breadcrumbs" class="breadcrumbs"><li>','</li></ul>');
      }
    ?>
    <div class="privacy__inner">
      <h1 class="privacy__title h1"><?php the_title(); ?></h1>
      <div class="text-container">
        <?php the_content(); ?>
      </div>
    </div>
  </div>
</section>

<?php get_footer() ?>
