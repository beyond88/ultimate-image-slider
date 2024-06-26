<?php
namespace UltimateImageSlider;

/**
 * Assets handlers class
 */
class Assets
{

    /**
     * Class constructor
     * 
     * @since   1.0.0
     * @access  public
     * @param   none
     * @return  void
     */
    function __construct() {
        add_action('wp_enqueue_scripts', array($this, 'register_assets'));
        add_action('admin_enqueue_scripts', array($this, 'register_admin_assets'));
    }

    /**
     * All available scripts
     *
     * @since   1.0.0
     * @access  public
     * @param   none
     * @return  array
     */
    public function get_scripts() {
        return array(
                'ultimate-image-slider-slick' => array(
                    'src'     => ULTIMATE_IMAGE_SLIDER_ASSETS . '/lib/slick.min.js',
                    'version' => filemtime(ULTIMATE_IMAGE_SLIDER_PATH . '/assets/lib/slick.min.js'),
                    'deps'    => array('jquery'),
                ),
                'ultimate-image-slider-script' => array(
                    'src'     => ULTIMATE_IMAGE_SLIDER_ASSETS . '/js/frontend.js',
                    'version' => filemtime(ULTIMATE_IMAGE_SLIDER_PATH . '/assets/js/frontend.js'),
                    'deps'    => array('jquery'),
                
                ),
            );
    }

    /**
     * All available styles
     *
     * @since   1.0.0
     * @access  public
     * @param   none
     * @return  array
     */
    public function get_styles() {
        return array(
            'ultimate-image-slider-style' => array(
                'src'     => ULTIMATE_IMAGE_SLIDER_ASSETS . '/lib/style.css',
                'version' => filemtime(ULTIMATE_IMAGE_SLIDER_PATH . '/assets/lib/style.css'),
            ),
        );
    }

    /**
     * Register scripts and styles
     *
     * @since   1.0.0
     * @access  public
     * @param   none
     * @return  array
     */
    public function register_assets() {
        
        $scripts = $this->get_scripts();
        $styles  = $this->get_styles();

        foreach ($scripts as $handle => $script) {
            $deps = isset($script['deps']) ? $script['deps'] : false;
            $type = isset($script['type']) ? $script['type'] : '';

            wp_enqueue_script($handle, $script['src'], $deps, $script['version'], true);
        }

        foreach ($styles as $handle => $style) {
            $deps = isset($style['deps']) ? $style['deps'] : false;
            $type = isset($script['type']) ? $script['type'] : '';

            wp_enqueue_style($handle, $style['src'], $deps, $style['version']);
        }

        wp_localize_script('ultimate-image-slider-script', 'ultimate_image_slider', array(
            'ajax_url'  => admin_url('admin-ajax.php'),
            'nonce' => wp_create_nonce('ultimate-image-slider-nonce'),
        ));
    }

    /**
     * All available scripts
     * 
     * @since   1.0.0
     * @access  public
     * @param   none
     * @return  array
     */
    public function get_admin_scripts() {
        return array(
            'ultimate-image-slider-admin-script' => array(
                'src'     => ULTIMATE_IMAGE_SLIDER_ASSETS . '/js/admin.js',
                'version' => filemtime(ULTIMATE_IMAGE_SLIDER_PATH . '/assets/js/admin.js'),
                'deps'    => array('jquery'),
            ),
        );
    }

    /**
     * All available styles
     *
     * @since   1.0.0
     * @access  public
     * @param   none
     * @return  array
     */
    public function get_admin_styles() {
        return array(
            'ultimate-image-slider-admin-style' => array(
                'src'     => ULTIMATE_IMAGE_SLIDER_ASSETS . '/css/admin.css',
                'version' => filemtime(ULTIMATE_IMAGE_SLIDER_PATH . '/assets/css/admin.css'),
            ),
        );
    }

    /**
     * Register scripts and styles
     *
     * @since   1.0.0
     * @access  public
     * @param   none
     * @return  array
     */
    public function register_admin_assets($hook) {

        $tab = isset($_GET['tab']) ? $_GET['tab'] : '';
        $section = isset($_GET['section']) ? $_GET['section'] : '';

        wp_enqueue_media();
        wp_enqueue_script( 'jquery-ui-core' );
        wp_enqueue_script( 'jquery-ui-sortable' );

        $scripts = $this->get_admin_scripts();
        $styles  = $this->get_admin_styles();

        foreach ($scripts as $handle => $script) {
            $deps = isset($script['deps']) ? $script['deps'] : false;
            $type = isset($script['type']) ? $script['type'] : '';
            wp_enqueue_script($handle, $script['src'], $deps, $script['version'], true);
        }

        foreach ($styles as $handle => $style) {
            $deps = isset($style['deps']) ? $style['deps'] : false;
            $type = isset($script['type']) ? $script['type'] : '';

            wp_enqueue_style($handle, $style['src'], $deps, $style['version']);
        }

        wp_localize_script('ultimate-image-slider-admin-script', 'ultimate_image_slider', array(
            'ajax_url'  => admin_url('admin-ajax.php'),
            'nonce' => wp_create_nonce('ultimate-image-slider-admin-nonce'),
            'slider_preview' => ULTIMATE_IMAGE_SLIDER_ASSETS . '/images/image-preview.svg',
            'slider_heading_placeholder' => __('Enter slider heading', 'ultimate-image-slider'),
            'slider_desc_placeholder' => __('Enter slider description', 'ultimate-image-slider'),
            'image_selection_alert' => __('Please select at least one image.', 'ultimate-image-slider'),
        ));
    }
}
