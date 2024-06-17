<?php
namespace UltimateImageSlider\Admin;

/**
 * The Menu handler class
 */
class Menu {

    /**
     * Plugin main file
     *
     * @var string
     */
    public $main;

    /**
     * Initialize the class
     * 
     * @since   1.0.0
     * @access  public
     * @param   object
     * @return  void
     */
    function __construct($main)
    {
        $this->main = $main;
        add_action( 'admin_menu', array( $this, 'admin_menu' ) );
    }

    /**
     * Register admin menu
     *
     * @since   1.0.0
     * @access  public
     * @param   none   
     * @return  void
     */
    public function admin_menu() {
        $parent_slug = 'ultimate-image-slider';
        $capability = 'manage_options';
        $icon_url = '';

        $settings = apply_filters('ultimate_image_slider_admin_menu', array());
        $hook = add_menu_page(__('Ultimate Image Slider', 'ultimate-image-slider'), __('Ultimate Image Slider', 'ultimate-image-slider'), $capability, $parent_slug, [$this->main, 'plugin_page'], $icon_url, 30);
    }
}