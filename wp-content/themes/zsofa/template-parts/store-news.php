<div class="section8 store-news">
    <div class="container">
        <div class="row">
            <div class="col-ssmm-12 col-ssm-12 col-md-4">
                <h1 class="store-news-title">
                    <a href="">CHUYÊN ĐỀ ZSOFA</a>
                </h1>
                <?php
                $array = array('posts_per_page' => 4,'category' => 1765 ,'orderby'=> 'date');
                $latest_posts = get_posts( $args );
                if ( $latest_posts ) : $post_count = 0;
                foreach ( $latest_posts as $post ) :
                setup_postdata( $post );
                    if($post_count == 0):
                    ?>
                <div class="more-link"><a href="<?php the_permalink(); ?>"><?php echo limit_words($post->post_title,9); ?></a></div>
                <div class="news-content-wr">
                    <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a><p class="news-summary"><?php echo excerpt(30); ?></p>
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
                    <a href="">Kinh nghiệm hay của Zsofa</a>
                </h1>
                <?php
                $array = array('posts_per_page' => 4,'category' => 1766 ,'orderby'=> 'date');
                $latest_posts = get_posts( $args );
                if ( $latest_posts ) : $post_count = 0;
                foreach ( $latest_posts as $post ) :
                setup_postdata( $post );
                if($post_count == 0):
                ?>
                <div class="more-link"><a href="<?php the_permalink(); ?>"><?php echo limit_words($post->post_title,9); ?></a></div>
                <div class="news-content-wr">
                    <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a><p class="news-summary"><?php echo excerpt(30); ?></p>
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
                    <a href="">CHUYÊN ĐỀ NỘI THẤT</a>
                </h1>
                <?php
                $array = array('posts_per_page' => 4,'category' => 1764 ,'orderby'=> 'date');
                $latest_posts = get_posts( $args );
                if ( $latest_posts ) : $post_count = 0;
                foreach ( $latest_posts as $post ) :
                setup_postdata( $post );
                if($post_count == 0):
                ?>
                <div class="more-link"><a href="<?php the_permalink(); ?>"><?php echo limit_words($post->post_title,9); ?></a></div>
                <div class="news-content-wr">
                    <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a><p class="news-summary"><?php echo excerpt(30); ?></p>
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