<?php
/**
 * Theme setup
 */

function theme_setup() {
    load_theme_textdomain( 'matttobin', get_template_directory() . '/languages' );
    add_theme_support( 'automatic-feed-links' );
    add_theme_support( 'title-tag' );
}