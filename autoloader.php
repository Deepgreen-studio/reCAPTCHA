<?php
/**
 * PSR-4 Style Autoloader
 *
 * @package EHxRecaptcha
 */

if (!defined('ABSPATH')) {
    exit;
}

if (!function_exists('EHxRecaptchaAutoload')) {

    function EHxRecaptchaAutoload($class)
    {
        $prefix = 'EHxRecaptcha\\'; // Root namespace
        $base_dir = __DIR__ . '/app/'; // Base directory where classes are stored

        // Does the class use the namespace prefix?
        $len = strlen($prefix);
        if (strncmp($prefix, $class, $len) !== 0) {
            // Not our class
            return;
        }

        // Get the relative class name
        $relative_class = substr($class, $len);

        // Replace the namespace prefix with the base directory, replace namespace
        // separators with directory separators, and append with .php
        $file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';

        // Load the file if it exists
        if (file_exists($file)) {
            require $file;
        }
    }

    spl_autoload_register('EHxRecaptchaAutoload');
}
