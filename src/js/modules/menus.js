$(function () {
  const $toggler = $('.js-menu-toggler');
  const $menu = $('.js-menu');
  const $body = $('body');
  const $hasDropdown = $menu.find('.has-dropdown');

  $toggler.on('click', function(e) {
    e.preventDefault();
    
    $body.toggleClass('menu-is-opened');
  });

  $hasDropdown.on('mouseenter', function() {
    $(this).addClass('is-hovered');
    $(this).siblings().removeClass('is-hovered');
  })
});