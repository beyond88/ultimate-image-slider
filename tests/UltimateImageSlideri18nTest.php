<?php

use UltimateImageSlider\UltimateImageSlideri18n;

class UltimateImageSlideri18nTest extends \WP_UnitTestCase {

    protected $plugin_i18n;

    public function setUp(): void {
        parent::setUp();
        // Define the expected plugin base name constant
        if (!defined('ULTIMATE_IMAGE_SLIDER_BASENAME')) {
            define('ULTIMATE_IMAGE_SLIDER_BASENAME', 'ultimate-image-slider/ultimate-image-slider.php');
        }
        // Instantiate the UltimateImageSlideri18n class
        $this->plugin_i18n = new UltimateImageSlideri18n();
    }

    public function test_load_plugin_textdomain_action_hook() {
        // Check that the action 'plugins_loaded' has been added with the expected callback
        $this->assertNotFalse(has_action('plugins_loaded', [$this->plugin_i18n, 'load_plugin_textdomain']));
    }

    public function test_load_plugin_textdomain_method_called() {
        // Mock the load_plugin_textdomain function
        $this->plugin_i18n = $this->getMockBuilder(UltimateImageSlideri18n::class)
            ->onlyMethods(['load_plugin_textdomain'])
            ->getMock();
        
        // Expect the load_plugin_textdomain method to be called once
        $this->plugin_i18n->expects($this->once())
            ->method('load_plugin_textdomain');

        // Re-hook the plugins_loaded action with the mocked method
        add_action('plugins_loaded', [$this->plugin_i18n, 'load_plugin_textdomain']);

        // Trigger the plugins_loaded action to simulate WordPress loading
        do_action('plugins_loaded');
    }
}