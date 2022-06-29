<section class="productsSection">
    <div class="container">
        <div class="productsSection_content">
            <div class="products-slider">

                <!-- <div class="products-slider_img"> -->
                        <?php 
                        $rows = get_field('book_sources_products', $page_id);
                        if( $rows ) {
                        foreach( $rows as $row ) {
                        ?>
                        <div><?php
                            $image = $row['products_slider-img'];
                            ?>
                            <div class="products-slider_content">
                                <div class="products-slider_content-block">
                                    <p class="products-slider_content-block-nametxt"><?php echo $row['products_slider-name']; ?></p>
                                    <p class="products-slider_content-block-price">$<?php echo $row['products_slider-price']; ?></p>
                                    <p class="products-slider_content-block-desc"><?php echo $row['products_slider-desc']; ?></p>
                                    <button class="products-slider_content-block-button"><?php echo $row['products_slider-button']; ?></button>
                                </div>
                            </div>
                            <?php 
                                if($image){ $picture = $image['sizes']['large']; ?> 
                                <img class="products-slider_img" src="<?php echo $picture ?>" alt="<?php echo $image['alt']; ?>">
                        <?php }?>
                        </div>
                        <?php } ?>
                        <?php }
                        ?>  
                </div>
                

            <!-- </div> -->
        </div>
    </div>
</section>

