<?php get_header(); ?>

	<div id="inner_wrapper">

		<h1>Tags</h1>

		<div class="clear20"></div>

		<?php the_post(); ?>

		<h2 class="page-title"><?php _e( 'Tag: ', 'blankslate' ) ?> <span><?php single_tag_title() ?></span></h2>
		<br />

		<?php rewind_posts(); ?>

		<?php global $wp_query; $total_pages = $wp_query->max_num_pages; if ( $total_pages > 1 ) { ?>

		<?php } ?>

		<?php while ( have_posts() ) : the_post(); ?>

			<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

				<h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( __('Read', 'blankslate'), the_title_attribute('echo=0') ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>

				<div class="entry-meta">

					<small><span class="meta-prep meta-prep-entry-date"><?php _e('Posted ', 'blankslate'); ?></span>

					<span class="entry-date"><abbr class="published" title="<?php the_time('Y-m-d\TH:i:sO') ?>"><?php the_time( get_option( 'date_format' ) ); ?></abbr></span></small>

					<?php edit_post_link( __( 'Edit', 'blankslate' ), "<span class=\"meta-sep\"> | </span>\n\t\t\t\t\t\t<span class=\"edit-link\">", "</span>\n\t\t\t\t\t" ) ?>

				</div> <!-- entry-meta -->

				<div class="entry-utility">

					<span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'blankslate' ), __( '1 Comment', 'blankslate' ), __( '% Comments', 'blankslate' ) ) ?></span>

					<?php edit_post_link( __( 'Edit', 'blankslate' ), "<span class=\"meta-sep\"> | </span>\n\t\t\t\t\t\t<span class=\"edit-link\">", "</span>\n\t\t\t\t\t\n" ) ?>

					<div class="clear5"></div>

				</div> <!-- entry-utility -->

			</div> <!-- post- * -->

		<?php endwhile; ?>

		<?php global $wp_query; $total_pages = $wp_query->max_num_pages; if ( $total_pages > 1 ) { ?>

		<?php } ?>

	</div> <!-- inner_wrapper -->

<?php get_footer(); ?>