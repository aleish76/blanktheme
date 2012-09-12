<?php
	
	// Add RSS links to <head> section
	automatic_feed_links();
	
	// Load jQuery
	if ( !is_admin() ) {
	   wp_deregister_script('jquery');
	   wp_register_script('jquery', ("https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"), false);
	   wp_enqueue_script('jquery');
	}
	
	// Clean up the <head>
	function removeHeadLinks() {
    	remove_action('wp_head', 'rsd_link');
    	remove_action('wp_head', 'wlwmanifest_link');
    }
    add_action('init', 'removeHeadLinks');
    remove_action('wp_head', 'wp_generator');
    
	// Declare sidebar widget zone
    if (function_exists('register_sidebar')) {
    	register_sidebar(array(
    		'name' => 'Sidebar Widgets',
    		'id'   => 'sidebar-widgets',
    		'description'   => 'These are widgets for the sidebar.',
    		'before_widget' => '<div id="%1$s" class="widget %2$s">',
    		'after_widget'  => '</div>',
    		'before_title'  => '<h2>',
    		'after_title'   => '</h2>'
    	));
    }
	
//custom menus	
 if (function_exists('register_nav_menus')) {
	register_nav_menus(
		array (
				'main_nav' => 'menu-1'
		)
	);
}

// Enable support for post-thumbnails

add_theme_support('post-thumbnails');
set_post_thumbnail_size(50, 50, true);  


// post thumbnail support
	if ( function_exists( 'add_image_size' ) ) add_theme_support( 'post-thumbnails' );

	if ( function_exists( 'add_image_size' ) ) {
	add_image_size( 'post-thumb', 50, 50 );
	add_image_size( 'home-thumb', 50, 50, true );
}

if ( function_exists('add_theme_support') ) {
	add_theme_support('post-thumbnails');
}

// This theme uses Featured Images (also known as post thumbnails) for per-post/per-page Custom Header images
	add_theme_support( 'post-thumbnails' );

//Custom callback function for Trackbacks/Pings, see comments.php
function mytheme_comment($comment, $args, $depth) {
 $GLOBALS['comment'] = $comment; ?>
 <li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
 <div id="comment-">
 <div>
 <?php echo get_avatar($comment,$size='48',$default='<path_to_url>' ); ?>
 <?php $user_name_str = substr(get_comment_author(),0, 20); ?>
 <?php printf(__('<cite><b>%s</b></cite> <span>says:</span>'), $user_name_str) ?>
 </div>
 <?php if ($comment->comment_approved == '0') : ?>
 <em><?php _e('Your comment is awaiting moderation.') ?></em>
 <br />
 <?php endif; ?>
 
 <div><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"><?php printf(__('%1$s at %2$s'), get_comment_date(),  get_comment_time()) ?></a><?php edit_comment_link(__('(Edit)'),'  ','') ?></div>
 
 <?php comment_text() ?>
 
 <div>
 <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
 </div>
<br />
 </div>
<?php
 }

function new_excerpt_length($length) {
	return 20;
}
;



//custom excerpt

remove_filter('get_the_excerpt', 'wp_trim_excerpt');
add_filter('get_the_excerpt', 'my_wp_trim_excerpt');

function my_wp_trim_excerpt($text) { // Fakes an excerpt if needed
if ( '' == $text ) {
$text = get_the_content('');
$text = apply_filters('the_content', $text);
$text = str_replace(']]>', ']]>', $text);
$text = strip_tags($text);
$excerpt_length = 50;
$words = explode(' ', $text, $excerpt_length + 1);
if (count($words)>=0) {
array_pop($words);
array_push($words,' ... <a href="'. get_permalink() . '">Read More &raquo;</a>');
$text = implode(' ', $words);
}
}
return $text;
}


?>
