<?php
/*
Author: Eddie Machado
URL: htp://themble.com/bones/

This is where you can drop your custom functions or
just edit things like thumbnail sizes, header images,
sidebars, comments, ect.
*/

/************* INCLUDE NEEDED FILES ***************/

/*
1. library/bones.php
	- head cleanup (remove rsd, uri links, junk css, ect)
	- enqueueing scripts & styles
	- theme support functions
	- custom menu output & fallbacks
	- related post function
	- page-navi function
	- removing <p> from around images
	- customizing the post excerpt
	- custom google+ integration
	- adding custom fields to user profiles
*/
require_once( 'library/bones.php' ); // if you remove this, bones will break

/*
2. Custom post types
        - library/testimonials-post-type.php
        - library/staff-post-type.php
        - library/jobs-post-type.php
*/ 
// Flush rewrite rules for custom post types
add_action( 'after_switch_theme', 'bones_flush_rewrite_rules' );

// Flush your rewrite rules
function bones_flush_rewrite_rules() {
	flush_rewrite_rules();
}
require_once( 'library/testimonials-post-type.php' );
//require_once( 'library/staff-post-type.php' );
require_once( 'library/jobs-post-type.php' );
require_once( 'library/cv-post-type.php' );
require_once( 'library/blog-post-type.php' );
/*
3. library/admin.php
	- removing some default WordPress dashboard widgets
	- an example custom dashboard widget
	- adding custom login css
	- changing text in footer of admin
*/
require_once( 'library/admin.php' ); // this comes turned off by default
/*
4. library/translation/translation.php
	- adding support for other languages
*/
// require_once( 'library/translation/translation.php' ); // this comes turned off by default
/*
5. library/shortcodes.php
	- Holds all the primary functions and hooks for shortcodes
*/
require_once( 'library/shortcodes.php' );

/************* THUMBNAIL SIZE OPTIONS *************/


// Thumbnail sizes
/*add_image_size( 'bones-thumb-600', 600, 150, true );
add_image_size( 'bones-thumb-300', 300, 100, true );*/
add_image_size( 'thumb-370', 370, 240, true ); //news articles and the likes thereof
add_image_size( 'thumb-275', 275, 120, true ); //home page 4 block feature
add_image_size( 'thumb-208', 208, 238, true ); //staff member pics
add_image_size( 'preview-1920', 1920, 602, true ); //homepage banner
add_image_size( 'preview-790', 790, 150, true ); //in content full width strip


/*
to add more sizes, simply copy a line from above
and change the dimensions & name. As long as you
upload a "featured image" as large as the biggest
set width or height, all the other sizes will be
auto-cropped.

To call a different size, simply change the text
inside the thumbnail function.

For example, to call the 300 x 300 sized image,
we would use the function:
<?php the_post_thumbnail( 'bones-thumb-300' ); ?>
for the 600 x 100 image:
<?php the_post_thumbnail( 'bones-thumb-600' ); ?>

You can change the names and dimensions to whatever
you like. Enjoy!
*/

add_filter( 'image_size_names_choose', 'bones_custom_image_sizes' );

function bones_custom_image_sizes( $sizes ) {
    return array_merge( $sizes, array(
        'bones-thumb-600' => __('600px by 150px'),
        'bones-thumb-300' => __('300px by 100px'),
    ) );
}



/*------ REMOVE AUTO P TAGS -----*/
//remove_filter('the_content', 'wpautop');

/*
The function above adds the ability to use the dropdown menu to select 
the new images sizes you have just created from within the media manager 
when you add media to your content blocks. If you add more image sizes, 
duplicate one of the lines in the array and name it according to your 
new image size.
*/

/************* ACTIVE SIDEBARS ********************/

