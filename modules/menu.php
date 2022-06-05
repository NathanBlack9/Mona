<?php 
  $inst = carbon_get_theme_option('inst');
  $vk = carbon_get_theme_option('vk');
?>

<menu class="menu js-menu">
  <div class="wrapper">
    <div class="menu__inner">
      <ul>
        <li class="has-dropdown">
          <a href="<?php echo home_url(); ?>/services/">Наши услуги</a>
          <ul class="dropdown">
            <a class="dropdown__back-btn js-back-btn not-desktop">Назад</a>
            <li><a href="">Маникюр</a></li>
            <li><a href="">Педикюр</a></li>
            <li><a href="">Шугаринг</a></li>
            <li><a href="">Наращивание ресниц</a></li>
            <li><a href="">Коррекция бровей</a></li>
          </ul>
        </li>
        <li class="has-dropdown">
          <a href="<?php echo home_url(); ?>/about/">О нас</a>
          <ul class="dropdown">
            <a class="dropdown__back-btn js-back-btn not-desktop">Назад</a>
            <li><a href="<?php echo home_url(); ?>/price/">Цены и оплата</a></li>
            <li><a href="<?php echo home_url(); ?>/gallery/">Фотогалерея наших работ</a></li>
            <li><a href="<?php echo home_url(); ?>/discounts/">Акции</a></li>
          </ul>
        </li>
        <li>
          <a href="<?php echo home_url(); ?>/certificates/">Сертификаты</a>
        </li>
        <li>
          <a href="<?php echo home_url(); ?>/reviews/">Отзывы</a>
        </li>
        <li>
          <a href="<?php echo home_url(); ?>/contacts/">Контакты</a>
        </li>
      </ul>
      <div class="menu__socials">
        <a href="<?php echo $inst ?>" class="menu__socials-inst"></a>
        <a href="<?php echo $vk ?>" class="menu__socials-vk"></a>
        <span>Следите за нами</span>
      </div>
      <a href="<?php echo home_url(); ?>/sign/" class="menu__sign-btn btn not-desktop">Записаться онлайн</a>
    </div>
  </div>
</menu>