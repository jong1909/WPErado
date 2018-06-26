<?php
/**
 * Template used to display post content on single pages.
 *
 * @package zsofa
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php
	do_action( 'zsofa_single_post_top' );

	/**
	 * Functions hooked into zsofa_single_post add_action
	 *
	 * @hooked zsofa_post_header          - 10
	 * @hooked zsofa_post_meta            - 20
	 * @hooked zsofa_post_content         - 30
	 */
	do_action( 'zsofa_single_post' );

	/**
	 * Functions hooked in to zsofa_single_post_bottom action
	 *
	 * @hooked zsofa_post_nav         - 10
	 * @hooked zsofa_display_comments - 20
	 */
	do_action( 'zsofa_single_post_bottom' );
	?>

</article><!-- #post-## -->
