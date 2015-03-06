<?php

// let's create the function for the custom type
function custom_post_blog() { 
	// creating (registering) the custom type 
	register_post_type( 'blog_type', /* (http://codex.wordpress.org/Function_Reference/register_post_type) */
		// let's now add all the options for this post type
		array( 'labels' => array(
			'name' => __( 'Blog', 'bonestheme' ), /* This is the Title of the Group */
			'singular_name' => __( 'Blog Post', 'bonestheme' ), /* This is the individual type */
			'all_items' => __( 'All Blog Posts', 'bonestheme' ), /* the all items menu item */
			'add_new' => __( 'Add New', 'bonestheme' ), /* The add new menu item */
			'add_new_item' => __( 'Add New Blog Post', 'bonestheme' ), /* Add New Display Title */
			'edit' => __( 'Edit', 'bonestheme' ), /* Edit Dialog */
			'edit_item' => __( 'Edit Post Types', 'bonestheme' ), /* Edit Display Title */
			'new_item' => __( 'New Post Type', 'bonestheme' ), /* New Display Title */
			'view_item' => __( 'View Post Type', 'bonestheme' ), /* View Display Title */
			'search_items' => __( 'Search Post Type', 'bonestheme' ), /* Search Blog Post Title */ 
			'not_found' =>  __( 'Nothing found in the Database.', 'bonestheme' ), /* This displays if there are no entries yet */ 
			'not_found_in_trash' => __( 'Nothing found in Trash', 'bonestheme' ), /* This displays if there is nothing in the trash */
			'parent_item_colon' => ''
			), /* end of arrays */
			'description' => __( 'This is the blog post type for Isa Carstens', 'bonestheme' ), /* Blog Post Description */
			'public' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'show_ui' => true,
			'query_var' => true,
			'menu_position' => 8, /* this is what order you want it to appear in on the left hand side menu */ 
			'menu_icon' => get_stylesheet_directory_uri() . '/library/images/custom-post-icon.png', /* the icon for the custom post type menu */
			'rewrite'	=> array( 'slug' => 'blog', 'with_front' => false ), /* you can specify its url slug */
			'has_archive' => 'blog', /* you can rename the slug here */
			'capability_type' => 'post',
			'hierarchical' => false,
			/* the next one is important, it tells what's enabled in the post editor */
			'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'trackbacks', '', 'comments', 'revisions', 'sticky')
		) /* end of options */
	); /* end of register post type */
	
}

	// adding the function to the Wordpress init
	add_action( 'init', 'custom_post_blog');
	
	/*
	for more information on taxonomies, go here:
	http://codex.wordpress.org/Function_Reference/register_taxonomy
	*/
	
	// now let's add custom categories (these act like categories)
	register_taxonomy( 'blog_categories', 
		array('blog_type'), /* if you change the name of register_post_type( 'blog_type', then you have to change this */
		array('hierarchical' => true,     /* if this is true, it acts like categories */
			'labels' => array(
				'name' => __( 'Blog Categories', 'bonestheme' ), /* name of the custom taxonomy */
				'singular_name' => __( 'Blog Category', 'bonestheme' ), /* single taxonomy name */
				'search_items' =>  __( 'Search Blog Categories', 'bonestheme' ), /* search title for taxomony */
				'all_items' => __( 'All Blog Categories', 'bonestheme' ), /* all title for taxonomies */
				'parent_item' => __( 'Parent Blog Category', 'bonestheme' ), /* parent title for taxonomy */
				'parent_item_colon' => __( 'Parent Blog Category:', 'bonestheme' ), /* parent taxonomy title */
				'edit_item' => __( 'Edit Blog Category', 'bonestheme' ), /* edit custom taxonomy title */
				'update_item' => __( 'Update Blog Category', 'bonestheme' ), /* update title for taxonomy */
				'add_new_item' => __( 'Add New Blog Category', 'bonestheme' ), /* add new title for taxonomy */
				'new_item_name' => __( 'New Blog Category Name', 'bonestheme' ) /* name title for taxonomy */
			),
			'show_admin_column' => true, 
			'show_ui' => true,
			'query_var' => true,
			'rewrite' => array( 'slug' => 'blog/categories' ),
		)
	);
	
	// now let's add custom tags (these act like categories)
	register_taxonomy( 'blog_tags', 
		array('blog_type'), /* if you change the name of register_post_type( 'blog_type', then you have to change this */
		array('hierarchical' => false,    /* if this is false, it acts like tags */
			'labels' => array(
				'name' => __( 'Blog Tags', 'bonestheme' ), /* name of the custom taxonomy */
				'singular_name' => __( 'Blog Tag', 'bonestheme' ), /* single taxonomy name */
				'search_items' =>  __( 'Search Blog Tags', 'bonestheme' ), /* search title for taxomony */
				'all_items' => __( 'All Blog Tags', 'bonestheme' ), /* all title for taxonomies */
				'parent_item' => __( 'Parent Blog Tag', 'bonestheme' ), /* parent title for taxonomy */
				'parent_item_colon' => __( 'Parent Blog Tag:', 'bonestheme' ), /* parent taxonomy title */
				'edit_item' => __( 'Edit Blog Tag', 'bonestheme' ), /* edit custom taxonomy title */
				'update_item' => __( 'Update Blog Tag', 'bonestheme' ), /* update title for taxonomy */
				'add_new_item' => __( 'Add New Blog Tag', 'bonestheme' ), /* add new title for taxonomy */
				'new_item_name' => __( 'New Blog Tag Name', 'bonestheme' ) /* name title for taxonomy */
			),
			'show_admin_column' => true,
			'show_ui' => true,
			'query_var' => true,
		)
	);
	
	/*
		looking for custom meta boxes?
		check out this fantastic tool:
		https://github.com/jaredatch/Custom-Metaboxes-and-Fields-for-WordPress
	*/
	

?>
