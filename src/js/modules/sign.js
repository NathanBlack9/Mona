function formValidate(form) {
  let $error = 0;
  let $formReq = document.querySelectorAll('.required input');
  let radioChecked = false;

  for (let i = 0; i < $formReq.length; i++) {
    const $input = $formReq[i];
    formRemoveError($input);

    if($input.value === '') { // проверка на не пустое поле
      $($input).closest('p').find('.form__error').text('Это поле обяательно для заполнения.');
      formAddError($input);
      $error++;
    } else if ($input.getAttribute('type') === 'checkbox' && $input.checked === false) { // проверка чекбоксов
      formAddError($input);
      $error++;
    } else if($input.getAttribute('type') === 'tel') { // проверка номера телефона
      if(!phoneTest($input)) {
        $($input).closest('p').find('.form__error').text('Некорректный формат номера.');

        formAddError($input);
        $error++;
      }
    } else if($input.getAttribute('name') === 'name') { // проверка ФИО
      if(!nameTest($input)) {
        $($input).closest('p').find('.form__error').text('Некорректно введено Имя');
        formAddError($input);
        $error++;
      }
    } else if($input.getAttribute('type') === 'radio' && $input.checked === false) { // проверка радио
      formAddError($input);
      $error++;
    } else if($input.getAttribute('type') === 'radio' && $input.checked === true) { // убираем еррор если хоть один радио выбран
      radioChecked = true;
    }
  }

  if(radioChecked) { // убираем еррор если хоть один радио выбран
    let radioArray = document.querySelectorAll('.required input[type=radio]');
    for (let j = 0; j < radioArray.length; j++) {
      formRemoveError(radioArray[j]);
    }

    return $error - radioArray.length + 1;

  } else {
    return $error;
  }

  function formAddError(input) {
    input.closest('.inp.required').classList.add('error');
    input.parentElement.classList.add('error');
    input.classList.add('error');
  }

  function formRemoveError(input) {
    input.closest('.inp.required').classList.remove('error');
    input.parentElement.classList.remove('error');
    input.classList.remove('error');
  }

  function phoneTest(input) {
    return /^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/im.test(input.value);
  }

  function nameTest(input) {
    return /^[a-zA-Zа-яА-ЯёЁ'][a-zA-Z-а-яА-ЯёЁ' ]+[a-zA-Zа-яА-ЯёЁ']?$/.test(input.value);
  }
}

$('.wpcf7-form').on('submit', function (event) {
  let $signFormData = {};
  let $form = $(this);
  let $error = formValidate($form);

  console.log('Ошибок формы:', $error);

  if ($error == 0) { //Если форма прошла валидацию
    $.each($(this).serializeArray(), function (index) {
      let name = this.name;
      let value = this.value;

      $signFormData[`${name}`] = value;
    });


    // Отправляет инфу формы для заполнения личной базы
    $.ajax({
      url: WPJS.siteUrl + '/backend/sign.php',
      type: 'GET',
      beforeSend: function() {
        $('body').addClass('loading');
      },
      data: `databaseData=${JSON.stringify($signFormData)}&serviceName=${$('.js-type-select').val()}`,
      success: function(response){
        let result = JSON.parse(response);

        if (result['status'] === 'ok') {
          alert("Запись принята!");
        } else {
          alert("Ошибка записи! Обновите страницу и попробуйте записаться снова!");
          location.reload();
        }
      },
      error: function(){
        alert('Ошибка записи! Обновите страницу и попробуйте записаться снова!');
        location.reload();
        console.log('ERROR SIGN sign.js');
      }
    });

    /* google sheets */
    $.ajax({
      redirect: "follow",
      url: 'https://script.google.com/macros/s/AKfycbz_KUQFXWWd5EkC9yEOBPcwPcBaKuVekSnvqQpeDOz7eSbAX7aqUGboFjfEpNotLinn/exec',
      type: 'POST',
      data: $signFormData,
      success: function(data){
        // console.log(data);
      },
      error: function(er){
        console.log(er, "sheets error");
        // console.log(er);
      }
    });
  } else {
    event.preventDefault();
    event.stopPropagation();
  }
});


/* SIGN PAGE */

$('.js-services-select').on('selectric-change', function(event, element, selectric) {
  const $this = $(this);
  const $optionVal = $this.val();
  const $typeSelect = $('.js-type-select');
  const $mastersSelect = $('.js-masters-select');

  $('.js-time-block').addClass('--hidden');
  $typeSelect.empty();
  $mastersSelect.empty();

  $.ajax({ // Отправляем выбранную услугу чтобы получить данные для услуг
    url: WPJS.siteUrl + '/backend/sign.php',
    type: 'GET',
    beforeSend: function() {
      $('body').addClass('loading');
    },
    complete: function() {
      setTimeout(() => {
        $('body').removeClass('loading');
      }, 250);
    },
    data: `optionVal=${$optionVal}`,
    success: function(data){
      let $response = JSON.parse(data);

      for (let i = 0; i < $response.length; i++) {
        $typeSelect.append($('<option>', {
          value: `${$response[i].services_name}`,
          text: `${$response[i].services_name}`,
        }));
      }

      $typeSelect.selectric('refresh');

    },
    error: function(){
      console.log('ererere');
    }
  });

  $.ajax({ // Отправляем выбранную услугу чтобы получить данные о мастерах
    url: WPJS.siteUrl + '/backend/signMasterInfo.php',
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

      for (let j = 0; j < $response.length; j++) {
        $mastersSelect.append($('<option>', {
          value: `${$response[j].last_name}`,
          text: `${$response[j].first_name} ${$response[j].last_name[0]}. ${$response[j].mid_name[0]}.` ,
        }));
      }

      // Заполняем aside с инфой о мастере
      const $masterBlock = $('.js-sign-master');

      $masterBlock.find('.sign__master-name').text(`Мастер ${$response[0].last_name} ${$response[0].first_name}`);
      // $masterBlock.find('.sign__master-desc').text(`${$response[0].about}`);
      $masterBlock.find('.sign__master-img').attr('src', WPJS.siteUrl + `${$response[0].img}`);
      $masterBlock.find('.sign__master-btn').attr('href', WPJS.siteUrl + `/reviews?master=${$response[0].last_name}`);

      $masterBlock.fadeIn();
      $mastersSelect.selectric('refresh');

    },
    error: function(){
      console.log('ERROR');
    }
  });
});

