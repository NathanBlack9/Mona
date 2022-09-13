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
      if(index > 5) {
        let name = this.name;
        let value = this.value;

        $signFormData[`${name}`] = value;
      }
    });
    console.log($signFormData);
    console.log('=================');

    // Отправляет инфу формы для заполнения личной базы
    $.ajax({
      url: WPJS.siteUrl + '/backend/sign.php',
      type: 'GET',
      data: `databaseData=${JSON.stringify($signFormData)}&serviceName=${$('.js-type-select').val()}`,
      success: function(data){
        console.log('SUCCESS SIGN wp.js');
        console.log(data);
      },
      error: function(){
        console.log('ERROR SIGN wp.js');
      }
    });

    location.href = '/sign/';
  } else {
    event.preventDefault();
    event.stopPropagation();
  }
});

