tippy('.hint', {
  content: (reference) => {
    return $(reference).find('.hint-text').length ?
      $(reference).find('.hint-text').clone().html() : $(reference).find('.hint-content').clone().html();
  },
  trigger: 'click',
  placement: 'right',
  allowHTML: true,
  arrow: true,
  allowHTML: true,
  interactive: true,
  touch: false,
  onTrigger(instance, event) {
    event.stopPropagation();
  },
  onUntrigger(instance, event) {
    event.stopPropagation();
  },
  popperOptions: {
    strategy: 'fixed',
    modifiers: [
      {
        name: 'flip',
        options: {
          fallbackPlacements: 'right',
        },
      },
    ],
  },
});


