<?php
/*
  Template Name: discounts
*/
?>

<?php 
  $discounts = $wpdb->get_results('SELECT * FROM discount;');

  // $mysqli = new mysqli("localhost", "root", "", "mona");
  // $discounts = $mysqli->query("SELECT * FROM discount;"); // Только для BACKEND, где не работает WP

  function formatDate ($param) {
    return DateTime::createFromFormat('Y-m-d', $param)->format('d.m.Y');
  }

?>

<?php get_header() ?>

<section class="discounts-page discounts">
  <div class="wrapper">
    <?php
      if ( function_exists('yoast_breadcrumb') ) {
        yoast_breadcrumb('<ul id="breadcrumbs" class="breadcrumbs"><li>','</li></ul>');
      }
    ?>
    <h1 class="h1"><?php the_title(); ?></h1>

    <div class="discounts__inner">
      <?php  //while($item = $discounts->fetch_assoc()) { ?>
      <?php  foreach ( $discounts as $item ) { ?>
        <a href="<?php echo get_template_directory_uri(); ?>/sign/" class="discounts__item">
          <img src="<?php echo get_template_directory_uri(); ?><?php echo $item->img; ?>" alt="" class="discounts__img"> 
          <div class="discounts__title"><?php echo $item->name; ?></div>
          <div class="discounts__subtitle"><?php echo $item->announce; ?></div>
          <span class="discounts__period">Акция продлится до <?php echo formatDate($item->end_date); ?>г.</span>
        </a>
      <?php } ?>
    </div>
  </div>
</section>


<?php get_footer() ?>