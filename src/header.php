<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package JoseNunez.org
 */

?>
<?php $URL = get_bloginfo('template_url'); ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width" />
	<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_uri(); ?>" />
	<link rel="icon" href="<?php echo $URL ?>/img/favicon.ico">
	<?php wp_head(); ?>

	<script>
		var URL = "<?php echo $URL; ?>";
	</script>
</head>
<body <?php body_class(); ?>>
	<div id="wrapper" class="hfeed">
		<header id="header" role="banner" style="background-image:url(<?php echo get_header_image(); ?>)">
			<div class="header-bg-dark">
				<!-- <div class="header-title-wrapper"> -->
					<section id="branding">
						<div id="site-title" class="header-title">

							<?php if(is_front_page() || is_home()): ?>
								<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_html(get_bloginfo('name')); ?>" rel="home">
									<h1 id="myname" class="myname mylang">Jos<span class="eng">e</span><span class="spa">é</span> N<span class="eng">u</span><span class="spa">ú</span><span class="eng">n</span><span class="spa">ñ</span>ez</h1>
									<h1 id="myprofession" class="myprofession mylang">Port<span class="spa">a</span>folio<span class="spa">s</span></h1>
								</a>
								<h2 id="site-description"><?php bloginfo('description','display'); ?></h2>
								<img id="mypic" class="mypic" src="<?php echo $URL; ?>/img/_avatar_2.jpg" title="Click me!">
							<?php  endif; ?>
						</div>
					</section>

				<!-- </div> -->
			</div>
		</header>
		
		<?php /*
		<nav id="menu" role="navigation">
			<div id="search"><?php get_search_form(); ?></div>
			<?php wp_nav_menu( array( 'theme_location' => 'main-menu' ) ); ?>
		</nav>
		 */?>

		<div id="container">