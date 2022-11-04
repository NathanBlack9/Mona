<?php
/*
Template Name: 404
*/
?>

<?php get_header() ?>

<section class="error-page error-404">
  <div class="wrapper">
    <div class="error-page__inner">
      <p class="error-page__text">
        К сожалению, эта станица недоступна
      </p> 
      <a href="<?php echo home_url(); ?>" class="btn error-page__btn black--btn">На главную</a>
    </div>
  </div>
</section>

<?php get_footer() ?>
