<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>

	<meta charset="<?php bloginfo('charset'); ?>" />
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" />
	<meta name="viewport" content="width=1140" />	
	<script type="text/javascript" src="http://code.google.com/p/css3-mediaqueries-js/"></script>
	<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/mediaqueries.css"/>

	<?php if (is_search()) { ?>
	
	<?php } ?>

	<title>
		   <?php
		      if (function_exists('is_tag') && is_tag()) {
		         single_tag_title("Tag Archive for &quot;"); echo '&quot; - '; }
		      elseif (is_archive()) {
		         wp_title(''); echo ' Archive - '; }
		      elseif (is_search()) {
		         echo 'Search for &quot;'.wp_specialchars($s).'&quot; - '; }
		      elseif (!(is_404()) && (is_single()) || (is_page())) {
		         wp_title(''); echo ' - '; }
		      elseif (is_404()) {
		         echo 'Not Found - '; }
		      if (is_home()) {
		         bloginfo('name'); echo ' - '; bloginfo('description'); }
		      else {
		          bloginfo('name'); }
		      if ($paged>1) {
		         echo ' - page '. $paged; }
		   ?>
	</title>
	
	<?php $browser = $_SERVER['HTTP_USER_AGENT'] . "\n\n";
		$search = strpos( $browser, 'Win64' );
		if ( $search != false && $search != 0 && $search != '' ) {
			// This is for IE9 64-bit.
			echo '<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE8"/>';
		} else {
			// And this is for IE9 32-bit.
			echo '<meta http-equiv="X-UA-Compatible" content="IE=8"/>';
	} ?>

	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
	<?php if ( is_singular() ) wp_enqueue_script('comment-reply'); ?>
	
	<!--[if lt IE 9]><script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->

	<?php wp_head(); ?>
	
	<script type="text/javascript">
		document.createElement('header');
		document.createElement('menu');
		document.createElement('nav');
		document.createElement('content');
		document.createElement('footer');
	</script>

</head>

<body <?php body_class(); ?>>

	<div id="header_wrapper">
		
		<header id="header">
		   <div id="header_logo">
				<a href="/"><img src="..." alt="..." />	</a>
		    </div>
		</header><!-- end header -->

		<menu>
			   <?php uberMenu_easyIntegrate(); ?>
		</menu>
	
	</div><!-- end header_wrapper -->
	
<content>
	
	<div class="wrapper">	