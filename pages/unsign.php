<?php
/*
  Template Name: unsign
*/
?>

<?php get_header() ?>
<div class="unsign-page unsign">
  <div class="wrapper">
    <?php
      if ( function_exists('yoast_breadcrumb') ) {
        yoast_breadcrumb('<ul id="breadcrumbs" class="breadcrumbs"><li>','</li></ul>');
      }
    ?>
    <h1 class="sign__title h1"><?php the_title(); ?></h1>

    <div class="unsign__content content">
      <?php the_content(); ?> 
    </div> 

    <div class="unsign__inner">
      <form action="/unsign/?" class="unsign-form js-unsign-form form">
        <div class="inp required">
          <div class="inp-label">ФИО <span class="required">*</span></div>
          <input type="text" name="name" class="inp" id="unsign-form__name">
          <label for="unsign-form__name" class="form__error">Это поле обяательно для заполнения.</label>
        </div>
        <div class="inp required">
          <div class="inp-label">Номер телефона <span class="required">*</span></div>
          <input type="tel" name="tel" class="inp" id="unsign-form__tel">
          <label for="unsign-form__tel" class="form__error">Это поле обяательно для заполнения.</label>
        </div>
        <button type="submit" class="btn pink--btn">Отправить</button>
      </form>
      <div class="unsign-page__warning content js-unsign-warning" style="display: none;">У вас нет записей.<br>Проверьте введенные данные!</div>
      <div class="unsign__table js-unsign-table" style="display: none;">
        <table>
          <tr>
            <th>№</th>
            <th>ФИО</th>
            <th>Номер телефона</th>
            <th>Дата и время</th>
            <th>Действия</th>
          </tr>
        </table>
      </div>
    </div>
  </div>
</div>


<?php get_footer() ?>
