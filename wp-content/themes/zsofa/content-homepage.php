<?php
/**
 * The template used for displaying page content in template-homepage.php
 *
 * @package zsofa
 */

?>
<?php
$featured_image = get_the_post_thumbnail_url( get_the_ID(), 'thumbnail' );
?>

<div id="post-<?php the_ID(); ?>" <?php post_class(); ?> style="<?php zsofa_homepage_content_styles(); ?>" data-featured-image="<?php echo $featured_image; ?>">
	<div class="col-full">
		<?php
		/**
		 * Functions hooked in to zsofa_page add_action
		 *
		 * @hooked zsofa_homepage_header      - 10
		 * @hooked zsofa_page_content         - 20
		 */
		do_action( 'zsofa_homepage' );
		?>
	</div>
</div><!-- #post-## -->
