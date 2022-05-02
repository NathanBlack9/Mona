$('.js-sorting a').click(function(e) {
  e.preventDefault();
  const $this = $(this);
  const $content = $('.js-sorting-content a');
  const $SortValue = $this.data('sort');

  $this.addClass('active');
  $this.siblings().removeClass('active');

  $content.each(function (){
    if($SortValue == 'all') {
      $(this).fadeIn();
    }
    else if($(this).data('sort') != $SortValue) {
      $(this).fadeOut();
    }
    else $(this).fadeIn();
  });
});

$(function() {
  $('.js-sorting-select').selectric().on('change', function(element) {
    const $SortValue = $(this).val();
    const $content = $('.js-sorting-content a');

    $content.each(function() {
      if($SortValue == 'all') {
        $(this).fadeIn();
      }
      else if($(this).data('sort') != $SortValue) {
        $(this).fadeOut();
      }
      else $(this).fadeIn();
    })
  })

});
