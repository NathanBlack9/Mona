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
        <div class="price__table">
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
              <td class="price__table-name"><span>Маникюр + Гель-лак (однотонное покрытие)</span></td>
              <td><span>1300</span></td>
            </tr>
            <tr>
              <td class="price__table-name"><span>Наращивание + Френч (выкладной френч)</span></td>
              <td><span>от 2000</span></td>
            </tr>
          </table>
        </div>
        <div class="price__navigation js-price-navigation">
          <a href="#manicure" class="active js-scroll">Маникюр</a>
          <a href="#pedicure" class="js-scroll">Педикюр</a>
          <a href="#sugaring" class="js-scroll">Шугаринг</a>
          <a href="#lashes" class="js-scroll">Наращивание ресниц</a>
          <a href="#brows" class="js-scroll">Коррекция бровей</a>
        </div>
      </div>
    </div>


    <div class="payment">
      <h2 class="h2">Оплата</h2>
    </div>
  </div>
</section>

<?php get_footer() ?>

