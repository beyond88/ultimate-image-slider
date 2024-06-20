<?php
/**
 * Plugin Name: Ultimate Image Slider
 * Description: Easily create and customize beautiful, responsive image slideshows for your WordPress site.
 * Plugin URI: https://github.com/beyond88/ultimate-image-slider
 * Author: Mohiuddin Abdul Kader
 * Author URI: https://github.com/beyond88/
 * Version: 1.0.0
 * License: GPL2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       ultimate-image-slider
 * Domain Path:       /languages
 * Requires PHP:      5.6
 * Requires at least: 4.4
 * Tested up to:      6.5.2
 * @package Ultimate Image Slider
 *
 * License: GNU General Public License v3.0
 * License URI: http://www.gnu.org/licenses/gpl-3.0.html 
 */

if (!defined('ABSPATH')) {
    exit;
}

require_once __DIR__ . '/vendor/autoload.php';

/**
 * The main plugin class
 */
final class UltimateImageSlider {

    /**
     * Plugin version
     *
     * @var string
     */
    const version = '1.0.0';

    /**
     * Class constructor
     */
    private function __construct() {
        $this->define_constants();

        register_activation_hook( __FILE__, array( $this, 'activate' ) );
        add_action( 'plugins_loaded', array( $this, 'init_plugin') );
    }

    /**
     * Initializes a singleton instance
     *
     * @return \Ultimate Image Slider
     */
    public static function init() {
        static $instance = false;

        if (!$instance) {
            $instance = new self();
        }

        return $instance;
    }

    /**
     * Define the required plugin constants
     *
     * @return void
     */
    public function define_constants() {
        define('ULTIMATE_IMAGE_SLIDER_VERSION', self::version);
        define('ULTIMATE_IMAGE_SLIDER_FILE', __FILE__);
        define('ULTIMATE_IMAGE_SLIDER_PATH', __DIR__);
        define('ULTIMATE_IMAGE_SLIDER_URL', plugins_url('', ULTIMATE_IMAGE_SLIDER_FILE));
        define('ULTIMATE_IMAGE_SLIDER_ASSETS', ULTIMATE_IMAGE_SLIDER_URL . '/assets');
        define('ULTIMATE_IMAGE_SLIDER_BASENAME', plugin_basename(__FILE__));
        define('ULTIMATE_IMAGE_SLIDER_PLUGIN_NAME', 'Ultimate Image Slider');
        define('ULTIMATE_IMAGE_SLIDER_MINIMUM_PHP_VERSION', '5.6.0');
        define('ULTIMATE_IMAGE_SLIDER_MINIMUM_WP_VERSION', '4.4');
    }

    /**
     * Initialize the plugin
     *
     * @return void
     */
    public function init_plugin() {

        new UltimateImageSlider\Assets();
        new UltimateImageSlider\UltimateImageSlideri18n();

        if (defined('DOING_AJAX') && DOING_AJAX) {
            new UltimateImageSlider\Ajax();
        }

        if (is_admin()) {
            new UltimateImageSlider\Admin();
        } else {
            new UltimateImageSlider\Frontend();
        }
    }

    /**
     * Do stuff upon plugin activation
     *
     * @return void
     */
    public function activate() {
        $installer = new UltimateImageSlider\Installer();
        $installer->run();
    }
}

/**
 * Initializes the main plugin
 */
function ultimate_image_slider() {
    return UltimateImageSlider::init();
}

// kick-off the plugin
ultimate_image_slider();
