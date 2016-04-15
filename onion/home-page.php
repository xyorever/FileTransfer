<?php
/**
 * Template Name: Homepage
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Onion
 */

get_header(); ?>


<?php putRevSlider( 'homepage-inventors' ); ?>

<?php putRevSlider( 'homepage-platform' ); ?>

<?php putRevSlider( 'homepage-omega' ); ?>

<?php putRevSlider( 'homepage-cloud' ); ?>

<?php putRevSlider( 'homepage-apps' ); ?>


	<header class="entry-header" style="display:none">
		<div id="cta">
			<!--<h1>Want to make your own smart mirror?</h1>
			<h2>Onion is the invention platform that let's you build amazing Internet of Things projects, whether you are a beginner or a guru</h2>-->
			<h1>The Invention Platform</h1>
			<h2>Easily build your WiFi connected device<br />using Python, Node.JS or C/C++</h2>
			<!--<h2>Easily build your WiFi connected device<br />using Python, Node.JS or C/C++</h2>-->
			<button id="start-video" type="button" class="btn btn-onion btn-lg t-margin-25">DISCOVER OMEGA</button>
		</div>
	</header><!-- .entry-header -->

	<div id="primary" class="container content-area">
		<main id="main" class="site-main" role="main">

			<!--<div id="products">
				<ul>
					<li><h2>Onion Omega</h2>A tiny, powerful WiFi development kit that makes it super easy to connect things in your world.</li>
					<li class="middle"><h2>Onion Cloud</h2>Take your connected devices to the next level; more connectivity, more control, more things to create.</li>
					<li><h2>Onion Apps</h2>Do more with your Omega with ready made apps or make your own app.</li>
				</ul>
				<div style="clear:both"></div>
			</div>-->

			<div id="projects" style="padding-top:60px;padding-bottom:50px;">
				<h2>Imagine. Create. Enjoy.</h2>
				<ul>
					<li id="p1"><a href="#"><img src="wp-content/themes/onion/images/airplay.jpg" /><span>Airplay</span></a></li>
					<li id="p2" class="middle"><a href="#"><img src="wp-content/themes/onion/images/bluetooth-audio.jpg" /><span>Bluetooth Audio</span></a></li>
					<li id="p3"><a href="#"><img src="wp-content/themes/onion/images/qr-code-display.jpg" /><span>QR Code Display</span></a></li>
					<li id="p4" ><a href="#"><img src="wp-content/themes/onion/images/smart-door-lock.jpg" /><span>Smart Door Lock</span></a></li>
					<li id="p5" class="middle"><a href="#"><img src="wp-content/themes/onion/images/stock-ticker.jpg" /><span>Stock Ticker</span></a></li>
					<li id="p6"><a href="#"><img src="wp-content/themes/onion/images/airplay.jpg" /><span>Other</span></a></li>
				</ul>
				<a href="#" class="btn btn-onion" role="button">View More Projects</a></span>
			</div>

			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'page' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
//get_sidebar();
get_footer();
