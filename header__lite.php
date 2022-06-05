<!DOCTYPE html>
<html lang="ru">

<?php 
  get_template_part( 'head' );
?>

<body <?php body_class() ?>>

  <section class="global-container">

    <header class="header">
      <div class="wrapper">
        <div class="header__inner">
          
          <?php get_template_part( '/modules/menu' ); ?>
          
          <a href="#" class="header__menu-btn js-menu-toggler"><span></span></a>
          <a href="<?php echo home_url(); ?>" class="header__logo"></a>
          <a href="#" class="header__sign-btn btn only-desktop">Записаться онлайн</a>
          <div class="header__messengers">
            <a href="tel:+79509150858" class="header__messengers-phone">+7 (950) 915 08 58</a>
            <a href="" class="header__messengers-wh"></a>
            <a href="" class="header__messengers-vb"></a>
            <a href="" class="header__messengers-tg"></a>
          </div>
        </div>
      </div>
    </header>