<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Onion
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>

<?php
	/* Get featured image url */
	$thumb_id = get_post_thumbnail_id();
	$thumb_url = wp_get_attachment_image_src($thumb_id,'thumbnail-size', true);
	/*echo $thumb_url[0];*/
?>
</head>

<body <?php body_class(); ?>>

	<div id="page" class="site">

	<a class="skip-link screen-reader-text" href="#main"><?php esc_html_e( 'Skip to content', 'onion' ); ?></a>

	<header class="navbar navbar-onion" role="navigation">
		<div class="container">
			<div class="clearfix">
				<button class="navbar-toggler pull-xs-right hidden-sm-up" type="button" data-toggle="collapse" data-target="#main-navigation" aria-expanded="true">
					&#9776;
				</button>
				<a class="navbar-brand hidden-sm-up" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
					<span class="icon-onion"></span>
				</a>
			</div>

			<div class="navbar-toggleable-xs collapse" id="main-navigation" aria-expanded="false">
				<a class="navbar-brand hidden-sm-down" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
					<span class="icon-onion"></span>
				</a>
				
				<?php 
					wp_nav_menu(array(
						'container' => false,
						'menu_class' => 'nav navbar-nav',
						'theme_location' => 'primary'
					));
				?>

				<?php 
					global $current_user;
					get_currentuserinfo();
				?>
				
				<?php if (is_user_logged_in()): ?>
					<div class="dropdown pull-xs-right">
						<button class="btn dropdown-toggle" type="button" id="user-menu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<?= get_avatar($current_user->user_email, 64) ?><?= $current_user->display_name ?>
						</button>
						<div class="dropdown-menu dropdown-menu-right" role="menu" aria-labelledby="user-menu">
							<a role="menuitem" tabindex="-1" href="https://auth.onion.io/realms/onion/account" class="dropdown-item" target="_blank">My Profile</a>
							<a role="menuitem" tabindex="-1" href="https://store.onion.io/account" class="dropdown-item">My Orders</a>
							<div class="dropdown-divider"></div>
							<a role="menuitem" tabindex="-1" class="dropdown-item" href="<?= wp_logout_url() ?>">Logout</a>
						</div>
					</div>
				<?php else: ?>
					<a class="btn btn-onion pull-xs-right" href="/login">Login</a>
				<?php endif; ?>
			</div>
		</div>
	</header>

	<div id="content" class="site-content">
