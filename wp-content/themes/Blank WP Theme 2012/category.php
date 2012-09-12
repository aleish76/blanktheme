<?php get_header(); ?>

	<div class="inner_wrapper">

	 <div class="clear10"></div>
	 
	   <h1><?php wp_title("",true); ?></h1>
	  
		  <div class="clear10"></div>

			   <?php the_post(); ?>
					<?php $categorydesc = category_description(); if ( !empty($categorydesc) ) echo apply_filters( 'archive_meta', '<div class="archive-meta">' . $categorydesc . '</div>' ); ?>
					<?php rewind_posts(); ?>
					<?php global $wp_query; $total_pages = $wp_query->max_num_pages; if ( $total_pages > 1 ) { ?>
				<?php } ?>
				<?php while ( have_posts() ) : the_post(); ?>
				
				<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

		<div class="clear5"></div>
		
			<div class="blog_wrap">		

						 <div class="blog_title">	
							
							<h4><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h4>
							<div class="clear5"> </div>
							
							<?php the_excerpt() ;?>

						 </div>	<!-- end blog title -->	
					
				<div class="clear5"></div>

					<div class="blog_date">
					  <small><strong>Categories: </strong><?php the_category(' &bull; ') ?></small>
					</div>
					
				<div class="clear5"></div>
				
					<?php endwhile; ?>
					
				<div class="clear10"> </div>
				
				<div class="pagination">
					<?php if(function_exists('wp_paginate')) {wp_paginate();} ?>
					<div class="clear5"> </div>
				</div> <!-- end pagination -->

				<?php wp_reset_query(); ?>
				
				<div class="clear20"></div>
				
			</div> <!-- blog_wrap -->
		</div> <!-- post id -->
	</div> <!-- end inner_wrapper -->

<?php get_footer(); ?>