<?php
declare(strict_types=1);

namespace EHxRecaptcha\Classes;

if (!defined('ABSPATH')) {
    exit;
}

class HandleSetting
{    
    const MEMBER_PLUGIN = 'ehx-member/ehx-member.php';
    const DONATE_PLUGIN = 'ehx-donate/ehx-donate.php';
    const EVENT_PLUGIN = 'ehx-event/ehx-event.php';

    /**
     * Default reCAPTCHA keys (test keys)
     */
    const DEFAULT_SITE_KEY = '6LePvtQqAAAAABdeaktZv79QZCLUCqxVn5Wt64w8';
    const DEFAULT_SECRET_KEY = '6LePvtQqAAAAAFp7GxqThMl2ESIyRVJdshS-_YNy';
        
    /**
     * Get Sub Tab Data
     */
    public static function getSubTabData(): array
    {
        return [
            'label' => esc_html__('Google Recaptcha', 'ehx-recaptcha'),
            'slug'  => 'google_recaptcha',
            'description' => esc_html__('Settings for integrating Google reCAPTCHA to prevent spam and abuse.', 'ehx-recaptcha'),
        ];
    }

    /**
     * Get Sub Tab Data
     */
    public static function getIntegrationFields(): array
    {
        return [
            // ['field_name' => 'google_recaptcha_enable', 'title' => esc_html__('Enabled', 'ehx-recaptcha'), 'type' => 'checkbox', 'placeholder' => wp_kses_post(sprintf(__( 'Enable %s to protect your forms from spam and abuse.', 'ehx-donate' ), '<a href="' . esc_url('https://www.google.com/recaptcha/admin/create') . '" target="_blank" rel="noopener noreferrer">' . __( 'Google reCAPTCHA', 'ehx-donate' ) . '</a>')), 'option' => 'recaptcha'],
            ['field_name' => 'google_recaptcha_enable', 'title' => esc_html__('Enabled', 'ehx-recaptcha'), 'type' => 'checkbox', 'placeholder' => esc_html__( 'Enable Google reCAPTCHA to protect your forms from spam and abuse.', 'ehx-donate' ), 'option' => 'recaptcha'],
            ['field_name' => 'google_recaptcha_site_key', 'title' => esc_html__('Site key', 'ehx-recaptcha'), 'placeholder' => esc_html__('Google Recaptcha Site key', 'ehx-recaptcha'), 'option' => 'recaptcha'],
            ['field_name' => 'google_recaptcha_secret_key', 'title' => esc_html__('Secret key', 'ehx-recaptcha'), 'placeholder' => esc_html__('Google Recaptcha Secret key', 'ehx-recaptcha'), 'option' => 'recaptcha'],
        ];
    }
}