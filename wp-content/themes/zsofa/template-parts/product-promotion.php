<div class="section5 promotions-reviews clearfix">
    <div class="container">
        <div class="row">
            <div class="col-md-7 promotion-products">
                <h3 class="promotion-title">SẢN PHẨM <strong>KHUYẾN MÃI</strong></h3>
                <div class="row">
                    <?php
                    $args = array( 'post_type' => 'product', 'posts_per_page' => 4, 'product_cat' => 'khuyen-mai', 'orderby' => 'rand' );
                    $loop = new WP_Query( $args );
                    while ( $loop->have_posts() ) : $loop->the_post(); global $product; ?>
                        <div class="col-md-6 col-ssmm-6 col-ssm-6 feature-product-wrapp">
                            <h3 class="product-feature-title"><a href="<?php echo get_permalink( $loop->post->ID ) ?>"><?php the_title(); ?></a></h3>
                            <a class="wrapper-link" href="<?php echo get_permalink( $loop->post->ID ) ?>">

                                <?php if (has_post_thumbnail( $loop->post->ID )) echo get_the_post_thumbnail($loop->post->ID, 'post-thumb'); else echo '<img src="'.woocommerce_placeholder_img_src().'" width="300px" height="210px" />'; ?>
                                <span class="feature-price-sale"><?php echo wc_price($product->get_sale_price()); ?></span></a>
                            <div class="feature-price-real"><?php echo wc_price($product->get_regular_price()); ?></div>

                        </div>
                    <?php endwhile; ?>
                    <?php wp_reset_query(); ?>
                </div>

            </div>
            <div class="col-md-5 customer-reviews">
                <div class="reviews-wrapper">
                    <h3 class="reviews-title">
                        KHÁCH HÀNG <strong>NÓI VỀ Zsofa</strong>
                    </h3>
                    <div class="cus-review-slide">
                        <div class="customer-reviews-slider flexslider">
                            <ul class="slides">
                                <li>
                                    <img src="<?php echo get_template_directory_uri() ; ?>/assets/images/2018-06-10_19-59-25.png" />
                                </li>
                                <li>
                                    <img src="<?php echo get_template_directory_uri() ; ?>/assets/images/2018-06-10_19-59-25.png" />
                                </li>
                                <li>
                                    <img src="<?php echo get_template_directory_uri() ; ?>/assets/images/2018-06-10_19-59-25.png" />
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
