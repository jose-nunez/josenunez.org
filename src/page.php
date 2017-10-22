<?php get_header(); ?>
<section id="content" role="main">
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

			<header id="<?= is_front_page()?"home-":"" ?>page-header" class="header">
				<h1 class="entry-title"><?php the_title(); ?></h1>
				<div class="divider divider-hammers"></div>
				<?php edit_post_link(); ?>
			</header>

			<section class="entry-content">
				<?php if ( has_post_thumbnail() ) { the_post_thumbnail(); } ?>
				<?php the_content(); ?>
				<div class="entry-links"><?php wp_link_pages(); ?></div>
			</section>
		</article>

		<?php if(is_front_page()): ?>
			<?php get_template_part('home','category') ?>
		<?php endif; ?>

		<?php if ( ! post_password_required() ) comments_template( '', true ); ?>
	<?php endwhile; endif; ?>
</section>

<?php get_sidebar(); ?>
<?php get_footer(); ?>