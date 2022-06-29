<section class="first">
                <div class="container">
                    <div class="first_contact">
                        <div class="first_contact-form">
                            <p><?php the_field('home_contact_text'); ?><p>
                            <div><?php the_field('home_contact_form'); ?></div>
                            <button><?php the_field('home_contact_button'); ?></button>
                        </div>
                        <div class="first_contact-social">
                            <p><?php the_field('home_social-text'); ?><p>
                            <?php 
                                $image = get_field('home_social-img1');
                                if( !empty( $image ) ): ?>
                                <div><img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" /></div>
                            <?php endif; ?>
                            <?php 
                                $image = get_field('home_social-img2');
                                if( !empty( $image ) ): ?>
                                <div><img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" /></div>
                            <?php endif; ?>
                            <?php 
                                $image = get_field('home_social-img3');
                                if( !empty( $image ) ): ?>
                                <div><img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" /></div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </section>
            <section class="advertising">
                <div class="container">
                    <div class="advertising_elem">
                        <div class="advertising_elem_left">
                            <?php 
                                $image = get_field('advertising_img-1');
                                if( !empty( $image ) ): ?>
                                <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                            <?php endif; ?>
                        </div>
                        <div class="advertising_elem_right">
                            <div class="advertising_elem_right-top">
                                <?php 
                                    $image = get_field('advertising_img-2');
                                    if( !empty( $image ) ): ?>
                                    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                                <?php endif; ?>
                            </div>
                            <div class="advertising_elem_right-bottom">
                                <div class="advertising_elem_right-bottom-l">
                                    <?php 
                                        $image = get_field('advertising_img-3');
                                        if( !empty( $image ) ): ?>
                                        <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                                    <?php endif; ?>
                                </div> 
                                <div class="advertising_elem_right-bottom-l">
                                    <?php 
                                        $image = get_field('advertising_img-4');
                                        if( !empty( $image ) ): ?>
                                        <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>