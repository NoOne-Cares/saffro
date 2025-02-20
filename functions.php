<?php 
/**
 * Function package
 * @package saffora
 */
if(!defined('SAFFRO_DIR_PATH')){
	define('SAFFRO_DIR_PATH',untrailingslashit(get_template_directory()));
}

require_once SAFFRO_DIR_PATH.'/includes/helpers/autoloader';
function saffora_enqueue_scripts() {
	// wp_enqueue_style("style-css",get_stylesheet_uri(),[],filemtime(get_template_directory().'/style.css') ,'all');
	// wp_enqueue_script('main-js',get_template_directory_uri().'/assets/main.js',[],filemtime(get_template_directory()."/assets/main.js" ), true );

	//prefered way of injecting scripts and styles
	wp_register_style("style-css",get_stylesheet_uri(),[],filemtime(get_template_directory().'/style.css') ,'all');
	wp_register_script('main-js',get_template_directory_uri().'/assets/main.js',[],filemtime(get_template_directory()."/assets/main.js" ), true );

	wp_enqueue_style('style-css');
	wp_enqueue_script('main-js');
}
add_action('wp_enqueue_scripts','saffora_enqueue_scripts');
?>