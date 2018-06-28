<?php get_header(); ?>
<div class="container">
	<?php
		$post_type = $_GET['search_posttype'];
		if( isset( $post_type ) &&  locate_template( 'templates/search-' . $post_type . '.php' ) ){
			get_template_part( 'templates/search', $post_type );
		}else{
			get_template_part('templates/content');
		}
	?>
</div>
<?php get_footer(); ?>