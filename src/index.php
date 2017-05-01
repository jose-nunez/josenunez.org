<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package JoseNunez.org
 */

get_header(); ?>

	<h1>My works</h1>
	<div class="divider divider-hammers"></div>
	<div class="boxes-container">

			<section id="content" role="main">
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
					<?php get_template_part( 'entry',get_post_format()); ?>
					<?php comments_template(); ?>
				<?php endwhile; endif; ?>
				<?php get_template_part( 'nav', 'below' ); ?>
			</section>

	</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>


<?php /*


<?php $URL = get_bloginfo('template_url'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Welcome to Jose Nunez Portfolio</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php
		wp_register_script('josenunez_main_js',$URL.'/js/main.min.js');
		if(wp_script_is('josenunez_main_js','registered') && !wp_script_is('josenunez_main_js','enqueued')) wp_enqueue_script('josenunez_main_js');

		wp_enqueue_style( 'font-awesome', $URL.'/lib/font-awesome/css/font-awesome.min.css');

		wp_head();
	?>
	<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />

	<script>
		var URL = "<?php echo $URL; ?>";
	</script>
</head>
<body>
	<header class="main-header">
		<div class="header-bg-dark">
			<div class="header-title-wrapper">
				<div class="header-title">
					<h1 id="myname" class="myname mylang">Jos<span class="eng">e</span><span class="spa">é</span> N<span class="eng">u</span><span class="spa">ú</span><span class="eng">n</span><span class="spa">ñ</span>ez</h1>
					<h1 id="myprofession" class="myprofession mylang">Port<span class="spa">a</span>folio<span class="spa">s</span></h1>
					<!-- <img class="mypic" src="img/_avatar.jpg"> -->
					<img id="mypic" class="mypic" src="<?php echo $URL; ?>/img/_avatar2_crop.jpg" title="Click me!">
				</div>
			</div>
		</div>
	</header>
	<div class="main-container">
		<article>
				<h1>My works</h1>
				<div class="divider divider-hammers"></div>
				<div class="boxes-container">
					<div class="box-item">
						<!-- <div class="box-img" style="background-image:url('img/works/cafemanager.png')"> -->
						<div class="box-img"><img src="<?php echo $URL; ?>/img/works/cafemanager.png" /></div>
						<h3 class="box-title">Cafe Manager</h3>
						<!-- 
						<ul class="box-list">
							<li>Angular JS</li>
							<li>Node JS</li>
							<li>Foundation Apps</li>
						</ul>
						 -->
						<div class="box-links">
								<a href="http://cafemanager.josenunez.org/#/" target="_blank">
									<div class="link-button">
										<span class="fa-stack fa-lg">
											<!-- <i class="fa fa-circle fa-stack-2x"></i>
											<i class="fa fa-link fa-stack-1x fa-inverse"></i> -->
											<i class="fa fa-home fa-stack-2x"></i>
										</span>
										<br />
										Demo</div></a>
								<a href="https://github.com/peponerock/cafemanager" target="_blank">
									<div class="link-button">
										<span class="fa-stack fa-lg">
											<i class="fa fa-github fa-2x" aria-hidden="true"></i>
										</span>
										<br />
										Client</div></a>
								<a href="https://github.com/peponerock/cafemanager_server" target="_blank">
									<div class="link-button">
										<span class="fa-stack fa-lg">
											<i class="fa fa-github fa-2x" aria-hidden="true"></i>
										</span>
										<br />
										Server</div></a>
						</div>
						<div class="box-content">
							Angular.js, Socket.io, Foundation, SASS, Node.js, Sequelize JS.
						</div>
					</div>
					<div class="box-item">
						<!-- <div class="box-img" style="background-image:url('img/works/bicimapa.png')"> -->
						<div class="box-img"><img src="<?php echo $URL; ?>/img/works/bicimapa.png" /></div>
						<h3 class="box-title">Bicimapa</h3>
						<div class="box-links">
								<a href="http://bicimapa.josenunez.org" target="_blank">
									<div class="link-button">
										<span class="fa-stack fa-lg">
											<!-- <i class="fa fa-circle fa-stack-2x"></i>
											<i class="fa fa-link fa-stack-1x fa-inverse"></i> -->
											<i class="fa fa-home fa-stack-2x"></i>
										</span>
										<br />
										Demo
									</div>
								</a>
								<a href="https://github.com/peponerock/bicimapa" target="_blank">
									<div class="link-button">
										<span class="fa-stack fa-lg"><i class="fa fa-github fa-2x" aria-hidden="true"></i></span>
										<br />
										Github
									</div>
								</a>
						</div>
						<div class="box-content">
							JQuery, Foundation, LeafletJS, Wordpress, PHP, MySql
						</div>
					</div>
					<div class="box-item">
						<!-- <div class="box-img" style="background-image:url('img/works/gladysarmijo.png')"> -->
						<div class="box-img"><img src="<?php echo $URL; ?>/img/works/gladysarmijo.png" /></div>
						
						<h3 class="box-title">Colectivo de Geografía Crítica Gladys Armijo</h3>
						<div class="box-links">
								<a href="http://geografiacritica.josenunez.org/" target="_blank">
									<div class="link-button">
										<span class="fa-stack fa-lg">
											<!-- <i class="fa fa-circle fa-stack-2x"></i>
											<i class="fa fa-link fa-stack-1x fa-inverse"></i> -->
											<i class="fa fa-home fa-stack-2x"></i>
										</span>
										<br />
										Demo
									</div>
								</a>
						</div>
						<div class="box-content">
							Wordpress
						</div>
					</div>
					<div class="box-item">
						<div class="box-img"><img src="<?php echo $URL; ?>/img/works/weatherconditions.png" /></div>
						
						<h3 class="box-title">Weather conditions Wordpress plugin</h3>
						<div class="box-links">
								<a href="http://wordpress.josenunez.org/2017/04/26/weather-conditions-demo/" target="_blank">
									<div class="link-button">
										<span class="fa-stack fa-lg"><i class="fa fa-home fa-stack-2x"></i></span>
										<br />
										Demo
									</div>
								</a>
								<a href="" target="_blank">
									<div class="link-button">
										<span class="fa-stack fa-lg"><i class="fa fa-github fa-2x" aria-hidden="true"></i></span>
										<br />
										Github
									</div>
								</a>
						</div>
						<div class="box-content">
							Wordpress
						</div>
					</div>
					<div class="box-item">
						<!-- <div class="box-img" style="background-image:url('img/works/portfolio.jpg')"> -->
						<div class="box-img"><img src="<?php echo $URL; ?>/img/works/portfolio.jpg" /></div>
						<h3 class="box-title">This same portfolio</h3>
						<div class="box-links">
								<a href="https://github.com/peponerock/josenunez.org" target="_blank">
									<div class="link-button">
										<span class="fa-stack fa-lg">
											<i class="fa fa-github fa-2x" aria-hidden="true"></i>
										</span>
										<br />
										Github
									</div>
								</a>
						</div>
						<div class="box-content">
							HTML5, CSS3, SASS
						</div>
					</div>
				</div>
		</article>

		<!-- <article>
			<h1>My Flickr Image Gallery</h1>
			<div class="divider divider-hammers"></div>
			<p>
				<a data-flickr-embed="true" data-header="true" data-footer="true"  href="https://www.flickr.com/gp/peponerock/1v23U4" title="India" target="_blank">
				<img src="https://c1.staticflickr.com/8/7460/27550459275_a02fd78232_h.jpg" width="100%" height="100%" alt="India"></a>
				<script async src="//embedr.flickr.com/assets/client-code.js" charset="utf-8"></script>
			</p>
		</article> -->
	</div>

	<footer>
		<div class="disclaimer">
			Based on <a href="http://demos.webicode.com/html/zap/" target="_blank" >ZAP</a> web template.
		</div>
	</footer>
	 <?php wp_footer(); ?>
</body>
</html>


*/?>