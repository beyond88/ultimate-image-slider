<?php
use UltimateImageSlider\Admin\Main;

/**
 * Test class for testing the Main class in Ultimate Image Slider plugin.
 */
class MainTest extends WP_UnitTestCase {

    /**
     * Instance of the Main class.
     *
     * @var Main
     */
    protected $main;

    /**
     * Set up the test environment.
     */
    public function setUp(): void {
        parent::setUp();
        // Instantiate the Main class
        $this->main = new Main();
    }

    /**
     * Test case to verify the default options returned by set_default_options method.
     */
    public function test_default_options() {
        $expected = array(
            'img_id' => [],
            'slider_heading' => [],
            'slider_desc' => []
        );

        $this->assertEquals($expected, $this->main->set_default_options());
    }

    /**
     * Test case to verify the _optionName property value.
     */
    public function test_option_name() {
        $this->assertEquals('uis_settings', $this->main->_optionName);
    }

    /**
     * Test case to verify the _optionGroup property value.
     */
    public function test_option_group() {
        $this->assertEquals('uis_options_group', $this->main->_optionGroup);
    }

    /**
     * Test case to verify menu registration and settings initialization.
     */
    public function test_menu_register_settings() {
        // Mock WordPress functions related to settings
        add_filter('option_page_capability_' . $this->main->_optionGroup, function () {
            return 'manage_options';
        });

        // Register settings
        $this->main->menu_register_settings();

        // Verify that the option has been added with the correct default values
        $this->assertEquals($this->main->_defaultOptions, get_option($this->main->_optionName));

        // Verify that the option group has been registered
        $registered_settings = get_registered_settings();
        $this->assertArrayHasKey($this->main->_optionGroup, $registered_settings);
    }

    /**
     * Test case to verify the header template output.
     */
    public function test_header_template() {
        // Start output buffering to capture the output of the method
        ob_start();
        $this->main->header_template();
        $output = ob_get_clean();

        $this->assertContains('<div class="uis-settings-header">', $output);
        $this->assertContains('<h2 class="title">Ultimate Image Slider Settings</h2>', $output);
    }
}

