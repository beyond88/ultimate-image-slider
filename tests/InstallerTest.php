<?php
use UltimateImageSlider\Installer;

class InstallerTest extends WP_UnitTestCase {

    // Define a constant for the plugin version
    const PLUGIN_VERSION = '1.0.0';

    public function setUp() {
        parent::setUp();

        // Define the plugin version constant
        if (!defined('ULTIMATE_IMAGE_SLIDER_VERSION')) {
            define('ULTIMATE_IMAGE_SLIDER_VERSION', self::PLUGIN_VERSION);
        }

        // Ensure options are reset before each test
        delete_option('ultimate_image_slider_installed');
        delete_option('ultimate_image_slider_version');
    }

    public function tearDown() {
        // Cleanup after each test
        delete_option('ultimate_image_slider_installed');
        delete_option('ultimate_image_slider_version');

        parent::tearDown();
    }

    // Test that the installer sets the installed time if it doesn't already exist
    public function test_run_adds_installed_time() {
        $installer = new Installer();
        $installer->run();

        $installed_time = get_option('ultimate_image_slider_installed');
        $this->assertNotFalse($installed_time, 'The installed time should be set.');
        $this->assertIsInt($installed_time, 'The installed time should be an integer.');
    }

    // Test that the installer sets the plugin version
    public function test_run_sets_version() {
        $installer = new Installer();
        $installer->run();

        $version = get_option('ultimate_image_slider_version');
        $this->assertEquals(self::PLUGIN_VERSION, $version, 'The plugin version should be set to the defined constant.');
    }

    // Test that the installer does not overwrite the installed time if it already exists
    public function test_run_does_not_overwrite_installed_time() {
        $initial_time = time() - 1000; // Set an initial time in the past
        update_option('ultimate_image_slider_installed', $initial_time);

        $installer = new Installer();
        $installer->run();

        $installed_time = get_option('ultimate_image_slider_installed');
        $this->assertEquals($initial_time, $installed_time, 'The installed time should not be overwritten.');
    }
}
