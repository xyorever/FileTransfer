<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Onion
 */

?>

	</div><!-- #content -->

	<div class="container">
		<div id="press-logos">
			<ul>
				<li><img src="http://localhost:8888/Onion/wp-content/themes/onion/images/press-logos/techcrunch.gif" /></li>
				<li><img src="http://localhost:8888/Onion/wp-content/themes/onion/images/press-logos/makezine.gif" /></li>
				<li><img src="http://localhost:8888/Onion/wp-content/themes/onion/images/press-logos/hackaday.gif" /></li>
				<li><img src="http://localhost:8888/Onion/wp-content/themes/onion/images/press-logos/techvibes.gif" /></li>
				<li><img src="http://localhost:8888/Onion/wp-content/themes/onion/images/press-logos/postscapes.gif" /></li>
			</ul>
		</div>
	</div>

	<!-- footer -->
	<footer class="footer-onion p-y-3">
		<div class="container">

			<div class="row m-b-2">
				<div class="col-lg-5">
					<p class="subscribe">Stay in touch! Sign up for our email updates.</p>
				</div>
				<div class="col-lg-7">
					<form id="mc-embedded-subscribe-form" class="form-inline" action="//onion.us10.list-manage.com/subscribe/post-json?u=cfcf97565ba83d5c6eefdedae&amp;id=c02d5e7ba4&c=?" method="GET">
						<div class="form-group">
							<label class="sr-only" for="mce-EMAIL">Email address</label>
							<input type="email" name="EMAIL" id="mce-EMAIL" class="form-control subscribe-input" placeholder="Email" />
						</div>
						<div class="form-group hidden">
							<label class="sr-only"></label>
							<input type="hidden" name="b_cfcf97565ba83d5c6eefdedae_c02d5e7ba4" tabindex="-1" value="" />
						</div>
						<button type="submit" class="btn btn-danger">Subscribe!</button>
					</form>
				</div>
			</div>

			<div class="row">
				<div class="col-lg-4">
					<p class="copyright m-b-0">&copy; <?php echo date('Y'); ?> Onion Corporation</p>
					<p><a href="/tos">Terms of Service</a> | <a href="/privacy">Privacy Policy</a></p>
				</div>
				<div class="col-lg-2">
					<h5>Products</h5>
					<?php 
						wp_nav_menu(array(
							'menu' => 'products',
							'container' => false,
							'theme_location' => 'products', 
						));
					?>
				</div>
				<div class="col-lg-2">
					<h5>Company</h5>
					<?php 
						wp_nav_menu(array(
							'menu' => 'company',
							'container' => false,
							'theme_location' => 'company', 
						));
					?>
				</div>
				<div class="col-lg-2">
					<h5>Resources</h5>
					<?php 
						wp_nav_menu(array(
							'menu' => 'resources',
							'container' => false,
							'theme_location' => 'resources', 
						));
					?>
				</div>
				<div class="col-lg-2">
					<h5>Connect</h5>
					<ul>
						<li><a href="https://twitter.com/OnionIoT" target="_blank"><span class="social social-twitter m"></span>&nbsp;Twitter</a></li>
						<li><a href="https://www.facebook.com/OnionIoT" target="_blank"><span class="social social-facebook"></span>&nbsp;Facebook</a></li>
						<li><a href="https://www.youtube.com/OnionIoT" target="_blank"><span class="social social-youtube"></span>&nbsp;YouTube</a></li>
						<li><a href="https://github.com/OnionIoT" target="_blank"><span class="social social-github"></span>&nbsp;GitHub</a></li>
					</ul>
				</div>
			</div>
		</div>
	</footer>
	<!-- /footer -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
