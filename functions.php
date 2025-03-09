<?php

/**
 * Function package
 * @package saffora
 */

if (!defined('SAFFRO_DIR_PATH')) {
	define('SAFFRO_DIR_PATH', untrailingslashit(get_template_directory()));
}
if (!defined('SAFFRO_BUILD_URI')) {
	define('SAFFRO_BUILD_URI', untrailingslashit(get_template_directory_uri()) . "/build");
}
if (!defined('SAFFRO_BUILD_JS_URI')) {
	define('SAFFRO_BUILD_JS_URI', untrailingslashit(get_template_directory_uri()) . "/build/js");
}
if (!defined('SAFFRO_BUILD_CSS_URI')) {
	define('SAFFRO_BUILD_CSS_URI', untrailingslashit(get_template_directory_uri()) . "/build/css");
}
if (!defined('SAFFRO_BUILD_IMG_URI')) {
	define('SAFFRO_BUILD_IMG_URI', untrailingslashit(get_template_directory_uri()) . "/build/image");
}
require_once SAFFRO_DIR_PATH . '/inc/helpers/autoloader.php';
// require_once SAFFRO_DIR_PATH.'/inc/classes/class-saffro-theme.php';

function saffro_get_theme_instance()
{
	\SAFFRO_THEME\Inc\SAFFRO_THEME::get_instance();
}
saffro_get_theme_instance();