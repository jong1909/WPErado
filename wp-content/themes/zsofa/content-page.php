<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package zsofa
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php
	/**
	 * Functions hooked in to zsofa_page add_action
	 *
	 * @hooked zsofa_page_header          - 10
	 * @hooked zsofa_page_content         - 20
	 */
	do_action( 'zsofa_page' );
	?>
</article><!-- #post-## -->
