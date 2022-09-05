<?php
/*
  Template Name: sign
*/
?>

<?php 
  $masters = $wpdb->get_results("SELECT * from masters;");
  $categories = $wpdb->get_results("SELECT * from service_categories;");

  $manicure = $wpdb->get_results("SELECT services_name, category_id FROM services WHERE category_id = 1 and time <> 0;");
  $pedicure = $wpdb->get_results("SELECT services_name, category_id FROM services WHERE category_id = 2 and time <> 0;");
  $sugaring = $wpdb->get_results("SELECT services_name, category_id FROM services WHERE category_id = 3 and time <> 0;");
  $lashes = $wpdb->get_results("SELECT services_name, category_id FROM services WHERE category_id = 4 and time <> 0;");
  $browes = $wpdb->get_results("SELECT services_name, category_id FROM services WHERE category_id = 5 and time <> 0;");

  function defineMaster( $param ) {
    global $wpdb;
    $master = $wpdb->get_results("SELECT * FROM masters where id in (select master_id from services where category_id = {$param})");
    return $master;
  };

  /* Делает из массива чисел формат даты -> 13.5 = 13:30 */ 
  function setTimeFormat($array ) {
  
    for ($i = 0; $i < count($array); $i++) {
        
      if (getDecimal($array[$i]) != 0) {
        $minutes = getDecimal($array[$i]) * 60;
      } else {
        $minutes = '00';
      }
    
      if (floor($array[$i]) < 10) {
        $array[$i] = '0' .floor($array[$i]). ':' .$minutes.'';
      } else {
        $array[$i] = ''.floor($array[$i]).':'.$minutes.'';
      }
    }

    return $array;
  }
  /* ------------------- */

  function getDecimal($number) {
    return fmod($number, 1);
  }

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

    <div class="sign__inner">
      <div class="sign-progress progress">
        <div class="progress-point active">1</div>
        <div class="progress-point">2</div>
        <div class="progress-point">3</div>
        <div class="progress-point">4</div>
      </div>


      <?php /*
      <form action="/sign/" class="form sign-form js-form">
        <div class="inp">
          <div class="inp-label">Выберите услугу <span class="required">*</span></div>
          <select name="" id="" class="sign-form__select">
            <option value="Маникюр">Маникюр</option>
            <option value="Педикюр">Педикюр</option>
            <option value="Шугаринг">Шугаринг</option>
            <option value="Наращивание">Наращивание ресниц</option>
            <option value="Коррекция">Коррекция бровей</option>
          </select>
        </div>
        <div class="inp">
          <div class="inp-label">Выберите мастера <span class="required">*</span></div>
          <select name="" id="" class="sign-form__select customOptions">
            <option value="Аракелян">Аракелян А.С.</option>
            <option value="Хачатрян">Хачатрян М.А.</option>
            <option value="Антонова">Антонова А.А.</option>
          </select>
        </div>
        <div class="inp">
          <div class="inp-label">Выберите дату <span class="required">*</span></div>
          <input type="text" class="inp sign-form__date-input">
          <div id="sign-form__date"></div>
          <label for="sign-form__date" class="form__error">Это поле обяательно для заполнения.</label>
        </div>

        <div class="inp">
          <div class="inp-label">Выберите время <span class="required">*</span></div>
          <div class="sign-form__time">
            <div class="radio">
              <input type="radio" id="timeChoice1" class="js-sign-radio" name="timeChoice" value="09:00">
              <label for="timeChoice1">09:00</label>
            </div>
            <div class="radio">
              <input type="radio" id="timeChoice2" class="js-sign-radio" name="timeChoice" value="12:30">
              <label for="timeChoice2">12:30</label>
            </div>
            <div class="radio">
              <input type="radio" id="timeChoice3" class="js-sign-radio" name="timeChoice" value="16:30">
              <label for="timeChoice3">16:30</label>
            </div>
            <div class="radio">
              <input type="radio" id="timeChoice4" class="js-sign-radio" name="timeChoice" value="17:00">
              <label for="timeChoice4">17:00</label>
            </div>
            <div class="radio">
              <input type="radio" id="timeChoice5" class="js-sign-radio" name="timeChoice" value="19:00">
              <label for="timeChoice5">19:00</label>
            </div>
          </div>
        </div>

        <div class="h3">Контактная информация</div>

        <div class="inp">
          <div class="inp-label">ФИО <span class="required">*</span></div>
          <input type="text" class="inp" id="sign-form__name">
          <label for="sign-form__name" class="form__error">Это поле обяательно для заполнения.</label>
        </div>
        <div class="inp">
          <div class="inp-label">Номер телефона <span class="required">*</span></div>
          <input type="tel" class="inp" id="sign-form__tel">
          <label for="sign-form__tel" class="form__error">Это поле обяательно для заполнения.</label>
        </div>
        <div class="inp">
          <div class="inp-label">E-mail</div>
          <input type="email" class="inp js-input-email" id="sign-form__email">
          <label for="sign-form__email" class="form__error">Это поле обяательно для заполнения.</label>
        </div>

        <div class="inp">
          <label class="checkbox">
            <input name="" id="" type="checkbox" class="js-checkbox sign-form__checkbox">
            Я ознакомлен и согласен с <a target="_blank" href="<?php echo get_template_directory_uri(); ?>/privacy/"> политикой конфиденциальности и использования файлов cookie.</a>
          </label>
          <span class="form__error">Подтвердите согласие</span>
        </div>

        <button type="submit" class="btn pink--btn">Записаться</button>
      </form>
       */ ?>

      <?php the_content(); ?> 

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
      url: '<?php echo get_template_directory_uri(); ?>/backend/backend.php',
      type: 'GET',
      data: `service=${$optionVal}`,
      success: function(data){
        let $response = JSON.parse(data);
        console.log($response);
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
        url: '<?php echo get_template_directory_uri(); ?>/backend/backend.php',
        type: 'GET',
        data: `date=${$dateInput.val()}&master=${$('.js-masters-select').val()}&serviceName=${$('.js-type-select').val()}`, <?php // Отправляем дату, фамилию мастера и точный сервис ?>
        success: function(data){

          $('.js-time-block').removeClass('--hidden');

          var $response = JSON.parse(data);
          console.log($response);
          console.log(data);

          var $timeEl = $('.wpcf7-list-item').first().clone(); // копируем однин чеквокс времени

          $('.js-sign-radio').empty(); // очищаем временные чекбоксы 

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
    // beforeShowDay: function(date) {
    //   // если число больше 15, то делаем их неактивными
    //   if (new Date(date).getDate() > 15) {
    //     return false;
    //   }
    //   return 'normal';
    // }
  });
  /* ------------------ */
</script>
