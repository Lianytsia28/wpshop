    <?php get_header() ?>
    <?php
        /* Template Name: home */ 
    ?>
        <section class="sliderShop">
            <?php 
                $rows = get_field('book_sources');
                if( $rows ) {
                foreach( $rows as $row ) {
            ?><div><?php
                    $image = $row['slide_image'];
                    ?>
                    <div class="sliderShop__content">
                        <div class="sliderShop__content__name">
                            <div class="sliderShop__content__name__line"></div>
                            <div class="sliderShop__content__name__text">
                                <p><?php echo $row['slide_name']; ?></p>
                            </div>
                            <div class="sliderShop__content__name__line"></div>
                        </div>
                        <?php 
                                $title = $row['book_src_title'];
                                if($title){ ?>
                            <p class="sliderShop__content__name__text2"><?php echo  $title; 
                            ?>
                            </p>
                            <div class="sliderShop__content__name__line2"></div>
                            <div class="sliderShop__content__name__line3"></div>
                            <?php } ?>
                            <p class="sliderShop__content__name__text3"><?php echo $row['book_src_description']; ?><p>
                            <a href="http://wp-shop/shop/"><p class="sliderShop__content__name__button"><button><?php echo $row['button_s']; ?></button></p></a>
                    </div>
                    <?php 
                        if($image){ $picture = $image['sizes']['large']; ?> 
                        <img class="sliderShop__img" src="<?php echo $picture ?>" alt="<?php echo $image['alt']; ?>">
                <?php }?>
                </div>
                <?php } ?>
                <?php }
                ?>          
        </section>
            <section class="home_content">
                <div class="container">
                    <div class="home_content_contact">
                        <div class="home_content_contact-form">
                            <p><?php the_field('home_contact_text'); ?><p>
                            <div><?php the_field('home_contact_form'); ?></div>
                            <button><?php the_field('home_contact_button'); ?></button>
                        </div>
                        <div class="home_content_contact-social">
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
                    <div class="advertising_block">
                        <div class="advertising_block_left">
                            <?php 
                                $image = get_field('advertising_img-1');
                                if( !empty( $image ) ): ?>
                                <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                            <?php endif; ?>
                        </div>
                        <div class="advertising_block_right">
                            <div class="advertising_block_right-top">
                                <?php 
                                    $image = get_field('advertising_img-2');
                                    if( !empty( $image ) ): ?>
                                    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                                <?php endif; ?>
                            </div>
                            <div class="advertising_block_right-bottom">
                                <div class="advertising_block_right-bottom-l">
                                    <?php 
                                        $image = get_field('advertising_img-3');
                                        if( !empty( $image ) ): ?>
                                        <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                                    <?php endif; ?>
                                </div> 
                                <div class="advertising_block_right-bottom-l">
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
            
<!-- <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script> -->
  <!-- <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script> -->
	<script type="text/javascript" src="https://kenwheeler.github.io/slick/slick/slick.js"></script>
        <script type="text/javascript">jssor_1_slider_init();</script>
        <script type="text/javascript">
    


            const labels = document.querySelectorAll(".accordion-item__label");
const tabs = document.querySelectorAll(".accordion-tab");

function toggleShow() {
	const target = this;
	const item = target.classList.contains("accordion-tab")
		? target
		: target.parentElement;
	const group = item.dataset.actabGroup;
	const id = item.dataset.actabId;

	tabs.forEach(function(tab) {
		if (tab.dataset.actabGroup === group) {
			if (tab.dataset.actabId === id) {
				tab.classList.add("accordion-active");
			} else {
				tab.classList.remove("accordion-active");
			}
		}
	});

	labels.forEach(function(label) {
		const tabItem = label.parentElement;

		if (tabItem.dataset.actabGroup === group) {
			if (tabItem.dataset.actabId === id) {
				tabItem.classList.add("accordion-active");
			} else {
				tabItem.classList.remove("accordion-active");
			}
		}
	});
}

labels.forEach(function(label) {
	label.addEventListener("click", toggleShow);
});

tabs.forEach(function(tab) {
	tab.addEventListener("click", toggleShow);
});
        </script>
    <?php get_footer() ?>
    