// Sidebars & Widgetizes Areas
function bones_register_sidebars() {
	register_sidebar(array(
		'id' => 'general',
		'name' => __( 'General', 'bonestheme' ),
		'description' => __( 'The general sidebar that will be used for page templates which do not have their own specific sidebar defined.', 'bonestheme' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));
        
        register_sidebar(array(
		'id' => 'about',
		'name' => __( 'About', 'bonestheme' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));
        
        register_sidebar(array(
		'id' => 'somatology',
		'name' => __( 'Somatology', 'bonestheme' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));
        
        register_sidebar(array(
		'id' => 'marketing',
		'name' => __( 'Marketing', 'bonestheme' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));
        
        register_sidebar(array(
		'id' => 'treatments',
		'name' => __( 'Treatments', 'bonestheme' ),		
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));
        
        register_sidebar(array(
		'id' => 'news',
		'name' => __( 'News', 'bonestheme' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));
        
        
        register_sidebar(array(
		'id' => 'careers',
		'name' => __( 'Careers', 'bonestheme' ),		
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));
        
        register_sidebar(array(
		'id' => 'contact',
		'name' => __( 'Contact', 'bonestheme' ),		
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));
        
        register_sidebar(array(
		'id' => 'blog',
		'name' => __( 'Blog', 'bonestheme' ),		
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));
	

	/*
	to add more sidebars or widgetized areas, just copy
	and edit the above sidebar code. In order to call
	your new sidebar just use the following code:

	Just change the name to whatever your new
	sidebar's id is, for example:

	register_sidebar(array(
		'id' => 'sidebar2',
		'name' => __( 'Sidebar 2', 'bonestheme' ),
		'description' => __( 'The second (secondary) sidebar.', 'bonestheme' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));

	To call the sidebar in your template, you can just copy
	the sidebar.php file and rename it to your sidebar's name.
	So using the above example, it would be:
	sidebar-sidebar2.php

	*/
} // don't remove this bracket!

/************* COMMENT LAYOUT *********************/

// Comment Layout
function bones_comments( $comment, $args, $depth ) {
   $GLOBALS['comment'] = $comment; ?>
	<li <?php comment_class(); ?>>
		<article id="comment-<?php comment_ID(); ?>" class="clearfix">
			<header class="comment-author vcard">
				<?php
				/*
					this is the new responsive optimized comment image. It used the new HTML5 data-attribute to display comment gravatars on larger screens only. What this means is that on larger posts, mobile sites don't have a ton of requests for comment images. This makes load time incredibly fast! If you'd like to change it back, just replace it with the regular wordpress gravatar call:
					echo get_avatar($comment,$size='32',$default='<path_to_url>' );
				*/
				?>
				<?php // custom gravatar call ?>
				<?php
					// create variable
					$bgauthemail = get_comment_author_email();
				?>
				<img data-gravatar="http://www.gravatar.com/avatar/<?php echo md5( $bgauthemail ); ?>?s=32" class="load-gravatar avatar avatar-48 photo" height="32" width="32" src="<?php echo get_template_directory_uri(); ?>/library/images/nothing.gif" />
				<?php // end custom gravatar call ?>
				<?php printf(__( '<cite class="fn">%s</cite>', 'bonestheme' ), get_comment_author_link()) ?>
				<time datetime="<?php echo comment_time('Y-m-j'); ?>"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"><?php comment_time(__( 'F jS, Y', 'bonestheme' )); ?> </a></time>
				<?php edit_comment_link(__( '(Edit)', 'bonestheme' ),'  ','') ?>
			</header>
			<?php if ($comment->comment_approved == '0') : ?>
				<div class="alert alert-info">
					<p><?php _e( 'Your comment is awaiting moderation.', 'bonestheme' ) ?></p>
				</div>
			<?php endif; ?>
			<section class="comment_content clearfix">
				<?php comment_text() ?>
			</section>
			<?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
		</article>
	<?php // </li> is added by WordPress automatically ?>
<?php
} // don't remove this bracket!

/************* SEARCH FORM LAYOUT *****************/

// Search Form
function bones_wpsearch($form) {
	$form = '<form class="clearfix" role="search" method="get" id="searchform" action="' . home_url( '/' ) . '" >
	<label style="display: block;" class="screen-reader-text" for="s">' . __( 'Search for:', 'bonestheme' ) . '</label>
	<input style="width: 70%" class="left" type="text" value="' . get_search_query() . '" name="s" id="s" placeholder="' . esc_attr__( 'Search the Site...', 'bonestheme' ) . '" />
	<input style="width: 30%" class="left" type="submit" id="searchsubmit" value="' . esc_attr__( 'Search' ) .'" />
	</form>';
	return $form;
} // don't remove this bracket!


/************* REGISTER POST CONNECTIONS *****************/
// requires posts-to-posts plugin - https://github.com/scribu/wp-posts-to-posts/wiki
function p2p_connection_types() {
    p2p_register_connection_type( array(
        'name' => 'posts_to_posts',
        'from' => 'post',
        'to' => 'post',
        'reciprocal' => true,
        'title' => 'Related Articles'
    ));
    
    p2p_register_connection_type( array(
        'name' => 'testimonials_to_pages',
        'from' => 'testimonials',
        'to' => 'page',
        'reciprocal' => false,
        'title' => 'Related Pages',
        'admin_box' => 'from'
    ));
    
    p2p_register_connection_type( array(
        'name' => 'jobs_to_jobs',
        'from' => 'jobs',
        'to' => 'jobs',
        'reciprocal' => true,
        'title' => 'Related Jobs'
    ));
}

add_action( 'p2p_init', 'p2p_connection_types' );

/************* GET FEATURED IMAGE *****************/
// for use within the loop
function get_feature_image_url($size) {
    $thumb = wp_get_attachment_image_src( get_post_thumbnail_id(), $size);
    echo $thumb[0];
}

function get_parent_name() {
    
}

/**
 * Prepares the data of the latest news item to be used on the home page feature blocks.
 * The markup which makes up the feature, slider, and info are very seperated, so we prepare 
 * all the data here and just drizzle the properties of the object in the markup where it 
 * data is needed
 */
class news_data {
    public $arguments = array();
    public $title;
    public $excerpt;
    public $url;
    public $large_img_url;
    public $small_img_url;
    
    private $newsQuery;
    private $large_size = 'preview-1920';
    private $small_size = 'thumb-275';
    private $exceprt = array();
    
    private function get_feature_image_url($size) {
        $thumb = wp_get_attachment_image_src( get_post_thumbnail_id(), $size);
        return $thumb[0];
    }

    private function trim_excerpt () {
        $this->exceprt = explode(' ', get_the_excerpt());      
        $this->exceprt = array_slice($this->exceprt, 0, 19);        
        
        return implode(' ', $this->exceprt) . '...';
    }
    
    public function prep_data () {
        $this->newsQuery = new WP_Query($this->arguments);
        
        if ($this->newsQuery->have_posts()) {
            while ($this->newsQuery->have_posts()) {
                $this->newsQuery->the_post();
                
                // latest post title
                $this->title = get_the_title();
                
                // latest post excerpt
                $this->excerpt = $this->trim_excerpt();
                
                // latest post url
                $this->url = get_permalink(get_the_ID());
                
                if(has_post_thumbnail()){
                    // latest post large image url
                    $this->large_img_url = $this->get_feature_image_url($this->large_size);
                    
                    // latest post small image url
                    $this->small_img_url = $this->get_feature_image_url($this->small_size);                    
                }else{
                    // fall backs incase they dont upload any feature image
                    $this->large_img_url = 'http://placehold.it/1920x602';
                    $this->small_img_url = 'http://placehold.it/275x120';
                }
                
                
            }
            
            return true;
        }else{
            return false;
        }
        
        wp_reset_postdata();
    }
    
}

/*
 * Remove trash from the menu bar
 * 
 */

add_action( 'wp_before_admin_bar_render', 'remove_admin_bar_links' );

function remove_admin_bar_links() {
    global $wp_admin_bar;
    $wp_admin_bar->remove_menu('wp-logo');          // Remove the WordPress logo    
    $wp_admin_bar->remove_menu('new-content');      // Remove the content link
    $wp_admin_bar->remove_menu('ngg-menu');         // Remove nextgen gallery menu
    $wp_admin_bar->remove_menu('comments');         // Remove the comments link
}


/**
 * Hide admin bar from all users except the admin
 */

add_action('after_setup_theme', 'remove_admin_bar');

function remove_admin_bar() {
    if (!current_user_can('administrator') && !is_admin()) {
        show_admin_bar(false);
    }
}



/**
 * Front end admin form shortcode
 */

add_action( 'init', 'add_shortcodes' );

function add_shortcodes() {
    add_shortcode( 'login-form', 'login_form_shortcode' );
}

function login_form_shortcode() {
    if(!is_user_logged_in()) {
        return wp_login_form(array(
            'form_id' => 'loginform',
            'remember' => false,
            'echo' => false
        ));
    }
}

/**
 * logged in user admin bar
 */

function user_bar() {
    global $current_user;
    get_currentuserinfo();

    $logout_url = wp_logout_url($_SERVER['REQUEST_URI']);

    if (is_user_logged_in() && !current_user_can('administrator') && !is_admin()) :
        ?>

        <style>
            

            /* this needs to stay here, it will be writin in dynamicaly */
            body {
                margin-top: 32px;
            }
        </style>

        <div role="navigation" class="userbar">
            <div class="usernav">
                <strong>Hello <?php echo $current_user->user_nicename; ?>!</strong> | 
                
                <?php
                
                foreach($menuitems = get_nav_menu_from_location('user-links') as $item) {
                    echo "<a href=\"$item->url\" title=\"$item->title\">$item->title</a> | ";
                }
                
                ?>
                
                <a href="<?php echo $logout_url; ?>" title="Logout">Logout</a>
            </div>
        </div>

        <?php
    endif;
}

/**
* Disable row actions for cv posts
*
* @see WP_Posts_List_Table::single_row()
*
* @param array $actions An array of row actions, keys corresponding to the span class attribute of each element.
* @param object $post The post object.
*
* @return array The row actions array.
*/

add_filter( 'post_row_actions', 'cv_no_posts_actions', 10, 2 );

function cv_no_posts_actions($actions, $post){
    //check for your post type
    if ($post->post_type == "cv"){
        /*do you stuff here
        you can unset to remove actions
        and to add actions ex:
        $actions['in_google'] = '<a href="http://www.google.com/?q='.get_permalink($post->ID).'">check if indexed</a>';
        */
        
        unset( $actions['inline hide-if-no-js'] );
        unset( $actions['edit'] );
        unset( $actions['view'] );
        unset( $actions['trash'] );
    }
    
    return $actions;
}

/**
 * Remove the edit slug bar from the cv post type, make it not look like posts at all!
 * 
 * @global type $post_type
 */
function posttype_admin_css() {
    global $post_type;
    
    if($post_type == "cv") {
        echo '<style type="text/css">#edit-slug-box, #misc-publishing-actions, #preview-action, #minor-publishing-actions{display: none;}</style>';
    }
}

add_action( 'admin_head-post-new.php', 'posttype_admin_css' );
add_action( 'admin_head-post.php', 'posttype_admin_css' );

/**
 * Custom settings menu
 * 
 */

function setup_theme_admin_menus() {  
    add_menu_page('Isa Carstens Theme Settings', 'Theme Settings', 'manage_options', 'isapress-settings', 'theme_settings_page', null, null );
}  

function theme_settings_page() {
    require_once('library/themesettings.php');
}

add_action("admin_menu", "setup_theme_admin_menus");

/**
 * Latest news for footer
 * 
 */
function get_latest_news() {
    $latestnews = new WP_Query(array(
        'post_type' => 'post',
        'posts_per_page' => 5, 
        'order' => 'DESC',
        'orderby' => 'date',
    ));
    
    if($latestnews->have_posts()) :
        ?>
        <h3>latest news</h3>
        <div class="foot-news-holder">
            <?php
            while($latestnews->have_posts()) :
                $latestnews->the_post();
                ?>
                <a class="foot-news-link" href="<?php echo get_permalink(get_the_ID()); ?>"><?php the_title(); ?></a>
                <?php
            endwhile;
            ?>
        </div>        
        <?php
    endif;
}

/**
 * A small function that only outputs the html if the 
 * wordpress option in the backend is set and not empty
 * 
 */

function output_option ($option, $output) {

    $thisoption = trim(get_option($option));
    if(!empty($thisoption)){
        printf($output, nl2br(stripslashes(get_option($option))));
    }
}

?>