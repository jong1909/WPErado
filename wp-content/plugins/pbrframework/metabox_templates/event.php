<p class="pbr_section">
   <?php 
      $event_room = array(
            'id'    => 'event_room',
            'title' => 'Room',
            'des'   => '(Address Room)'
        );
        $mb->addTextElement( $event_room );
   ?>
</p>

<p class="pbr_section pbr-event-speaker">
   <label><b><?php _e( 'Speaker Avata', "pbrframework")?></b></label>
   <?php
       wp_enqueue_media();
       wp_enqueue_style( 'PBR_admin_metabox_css', PBR_FRAMEWORK_ADMIN_STYLE_URI.'css/metabox.css');
       wp_enqueue_script('PBR_gallery_upload', PBR_FRAMEWORK_ADMIN_STYLE_URI.'js/gallery_upload.js');
   ?>
   <span class="add_product_images hide-if-no-js">
       <a href="#" class="button" data-choose="<?php _e( 'Add Speaker', "pbrframework" ); ?>" data-update="<?php _e( 'Add Speaker', "pbrframework" ); ?>" data-delete="<?php _e( 'Delete Speaker Avata', "pbrframework"); ?>" data-text="<?php _e( 'Delete', "pbrframework"); ?>"><i class="fa fa-upload"></i><?php _e(' Add Speaker', "pbrframework"); ?></a>
   </span> 
   <div id="product_images_container">
       <ul class="product_images">
       <?php
           $mb->the_field( 'post_gallery');
           $galleries = $mb->get_the_value();
           $attachments = array_filter( explode( ',', $galleries ) );

           if ( $attachments ) {
               foreach ( $attachments as $attachment_id ) {
                   echo '<li class="image" data-attachment_id="' . esc_attr( $attachment_id ) . '">
                       ' . wp_get_attachment_image( $attachment_id, 'lookbook-slide' ) . '
                       <ul class="actions">
                           <li><a href="#" class="delete tips" data-tip="' . __( 'Delete image', "pbrframework" ) . '"><i class="fa fa-times"></i></a></li>
                       </ul>
                   </li>';
               }
           }
       ?>
       </ul>
       <input type="hidden" id="product_image_gallery" name="<?php $mb->the_name(); ?>" value="<?php echo esc_attr( $mb->get_the_value() ); ?>" />
   </div>
</p>