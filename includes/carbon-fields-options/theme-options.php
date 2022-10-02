<?php

if (!defined('ABSPATH')) {
  exit;
}

/* Превращаю массив услуг в ассоц. массив для галерей */
function get_services_name_from_db() {
  global $wpdb; 
  $services = $wpdb->get_results('SELECT name from service_categories', 'ARRAY_A');

  for ($i=0; $i < count($services); $i++) { 
    $anotherServices["{$services[$i]['name']}"] = "{$services[$i]['name']}";
  }
  return $anotherServices;
}
/* ------------------------ */ 

/* Превращаю массив мастеров в ассоц. массив для галерей */
function get_masters_from_db() {
  global $wpdb; 
  $masters = $wpdb->get_results('SELECT last_name from masters', 'ARRAY_A');

  for ($i=0; $i < count($masters); $i++) { 
    $anotherMasters["{$masters[$i]['last_name']}"] = "{$masters[$i]['last_name']}";
  }
  return $anotherMasters;
}
/* ------------------------ */ 

use Carbon_Fields\Container;
use Carbon_Fields\Field;

$employees_labels = array(
  'plural_name' => 'эл',
  'singular_name' => 'элемент',
);

Container::make( 'theme_options', 'Menu' ) //'Меню'
  ->set_icon('dashicons-menu-alt3')
  
  /*------- Header -------*/
  ->add_tab( 'Меню в шапке', array(
    Field::make( 'complex', 'header_menu', 'Главное меню')->set_classes('main-menu')->setup_labels( $employees_labels )
      ->add_fields('element', array( 
        Field::make( 'text', 'name', 'Название' )->set_width(40),
        Field::make( 'text', 'url', 'Url')->set_width(40),
        Field::make( 'text', 'class', 'Css класс')->set_width(10),
        Field::make( 'checkbox', 'visible', 'Вид')->set_width(4)->set_default_value(true),
      ) )->set_header_template('<%- name %>')
      ->add_fields('element_with_dropdown', array( 
        Field::make( 'text', 'name', 'Название' )->set_width(40),
        Field::make( 'text', 'url', 'Url')->set_width(40),
        Field::make( 'text', 'class', 'Css класс')->set_width(10),
        Field::make( 'checkbox', 'visible', 'Вид')->set_width(4)->set_default_value(true),
        Field::make( 'complex', 'dropdown', 'Выпадающий список')->set_classes('dropdown')->setup_labels( $employees_labels )
          ->add_fields('element', array( 
            Field::make( 'text', 'name', 'Название' )->set_width(40),
            Field::make( 'text', 'url', 'Url')->set_width(40),
            Field::make( 'text', 'class', 'Css класс')->set_width(10),
            Field::make( 'checkbox', 'visible', 'Вид')->set_width(4)->set_default_value(true),
          ))->set_header_template('<%- name %>')
      ) )->set_header_template('<%- name %>'),
  ) )
  /*------- Footer -------*/
  ->add_tab( 'Меню в подвале', array(
    Field::make( 'complex', 'footer_menu', 'Посетителям')->set_classes('main-menu')
      ->setup_labels( $employees_labels )
      ->add_fields('element', array( 
        Field::make( 'text', 'name', 'Название' )->set_width(45),
        Field::make( 'text', 'url', 'Url')->set_width(45),
        Field::make( 'checkbox', 'visible', 'Вид')->set_width(3)->set_default_value(true),
      ) )->set_header_template('<%- name %>'),
    Field::make( 'complex', 'footer_services', 'Наши услуги')->set_classes('main-menu')
      ->setup_labels( $employees_labels )
      ->add_fields('element', array( 
        Field::make( 'text', 'name', 'Название' )->set_width(45),
        Field::make( 'text', 'url', 'Url')->set_width(45),
        Field::make( 'checkbox', 'visible', 'Вид')->set_width(3)->set_default_value(true),
      ) )->set_header_template('<%- name %>'),
    Field::make( 'complex', 'footer_more', 'Другое')->set_classes('main-menu')
      ->setup_labels( $employees_labels )
      ->add_fields('element', array( 
        Field::make( 'text', 'name', 'Название' )->set_width(45),
        Field::make( 'text', 'url', 'Url')->set_width(45),
        Field::make( 'checkbox', 'visible', 'Вид')->set_width(3)->set_default_value(true),
      ) )->set_header_template('<%- name %>'),
  ) );
  


Container::make( 'theme_options', 'Contacts' )
  ->set_icon('dashicons-phone')
  ->add_fields(array(
    Field::make( 'text', 'phone', 'Номер телефона' )->set_width(30)->help_text('Это телефон для звонка, whatsapp и viber.'),
    Field::make( 'text', 'email', 'Почта' )->set_width(30),
    Field::make( 'text', 'address', 'Адрес' )->set_width(30),
    Field::make( 'text', 'inst', 'Ссылка на инстаграм' )->set_width(30)->set_default_value('https://instagram.com/'),
    Field::make( 'text', 'vk', 'Ссылка на ВК' )->set_width(30)->set_default_value('https://vk.com/'),
    Field::make( 'text', 'tg', 'Ссылка на Telegram' )->set_width(30),
  ) );



Container::make( 'theme_options', 'Media')
  ->set_icon('dashicons-images-alt2')

  ->add_tab( 'Фотогалерея', array(
    Field::make( 'complex', 'gallery', 'Фотогалерея')->set_classes('main-menu')->setup_labels( $employees_labels )
      ->add_fields('element', array( 
        Field::make( 'select', 'select', 'Услуга' )
          ->add_options('get_services_name_from_db')->set_width(20),
        Field::make( 'text', 'master', 'Има мастера')->set_width(50),
        Field::make( 'image', 'photo', 'Фото работы')->set_width(5)->set_required( true )
      ) )->set_header_template('<%- select %>')
  ))
  ->add_tab( 'Сертификаты', array(
    Field::make( 'media_gallery', 'certificates', 'Сертификаты')->set_classes('main-menu')->help_text('Множественный выбор с зажатым Ctrl.<br> Имя мастера писать в ПОДПИСИ!!!')
  ));

Container::make( 'theme_options', 'Close the day')
  ->set_icon('dashicons-calendar-alt')
  ->add_fields(array(
    Field::make( 'complex', 'closed_dates', 'Выберите мастера и дату когда нужно закрыть день')->set_classes('main-menu js-dont-close-complex')->setup_labels( $employees_labels )
    ->add_fields('element', array( 
      Field::make( 'select', 'master', 'Выберите фамилию мастера' )
        ->add_options('get_masters_from_db')->set_width(50),
      Field::make( 'date', 'closed_dates', 'Выберите дату' )
      ->set_storage_format( 'Y-m-d' )
      ->set_width(50)->set_required( true )
    ) )->set_header_template('Закрытый день')
  ));

