	
<?php /* Template Name: TEST */ ?>

<?php $URL = get_bloginfo('template_url'); ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<script>
		var siteURL = "<?php echo $URL; ?>";
	</script>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width" />
	<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_uri(); ?>" />
	<link rel="icon" href="<?php echo $URL ?>/img/favicon.ico">

	<script type="text/javascript" src="<?php echo $URL.'/js/test.js'; ?>"></script>
	<?php 
		// wp_head(); 
	?>

</head>
<body <?php body_class(); ?>>
	Holita
</body>
</html>