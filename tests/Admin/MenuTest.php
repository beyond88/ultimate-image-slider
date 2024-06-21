<?php
namespace UltimateImageSlider\Admin;

/**
 * Test class for testing the Menu class in Ultimate Image Slider plugin.
 */
class MenuTest extends WP_UnitTestCase {

    /**
     * Instance of the Menu class.
     *
     * @var Menu
     */
    protected $menu;

    /**
     * Set up the test environment.
     */
    public function setUp() {
        parent::setUp();

        // Mock the main file (Main class)
        $this->main = $this->getMockBuilder('Main')
                           ->disableOriginalConstructor()
                           ->getMock();

        // Instantiate the Menu class with the mocked Main class
        $this->menu = new Menu($this->main);
    }

    /**
     * Test case to verify the admin_menu method registration.
     */
    public function test_admin_menu_registration() {
        // Call the admin_menu method directly
        $this->menu->admin_menu();

        // Check if the menu page is registered
        global $menu;
        $menu_slug = 'ultimate-image-slider';

        $registered_menu = false;
        foreach ($menu as $menu_item) {
            if ($menu_item[2] === $menu_slug) {
                $registered_menu = true;
                break;
            }
        }

        $this->assertTrue($registered_menu, 'Menu page not registered.');

        // Verify that the capability required is 'manage_options'
        $this->assertEquals('manage_options', $menu[30][1]);

        // Verify that the menu page callback is set correctly
        $this->assertEquals([$this->main, 'plugin_page'], $menu[30][2]);
    }
}
