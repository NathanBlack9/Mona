<?php
/*
Template Name: services_one
*/
?>

<?php 
  $title = get_the_title();

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

    <h1 class="service__title h1"><?php the_title(); ?></h1>

    <?php the_content(); ?>

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
