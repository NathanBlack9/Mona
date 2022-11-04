<?php
/*
  Template Name: sign
*/
?>

<?php 
  $categories = $wpdb->get_results("SELECT * from service_categories;");

  $manicure = $wpdb->get_results("SELECT id, services_name, category_id FROM services WHERE category_id = 1 and time <> 0;");

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
        <div class="sign__master-desc"></div>
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

      <?php $master = defineMaster($manicure[0]->category_id);?> 
      <?php foreach($master as $item) { ?>
        $mastersSelect.append($('<option>', {
            value: '<?php echo $item->last_name; ?>',
            text: '<?php echo $item->last_name .' '.mb_substr($item->first_name, 0, 1). '.' .mb_substr($item->mid_name, 0, 1).'.' ?>'
        }));
      <?php } ?>      
  });

  $(()=> {$('.js-services-select').trigger('selectric-change')});

</script>
<?php 
  $closedDates = carbon_get_theme_option('closed_dates');
?>
<script>
  $('.js-masters-select').on('selectric-refresh selectric-before-init', function(event, element, selectric) {
    let $masterNameFromSelect = $(this).val();


    $('#sign-form__date').datepicker( "option", "beforeShowDay", (date) => {
      <?php // Даты которые выводятся на календаре ?>
      let $date = new Date(date).toLocaleDateString('ru-ru').split( '.' ).reverse( ).join( '-' );
      <?php // Даты которые НЕ нужно выводить/закрытые дни мастеров ?>
      let $closedDates = [];

      <?php foreach( $closedDates as $item ) { ?> 
        if( $masterNameFromSelect == '<?php echo $item['master'] ?>' ) {
          $closedDates.push('<?php echo $item['closed_dates'] ?>');
        }
      <?php } ?>
  
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