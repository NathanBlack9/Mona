<?php 
  $inst = carbon_get_theme_option('inst');
  $vk = carbon_get_theme_option('vk');

  $phone = carbon_get_theme_option('phone');
  $email = carbon_get_theme_option('email');
  $address = carbon_get_theme_option('address');

  $tel = str_replace([' ', '(', ')', '-', '+'], '', $phone);

  $menu_pos = carbon_get_theme_option('footer_menu');
  $menu_services = carbon_get_theme_option('footer_services');
  $menu_more = carbon_get_theme_option('footer_more');

?>

  <footer class="footer">
    <div class="wrapper">
      <div class="footer__inner">
        <div class="footer__contact">
          <a href="<?php echo get_template_directory_uri(); ?>/" class="footer__logo"></a>
          <div class="footer__contact-address"><span>Тула</span>  |  мкр. Левобережный, Восточная 11</div>
          <div class="footer__contact-time">Пн – Вс: 09:00 — 20:00</div>
          <div class="footer__contact-info">
            <a href="tel:<?php echo $tel; ?>" class="footer__contact-phone"><?php echo $phone; ?></a>
            <a href="mailto:<?php echo $email; ?>" class="footer__contact-email"><?php echo $email; ?></a>
          </div>
          <div class="footer__messengers">
            <a href="https://api.whatsapp.com/send?phone=<?php echo $tel ?>" class="footer__messengers-wh" target="_blank"></a>
            <a href="viber://add?number=<?php echo $tel ?>" class="footer__messengers-vb" target="_blank"></a>
            <a href="<?php echo $tg ?>" class="footer__messengers-tg" target="_blank"></a>
          </div>
        </div>
        <div class="footer__menu js-mobile-spoiler">
          <div class="footer__menu-title footer__menu-toggler js-spoiler-toggler">Посетителям</div>
          <ul class="footer__menu-list footer__menu-body js-spoiler-body">
            <?php foreach ( $menu_pos as $item ) { ?>
              <?php if ( $item['visible'] == 1 ) : ?>
                <li><a href="<?php echo get_template_directory_uri() . $item['url']; ?>"><?php echo $item['name']; ?></a></li>
              <?php endif; ?>
            <?php } ?>
          </ul>
        </div>
        <div class="footer__menu js-mobile-spoiler">
          <div class="footer__menu-title footer__menu-toggler js-spoiler-toggler" >Наши услуги</div>
          <ul class="footer__menu-list footer__menu-body js-spoiler-body">
            <?php foreach ( $menu_services as $item ) { ?>
              <?php if ( $item['visible'] == 1 ) : ?>
                <li><a href="<?php echo get_template_directory_uri() . $item['url']; ?>"><?php echo $item['name']; ?></a></li>
              <?php endif; ?>
            <?php } ?>
          </ul>
        </div>
        <div class="footer__menu footer__menu-info">
          <ul class="footer__menu-list">
            <?php foreach ( $menu_more as $item ) { ?>
              <?php if ( $item['visible'] == 1 ) : ?>
                <li><a href="<?php echo get_template_directory_uri() . $item['url']; ?>"><?php echo $item['name']; ?></a></li>
              <?php endif; ?>
            <?php } ?>
          </ul>
        </div>
        <div class="footer__right">
          <div class="footer__socials">
            <span>Мы в соцсетях</span>
            <ul>
              <li><a href="<?php echo $inst ?>" class="footer__socials-inst" target="_blank"></a></li>
              <li><a href="<?php echo $vk ?>" class="footer__socials-vk" target="_blank"></a></li>
            </ul>
          </div>
          <div class="footer__payment">
            <span>Принимаем к оплате</span>
            <ul>
              <li class="footer__payment-visa" style="width: 60px;"></li>
              <li class="footer__payment-master" style="width: 36px;"></li>
              <li class="footer__payment-cash" style="width: 25px;" title="Наличные"><span>Наличные</span></li>
            </ul>
          </div>
        </div>
        <div class="footer__copyright">© studiomona.ru 2022</div>
      </div>
    </div>
  </footer>

  <div class="go-top__btn js-go-top-btn"></div>
  
  <?php //get_template_part( 'templates_navigation' ); ?>

  <script>
    var WPJS = {};
    WPJS.siteUrl = '<?php echo get_template_directory_uri(); ?>';
  </script>    

  <script src="<?php echo get_template_directory_uri(); ?>/build/js/vendor/jquery-3.6.0.min.js"></script>
  <script src="<?php echo get_template_directory_uri(); ?>/build/js/vendor/jquery.selectric.min.js"></script>
  <script src="<?php echo get_template_directory_uri(); ?>/build/js/vendor/jquery-ui.min.js"></script>
  <script src="<?php echo get_template_directory_uri(); ?>/build/js/vendor/inview.js"></script>
  <script src="<?php echo get_template_directory_uri(); ?>/build/js/vendor/jquery-confirm.js"></script>
  <script src="<?php echo get_template_directory_uri(); ?>/build/js/vendor/datepicker-ru.js"></script>
  <script src="<?php echo get_template_directory_uri(); ?>/build/js/vendor/slick.min.js"></script>
  <script src="<?php echo get_template_directory_uri(); ?>/build/js/vendor/fancybox.js"></script>
  <script src="<?php echo get_template_directory_uri(); ?>/build/js/vendor/tippy.js"></script>
  <script src="<?php echo get_template_directory_uri(); ?>/build/js/vendor/gsap.min.js"></script>
  <script src="<?php echo get_template_directory_uri(); ?>/build/js/vendor/ScrollMagic.min.js"></script>
  <script src="<?php echo get_template_directory_uri(); ?>/build/js/vendor/debug.addIndicators.min.js"></script>
  <script src="<?php echo get_template_directory_uri(); ?>/build/js/common-min.js"></script>

</section> <?php // global-container ?>

</body>
</html>
