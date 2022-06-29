    <section class="clearance">
        <div class="container">
                    <div class="clearance_content">
                        <div class="clearance_content-block"></div>
                            <?php 
                                $image = get_field('clearanceimg', $page_id);
                                if( !empty( $image ) ): ?>
                                <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                            <?php endif; ?>
                        <div class="clearance_content-block"></div>
                    </div>
                </div>
                <div class="container">
                    <div class="clearance_content_goods">
                        <?php
	                        $args = array(
		                    'tax_query' => array(
		                    'relation' => 'AND', // значение AND для выборки товаров принадлежащим одновременно ко всем указанным терминам
		                    // массив для категории имеющей слаг slug-category-1
		                    array(
		                    'taxonomy' => 'product_cat',
		                    'field' => 'slug',
		                    'terms' => 'women'
		                    ),
	                        ),
	                        // Параметры отображения выведенных товаров
	                        'posts_per_page' => 4, // количество выводимых товаров
	                        'post_type' => 'product', // тип товара
	                        'orderby' => 'title', // сортировка
                            );
                            $loop = new WP_Query( $args );
                            while ( $loop->have_posts() ) : $loop->the_post();
                            global $product;
                        ?>
                <div class="clearance_content_goods-block">
                    <a href="<?php echo get_permalink( $loop->post->ID ) ?>">
                        <?php woocommerce_show_product_sale_flash( $post, $product ); ?>
                        <?php
                            if (has_post_thumbnail( $loop->post->ID )) echo get_the_post_thumbnail($loop->post->ID, 'shop_catalog');
                            else echo '<img src="'.woocommerce_placeholder_img_src().'" alt="Placeholder" width="250px" height="250px" />';
                        ?>
                    </a>
                    <div>
                    <h3 class="product-title"><?php the_title(); ?></h3>
                    <div class="product-price"><?php echo $product->get_price_html(); ?></div>
                    <div class="text-center"><?php woocommerce_template_loop_add_to_cart( $loop->post, $product ); ?>
                    </div>
                    <div class="container-caruosel__hover">
                    <?php 
                        $image = get_field('hover', $page_id);
                        if( !empty( $image ) ): ?>
                        <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                    <?php endif; ?>
                    </div>
                    </div>
            </div>
        
	    <?php endwhile; ?>
        </div>
    </div>
	<?php wp_reset_query(); ?>
  
                <div class="sponsor">
                    <div class="sponsor_line-f"></div>
                    <a>FAVORITE BRANDS</a>
                    <div class="sponsor_line-f"></div>
                </div>
                <div class="sponsor_icons">
                    <div class="container">
                        <div class="sponsor_icons_block">
                            <div class="sponsor_icons_block-content">
                                <?php 
                                    $image = get_field('layer-21', $page_id);
                                    if( !empty( $image ) ): ?>
                                    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                                <?php endif; ?>
                            </div>
                            <div class="sponsor_icons_block-content">
                                <?php 
                                    $image = get_field('layer-22', $page_id);
                                    if( !empty( $image ) ): ?>
                                    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                                <?php endif; ?>
                            </div>
                            <div class="sponsor_icons_block-content">
                                <?php 
                                    $image = get_field('layer-23', $page_id);
                                    if( !empty( $image ) ): ?>
                                    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                                <?php endif; ?>
                            </div>
                            <div class="sponsor_icons_block-content">
                                <?php 
                                    $image = get_field('layer-24', $page_id);
                                    if( !empty( $image ) ): ?>
                                    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                                <?php endif; ?>
                            </div>
                            <div class="sponsor_icons_block-content">
                                <?php 
                                    $image = get_field('layer-25', $page_id);
                                    if( !empty( $image ) ): ?>
                                    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                                <?php endif; ?>
                            </div>
                            <div class="sponsor_icons_block-content">
                                <?php 
                                    $image = get_field('layer-26', $page_id);
                                    if( !empty( $image ) ): ?>
                                    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                                <?php endif; ?>
                            </div>
                            <div class="sponsor_icons_block-content">
                                <?php 
                                    $image = get_field('layer-27', $page_id);
                                    if( !empty( $image ) ): ?>
                                    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                                <?php endif; ?>
                            </div>
                            <div class="sponsor_icons_block-content">
                                <?php 
                                    $image = get_field('layer-28', $page_id);
                                    if( !empty( $image ) ): ?>
                                    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="sponsor_line-bottom"></div>
                <div class="container">
                    <div class="sponsor_txt">
                        <p class="sponsor_txt-max">About LookShop</p>
                        <p class="sponsor_txt-min">This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a ornare odio. Sed non  mauris vitae erat consequat auctor eu in elit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Mauris in erat justo. Nullam ac urna eu felis dapibus condimentum sit amet a augue. </p>
                    </div>
                </div>
    </section>