$('.js-masters-select').on('selectric-change', function(event, element, selectric) {
  const $this = $(this);
  const $optionVal = $('.js-services-select').val();
  const $typeSelect = $('.js-type-select');
  const $mastersSelect = $this;

  $('.js-time-block').addClass('--hidden');
  $typeSelect.empty();
  // $mastersSelect.empty();

  $.ajax({ // Отправляем выбранную услугу чтобы получить данные для услуг
    url: WPJS.siteUrl + '/backend/sign.php',
    type: 'GET',
    beforeSend: function() {
      $('body').addClass('loading');
    },
    complete: function() {
      setTimeout(() => {
        $('body').removeClass('loading');
      }, 250);
    },
    data: `serv=${$optionVal}&master=${$mastersSelect.val()}`,
    success: function(data){
      let $response = JSON.parse(data);

      for (let i = 0; i < $response.length; i++) {
        $typeSelect.append($('<option>', {
          value: `${$response[i].services_name}`,
          text: `${$response[i].services_name}`,
        }));
      }

      $typeSelect.selectric('refresh');

    },
    error: function(){
      console.log('ererere');
    }
  });

  $.ajax({ // Отправляем выбранную услугу чтобы получить данные о мастерах
    url: WPJS.siteUrl + '/backend/signMasterInfo.php',
    type: 'GET',
    beforeSend: function() {
      $('body').addClass('loading');
    },
    complete: function() {
      setTimeout(() => {
        $('body').removeClass('loading');
      }, 250);
    },
    data: `service=${$optionVal}&masterLastName=${$mastersSelect.val()}`,
    success: function(data){
      let $response = JSON.parse(data);

      // Заполняем aside с инфой о мастере
      const $masterBlock = $('.js-sign-master');

      $masterBlock.find('.sign__master-name').text(`Мастер ${$response[0].last_name} ${$response[0].first_name}`);
      // $masterBlock.find('.sign__master-desc').text(`${$response[0].about}`);
      $masterBlock.find('.sign__master-img').attr('src', WPJS.siteUrl + `${$response[0].img}`);
      $masterBlock.find('.sign__master-btn').attr('href', WPJS.siteUrl + `/reviews?master=${$response[0].last_name}`);

      $masterBlock.fadeIn();
    },
    error: function(){
      console.log('ERROR');
    }
  });
});

$('.js-type-select').on('selectric-change', () => {
  $('.js-time-block').addClass('--hidden');
});

/* --- Дата и время записи --- */
$(() => {
  const $dateInput = $('.sign-form__date-input');

  // инициализировать только при $(document).ready() !!!
  $('#sign-form__date').datepicker({
    minDate: 0,
    maxDate: '2024-10-31',
    dateFormat: "yy-mm-dd",
    onSelect: function( date, element ) {

      $dateInput.val(date);

      // Отправляет значение даты из календаря и получается свободное время в этот день
      $.ajax({
        url: WPJS.siteUrl + '/backend/timeForSign.php',
        type: 'GET',
        beforeSend: function() {
          $('body').addClass('loading');
        },
        complete: function() {
          setTimeout(() => {
            $('body').removeClass('loading');
          }, 250);
        },
        data: `date=${$dateInput.val()}&master=${$('.js-masters-select').val()}&serviceName=${$('.js-type-select').val()}`, // Отправляем дату, фамилию мастера и точный сервис
        success: function(data){

          var $response = JSON.parse(data);

          $('.wpcf7-list-item').first().find('input').prop('checked', false).removeAttr("checked");
          var $timeEl = $('.wpcf7-list-item').first().clone(); // копируем один чеквокс времени

          $('.js-sign-radio').empty(); // очищаем временные чекбоксы
          $('.js-sign-radio').append($timeEl);

          if($response.length) { // Если хоть одно время есть
            $('.js-time-block').removeClass('--hidden').removeClass('show--hint');

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
          } else { // Если времени на этот день уже нет
            $('.js-time-block').removeClass('--hidden').addClass('show--hint');
          }
        },
        error: function(){
          console.log('ERROR');
        }
      });
    },
  });
})
/* ------------------ */
