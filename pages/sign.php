<?php
/*
  Template Name: sign
*/
?>

<?php
  $categories = $wpdb->get_results("SELECT * from service_categories;");

  /**
   * id = 5 - Это "Маникюр, Гель-лак (однотонное покрытие)"
   * Его выводим первым, дальше поочередно
   */
  $manicure = $wpdb->get_results("SELECT id, services_name, category_id FROM services WHERE category_id = 1 and time <> 0 order by FIELD(id, 5) DESC;");

  function defineMaster( $param ) {
    global $wpdb;
    $master = $wpdb->get_results("SELECT * FROM masters where id in (select master_id from services where category_id = {$param})");
    return $master;
  };
?>

<?php get_header() ?>


<section class="sign-page sign">
  <div class="wrapper">
    <?php
      if ( function_exists('yoast_breadcrumb') ) {
        yoast_breadcrumb('<ul id="breadcrumbs" class="breadcrumbs"><li>','</li></ul>');
      }
    ?>

    <h1 class="sign__title h1"><?php the_title(); ?></h1>

    <div class="sign__content content">
      <p>Записаться онлайн к нашим мастерам очень просто - выберите удобную для вас дату, время и оставьте нам свои контакты для обратной связи. Перед оформлением записи просим вас ознакомится с нашими <a href="<?php echo get_template_directory_uri(); ?>/rules/" target="_blank">правилами записи</a>.</p>

      <p>Посмотреть свои записи или отменить уже созданную запись можно <a href="<?php echo get_template_directory_uri(); ?>/unsign/">здесь</a>.</p>
      <?php // <p>Если вы записывались к мастеру не через сайт, то такую запись можно отменить только по телефону +79509150858.</p> ?>
    </div>

    <div class="sign__inner">
      <div class="sign-progress progress">
        <div class="progress-point active">1</div>
        <div class="progress-point">2</div>
        <div class="progress-point">3</div>
        <div class="progress-point">4</div>
      </div>

      <?php the_content(); // sign form?>

      <section class="sign__master js-sign-master" style="display: none;">
        <img src="" alt="" class="sign__master-img">
        <div class="sign__master-name h3"></div>
        <?php /* <div class="sign__master-desc"></div> */ ?>
        <a href="#" class="sign__master-btn btn pink--btn" target="_blank">Посмотреть отзывы</a>
      </section>
    </div>
  </div>
</section>


<?php get_footer() ?>

<?php if (isset ($_GET['sign']) ) { ?>
  <script>
    (() => {
      $('.sign__content').remove();
      $('.sign__inner').empty().append(`<a href="<?php echo home_url(); ?>" class="sign__success-btn btn black--btn">На главную</a>`);
      $('.sign__title').html(`Запись принята!<br>Спасибо что выбрали нас!`);
    })();
  </script>
<?php } ?>

<script>
  <?php /* --- Вывод услуг из базы --- */ ?>
  $('.js-services-select').on('selectric-before-init', function(event, element, selectric) {
    $(element).empty();
    <?php foreach($categories as $item) { ?>
      $(element).append('<option value="<?php echo $item->name; ?>"><?php echo $item->name; ?></option>');
    <?php } ?>

    const $typeSelect = $('.js-type-select');
    const $mastersSelect = $('.js-masters-select');

    $typeSelect.empty();
    $mastersSelect.empty();

    <?php $arr = $manicure;
      foreach($arr as $item) { ?>
        $typeSelect.append($('<option>', {
          value: '<?php echo $item->services_name; ?>',
          text: '<?php echo $item->services_name; ?>'
        }));
      <?php } ?>
  });

  $(()=> {
    $('.js-services-select').trigger('selectric-change');
    setTimeout(() => {
      $('.ui-datepicker-today').click();
    }, 300);
  });

</script>
<?php
  $closedDates = carbon_get_theme_option('closed_dates');
