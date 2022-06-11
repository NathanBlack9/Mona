<?php
/*
  Template Name: price
*/
?>

<?php 
  // global $wpdb; 
  $manicurePrices = $wpdb->get_results( 'SELECT services_name, money, discount_price from services where category_id like (select id from service_categories where name = "Маникюр");' );
  $pedicurePrices = $wpdb->get_results( 'SELECT services_name, money, discount_price from services where category_id like (select id from service_categories where name = "Педикюр");' );
  $sugaringPrices = $wpdb->get_results( 'SELECT services_name, money, discount_price from services where category_id like (select id from service_categories where name = "Шугаринг");' );
  $lashesPrices = $wpdb->get_results( 'SELECT services_name, money, discount_price from services where category_id like (select id from service_categories where name = "Наращивание ресниц");' );
  $eyebrowPrices = $wpdb->get_results( 'SELECT services_name, money, discount_price from services where category_id like (select id from service_categories where name = "Коррекция бровей");' );

  $services = $wpdb->get_results('SELECT name from service_categories');


  // $phone = "+7 (950) 915 08-58";
  // $phone = str_replace([' ', '(', ')', '-'], '', $phone);
  // echo $phone;
  // print_r($services[1]->name);  // object.value
?>

<?php get_header() ?>

<section class="price-page">
  <div class="wrapper">
    <?php
      if ( function_exists('yoast_breadcrumb') ) {
        yoast_breadcrumb('<ul id="breadcrumbs" class="breadcrumbs"><li>','</li></ul>');
      }
    ?>

    <div class="price">
      <h1 class="h1"><?php the_title(); ?></h1>
      <div class="price__inner">
        <div class="price__content content"> <?php the_content(); ?></div>
        <div class="price__table js-price-table">
          <div class="price__table-item js-mobile-spoiler is-expanded" id="manicure">
            <div class="price__table-title js-spoiler-toggler is-expanded">Маникюр</div>
            <div class="price__table-body js-spoiler-body is-expanded">
              <dl class="price__table-caption">
                <dt>Наименование услуги</dt>
                <dd>Цена, руб.</dd>
              </dl>
              <?php foreach ($manicurePrices as $value) { ?>
                <?php if ( $value->discount_price == 0 ) { ?>
                  <dl>
                    <dt class="price__table-name"><span><?php echo $value->services_name ?></span></dt>
                    <dd><span><?php echo $value->money ?></span></dd>
                  </dl>
                <?php } else {?>
                  <dl> 
                    <dt class="price__table-name"><span><?php echo $value->services_name ?></span></dt>
                    <dd>
                      <dl>
                        <dt><?php echo $value->discount_price ?></dt>
                        <dd><?php echo $value->money ?></dd>
                        <div class="price-hint hint">
                          <div class="hint-text">
                            Скидка в честь открытия <br><a href="<?php echo get_template_directory_uri(); ?>/discounts/">Читать подробнее</a>
                          </div>
                        </div>
                      </dl>
                    </dd>
                  </dl> 
                <?php } ?>
              <?php } ?>
            </div>
          </div>
          <div class="price__table-item js-mobile-spoiler" id="pedicure">
            <div class="price__table-title js-spoiler-toggler">Педикюр</div>
            <div class="price__table-body js-spoiler-body">
              <dl class="price__table-caption">
                <dt>Наименование услуги</dt>
                <dd>Цена, руб.</dd>
              </dl>
              <?php foreach ($pedicurePrices as $value) { ?>
                <?php if ( $value->discount_price == 0 ) { ?>
                  <dl>
                    <dt class="price__table-name"><span><?php echo $value->services_name ?></span></dt>
                    <dd><span><?php echo $value->money ?></span></dd>
                  </dl>
                <?php } else {?>
                  <dl> 
                    <dt class="price__table-name"><span><?php echo $value->services_name ?></span></dt>
                    <dd>
                      <dl>
                        <dt><?php echo $value->discount_price ?></dt>
                        <dd><?php echo $value->money ?></dd>
                        <div class="price-hint hint">
                          <div class="hint-text">
                            Скидка в честь открытия <br><a href="<?php echo get_template_directory_uri(); ?>/discounts/">Читать подробнее</a>
                          </div>
                        </div>
                      </dl>
                    </dd>
                  </dl> 
                <?php } ?>
              <?php } ?>
            </div>
          </div>
          <div class="price__table-item js-mobile-spoiler" id="sugaring">
            <div class="price__table-title js-spoiler-toggler">Шугаринг</div>
            <div class="price__table-body js-spoiler-body">
              <dl class="price__table-caption">
                <dt>Наименование услуги</dt>
                <dd>Цена, руб.</dd>
              </dl>
              <?php foreach ($sugaringPrices as $value) { ?>
                <?php if ( $value->discount_price == 0 ) { ?>
                  <dl>
                    <dt class="price__table-name"><span><?php echo $value->services_name ?></span></dt>
                    <dd><span><?php echo $value->money ?></span></dd>
                  </dl>
                <?php } else {?>
                  <dl> 
                    <dt class="price__table-name"><span><?php echo $value->services_name ?></span></dt>
                    <dd>
                      <dl>
                        <dt><?php echo $value->discount_price ?></dt>
                        <dd><?php echo $value->money ?></dd>
                        <div class="price-hint hint">
                          <div class="hint-text">
                            Скидка в честь открытия <br><a href="<?php echo get_template_directory_uri(); ?>/discounts/">Читать подробнее</a>
                          </div>
                        </div>
                      </dl>
                    </dd>
                  </dl> 
                <?php } ?>
              <?php } ?>
            </div>
          </div>
          <div class="price__table-item js-mobile-spoiler" id="brows">
            <div class="price__table-title js-spoiler-toggler">Коррекция бровей</div>
            <div class="price__table-body js-spoiler-body">
              <dl class="price__table-caption">
                <dt>Наименование услуги</dt>
                <dd>Цена, руб.</dd>
              </dl>
              <?php foreach ($eyebrowPrices as $value) { ?>
                <?php if ( $value->discount_price == 0 ) { ?>
                  <dl>
                    <dt class="price__table-name"><span><?php echo $value->services_name ?></span></dt>
                    <dd><span><?php echo $value->money ?></span></dd>
                  </dl>
                <?php } else {?>
                  <dl> 
                    <dt class="price__table-name"><span><?php echo $value->services_name ?></span></dt>
                    <dd>
                      <dl>
                        <dt><?php echo $value->discount_price ?></dt>
                        <dd><?php echo $value->money ?></dd>
                        <div class="price-hint hint">
                          <div class="hint-text">
                            Скидка в честь открытия <br><a href="<?php echo get_template_directory_uri(); ?>/discounts/">Читать подробнее</a>
                          </div>
                        </div>
                      </dl>
                    </dd>
                  </dl> 
                <?php } ?>
              <?php } ?>
            </div>
          </div>
          <div class="price__table-item js-mobile-spoiler" id="lashes">
            <div class="price__table-title js-spoiler-toggler">Наращивание ресниц</div>
            <div class="price__table-body js-spoiler-body">
              <dl class="price__table-caption">
                <dt>Наименование услуги</dt>
                <dd>Цена, руб.</dd>
              </dl>
              <?php foreach ($lashesPrices as $value) { ?>
                <?php if ( $value->discount_price == 0 ) { ?>
                  <dl>
                    <dt class="price__table-name"><span><?php echo $value->services_name ?></span></dt>
                    <dd><span><?php echo $value->money ?></span></dd>
                  </dl>
                <?php } else {?>
                  <dl> 
                    <dt class="price__table-name"><span><?php echo $value->services_name ?></span></dt>
                    <dd>
                      <dl>
                        <dt><?php echo $value->discount_price ?></dt>
                        <dd><?php echo $value->money ?></dd>
                        <div class="price-hint hint">
                          <div class="hint-text">
                            Скидка в честь открытия <br><a href="<?php echo get_template_directory_uri(); ?>/discounts/">Читать подробнее</a>
                          </div>
                        </div>
                      </dl>
                    </dd>
                  </dl> 
                <?php } ?>
              <?php } ?>
            </div>
          </div>
        </div>

        <div class="price__navigation js-navigation fixed">
          <a href="#manicure" id="nav1" class="js-scroll-to"><?php echo $services[0]->name ?></a>
          <a href="#pedicure" id="nav2" class="js-scroll-to"><?php echo $services[1]->name ?></a>
          <a href="#sugaring" id="nav3" class="js-scroll-to"><?php echo $services[2]->name ?></a>
          <a href="#brows" id="nav4" class="js-scroll-to"><?php echo $services[3]->name ?></a>
          <a href="#lashes" id="nav5" class="js-scroll-to"><?php echo $services[4]->name ?></a>
        </div>
      </div>
    </div>

    <div class="payment">
      <h2 class="h2">Оплата</h2>
      <div class="payment__inner">
        <div class="payment__item">
          <img src="<?php echo get_template_directory_uri(); ?>/build/img/payment1.svg" alt="Наличными">
          <span>Наличными</span>
        </div>
        <div class="payment__item">
          <img src="<?php echo get_template_directory_uri(); ?>/build/img/payment2.svg" alt="Банковской картой">
          <span>Банковской картой</span>
        </div>
        <div class="payment__item">
          <img src="<?php echo get_template_directory_uri(); ?>/build/img/payment3.svg" alt="Безналичный перевод">
          <span>Безналичный перевод</span>
        </div>
        <div class="payment__item">
          <img src="<?php echo get_template_directory_uri(); ?>/build/img/payment4.svg" alt="По QR-коду">
          <span>По QR-коду</span>
        </div>
      </div>
    </div>
  </div>
</section>

<?php get_footer() ?>

