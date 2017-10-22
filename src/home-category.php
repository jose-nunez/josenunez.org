<?php
/**
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package JoseNunez.org
 */

?>

	<!-- MY Works list! -->
	<?php 
		$cat_id=get_option('jno_front_category_id'); 
		query_posts( 'cat='.$cat_id ); 
	?>
	<?php /*
	<header id="<?= is_home()?"home-":"" ?>category-header" class="header">
	*/ ?>
	<header id="home-category-header" class="header">
		<h1><?php single_cat_title() ?></h1>
		<div class="divider divider-hammers"></div>
	</header>
	
	<?php if (category_description()): ?>
		<div class="paragraph justify text-columns-2"><?php echo category_description(); ?></div>
	<?php endif; ?>
	
	<section id="content" class="entry-container" role="main">
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<?php get_template_part( 'entry',get_post_format()); ?>
			<?php comments_template(); ?>
		<?php endwhile; endif; ?>
		
		<?php wp_reset_query(); ?>
		<?php get_template_part( 'nav', 'below' ); ?>
		
	</section>