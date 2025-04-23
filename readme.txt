=== Recaptcha ===
Contributors: ehstudio, iamsujitsarkar
Donate link: https://eh.studio
Tags: recaptcha, security, forms, spam protection, ehx-donate
Requires at least: WordPress 5.8
Requires PHP: 7.4
Tested up to: 6.5
Stable tag: 1.0.0
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Adds Google reCAPTCHA functionality to EHX Donate plugin for enhanced form security.

== Description ==

This plugin integrates Google reCAPTCHA v3 with the EHX Donate plugin to protect your donation forms from spam and automated submissions. 

Key features:
- Simple integration with EHX Donate forms
- Google reCAPTCHA v3 implementation (invisible verification)
- Configurable through EHX Donate settings
- Lightweight and performance optimized
- Developer friendly with hooks and filters

== Installation ==

1. Upload the plugin files to the `/wp-content/plugins/recaptcha` directory, or install the plugin through the WordPress plugins screen directly.
2. Activate the plugin through the 'Plugins' screen in WordPress
3. Ensure the EHX Donate plugin is installed and activated
4. Configure your reCAPTCHA keys in the EHX Donate settings page

== Frequently Asked Questions ==

= What version of reCAPTCHA does this use? =
This plugin uses reCAPTCHA v3 which provides invisible verification with no user interaction required.

= Where do I get my API keys? =
You can get your site key and secret key from the [Google reCAPTCHA admin console](https://www.google.com/recaptcha/admin/).

= Can I use this without EHX Donate? =
No, this plugin is specifically designed as an extension for the EHX Donate plugin.

= How do I know it's working? =
After configuration, you should see reCAPTCHA badges on pages with donation forms, and spam submissions should be blocked.

== Screenshots ==
1. reCAPTCHA settings in EHX Donate configuration
2. reCAPTCHA badge appearing on donation forms

== Changelog ==

= 1.0.0 =
* Initial release of the plugin with basic reCAPTCHA v3 integration
* Compatible with EHX Donate plugin
* Configuration through existing settings interface

== Upgrade Notice ==

1.0.0
Initial version of the plugin. No upgrade needed for new installations.

== Developer Notes ==

The plugin provides the following hooks:

Actions:
- `ehx_recaptcha_before_verify` - Fires before reCAPTCHA verification
- `ehx_recaptcha_after_verify` - Fires after verification

Filters:
- `ehx_recaptcha_threshold` - Modify the spam score threshold (default: 0.5)
- `ehx_recaptcha_site_key` - Filter the site key programmatically