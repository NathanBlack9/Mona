<?php
/*
  Template Name: discounts
*/
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
      <div class="discounts__item">
        <img src="<?php echo get_template_directory_uri(); ?>/build/img/GIF.gif" alt="" class="discounts__img"> 
        <div class="discounts__title">Мы открылись</div>
        <div class="discounts__subtitle">В честь открытия нашей студии дарим скидку 15% на все процедуры!<br>Спешите записаться, наши мастера с нетерпением ждут вас в гости.</div>
        <span class="discounts__period">Акция продлится до 01.12.2022г.</span>
      </div>
      <div class="discounts__item">
        <img src="<?php echo get_template_directory_uri(); ?>/build/img/GIF.gif" alt="" class="discounts__img"> 
        <div class="discounts__title">8 марта</div>
        <div class="discounts__subtitle">В честь открытия нашей студии дарим скидку 15% на все процедуры!<br>Спешите записаться, наши мастера с нетерпением ждут вас в гости.</div>
        <span class="discounts__period">Акция продлится до 01.12.2022г.</span>
      </div>
      <div class="discounts__item">
        <img src="<?php echo get_template_directory_uri(); ?>/build/img/GIF.gif" alt="" class="discounts__img"> 
        <div class="discounts__title">Скоро новый год!</div>
        <div class="discounts__subtitle">В честь открытия нашей студии дарим скидку 15% на все процедуры!<br>Спешите записаться, наши мастера с нетерпением ждут вас в гости.</div>
        <span class="discounts__period">Акция продлится до 01.12.2022г.</span>
      </div>
    </div>
  </div>
</section>


<?php get_footer() ?>