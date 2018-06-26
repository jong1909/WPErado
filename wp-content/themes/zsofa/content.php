<?php
/**
 * Template used to display post content.
 *
 * @package zsofa
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php
	/**
	 * Functions hooked in to zsofa_loop_post action.
	 *
	 * @hooked zsofa_post_header          - 10
	 * @hooked zsofa_post_meta            - 20
	 * @hooked zsofa_post_content         - 30
	 */
	do_action( 'zsofa_loop_post' );
	?>

</article><!-- #post-## -->
