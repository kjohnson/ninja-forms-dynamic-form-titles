<?php

final class NF_DynamicFormTitles_Plugin
{
    private $version;
    private $url;
    private $dir;
    private $api;

    public function __construct( $version, $file )
    {
        $this->version = $version;
        $this->url = plugin_dir_url( $file );
        $this->dir = plugin_dir_path( $file );

        add_filter( 'ninja_forms_form_display_settings', array( $this, 'form_display_settings' ) );
        add_action( 'ninja_forms_enqueue_scripts',       array( $this, 'enqueue_scripts'       ) );
    }

    /*
    |--------------------------------------------------------------------------
    | Hooks, Filters, and Actions
    |--------------------------------------------------------------------------
    */

    public function form_display_settings( $settings )
    {
        $settings[ 'kbj_dynamic_form_title' ] = array(
            'name' => 'kbj_dynamic_form_title',
            'type' => 'field-select',
            'label' => __( 'Dynamic Title', 'ninja-forms' ),
            'width' => 'full',
            'group' => 'primary',
            'field_value_format' => 'key',
            'value' => ''
        );
        return $settings;
    }

    public function enqueue_scripts()
    {
        wp_enqueue_script( 'kbj_dynamic_form_titles', $this->url( 'client/dynamicFormTitles.js' ), array( 'nf-front-end' ), $this->version );
    }

    /*
    |--------------------------------------------------------------------------
    | Getter Methods
    |--------------------------------------------------------------------------
    */

    public function version()
    {
        return $this->version;
    }

    public function url( $url = '' )
    {
        return trailingslashit( $this->url ) . $url;
    }

    public function dir( $path = '' )
    {
        return trailingslashit( $this->dir ) . $path;
    }
}
