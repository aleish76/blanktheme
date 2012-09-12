<?php

/*
    This function adds the Riva Slider Pro tab to the array of tabs in the media uploader.
*/
function media_riva_slider_pro_upload( $tabs ) {
    $tab = array( 'riva_slider_pro_tab' => __( 'Riva Slider Pro', 'riva_slider_pro' ) );
    return array_merge( $tabs, $tab );   
}
add_filter( 'media_upload_tabs', 'media_riva_slider_pro_upload' );





/*
    Function that creates the iframe for the Riva Slider Pro's tab content
*/
function media_riva_slider_pro_iframe( $errors ) {
    return wp_iframe( 'media_riva_slider_pro_iframe_content', $errors ); 
}
add_action( 'media_upload_riva_slider_pro_tab', 'media_riva_slider_pro_iframe' );





/*
    This function outputs the tabs content
    It also provides use with the images URLs, titles and alternate texts
*/
function media_riva_slider_pro_iframe_content( $errors ) {
    
    // Global variables
    global $post;
    
    // Display the media uploader tabs
    media_upload_header();
    
    // Query array
    $query = array(
        'post_type' => 'attachment',
        'post_mime_type' => 'image',
        'post_status' => 'inherit',
        'posts_per_page' => -1
    );
    
    // Custom Wordpress query used to get the images from the Media Library
    $wp_query = new WP_Query( $query ); ?>
    
    <!-- Tab content -->
    <div id="rs-media-items">   
        <ul id="rs-media-items-list">
    
        <?php foreach ( $wp_query->posts as $image ) {

            $thumb_url = wp_get_attachment_image_src( $image->ID, 'thumbnail' );
            $thumb_url = $thumb_url[ 0 ];
            $resized_url = wp_get_attachment_image_src( $image->ID, 'riva-slider-pro-admin-image' );
            $resized_url = $resized_url[ 0 ]; ?>
    
            <li id="rs-media-item-<?php echo esc_attr( $image->ID ); ?>">
                <img src="<?php echo esc_url_raw( $thumb_url ); ?>" />
                <a href="" onclick="sendImagetoPlugin.insert(<?php echo esc_attr( $image->ID ); ?>)" class="button-primary use-this-image"><?php esc_attr_e( 'Use this image', 'riva_slider_pro' ); ?></a>
                <input type="hidden" name="rs-image-url" id="rs-image-url" value="<?php echo esc_url_raw( $image->guid ); ?>" />
                <input type="hidden" name="rs-image-title" id="rs-image-title" value="<?php echo esc_attr( $image->post_title ); ?>" />
                <input type="hidden" name="rs-image-alt" id="rs-image-alt" value="<?php echo esc_attr( $image->post_excerpt ); ?>" />
                <input type="hidden" name="rs-image-resized" id="rs-image-resized" value="<?php echo esc_url_raw( $resized_url ); ?>" />
            </li>
            
        <?php } ?>
    
        </ul>
    </div>
    
<?php }





/*
    Admin media uploader Javascript
*/
function riva_slider_pro_media_javascript() {
    
    $info = riva_slider_pro_info();
    $permalink = $info[ 'permalink' ];
    
    if ( is_admin() && riva_slider_pro_uri( 'upload' ) == true ) { ?>
    <script type="text/javascript">
    //<![CDATA[
    var sendImagetoPlugin = {
	
	insert : function(id) {
		var loc = window.location.href;
		var win = window.dialogArguments || opener || parent || top;
                var parent = jQuery('#rs-media-item-'+ id);
                var image_url = jQuery('#rs-image-url', parent).val();
                var image_title = jQuery('#rs-image-title', parent).val();
                var image_alt = jQuery('#rs-image-alt', parent).val();
                var image_resized = jQuery('#rs-image-resized', parent).val();
                var html = '<a href="'+ image_resized +'"><img src="'+ image_url +'" title="'+ image_title +'" alt="'+ image_alt +'" /></a>';
		if ( loc.indexOf( 'change=true' ) != -1 ) {
		    var id = loc.split( 'riva_id=' );
		    id = id[ 1 ].split( '&' );
		    id = id[ 0 ];
		    win.riva_change_image(html, id);
		} else {
		    win.riva_send_image_to_plugin(html);
		}
		return false;
	}
	
    }
    //]]>
    </script>
    <?php }
}
add_action( 'admin_head', 'riva_slider_pro_media_javascript' );

?>