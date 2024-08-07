<?php
use UltimateImageSlider\Admin\PluginMeta;

class PluginMetaTest extends \WP_UnitTestCase {

    protected $plugin_meta;

    public function setUp(): void {
        parent::setUp();
        // Instantiate the PluginMeta class
        $this->plugin_meta = new PluginMeta();
        // Define constants used in the PluginMeta class
        if (!defined('ULTIMATE_IMAGE_SLIDER_BASENAME')) {
            define('ULTIMATE_IMAGE_SLIDER_BASENAME', 'ultimate-image-slider/ultimate-image-slider.php');
        }
        if (!defined('ULTIMATE_IMAGE_SLIDER_FILE')) {
            define('ULTIMATE_IMAGE_SLIDER_FILE', __FILE__);
        }
    }

    public function test_plugin_action_links() {
        // Call the plugin_action_links method
        $links = $this->plugin_meta->plugin_action_links([]);

        // Check if 'Settings' link is present and correctly formed
        $expectedSettingsLink = '<a href="' . admin_url('admin.php?page=ultimate-image-slider#general_settings') . '">' . __('Settings', 'ultimate-image-slider') . '</a>';
        $this->assertContains($expectedSettingsLink, $links);
    }

}
