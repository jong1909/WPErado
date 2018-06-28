<div id="pbr-post">
    <p class="pbr_section ">
        <?php $mb->the_field('embed'); ?>
        <label for="embed_post"><?php _e( 'Embed Post format', 'pbrframework' ); ?>:</label>
        <input type="text" name="<?php $mb->the_name(); ?>" id="embed_post" value="<?php $mb->the_value(); ?>" />
    </p>
    <div class="pbr_embed_view">
        <span class="spinner" style="float:none;"></span>
        <div class="result"></div>
    </div>
    <p class="pbr_section ">
        <?php $mb->the_field('link'); ?>
        <label for="link_post"><?php _e( 'Link Post format', 'pbrframework' ); ?>:</label>
        <input type="text" name="<?php $mb->the_name(); ?>" id="embed_link" value="<?php $mb->the_value(); ?>" />
    </p>
     <p class="pbr_section ">
        <?php $mb->the_field('timing'); ?>
        <label for="link_post"><?php _e( 'Time', 'pbrframework' ); ?>:</label>
        <input type="text" name="<?php $mb->the_name(); ?>" id="embed_timing" value="<?php $mb->the_value(); ?>" />
    </p>
</div>

<script>
	PBR_Admin.params_Embed('#embed_post','#pbr-post');
</script>