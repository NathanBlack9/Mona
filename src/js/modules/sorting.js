$('.js-sorting a').click(function(e) {
  e.preventDefault();
  const $this = $(this);
  const $content = $('.js-sorting-content > *');
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

$(function() { // сортировка озывов на странице отзывов
  function insertAfter(elem, refElem ) {
    return refElem.parentNode.insertBefore(elem, refElem.nextSibling);
  }

  if(!document.querySelector('.js-review-sort')) return;

  let $this = document.querySelector('.js-review-sort'),
      $replacedNode;

  for (let i = 0; i < $this.children.length; i++) {
    for (let j = i; j < $this.children.length; j++) {

      if (+$this.children[i].getAttribute('data-id') < +$this.children[j].getAttribute('data-id')) {
        $replacedNode = $this.replaceChild($this.children[j], $this.children[i]);
        insertAfter($replacedNode, $this.children[i])
      }
    }    
  }
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


$("ul.js-rating-stars li").on("mouseenter", function (e) {
  var $this = $(this);
  $this.prevUntil().addClass("active"), 
  $this.addClass("active");
}),

$("ul.js-rating-stars li").on("mouseleave", function (e) {
  var $this = $(this);
  $this.prevUntil().removeClass("active"), $this.removeClass("active");
}),

$("ul.js-rating-stars li").on("click", function (e) {
  e.preventDefault();
  $this = $(this);
  $this.siblings().removeClass("active-fixed"),
  $this.removeClass("active-fixed"),
  $this.prevUntil().addClass("active-fixed"),
  $this.addClass("active-fixed"),
  $this.parent().next().val($this.index() + 1);
});
