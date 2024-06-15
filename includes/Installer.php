<?php
namespace UltimateImageSlider;

/**
 * Installer class
 */
class Installer {

    /**
     * Run the installer
     * 
     * @since   1.0.0
     * @access  public
     * @param   none
     * @return  void
     */
    public function run() {
        $this->add_version();
    }

    /**
     * Add time and version on DB
     * 
     * @since   1.0.0
     * @access  public
     * @param   none
     * @return  void
     */
    public function add_version() {
        $installed = get_option('ultimate_image_slider_installed');

        if (!$installed) {
            update_option('ultimate_image_slider_installed', time());
        }

        update_option('ultimate_image_slider_version', ULTIMATE_IMAGE_SLIDER_VERSION);
    }

}