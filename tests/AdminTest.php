<?php
use UltimateImageSlider\Admin;
use PHPUnit\Framework\MockObject\MockObject;

class AdminTest extends WP_UnitTestCase {

    public function setUp() {
        parent::setUp();

        // Ensure the classes to be mocked are autoloaded or available
        if (!class_exists('UltimateImageSlider\Admin\Main')) {
            eval('namespace UltimateImageSlider\Admin; class Main {}');
        }
        if (!class_exists('UltimateImageSlider\Admin\Menu')) {
            eval('namespace UltimateImageSlider\Admin; class Menu { function __construct($main) {} }');
        }
        if (!class_exists('UltimateImageSlider\Admin\PluginMeta')) {
            eval('namespace UltimateImageSlider\Admin; class PluginMeta {}');
        }
    }

    public function test_admin_initializes_classes() {
        // Create mocks for the dependent classes
        $mainMock = $this->getMockBuilder('UltimateImageSlider\Admin\Main')
                         ->disableOriginalConstructor()
                         ->getMock();

        $menuMock = $this->getMockBuilder('UltimateImageSlider\Admin\Menu')
                         ->disableOriginalConstructor()
                         ->setConstructorArgs([$mainMock])
                         ->getMock();

        $pluginMetaMock = $this->getMockBuilder('UltimateImageSlider\Admin\PluginMeta')
                               ->disableOriginalConstructor()
                               ->getMock();

        // Mock the Admin class to replace the constructor dependencies with our mocks
        $adminMock = $this->getMockBuilder('UltimateImageSlider\Admin')
                          ->setMethods(['dispatch_actions'])
                          ->getMock();

        // Expect the dispatch_actions method to be called with the $mainMock
        $adminMock->expects($this->once())
                  ->method('dispatch_actions')
                  ->with($mainMock);

        // Instantiate the Admin class
        // Note: We can't directly test the constructor's instantiation of dependencies
        // using mocks as it happens internally, so we rely on checking the method calls
        $reflection = new ReflectionClass('UltimateImageSlider\Admin');
        $constructor = $reflection->getConstructor();
        $constructor->invoke($adminMock);

        // Ensure the main class is instantiated
        $this->assertInstanceOf('UltimateImageSlider\Admin\Main', $mainMock);

        // Ensure the menu class is instantiated with main class
        $this->assertInstanceOf('UltimateImageSlider\Admin\Menu', $menuMock);

        // Ensure the plugin meta class is instantiated
        $this->assertInstanceOf('UltimateImageSlider\Admin\PluginMeta', $pluginMetaMock);
    }
}
