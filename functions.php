<?php
function krnc_register_styles() {
  $version = wp_get_theme()->get('Version');
  wp_enqueue_style('krnc_tailwind', get_template_directory_uri() . '/css/style.css');
  wp_enqueue_style('krnc_style', get_template_directory_uri() . '/style.css', array(), $version, 'all');
  wp_enqueue_style('krnc_main', get_template_directory_uri() . '/assets/css/main.css', array(), $version, 'all');
}
add_action('wp_enqueue_scripts', 'krnc_register_styles');

function krnc_register_scripts() {
  //Develop
  wp_enqueue_script('krnc_vuejs', 'https://cdn.jsdelivr.net/npm/vue/dist/vue.js', array(), '', true);
  //Production
  /*wp_enqueue_script('krnc_vuejs', 'https://cdn.jsdelivr.net/npm/vue', array(), '', true);*/
  wp_enqueue_script('krnc_js', get_template_directory_uri() . '/assets/js/main.js', array(), '1.0', true);
}
add_action('wp_enqueue_scripts', 'krnc_register_scripts');

function krnc_theme_support(){
  add_theme_support('title-tag');
}
add_action('after_setup_theme', 'krnc_theme_support');

function krnc_menus(){
  $locations = array('primary' => "Menú Principal");
  register_nav_menus($locations);
}
add_action('init', 'krnc_menus');

function krnc_add_li_class($classes, $item, $args) {
    if($args->add_li_class) {
        $classes[] = $args->add_li_class;
    }
    return $classes;
}
add_filter('nav_menu_css_class', 'krnc_add_li_class', 1, 3);
?>