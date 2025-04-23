<?php
/**
 * Plugin Name:       EHx Recaptcha
 * Short Description: Adds Google reCAPTCHA functionality to EHx plugins for enhanced form security.
 * Description:       Adds Google reCAPTCHA functionality to EHx plugins for enhanced form security.
 * Plugin URI:        https://eh.studio/recaptcha
 * Version:           1.0.0
 * Requires at least: 5.8
 * Requires PHP:      7.4
 * Requires Plugins:  ehx-donate
 * Author:            EH Studio
 * Author URI:        https://eh.studio
 * License:           GPLv2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       ehx-recaptcha
 * Domain Path:       /languages
 */

 if (!defined('ABSPATH')) {
    die('Hi there!  I\'m just a plugin, not much I can do when called directly.');
}

// Define plugin constants
define('EHXRC_VERSION', '1.0.0');
define('EHXRC_MINIMUM_WP_VERSION', '5.8');
define('EHXRC_PLUGIN_DIR', plugin_dir_path(__FILE__));
define('EHXRC_PLUGIN_URL', plugin_dir_url(__FILE__));
define('EHXRC_DELETE_LIMIT', 10000);

class EHxRecaptcha 
{
    /**
     * Plugin instance
     * 
     * @var EHxRecaptcha
     */
    private static $instance;

    /**
     * Get plugin instance
     * 
     * @return EHxRecaptcha
     */
    public static function getInstance(): EHxRecaptcha
    {
        if (null === self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    /**
     * Initialize the plugin
     */
    private function __construct()
    {
        require_once EHXRC_PLUGIN_DIR . 'autoloader.php';

        new \EHxRecaptcha\Classes\HandleRecaptcha();
    }
}

// Initialize the plugin
EHxRecaptcha::getInstance();

register_activation_hook(__FILE__, [\EHxRecaptcha\Classes\PluginHandler::class, 'activate']);
register_deactivation_hook(__FILE__, [\EHxRecaptcha\Classes\PluginHandler::class, 'deactivate']);
register_uninstall_hook(__FILE__, [\EHxRecaptcha\Classes\PluginHandler::class, 'uninstall']);