<?php
/*
  Template Name: sign
*/
?>

<?php 
  $masters = $wpdb->get_results("SELECT * from masters;");
  $categories = $wpdb->get_results("SELECT * from service_categories;");

  $manicure = $wpdb->get_results("SELECT services_name, id FROM services WHERE category_id = 1;");
  $pedicure = $wpdb->get_results("SELECT services_name, id FROM services WHERE category_id = 2;");
  $sugaring = $wpdb->get_results("SELECT services_name, id FROM services WHERE category_id = 3;");
  $lashes = $wpdb->get_results("SELECT services_name, id FROM services WHERE category_id = 4;");
  $browes = $wpdb->get_results("SELECT services_name, id FROM services WHERE category_id = 5;");
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
  $('.js-form-type').hide(); // Селект типа услуги

  /* --- Вывод услуг из базы --- */
  $('.js-services-select').on('selectric-before-init', function(event, element, selectric) {
    $(element).empty();
    <?php foreach($categories as $item) { ?>
      $(element).append('<option value="<?php echo $item->id; ?>"><?php echo $item->name ?></option>');
    <?php } ?>
  });

  $('.js-services-select').on('selectric-change', function(event, element, selectric) {
    const $this = $(this);
    const $optionVal = +$(this).val();
    const $typeSelect = $('.js-type-select');

    $('.js-form-type').fadeIn('fast');

    $typeSelect.empty();

    switch ($optionVal) {
      case 1:
        <?php $arr = $manicure;
          foreach($arr as $item) { ?>
          $typeSelect.append('<option value="<?php echo $item->id; ?>"><?php echo $item->services_name; ?></option>');
        <?php } ?>
        break;
      case 2:
        <?php $arr = $pedicure;
          foreach($arr as $item) { ?>
          $typeSelect.append('<option value="<?php echo $item->id; ?>"><?php echo $item->services_name; ?></option>');
        <?php } ?>
        break;
      case 3:
        <?php $arr = $sugaring;
          foreach($arr as $item) { ?>
          $typeSelect.append('<option value="<?php echo $item->id; ?>"><?php echo $item->services_name; ?></option>');
        <?php } ?>
        break;
      case 4:
        <?php $arr = $lashes;
          foreach($arr as $item) { ?>
          $typeSelect.append('<option value="<?php echo $item->id; ?>"><?php echo $item->services_name; ?></option>');
        <?php } ?>
        break;
      case 5:
        <?php $arr = $browes;
          foreach($arr as $item) { ?>
          $typeSelect.append('<option value="<?php echo $item->id; ?>"><?php echo $item->services_name; ?></option>');
        <?php } ?>
        break;
    }

    $typeSelect.selectric('refresh');
  });
  /* ------------------ */
    
  /* --- Вывод мастеров из базы --- */
  $('.js-masters-select').on('selectric-before-init', function(event, element, selectric) {
    $(element).empty();
    <?php foreach($masters as $item) { ?>
      $(element).append('<option value="<?php echo $item->last_name; ?>"><?php echo $item->last_name .' '.mb_substr($item->first_name, 0, 1) . '.' . mb_substr($item->mid_name, 0, 1). '.' ?></option>');
    <?php } ?>
  });
</script>