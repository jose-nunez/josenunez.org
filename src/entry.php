
				<article id="post-<?php the_ID(); ?>" <?php post_class('entry-item '.get_post_meta(get_the_ID(),'post-class',true)); ?> > 
					<div class="entry-item-inner">
						<header class="entry-title entry-section">
								<?php if ( has_post_thumbnail() ) : ?>
									<div class="entry-img"><img src="<?php the_post_thumbnail_url(); ?>" /></div>
								<?php endif; ?>
								<?php if (is_singular()){ echo '<h1>'; } 
								else { echo '<h3>'; } ?>
									<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark"><?php the_title(); ?></a>
								<?php if ( is_singular() ) { echo '</h1>'; } 
								else { echo '</h3>'; } ?>
								<?php //edit_post_link(); ?>
								
								
								<?php if ( !is_search() ) get_template_part( 'entry', 'meta' ); ?>

						</header>
						<div class="entry-links">
							<?php $links = get_post_meta(get_the_ID(),'links',false); ?>
							<?php foreach($links as $link): $link = explode(',',$link); ?>
								<a href="<?php echo $link[2] ?>" target="_blank">
								<div class="link-button"><span class="fa-stack fa-lg"><i class="fa fa-<?php echo $link[0] ?> fa-2x" aria-hidden="true"></i></span><br /><?php echo $link[1] ?></div></a>
							<?php endforeach; ?>
						</div>
						<?php get_template_part( 'entry', ( is_archive() || is_search() ? 'summary' : 'content' ) ); ?>
						<?php if ( !is_search() ) get_template_part( 'entry-footer' ); ?>
					</div>
				</article>