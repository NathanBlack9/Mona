<?php 
  $inst = carbon_get_theme_option('inst');
  $vk = carbon_get_theme_option('vk');

  $menu = carbon_get_theme_option('header_menu');
?>

<div class="menu js-menu">
  <div class="wrapper">
    <div class="menu__inner">
      <ul>
        <?php foreach ( $menu as $item ) { ?>
          <?php if ( $item['visible'] == 1 ) : ?>
            <?php if ( $item['_type'] == 'element' ) { ?>
              <li class="<?php echo $item['class']; ?>"><a href="<?php echo get_template_directory_uri() . $item['url']; ?>"><?php echo $item['name']; ?></a></li>
            <?php } else { ?>

              <li class="has-dropdown">
                <a href="<?php echo home_url() .$item['url']; ?>"><?php echo $item['name']; ?></a>
                <ul class="dropdown">
                  <a class="dropdown__back-btn js-back-btn not-desktop">Назад</a>

                  <?php foreach ( $item['dropdown'] as $drop ) { ?>
                    <li class="<?php echo $drop['class']; ?>">
                      <a href="<?php echo get_template_directory_uri() . $drop['url']; ?>"><?php echo $drop['name']; ?></a>
                    </li>
                  <?php } ?>

                </ul>
              </li>

            <?php } ?>
          <?php endif; ?>
        <?php } ?>
      </ul>
      <div class="menu__socials">
        <a href="<?php echo $inst ?>" class="menu__socials-inst" target="_blank"></a>
        <a href="<?php echo $vk ?>" class="menu__socials-vk" target="_blank"></a>
        <span>Следите за нами</span>
      </div>
      <a href="<?php echo home_url(); ?>/sign/" class="menu__sign-btn btn not-desktop">Записаться онлайн</a>
    </div>
  </div>
</div>