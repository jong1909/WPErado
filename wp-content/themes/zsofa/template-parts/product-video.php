<div class="section3 real-videos">
    <div class="container">
        <h1>Sản phẩm <strong>video thực tế</strong></h1>
        <div class="row videos-content">
            <div class="col-md-6">
                <div class="videos-main-product">
                    <?php
                    $args = array( 'post_type' => 'product', 'posts_per_page' => 1, 'product_cat' => 'video-product', 'orderby' => 'none' );
                    $loop = new WP_Query( $args );
                    while ( $loop->have_posts() ) : $loop->the_post(); global $product; ?>
                        <?php if(get_field_details('main_video') == '1'): ?>
                            <a class="img-wrapper" href="<?php echo get_permalink( $loop->post->ID ) ?>"><?php if (has_post_thumbnail( $loop->post->ID )) echo get_the_post_thumbnail($loop->post->ID, 'post-thumb-wide'); else echo '<img src="'.woocommerce_placeholder_img_src().'" width="600px" height="400px" />'; ?></a>
                            <a href="javascript:;" class="view-more">Xem video</a>
                            <div class="video-product-title"><a href="<?php echo get_permalink( $loop->post->ID ) ?>"><?php the_title(); ?></a></div>
                            <div class="video-product-price"><?php echo wc_price($product->get_regular_price()); ?></div>
                            <div class="views">5 lượt xem</div>
                            <div class="product-video-link"><?php echo get_field_details('video_san_pham')?></div>
                        <?php endif ?>
                    <?php endwhile; ?>
                    <?php wp_reset_query(); ?>
                </div>
            </div>
            <div class="col-md-6">
                <div class="row">
                    <?php
                    $args = array( 'post_type' => 'product', 'posts_per_page' => 6, 'product_cat' => 'video-product', 'orderby' => 'rand' );
                    $loop = new WP_Query( $args );
                    while ( $loop->have_posts() ) : $loop->the_post(); global $product; ?>
                        <?php if(get_field_details('main_video') == ''): ?>
                            <div class="col-md-6 col-ssmm-6 col-ssm-6">
                                <div class="videos-sub-product">
                                    <a class="img-wrapper" href="<?php echo get_permalink( $loop->post->ID ) ?>"><span class="img-thumb-wrapper"><?php if (has_post_thumbnail( $loop->post->ID )) echo get_the_post_thumbnail($loop->post->ID, 'post-thumb'); else echo '<img src="'.woocommerce_placeholder_img_src().'" width="300px" height="210px" />'; ?></span>
                                        <a href="javascript:;" class="view-more">Xem video</a>
                                    </a>
                                    <div class="video-product-title"><a href="<?php echo get_permalink( $loop->post->ID ) ?>"><?php the_title(); ?></a></div>
                                    <div class="video-product-price"><?php echo wc_price($product->get_regular_price()); ?></div>
                                    <div class="views">5 lượt xem</div>
                                    <div class="product-video-link"><?php echo get_field_details('video_san_pham')?></div>
                                </div>
                            </div>
                        <?php endif ?>
                    <?php endwhile; ?>
                    <?php wp_reset_query(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
