<?php
/*
 * Plugin Name: Ninja Forms - Dynamic Form Titles
 * Plugin URI: http://kylebjohnson.me
 * Description: Adds a form option to append a field value to the form title.
 * Version: 3.0.0
 * Author: Kyle B. Johnson
 * Author URI: http://kylebjohnson.me
 *
 * Copyright 2017 Kyle B. Johnson.
 */

if( ! function_exists( 'NF_DynamicFormTitles' ) ) {
    function NF_DynamicFormTitles()
    {
        static $instance;
        if( ! isset( $instance ) ) {
            require_once plugin_dir_path( __FILE__ ) . 'includes/plugin.php';
            $instance = new NF_DynamicFormTitles_Plugin( '1.0.0', __FILE__ );
        }
        return $instance;
    }
}
NF_DynamicFormTitles();
