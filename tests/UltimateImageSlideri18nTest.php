<?php

use UltimateImageSlider\UltimateImageSlideri18n;

/**
 * Class UltimateImageSlideri18nTest
 *
 * @package UltimateImageSlider
 */
class UltimateImageSlideri18nTest extends WP_UnitTestCase {

    /**
     * Test if the load_plugin_textdomain method is hooked into the plugins_loaded action
     */
    public function test_load_plugin_textdomain_action_hook() {
        // Create a new instance of the class
        $i18n = new UltimateImageSlideri18n();

        // Check that the action 'plugins_loaded' has been added with the expected callback
        $this->assertNotFalse(has_action('plugins_loaded', array($i18n, 'load_plugin_textdomain')));
    }

    /**
     * Test if the load_plugin_textdomain method calls load_plugin_textdomain with correct parameters
     */
    public function test_load_plugin_textdomain() {
        // Define the expected plugin base name constant
        if (!defined('ULTIMATE_IMAGE_SLIDER_BASENAME')) {
            define('ULTIMATE_IMAGE_SLIDER_BASENAME', 'ultimate-image-slider/ultimate-image-slider.php');
        }

        // Mock the WordPress function `load_plugin_textdomain`
        $this->add_filter_temporarily('load_plugin_textdomain', [$this, 'mock_load_plugin_textdomain']);

        // Create an instance of the class
        $i18n = new UltimateImageSlideri18n();
        $i18n->load_plugin_textdomain();
    }

    /**
     * Mock function to replace `load_plugin_textdomain` for testing
     */
    public function mock_load_plugin_textdomain($domain, $deprecated, $plugin_rel_path) {
        $this->assertEquals('ultimate-image-slider', $domain);
        $this->assertFalse($deprecated);
        $this->assertStringContainsString('/languages/', $plugin_rel_path);
    }

    /**
     * Helper function to add a temporary filter
     */
    public function add_filter_temporarily($hook_name, $callback, $priority = 10, $accepted_args = 1) {
        add_filter($hook_name, $callback, $priority, $accepted_args);
        add_action('shutdown', function() use ($hook_name, $callback, $priority) {
            remove_filter($hook_name, $callback, $priority);
        });
    }
}