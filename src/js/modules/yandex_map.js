ymaps.ready(init);

function init(){
  var myMap = new ymaps.Map("map", {
    center: [54.175237, 37.649584],
    zoom: 17,
    controls: ['largeMapDefaultSet','routeButtonControl']
  });

  myMap.controls
    .remove('rulerControl')
    .remove('fullscreenControl')
    .remove('searchControl')
    .remove('routeButton');

    var control = myMap.controls.get('routeButtonControl');
    control.routePanel.state.set({
      fromEnabled: true,
      from: "",
      to: "муниципальное образование Тула, микрорайон Левобережный, Восточная улица, 11",
      type: "auto"
    });

  myMap.behaviors.disable([
    'scrollZoom'
  ]);

  var placemark = new ymaps.Placemark([54.175856, 37.652768], {
    hideIcon: false,
    // balloonContentHeader: "г. Москва",
    // balloonContentBody: "ул. Пятницкая, д. 37",
    // balloonContentFooter: "офис 61",
    // hindContent: "Мы здесь!"
  },
  {
    iconLayout: 'default#image',
    iconImageHref: wp_vars.siteUrl + "/build/img/map-placemark.svg",
    iconImageSize: [73, 73],
    iconImageOffset: [-20, -73]
  });

  myMap.geoObjects.add(placemark);
}