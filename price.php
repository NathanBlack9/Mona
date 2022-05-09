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
          <table>
            <tr id="manicure" class="price__table-title"><td>Маникюр</td></tr>
            <tr class="price__table-caption">
              <th>Наименование услуги</th>
              <th>Цена, руб.</th>
            </tr>
            <tr>
              <td class="price__table-name"><span>Маникюр (аппаратный, комби) </span></td>
              <td>
                <dl>
                  <dt>550</dt>
                  <dd>600</dd>
                  <div class="price-hint hint">
                    <div class="hint-text">
                      Скидка в честь открытия <br><a href="#">Читать подробнее</a>
                    </div>
                  </div>
                </dl>
              </td>
            </tr>
            <tr>
              <td class="price__table-name"><span>Мужской маникюр</span></td>
              <td><span>800</span></td>
            </tr>
            <tr>
              <td class="price__table-name"><span>Мужской маникюр</span></td>
              <td><span>800</span></td>
            </tr>
            <tr>
              <td class="price__table-name"><span>Мужской маникюр</span></td>
              <td><span>800</span></td>
            </tr>
            <tr>
              <td class="price__table-name"><span>Маникюр + Гель-лак (однотонное покрытие)</span></td>
              <td><span>1300</span></td>
            </tr>
            <tr>
              <td class="price__table-name"><span>Наращивание + Френч (выкладной френч)</span></td>
              <td><span>от 2000</span></td>
            </tr>
            <tr>
              <td class="price__table-name"><span>Маникюр (аппаратный, комби) </span></td>
              <td>
                <dl>
                  <dt>550</dt>
                  <dd>600</dd>
                  <div class="price-hint hint">
                    <div class="hint-text">
                      Скидка в честь открытия <br><a href="#">Читать подробнее</a>
                    </div>
                  </div>
                </dl>
              </td>
            </tr>
            <tr>
              <td class="price__table-name"><span>Мужской маникюр</span></td>
              <td><span>800</span></td>
            </tr>
            <tr>
              <td class="price__table-name"><span>Мужской маникюр</span></td>
              <td><span>800</span></td>
            </tr>
            <tr>
              <td class="price__table-name"><span>Мужской маникюр</span></td>
              <td><span>800</span></td>
            </tr>
            <tr>
              <td class="price__table-name"><span>Маникюр + Гель-лак (однотонное покрытие)</span></td>
              <td><span>1300</span></td>
            </tr>
            <tr>
              <td class="price__table-name"><span>Наращивание + Френч (выкладной френч)</span></td>
              <td><span>от 2000</span></td>
            </tr>
            <tr id="pedicure" class="price__table-title"><td>Педикюр</td></tr>
            <tr class="price__table-caption">
              <th>Наименование услуги</th>
              <th>Цена, руб.</th>
            </tr>
            <tr>
              <td class="price__table-name"><span>Мужской маникюр</span></td>
              <td><span>800</span></td>
            </tr>
            <tr>
              <td class="price__table-name"><span>Маникюр + Гель-лак (однотонное покрытие)</span></td>
              <td><span>1300</span></td>
            </tr>
            <tr>
              <td class="price__table-name"><span>Наращивание + Френч (выкладной френч)</span></td>
              <td><span>от 2000</span></td>
            </tr>
            <tr id="sugaring" class="price__table-title"><td>Шугаринг</td></tr>
            <tr class="price__table-caption">
              <th>Наименование услуги</th>
              <th>Цена, руб.</th>
            </tr>
            <tr>
              <td class="price__table-name"><span>Маникюр + Гель-лак (однотонное покрытие)</span></td>
              <td><span>1300</span></td>
            </tr>
            <tr>
              <td class="price__table-name"><span>Наращивание + Френч (выкладной френч)</span></td>
              <td><span>от 2000</span></td>
            </tr>
            <tr id="lashes" class="price__table-title"><td>Наращивание ресниц</td></tr>
            <tr class="price__table-caption">
              <th>Наименование услуги</th>
              <th>Цена, руб.</th>
            </tr>
            <tr>
              <td class="price__table-name"><span>Маникюр (аппаратный, комби) </span></td>
              <td>
                <dl>
                  <dt>800</dt>
                  <dd>1500</dd>
                  <div class="price-hint hint">
                    <div class="hint-text">
                      Скидка в честь открытия <br><a href="#manicure">Читать подробнее</a>
                    </div>
                  </div>
                </dl>
              </td>
            </tr>
            <tr>
              <td class="price__table-name"><span>Мужской маникюр</span></td>
              <td><span>800</span></td>
            </tr>
            <tr id="brows" class="price__table-title"><td>Коррекция бровей</td></tr>
            <tr class="price__table-caption">
              <th>Наименование услуги</th>
              <th>Цена, руб.</th>
            </tr>
            <tr>
              <td class="price__table-name"><span>Мужской маникюр</span></td>
              <td><span>800</span></td>
            </tr>
            <tr>
              <td class="price__table-name"><span>Мужской маникюр</span></td>
              <td><span>800</span></td>
            </tr>
            <tr>
              <td class="price__table-name"><span>Мужской маникюр</span></td>
              <td><span>800</span></td>
            </tr>
            <tr>
              <td class="price__table-name"><span>Маникюр + Гель-лак (однотонное покрытие)</span></td>
              <td><span>1300</span></td>
            </tr>
            <tr>
              <td class="price__table-name"><span>Наращивание + Френч (выкладной френч)</span></td>
              <td><span>от 2000</span></td>
            </tr>
            <tr>
              <td class="price__table-name"><span>Мужской маникюр</span></td>
              <td><span>800</span></td>
            </tr>
            <tr>
              <td class="price__table-name"><span>Маникюр + Гель-лак (однотонное покрытие)</span></td>
              <td><span>1300</span></td>
            </tr>
            <tr>
              <td class="price__table-name"><span>Наращивание + Френч (выкладной френч)</span></td>
              <td><span>от 2000</span></td>
            </tr>
            <tr>
              <td class="price__table-name"><span>Маникюр + Гель-лак (однотонное покрытие)</span></td>
              <td><span>1300</span></td>
            </tr>
            <tr>
              <td class="price__table-name"><span>Наращивание + Френч (выкладной френч)</span></td>
              <td><span>от 2000</span></td>
            </tr>
          </table>
        </div>
        <div class="price__navigation js-navigation fixed">
          <a href="#manicure" id="nav1" class="js-scroll-to">Маникюр</a>
          <a href="#pedicure" id="nav2" class="js-scroll-to">Педикюр</a>
          <a href="#sugaring" id="nav3" class="js-scroll-to">Шугаринг</a>
          <a href="#lashes" id="nav4" class="js-scroll-to">Наращивание ресниц</a>
          <a href="#brows" id="nav5" class="js-scroll-to">Коррекция бровей</a>
        </div>
      </div>
    </div>


    <div class="payment">
      <h2 class="h2">Оплата</h2>
      <div class="payment__inner">
        <div class="payment__item">
          <img src="<?php echo get_template_directory_uri(); ?>/build/img/payment1.png" alt="Наличными">
          <span>Наличными</span>
        </div>
        <div class="payment__item">
          <img src="<?php echo get_template_directory_uri(); ?>/build/img/payment2.png" alt="Банковской картой">
          <span>Банковской картой</span>
        </div>
        <div class="payment__item">
          <img src="<?php echo get_template_directory_uri(); ?>/build/img/payment3.png" alt="Безналичный перевод">
          <span>Безналичный перевод</span>
        </div>
        <div class="payment__item">
          <img src="<?php echo get_template_directory_uri(); ?>/build/img/payment4.png" alt="По QR-коду">
          <span>По QR-коду</span>
        </div>
      </div>
    </div>
  </div>
</section>

<?php get_footer() ?>

