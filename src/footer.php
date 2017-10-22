<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package JoseNunez.org
 */

?>
			<!-- <div class="clear"></div> -->
		</div><!-- #container -->
		
		<?php /*

		<footer id="footer" role="contentinfo">
			<div id="copyright">
				<?php echo sprintf( __( '%1$s %2$s %3$s. All Rights Reserved.', 'josenunez_org' ), '&copy;', date( 'Y' ), esc_html( get_bloginfo( 'name' ) ) ); echo sprintf( __( ' Theme By: %1$s.', 'josenunez_org' ), '<a href="http://tidythemes.com/">TidyThemes</a>' ); ?>
			</div>
		</footer>
		*/ ?>

		<footer>
			<div class="disclaimer">
				Design inspired on <a href="http://demos.webicode.com/html/zap/" target="_blank" >ZAP</a> web template. Wordpress theme boilerplate: <a href="http://tidythemes.com/">BlankSlate</a>.
			</div>
		</footer>
		 <?php wp_footer(); ?>


	</div><!-- #wrapper -->
	<?php wp_footer(); ?>
</body>
</html>