<?php
/* $Desc
 *
 * @version    $Id$
 * @package    wpbase
 * @author     Prestabrain  Team <prestabrain@gmail.com, support@prestabrain.com>
 * @copyright  Copyright (C) 2015 prestabrain.com. All Rights Reserved.
 * @license    GNU/GPL v2 or later http://www.gnu.org/licenses/gpl-2.0.html
 *
 * @website  http://www.prestabrain.com
 * @support  http://www.prestabrain.com/support/forum.html
 */
?>
<div id="pbr-templates">
    <p class="pbr_section">
        <?php $mb->the_field('count'); ?>
        <label for="pf_number"><?php echo __( "Pages show at most:", "pbrframework"  );?></label>
        <input type="text" name="<?php $mb->the_name(); ?>" id="pf_number" value="<?php $mb->the_value(); ?>" />
    </p>

    <p class="pbr_section">
        <?php $mb->the_field('el_class'); ?>
        <label for="pf_number"><?php echo __( "Extra class name:", "pbrframework"  );?></label>
        <input type="text" name="<?php $mb->the_name(); ?>" id="pf_number" value="<?php $mb->the_value(); ?>" />
    </p>

    <p class="pbr_section">
        <?php $mb->the_field('blog_layout'); ?>
        <label for="pf_number"><?php echo __( "Blog Layout:", "pbrframework"  );?></label>
        <select  name="<?php $mb->the_name(); ?>">
            <option value="default" <?php $mb->the_select_state('default'); ?>><?php echo __('Blog Default',"pbrframework"); ?></option>
            <option value="masonry" <?php $mb->the_select_state('masonry'); ?>><?php echo __('Blog Masonry',"pbrframework"); ?></option>
            <option value="list" <?php $mb->the_select_state('list'); ?>><?php echo __('Blog List',"pbrframework"); ?></option>
        </select>
    </p>

    <p class="pbr_section">
        <?php $mb->the_field('header_skin'); ?>
        <label for="pf_number"><?php echo __( "Header Skin:", "pbrframework"  );?></label>
        <select  name="<?php $mb->the_name(); ?>">
	    	<option value="1" <?php $mb->the_select_state('1'); ?>><?php echo __('Use Global',"pbrframework"); ?></option>
	    	<option value="2" <?php $mb->the_select_state('2'); ?>><?php echo __('Skin 1',"pbrframework"); ?></option>
	    	<option value="3" <?php $mb->the_select_state('3'); ?>><?php echo __('Skin 2',"pbrframework"); ?></option>
	    </select>
    </p>

    <p class="pbr_section">
        <?php $mb->the_field('footer_skin'); ?>
        <label for="pf_number"><?php echo __( "Footer Skin:", "pbrframework"  );?></label>
        <select  name="<?php $mb->the_name(); ?>">
            <option value="1" <?php $mb->the_select_state('1'); ?>><?php echo __('Use Global',"pbrframework"); ?></option>
            <option value="2" <?php $mb->the_select_state('2'); ?>><?php echo __('Skin 1',"pbrframework"); ?></option>
            <option value="3" <?php $mb->the_select_state('3'); ?>><?php echo __('Skin 2',"pbrframework"); ?></option>
        </select>
    </p>
</div>