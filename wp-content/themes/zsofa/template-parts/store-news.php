<?php
$category_ids = array(1764,1765,1766);
?>
<div class="section8 store-news">
    <div class="container">
        <div class="row">
            <div class="col-ssmm-12 col-ssm-12 col-md-4">
                <h1 class="store-news-title">
                    <a href="<?php echo esc_url( get_category_link( $category_ids[1] )); ?>"><?php echo get_cat_name( $category_ids[1] );?></a>
                </h1>
                <?php
                $array = array('posts_per_page' => 4,'category_name' => 'chuyen-de-zsofa' ,'orderby'=> 'date');
                $latest_posts = get_posts( $array );
                if ( $latest_posts ) : $post_count = 0;
                foreach ( $latest_posts as $post ) :
                setup_postdata( $post );
                    if($post_count == 0):
                    ?>
                <div class="more-link"><a href="<?php the_permalink(); ?>"><?php echo limit_words($post->post_title,9); ?></a></div>
                <div class="news-content-wr">
                    <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a><p class="news-summary"><?php echo excerpt(28); ?></p>
                </div>
                <div class="other-news">
                    <h5 class="other-news-title">Các tin khác</h5>
                    <ul>
                    <?php else: ?>
                        <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
                        <?php
                    endif;
                    $post_count++;
                    endforeach;
                    wp_reset_postdata();
                    endif;
                    ?>
                    </ul>
                </div>
            </div>
            <div class="col-ssmm-12 col-ssm-12 col-md-4">
                <h1 class="store-news-title">
                    <a href="<?php echo esc_url( get_category_link( $category_ids[2] )); ?>"><?php echo get_cat_name( $category_ids[2] );?></a>
                </h1>
                <?php
                $array = array('posts_per_page' => 4,'category_name' => 'kinh-nghiem-hay-cua-zsofa' ,'orderby'=> 'date');
                $latest_posts = get_posts( $array );
                if ( $latest_posts ) : $post_count = 0;
                foreach ( $latest_posts as $post ) :
                setup_postdata( $post );
                if($post_count == 0):
                ?>
                <div class="more-link"><a href="<?php the_permalink(); ?>"><?php echo limit_words($post->post_title,9); ?></a></div>
                <div class="news-content-wr">
                    <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a><p class="news-summary"><?php echo excerpt(28); ?></p>
                </div>
                <div class="other-news">
                    <h5 class="other-news-title">Các tin khác</h5>
                    <ul>
                        <?php else: ?>
                            <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
                        <?php
                        endif;
                        $post_count++;
                        endforeach;
                        wp_reset_postdata();
                        endif;
                        ?>
                    </ul>
                </div>
            </div>
            <div class="col-ssmm-12 col-ssm-12 col-md-4">
                <h1 class="store-news-title">
                    <a href="<?php echo esc_url( get_category_link( $category_ids[0] )); ?>"><?php echo get_cat_name( $category_ids[0] );?></a>
                </h1>
                <?php
                $array = array('posts_per_page' => 4,'category_name' => 'chuyen-de-noi-that' ,'orderby'=> 'date');
                $latest_posts = get_posts( $array );
                if ( $latest_posts ) : $post_count = 0;
                foreach ( $latest_posts as $post ) :
                setup_postdata( $post );
                if($post_count == 0):
                ?>
                <div class="more-link"><a href="<?php the_permalink(); ?>"><?php echo limit_words($post->post_title,9); ?></a></div>
                <div class="news-content-wr">
                    <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a><p class="news-summary"><?php echo excerpt(28); ?></p>
                </div>
                <div class="other-news">
                    <h5 class="other-news-title">Các tin khác</h5>
                    <ul>
                        <?php else: ?>
                            <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
                        <?php
                        endif;
                        $post_count++;
                        endforeach;
                        wp_reset_postdata();
                        endif;
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>