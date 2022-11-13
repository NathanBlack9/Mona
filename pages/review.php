<?php
/*
  Template Name: review
*/
?>

<?php 
  $masters = $wpdb->get_results("SELECT * from masters;");
  $reviews = $wpdb->get_results("SELECT * from reviews;");

  function defineMaster( $param ) {
    global $wpdb;
    $master = $wpdb->get_results("SELECT * FROM masters where id = {$param}");
    return $master;
  };

?>

<?php get_header() ?>

<section class="reviews-page reviews">
  <div class="wrapper">
    <?php
      if ( function_exists('yoast_breadcrumb') ) {
        yoast_breadcrumb('<ul id="breadcrumbs" class="breadcrumbs"><li>','</li></ul>');
      }
    ?>
    <h1 class="h1 reviews__title"><?php the_title(); ?></h1>
    <div class="reviews__content content"><?php the_content(); ?></div>

    <?php if($reviews) {?>
      <div class="sorting">
        <div class="sorting__controls js-sorting not-mobile">
          <a href="#" class="sorting__btn active" data-sort="all">Все</a>
          <?php foreach($masters as $item) { ?>
            <a href="#" class="sorting__btn" data-sort="<?php echo $item->last_name; ?>"><?php echo $item->last_name .' '.mb_substr($item->first_name, 0, 1). '.' .mb_substr($item->mid_name, 0, 1).'.' ?></a>
          <?php } ?>
        </div>
        <div class="only-mobile">
          <select name="" id="" class="sorting__select js-sorting-select">
            <option value="all">Все</option>
            <?php foreach($masters as $item) { ?>
              <option value="<?php echo $item->last_name; ?>"><?php echo $item->last_name .' '.mb_substr($item->first_name, 0, 1). '.' .mb_substr($item->mid_name, 0, 1).'.' ?></option>
            <?php } ?>
          </select>
        </div>
      </div>

      <div class="reviews__inner js-sorting-content js-review-sort">
        <?php foreach($reviews as $item) { ?>
          <?php if ($item->view != 0) { // Если включен View в базе ?>
            <?php $master = defineMaster($item->master_id); ?>
            <?php foreach($master as $y) { ?>
              <div class="reviews__item js-reviews-rating" data-id="<?php echo $item->id; ?>" data-rating="<?php echo $item->rating; ?>" data-sort="<?php echo $y->last_name; ?>">
                <div class="reviews__name"><?php echo $item->name; ?></div>
                <div class="reviews__job">
                  <span>мастер</span>
                  <?php echo $y->last_name .' '.$y->first_name ?>
                </div>
                <ul class="reviews__rating">
                  <?php $i = 1 ?>
                  <?php while ($i <= 5) { ?>
                    <li></li>
                  <?php $i++; } ?>
                </ul>
                <div class="reviews__text"><?php echo $item->text; ?></div>
              </div>
            <?php } ?>
          <?php } ?>
        <?php } ?>
      </div>
    <?php } ?>
    <hr>

    <h2 class="h2">Оставьте свой отзыв</h2>
    <div class="reviews__content content"><p>Поделитесь своим опытом посещения наших мастеров.</p></div>
    <form action="/reviews/?" class="reviews-form js-review-form form"> <?php // js-form ?>
      <div class="inp required">
        <div class="inp-label">Ваше Имя <span class="required">*</span></div>
        <input type="text" name="name" class="inp" id="reviews-form__name">
        <label for="reviews-form__name" class="form__error">Это поле обяательно для заполнения.</label>
      </div>
      <div class="inp required">
        <div class="inp-label">Мастер <span class="required">*</span></div>
        <select name="master" id="reviews-form__master" class="reviews-form__select customOptions">
          <?php foreach($masters as $item) { ?>
            <option value="<?php echo $item->last_name; ?>"><?php echo $item->last_name .' '.mb_substr($item->first_name, 0, 1). '.' .mb_substr($item->mid_name, 0, 1).'.' ?></option>
          <?php } ?>
        </select>
      </div>
      <div class="inp reviews-form__rating required">
        <div class="inp-label">Оценка <span class="required">*</span></div>
        <ul class="reviews__rating js-rating-stars">
          <?php $i = 1 ?>
          <?php while ($i <= 5) { ?>
            <li></li>
          <?php $i++; } ?>
        </ul>
        <input id="reviews-form__rating" name="rating" style="display: none" type="text" class="js-review-rating">
        <label for="reviews-form__name" class="form__error">Оцените работу мастера.</label>
      </div>
      <div class="inp">
        <div class="inp-label">Текст отзыва</div>
        <textarea name="text" id="reviews-form__desc" rows="5" maxlength="120" class="inp js-textarea-counter" placeholder="Мастер молодец!"></textarea>
        <div class="textarea-symbol-counter"><span>0</span> / 120</div>
        <label for="reviews-form__desc" class="form__error">Оцените работу мастера.</label>
      </div>

      <button type="submit" class="btn pink--btn">Отправить</button>
    </form>
    <div class="reviews__content content js-review-form-success" style="display: none;">
      Спасибо за Ваш отзыв. Он успешно отправлен!
    </div>

  </div>
</section>

<?php get_footer() ?>

<?php if (isset ($_GET['master']) ) { ?>
  <script>
    (() => {
      $('.js-sorting').find('[data-sort="<?php echo $_GET['master'] ?>"]').click();
    })();
  </script>
<?php ; } ?>
     