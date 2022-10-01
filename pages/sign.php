<?php
/*
  Template Name: sign
*/
?>

<?php 
  $masters = $wpdb->get_results("SELECT * from masters;");
  $categories = $wpdb->get_results("SELECT * from service_categories;");

  $manicure = $wpdb->get_results("SELECT id, services_name, category_id FROM services WHERE category_id = 1 and time <> 0;");
  $pedicure = $wpdb->get_results("SELECT id, services_name, category_id FROM services WHERE category_id = 2 and time <> 0;");
  $sugaring = $wpdb->get_results("SELECT id, services_name, category_id FROM services WHERE category_id = 3 and time <> 0;");
  $lashes = $wpdb->get_results("SELECT id, services_name, category_id FROM services WHERE category_id = 4 and time <> 0;");
  $browes = $wpdb->get_results("SELECT id, services_name, category_id FROM services WHERE category_id = 5 and time <> 0;");

  function defineMaster( $param ) {
    global $wpdb;
    $master = $wpdb->get_results("SELECT * FROM masters where id in (select master_id from services where category_id = {$param})");
    return $master;
  };
  /* -------------------- */
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
 
      <p>Отменить уже созданную запись можно так же на нашем сайте, для этого нажмите <a href="<?php echo get_template_directory_uri(); ?>/unsign/">здесь</a>.</p> 
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
  /* --- Вывод услуг из базы --- */
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
  })
  .on('selectric-change', function(event, element, selectric) {
    const $this = $(this);
    const $optionVal = $this.val();
    const $typeSelect = $('.js-type-select');
    const $mastersSelect = $('.js-masters-select');

    $('.js-time-block').addClass('--hidden');
    $typeSelect.empty();
    $mastersSelect.empty();

    switch ($optionVal) {
      case "Маникюр":
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
        break;

      case "Педикюр":
        <?php $arr = $pedicure;
          foreach($arr as $item) { ?>
            $typeSelect.append($('<option>', {
                value: '<?php echo $item->services_name; ?>',
                text: '<?php echo $item->services_name; ?>'
            }));
          <?php } ?>

          <?php $master = defineMaster($pedicure[0]->category_id);?> 
          <?php foreach($master as $item) { ?>
            $mastersSelect.append($('<option>', {
                value: '<?php echo $item->last_name; ?>',
                text: '<?php echo $item->last_name .' '.mb_substr($item->first_name, 0, 1). '.' .mb_substr($item->mid_name, 0, 1).'.' ?>'
            }));
          <?php } ?>
        break;

      case "Шугаринг":
        <?php $arr = $sugaring;
          foreach($arr as $item) { ?>
            $typeSelect.append($('<option>', {
                value: '<?php echo $item->services_name; ?>',
                text: '<?php echo $item->services_name; ?>'
            }));
          <?php } ?>

          <?php $master = defineMaster($sugaring[0]->category_id);?> 
          <?php foreach($master as $item) { ?>
            $mastersSelect.append($('<option>', {
                value: '<?php echo $item->last_name; ?>',
                text: '<?php echo $item->last_name .' '.mb_substr($item->first_name, 0, 1). '.' .mb_substr($item->mid_name, 0, 1).'.' ?>'
            }));
          <?php } ?>
        break;

      case "Наращивание ресниц":
        <?php $arr = $lashes;
          foreach($arr as $item) { ?>
            $typeSelect.append($('<option>', {
                value: '<?php echo $item->services_name; ?>',
                text: '<?php echo $item->services_name; ?>'
            }));
          <?php } ?>

          <?php $master = defineMaster($lashes[0]->category_id);?> 
          <?php foreach($master as $item) { ?>
            $mastersSelect.append($('<option>', {
                value: '<?php echo $item->last_name; ?>',
                text: '<?php echo $item->last_name .' '.mb_substr($item->first_name, 0, 1). '.' .mb_substr($item->mid_name, 0, 1).'.' ?>'
            }));
          <?php } ?>
        break;

      case "Коррекция бровей":
        <?php $arr = $browes;
          foreach($arr as $item) { ?>
            $typeSelect.append($('<option>', {
                value: '<?php echo $item->services_name; ?>',
                text: '<?php echo $item->services_name; ?>'
            }));
          <?php } ?>

          <?php $master = defineMaster($browes[0]->category_id);?> 
          <?php foreach($master as $item) { ?>
            $mastersSelect.append($('<option>', {
                value: '<?php echo $item->last_name; ?>',
                text: '<?php echo $item->last_name .' '.mb_substr($item->first_name, 0, 1). '.' .mb_substr($item->mid_name, 0, 1).'.' ?>'
            }));
          <?php } ?>
        break;
    }

    $typeSelect.selectric('refresh');
    $mastersSelect.selectric('refresh');

    <?php 
      // Отправляет значение сервиса и получается инфу о мастере 
    ?>
    $.ajax({
      url: '<?php echo get_template_directory_uri(); ?>/backend/signMasterInfo.php',
      type: 'GET',
      beforeSend: function() {
        $('body').addClass('loading');
      },
      complete: function() {
        setTimeout(() => {
          $('body').removeClass('loading');
        }, 250);
      },
      data: `service=${$optionVal}`,
      success: function(data){
        let $response = JSON.parse(data);
        // console.log($response);
        const $masterBlock = $('.js-sign-master');

        $masterBlock.find('.sign__master-name').text(`Мастер ${$response.last_name} ${$response.first_name}`);
        $masterBlock.find('.sign__master-desc').text(`${$response.about}`);
        $masterBlock.find('.sign__master-img').attr('src', `<?php echo get_template_directory_uri(); ?>${$response.img}`);
        $masterBlock.find('.sign__master-btn').attr('href', `<?php echo get_template_directory_uri(); ?>/reviews?master=${$response.last_name}`);

        $masterBlock.fadeIn();

        // console.log($response); //object
      },
      error: function(){
        console.log('ERROR');
      }
    });

  });
  /* ------------------ */
    
  /* --- Дата и время записи --- */
  const $dateInput = $('.sign-form__date-input');

  // инициализировать только при $(document).ready() !!!
  $('#sign-form__date').datepicker({
    minDate: 0,
    dateFormat: "yy-mm-dd",
    onSelect: function( date, element ) {

      $dateInput.val(date);
      // console.log($dateInput.val());
      
      <?php 
        // Отправляет значение даты из календаря и получается свободное время в этот день
      ?>
      $.ajax({
        url: '<?php echo get_template_directory_uri(); ?>/backend/timeForSign.php',
        type: 'GET',
        beforeSend: function() {
          $('body').addClass('loading');
        },
        complete: function() {
          setTimeout(() => {
            $('body').removeClass('loading');
          }, 250);
        },
        data: `date=${$dateInput.val()}&master=${$('.js-masters-select').val()}&serviceName=${$('.js-type-select').val()}`, <?php // Отправляем дату, фамилию мастера и точный сервис ?>
        success: function(data){

          $('.js-time-block').removeClass('--hidden');

          var $response = JSON.parse(data);
          console.log($response);

          $('.wpcf7-list-item').first().find('input').prop('checked', false).removeAttr("checked");
          var $timeEl = $('.wpcf7-list-item').first().clone(); // копируем один чеквокс времени

          $('.js-sign-radio').empty(); // очищаем временные чекбоксы 
          $('.js-sign-radio').append($timeEl);

          for (let i = 0; i < $response.length; i++) {
            $timeEl = $timeEl.clone();
            let $input = $timeEl.find('input');
            $timeEl.find('.wpcf7-list-item-label').text($response[i]);
            $input.val($response[i]).prop('checked', false).removeAttr("checked");
            $timeEl.removeClass('first').removeClass('last');
            
            if( i == 0 ) {
              $timeEl.addClass('first');
            }

            if( i == $response.length - 1 ) {
              $timeEl.addClass('last')
            }

            $('.js-sign-radio').append($timeEl); 
          }
        },
        error: function(){
          console.log('ERROR');
        }
      });
    },
  });
  /* ------------------ */
</script>
<?php 
  $closedDates = carbon_get_theme_option('closed_dates');
?>
<script>
  $('.js-masters-select').on('selectric-refresh selectric-before-init', function(event, element, selectric) {
    let $masterNameFromSelect = $(this).val();

    $('#sign-form__date').datepicker( "option", "beforeShowDay", (date) => {
      // Даты которые выводятся на календаре
      let $date = new Date(date).toLocaleDateString('ru-ru').split( '.' ).reverse( ).join( '-' );
      // Даты которые не нужно выводить/закрытые дни мастеров
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