<?php 
        $teachers = get_users( 'orderby=nicename&role=pbr_teacher' );

   //     echo '<Pre>'.print_r( $teachers ,1 );die; 
?>
<div id="pbr-teachers">
    
    <p class="pbr_section ">
        <?php $mb->the_field('relateduser'); ?>
        <label for="teacher_relateduser"><?php _e( 'Related UserId', 'pbrframework' );?></label>
        <select name="<?php $mb->the_name(); ?>"  id="teacher_relateduser" value="<?php $mb->the_value(); ?>">
            <option value=""><?php _e('Select A Teacher'); ?></option>
            <?php foreach( $teachers as $teacher ){  
                $select =  $mb->get_the_value()==$teacher->ID ? 'selected="selected"' : '' ;
            ?> 
            <option <?php echo  $select ; ?> value="<?php echo $teacher->ID; ?>"><?php echo $teacher->display_name; ?></option>
            <?php } ?>
        </select>
    
        <p><em><?php _e( 'Add to matches Id for showing profile page and show related courses. To show teachers in dropbox, please assign user to Teacher Role' ); ?></em></p>
    </p>

	 <p class="pbr_section ">
        <?php $mb->the_field('job'); ?>
        <label for="teacher_job"><?php echo __('Job:','pbrframework');?></label>
        <input type="text" name="<?php $mb->the_name(); ?>" id="teacher_job" value="<?php $mb->the_value(); ?>" />
        <p><em><?php _e('Such as CEO, Marketer.....'); ?></em></p>
    </p>
    <p class="pbr_section ">
        <?php $mb->the_field('phone'); ?>
        <label for="teacher_phone"><?php echo __('Phone:','pbrframework');?></label>
        <input type="text" name="<?php $mb->the_name(); ?>" id="teacher_phone" value="<?php $mb->the_value(); ?>" />
    </p>
    <p class="pbr_section ">
        <?php $mb->the_field('email'); ?>
        <label for="teacher_email"><?php _e( 'Email', 'pbrframework' );?></label>
        <input type="text" name="<?php $mb->the_name(); ?>" id="teacher_email" value="<?php $mb->the_value(); ?>" />
    </p>

     <p class="pbr_section ">
        <?php $mb->the_field('facebook'); ?>
        <label for="teacher_facebook"><?php _e( 'Facebook', 'pbrframework' );?></label>
        <input type="text" name="<?php $mb->the_name(); ?>" id="teacher_facebook" value="<?php $mb->the_value(); ?>" />
    </p>

     <p class="pbr_section ">
        <?php $mb->the_field('twitter'); ?>
        <label for="teacher_twitter"><?php _e( 'Twitter', 'pbrframework' );?></label>
        <input type="text" name="<?php $mb->the_name(); ?>" id="teacher_twitter" value="<?php $mb->the_value(); ?>" />
    </p>

     <p class="pbr_section ">
        <?php $mb->the_field('linkedin'); ?>
        <label for="teacher_linkedin"><?php _e( 'Linked In', 'pbrframework' );?></label>
        <input type="text" name="<?php $mb->the_name(); ?>" id="teacher_linkedin" value="<?php $mb->the_value(); ?>" />
    </p>

    <p class="pbr_section ">
        <?php $mb->the_field('experience'); ?>
        <label for="teacher_experience"><?php _e( 'Experience', 'pbrframework' );?></label>
        <textarea type="text" name="<?php $mb->the_name(); ?>" style="height:100px; width:100%"  id="teacher_experience"><?php $mb->the_value(); ?></textarea>
    </p>
    <p class="pbr_section ">
        <?php $mb->the_field('specializedin'); ?>
        <label for="teacher_specializedin"><?php _e( 'Specialized In', 'pbrframework' );?></label>
        <textarea type="text" name="<?php $mb->the_name(); ?>" style="height:100px; width:100%" id="teacher_specializedin"><?php $mb->the_value(); ?></textarea>
    </p>




</div>

