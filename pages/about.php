<?php
/*
  Template Name: about
*/
?>

<?php 

  $page_ID = get_the_ID();
  $gallery = carbon_get_post_meta( $page_ID, 'about_gallery' );

  $masters = $wpdb->get_results('SELECT * from masters');

  function getServices( $param ) {
    global $wpdb;
    return $services = $wpdb->get_results("SELECT name FROM service_categories where id in (select category_id from services where master_id in (select id from masters where id = {$param}));");
  }
?>

<?php get_header() ?>
<section class="about-page">
  <div class="wrapper">
    <?php
      if ( function_exists('yoast_breadcrumb') ) {
        yoast_breadcrumb('<ul id="breadcrumbs" class="breadcrumbs"><li>','</li></ul>');
      }
    ?>
    <h1 class="h1"><?php the_title(); ?></h1>

    <div class="about__content content">
      <?php // echo carbon_get_post_meta( $page_ID, 'main_content' ) ?>
      <?php the_content(); ?>
    </div>

    <div class="about__inner">
      
      <?php if($gallery) : ?>
        <div class="about-page__slider js-slideshow slider">
          
          <?php foreach($gallery as $item) { ?>
            <a href="<?php echo wp_get_attachment_image_url($item, 'full'); ?>" data-fancybox="about_slider" class="slider-item">
              <img src="<?php echo wp_get_attachment_image_url($item, 'full'); ?>" alt="О нас">
            </a>
          <?php } ?>
        </div>
      <?php endif; ?>

    </div>

    <section class="features">
      <div class="features__title h1">Почему нам доверяют</div>
      <div class="features__inner">
        <div class="features__item">
          <div class="features__item-img">
            <img src="<?php echo get_template_directory_uri(); ?>/build/img/feature1.svg" alt="">
          </div>
          <div class="features__item-right">
            <div class="features__item-title">Соблюдаем стандарты СЭС</div>
            <div class="features__item-text">Добровольно проверяем работу стерилизаторов. Используем одноразовую продукцию</div>
          </div>
        </div>
        <div class="features__item">
          <div class="features__item-img">
            <img src="<?php echo get_template_directory_uri(); ?>/build/img/feature2.svg" alt="">
          </div>
          <div class="features__item-right">
            <div class="features__item-title">Индивидуальный подход</div>
            <div class="features__item-text">Мы&nbsp;действительно стараемся понять ваши потребности и&nbsp;ожидания</div>
          </div>
        </div>
        <div class="features__item">
          <div class="features__item-img">
            <img src="<?php echo get_template_directory_uri(); ?>/build/img/feature3.svg" alt="">
          </div>
          <div class="features__item-right">
            <div class="features__item-title">Не обещаем того, что выполнить не можем</div>
            <div class="features__item-text">Подробно и&nbsp;честно расскажем о&nbsp;преимуществах и&nbsp;недостатках каждой процедуры. Не&nbsp;забываем рассказать про уход в&nbsp;домашних условиях</div>
          </div>
        </div>
      </div>
    </section>

    <h2 class="h2">Наши мастера</h2>
    <div class="about__content content">
      <?php echo carbon_get_post_meta( $page_ID, 'second_content' ) ?>
    </div>

    <div class="about__inner">
      <div class="masters-list">
        <?php foreach($masters as $item) { 

          $element = getServices( $item->id ); ?>

            <div class="master"> 
              <img src="<?php echo get_template_directory_uri() . $item->img; ?>" alt="<?php echo $item->last_name ?>" class="master__img">
              <div class="master__name"><?php echo $item->last_name ." ". $item->first_name ." ". $item->mid_name?></div>
              <div class="master__service">
                Услуги: 
                <?php foreach($element as $val ) {
                  
                  if($val == end($element)) {
                    echo $val->name; // Последний элемент
                  }
                  else {
                    echo $val->name . ", "; 
                  }
                } ?>
              </div>
              <div class="master__desc"><?php echo $item->about; ?></div>
            </div>
        <?php } ?>
      </div>
    </div>

  </div>
</section>

<?php get_footer() ?>