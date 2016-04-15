<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Onion
 */

get_header(); ?>

	<header class="entry-header">
		<h1 class="entry-title"><?php the_title(); ?></h1>
		<div class="entry-meta">
			<?php onion_posted_on(); ?>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->

	<div id="primary" class="container content-area">
		<main id="blog-main" class="site-main" role="main">

		<?php
		while ( have_posts() ) : the_post();

			get_template_part( 'template-parts/content', get_post_format() );

			//the_post_navigation();

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				//comments_template();
			endif;

		endwhile; // End of the loop.
		?>

		</main><!-- #main -->

		<?php get_sidebar(); ?>
	</div><!-- #primary -->

<?php
//get_sidebar();
get_footer();
