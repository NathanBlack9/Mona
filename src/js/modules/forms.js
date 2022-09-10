$(document).ready(function () {

  function formValidate(form) {
    let $error = 0;
    let $formReq = document.querySelectorAll('.required > input');

    for (let i = 0; i < $formReq.length; i++) {
      const $input = $formReq[i];
      formRemoveError($input);

      if ($input.classList.contains('js-input-email')){
        if(emailTest($input)) {
          formAddError($input);
          $error++;
        }
      } else if ($input.getAttribute('type') === 'checkbox' && $input.checked === false) {
          formAddError($input);
          $error++;
      } else {
        if ($input.value === '') {
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

    function emailTest(input) {
      return !/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,8})+$/.test(input.value)
    }
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
  $('select').selectric();


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

    // formValidate($form);
    let $error = formValidate($form);


    if ($error===0) {
      let $reviewsFormData = {};

      $.each($form.serializeArray(), function (index) { 
        let name = this.name;
        let value = this.value;
  
        $reviewsFormData[`${name}`] = value;
      });
      console.log($reviewsFormData);

      $.ajax({
        url: WPJS.siteUrl + '/backend/backend.php',
        type: 'POST',
        data: `newReviewData=${JSON.stringify($reviewsFormData)}`,
        success: function(data){
          console.log(data);

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
        url: WPJS.siteUrl + '/backend/backend.php',
        type: 'POST',
        data: `subscriptEmail=${JSON.stringify($subscribeFormData)}`,
        success: function(data){
          // console.log(data);

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
    
    console.log();
  });

  $('.js-unsign-form').on('submit', function (e) {
    e.preventDefault();
    const $form = $(this);
    let $error = formValidate($form);

    if ($error===0) {
      let $unsignData = {};

      $.each($form.serializeArray(), function (index) { 
        let name = this.name;
        let value = this.value;
  
        $unsignData[`${name}`] = value;
      });
      console.log($unsignData);

      $.ajax({
        url: WPJS.siteUrl + '/backend/backend.php',
        type: 'GET',
        data: `allSigns=${JSON.stringify($unsignData)}`,
        success: function(data){
          let $response = JSON.parse(data);
          const $tableSection = $('.js-insign-table');
          const $warning = $('.js-unsign-warning');

          if($response.length > 0) {
            const $table = $tableSection.find('table');
            $table.find('tr:not(:first)').remove();
  
            $response.forEach(element => {
              $table.find('tr:last')
              .after(`<tr>
                        <td>${element.id}</td>
                        <td>${element.name}</td>
                        <td>${element.phone}</td>
                        <td>${element.date}, ${Math.trunc(element.time)}:${(element.time % 1)*60}</td>
                        <td> 
                          <a class="js-delete-sign" href="#" data-id="${element.id}">Удалить
                            <img src="/mona/wp-content/themes/Mona/build/img/close.svg" alt="" width="14" height="14">
                          </a>
                        </td>
                      </tr>`);
            });

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

  $('.js-delete-sign').on('click', function () {
    let $confirm;

    $.confirm({
      title: 'Вы уверены, что хотите отменить запись?',
      content: 'После удаления записи ее восстановить будет нельзя!',
      backgroundDismiss: true,
      draggable: false,
      buttons: {
        Удалить: function () {
          $confirm = true;
          alert($confirm);
        },
        Отмена: function () {
          $confirm = false;
          alert($confirm);
        },
      }
    });

  })

  $.datepicker.setDefaults( $.datepicker.regional[ "ru" ] );

});