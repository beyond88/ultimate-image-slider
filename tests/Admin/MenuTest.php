<?php
namespace UltimateImageSlider\Admin;

use PHPUnit\Framework\TestCase;

class MenuTest extends \WP_UnitTestCase {

    protected $menu;
    protected $main;

    public function setUp(): void {
        parent::setUp();

        // Mock the Main class
        $this->main = $this->getMockBuilder(Main::class)
                           ->setMethods(['plugin_page'])
                           ->getMock();

        // Instantiate the Menu class with the mocked Main class
        $this->menu = new Menu($this->main);
    }

    public function test_admin_menu_registration() {
        // Trigger the admin_menu action
        do_action('admin_menu');

        global $_registered_pages;

        // Check if the menu page is registered
        $menu_slug = 'ultimate-image-slider';
        $found = false;

        // Ensure $_registered_pages is populated
        foreach ($_registered_pages as $page) {
            if (is_array($page) && isset($page[2]) && $page[2] === $menu_slug) {
                $found = true;
                break;
            }
        }

        $this->assertTrue($found, 'Menu page not registered.');

        // Find the registered page details
        $registered_page = null;
        foreach ($_registered_pages as $page) {
            if (is_array($page) && isset($page[2]) && $page[2] === $menu_slug) {
                $registered_page = $page;
                break;
            }
        }

        // Ensure $registered_page is not null before proceeding with assertions
        $this->assertNotNull($registered_page, 'Registered page not found.');

        // Verify that the capability required is 'manage_options'
        $this->assertEquals('manage_options', $registered_page[1]);

        // Verify that the menu page callback is set correctly
        $this->assertEquals([$this->main, 'plugin_page'], $registered_page[6]);
    }
}
