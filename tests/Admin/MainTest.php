<?php
use UltimateImageSlider\Admin\Main;

class MainTest extends \WP_UnitTestCase {

    protected $main;

    public function setUp(): void {
        parent::setUp();
        // Instantiate the Main class
        $this->main = new Main();
    }

    public function test_default_options() {
        // Define expected default options array
        $expected = array(
            'img_id' => [],
            'slider_heading' => [],
            'slider_desc' => []
        );

        // Assert that the set_default_options method returns the expected default options
        $this->assertEquals($expected, $this->main->set_default_options());
    }

    public function test_option_name() {
        // Assert that the _optionName property is correctly set
        $this->assertEquals('uis_settings', $this->main->_optionName);
    }

    public function test_option_group() {
        // Assert that the _optionGroup property is correctly set
        $this->assertEquals('uis_options_group', $this->main->_optionGroup);
    }

    public function test_menu_register_settings() {
        // Mock the capability filter
        add_filter('option_page_capability_' . $this->main->_optionGroup, function () {
            return 'manage_options';
        });

        // Call the menu_register_settings method
        $this->main->menu_register_settings();

        // Verify that the option has been added with the correct default values
        $this->assertEquals($this->main->_defaultOptions, get_option($this->main->_optionName));

        // Verify that the option group has been registered
        global $new_whitelist_options;
        $this->assertArrayHasKey($this->main->_optionGroup, $new_whitelist_options);
    }

    public function test_header_template() {
        // Start output buffering to capture the output of the header_template method
        ob_start();
        $this->main->header_template();
        $output = ob_get_clean();

        // Assert that the output contains specific HTML elements expected in the header template
        $this->assertStringContainsString('<div class="uis-settings-header">', $output);
        $this->assertStringContainsString('<h2 class="title">Ultimate Image Slider Settings</h2>', $output);
    }
}
