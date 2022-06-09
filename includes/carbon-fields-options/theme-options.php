<?php

if (!defined('ABSPATH')) {
  exit;
}

use Carbon_Fields\Container;
use Carbon_Fields\Field;

Container::make( 'theme_options', 'Contacts' )
  ->set_icon('dashicons-phone')
  ->add_fields(array(
    Field::make( 'text', 'phone', 'Номер телефона' )->set_width(30)->help_text('Это телефон для звонка, whatsapp и viber.'),
    Field::make( 'text', 'email', 'Почта' )->set_width(30),
    Field::make( 'text', 'address', 'Адрес' )->set_width(30),
    Field::make( 'text', 'inst', 'Ссылка на инстаграм' )->set_width(30)->set_default_value('https://instagram.com/'),
    Field::make( 'text', 'vk', 'Ссылка на ВК' )->set_width(30)->set_default_value('https://vk.com/'),
    Field::make( 'text', 'tg', 'Ссылка на Telegram' )->set_width(30),
    Field::make( 'text', 'coordinates_centerx', 'Координата центра карты (X)' )
      ->set_width(25),
    Field::make( 'text', 'coordinates_centery', 'Координата центра карты (Y)')
      ->set_width(25),
    Field::make( 'text', 'coordinates_pointx', 'Координата точки на карте (X)' )
      ->set_width(25),
    Field::make( 'text', 'coordinates_pointy', 'Координата точки на карте (Y)')
      ->set_width(25),

  ) );

Container::make( 'theme_options', 'Menu' )
  ->set_icon('dashicons-menu-alt3')
  ->add_tab( 'Меню в подвале', array(
    Field::make( 'complex', 'footer_menu', 'Посетителям')
      ->add_fields('element', array( 
        Field::make( 'text', 'name', 'Название' )->set_width(45),
        Field::make( 'text', 'url', 'Url')->set_width(45),
        Field::make( 'checkbox', 'visible', 'Вид')->set_width(3),
      ) ),
    Field::make( 'complex', 'footer_services', 'Наши услуги')
    ->add_fields('element', array( 
      Field::make( 'text', 'name', 'Название' )->set_width(45),
      Field::make( 'text', 'url', 'Url')->set_width(45),
      Field::make( 'checkbox', 'visible', 'Вид')->set_width(3),
    ) ),
    Field::make( 'complex', 'footer_more', 'Другое')
    ->add_fields('element', array( 
      Field::make( 'text', 'name', 'Название' )->set_width(45),
      Field::make( 'text', 'url', 'Url')->set_width(45),
      Field::make( 'checkbox', 'visible', 'Вид')->set_width(3),
    ) ),
  ) );

Container::make( 'nav_menu_item', 'Menu Settings' )
  ->add_fields( array(
      Field::make( 'color', 'crb_color' ),
  ));

    


// Container::make( 'theme_options', 'dddd' )
		// ->add_fields( array(
		// 	Field::make( 'text', 'crb_text', 'Text Field' ),
		// ) )
    // ->add_tab( __('По русски'), array(
    //   Field::make( 'text', 'crb_first_name', 'First Name' ),
    //   Field::make( 'text', 'crb_last_name', 'Last Name' ),
    //   Field::make( 'text', 'crb_position', 'телефона' ),
    // ) )
    // ->add_tab('Первый блок', [
    //   Field::make( 'text', 'first_title', 'Заголовок' ),
    //   // Field::make( 'text', 'btn_title1', 'Текст кнопки обратного звонка' ),
    //   Field::make( 'media_gallery', 'ass_gallery', 'Изображения для слайдера') //Изображения для слайдера
    // ])
    // ->add_tab('Форма обратного звонка',[
    //   Field::make( 'text', 'modal_title', 'Заголовок' ),
    // ])
//     ->add_fields( array(
//       Field::make( 'text', 'crb_134text', 'Text Field' ),
//       Field::make( 'text', 'crb_1354text', 'Text Field' ),
//       Field::make( 'text', 'crb_1345text', 'Text Field' ),
//       Field::make( 'text', 'crb_0text', 'Text Field' ),
//     ) )
//     ->add_tab( 'ddd', array(
//       Field::make( 'text', 'site_phone', 'Номер телефона' ),
//       Field::make( 'text', 'site_mail', 'Почта' ),
//       Field::make( 'text', 'site_phone_digits', 'Номер телефона без пробелов в формате +79999999999' ),
//     ) );

//   ->add_tab('Первый блок', [
//     Field::make( 'text', 'first_title', 'Заголовок' ),
//     // Field::make( 'text', 'btn_title1', 'Текст кнопки обратного звонка' ),
//     Field::make( 'media_gallery', 'ass_gallery', 'Изображения для слайдера') //Изображения для слайдера
//   ])

//   ->add_tab('Блок марок автомобилей', [
//     Field::make( 'text', 'mark_title', 'Заголовок' ),
//     Field::make( 'media_gallery', 'mark_gallery', 'Изображения марок автомобилей') //Лого марок машин  
//   ])

//   ->add_tab('Блок преимуществ', [
//     Field::make( 'text', 'advantages_title', 'Заголовок преимуществ' ),

//     Field::make( 'complex', 'advantages', 'Преимущество') //Список преимуществ
//       ->add_fields('advantages_type', array( 

//         Field::make( 'image', 'advantages_img', 'Иконка преимущества' )
//           ->set_width(30),
//         Field::make( 'text', 'advantages_text', 'Преимущество')
//           ->set_width(70),
//       ) )
//   ])

//   ->add_tab('Блок ограниченного предложения', [
//     Field::make( 'text', 'limited_title', 'Заголовок' ),
//     // Field::make( 'text', 'btn_title2', 'Текст кнопки обратного звонка' ),
//     Field::make( 'media_gallery', 'limited_gallery', 'Изображения для слайдера'), //Изображения для слайдера
//   ] )

//   ->add_tab('Блок карты', [
//     Field::make( 'text', 'map_title', 'Заголовок' ),
//   ] )
// /*
//   ->add_tab('Форма обратного звонка',[
//     Field::make( 'text', 'modal_title', 'Заголовок' ),
//   ])
// */
//   ->add_tab('Загрузка файлов',[
//     Field::make( 'file', 'site_policy', 'Файл политики для обработки персональных данных' ),
//   ]);
