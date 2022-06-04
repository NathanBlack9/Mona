<?php
/*
  Template Name: review
*/
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

    <div class="sorting">
      <div class="sorting__controls js-sorting not-mobile">
        <a href="#" class="sorting__btn active" data-sort="all">Все</a>
        <a href="#" class="sorting__btn" data-sort="Аракелян">Аракелян А.С.</a>
        <a href="#" class="sorting__btn" data-sort="Хачатрян">Хачатрян М.А.</a>
        <a href="#" class="sorting__btn" data-sort="Антонова">Антонова А.А.</a>
      </div>
      <div class="only-mobile">
        <select name="" id="" class="sorting__select js-sorting-select">
          <option value="all">Все</option>
          <option value="Аракелян">Аракелян А.С.</option>
          <option value="Хачатрян">Хачатрян М.А.</option>
          <option value="Антонова">Антонова А.А.</option>
        </select>
      </div>
    </div>

    <div class="reviews__inner js-sorting-content">
      <div class="reviews__item js-reviews-rating" data-rating="5" data-sort="Аракелян">
        <div class="reviews__name">Лукянова Анна</div>
        <div class="reviews__job">
          <span>мастер</span>
          Аракелян Анжела
        </div>
        <ul class="reviews__rating">
          <li></li>
          <li></li>
          <li></li>
          <li></li>
          <li></li>
        </ul>
        <div class="reviews__text">Далеко-далеко за словесными горами в стране гласных и согласных живут рыбные тексты. Вдали от всех живут они в буквенных домах на берегу Семантика большого языкового океана. </div>
      </div>
      <div class="reviews__item js-reviews-rating" data-rating="5" data-sort="Хачатрян">
        <div class="reviews__name">Лукянова Анна</div>
        <div class="reviews__job">
          <span>мастер</span>
          Аракелян Анжела
        </div>
        <ul class="reviews__rating">
          <li></li>
          <li></li>
          <li></li>
          <li></li>
          <li></li>
        </ul>
        <div class="reviews__text">Далеко-далеко за словесными горами в стране гласных и согласных живут рыбные тексты. Вдали от всех живут они в буквенных домах на берегу Семантика большого языкового океана. </div>
      </div>
      <div class="reviews__item js-reviews-rating" data-rating="3" data-sort="Хачатрян">
        <div class="reviews__name">Лукянова Анна</div>
        <div class="reviews__job">
          <span>мастер</span>
          Аракелян Анжела
        </div>
        <ul class="reviews__rating">
          <li></li>
          <li></li>
          <li></li>
          <li></li>
          <li></li>
        </ul>
        <div class="reviews__text">Далеко-далеко за словесными горами в стране гласных и согласных живут рыбные тексты. Вдали от всех живут они в буквенных домах на берегу Семантика большого языкового океана. </div>
      </div>
      <div class="reviews__item js-reviews-rating" data-rating="5" data-sort="Хачатрян">
        <div class="reviews__name">Лукянова Анна</div>
        <div class="reviews__job">
          <span>мастер</span>
          Аракелян Анжела
        </div>
        <ul class="reviews__rating">
          <li></li>
          <li></li>
          <li></li>
          <li></li>
          <li></li>
        </ul>
        <div class="reviews__text">Далеко-далеко в домах на берегу Семантика большого языкового океана. </div>
      </div>
      <div class="reviews__item js-reviews-rating" data-rating="1" data-sort="Аракелян">
        <div class="reviews__name">Лукянова Анна</div>
        <div class="reviews__job">
          <span>мастер</span>
          Аракелян Анжела
        </div>
        <ul class="reviews__rating">
          <li></li>
          <li></li>
          <li></li>
          <li></li>
          <li></li>
        </ul>
        <div class="reviews__text">Далеко-далеко за словесными горами в стране гласных и согласных живут рыбные тексты. Вдали от всех живут они в буквенных домах на берегу Семантика большого языкового океана. </div>
      </div>
      <div class="reviews__item js-reviews-rating" data-rating="5" data-sort="Антонова">
        <div class="reviews__name">Лукянова Анна</div>
        <div class="reviews__job">
          <span>мастер</span>
          Аракелян Анжела
        </div>
        <ul class="reviews__rating">
          <li></li>
          <li></li>
          <li></li>
          <li></li>
          <li></li>
        </ul>
        <div class="reviews__text">Далеко-далеко за словесными горами в стране гласных и согласных живут рыбные тексты. Вдали от всех живут они в буквенных домах на берегу Семантика большого языкового океана. </div>
      </div>
    </div>

    <hr>

    <h2 class="h2">Оставьте свой отзыв</h2>
    <div class="reviews__content content"><p>Поделитесь своим опытом посещения наших мастеров.</p></div>
    <form action="/review/" class="reviews-form js-form form">
      <div class="inp">
        <div class="inp-label">Ваше Имя <span class="required">*</span></div>
        <input type="text" class="inp" id="reviews-form__name">
        <label for="reviews-form__name" class="form__error">Это поле обяательно для заполнения.</label>
      </div>
      <div class="inp">
        <div class="inp-label">Мастер <span class="required">*</span></div>
        <select name="" id="" class="reviews-form__select customOptions">
          <option value="Аракелян">Аракелян А.С.</option>
          <option value="Хачатрян">Хачатрян М.А.</option>
          <option value="Антонова">Антонова А.А.</option>
        </select>
      </div>
      <div class="inp reviews-form__rating">
        <div class="inp-label">Оценка <span class="required">*</span></div>
        <ul class="reviews__rating js-rating-stars" id="reviews-form__name">
          <li></li>
          <li></li>
          <li></li>
          <li></li>
          <li></li>
        </ul>
        <input style="display: none" type="text">
        <label for="reviews-form__name" class="form__error">Оцените работу мастера.</label>
      </div>
      <div class="inp">
        <div class="inp-label">Текст отзыва</div>
        <textarea name="" id="reviews-form__desc" rows="5" class="inp" placeholder="Мастер молодец!"></textarea>
        <label for="reviews-form__desc" class="form__error">Оцените работу мастера.</label>
      </div>

      <button type="submit" class="btn pink--btn">Отправить</button>
    </form>

  </div>
</section>

<?php get_footer() ?>
