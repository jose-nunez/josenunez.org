<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package JoseNunez.org
 */

if(!is_active_sidebar( 'primary-widget-area')){return;}
?>

<aside id="sidebar" role="complementary">
	<div id="primary" class="widget-area">
		<ul class="xoxo">
			<?php dynamic_sidebar('primary-widget-area'); ?>
		</ul>
	</div>
</aside>