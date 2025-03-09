<?php
// Namespace should be the very first statement.
namespace SAFFRO_THEME\Inc;

use SAFFRO_THEME\Inc\Traits\Singilton;  // Correct usage of 'use' after namespace.

if (!defined('SAFFRO_DIR_PATH')) {
    define('SAFFRO_DIR_PATH', get_template_directory());
}

if (!defined('SAFFRO_DIR_URI')) {
    define('SAFFRO_DIR_URI', get_template_directory_uri());
}

class SAFFRO_THEME
{
    use Singilton;

    protected function __construct()
    {
        // Your constructor code here...
        Assets::get_instance();
        Menu::get_instance();
        $this->setup_hooks();
    }

    protected function setup_hooks()
    {
        // // Hook setup code...
        add_action('wp_enqueue_scripts', [$this, 'register_styles']);
        add_action('wp_enqueue_scripts', [$this, 'register_scripts']);
        add_action('after_setup_theme', [$this, 'setup_theme']);
    }

    public function setup_theme()
    {
        add_theme_support('title-tag');
        add_theme_support('custom-logo', [
            'header-text' => ['site-title', 'site-description'],
            'height' => 10,
            'width' => 10,
            'flex-height' => true,
            'flex-width' => true
        ]);
        add_theme_support('custom-background', [
            'default-color' => 'fffff',
            'default-image' => '',
        ]);
        add_theme_support('post-thumbnails');
        add_theme_support('customize-selective-refresh-widgets');
        add_theme_support('automatic-feed-links');
        //changes the default html mark up
        add_theme_support('html5', [
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
            'script',
            'style',
        ]);
        //for tiny mice editor
        add_editor_style();
        add_theme_support('wp-block-styles');
        //align wide support few elements like images
        add_theme_support('align-wide');
        global $content_width;
        if (!isset($content_width)) {
            $content_width = 1240;
        }

    }

    public function register_styles()
    {
        // Register styles.
        wp_register_style('style-css', SAFFRO_BUILD_CSS_URI . '/main.css', [], filemtime(get_template_directory() . '/style.css'), 'all');
        wp_register_style('bootstrap-css', get_template_directory_uri() . '/assets/source/css/bootstrap.min.css', [], false, 'all');
        // Enqueue Styles.
        wp_enqueue_style('style-css');
        wp_enqueue_style('bootstrap-css');
    }

    public function register_scripts()
    {
        // Register scripts.

        wp_register_script('main-js', SAFFRO_BUILD_JS_URI . '/main.js', [], filemtime(get_template_directory() . '/assets/js/main.js'), true);
        wp_register_script('bootstrap-js', get_template_directory_uri() . '/assets/source/js/bootstrap.min.js', array('jquery'), false, true);

        // Enqueue Scripts.
        wp_enqueue_script('main-js');
        wp_enqueue_script('bootstrap-js');
    }
}
