<?php
/*
  Template Name: price
*/
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
              <dl>
                <dt class="price__table-name"><span>Маникюр (аппаратный, комби) </span></dt>
                <dd>
                  <dl>
                    <dt>550</dt>
                    <dd>600</dd>
                    <div class="price-hint hint">
                      <div class="hint-text">
                        Скидка в честь открытия <br><a href="#">Читать подробнее</a>
                      </div>
                    </div>
                  </dl>
                </dd>
              </dl>
              <dl>
                <dt class="proce__table-name"><span>Мужской маникюр</span></dt>
                <dd><span>800</span></dd>
              </dl>
              <dl>
                <dt class="proce__table-name"><span>Снятие геля</span></dt>
                <dd><span>300</span></dd>
              </dl>
              <dl>
                <dt class="proce__table-name"><span>Мужской маникюр</span></dt>
                <dd><span>800</span></dd>
              </dl>
              <dl>
                <dt class="proce__table-name"><span>Мужской маникюр</span></dt>
                <dd><span>800</span></dd>
              </dl>
            </div>
          </div>
          <div class="price__table-item js-mobile-spoiler" id="pedicure">
            <div class="price__table-title js-spoiler-toggler">Педикюр</div>
            <div class="price__table-body js-spoiler-body">
              <dl class="price__table-caption">
                <dt>Наименование услуги</dt>
                <dd>Цена, руб.</dd>
              </dl>
              <dl>
                <dt class="price__table-name"><span>Маникюр (аппаратный, комби) </span></dt>
                <dd>
                  <dl>
                    <dt>550</dt>
                    <dd>600</dd>
                    <div class="price-hint hint">
                      <div class="hint-text">
                        Скидка в честь открытия <br><a href="#">Читать подробнее</a>
                      </div>
                    </div>
                  </dl>
                </dd>
              </dl>
              <dl>
                <dt class="proce__table-name"><span>Мужской маникюр</span></dt>
                <dd><span>800</span></dd>
              </dl>
              <dl>
                <dt class="proce__table-name"><span>Снятие геля</span></dt>
                <dd><span>300</span></dd>
              </dl>
              <dl>
                <dt class="proce__table-name"><span>Мужской маникюр</span></dt>
                <dd><span>800</span></dd>
              </dl>
              <dl>
                <dt class="proce__table-name"><span>Мужской маникюр</span></dt>
                <dd><span>800</span></dd>
              </dl>
            </div>
          </div>
          <div class="price__table-item js-mobile-spoiler" id="sugaring">
            <div class="price__table-title js-spoiler-toggler">Шугаринг</div>
            <div class="price__table-body js-spoiler-body">
              <dl class="price__table-caption">
                <dt>Наименование услуги</dt>
                <dd>Цена, руб.</dd>
              </dl>
              <dl>
                <dt class="price__table-name"><span>Маникюр (аппаратный, комби) </span></dt>
                <dd>
                  <dl>
                    <dt>550</dt>
                    <dd>600</dd>
                    <div class="price-hint hint">
                      <div class="hint-text">
                        Скидка в честь открытия <br><a href="#">Читать подробнее</a>
                      </div>
                    </div>
                  </dl>
                </dd>
              </dl>
              <dl>
                <dt class="proce__table-name"><span>Мужской маникюр</span></dt>
                <dd><span>800</span></dd>
              </dl>
              <dl>
                <dt class="proce__table-name"><span>Снятие геля</span></dt>
                <dd><span>300</span></dd>
              </dl>
              <dl>
                <dt class="proce__table-name"><span>Мужской маникюр</span></dt>
                <dd><span>800</span></dd>
              </dl>
              <dl>
                <dt class="proce__table-name"><span>Мужской маникюр</span></dt>
                <dd><span>800</span></dd>
              </dl>
            </div>
          </div>
          <div class="price__table-item js-mobile-spoiler" id="brows">
            <div class="price__table-title js-spoiler-toggler">Коррекция бровей</div>
            <div class="price__table-body js-spoiler-body">
              <dl class="price__table-caption">
                <dt>Наименование услуги</dt>
                <dd>Цена, руб.</dd>
              </dl>
              <dl>
                <dt class="price__table-name"><span>Маникюр (аппаратный, комби) </span></dt>
                <dd>
                  <dl>
                    <dt>550</dt>
                    <dd>600</dd>
                    <div class="price-hint hint">
                      <div class="hint-text">
                        Скидка в честь открытия <br><a href="#">Читать подробнее</a>
                      </div>
                    </div>
                  </dl>
                </dd>
              </dl>
              <dl>
                <dt class="proce__table-name"><span>Мужской маникюр</span></dt>
                <dd><span>800</span></dd>
              </dl>
              <dl>
                <dt class="proce__table-name"><span>Снятие геля</span></dt>
                <dd><span>300</span></dd>
              </dl>
              <dl>
                <dt class="proce__table-name"><span>Мужской маникюр</span></dt>
                <dd><span>800</span></dd>
              </dl>
              <dl>
                <dt class="proce__table-name"><span>Мужской маникюр</span></dt>
                <dd><span>800</span></dd>
              </dl>
            </div>
          </div>
          <div class="price__table-item js-mobile-spoiler" id="lashes">
            <div class="price__table-title js-spoiler-toggler">Наращивание ресниц</div>
            <div class="price__table-body js-spoiler-body">
              <dl class="price__table-caption">
                <dt>Наименование услуги</dt>
                <dd>Цена, руб.</dd>
              </dl>
              <dl>
                <dt class="price__table-name"><span>Маникюр (аппаратный, комби) </span></dt>
                <dd>
                  <dl>
                    <dt>550</dt>
                    <dd>600</dd>
                    <div class="price-hint hint">
                      <div class="hint-text">
                        Скидка в честь открытия <br><a href="#">Читать подробнее</a>
                      </div>
                    </div>
                  </dl>
                </dd>
              </dl>
              <dl>
                <dt class="proce__table-name"><span>Мужской маникюр</span></dt>
                <dd><span>800</span></dd>
              </dl>
              <dl>
                <dt class="proce__table-name"><span>Снятие геля</span></dt>
                <dd><span>300</span></dd>
              </dl>
              <dl>
                <dt class="proce__table-name"><span>Мужской маникюр</span></dt>
                <dd><span>800</span></dd>
              </dl>
              <dl>
                <dt class="proce__table-name"><span>Мужской маникюр</span></dt>
                <dd><span>800</span></dd>
              </dl>
            </div>
          </div>
          
          
        </div>
        <div class="price__navigation js-navigation fixed">
          <a href="#manicure" id="nav1" class="js-scroll-to">Маникюр</a>
          <a href="#pedicure" id="nav2" class="js-scroll-to">Педикюр</a>
          <a href="#sugaring" id="nav3" class="js-scroll-to">Шугаринг</a>
          <a href="#brows" id="nav4" class="js-scroll-to">Коррекция бровей</a>
          <a href="#lashes" id="nav5" class="js-scroll-to">Наращивание ресниц</a>
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

