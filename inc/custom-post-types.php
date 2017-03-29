<?php
/**
 * Custom Post Types
 *
 * @link https://codex.wordpress.org/Custom_Headers
 *
 * @package WordPress
 * @subpackage PU Hostels 2017
 * @since 1.0
 */

function create_post_type() {

    // Register Post Type : News
    register_post_type(
        'news',
        array(
            'labels' => array(
            'name' => __( 'News' ),
            'singular_name' => __( 'News' )
        ),
        'public' => true,
        'has_archive' => true,
        'rewrite' => array('slug' => 'news'),
        'supports' => array( 'title', 'editor' )
        )
    );

    // Register Post Type : Notice
    register_post_type(
        'notice',
        array(
            'labels' => array(
            'name' => __( 'Notice' ),
            'singular_name' => __( 'Notices' )
        ),
        'public' => true,
        'has_archive' => true,
        'rewrite' => array('slug' => 'notice'),
        'supports' => array( 'title', 'editor' )
        )
    );
}
add_action( 'init', 'create_post_type' );