<?php
/**
 * zsofa engine room
 *
 * @package zsofa
 */

/**
 * Assign the zsofa version to a var
 */
$theme              = wp_get_theme( 'zsofa' );
$zsofa_version = $theme['Version'];
/*
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 980; /* pixels */
}

$zsofa = (object) array(
	'version' => $zsofa_version,

	/**
	 * Initialize all the things.
	 */
	'main'       => require 'inc/class-zsofa.php',
	'customizer' => require 'inc/customizer/class-zsofa-customizer.php',
);

require 'inc/zsofa-functions.php';
require 'inc/zsofa-template-hooks.php';
require 'inc/zsofa-template-functions.php';

if ( class_exists( 'Jetpack' ) ) {
	$zsofa->jetpack = require 'inc/jetpack/class-zsofa-jetpack.php';
}

if ( zsofa_is_woocommerce_activated() ) {
	$zsofa->woocommerce = require 'inc/woocommerce/class-zsofa-woocommerce.php';

	require 'inc/woocommerce/zsofa-woocommerce-template-hooks.php';
	require 'inc/woocommerce/zsofa-woocommerce-template-functions.php';
}

if ( is_admin() ) {
	$zsofa->admin = require 'inc/admin/class-zsofa-admin.php';

	require 'inc/admin/class-zsofa-plugin-install.php';
}

/**
 * NUX
 * Only load if wp version is 4.7.3 or above because of this issue;
 * https://core.trac.wordpress.org/ticket/39610?cversion=1&cnum_hist=2
 */
if ( version_compare( get_bloginfo( 'version' ), '4.7.3', '>=' ) && ( is_admin() || is_customize_preview() ) ) {
	require 'inc/nux/class-zsofa-nux-admin.php';
	require 'inc/nux/class-zsofa-nux-guided-tour.php';

	if ( defined( 'WC_VERSION' ) && version_compare( WC_VERSION, '3.0.0', '>=' ) ) {
		require 'inc/nux/class-zsofa-nux-starter-content.php';
	}
}

/**
 * Note: Do not add any custom code here. Please use a custom plugin so that your customizations aren't lost during updates.
 * https://github.com/woocommerce/theme-customisations
 */
add_action( 'after_setup_theme', 'wpdocs_theme_setup' );
function wpdocs_theme_setup() {
    add_image_size( 'post-thumb', 300, 210, array( 'center', 'center' ) );

}
function wpdocs_setup_theme_thumb() {
    add_theme_support( 'post-thumbnails' );
    set_post_thumbnail_size( 420, 280,array( 'center', 'center')  );
}
add_action( 'after_setup_theme', 'wpdocs_setup_theme_thumb' );

function wpdocs_theme_thumb_wide() {
    add_image_size( 'post-thumb-wide', 600, 400, array( 'center', 'center' ) );

}
add_action( 'after_setup_theme', 'wpdocs_theme_thumb_wide' );

