<div class="section6 best-selling-products">
    <div class="container">
        <div class="best-sell-title">
            <h1>SẢN PHẨM <strong>ĐANG BÁN RẤT CHẠY</strong></h1>
        </div>
        <div class="mobile-best-sell-title hot-product-title">
            <h1>SẢN PHẨM BÁN CHẠY</h1>
        </div>
        <div class="row">
            <?php
            $args = array( 'post_type' => 'product', 'posts_per_page' => 6, 'product_cat' => 'san-pham-ban-chay', 'orderby' => 'rand' );
            $loop = new WP_Query( $args );
            while ( $loop->have_posts() ) : $loop->the_post(); global $product; ?>
                <div class="col-md-4 col-ssmm-6 col-ssm-6 feature-product-wrapp">
                    <h3 class="product-feature-title"><a href="<?php echo get_permalink( $loop->post->ID ) ?>"><?php the_title(); ?></a></h3>
                    <a class="wrapper-link" href="<?php echo get_permalink( $loop->post->ID ) ?>">

                        <span class="img-thumb-wrapper"><?php if (has_post_thumbnail( $loop->post->ID )) echo get_the_post_thumbnail($loop->post->ID, 'post-thumb'); else echo '<img src="'.woocommerce_placeholder_img_src().'" width="300px" height="210px" />'; ?></span>
                        <span class="feature-price-sale"><?php echo wc_price($product->get_sale_price()); ?></span></a>
                    <div class="feature-price-real"><?php echo wc_price($product->get_regular_price()); ?></div>

                </div>
            <?php endwhile; ?>
            <?php wp_reset_query(); ?>
        </div>
    </div>
</div>
