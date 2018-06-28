<?php wp_nonce_field( 'ljn_meta_box', 'ljn_meta_box_nonce' ); ?>
<label for="ljn_url">The Facebook URL you would like to jack for this post:</label>
<input type="text" id="ljn_url" name="ljn_url" value="<?php echo get_post_meta( $post->ID, 'ljn_url', true ); ?>">