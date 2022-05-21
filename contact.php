<?php
/*
  Template Name: contact
*/
?>

<?php get_header() ?>

<section class="contact-page">
  <div class="wrapper">
    <?php
      if ( function_exists('yoast_breadcrumb') ) {
        yoast_breadcrumb('<ul id="breadcrumbs" class="breadcrumbs"><li>','</li></ul>');
      }
    ?>
    <div class="h1"><?php the_title(); ?></div>
  </div>

  <map class="map-section">
    <div class="contact-panel">
      <dl>
        <dt>Адрес</dt>
        <dd>300045, г. Тула, мкр. Левобережный, Восточная 11</dd>
      </dl>
      <dl>
        <dt>Телефон</dt>
        <dd><a href="tel:+79509150858">+7 950 915 08 58</a></dd>
      </dl>
      <dl>
        <dt>Почта</dt>
        <dd><a href="mailto:info@studiomona.ru">info@studiomona.ru</a></dd>
      </dl>
      <dl>
        <dt>Режим работы</dt>
        <dd>
          <b>Пн - Вс:</b> 09:00 - 20:00<br>
          Записаться онлайн на сайте можно в любое время.<br>Запись будет обработана в рабочее время.
        </dd>
      </dl>
      <dl>
        <dt>Координаты</dt>
        <dd>54.175856, 37.652768</dd>
      </dl>
      <dl>
        <dt>Реквизиты</dt>
        <dd>
          Самозанятая Аракелян Анжела Станиславовна<br>
          ИНН: 710521787142<br>
          ОГРН: 1197746167981<br>
        </dd>
      </dl>
    </div>
    <div id="map" class="map"></div>
  </map>

  <div class="wrapper">
    <div class="contacts-slider slider js-slideshow">
      <a href="<?php echo get_template_directory_uri(); ?>/build/img/Groddup_21.jpg" data-fancybox="certificates" class="slider-item">
        <img src="<?php echo get_template_directory_uri(); ?>/build/img/Groddup_21.jpg" alt="" >
      </a>
      <a href="<?php echo get_template_directory_uri(); ?>/build/img/aa.jpg" data-fancybox="certificates" class="slider-item">
        <img src="<?php echo get_template_directory_uri(); ?>/build/img/aa.jpg" alt="" >
      </a>
      <a href="<?php echo get_template_directory_uri(); ?>/build/img/Groddup_21.jpg" data-fancybox="certificates" class="slider-item">
        <img src="<?php echo get_template_directory_uri(); ?>/build/img/Groddup_21.jpg" alt="" >
      </a>
      <a href="<?php echo get_template_directory_uri(); ?>/build/img/aa.jpg" data-fancybox="certificates" class="slider-item">
        <img src="<?php echo get_template_directory_uri(); ?>/build/img/aa.jpg" alt="" >
      </a>
    </div>
  </div>

</section>

<script src="<?php echo get_template_directory_uri(); ?>/build/js/vendor/YaMap.js" type="text/javascript"></script>

<script>
  var wp_vars = {};
  wp_vars.siteUrl = '<?php echo get_template_directory_uri(); ?>'

  const $mobile = window.innerWidth < 480;

  ymaps.ready(init);
  <?php /*
    $(() => {
      document.cookie = "Secure=1653128806";
      document.cookie = "SameSite=Strict; secure";
      console.log( document.cookie );
    })
  */ ?>
  function init(){
    var myMap = new ymaps.Map("map", {
      center: [54.175166 + (!$mobile ? 0 : 0.001), 37.651151 + (!$mobile ? 0 : 0.002)],
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
      <?php /* balloonContentHeader: "г. Москва",
        balloonContentBody: "ул. Пятницкая, д. 37",
        balloonContentFooter: "офис 61",
        hindContent: "Мы здесь!" */?>
    },
    {
      iconLayout: 'default#image',
      iconImageHref: '<?php echo get_template_directory_uri(); ?>' + "/build/img/map-placemark.svg",
      iconImageSize: [73 - (!$mobile ? 0 : 28), 73 - (!$mobile ? 0 : 28)],
      iconImageOffset: [-20 + (!$mobile ? 0 : 20), -73 + (!$mobile ? 0 : 20)]
    });

    myMap.geoObjects.add(placemark);
  }
</script>

<?php get_footer() ?>