<?php
// let's create the function for the custom type
function custom_post_CV() { 
	// creating (registering) the custom type 
	register_post_type( 'CV', /* (http://codex.wordpress.org/Function_Reference/register_post_type) */
		// let's now add all the options for this post type
		array( 'labels' => array(
			'name' => __( 'CV Applications', 'bonestheme' ), /* This is the Title of the Group */
			'singular_name' => __( 'CV Application', 'bonestheme' ), /* This is the individual type */
			'all_items' => __( 'All CV Applications', 'bonestheme' ), /* the all items menu item */
			'add_new' => __( 'Add New', 'bonestheme' ), /* The add new menu item */
			'add_new_item' => __( 'Add New CV Application', 'bonestheme' ), /* Add New Display Title */
			'edit' => __( 'Edit', 'bonestheme' ), /* Edit Dialog */
			'edit_item' => __( 'Edit CV Applications', 'bonestheme' ), /* Edit Display Title */
			'new_item' => __( 'New CV Application', 'bonestheme' ), /* New Display Title */
			'view_item' => __( 'View CV Applications', 'bonestheme' ), /* View Display Title */
			'search_items' => __( 'Search CV Applications', 'bonestheme' ), /* Search Custom Type Title */ 
			'not_found' =>  __( 'Nothing found in the Database.', 'bonestheme' ), /* This displays if there are no entries yet */ 
			'not_found_in_trash' => __( 'Nothing found in Trash', 'bonestheme' ), /* This displays if there is nothing in the trash */
			'parent_item_colon' => ''
			), /* end of arrays */
			'description' => __( 'A post type to store all the front end CV applications on the website', 'bonestheme' ), /* Custom Type Description */
			'public' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'show_ui' => true,
			'query_var' => true,
			'menu_position' => 8, /* this is what order you want it to appear in on the left hand side menu */ 
			'menu_icon' => get_stylesheet_directory_uri() . '/library/images/folder-open-document-text.png', /* the icon for the custom post type menu */
			'rewrite'	=> array( 'slug' => 'cv', 'with_front' => false ), /* you can specify its url slug */
			'has_archive' => 'cv', /* you can rename the slug here */
			'capability_type' => 'post',
                        'capabilities' => array(
                            'create_posts' => false, // Removes support for the "Add New" function
                        ),
                        'map_meta_cap' => true,
			'hierarchical' => false,
			/* the next one is important, it tells what's enabled in the post editor */
			'supports' => array( 'title', 'thumbnail' )
		) /* end of options */
	); /* end of register post type */
	
        
}

	// adding the function to the Wordpress init
	add_action( 'init', 'custom_post_CV');
	
        // change default post title text
        add_filter( 'enter_title_here', 'change_default_title_cv' );

        function change_default_title_cv( $title ){
             $screen = get_current_screen();

             if  ( 'cv' == $screen->post_type ) {
                  $title = 'Full Name';
             }

             return $title;
        }

?>
