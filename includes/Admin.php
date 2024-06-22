<?php
namespace UltimateImageSlider;

/**
 * The admin class
 */
class Admin {

    /**
     * Initialize the class
     * 
     * @since   1.0.0
     * @access  public
     * @param   none
     * @return  void
     */
    function __construct() {
        $main = new Admin\Main();

        new Admin\Menu( $main );
        new Admin\PluginMeta();
    }
}