?>
<script>
  $('.js-masters-select').on('selectric-refresh selectric-change selectric-before-init', function(event, element, selectric) {
    let $masterNameFromSelect = $(this).val();

    $('#sign-form__date').datepicker( "option", "beforeShowDay", (date) => {
      <?php // Даты которые выводятся на календаре ?>
      let $date = new Date(date).toLocaleDateString('ru-ru').split( '.' ).reverse( ).join( '-' );
      <?php // Даты которые НЕ нужно выводить/закрытые дни мастеров ?>
      let $closedDates = [];

      <?php /* foreach( $closedDates as $item ) { ?>
        if( $masterNameFromSelect == '<?php echo $item['master'] ?>' ) {
          $closedDates.push('<?php echo $item['closed_dates'] ?>');
        }
      <?php } */ ?>

      if( $masterNameFromSelect == 'Хачатрян' ) {
        $closedDates.push('2024-09-16');
      }
      if( $masterNameFromSelect == 'Хачатрян' ) {
        $closedDates.push('2024-08-31');
      }

      if( $masterNameFromSelect == 'Аракелян' ) {
        $closedDates.push('2024-09-03');
      }
      if( $masterNameFromSelect == 'Аракелян' ) {
        $closedDates.push('2024-09-04');
      }
      if( $masterNameFromSelect == 'Аракелян' ) {
        $closedDates.push('2024-09-05');
      }
      if( $masterNameFromSelect == 'Аракелян' ) {
        $closedDates.push('2024-09-06');
      }
      if( $masterNameFromSelect == 'Аракелян' ) {
        $closedDates.push('2024-09-07');
      }
      if( $masterNameFromSelect == 'Аракелян' ) {
        $closedDates.push('2024-09-08');
      }
      if( $masterNameFromSelect == 'Аракелян' ) {
        $closedDates.push('2024-09-09');
      }
      if( $masterNameFromSelect == 'Аракелян' ) {
        $closedDates.push('2024-09-10');
      }
      if( $masterNameFromSelect == 'Аракелян' ) {
        $closedDates.push('2024-09-11');
      }
      if( $masterNameFromSelect == 'Аракелян' ) {
        $closedDates.push('2024-09-12');
      }
      if( $masterNameFromSelect == 'Аракелян' ) {
        $closedDates.push('2024-09-13');
      }
      if( $masterNameFromSelect == 'Аракелян' ) {
        $closedDates.push('2024-09-14');
      }
      if( $masterNameFromSelect == 'Аракелян' ) {
        $closedDates.push('2024-09-15');
      }
      if( $masterNameFromSelect == 'Аракелян' ) {
        $closedDates.push('2024-09-16');
      }
      if( $masterNameFromSelect == 'Аракелян' ) {
        $closedDates.push('2024-09-17');
      }
      if( $masterNameFromSelect == 'Аракелян' ) {
        $closedDates.push('2024-09-18');
      }
      if( $masterNameFromSelect == 'Аракелян' ) {
        $closedDates.push('2024-09-19');
      }
      if( $masterNameFromSelect == 'Аракелян' ) {
        $closedDates.push('2024-09-20');
      }
      if( $masterNameFromSelect == 'Аракелян' ) {
        $closedDates.push('2024-09-21');
      }
      if( $masterNameFromSelect == 'Аракелян' ) {
        $closedDates.push('2024-09-22');
      }
      if( $masterNameFromSelect == 'Аракелян' ) {
        $closedDates.push('2024-09-23');
      }
      if( $masterNameFromSelect == 'Аракелян' ) {
        $closedDates.push('2024-09-24');
      }
      if( $masterNameFromSelect == 'Аракелян' ) {
        $closedDates.push('2024-09-25');
      }
      if( $masterNameFromSelect == 'Аракелян' ) {
        $closedDates.push('2024-09-26');
      }
      if( $masterNameFromSelect == 'Аракелян' ) {
        $closedDates.push('2024-09-27');
      }
      if( $masterNameFromSelect == 'Аракелян' ) {
        $closedDates.push('2024-09-28');
      }
      if( $masterNameFromSelect == 'Аракелян' ) {
        $closedDates.push('2024-09-29');
      }
      if( $masterNameFromSelect == 'Аракелян' ) {
        $closedDates.push('2024-09-30');
      }

      if( $masterNameFromSelect == 'Каплина' ) {
        $closedDates.push('2024-09-01');
      }
      if( $masterNameFromSelect == 'Каплина' ) {
        $closedDates.push('2024-09-02');
      }
      if( $masterNameFromSelect == 'Каплина' ) {
        $closedDates.push('2024-09-03');
      }
      if( $masterNameFromSelect == 'Каплина' ) {
        $closedDates.push('2024-09-04');
      }
      if( $masterNameFromSelect == 'Каплина' ) {
        $closedDates.push('2024-09-05');
      }
      if( $masterNameFromSelect == 'Каплина' ) {
        $closedDates.push('2024-09-06');
      }
      if( $masterNameFromSelect == 'Каплина' ) {
        $closedDates.push('2024-09-07');
      }
      if( $masterNameFromSelect == 'Каплина' ) {
        $closedDates.push('2024-09-08');
      }
      if( $masterNameFromSelect == 'Каплина' ) {
        $closedDates.push('2024-09-09');
      }
      if( $masterNameFromSelect == 'Каплина' ) {
        $closedDates.push('2024-09-10');
      }
      if( $masterNameFromSelect == 'Каплина' ) {
        $closedDates.push('2024-09-11');
      }
      if( $masterNameFromSelect == 'Каплина' ) {
        $closedDates.push('2024-09-12');
      }
      if( $masterNameFromSelect == 'Каплина' ) {
        $closedDates.push('2024-09-13');
      }
      if( $masterNameFromSelect == 'Каплина' ) {
        $closedDates.push('2024-09-14');
      }
      if( $masterNameFromSelect == 'Каплина' ) {
        $closedDates.push('2024-09-15');
      }
      if( $masterNameFromSelect == 'Каплина' ) {
        $closedDates.push('2024-09-16');
      }
      if( $masterNameFromSelect == 'Каплина' ) {
        $closedDates.push('2024-09-17');
      }
      if( $masterNameFromSelect == 'Каплина' ) {
        $closedDates.push('2024-09-18');
      }
      if( $masterNameFromSelect == 'Каплина' ) {
        $closedDates.push('2024-09-19');
      }
      if( $masterNameFromSelect == 'Каплина' ) {
        $closedDates.push('2024-09-20');
      }
      if( $masterNameFromSelect == 'Каплина' ) {
        $closedDates.push('2024-09-21');
      }
      if( $masterNameFromSelect == 'Каплина' ) {
        $closedDates.push('2024-09-22');
      }
      if( $masterNameFromSelect == 'Каплина' ) {
        $closedDates.push('2024-09-23');
      }
      if( $masterNameFromSelect == 'Каплина' ) {
        $closedDates.push('2024-09-24');
      }
      if( $masterNameFromSelect == 'Каплина' ) {
        $closedDates.push('2024-09-25');
      }
      if( $masterNameFromSelect == 'Каплина' ) {
        $closedDates.push('2024-09-26');
      }
      if( $masterNameFromSelect == 'Каплина' ) {
        $closedDates.push('2024-09-27');
      }
      if( $masterNameFromSelect == 'Каплина' ) {
        $closedDates.push('2024-09-28');
      }
      if( $masterNameFromSelect == 'Каплина' ) {
        $closedDates.push('2024-09-29');
      }
      if( $masterNameFromSelect == 'Каплина' ) {
        $closedDates.push('2024-09-30');
      }
      if( $masterNameFromSelect == 'Каплина' ) {
        $closedDates.push('2024-08-30');
      }
      if( $masterNameFromSelect == 'Каплина' ) {
        $closedDates.push('2024-08-31');
      }




      for (let i = 0; i < $closedDates.length; i++) {
        if ($date == $closedDates[i]) {
          return false;
        }
      }

      return 'normal';
    });

    $('#sign-form__date').datepicker("refresh");
  });
</script>