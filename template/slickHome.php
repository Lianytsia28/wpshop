<section class="accordion">
                <div class="container">
                    <section class="accordion-tabs">
                        <button class="accordion-tab accordion-active" data-actab-group="0" data-actab-id="0">WHAT'S HOT?</button>
                        <button class="accordion-tab" data-actab-group="0" data-actab-id="1">DESIGNERS</button>
                        <button class="accordion-tab" data-actab-group="0" data-actab-id="2">FEATURED</button>
                        <button class="accordion-tab" data-actab-group="0" data-actab-id="3">LATEST</button>
                    </section>
                </div>
                    <section class="accordion-content">
                    <article class="accordion-item accordion-active" data-actab-group="0" data-actab-id="0">
                    <h4 class="accordion-item__label">WHAT'S HOT?</h4>
                        <div class="accordion-item__container">
                            <div class="slider-2">
                                <?php
                                $args = array(
                                    // Использование аргумента tax_query для установки параметров терминов таксономии
                                    'tax_query' => array(
                                    // Использование нескольких таксономий требует параметр relation
                                    'relation' => 'AND', // значение AND для выборки товаров принадлежащим одновременно ко всем указанным терминам
                                    // массив для категории имеющей слаг slug-category-1
                                    array(
                                    'taxonomy' => 'product_cat',
                                    'field' => 'slug',
                                    'terms' => 'women'
                                    ),
                                ),
                                // Параметры отображения выведенных товаров
                                'posts_per_page' => 12, // количество выводимых товаров
                                'post_type' => 'product', // тип товара
                                'orderby' => 'date', // сортировка
                                );

                                $loop = new WP_Query( $args );
                                while ( $loop->have_posts() ) : $loop->the_post();
                                global $product;
                                ?>
                                <div>
                                    <div class="container-caruosel">
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
                                        <div class="text-center"><?php woocommerce_template_loop_add_to_cart( $loop->post, $product ); ?></div>
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
	                            <?php wp_reset_query(); ?>
                        </div>
                    </div>
                </article>
                <article class="accordion-item" data-actab-group="0" data-actab-id="1">
                    <h4 class="accordion-item__label">DESIGNERS</h4>
                    <div class="accordion-item__container">
                        <div class="slider-2">
                            <?php
                                $args = array(
                                    'tax_query' => array(
                                    // Использование нескольких таксономий требует параметр relation
                                    'relation' => 'AND', // значение AND для выборки товаров принадлежащим одновременно ко всем указанным терминам
                                    // массив для категории имеющей слаг slug-category-1
                                    array(
                                    'taxonomy' => 'product_cat',
                                    'field' => 'slug',
                                    'terms' => 'women'
                                    ),
                                ),
                                // Параметры отображения выведенных товаров
                                'posts_per_page' => 12, // количество выводимых товаров
                                'post_type' => 'product', // тип товара
                                'orderby' => 'rating', // сортировка
                                );

                                $loop = new WP_Query( $args );
                                while ( $loop->have_posts() ) : $loop->the_post();
                                global $product;
                            ?>
                            <div>
                                <div class="container-caruosel">
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
                                <div class="text-center"><?php woocommerce_template_loop_add_to_cart( $loop->post, $product ); ?></div>
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
	                        <?php wp_reset_query(); ?>
                        </div>
                    </div>
                </article>
                <article class="accordion-item" data-actab-group="0" data-actab-id="2">
                    <h4 class="accordion-item__label">FEATURED</h4>
                    <div class="accordion-item__container">
                    <div class="slider-2">
                        <?php
                            $args = array(
                                'tax_query' => array(
                                // Использование нескольких таксономий требует параметр relation
                                'relation' => 'AND', // значение AND для выборки товаров принадлежащим одновременно ко всем указанным терминам
                                // массив для категории имеющей слаг slug-category-1
                                array(
                                'taxonomy' => 'product_cat',
                                'field' => 'slug',
                                'terms' => 'women'
                                ),
                            ),
                            // Параметры отображения выведенных товаров
                            'posts_per_page' => 12, // количество выводимых товаров
                            'post_type' => 'product', // тип товара
                            'orderby' => 'price-desc', // сортировка
                            );

                            $loop = new WP_Query( $args );
                            while ( $loop->have_posts() ) : $loop->the_post();
                            global $product;
                        ?>

                        <div>
                            <div class="container-caruosel">
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
                                <div class="text-center"><?php woocommerce_template_loop_add_to_cart( $loop->post, $product ); ?></div>
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
	                        <?php wp_reset_query(); ?>
                        </div>
                    </div>
                </article>
                <article class="accordion-item" data-actab-group="0" data-actab-id="3">
                    <h4 class="accordion-item__label">LATEST</h4>
                    <div class="accordion-item__container">
                    <div class="slider-2">
                        <?php
                            $args = array(
                                // Использование аргумента tax_query для установки параметров терминов таксономии
                                'tax_query' => array(
                                // Использование нескольких таксономий требует параметр relation
                                'relation' => 'AND', // значение AND для выборки товаров принадлежащим одновременно ко всем указанным терминам
                                // массив для категории имеющей слаг slug-category-1
                                array(
                                'taxonomy' => 'product_cat',
                                'field' => 'slug',
                                'terms' => 'women'
                                ),
                            ),
                            // Параметры отображения выведенных товаров
                            'posts_per_page' => 12, // количество выводимых товаров
                            'post_type' => 'product', // тип товара
                            'orderby' => 'title', // сортировка
                            );

                            $loop = new WP_Query( $args );
                            while ( $loop->have_posts() ) : $loop->the_post();
                            global $product;
                        ?>
                        <div>
                            <div class="container-caruosel">
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
                                    <div class="text-center"><?php woocommerce_template_loop_add_to_cart( $loop->post, $product ); ?></div>
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
	                        <?php wp_reset_query(); ?>
                        </div>
                    </div>
                </article>
                    
                </section>
            </section>