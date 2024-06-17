<?php
    settings_errors();
?>
<div class="uis-settings-wrap">
    <?php do_action('uis_settings_header'); ?>

    <div class="uis-left-right-settings">
        <div class="uis-settings">
            <div class="uis-settings-content">
                <div class="uis-settings-form-wrapper">
                    <form method="post" id="uis-settings-form" action="options.php" novalidate="novalidate">
                        <?php settings_fields($this->_optionGroup); ?>
                        
                        <div class="uis-settings-tab">
                            <div id="uis-settings-general_settings" class="uis-settings-section">
                                <table>
                                    <tbody>
                                        <tr data-id="" id="uis-meta-" class="uis-field uis-meta- type-">
                                            <td class="uis-control">
                                                <img src="http://woocommerce.test/wp-content/uploads/2024/05/white-black-black-and-white-photograph-monochrome-photography.jpg" class="uis-slider-img-preview"  alt="">
                                                <input type="hidden" name="slider-img-id" id="slider-img-id" value="">
                                            </th>
                                            <td class="uis-control">
                                                <div class="uis-control-wrapper">
                                                    <h4><?php echo __('Heading', 'ultimate-image-slider'); ?></h4>
                                                    <input type="text" name="" class="">
                                                </div>
                                            </td>
                                            <td class="uis-control">
                                                <div class="uis-control-wrapper">
                                                    <h4><?php echo __('Description', 'ultimate-image-slider'); ?></h4>
                                                    <textarea name="" class=""></textarea>
                                                </div>
                                            </td>
                                            <td class="uis-control">
                                                <div class="uis-control-wrapper">
                                                    
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <?php do_settings_fields($this->_optionGroup, 'default'); ?>
                        <?php do_settings_sections($this->_optionGroup, 'default'); ?>
                        <?php wp_nonce_field('uis_options_verify', 'uis_nonce'); ?>
                        <?php submit_button('Save', 'btn-settings uis-settings-button'); ?>
                    </form>
                </div>
            </div>

            <?php do_action('uis_settings_footer'); ?>
        </div>
    </div>
</div>