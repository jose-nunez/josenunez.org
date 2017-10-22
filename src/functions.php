<?php

//[foobar]
function shortode_divider( $atts ){
	return '<div class="divider divider-'. ($atts->style? $atts->style:'hammers') .'"></div>';
}
add_shortcode( 'divider', 'shortode_divider' );

/* ______________________________________________________________________________________-- */

add_action( 'after_setup_theme', 'josenunez_org_setup' );
function josenunez_org_setup(){
	$URL = get_bloginfo('template_url');

	load_theme_textdomain( 'josenunez_org', $URL . '/languages' );
	add_theme_support('title-tag');
	add_theme_support('automatic-feed-links');
	add_theme_support('post-thumbnails');
	
	add_theme_support( 'custom-header', apply_filters( 'josenunez_org_custom_header_args', array(
		// 'default-image'          => '',
		// 'default-text-color'     => '000000',
		// 'width'                  => 1000,
		// 'height'                 => 250,
		// 'flex-height'            => true,
		// 'wp-head-callback'       => 'josenunez_org_header_style',
	) ) );

	global $content_width;
	if ( ! isset( $content_width ) ) $content_width = 640;
	

	register_nav_menus(array( 'main-menu' => __( 'Main Menu', 'josenunez_org' ) ));
	register_nav_menus(array( 'social-menu' => __( 'Social Menu', 'josenunez_org' ) ));

	/* CUSTOM */
	wp_register_script('jno_main_js', $URL.'/js/main.min.js');
	wp_register_style( 'font-awesome', $URL .'/lib/font-awesome/css/font-awesome.min.css');
	wp_register_style( 'jno_style_admin', $URL . '/style_admin.css');

	add_option('jno_front_category_id',1);
}

add_action('switch_theme', 'josenunez_org_deactivate');
function josenunez_org_deactivate(){
	delete_option('jno_front_category_id');
}

add_action( 'wp_enqueue_scripts', 'josenunez_org_load_scripts' );
function josenunez_org_load_scripts(){
	// wp_enqueue_script( 'jquery' );
	wp_enqueue_script('jno_main_js');
	wp_enqueue_style( 'font-awesome');
}

add_action( 'comment_form_before', 'josenunez_org_enqueue_comment_reply_script' );
function josenunez_org_enqueue_comment_reply_script(){
	if ( get_option( 'thread_comments' ) ) { wp_enqueue_script( 'comment-reply' ); }
}

add_filter( 'the_title', 'josenunez_org_title' );
function josenunez_org_title( $title ) {
	if ( $title == '' ) {
		return '&rarr;';
	} else {
		return $title;
	}
}

add_filter( 'wp_title', 'josenunez_org_filter_wp_title' );
function josenunez_org_filter_wp_title( $title ){
	return $title . esc_attr( get_bloginfo( 'name' ) );
}

add_action( 'widgets_init', 'josenunez_org_widgets_init' );
function josenunez_org_widgets_init(){
	register_sidebar( array (
		'name' => __( 'Sidebar Widget Area', 'josenunez_org' ),
		'id' => 'primary-widget-area',
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => "</li>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
		));
}

function josenunez_org_custom_pings( $comment ){
	$GLOBALS['comment'] = $comment;
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>"><?php echo comment_author_link(); ?></li>
	<?php 
}
	
add_filter( 'get_comments_number', 'josenunez_org_comments_number' );
function josenunez_org_comments_number( $count ){
	if ( !is_admin() ) {
		global $id;
		$comments_by_type = &separate_comments( get_comments( 'status=approve&post_id=' . $id ) );
		return count( $comments_by_type['comment'] );
	} else {
		return $count;
	}
}


/* ********************************************************************* */
/* Admin */
add_action('admin_menu','josenunez_org_admin');
function josenunez_org_admin(){
	$URL = get_bloginfo('template_url');
	add_menu_page('JoseNunez.org', 'JoseNunez.org', 'administrator', __FILE__,'josenunez_org_admin_page',$URL.'/img/icon_20.png');
}


add_action('admin_init', 'josenunez_org_register_settings');
function josenunez_org_register_settings(){
	register_setting('jno_setting','jno_front_category_id');
}

function josenunez_org_admin_page(){
	if ( !current_user_can( 'manage_options' ) )  {
		wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
	}
	require_once 'admin/admin.php';
}

add_action( 'admin_enqueue_scripts', 'josenunez_org_admin_style' );
function josenunez_org_admin_style() {
	wp_enqueue_style( 'jno_style_admin' );
}