<?php
class WPPG_Gallery_Template_2
{
    function __construct()
    {
        //NOP
    }
    
    function render_gallery($gallery_id)
    {
        global $wp_photo_gallery;
        
        $pagination = false; //Initialize
        $gallery = new WPPGPhotoGallery($gallery_id);
        $display_photo_details_page = $gallery->display_image_on_page;
        $gallery_items = WPPGPhotoGallery::getGalleryItems($gallery_id);
        WP_Photo_Gallery_Utility::start_buffer();
?>
        <link type="text/css" rel="stylesheet" href="<?php echo WP_PHOTO_URL.'/classes/gallery-templates/css/wppg-photo-gallery-template-2.css?ver='.WP_PHOTO_VERSION; ?>" />
        <div id="wppg-gallery-template-2">
            <div class=" main_folio">
<?php
        //Add Pagination if applicable
        if ($gallery->enable_pagination == 1){
            echo '<link type="text/css" rel="stylesheet" href="'.WP_PHOTO_URL.'/classes/gallery-templates/css/wppg-pagination.css?ver='.WP_PHOTO_VERSION.'" />';//Load the CSS file for this view        
            $pagination = WPPGPhotoGallery::apply_gallery_pagination($gallery, $gallery_items);
            if ($pagination !== false){
                $gallery_items = $pagination['array'];
            }
        }
       $count =1;
        $tempArr = array();
       $gap = 1;
        foreach($gallery_items as $p)
        {
            $image_id = $p['id'];
            //Now let's create a PhotoProduct object for this item
            $wppgPhotoObj = new WPPGPhotoGalleryItem();        
            $wppgPhotoObj->create_photo_item_by_id($image_id);

            $water_mark_url = '';
            $file_name = $wppgPhotoObj->image_file_name;
            $upload_dir = wp_upload_dir(); 
            $path = $wppgPhotoObj->thumb_url;
            $image_file_url = $wppgPhotoObj->image_file_url;

            $h = '150';//Max height for the gallery images in this template
            $w = WPPG_Gallery_Template_2::calculate_thumb_img_width_given_desired_height($image_file_url,$h,$wppgPhotoObj->image_height ,$wppgPhotoObj->image_width);
            
            //Get a resized thumbnail using WP functions
            $thumb_name = $wppgPhotoObj->calculate_wp_generated_thumbnail_img_name($w, $h);
            $thumb_path = $wppgPhotoObj->source_dir . $thumb_name;
            if(!file_exists($thumb_path)){
                $resized_file = image_make_intermediate_size($wppgPhotoObj->image_file_path, $w, $h);
                $thumbnail_src = $wppgPhotoObj->source_dir_url.$resized_file['file'];
            }else{
                $thumbnail_src = $wppgPhotoObj->source_dir_url.$thumb_name;
            }
            //End of wp image resize

            if ($display_photo_details_page == 1)
            {
                $details_page_id = $wp_photo_gallery->configs->get_value('wppg_photo_details_page_id');
                if(empty($details_page_id)){
                    $photo_details_page = get_page_by_path('wppg_photogallery/wppg_photo_details');
                    if($photo_details_page == NULL){
                        $wp_photo_gallery->debug_logger->log_debug('Gallery template 2: get_page_by_path returned NULL!',4);
                    }
                    $preview_page = $photo_details_page->guid;
                }else{
                    $preview_page = get_permalink($details_page_id);
                }

                //Check if this gallery is password protected
                if(!empty($gallery->password)){
                    //This gallery is password protected - so let's add an encoded string
                    $encoded_str = base64_encode(WPPS_PHOTO_VIEW_AUTH_STRING);
                    $query_params = array('gallery_id'=>$gallery_id,'image_id'=>$image_id, 'auth_key'=>$encoded_str);
                }else{
                    $query_params = array('gallery_id'=>$gallery_id,'image_id'=>$image_id);
                }
                    $preview_url = add_query_arg($query_params, $preview_page);
                    $button_html = '<span class="wpsg-t2-buy-link"><a href="'.$preview_url.'">'.__("View", "spgallery").'</a></span>';
            }
            else
            {
                $source_dir = $upload_dir['basedir'].'/'.WPPG_UPLOAD_SUB_DIRNAME.'/'.$gallery_id.'/';

                if($gallery->watermark != NULL)
                {
                    //Get the gallery settings values for watermark placement, width and font size
                    $watermark_placement = $gallery->watermark_placement;
                    if ($watermark_placement === NULL)
                    {
                        $watermark_placement = '0';
                    }

                    $desired_width = $gallery->watermark_width;
                    if ($desired_width == 0 || empty($desired_width))
                    {
                        $desired_width = '600';
                    }

                    $wm_font_size = $gallery->watermark_font_size;
                    if ($wm_font_size == 0 || empty($wm_font_size))
                    {
                        $wm_font_size = '14';
                    }

                    $watermark_opacity = $gallery->watermark_opacity;
                    if ($watermark_opacity === NULL)
                    {
                        $watermark_opacity = '35';
                    }

                    //If the image is a portrait then instead of setting max width, we want to set max height otherwise the preview comes out too big
                    if($wppgPhotoObj->image_height > $wppgPhotoObj->image_width){
                        $args = array('watermark_height' => $desired_width, 'watermark_font_size' => $wm_font_size, 'watermark_placement' => $watermark_placement, 'watermark_opacity' => $watermark_opacity);
                    }else{
                        $args = array('watermark_width' => $desired_width, 'watermark_font_size' => $wm_font_size, 'watermark_placement' => $watermark_placement, 'watermark_opacity' => $watermark_opacity);
                    }

                    $args = array('watermark_width' => $desired_width, 'watermark_font_size' => $wm_font_size, 'watermark_placement' => $watermark_placement);

                    WPPGPhotoGallery::createWatermarkImage($source_dir,$source_dir,$file_name,false,$gallery->watermark, $args);
                    $water_mark_url = $upload_dir['baseurl'].'/'.WPPG_UPLOAD_SUB_DIRNAME.'/'.$gallery_id.'/watermark_'.$file_name;
                    $preview_url = $water_mark_url;
                }
                else
                {
                    //Don't create a watermark URL if the watermark field was empty in the gallery settings. Display original image instead
                    $preview_url = $wppgPhotoObj->image_file_url;
                }
                $button_html =  '<input type="button" id="viewPhotoDetails_'.$wppgPhotoObj->id.'" class="wppg_popup wppg-gallery-button wpsg-t2-buy-input" value="'.__("View", "spgallery").'">';
            }

    ?>
	<!--<div class="wpsg-t2-item">
            <div class="wpsg-t2-top" style="height:<?php //echo $h; ?>px; width:<?php //echo $w; ?>px;">
                <div class="wpsg-t2-thumb" style="height:<?php //echo $h; ?>px; width:<?php //echo $w; ?>px;">
                    <a class="wppg_popup" title="<?php //echo $wppgPhotoObj->name ?>" href="<?php //echo $preview_url ?>">
                        <img alt="<?php //echo $wppgPhotoObj->alt_text ?>" src="<?php //echo $thumbnail_src ?>">
                    </a>  -->                  
<!--                    <div class="wpsg-t2-meta">
                        <div class="wpsg-t2-buy-button">
                            <?php //echo $button_html; ?>
                        </div>
                    </div>                   -->
             <!--   </div> -->
             
            <!--</div>
	</div>--><!-- end of .wpsg-t2-item -->
   <?php
             if($count==1) {
                 //$tempArr[] = '<div class="main_folio_row">'.$p['image_url'].'</div> <div class="main_folio_row">';
                 echo '<div class="clear"></br></div><div class="main_folio_row" style="height: 415px !important;"><a class="wppg_popup" href="'.$p['image_url'].'"><img class="img_responsive_folio" src="'.$p['image_url'].'"/></a></div> <div class="main_folio_row">';
                 $count++;
             }
             
             else if(in_array($count,array('2','3','4'))) {
                $i = 1;
                if($count==4)
                {
                    $front = '<div class="main_folio_col_1 main_folio_col_1_pad">';
                    $end = '</div> </div><div class="main_folio_row">';
                }
                else{
                    $front = '<div class="main_folio_col_1">';
                    $end = '</div>';
                }
                //$tempArr[$i][] =   $front.' '.$p['image_url'].' '.$end;
                echo $front.'<a class="wppg_popup" href="'.$p['image_url'].'"><img class="img_responsive_folio" src="'.$p['image_url'].'"/></a>'.$end;
                $count++;
                
             }
              else if(in_array($count,array('5','6'))) {
                $i = 2;
                if($count==6)
                {
                    $front = '<div class="main_folio_col_2 main_folio_col_1_pad">';
                    $end = '</div></div> <div class="main_folio_row">';
                }
                else{
                    $front = '<div class="main_folio_col_2">';
                    $end = '</div>';
                }
                //$tempArr[$i][] =   $front.' '.$p['image_url'].' '.$end;
                echo $front.'<a class="wppg_popup" href="'.$p['image_url'].'"><img class="img_responsive_folio" src="'.$p['image_url'].'"/></a>'.$end;
                $count++;
                
             }
              else if(in_array($count,array('7','8','9'))) {
                $i = 3;
                if($count==9)
                {
                    $front = '<div class="main_folio_col_4 main_folio_col_1_pad">';
                    $end = '</div></div>';
                    $count=0;
                }
                elseif($count==8){
                    $front = '<div class="main_folio_row main_folio_col_1_pad2">';
                    $end = '</div></div>';
                }
                else{
                    $front = '<div class="main_folio_col_3"><div class="main_folio_row">';
                    $end = '</div>';
                }
                //$tempArr[$i][] =    $front.' '.$p['image_url'].' '.$end;
               echo $front.'<a class="wppg_popup" href="'.$p['image_url'].'"><img class="img_responsive_folio" src="'.$p['image_url'].'"/></a>'.$end;
               $count++;
                
             }
            
            $gap++;
   
   
    }//End foreach loop
    
    //echo '<pre>';print_r($tempArr);die;
    ?>
    <?php
        //Insert pagination nav bar at bottom
        if ($gallery->enable_pagination == 1 && $pagination !== false){
            echo '<div class="wppg_photo_gallery_pagination">'.$pagination['panel'].'</div>';    
        }        
?>
        </div>
        </div> <!--end wppg-gallery-display div --> 
<?php
        if($display_photo_details_page == 0){
            //Load lightbox css file
            wp_enqueue_style('jquery-lightbox-css', WP_PHOTO_URL . '/js/jquery-lightbox/css/jquery.lightbox-0.5.css');
            
            //Load lightbox js files
            wp_enqueue_script('wppg-lb-script-js', WP_PHOTO_URL.'/js/simple_photo_gallery_js.js', array('jquery'));
            wp_localize_script('wppg-lb-script-js', 'WPPG_LIGHTBOX_JS', 
                                    array('imgLoading'=>WP_PHOTO_URL.'/js/jquery-lightbox/images/lightbox-ico-loading.gif',
                                        'imgbtnPrev'=>WP_PHOTO_URL.'/js/jquery-lightbox/images/lightbox-btn-prev.gif',
                                        'imgbtnNext'=>WP_PHOTO_URL.'/js/jquery-lightbox/images/lightbox-btn-next.gif',
                                        'imgBlank'=>WP_PHOTO_URL.'/js/jquery-lightbox/images/lightbox-blank.gif',
                                        'imgbtnClose'=>WP_PHOTO_URL.'/js/jquery-lightbox/images/lightbox-btn-close.gif'));
       }
       $output = WP_Photo_Gallery_Utility::end_buffer_and_collect();
       return $output;
    }
    static function calculate_thumb_img_width_given_desired_height($src_img, $desired_height, $img_height = '', $img_width = '')
    {
        if(empty($img_height)){$img_height = imagesy($src_img);}
        if(empty($img_width)){$img_width = imagesx($src_img);}
        $ratio = $img_width/$img_height;
        $desired_width = floor($desired_height * ($ratio));
        return $desired_width;
    }
    
    
}