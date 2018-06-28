<div id="pbr-videopost">
	 <p class="pbr_section ">
        <?php $mb->the_field('job'); ?>
        <label for="embed_post"><?php echo __('Job:','pbrframework');?></label>
        <input type="text" name="<?php $mb->the_name(); ?>" id="embed_videopost" value="<?php $mb->the_value(); ?>" />
    </p>
    <p class="pbr_section ">
        <?php $mb->the_field('phone'); ?>
        <label for="embed_post"><?php echo __('Phone:','pbrframework');?></label>
        <input type="text" name="<?php $mb->the_name(); ?>" id="embed_videopost" value="<?php $mb->the_value(); ?>" />
    </p>
    <p class="pbr_section ">
        <?php $mb->the_field('email'); ?>
        <label for="link_post"><?php _e( 'Email', 'pbrframework' );?></label>
        <input type="text" name="<?php $mb->the_name(); ?>" id="embed_videopost" value="<?php $mb->the_value(); ?>" />
    </p>

     <p class="pbr_section ">
        <?php $mb->the_field('facebook'); ?>
        <label for="link_post"><?php _e( 'Facebook', 'pbrframework' );?></label>
        <input type="text" name="<?php $mb->the_name(); ?>" id="embed_videopost" value="<?php $mb->the_value(); ?>" />
    </p>

     <p class="pbr_section ">
        <?php $mb->the_field('twitter'); ?>
        <label for="link_post"><?php _e( 'Twitter', 'pbrframework' );?></label>
        <input type="text" name="<?php $mb->the_name(); ?>" id="embed_videopost" value="<?php $mb->the_value(); ?>" />
    </p>

     <p class="pbr_section ">
        <?php $mb->the_field('linkedin'); ?>
        <label for="link_post"><?php _e( 'Linked In', 'pbrframework' );?></label>
        <input type="text" name="<?php $mb->the_name(); ?>" id="embed_videopost" value="<?php $mb->the_value(); ?>" />
    </p>
</div>

<script>
	PBR_Admin.params_Embed('#embed_post','#pbr-videopost');
</script>