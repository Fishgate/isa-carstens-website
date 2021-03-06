<?php
// let's create the function for the custom type
function custom_post_staff() { 
	// creating (registering) the custom type 
	register_post_type( 'staff', /* (http://codex.wordpress.org/Function_Reference/register_post_type) */
		// let's now add all the options for this post type
		array( 'labels' => array(
			'name' => __( 'Staff Members', 'bonestheme' ), /* This is the Title of the Group */
			'singular_name' => __( 'Staff Member', 'bonestheme' ), /* This is the individual type */
			'all_items' => __( 'All Staff Members', 'bonestheme' ), /* the all items menu item */
			'add_new' => __( 'Add New', 'bonestheme' ), /* The add new menu item */
			'add_new_item' => __( 'Add New Staff Member', 'bonestheme' ), /* Add New Display Title */
			'edit' => __( 'Edit', 'bonestheme' ), /* Edit Dialog */
			'edit_item' => __( 'Edit Staff Members', 'bonestheme' ), /* Edit Display Title */
			'new_item' => __( 'New Staff Member', 'bonestheme' ), /* New Display Title */
			'view_item' => __( 'View Staff Member', 'bonestheme' ), /* View Display Title */
			'search_items' => __( 'Search Staff Members', 'bonestheme' ), /* Search Custom Type Title */ 
			'not_found' =>  __( 'Nothing found in the Database.', 'bonestheme' ), /* This displays if there are no entries yet */ 
			'not_found_in_trash' => __( 'Nothing found in Trash', 'bonestheme' ), /* This displays if there is nothing in the trash */
			'parent_item_colon' => ''
			), /* end of arrays */
			'description' => __( 'Staff Members custom post type for the ISApress theme.', 'bonestheme' ), /* Custom Type Description */
			'public' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'show_ui' => true,
			'query_var' => true,
			'menu_position' => 8, /* this is what order you want it to appear in on the left hand side menu */ 
			'menu_icon' => get_stylesheet_directory_uri() . '/library/images/users.png', /* the icon for the custom post type menu */
			'rewrite'	=> array( 'slug' => 'staff', 'with_front' => false ), /* you can specify its url slug */
			'has_archive' => 'staff', /* you can rename the slug here */
			'capability_type' => 'post',
			'hierarchical' => false,
			/* the next one is important, it tells what's enabled in the post editor */
			'supports' => array( 'title', 'thumbnail')
		) /* end of options */
	); /* end of register post type */
	
}

	// adding the function to the Wordpress init
	add_action( 'init', 'custom_post_staff');
        
        // now let's add custom categories (these act like categories)
	register_taxonomy( 'custom_cat', 
		array('staff'), /* if you change the name of register_post_type( 'custom_type', then you have to change this */
		array('hierarchical' => true,     /* if this is true, it acts like categories */
			'labels' => array(
				'name' => __( 'Staff Categories', 'bonestheme' ), /* name of the custom taxonomy */
				'singular_name' => __( 'Staff Category', 'bonestheme' ), /* single taxonomy name */
				'search_items' =>  __( 'Search Staff Categories', 'bonestheme' ), /* search title for taxomony */
				'all_items' => __( 'All Staff Categories', 'bonestheme' ), /* all title for taxonomies */
				'parent_item' => __( 'Parent Staff Category', 'bonestheme' ), /* parent title for taxonomy */
				'parent_item_colon' => __( 'Parent Staff Category:', 'bonestheme' ), /* parent taxonomy title */
				'edit_item' => __( 'Edit Staff Category', 'bonestheme' ), /* edit custom taxonomy title */
				'update_item' => __( 'Update Staff Category', 'bonestheme' ), /* update title for taxonomy */
				'add_new_item' => __( 'Add New Staff Category', 'bonestheme' ), /* add new title for taxonomy */
				'new_item_name' => __( 'New Staff Category Name', 'bonestheme' ) /* name title for taxonomy */
			),
			'show_admin_column' => true, 
			'show_ui' => true,
			'query_var' => true,
			'rewrite' => array( 'slug' => 'custom-slug' ),
		)
	);
	
	// change default post title text
        add_filter( 'enter_title_here', 'change_default_title_staff' );

        function change_default_title_staff( $title ){
             $screen = get_current_screen();

             if  ( 'staff' == $screen->post_type ) {
                  $title = 'Enter name here';
             }

             return $title;
        }
        
?>
