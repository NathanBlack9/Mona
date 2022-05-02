<?php

// add_action( 'after_setup_theme', 'crb_load' );
// function crb_load() {
//     require_once( 'includes/carbon-fields/vendor/autoload.php' );
//     \Carbon_Fields\Carbon_Fields::boot();
// }

// add_action('carbon_fields_register_fields', 'register_carbon_fields');
// function register_carbon_fields() {
//   require_once( 'includes/carbon-fields-options/theme-options.php' );
// }


// add_action('init', 'create_global_variable');
// function create_global_variable() {
//     global $blago;
//     $blago = [
//       'phone' => carbon_get_theme_option('site_phone'),
//       'phone_digits' => carbon_get_theme_option('site_phone_digits'),
//     ];
// }

add_filter( 'body_class', function( $classes ) {  
  
  $classes = array_diff( $classes, ['blog', 'home', 'logged-in', 'admin-bar', 'no-customize-support'] );
  if ( is_front_page() ) {   
    $classes[] = 'homepage';
  }

  return $classes;
});
