<?php

//menu
require_once 'lib/bootstrap_4_walker_nav_menu.php';

//widgets
require_once 'lib/jl_widgets.php';

//required plugins
include_once 'lib/jl_require_plugins.php';

//Add Shortcodes
include_once 'lib/jl_shortcodes.php';

/*  LOAD SCRIPTS */
if(!function_exists('jlcdatos_load_scripts')) {
    function jlcdatos_load_scripts() {
        //load bootstrap
        wp_enqueue_style('bootstrap-css',get_template_directory_uri().'/assets/css/bootstrap.min.css','','1.0','all');
        //load styles
        wp_register_style('style', get_stylesheet_uri(), ['bootstrap-css'], '1.0');
        wp_enqueue_style('style');

        /* SCRIPTS */ 
        wp_enqueue_script('jquery',get_template_directory_uri().'/assets/js/jquery.min.js');

        wp_enqueue_script('popper',get_template_directory_uri().'/assets/js/popper.min.js' , ['jquery'], '1.0', true);
        wp_enqueue_script('bootstrap-js',get_template_directory_uri().'/assets/js/bootstrap.js' , ['popper','jquery'], '1.0', true);
        wp_enqueue_script('app',get_template_directory_uri().'/assets/js/app.js' , ['jquery','popper','bootstrap-js'], '1.0', true);
    }
}

add_action('wp_enqueue_scripts', 'jlcdatos_load_scripts',1000);

/* ADD FUNCTIONS */ 


if(!function_exists('jlcdatos_setup')) {
    /* MENU */    
    function jlcdatos_setup() {
        register_nav_menu('main',esc_html('Menú Principal','jlcdatos'));
        register_nav_menu('secundary',esc_html('Menú Sidebar','jlcdatos'));
        register_nav_menu('auth-area',esc_html('Auth','jlcdatos'));
    }

    //SUPPORTS
    add_theme_support( 'title-tag' );
    // add_theme_support( 'custom-header' );
    // add_theme_support( 'custom-background' );
    add_theme_support( 'post-thumbnails' );

   
    //logo
    $configCustomLogo = [
        'height' => 49,
        'width' => 249,
        'flex-height' => true,
        'flex-width'  => true,
        'header-text' => array( 'site-title', 'site-description' ),
    ];
    add_theme_support( 'custom-logo' , $configCustomLogo);

    add_image_size( 'publicaciones', 200, 250, true);
}
add_action('after_setup_theme', 'jlcdatos_setup');

/* FILTROS NAV (AGREGA CLASE NAV-LINK A a) */ 
if(!function_exists('jlcdatos_link_class')) {
    function jlcdatos_link_class($attr,$item, $args) {
        if($args->theme_location == 'main') {
            $attr['class'] = 'nav-link';
        }
        return $attr;
    }
}
// Agrega clase 'nav-item' a elemento li del nav
add_filter('nav_menu_link_attributes', 'jlcdatos_link_class', 10, 3);

if(!function_exists('jlcdatos_item_class')) {
    function jlcdatos_item_class($classes, $item, $args) {
        $classes[] = 'nav-item';
        if( in_array('current-menu-item', $classes) ){
            $classes[] = 'active ';
        }
        return $classes;
    }
}
add_filter('nav_menu_css_class','jlcdatos_item_class',1,3);




