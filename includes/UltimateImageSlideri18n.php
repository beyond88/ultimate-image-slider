<?php
namespace UltimateImageSlider;

/**
 * Support language
 * 
 * @since    1.0.0
 */
class UltimateImageSlideri18n {

	/**
	 * Call language method 
	 *
	 * @since	1.0.0
	 * @access	public
	 * @param	none
	 * @return	void
	 */
	public function __construct() {
		add_action('plugins_loaded', array($this, 'load_plugin_textdomain'));
	}

	/**
	 * Load language file from directory
	 *
	 * @since	1.0.0
	 * @access	public
	 * @param	none
	 * @return	void
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'ultimate-image-slider',
			false,
			dirname(dirname(ULTIMATE_IMAGE_SLIDER_BASENAME)) . '/languages/'
		);
	}
}
