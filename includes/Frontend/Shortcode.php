<?php
namespace UltimateImageSlider\Frontend;
// use UltimateImageSlider\Frontend\Shortcodes;

/**
 * Shortcode handler class
 */
class Shortcode {

    /**
     * Initializes the class
     * 
     * @since   1.0.0
     * @access  public
     * @param   none
     * @return  void
     */
    function __construct() {
        new Shortcodes\MySlideShow();
    }
}