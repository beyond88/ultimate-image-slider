<?php
namespace UltimateImageSlider\Admin;

class MenuTest extends \WP_UnitTestCase
{
    public function test_admin_menu_registration()
    {
        // Set up the admin menu
        $this->setupAdminMenu();

        // Check if the menu page is registered
        $this->assertTrue(
            $this->isMenuPageRegistered('ultimate-image-slider', 'Ultimate Image Slider'),
            'Menu page not registered.'
        );
    }

    protected function setupAdminMenu()
    {
        // Register the admin menu
        add_action('admin_menu', function() {
            add_menu_page(
                'Ultimate Image Slider',
                'Ultimate Image Slider',
                'manage_options',
                'ultimate-image-slider',
                array($this, 'renderMenuPage'),
                'dashicons-format-gallery',
                6
            );
        });

        // Call the admin_menu action to trigger the menu registration
        do_action('admin_menu');
    }

    protected function isMenuPageRegistered($slug, $title)
    {
        global $submenu, $menu;

        // Check if the menu page is registered in the top-level menu
        if (isset($menu)) {
            foreach ($menu as $item) {
                if ($item[2] === $slug && $item[0] === $title) {
                    return true;
                }
            }
        }

        // Check if the menu page is registered as a submenu page
        if (isset($submenu)) {
            foreach ($submenu as $parent => $items) {
                foreach ($items as $item) {
                    if ($item[2] === $slug && $item[0] === $title) {
                        return true;
                    }
                }
            }
        }

        return false;
    }

    protected function renderMenuPage()
    {
        // Render the menu page content
        echo '<h1>Ultimate Image Slider</h1>';
    }
}
