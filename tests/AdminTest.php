<?php
use UltimateImageSlider\Admin;
use UltimateImageSlider\Admin\Main;
use UltimateImageSlider\Admin\Menu;
use UltimateImageSlider\Admin\PluginMeta;

class AdminTest extends \WP_UnitTestCase {

    public function setUp(): void {
        parent::setUp();
    }

    public function test_admin_initializes_classes() {
        // Create mocks for the dependent classes
        $mainMock = $this->createMock(Main::class);
        $menuMock = $this->getMockBuilder(Menu::class)
                         ->setConstructorArgs([$mainMock])
                         ->getMock();
        $pluginMetaMock = $this->createMock(PluginMeta::class);

        // Instantiate the Admin class with the mocks
        $admin = new Admin($mainMock, $menuMock, $pluginMetaMock);

        // Ensure the main class is instantiated
        $this->assertInstanceOf(Main::class, $mainMock);

        // Ensure the menu class is instantiated with main class
        $this->assertInstanceOf(Menu::class, $menuMock);

        // Ensure the plugin meta class is instantiated
        $this->assertInstanceOf(PluginMeta::class, $pluginMetaMock);
    }
}
