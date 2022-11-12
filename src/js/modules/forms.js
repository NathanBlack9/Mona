$(document).ready(function () {

  function formValidate(form) {
    let $error = 0;
    let $formReq = document.querySelectorAll('.required > input');

    for (let i = 0; i < $formReq.length; i++) {
      const $input = $formReq[i];
      formRemoveError($input);

      if ($input.value === '') {
        $($input).next().text('Это поле обяательно для заполнения.');
        formAddError($input);
        $error++;
      } else if ($input.classList.contains('js-input-email')){
        if(emailTest($input)) {
          formAddError($input);
          $error++;
        }
      } else if($input.getAttribute('name') === 'name' ) { // && !$input.classList.contains('js-input-email') && !$input.classList.contains('js-review-rating')
        if(!nameTest($input)) {
          $($input).next().text('Некорректно введено Имя');
          formAddError($input);
          $error++;
        }
      } else if ($input.getAttribute('type') === 'checkbox' && $input.checked === false) {
          formAddError($input);
          $error++;
      } else if($input.getAttribute('type') === 'tel' && $input.value != '') { // проверка номера телефона
        if(!phoneTest($input)) {
          $($input).next().text('Некорректный формат номера.');
          formAddError($input);
          $error++;
        }
      }
    }

    return $error;

    function formAddError(input) {
      input.parentElement.classList.add('error');
      input.classList.add('error');
    }

    function formRemoveError(input) {
      input.parentElement.classList.remove('error');
      input.classList.remove('error');
    }

    function phoneTest(input) {
      return /^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/im.test(input.value);
    }

    function emailTest(input) {
      return !/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,8})+$/.test(input.value)
    }

    function nameTest(input) {
      return /^[a-zA-Zа-яА-ЯёЁ'][a-zA-Z-а-яА-ЯёЁ' ]+[a-zA-Zа-яА-ЯёЁ']?$/.test(input.value)
    }
  }

  function showRemainingSigns(response, table) {

    response.forEach(element => {
      let $minutes;

      if( (element.time % 1) != 0 ) {
        $minutes = (element.time % 1) * 60;
      } else {
        $minutes = '00';
      }

      table.find('tr:last')
      .after(`<tr>
                <td>${element.id}</td>
                <td>${element.name}</td>
                <td>${element.phone}</td>
                <td>${element.date}, ${Math.trunc(element.time)}:${$minutes}</td>
                <td> 
                  <a class="js-delete-sign" href="/" data-id="${element.id}">Удалить
                    <img src="${WPJS.siteUrl}/build/img/close.svg" alt="" width="14" height="14">
                  </a>
                </td>
              </tr>`);
    });
  }

  $('.customOptions').selectric({
    optionsItemBuilder: function(itemData, element, index) {
      return element.val().length ? '<span class="ico ico-' + itemData.value +  '"></span>' + itemData.text : itemData.text;
    },
    labelBuilder: function(itemData) {
      return itemData.value.length ? '<span class="ico ico-' + itemData.value +  '"></span>' + itemData.text : itemData.text;
    },
  });

  // $('select:not(.not-default-select)').selectric();
  $('select').selectric({
    nativeOnMobile: false,
  });


  $('.js-sign-radio').click(function() {
    const $this = $(this);
    const $checkbox = $this.find('.wpcf7-list-item input[type="radio"]:checked');
    const $parent = $checkbox.parent().parent();
    
    $parent.siblings().removeClass('active');
    $parent.addClass('active');

  });

  $('.js-checkbox').click(function() {
    const $this = $(this);
    const $parent = $this.closest('.checkbox');

    if( $this.is(":checked") ) { 
      $parent.addClass('active');
    } else $parent.removeClass('active');
  });

  $('.js-review-form').on('submit', function (e) {
    e.preventDefault();
  
    const $form = $(this);

    let $error = formValidate($form);


    if ($error===0) {
      let $reviewsFormData = {};

      $.each($form.serializeArray(), function (index) { 
        let name = this.name;
        let value = this.value;
  
        $reviewsFormData[`${name}`] = value;
      });
      // console.log($reviewsFormData);

      $.ajax({
        url: WPJS.siteUrl + '/backend/review.php',
        type: 'POST',
        data: `newReviewData=${JSON.stringify($reviewsFormData)}`,
        beforeSend: function() {
          $('body').addClass('loading');
        },
        complete: function() {
          setTimeout(() => {
            $('body').removeClass('loading');
          }, 250);
        },
        success: function(data){
          // console.log(data);

          $form.fadeOut();
          $('.js-review-form-success').fadeIn();
        },
        error: function(){
          console.log('ERROR');
        }
      });

    } else {
      // alert('Заполните обязательные поля!');
    }
  });

  $('.js-textarea-counter').on('keyup paste change', function countLetters() {

    const $textarea = $(this);
    const $count = $textarea.closest('div.inp').find('.textarea-symbol-counter span');
    const $textlength = $textarea.val().length;
  
    $count.text($textlength);
  });

  /* ----- Подписаться на рассылку ----- */ 

  $('.js-subscribe-form').on('submit', function (e) {
    e.preventDefault();
  
    const $form = $(this);

    let $error = formValidate($form);

    if ($error===0) {
      let $subscribeFormData = {};

      $.each($form.serializeArray(), function (index) { 
        let name = this.name;
        let value = this.value;
  
        $subscribeFormData[`${name}`] = value;
      });
      // console.log($subscribeFormData); // Какой объект получился до отправки

      $.ajax({
        url: WPJS.siteUrl + '/backend/subscribe.php',
        type: 'POST',
        data: `subscribeEmail=${JSON.stringify($subscribeFormData)}`,
        beforeSend: function() {
          $('body').addClass('loading');
        },
        complete: function() {
          setTimeout(() => {
            $('body').removeClass('loading');
          }, 250);
        },
        success: function(data){
          if(data) {
            $form.remove();
            $('.subscribe__subtitle').html('Вы успешно подписались на наши обновления.</br> Спасибо, что следите за нами');
          } else {
            $form.remove();
            $('.subscribe__subtitle').text('Введенный Email уже подписан на наши обновления!')
          }
        },
        error: function(){
          console.log('ERROR');
        }
      });

    } else {
      // alert('Заполните обязательные поля!');
    }
  });
  /* -------------------------------- */

  /* ----- Удаление Записи ----- */ 
  
  $('.js-unsign-form').on('submit', function (e) {
    e.preventDefault();
    const $form = $(this);
    let $error = formValidate($form);

    if ($error===0) {
      let $unsignData = {};

      $.each($form.serializeArray(), function () { 
        let name = this.name;
        let value = this.value;
  
        $unsignData[`${name}`] = value;
      });

      $.ajax({
        url: WPJS.siteUrl + '/backend/unsign.php',
        type: 'GET',
        data: `allSigns=${JSON.stringify($unsignData)}`,
        beforeSend: function() {
          $('body').addClass('loading');
        },
        complete: function() {
          setTimeout(() => {
            $('body').removeClass('loading');
          }, 250);
        },
        success: function(data){
          let $response = JSON.parse(data);
          const $tableSection = $('.js-unsign-table');
          const $warning = $('.js-unsign-warning');

          if($response.length > 0) {
            const $table = $tableSection.find('table');
            $table.find('tr:not(:first)').remove();
  
            showRemainingSigns($response, $table);

            $tableSection.fadeIn();
            $warning.fadeOut();
          } else {
            $tableSection.fadeOut();
            $warning.fadeIn();
          }
        },
        error: function(){
          console.log('ERROR');
        }
      });

    } else {
      // alert('Заполните обязательные поля!');
    }
  });

  $(document).on('click', '.js-delete-sign', function (e) {
    e.preventDefault();
    const $this = $(this);
    const $id = $this.data('id');

    $.confirm({
      title: 'Вы уверены, что хотите отменить запись?',
      content: 'После удаления записи ее восстановить будет нельзя!',
      backgroundDismiss: true,
      draggable: false,
      buttons: {
        Удалить: function () {
          $form = $('.js-unsign-form');
          let $unsignData = {};

          $.each($form.serializeArray(), function () { 
            let name = this.name;
            let value = this.value;
      
            $unsignData[`${name}`] = value;
          });

          $.ajax({
            url: WPJS.siteUrl + '/backend/unsign.php',
            type: 'GET',
            data: `unsign=${$id}&unsignData=${JSON.stringify($unsignData)}`,
            beforeSend: function() {
              $('body').addClass('loading');
            },
            complete: function() {
              setTimeout(() => {
                $('body').removeClass('loading');
              }, 250);
            },
            success: function(response){
              let $response = JSON.parse(response);
              const $tableSection = $('.js-unsign-table');
              e.preventDefault();


              if($response.length > 0) {
                const $table = $tableSection.find('table');
                $table.find('tr:not(:first)').remove();
      
                showRemainingSigns($response, $table);

              } 
            },
            error: function(){
              console.log('ERROR');
            }
          });
        },
        Отмена: () => { return },
      }
    });

  })
  /* -------------------------------- */ 

  // Звезды отзывов
  $('.js-reviews-rating').each(function() {
    const $this = $(this);
    const $rating = $this.data('rating');
    const $block = $this.find('.reviews__rating');

    for (let i = 0; i <= $rating; i++) {
      $block.find(`li:nth-child(${ i })`).addClass('active');
    }
  })
  
  $.datepicker.setDefaults( $.datepicker.regional[ "ru" ] );
});