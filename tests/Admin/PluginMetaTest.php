<?php
use UltimateImageSlider\Admin\PluginMeta;


class PluginMetaTest extends WP_UnitTestCase {

    protected $plugin_meta;

    public function setUp() {
        parent::setUp();

        // Mock constants used by the PluginMeta class
        define('ULTIMATE_IMAGE_SLIDER_BASENAME', 'ultimate-image-slider/ultimate-image-slider.php');
        define('ULTIMATE_IMAGE_SLIDER_FILE', 'ultimate-image-slider/ultimate-image-slider.php');

        // Instantiate the PluginMeta class
        $this->plugin_meta = new PluginMeta();
    }

    public function test_plugin_action_links() {
        // Call the plugin_action_links method
        $links = $this->plugin_meta->plugin_action_links([]);

        // Check if 'Settings' link is present and correctly formed
        $this->assertContains('<a href="' . admin_url('admin.php?page=ultimate-image-slider#general_settings') . '">' . __('Settings', 'ultimate-image-slider') . '</a>', $links);
    }

    public function test_plugin_meta_links() {
        // Call the plugin_meta_links method
        $links = $this->plugin_meta->plugin_meta_links([], 'ultimate-image-slider/ultimate-image-slider.php');

        // Check if 'Support' and 'Plugin Homepage' links are present and correctly formed
        $this->assertContains('<a target="_blank" href="https://github.com/beyond88/ultimate-image-slider/issues" title="' . __('Get help', 'ultimate-image-slider') . '">' . __('Support', 'ultimate-image-slider') . '</a>', $links);
        $this->assertContains('<a target="_blank" href="https://github.com/beyond88/ultimate-image-slider" title="' . __('Plugin Homepage', 'ultimate-image-slider') . '">' . __('Plugin Homepage', 'ultimate-image-slider') . '</a>', $links);
    }
}
