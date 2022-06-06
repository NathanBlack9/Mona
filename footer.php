<?php 
  $inst = carbon_get_theme_option('inst');
  $vk = carbon_get_theme_option('vk');

  $phone = carbon_get_theme_option('phone');
  $email = carbon_get_theme_option('email');
  $address = carbon_get_theme_option('address');

  $tel = str_replace([' ', '(', ')', '-'], '', $phone);
?>

  <footer class="footer">
    <div class="wrapper">
      <div class="footer__inner">
        <div class="footer__contact">
          <a href="/" class="footer__logo"></a>
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
            <li><a href="#">О нас</a></li>
            <li><a href="#">Цены и оплата</a></li>
            <li><a href="#">Сертификаты</a></li>
            <li><a href="#">Фотогалерея наших работ</a></li>
            <li><a href="#">Онлайн запись</a></li>
            <li><a href="#">Отзывы</a></li>
            <li><a href="#">Контакты</a></li>
          </ul>
        </div>
        <div class="footer__menu js-mobile-spoiler">
          <div class="footer__menu-title footer__menu-toggler js-spoiler-toggler" >Наши услуги</div>
          <ul class="footer__menu-list footer__menu-body js-spoiler-body">
            <li><a href="#">Маникюр</a></li>
            <li><a href="#">Педикюр</a></li>
            <li><a href="#">Шугаринг</a></li>
            <li><a href="#">Наращивание ресниц</a></li>
            <li><a href="#">Коррекция бровей</a></li>
          </ul>
        </div>
        <div class="footer__menu footer__menu-info">
          <ul class="footer__menu-list">
            <li><a href="#">Акции</a></li>
            <li><a href="#">Карта сайта</a></li>
            <li><a href="#">Политика конфиденциальности</a></li>
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
              <li class="footer__payment-cash" style="width: 25px;"></li>
              <span>Наличные</span>
            </ul>
          </div>
        </div>
        <div class="footer__copyright">© studiomona.ru 2022</div>
      </div>
    </div>
  </footer>

  <div class="go-top__btn js-go-top-btn"></div>
  
  <?php get_template_part( 'templates_navigation' ); ?>
  
  <script src="<?php echo get_template_directory_uri(); ?>/build/js/vendor/jquery-3.6.0.min.js"></script>
  <script src="<?php echo get_template_directory_uri(); ?>/build/js/vendor/jquery.selectric.min.js"></script>
  <script src="<?php echo get_template_directory_uri(); ?>/build/js/vendor/jquery-ui.min.js"></script>
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