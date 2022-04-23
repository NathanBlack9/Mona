$(document).ready(function () {
  const form = $('.js-form');

  form.on('submit', formSend);

  function formSend (e) {
    e.preventDefault();
    
    let error = formValidate(form);

    // let formData = new FormData(form);

    if (error===0) {
      // let response = await fetch('sendmail.php', {
      //   method: 'POST',
      //   body: formData
      // });
      // if (response.ok) {
      //   let result = await response.json();
      //   form.reset();
      // } else {
      //   alert('ошибка');
      // }
    } else {
      alert('Заполните обязательные поля!');
    }

  }

  function formValidate(form) {
    let error = 0;
    let formReq = document.querySelectorAll('.required');

    for (let i = 0; i < formReq.length; i++) {
      const input = formReq[i];
      formRemoveError(input);

      if (input.classList.contains('js-input-email')){
        if(emailTest(input)) {
          formAddError(input);
          error++;
        }
      } else if (input.getAttribute('type') === 'checkbox' && input.checked === false) {
          formAddError(input);
          error++;
      } else {
        if (input.value === '') {
          formAddError(input);
          error++;
        }
      }
    }

    return error;

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
});