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
     * Initialize shortcode
     *
     * @since   1.0.0
     * @access  public
     * @param   none
     * @return  void
     */
    public function __construct() {
        add_shortcode( 'myslideshow', array( $this, 'my_slide_show_shortcode' ) );
    }

    /**
     * Shortcode callback method
     *
     * @since   1.0.0
     * @access  public
     * @param   array
     * @return  string
     */
    public function my_slide_show_shortcode( $atts ) {
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
        // slider code goes here
        return ob_get_clean();
    }
}
