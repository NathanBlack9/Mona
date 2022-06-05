<!DOCTYPE html>
<html lang="ru">

<?php 
  get_template_part( 'head' );

  $phone = carbon_get_theme_option('phone');
  $tg = carbon_get_theme_option('tg');

?>

<body>

  <section class="global-container">

    <header class="header header-main">
      <div class="wrapper">
        <div class="header__inner">
          
          <?php get_template_part( '/modules/menu' ); ?>
          
          <a href="#" class="header__menu-btn js-menu-toggler"><span></span></a>
          <a href="<?php echo home_url(); ?>" class="header__logo"></a>
          <a href="<?php echo home_url(); ?>/sign/" class="header__sign-btn btn only-desktop">Записаться онлайн</a>
          <div class="header__messengers">
            <a href="tel:<?php echo str_replace([' ', '(', ')', '-'], '', $phone) ?>" class="header__messengers-phone"><?php echo $phone ?></a>
            <a href="https://api.whatsapp.com/send?phone=<?php echo str_replace([' ', '(', ')', '-'], '', $phone) ?>" class="header__messengers-wh" target="_blank"></a>
            <a href="viber://add?number=<?php echo str_replace([' ', '(', ')', '-'], '', $phone) ?>" class="header__messengers-vb" target="_blank"></a>
            <a href="<?php echo $tg ?>" class="header__messengers-tg" target="_blank"></a>
          </div>
        </div>
      </div>
    </header>