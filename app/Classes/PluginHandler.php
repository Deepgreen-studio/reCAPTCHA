<?php
declare(strict_types=1);

namespace EHxRecaptcha\Classes;

use EHxDonate\Classes\Settings as DonateSettings;
use EHxEvent\Classes\Settings as EventSettings;
use EHxMembers\Classes\Settings as MemberSettings;

if (!defined('ABSPATH')) {
    exit;
}

class PluginHandler
{
    /**
     * Plugin activation hook.
     *
     * This function is called when the plugin is activated. It performs the following tasks:
     * 1. Updates the rewrite rules.
     * 2. Creates the payment table if it doesn't exist.
     * 3. Sets default plugin options.
     *
     * @return void
     */
    public static function activate()
    {
        // Flush rewrite rules to prevent 404 errors
        update_option('rewrite_rules', '');

        // Set default plugin options (if needed)
        $data = [];
        
        if (is_plugin_active(HandleSetting::DONATE_PLUGIN)) {
            $data[DonateSettings::$option] = DonateSettings::$options;
        }

        if (is_plugin_active(HandleSetting::MEMBER_PLUGIN)) {
            $data[MemberSettings::$option] = MemberSettings::$options;
        }

        if (is_plugin_active(HandleSetting::EVENT_PLUGIN)) {
            $data[EventSettings::$option] = EventSettings::$options;
        }

        foreach ($data as $key => $value) {
            $options = array_merge((array) $value, [
                'google_recaptcha_enable' => false,
                'google_recaptcha_site_key' => null,
                'google_recaptcha_secret_key' => null,
            ]);

            update_option($key, $options);
        }
    }
    
    /**
     * Plugin deactivation hook
     */
    public static function deactivate()
    {
        flush_rewrite_rules();
    }

    /**
     * Uninstalls the plugin and performs necessary cleanup tasks.
     *
     * This function drops the payment table from the database and deletes the plugin's options.
     *
     * @return void
     */
    public static function uninstall()
    {
        // Delete the plugin's options from the database

        $data = [];
        
        if (is_plugin_active(HandleSetting::DONATE_PLUGIN)) {
            $data[DonateSettings::$option] = DonateSettings::$options;
        }

        if (is_plugin_active(HandleSetting::MEMBER_PLUGIN)) {
            $data[MemberSettings::$option] = MemberSettings::$options;
        }

        if (is_plugin_active(HandleSetting::EVENT_PLUGIN)) {
            $data[EventSettings::$option] = EventSettings::$options;
        }

        foreach ($data as $key => $options) {
            unset(
                $options['google_recaptcha_enable'],
                $options['google_recaptcha_site_key'],
                $options['google_recaptcha_secret_key'],
            );
            update_option($key, $options);
        }
    }
}