function new_excerpt_more( $excerpt ) {
    return preg_replace('`\[[^\]]*\]`','...',$excerpt);
}
// function to limit excerpt;
function excerpt($limit) {
    $excerpt = explode(' ', get_the_excerpt(), $limit);
    if (count($excerpt)>=$limit) {
        array_pop($excerpt);
        $excerpt = implode(" ",$excerpt).'...';
    } else {
        $excerpt = implode(" ",$excerpt);
    }
    $excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
    return $excerpt;
}
// function to limit content;
function content($post_content,$limit) {
    $content = explode(' ', $post_content , $limit);
    if (count($content)>=$limit) {
        array_pop($content);
        $content = implode(" ",$content).'...';
    } else {
        $content = implode(" ",$content);
    }
    $content = preg_replace('`<[^>]*>`','',$content);
    $content = preg_replace('/\[.+\]/','', $content);
    $content = apply_filters('the_content', $content);
    $content = str_replace(']]>', ']]&gt;', $content);
    return $content;
}
// function to show short title;
function limit_words($string, $word_limit){
    $words = explode(" ",$string);
    return implode(" ",array_splice($words,0,$word_limit));
}
function call_template_path($post_type,$category_name, $posts_per_page, $product_cat,$orderby,$category_class){
    include( locate_template( 'template-parts/product-list.php', false, false ) );
}
//ajax pagination
function zsofa_pagination_ajax($custom_query = null, $paged = 1) {
    global $wp_query, $wp_rewrite;
    if($custom_query) $main_query = $custom_query;
    else $main_query = $wp_query;
    $big = 999999999;
    $total = isset($main_query->max_num_pages)?$main_query->max_num_pages:'';
    if($total > 1) echo '<div class="paginate_links clearfix">';
    echo paginate_links( array(
        'base' 		=> trailingslashit( home_url() ) . "{$wp_rewrite->pagination_base}/%#%/",
        'format' 	=> '?paged=%#%',
        'current' 	=> max( 1, $paged ),
        'total' 	=> $total,
        'mid_size'	=> '5',
        'prev_text'    => __('Trước','zsofavn'),
        'next_text'    => __('Tiếp','zsofavn'),
    ) );
    if($total > 1) echo '</div>';
}
//Ajax load post
add_action( 'wp_ajax_ajax_load_post', 'ajax_load_post_func' );
add_action( 'wp_ajax_nopriv_ajax_load_post', 'ajax_load_post_func' );
function ajax_load_post_func() {
    if ( !wp_verify_nonce( $_REQUEST['nonce'], "ajax_load_post_nonce")) {
        wp_send_json_error('None?');
    }
    $category = isset($_POST['categories'])?json_decode($_POST['categories']): 1;
    $paged = isset($_POST['ajax_paged'])?intval($_POST['ajax_paged']):'';
    if($paged <= 0 || !$paged || !is_numeric($paged)) wp_send_json_error('Paged?');
    $news = new WP_Query(array(
        'post_type'         =>  'post',
        'posts_per_page'    =>  9,
        'post_status'           => 'publish',
        'paged'             =>  $paged,
        'category__in' => $category,
        'orderby' => 'date'
    ));
    if($news->have_posts()):
        ob_start();
        $max_post_count = $news->post_count;
        ?>
        <div class="home_news_wrap">
        <?php $stt = 1; while ($news->have_posts()):$news->the_post();?>
        <?php if($stt == 1):?><div class="zsofa_news_col1"><?php endif;?>
        <?php if($stt == 2):?><div class="zsofa_news_col2"><?php endif;?>
        <div class="col-md-4 col-ssmm-6 col-ssm-6">
            <div class="news-item-wr">
                <?php if(has_post_thumbnail()):?>
                    <a href="<?php the_permalink() ?>"><?php echo get_the_post_thumbnail( null, 'post-thumb' );?></a>
                    <?php else :?>
                    <?php
                    $html = '<div class="news-image-placeholder">';
                        $html .= sprintf('<img src="%s" alt="%s" class="wp-post-image" />', esc_url(wc_placeholder_img_src()), esc_html__('Awaiting product image', 'woocommerce'));
                        $html .= '</div>';

                    echo apply_filters('woocommerce_single_product_image_thumbnail_html', $html, $post_thumbnail_id);
                    ?>
                <?php endif;?>
                <a href="<?php the_permalink() ?>" class="news-title"><?php the_title(); ?></a>
                <span class="line-separator">&nbsp;</span>
                <div class="short-description"><?php the_excerpt();?></div>
                <a href="<?php the_permalink() ?>" class="news-view-more">Xem chi tiết</a>
            </div>
        </div>
        <?php if($stt == 1 || $stt == $max_post_count):?></div><?php endif;?>
        <?php $stt++; endwhile; wp_reset_query();?>
        </div>
        <?php zsofa_pagination_ajax($news,$paged);?>
        <?php $content = ob_get_clean();?>
    <?php else:?>
        <?php wp_send_json_error('No post?');?>
    <?php endif; //End news
    wp_send_json_success($content);
    die();
}
//Ajax load post
add_action( 'wp_ajax_ajax_load_news_post', 'ajax_load_news_post_func' );
add_action( 'wp_ajax_nopriv_ajax_load_news_post', 'ajax_load_news_post_func' );
function ajax_load_news_post_func() {
    if ( !wp_verify_nonce( $_REQUEST['nonce'], "ajax_load_post_nonce")) {
        wp_send_json_error('None?');
    }
    $category = isset($_POST['categories'])?json_decode($_POST['categories']): 1;
    $paged = isset($_POST['ajax_paged'])?intval($_POST['ajax_paged']):'';
    if($paged <= 0 || !$paged || !is_numeric($paged)) wp_send_json_error('Paged?');
    $news = new WP_Query(array(
        'post_type'         =>  'post',
        'posts_per_page'    =>  18,
        'post_status'           => 'publish',
        'paged'             =>  $paged,
        'category__in' => $category,
        'orderby' => 'date'
    ));
    if($news->have_posts()):
        ob_start();
        $max_post_count = $news->post_count;
        ?>
        <div class="home_news_wrap">
        <?php $stt = 1; while ($news->have_posts()):$news->the_post();?>
        <?php if($stt == 1):?><div class="zsofa_news_col1"><?php endif;?>
        <?php if($stt == 2):?><div class="zsofa_news_col2"><?php endif;?>
        <div class="col-md-4 col-ssmm-6 col-ssm-6">
            <div class="news-item-wr">
                <?php if(has_post_thumbnail()):?>
                    <a href="<?php the_permalink() ?>"><?php echo get_the_post_thumbnail( null, 'post-thumb' );?></a>
                <?php else :?>
                    <?php
                    $html = '<div class="news-image-placeholder">';
                    $html .= sprintf('<img src="%s" alt="%s" class="wp-post-image" />', esc_url(wc_placeholder_img_src()), esc_html__('Awaiting product image', 'woocommerce'));
                    $html .= '</div>';

                    echo apply_filters('woocommerce_single_product_image_thumbnail_html', $html, $post_thumbnail_id);
                    ?>
                <?php endif;?>
                <a href="<?php the_permalink() ?>" class="news-title"><?php the_title(); ?></a>
                <span class="line-separator">&nbsp;</span>
                <div class="short-description"><?php the_excerpt();?></div>
                <a href="<?php the_permalink() ?>" class="news-view-more">Xem chi tiết</a>
            </div>
        </div>
        <?php if($stt == 1 || $stt == $max_post_count):?></div><?php endif;?>
        <?php $stt++; endwhile; wp_reset_query();?>
        </div>
        <?php zsofa_pagination_ajax($news,$paged);?>
        <?php $content = ob_get_clean();?>
    <?php else:?>
        <?php wp_send_json_error('No post?');?>
    <?php endif; //End news
    wp_send_json_success($content);
    die();
}

