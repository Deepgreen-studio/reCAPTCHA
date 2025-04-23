<?php
declare(strict_types=1);

namespace EHxRecaptcha\Classes;

class HandleRecaptcha 
{
    /**
     * Constructor
     */
    public function __construct() 
    {
        add_action('init', [$this, 'load_textdomain']);

        add_action('wp_enqueue_scripts', [$this, 'register_scripts']);
    }
    
    /**
     * Load plugin textdomain
     */
    public function load_textdomain() 
    {
        load_plugin_textdomain(
            'ehx-recaptcha',
            false,
            dirname(plugin_basename(__FILE__)) . '/../languages'
        );
    }

    /**
     * Register frontend scripts and styles.
     *
     * This method enqueues frontend-specific CSS and JS files. It also registers and enqueues Google Map and Stripe scripts if enabled in the plugin settings.
     */
    public function register_scripts() 
    {
        wp_register_script(
            handle: 'ehxrc-recaptcha',
            src: 'https://www.google.com/recaptcha/api.js',
            deps: [],
            ver: EHXRC_VERSION,
            args: [
                'async' => true,
                'defer' => true,
            ]
        );
    }

}
