<?php
namespace UltimateImageSlider\Admin;

/**
 * Initiate plugin action links
 *
 * @since    1.0.0
 */
class PluginMeta {

    /**
     * Load plugin meta actions
     * 
     * @since 1.0.0
     * @access public
     */
    public function __construct() {
        add_filter( 'plugin_action_links_' . ULTIMATE_IMAGE_SLIDER_BASENAME, array( $this, 'plugin_action_links' ) );
        add_filter( 'plugin_row_meta', array( $this, 'plugin_meta_links' ), 10, 2 );
    }

    /**
     * Create plugin action links
     *
     * @since   1.0.0
     * @access  public
     * @param   array
     * @return  array
     */
    public function plugin_action_links( $links ) {
        $links[] = '<a href="' . admin_url( 'admin.php?page=ultimate-image-slider#general_settings' ) . '">' . __( 'Settings', 'ultimate-image-slider' ) . '</a>';
        return $links;
    }

    /**
     * Create plugin meta links
     *
     * @since   1.0.0
     * @access  public
     * @param   array
     * @param   string
     * @return  array
     */
    public function plugin_meta_links( $links, $file ) {
        if ( $file !== plugin_basename( ULTIMATE_IMAGE_SLIDER_FILE ) ) {
            return $links;
        }

        $support_link = '<a target="_blank" href="https://github.com/beyond88/ultimate-image-slider/issues" title="' . __('Get help', 'ultimate-image-slider') . '">' . __('Support', 'ultimate-image-slider') . '</a>';
        $home_link = '<a target="_blank" href="https://github.com/beyond88/ultimate-image-slider" title="' . __('Plugin Homepage', 'ultimate-image-slider') . '">' . __('Plugin Homepage', 'ultimate-image-slider') . '</a>';

        $links[] = $support_link;
        $links[] = $home_link;

        return $links;
    }
}
