<?php
switch ($product_cat){
    case 'ghe-sofa':
        $sub_categories = array('Sofa khuyến mại'=>'/ghe-sofa-khuyen-mai/',
            'Sofa Bed'=>'/danh-muc/sofa-giuong/',
            'Sofa khuyến mại'=>'/ghe-sofa-khuyen-mai/',
            'Sofa karaoke'=>'/danh-muc/sofa-cafe-karaoke/',
            'Sofa cafe'=>'/danh-muc/ghe-sofa-cafe/',
            'Sofa băng'=>'/danh-muc/sofa-bang/',
            'Sofa góc'=>'/danh-muc/sofa-goc-gia-re/',
            'Sofa phòng khách'=>'/danh-muc/sofa-phong-khach/',
            'Sofa văn phòng'=>'/danh-muc/sofa-van-phong/',
            'Sofa cao cấp'=>'/danh-muc/ghe-sofa-cao-cap/'
            );
        break;
    case 'noi-that':
        $sub_categories = array('Tư vấn mua Sofa'=>'/quy-trinh-tu-van-khach-hang-cua-zsofa-vn/',
            'Thiết kế logo công ty' => '/thiet-ke-logo.html',
            'Thiết kế nội thất chung cư' => 'https://rubeedecor.com/dich-vu/thiet-ke-noi-that-chung-cu.html',
            'Thiết kế nội thất văn phòng' => 'https://rubeedecor.com/dich-vu/thiet-ke-noi-that-van-phong.html',
            'Thiết kế nội thất nhà hàng' => 'https://rubeedecor.com/dich-vu/thiet-ke-noi-that-nha-hang.html'
        );
        break;
    case 'sofa-giuong':
        $sub_categories = array('Sofa giảm giá'=>'/sofa-dang-giam-gia-tai-zsofa-vn/',
            'Ghế sofa làm nail'=>'/ghe-sofa-lam-nail-cao-cap-bao-hanh-1-5-nam/',
            'Cho thuê ghế Sofa'=>'/cho-thue-ghe-sofa/',
            'Bàn ghế sofa giá rẻ'=>'/danh-muc/ghe-sofa-cafe/',
            'Sof mini giá rẻ'=>'/sofa-mini-gia-re-tphcm-tu-zsofa/'
        );
        break;
    case 'ban-sofa':
        $sub_categories = array('Bàn sofa'=>'/danh-muc/ban-sofa/'
        );
        break;
    case 'tham-sofa':
        $sub_categories = array('Thảm sofa'=>'/danh-muc/tham-sofa/'
        );
        break;
}
?>
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
                        <?php
                            foreach ($sub_categories as $name_cat => $cate_link)
                            {
                                echo "<li><a href='$cate_link'>$name_cat</a></li>";
                            }
                        ?>
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