<div class="skills-panel action-panel">

    <div class="action-heading">  
       
        <h3><?php _e( 'Skills' ); ?></h3>  <div class="action-button addnew"><?php _e( 'Add Item', 'pbrframework' );?></div> 
    </div>    
    <?php
     $skills = array();
     global $post; 


     $data = get_post_meta( $post->ID, '_skills' );

     if( empty($data) ){
         $data = array();
        $data[0] = array('volume'=> array(0 => '' ) );
     }
     $data = $data[0]; 
    ?> 
    <?php foreach(  $data['volume']  as  $key => $item ){

    ?>

    <div class="skills-item action-item">
        <div class="label"><?php echo $key+1; ?></div>
        <div class="inner pbr_section "> 
            <label for="teacher_linkedin"><?php _e( 'Label', 'pbrframework' );?></label>
            <input type="text" name="skills[label][]"   value="<?php echo isset($data['label'][$key])?$data['label'][$key]:""; ?>" />
           
        </div>
        <div class="inner pbr_section "> 
            <label for="teacher_linkedin"><?php _e( 'Volume', 'pbrframework' );?></label>
            <input type="number" name="skills[volume][]"  value="<?php echo isset($data['volume'][$key])?$data['volume'][$key]:""; ?>" />
        </div>
        <div class="action-button remove"><?php _e( 'Remove', 'pbrframework' );?></div>
    </div>

    <?php } ?>
 
     <p><em><?php _e( '','pbrframework' ); ?></em></p>
</div>

<div class="education-panel action-panel">
    <div class="action-heading">
        
        <h3><?php _e( 'Education' ); ?></h3> <div class="action-button addnew"><?php _e( 'Add Item', 'pbrframework' );?></div> 
    </div>    
    <?php
     $skills = array();
     global $post; 


     $data = get_post_meta( $post->ID, '_education' );

     if( empty($data) ){
         $data = array();
        $data[0] = array('time'=> array(0 => '' ) );
     }
     $data = $data[0]; 
    ?> 
    <?php foreach(  $data['time']  as  $key => $item ){

    ?>

    <div class="skills-item action-item">
        <div class="label"><?php echo $key+1; ?></div> 
        <div class="inner pbr_section "> 
            <label for="teacher_linkedin"><?php _e( 'Time', 'pbrframework' );?></label>
            <input type="text" name="education[time][]"   value="<?php echo isset($data['time'][$key])?$data['time'][$key]:""; ?>" />
           
        </div>
        <div class="inner pbr_section "> 
            <label for="teacher_linkedin"><?php _e( 'Topic', 'pbrframework' );?></label>
            <input type="text" name="education[topic][]"  value="<?php echo isset($data['topic'][$key])?$data['topic'][$key]:""; ?>" />
        </div>

        <div class="inner pbr_section "> 
            <label for="teacher_linkedin"><?php _e( 'Name', 'pbrframework' );?></label>
            <input type="text" name="education[name][]"  value="<?php echo isset($data['topic'][$key])?$data['name'][$key]:""; ?>" />
        </div>

         <div class="inner pbr_section "> 
            <label for="teacher_linkedin"><?php _e( 'Information', 'pbrframework' );?></label>
            <textarea type="text" name="education[info][]" ><?php echo isset($data['info'][$key])?$data['info'][$key]:""; ?></textarea>    
        </div>

        <div class="action-button remove"><?php _e( 'Remove', 'pbrframework' );?></div>
    </div>

    <?php } ?>
 
     <p><em><?php _e( '','pbrframework' ); ?></em></p>
</div>


<script>
 

    jQuery(document).ready( function($){

        $('.action-panel .addnew').click( function() {
             var $p = $(this).parent();
            $item = $('.action-item',$p.parent() ).first().clone();
            $p.parent().append( $item );
            $('input , textarea', $item ).val( '' );
            $('.action-item',$p.parent() ).each( function (i) {
                $('.label',this).html(i+1);
            } );
        } );

         $('.action-panel').delegate( '.remove', 'click',  function() {

            var $p = $(this).parent();  
            var $pp = $p.parent();
            if( $( '.action-item', $pp ).length  > 1 ){
                if( confirm("<?php _e('Are you sure to delete this?','pbrframework'); ?>") ){
                    $p.remove();
                    $('.action-item',$pp ).each( function (i) {
                        $('.label',this).html(i+1);
                    } );
                }
            }else {
                $('input , textarea', $p ).val( '' );
            }
        } );
    } );
</script>