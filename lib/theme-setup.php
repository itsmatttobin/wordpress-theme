<?php

// Theme version
define('MT_THEME_VERSION', '2.2.0');

// Theme setup
function mt_theme_setup() {
  load_theme_textdomain( 'textdomain', get_template_directory() . '/languages' );
  add_theme_support( 'automatic-feed-links' );
  add_theme_support( 'title-tag' );
  add_theme_support( 'post-thumbnails' );
}
add_action( 'after_setup_theme', 'mt_theme_setup' );


// Script and styles
function mt_scripts_styles() {
  // Comments script
  if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
    wp_enqueue_script( 'comment-reply' );

  // Stylesheets
  // Should an unminified stylesheet w/ sourcemaps be enqueued for debugging?
  if(isset($_GET['maps']))
    wp_enqueue_style( 'mt-style', get_template_directory_uri() . '/assets/css/src/style.css', false, MT_THEME_VERSION );
  else
    wp_enqueue_style( 'mt-style', get_template_directory_uri() . '/assets/css/dist/style.min.css', false, MT_THEME_VERSION );

  // Scripts
  wp_enqueue_script( 'mt-script', get_template_directory_uri() . '/assets/js/dist/functions.min.js', array('jquery'), MT_THEME_VERSION, true );
}
add_action( 'wp_enqueue_scripts', 'mt_scripts_styles' );


// Nav menus
function mt_nav_menus() {
  register_nav_menus(
    array(
      'main-menu' => __( 'Main Menu' )
    )
  );
}
add_action( 'init', 'mt_nav_menus' );


// Sidebars
function mt_sidebars() {
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
add_action( 'widgets_init', 'mt_sidebars' );


// Post navigation
function post_navigation() {
  echo '<div class="post-navigation">';
  the_posts_pagination();
  echo '</div>';
}


// Posted on
function posted_on() {
  printf( __( '<span class="sep">Posted </span><a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s" pubdate>%4$s</time></a> by <span class="byline author vcard">%5$s</span>', '' ),
    esc_url( get_permalink() ),
    esc_attr( get_the_time() ),
    esc_attr( get_the_date( 'c' ) ),
    esc_html( get_the_date() ),
    esc_attr( get_the_author() )
  );
}