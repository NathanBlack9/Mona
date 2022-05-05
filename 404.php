<?php
/*
Template Name: 404
*/
?>

<?php get_header() ?>


<?php 
  global $wpdb; 
  $newtable = $wpdb->get_results( "SELECT * FROM wp_yoast_migrations" );

  print_r($newtable[0]->version);  // object.value
?>
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

<script>
  let i = <?php print_r( $newtable); ?>;
  console.log( i );
</script>

<?php get_footer() ?>
