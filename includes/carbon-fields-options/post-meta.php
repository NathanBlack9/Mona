<?php

if (!defined('ABSPATH')) {
  exit;
}

use Carbon_Fields\Container;
use Carbon_Fields\Field;

Container::make( 'post_meta', 'Content' )
  ->show_on_template('pages/contact.php')
  ->add_fields(array(
    Field::make( 'media_gallery', 'contact_gallery', 'Фото для галлереи')->set_classes('main-menu')->help_text('Множественный выбор с зажатым Ctrl'),
    Field::make( 'text', 'coordinates_centerx', 'Координата центра карты (X)' )
      ->set_width(25),
    Field::make( 'text', 'coordinates_centery', 'Координата центра карты (Y)')
      ->set_width(25),
    Field::make( 'text', 'coordinates_pointx', 'Координата точки на карте (X)' )
      ->set_width(25),
    Field::make( 'text', 'coordinates_pointy', 'Координата точки на карте (Y)')
      ->set_width(25),
  ));

Container::make( 'post_meta', 'Content' )
  ->show_on_template('pages/services_one.php')
  ->add_fields(array(
    Field::make( 'rich_text', 'main_content', 'Контент после заголовка')->set_classes('main-menu')->set_width(50),
    Field::make( 'rich_text', 'second_content', 'Контент мастеров')->set_classes('main-menu')->set_width(50),
    
    Field::make( 'media_gallery', 'one_gallery', 'Фото для галлереи')->set_classes('main-menu')->help_text('Множественный выбор с зажатым Ctrl'),
  ));

Container::make( 'post_meta', 'Content' )
  ->show_on_template('pages/about.php')
  ->add_fields(array(
    Field::make( 'rich_text', 'main_content', 'Контент после заголовка')->set_classes('main-menu')->set_width(50),
    Field::make( 'rich_text', 'second_content', 'Контент мастеров')->set_classes('main-menu')->set_width(50),
    
    Field::make( 'media_gallery', 'about_gallery', 'Фото для галлереи')->set_classes('main-menu')->help_text('Множественный выбор с зажатым Ctrl'),
  ));