<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package zsofa
 */

?>

		</div><!-- .col-full -->
	</div><!-- #content -->

	<?php do_action( 'zsofa_before_footer' ); ?>

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="col-full">

			<?php
			/**
			 * Functions hooked in to zsofa_footer action
			 *
			 * @hooked zsofa_footer_widgets - 10
			 * @hooked zsofa_credit         - 20
			 */
			do_action( 'zsofa_footer' ); ?>

		</div><!-- .col-full -->
	</footer><!-- #colophon -->

	<?php do_action( 'zsofa_after_footer' ); ?>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
