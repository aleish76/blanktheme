<?php
/*
Template Name: Template Page 1
*/
?>

<?php get_header(); ?>

<?php the_post(); ?>
<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="entry-content">
		<?php the_content(); ?>
		<?php wp_link_pages('before=<div class="page-link">' . __( 'Pages:', 'blankslate' ) . '&after=</div>') ?>
		<br />
		<?php edit_post_link( __( 'Edit', 'blankslate' ), '<span class="edit-link">', '</span>' ) ?>
	</div><!-- end entry content -->
</div><!-- end post -->

<?php get_footer(); ?>