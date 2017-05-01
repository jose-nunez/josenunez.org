<?php
add_action( 'after_setup_theme', 'josenunez_org_setup' );
function josenunez_org_setup(){
	$DIR = get_bloginfo('template_url');

	load_theme_textdomain( 'josenunez_org', $DIR . '/languages' );
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

	/* CUSTOM */
	wp_register_script('josenunez_main_js', $DIR.'/js/main.min.js');
	wp_register_style( 'font-awesome', $DIR .'/lib/font-awesome/css/font-awesome.min.css');
}

add_action( 'wp_enqueue_scripts', 'josenunez_org_load_scripts' );
function josenunez_org_load_scripts(){
	// wp_enqueue_script( 'jquery' );
	wp_enqueue_script('josenunez_main_js');
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