//Ajax load post
add_action( 'wp_ajax_simiar_products', 'ajax_load_simiar_products' );
add_action( 'wp_ajax_nopriv_simiar_products', 'ajax_load_simiar_products' );
function ajax_load_simiar_products() {
    if ( !wp_verify_nonce( $_REQUEST['nonce'], "ajax_load_post_nonce")) {
        wp_send_json_error('None?');
    }
    $term = isset($_POST['categories'])?json_decode($_POST['categories']): 1;
    $paged = isset($_POST['ajax_paged'])?intval($_POST['ajax_paged']):'';
    if($paged <= 0 || !$paged || !is_numeric($paged)) wp_send_json_error('Paged?');
    $related_product = new WP_Query( array(
        'post_type'             => 'product',
        'post_status'           => 'publish',
        'ignore_sticky_posts'   => 1,
        'posts_per_page'        => '12',
        'paged'             =>  $paged,
        'orderby' => 'date',
        'tax_query'             => array(
            array(
                'taxonomy'      => 'product_cat',
                'field' => 'term_id', //This is optional, as it defaults to 'term_id'
                'terms'         => $term,
                'operator'      => 'IN' // Possible values are 'IN', 'NOT IN', 'AND'.
            ),
            array(
                'taxonomy'      => 'product_visibility',
                'field'         => 'slug',
                'terms'         => 'exclude-from-catalog', // Possibly 'exclude-from-search' too
                'operator'      => 'NOT IN'
            )
        )
    ));
    if($related_product->have_posts()):
        ob_start();
        $max_post_count = $related_product->post_count;
        ?>
        <div class="home_news_wrap">
        <?php $stt = 1; while ($related_product->have_posts()):$related_product->the_post();?>
        <?php if($stt == 1):?><div class="zsofa_news_col1"><?php endif;?>
        <?php if($stt == 2):?><div class="zsofa_news_col2"><?php endif;?>
        <?php global $product; ?>
        <div class="col-md-3 col-ssmm-6 col-ssm-6">
            <div class="product-wrapper">
                    <?php if(has_post_thumbnail()):?>
                        <a class="product-image image_blur" href="<?php the_permalink() ?>"><span class="img-thumb-wrapper"><?php echo woocommerce_get_product_thumbnail(); ?></span></a>
                    <?php else :?>
                        <?php
                        $html = '<div class="news-image-placeholder">';
                        $html .= sprintf('<img src="%s" alt="%s" class="wp-post-image" />', esc_url(wc_placeholder_img_src()), esc_html__('Awaiting product image', 'woocommerce'));
                        $html .= '</div>';

                        echo apply_filters('woocommerce_single_product_image_thumbnail_html', $html, $post_thumbnail_id);
                        ?>
                    <?php endif;?>
            </div>
            <div class="product-title-info">
                <a href="<?php the_permalink() ?>" class="news-title"><?php the_title(); ?></a>
            </div>
            <div class="product-price">
                <span class="tit-price">Giá: </span>
                <span class="value-price">

                    <span class="value-price">
                    <?php if ( $price_html = $product->get_price_html() ) : ?>
                        <?php echo $price_html; ?>
                    <?php endif; ?>
                    </span>
                </span>
            </div>
        </div>
        <?php if($stt == 1 || $stt == $max_post_count):?></div><?php endif;?>
        <?php $stt++; endwhile; wp_reset_query();?>
        </div>
        <?php zsofa_pagination_ajax($related_product,$paged);?>
        <?php $content = ob_get_clean();?>
    <?php else:?>
        <?php wp_send_json_error('No post?');?>
    <?php endif; //End related products
    wp_send_json_success($content);
    die();
}
//add script to theme
add_action( 'wp_enqueue_scripts', 'zsofavn_enqueue_UseAjaxInWp' );
function zsofavn_enqueue_UseAjaxInWp(){
    wp_enqueue_script( 'zsofavn-ajaxload', esc_url( trailingslashit( get_template_directory_uri() ) . 'assets/js/ajax-loadpost.js' ), array( 'jquery' ), '1.0', true );
    $php_array = array(
        'admin_ajax'      => admin_url( 'admin-ajax.php'),
        'load_post_nonce'   =>  wp_create_nonce('ajax_load_post_nonce'),
    );
    wp_localize_script( 'zsofavn-ajaxload', 'zsofavn_url', $php_array );
}

//normal pagination
function zsofa_archive_pagination($custom_query = null, $paged = null) {
    global $wp_query;
    if($custom_query){
        $main_query = $custom_query;
    }
    else $main_query = $wp_query;
    $paged = ($paged) ? $paged : get_query_var('paged');
    $big = 999999999;
    $total = isset($main_query->max_num_pages)?$main_query->max_num_pages:'';
    if($total > 1) echo '<div class="paginate_links clearfix">';
    echo paginate_links( array(
        'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
        'format' => '?paged=%#%',
        'current' => max( 1, $paged ),
        'total' => $total,
        'mid_size' => '10', // Số trang hiển thị khi có nhiều trang trước khi hiển thị ...
        'prev_text'    => __('Trước','zsofavn'),
        'next_text'    => __('Tiếp','zsofavn'),
    ) );
    if($total > 1) echo '</div>';
}