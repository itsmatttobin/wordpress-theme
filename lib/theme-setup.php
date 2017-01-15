<?php

// Theme setup
function lf_theme_setup() {
    load_theme_textdomain( 'textdomain', get_template_directory() . '/languages' );
    add_theme_support( 'automatic-feed-links' );
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
}
add_action( 'after_setup_theme', 'lf_theme_setup' );


// Script and styles
function lf_scripts_styles() {
	// Comments script
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	// Stylesheets
	wp_enqueue_style( 'lf-style', get_template_directory_uri() . '/assets/css/dist/style.min.css', false, null );

	// Scripts
	wp_enqueue_script( 'lf-script', get_template_directory_uri() . '/assets/js/dist/functions.min.js', array('jquery'), null, true );
}
add_action( 'wp_enqueue_scripts', 'lf_scripts_styles' );


// Nav menus
function lf_nav_menus() {
	register_nav_menus(
		array(
			'main-menu' => __( 'Main Menu' )
		)
	);
}
add_action( 'init', 'lf_nav_menus' );


// Sidebars
function lf_sidebars() {
	// Default sidebar
	register_sidebar( array(
		'name'          => 'Default Sidebar',
		'id'            => 'sidebar-default',
		'before_widget' => '<div id="%1$s" class="widget sidebar-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'lf_sidebars' );


// Navigation - update coming from twentythirteen
function post_navigation() {
	echo '<div class="navigation">';
	echo '	<div class="next-posts">'.get_next_posts_link('&laquo; Older Entries').'</div>';
	echo '	<div class="prev-posts">'.get_previous_posts_link('Newer Entries &raquo;').'</div>';
	echo '</div>';
}


// Posted On
function posted_on() {
	printf( __( '<span class="sep">Posted </span><a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s" pubdate>%4$s</time></a> by <span class="byline author vcard">%5$s</span>', '' ),
		esc_url( get_permalink() ),
		esc_attr( get_the_time() ),
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_author() )
	);
}