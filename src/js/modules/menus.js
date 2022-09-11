$(function () {
  const $toggler = $('.js-menu-toggler');
  const $menu = $('.js-menu');
  const $body = $('body');
  const $hasDropdown = $menu.find('.has-dropdown');
  const $backButton = $('.js-back-btn');

  $toggler.on('click', function(e) {
    e.preventDefault();
    
    $body.toggleClass('menu-is-opened');
  });

  $hasDropdown.on('mouseenter', function() {
    $(this).addClass('is-hovered');
    $(this).siblings().removeClass('is-hovered');
  });

  $hasDropdown.on('mouseleave', function() {
    $(this).removeClass('is-hovered');
  });

  $backButton.on('mouseenter', function(e) {
    e.preventDefault();
    e.stopPropagation();

    $(this).closest('.has-dropdown').removeClass('is-hovered');
  })
});