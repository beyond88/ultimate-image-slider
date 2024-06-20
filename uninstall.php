<?php

if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
    exit;
}

/**
 * UltimateImageSlider Uninstall
 *
 * Uninstalling UltimateImageSlider deletes user roles, tables, pages, meta data and options.
 *
 * @since   1.0.0
 *
 * @package UltimateImageSlider\Uninstaller
 */
class UltimateImageSlider_Uninstaller {
    /**
     * Constructor for the class UltimateImageSlider_Uninstaller
     *
     * @since 1.0.0
     */
    public function __construct() {

        $this->delete_options();

        wp_cache_flush();

    }

    /**
     * Delete UltimateImageSlider settings
     *
     * @since 1.0.0
     *
     * @return void
     */
    private function delete_options() {
        global $wpdb;

        $options = [
            'uis_settings',
        ];

        foreach ( $options as $option ) {
            delete_option($option); // phpcs:ignore
        }
    }
}

new UltimateImageSlider_Uninstaller();