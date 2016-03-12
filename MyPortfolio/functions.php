<?php

remove_action('wp_head', 'wp_enqueue_style', 1);
add_action('wp_footer', 'wp_enqueue_style', 5);

remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'wp_generator');

show_admin_bar(false);

add_theme_support('post-thumbnails');

//Добавление <title>:
add_theme_support( 'title-tag' );

//Добавление скриптов и стилей

function my_theme_load_resources() {

	
//CSS
	wp_enqueue_style( 'bundle_css', get_template_directory_uri() . '/css/bundle.css', array(), true );
	wp_enqueue_style( 'googleFonts',  'http://fonts.googleapis.com/css?family=Roboto:300,400,500', array(), true  );
	wp_enqueue_style( 'fontAwesome',  'http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css', array(), true );
	
	
//JS
wp_deregister_script( 'jquery' );
    wp_register_script( 'jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js');
    wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'bundle_js', get_template_directory_uri() . '/js/libs/libs.js', array(), null, true );
	wp_enqueue_script( 'main', get_template_directory_uri() . '/js/main.js', array(), null, true );
	};
add_action( 'wp_enqueue_scripts', 'my_theme_load_resources' );

function logo_widgets_init() {

	register_sidebar( array(
		'name'          => 'logo',
		'id'            => 'logo_1',
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '<span class="hidden">',
		'after_title'   => '</span>',
	) );

}

add_action( 'widgets_init', 'logo_widgets_init' );

// Load up our awesome theme options
require_once ( get_stylesheet_directory() . '/theme-options.php' );
