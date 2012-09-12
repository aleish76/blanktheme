<?php get_header(); ?>

<div class="inner_wrapper">

       <div class="clear10"></div>
      
      <?php get_sidebar(); ?>
      

   <h1>Search Results</h1>
   
   <div class="clear20"></div>
   
	<?php while (have_posts()) : the_post(); ?>

    <div class="search_results">

		<strong><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></strong>

		<?php the_excerpt() ;?>
	  
   </div>
		<?php endwhile; ?>

	<!-- Pagination -->
	<div class="clear10"> </div>
	
			<div class="pagination">
				<?php if(function_exists('wp_paginate')) {wp_paginate();} ?>
			<div class="clear5"></div>
	
			</div> <!-- end pagination -->

	</div> <!-- end inner_wrapper -->
	
<?php get_footer(); ?>