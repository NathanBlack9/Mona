$('.wpcf7-form').on('submit', function (event) {  

  event.stopPropagation();
  event.preventDefault();

  let $signFormData = {};

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
    url: WPJS.siteUrl + '/backend/backend.php',
    type: 'GET',
    data: `databaseData=${JSON.stringify($signFormData)}&serviceName=${$('.js-type-select').val()}`,
    success: function(data){
      console.log('SUCCESS');
      console.log(data);
    },
    error: function(){
      console.log('ERROR');
    }
  });

  

});

