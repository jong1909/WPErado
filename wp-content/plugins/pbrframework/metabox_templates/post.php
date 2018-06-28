<?php 
global $wp_registered_sidebars;
 
    $meta_tabs = array(
        array(
            'id'    => 'pbr-config',
            'icon'  => 'fa-wrench',
            'title' => 'General'
        ),
        array(
            'id'    => 'option',
            'icon'  => 'fa-cogs',
            'title' => 'Post Option'
        )
    );

?>
<!--Genaral config -->
<div id="pbr-post" class="pbr-metabox">
    <!-- Nav tabs -->
    <?php $mb->getTabsConfig($meta_tabs); ?>

    <!--Genaral config -->
    <div class="pbr-meta-content active" id="pbr-config">

        <!--show title config -->
            <p class="pbr_section config_layout">
            <?php 
                $_enabal_config = array('id'=>'config_layout','title'=>'Enabal config layout');
                $mb->getCheckboxElement( $_enabal_config ); ?>
            </p>

        <!--Select page layout-->
        <div class="pbr_section config_layout enabal-config">
        <?php
            $layout = array('id' => 'page_layout', 'title' => 'Select page layout');
            $mb->selectLayout($layout);
        ?>
        </div>

       <div style="clear:both;"></div>
        <!--Select left sidebar-->
        <p class="pbr_section left-sidebar config_layout enabal-config">
            <?php $mb->the_field('left_sidebar'); ?>
        <?php 
            $left_sidebars = array('id'=> 'left_sidebar','title'=>'Left Sidebar','data'=>$wp_registered_sidebars,'default'=>'sidebar-left');
            $mb->getSelectElement($left_sidebars);
        ?>
        </p>
        <!--Select right sidebar-->
        <p class="pbr_section right-sidebar config_layout enabal-config" style="display: none;">
    <?php 
        $right_sidebars = array('id'=> 'right_sidebar','title'=> 'Right Sidebar','data'=>$wp_registered_sidebars,'default'=>'sidebar-right');
        $mb->getSelectElement($right_sidebars); 
    ?>
        </p>

    </div>

    <!--Post Option-->
    <div class="pbr-meta-content" id="option">

    <!--Show format post-->

        <!--Select audio post-->
        <p class="pbr_section postformat pbr-postformat-audio" style="display: none;">
        <?php 
            $audio_link = array(
                'id'    => 'audio_link',
                'title' => 'Audio link',
                'des'   => '(Support <a href="'.( is_ssl()  ? 'https' : 'http') .'://soundcloud.com/" target="_bank" >Soundcloud</a> audio)'
            );
            $mb->addTextElement( $audio_link );
        ?>
            
        </p>
        <div class="pbr_embed_view postformat pbr-postformat-audio">
            <span class="spinner" style="float:none;"></span>
            <div class="result"></div>
        </div>

        <!--End config audio post-->

        <!--Select video post-->
        <p class="pbr_section postformat pbr-postformat-video" style="display: none;">
        <?php
            $video_link = array(
                'id'    => 'video_link',
                'title' => 'Video link',
                'des'   => '(Support <a href="'.( is_ssl()  ? 'https' : 'http') .'://www.youtube.com/" target="_bank" >Youtube</a> and <a href="'.( is_ssl()  ? 'https' : 'http') .'://vimeo.com/" target="_bank">Vimeo</a> video)'
            );
            $mb->addTextElement( $video_link );
        ?>
        </p>
        <div class="pbr_embed_view postformat pbr-postformat-video">
            <span class="spinner" style="float:none;"></span>
            <div class="result"></div>
        </div>

        <!--Select gallery post-->
        <p class="pbr_section postformat pbr-postformat-gallery" style="display: none;">
        
            <label><b><?php _e( 'Gallery image', "pbrframework")?></b></label>
            <?php
                wp_enqueue_media();
                wp_enqueue_style( 'PBR_admin_metabox_css', PBR_FRAMEWORK_ADMIN_STYLE_URI.'css/metabox.css');
                wp_enqueue_script('PBR_gallery_upload', PBR_FRAMEWORK_ADMIN_STYLE_URI.'js/gallery_upload.js');
            ?>
            <span class="add_product_images hide-if-no-js">
                <a href="#" class="button" data-choose="<?php _e( 'Add Images to Gallery', "pbrframework" ); ?>" data-update="<?php _e( 'Add to gallery', "pbrframework" ); ?>" data-delete="<?php _e( 'Delete image', "pbrframework"); ?>" data-text="<?php _e( 'Delete', "pbrframework"); ?>"><i class="fa fa-upload"></i><?php _e(' Add gallery', "pbrframework"); ?></a>
            </span> 
            <div id="product_images_container" class="postformat pbr-postformat-gallery">

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
                                    <li><a href="#" class="delete tips" data-tip="' . __( 'Delete image', 'woocommerce' ) . '"><i class="fa fa-times"></i></a></li>
                                </ul>
                            </li>';
                        }
                    }
                ?>
                </ul>

                <input type="hidden" id="product_image_gallery" name="<?php $mb->the_name(); ?>" value="<?php echo esc_attr( $mb->get_the_value() ); ?>" />

            </div>
        </p>

        <!--Select link post-->
        <p class="pbr_section postformat pbr-postformat-link" style="display: none;">
            <?php
                $link_url = array('id'=>'link_url','title'=>'Link URL','des'=>'');
                $mb->addTextElement( $link_url );
            ?>
            <br/>
            <?php
                $link_title = array('id'=>'link_title','title'=>'Link title','des'=>'');
                $mb->addTextElement( $link_title );
            ?>
        </p>

        <!--Select chat post-->
        <p class="pbr_section postformat pbr-postformat-chat" style="display: none;">
            <?php
                $chat_content = array('id'=>'chat_content','title'=>'Chat content');
                $mb->addTextareaElement( $chat_content );
            ?>
        </p>

        <!--Select quote post-->
        <p class="pbr_section postformat pbr-postformat-quote" style="display: none;">
            <?php
                $quote_content = array('id'=>'quote_content','title'=>'Quote content');
                $mb->addTextareaElement( $quote_content );
            ?>
            <br/>
            <?php
                $quote_author = array('id'=>'quote_author','title'=>'Quote author', 'des' => '');
                $mb->addTextElement( $quote_author );
            ?>
        </p>

    </div>

</div>
