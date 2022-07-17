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
  })

  $.datepicker.setDefaults( $.datepicker.regional[ "ru" ] );

});