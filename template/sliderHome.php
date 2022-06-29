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