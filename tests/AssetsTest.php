<?php
use UltimateImageSlider\Assets;

class AssetsTest extends WP_UnitTestCase {

    public function setUp() {
        parent::setUp();
        
        // Define necessary constants
        if (!defined('ULTIMATE_IMAGE_SLIDER_ASSETS')) {
            define('ULTIMATE_IMAGE_SLIDER_ASSETS', 'http://example.com/wp-content/plugins/ultimate-image-slider/assets');
        }
        if (!defined('ULTIMATE_IMAGE_SLIDER_PATH')) {
            define('ULTIMATE_IMAGE_SLIDER_PATH', '/path/to/ultimate-image-slider');
        }
        if (!defined('ULTIMATE_IMAGE_SLIDER_VERSION')) {
            define('ULTIMATE_IMAGE_SLIDER_VERSION', '1.0.0');
        }
    }

    public function test_constructor_adds_actions() {
        $assets = new Assets();

        // Verify that the actions are added
        $this->assertGreaterThan(0, has_action('wp_enqueue_scripts', array($assets, 'register_assets')));
        $this->assertGreaterThan(0, has_action('admin_enqueue_scripts', array($assets, 'register_admin_assets')));
    }

    public function test_register_assets() {
        $assets = new Assets();
        $assets->register_assets();

        // Verify that frontend scripts are registered
        $this->assertTrue(wp_script_is('ultimate-image-slider-slick', 'registered'));
        $this->assertTrue(wp_script_is('ultimate-image-slider-script', 'registered'));

        // Verify that frontend styles are registered
        $this->assertTrue(wp_style_is('ultimate-image-slider-style', 'registered'));
    }

    public function test_register_admin_assets() {
        $assets = new Assets();
        $assets->register_admin_assets('any_hook');

        // Verify that admin scripts are registered
        $this->assertTrue(wp_script_is('ultimate-image-slider-admin-script', 'registered'));

        // Verify that admin styles are registered
        $this->assertTrue(wp_style_is('ultimate-image-slider-admin-style', 'registered'));
    }
}