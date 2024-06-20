<?php
namespace UltimateImageSlider\Frontend\Shortcodes;

/**
* Shortcode for slideshow
*
* @since    1.0.0
* @param    none
* @return   object
*/
class MySlideShow {

    /**
     * Private attributes
     * 
     * @var string
     */
    private $atts;


    /**
     * Private attributes
     * 
     * @var string
     */
    private $sliders;

    /**
     * Initialize shortcode
     *
     * @since   1.0.0
     * @access  public
     * @param   none
     * @return  void
     */
    public function __construct() {
        $this->sliders = get_option('uis_settings');
        add_shortcode( 'myslideshow', array( $this, 'render_shortcode' ) );
    }

    /**
     * Shortcode callback method
     *
     * @since   1.0.0
     * @access  public
     * @param   array
     * @return  string
     */
    public function render_shortcode( $atts ) {
        $this->atts = shortcode_atts( array(
        ), $atts );

        return $this->output();
    }

    /**
     * Render slider
     *
     * @since    1.0.0
     * @access  public
     * @param    none
     * @return   void
     */
    public function output() {
        ob_start();
        
        $template = ULTIMATE_IMAGE_SLIDER_PATH . '/includes/Frontend/views/my-slide-show.php';
		if ( file_exists( $template ) ) {
			include $template;
		}

        return ob_get_clean();
    }
}
