<div class="featured-category <?php echo $category_class?>">
    <div class="container">
        <div class="category-title-pr">
            <div class="row">
                <div class="col-md-3 col-ssmm-12 col-ssm-12">
                    <div class="category-title">
                        <a href=""><?php echo  $category_name ;?></a>
                    </div>
                    <div class="mobile-best-sell-title hot-product-title">
                        <h1><a href=""><?php echo  $category_name ;?></a></h1>
                    </div>
                </div>
                <div class="col-md-9">
                    <ul class="sub-categories float-right">
                        <li><a href="">Sofa nỉ</a></li>
                        <li><a href="">Sofa da</a></li>
                        <li><a href="">Sofa vải</a></li>
                        <li><a href="">Sofa góc</a></li>
                        <li><a href="">Sofa hà nội</a></li>
                        <li><a href="">Sofa cổ điển</a></li>
                        <li><a href="">Sofa gia đình</a></li>
                        <li><a href="">Sofa hàn quốc</a></li>
                        <li><a href="">Sofa phòng khách</a></li>
                        <li><a href="">Sofa đẹp</a></li>
                    </ul>
                </div>
            </div>

        </div>
        <div class="row list-products">
            <?php
            $args = array( 'post_type' => $post_type, 'posts_per_page' => $posts_per_page, 'product_cat' => $product_cat, 'orderby' => $orderby );
            $loop = new WP_Query( $args );
            while ( $loop->have_posts() ) : $loop->the_post(); global $product; ?>
                <div class="col-md-3 col-ssmm-6 col-ssm-6">
                    <div class="product-wrapper">
                        <a class="product-image image_blur" href="<?php echo get_permalink( $loop->post->ID ) ?>">

                            <span class="img-thumb-wrapper"><?php if (has_post_thumbnail( $loop->post->ID )) echo get_the_post_thumbnail($loop->post->ID, 'post-thumb'); else echo '<img src="'.woocommerce_placeholder_img_src().'" width="300px" height="210px" />'; ?></span>
                        </a>
                    </div>
                    <h3 class="product-title-info"><a href="<?php echo get_permalink( $loop->post->ID ) ?>" class="product-link"><?php the_title(); ?></a></h3>
                    <div class="product-price">
                        <span class="tit-price">Giá: </span><span class="value-price"><?php echo $product->get_price_html(); ?></span>
                    </div>

                </div>
            <?php endwhile; ?>
            <?php wp_reset_query(); ?>
        </div>

    </div>
</div>