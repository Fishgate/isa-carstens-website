<?php

// let's create the function for the custom type
function custom_post_testimonials() {
	// creating (registering) the custom type 
	register_post_type( 'testimonials', /* (http://codex.wordpress.org/Function_Reference/register_post_type) */
		// let's now add all the options for this post type
		array( 'labels' => array(
			'name' => __( 'Testimonials', 'bonestheme' ), /* This is the Title of the Group */
			'singular_name' => __( 'Testimonial', 'bonestheme' ), /* This is the individual type */
			'all_items' => __( 'All Testimonials', 'bonestheme' ), /* the all items menu item */
			'add_new' => __( 'Add New', 'bonestheme' ), /* The add new menu item */
			'add_new_item' => __( 'Add New Testimonial', 'bonestheme' ), /* Add New Display Title */
			'edit' => __( 'Edit', 'bonestheme' ), /* Edit Dialog */
			'edit_item' => __( 'Edit Testimonials', 'bonestheme' ), /* Edit Display Title */
			'new_item' => __( 'New Testimonial', 'bonestheme' ), /* New Display Title */
			'view_item' => __( 'View Testimonial', 'bonestheme' ), /* View Display Title */
			'search_items' => __( 'Search Testimonials', 'bonestheme' ), /* Search Custom Type Title */ 
			'not_found' =>  __( 'Nothing found in the Database.', 'bonestheme' ), /* This displays if there are no entries yet */ 
			'not_found_in_trash' => __( 'Nothing found in Trash', 'bonestheme' ), /* This displays if there is nothing in the trash */
			'parent_item_colon' => ''
			), /* end of arrays */
			'description' => __( 'Testimonials custom post type for the ISApress theme.', 'bonestheme' ), /* Custom Type Description */
			'public' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'show_ui' => true,
			'query_var' => true,
			'menu_position' => 8, /* this is what order you want it to appear in on the left hand side menu */ 
			'menu_icon' => get_stylesheet_directory_uri() . '/library/images/balloon-quotation .png', /* the icon for the custom post type menu */
			'rewrite'	=> array( 'slug' => 'testimonials', 'with_front' => false ), /* you can specify its url slug */
			'has_archive' => 'testimonials', /* you can rename the slug here */
			'capability_type' => 'post',
			'hierarchical' => false,
			/* the next one is important, it tells what's enabled in the post editor */
			'supports' => array( 'title', 'editor')
		) /* end of options */
	); /* end of register post type */
        
}

// adding the function to the Wordpress init
add_action( 'init', 'custom_post_testimonials');

// change default post title text
add_filter( 'enter_title_here', 'change_default_title_testi' );

function change_default_title_testi( $title ){
     $screen = get_current_screen();
 
     if  ( 'testimonials' == $screen->post_type ) {
          $title = 'Enter name here';
     }
 
     return $title;
}


/**
 * Decided to use a plugin for now so this goes faster. 
 * There is a lot of work to finish before I leave...
 * 
 * 
 * 
 */

// adding meta boxes to post type
/*add_action('load-post.php', 'testi_post_meta_boxes_init');
add_action('load-post-new.php', 'testi_post_meta_boxes_init');

function testi_post_meta_boxes_init() {

	// add meta boxes on the 'add_meta_boxes' hook
	add_action( 'add_meta_boxes', 'testi_add_post_meta_boxes' );
}


function testi_add_post_meta_boxes() {

	add_meta_box(
		'testi-post-class',                                     // unique ID
		esc_html__( 'Company Name', 'bonestheme' ),		// title
		'testi_company_name_meta_box',                          // callback function
		'testimonials',                                         // post type)
		'side',                                                 // context
		'default'                                               // priority
	);
}

function testi_company_name_meta_box( $object, $box ) { 
    
    wp_nonce_field( basename( __FILE__ ), 'testi_company_name_nonce' );
    
    
}
*/

?>