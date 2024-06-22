<?php if( isset($this->sliders['img_id']) && is_array($this->sliders['img_id']) && count($this->sliders['img_id']) > 0 ) : ?>
    <div class="modern-slider">
        <?php foreach ($this->sliders['img_id'] as $index => $img_id):
            $img_url_array = wp_get_attachment_image_src($img_id, 'thumbnail');
            
            // Check if $img_url_array is valid
            if ($img_url_array && is_array($img_url_array)) {
                $img_url = $img_url_array[0];
        ?>
        <div class="item">
            <div class="img-fill">
                <img src="<?php echo esc_url($img_url); ?>" alt="">
                <div class="info">
                    <div>
                        <?php if (isset($this->sliders['slider_heading'][$index])) : ?>
                            <h3><?php echo esc_attr($this->sliders['slider_heading'][$index]); ?></h3>
                        <?php endif; ?>
                        <?php if (isset($this->sliders['slider_desc'][$index])) : ?>
                            <h5><?php echo esc_textarea($this->sliders['slider_desc'][$index]); ?></h5>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <?php 
            } // end if $img_url_array is valid
        endforeach; ?>
    </div>
<?php endif; ?>