/* CUSTOMIZER */
if(!function_exists('jlcdatos_customizer')) {

    function jlcdatos_customizer($wp_customize) {
        $wp_customize->add_panel('footer',[
            'title' => __('Footer','jlcdatos'),
            'description' => __('Footer','jlcdatos'),
            'priority' => 200
        ]);

        /*SOCIAL AREA*/ 
        $wp_customize->add_section( 'social_icons', [
            'title' => __('Sociales','jlcdatos'),
            'panel' => 'footer',
            'priority' => 10
        ]);
        $wp_customize->add_setting('facebook_link' , array(
            'default'     => '',
            'transport'   => 'refresh'
        ));
        $wp_customize->add_control('facebook', array(
            'label' => __('Facebook Link','jlcdatos'),
            'section' => 'social_icons', //this is the section where the custom-logo from WordPress is
            'settings' => 'facebook_link',
            'priority' => 1, // show it just below the custom-logo
        ));

        $wp_customize->add_setting('twitter_link' , array(
            'default'     => '',
            'transport'   => 'refresh'
        ));
        $wp_customize->add_control('twitter', array(
            'label' => __('Twitter Link','jlcdatos'),
            'section' => 'social_icons', //this is the section where the custom-logo from WordPress is
            'settings' => 'twitter_link',
            'priority' => 2, // show it just below the custom-logo
        ));

        $wp_customize->add_setting('youtube_link' , array(
            'default'     => '',
            'transport'   => 'refresh'
        ));
        $wp_customize->add_control('youtube', array(
            'label' => __('Youtube Link','jlcdatos'),
            'section' => 'social_icons', //this is the section where the custom-logo from WordPress is
            'settings' => 'youtube_link',
            'priority' => 3, // show it just below the custom-logo
        ));


        $wp_customize->add_section( 'copyright', [
            'title' => __('Copyright','jlcdatos'),
            'panel' => 'footer',
            'priority' => 20
        ]);

        $wp_customize->add_setting('copyright_text_setting' , array(
            'default'     => '',
            'transport'   => 'refresh'
        ));

        $wp_customize->add_control('copyright', array(
            'label' => __('CopyRight','jlcdatos'),
            'section' => 'copyright',
            'settings' => 'copyright_text_setting',
            'priority' => 20, 
        ));



        /* CONTACT AREA */
        $wp_customize->add_section('contact', array(
            'title' => __('Contacto', 'jlcdatos'),
            'panel' => 'footer',
            'priority' => 20
        ));

        $wp_customize->add_setting('contact_setting', array(
            'default' => '',
            'transport' => 'refresh' 
        ));
        $wp_customize->add_control('contact_area',array(
            'label' => __('Contacto','jlcdatos'),
            'priority' => 1,
            'settings' => 'contact_setting',
            'section' => 'contact',
            'type' => 'textarea'
        ));

        // HEADER PANEL
        $wp_customize->add_panel('header',[
            'title' => __('Header','jlcdatos'),
            'description' => __('Header','jlcdatos'),
            'priority' => 200
        ]);

        $wp_customize->add_section('analytics', array(
            'title' => __('Js Analytics', 'jlcdatos'),
            'panel' => 'header',
            'priority' => 20
        ));

        $wp_customize->add_setting('analytics_setting', array(
            'default' => '',
            'transport' => 'refresh' 
        ));
        $wp_customize->add_control('contact_area',array(
            'label' => __('Js Code','jlcdatos'),
            'priority' => 1,
            'settings' => 'analytics_setting',
            'section' => 'analytics',
            'type' => 'textarea'
        ));

    }
}
add_action( 'customize_register', 'jlcdatos_customizer',1,1);




/* WIDGETS */


add_action( 'dynamic_sidebar_before', 'jlcdatos_widget_title_h2_h3' );

function jlcdatos_widget_title_h2_h3( $sidebar_id ) {
 global $wp_registered_sidebars;
 if ( isset( $wp_registered_sidebars[$sidebar_id] ) ) {
    if ( isset($wp_registered_sidebars[$sidebar_id]['before_title']) ) {
      $now = $wp_registered_sidebars[$sidebar_id]['before_title'];
      $h3 = str_ireplace( '<h2', '<h3', $now );
      $wp_registered_sidebars[$sidebar_id]['before_title'] = $h3;
    }
 }
}


if (!function_exists('jlcdatos_widget_sidebar')) {
   

    function jlcdatos_widget_sidebar() {
        
        
        register_sidebar(array( 
            'name' => 'Precontent Left',
            'id' => 'precontent_left',
            'before_widget' => '',
            'after_widget' => '',
        ));

        register_sidebar(array( 
            'name' => 'Precontent Right',
            'id' => 'precontent_right',
            'before_widget' => '',
            'after_widget' => '',
        ));

        register_sidebar(array( 
            'name' => 'Widget PreFooter 2' ,
            'id' => 'widgets_prefooter_2',
            'before_widget' => '<div class="col-md-2 col-3 text-center ml-4">',
            'after_widget' => '</div>',

        ));

        register_sidebar(array( 
            'name' => 'Widget Prefooter 1',
            'id' => 'widgets_prefooter_1',
            'before_widget' => '<div class="col-12 col-md-6 text-center ">',
            'after_widget' => '</div>' 
        ));


        register_sidebar(array( 
            'name' => 'Sidebar',
            'id' => 'widgets_sidebar',
            'before_widget' => '',
            'after_widget' => '' 
        ));
    }
}

add_action( 'widgets_init', 'jlcdatos_widget_sidebar', 10, 1 );