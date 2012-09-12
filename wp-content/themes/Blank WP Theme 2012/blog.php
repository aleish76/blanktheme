<?php
/*
Template Name: Blog Template
*/
?>

<?php get_header(); ?>

	<div class="inside_wrapper">

	<!-- START BLOG LOOP -->
 
		 <div class="blog_loop">
		 
		 <?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1; query_posts("category_name=CategoryHere&showposts=6&paged=$paged"); ?>

			<?php while (have_posts()) : the_post(); ?> 
			
			<div class="clear0"> </div>
			
			<div class="blogpost_wrap">		
				<div class="blog_image rollover">
					<?php
					if( has_post_thumbnail() ) { ?>
					<a href=<?php the_permalink(); ?>><?php the_post_thumbnail('post-thumb'); ?></a>
					<?php } else { ?>
					<a href=<?php the_permalink(); ?>><div style=""><img src="insert default post thumbnail here" width="150" height="150" title="<?php the_title(); ?>" /></div></a>
					<?php } ?>
				</div> <!-- end blog image -->

					<div class="blog_title">	
						<h3 class="blogtitletext"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h3>
					<?php the_excerpt() ;?>
					</div>	<!-- end blog title -->	
					
					<div class="clear0"> </div>

					<div class="blog_date">
						<?php the_time('F jS, Y') ?>	
					</div>

				<div class="clear0"> </div>		

				<?php endwhile; ?>
			
			</div> <!-- blogpost_wrap -->

			<!-- Pagination -->
			<div class="clear0"> </div>
			<div class="pagination">
					<?php if(function_exists('wp_paginate')) {
						wp_paginate();
						} ?>
				<div class="clear0"> </div>
			</div> <!-- end pagination -->
			
		</div> <!-- end blog_loop -->	

		<?php wp_reset_query(); ?>

		<!-- END BLOG LOOP -->

	</div> <!-- end inside_wrapper -->

<?php get_footer(); ?>