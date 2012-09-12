<?php get_header(); ?>

<?php the_post(); ?>


<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<center>
<h1 class="entry-title"><?php the_title(); ?></h1>

<div class="entry-meta">

<span class="entry-date"><abbr class="published" title="<?php the_time('Y-m-d\TH:i:sO') ?>"><?php the_time( get_option( 'date_format' ) ); ?></abbr></span>
<?php edit_post_link( __( 'Edit', 'blankslate' ), "<span class=\"meta-sep\"> | </span>\n\t\t\t\t\t\t<span class=\"edit-link\">", "</span>\n\t\t\t\t\t" ) ?>
</div>
</center>
<br />

<div class="entry-content">
<?php the_content(); ?>
<?php wp_link_pages('before=<div class="page-link">' . __( 'Pages:', 'blankslate' ) . '&after=</div>') ?>
</div>

<br />
<div class="entry-utility">

<?php edit_post_link( __( 'Edit', 'blankslate' ), "\n\t\t\t\t\t<span class=\"edit-link\">", "</span>" ) ?>
</div>
</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>