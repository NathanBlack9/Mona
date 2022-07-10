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

  function getTimeHour( $time ) {
    $t = substr($time, 0, 2);
    settype($t, 'integer');

    return $t;
  };

  function getTimeMinute( $time ) {
    $t = substr($time, 3, 2);
    settype($t, 'integer');

    return $t;
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

  /* Получается свободное время мастер с ид $masterId, с временем выполнения услуги $serviceTime и в дату $date */
  function getFreeSignTime( $date, $masterId, $serviceTime ) {
    global $wpdb;

    $arrTimeStart = $wpdb->get_results("SELECT time FROM sign where date = '{$date}' and master_id = {$masterId} order by time_end;");
    $arrTimeEnd = $wpdb->get_results("SELECT time_end FROM sign where date = '{$date}' and master_id = {$masterId} order by time_end;");

    $reservedTimesStart = [];
    $reservedTimesEnd = [];
    $timeLine = [];
    $closedTime = 21;
    $openTime = 8;
    $interval = 0.25; // 15 минут
    // $serviceTime = 1.5;
    // $reservedTimesStart = [$openTime, 14.25, 15, 17.25, 19, $closedTime];
    // $reservedTimesEnd   = [$openTime, 14.75, 17, 18,    20, $closedTime];

    foreach ($arrTimeStart as $item ) { // Переписываем в обычные массивы для удобства
      array_push($reservedTimesStart, $item->time);
    }

    foreach ($arrTimeEnd as $item ) {  // Переписываем в обычные массивы для удобства
      array_push($reservedTimesEnd, $item->time_end);
    }

    array_unshift($reservedTimesStart, $openTime); // В начало массивов добавляем 08:00
    array_unshift($reservedTimesEnd, $openTime); // В начало массивов добавляем 08:00
    array_push($reservedTimesStart, $closedTime); // В конец массивов добавляем 21:00
    array_push($reservedTimesEnd, $closedTime); // В конец массивов добавляем 21:00
        
    for ( $i = 0; $i < count($reservedTimesEnd); $i++ ) {
      /* 
        Начиная со второго элемента времен начала записи вычитаем время конца первого и делим на промежутки по 15 минут,
        чтобы понять сколько промежутков по 15 минут свободно.
        Берем целую часть числа (floor()).
      */
      $t = floor(($reservedTimesStart[$i + 1] - $reservedTimesEnd[$i]) / $interval); 

      if ($t > 0) {
        for ( $j = 0; $j < $t; $j++) {
          /*
            Если время записи + время процедуры НЕ БОЛЬШЕ чем начало следующей записи то только тогда записываем
          */
          if( ($reservedTimesEnd[$i] + $interval * $j + $serviceTime) <= $reservedTimesStart[$i + 1]) {
            array_push($timeLine, $reservedTimesEnd[$i] + $interval * $j);
          }
        }
      }
    }
    // print_r($timeLine);

    return setTimeFormat($timeLine);
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

      <section class="sign__master">
        <img src="<?php echo get_template_directory_uri(); ?>/build/img/pex.jpg" alt="" class="sign__master-img">
        <div class="sign__master-name h3">Мастер Аракелян Анжела</div>
        <div class="sign__master-desc">Сами лучши мастер Сами лучши мастер Сами лучши мастер Сами лучши мастер Сами лучши мастерСами лучши мастерСами лучши мастер.</div>
        <a href="<?php echo get_template_directory_uri(); ?>/reviews/" class="sign__master-btn btn pink--btn">Посмотреть отзывы</a>
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
  })
  .on('selectric-change', function(event, element, selectric) {
    const $this = $(this);
    const $optionVal = $(this).val();
    const $typeSelect = $('.js-type-select');
    const $mastersSelect = $('.js-masters-select');

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

    
    // setTimeout(() => {
      $typeSelect.selectric('refresh');
    // }, 500);

    $mastersSelect.selectric('refresh');
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
      

      $.ajax({
        url: '<?php echo get_template_directory_uri(); ?>/ajax.php',
        type: 'GET',
        data: `date=${$dateInput.val()}`,
        success: function(data){
          console.log(data);
        },
        error: function(){
          console.log('ERROR');
        }
      });

      
      
      <?php 
        // $arr = getFreeSignTime('2022-06-21', 1, 1); 
        
        
        

      ?>
      
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