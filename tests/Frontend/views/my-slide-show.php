<?php if( count($this->sliders['img_id']) ) : ?>
    <div class="modern-slider">
        <?php 
            foreach ($this->sliders['img_id'] as $index => $img_id):
                $img_url_array = wp_get_attachment_image_src($img_id, 'thumbnail');
                $img_url = $img_url_array[0];
        ?>
        <div class="item">
            <div class="img-fill">
                <img src="<?php echo esc_url($img_url); ?>" alt="">
                <div class="info">
                    <div>
                        <h3><?php echo esc_attr($this->sliders['slider_heading'][$index]); ?></h3>
                        <h5><?php echo esc_textarea($this->sliders['slider_desc'][$index]); ?></h5>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>