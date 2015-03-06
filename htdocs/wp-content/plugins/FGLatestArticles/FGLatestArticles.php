<?php
/*
Plugin Name: FGLatestArticles
Plugin URI: http://fishgate.co.za
Description: This plugin lists the most recent posts of a selected post type with links in the side bar.
Version: 1.0
Author: Kyle Vermeulen <kyle@source-lab.co.za>
Author URI: http://source-lab.co.za/
*/

class FGLatestArticles extends WP_Widget {
    function __construct() {
        parent::__construct('wp_fglatestarticles', __('FG Latest Articles', 'bonestheme'), array(
            'description' => __('This widget lists the most recent posts of a select post type with links in the side bar.', 'bonestheme'),
        ));
    }
    
    // front end of the widget
    public function widget ($args, $instance) {
        $title = !empty($instance['title']) ? $instance['title'] : ' ';
        $filter_title = !empty($title) ? apply_filters('widget_title', $title) : ' ';
        
        echo $args['before_widget'];
        
        // Get the term id of the post you are currently viewing within the loop
        $current_page_id = get_the_ID();
    
        // Get all categories
        if(isset($instance['posttype']) && !empty($instance['posttype'])) {
            $post_args = array(
                'posts_per_page'   => $instance['numposts'],
                'post_type'        => $instance['posttype'],
                'orderby'          => 'post_date',
                'order'            => 'DESC',
            );
        }else{
            $post_args = array(
                'posts_per_page'   => $instance['numposts'],
                'post_type'        => 'post',
                'orderby'          => 'post_date',
                'order'            => 'DESC',
            );
        }
        
        echo $args['before_title'] . $filter_title . $args['after_title'];
        
        ?>

        <ul>
            <?php
            $latestposts = new WP_Query($post_args);
        
            if($latestposts->have_posts()) :
                while($latestposts->have_posts()) :
                    $latestposts->the_post();
            
                    if(is_single() && $current_page_id === get_the_ID()) :
                        echo '<li class="cat-item"> <a class="current" href="' . get_permalink(get_the_ID()) . '" title="' . sprintf( __( "View %s" ), get_the_title() ) . '" ' . '><strong>' . get_the_title(). '</strong></a> </li> ';
                    else :
                        echo '<li class="cat-item"> <a href="' . get_permalink(get_the_ID()) . '" title="' . sprintf( __( "View %s" ), get_the_title() ) . '" ' . '>' . get_the_title(). '</a> </li> ';
                    endif;
                endwhile;
            endif;

            wp_reset_query();
            ?>
        </ul>
        
        <?php
        
        echo $args['after_widget'];
    }
    
    // widget admin form
    public function form($instance) {
        if(isset($instance['title']) && !empty($instance['title'])) {
            $title = $instance['title'];
        }else{
            $title = __('Latest Articles', 'bonestheme');
        }
        
        if(isset($instance['title']) && !empty($instance['title'])) {
            $numposts = $instance['numposts'];
        }else{
            $numposts = __('5', 'bonestheme');
        }
         
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"> <?php _e('Title:'); ?> </label><br />
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
        </p>
        
        <p>
            <label for="<?php echo $this->get_field_id('posttype'); ?>"> <?php _e('Post Type:'); ?> </label><br />
            
            <?php
            
            $post_types = get_post_types(array(
                'public'   => true,
                '_builtin' => false
             ), 'objects');
           
            ?>
            
            <select class="widefat" id="<?php echo $this->get_field_id('posttype'); ?>" name="<?php echo $this->get_field_name('posttype'); ?>">
                <option value="post">Posts (Default)</option>
                <?php
                    foreach ( $post_types  as $post_type ) {
                        if($instance['posttype'] === $post_type->name) {
                            echo '<option selected="selected" value="'.$post_type->name.'">' . $post_type->labels->name . '</option>';
                        }else{
                            echo '<option value="'.$post_type->name.'">' . $post_type->labels->name . '</option>';
                        }
                    }
                ?>
            </select>
        </p>
        
        <p>
            <label for="<?php echo $this->get_field_id('numposts'); ?>"> <?php _e('Number of Posts:'); ?> </label><br />
            <input class="widefat" id="<?php echo $this->get_field_id('numposts'); ?>" name="<?php echo $this->get_field_name('numposts'); ?>" type="number" value="<?php echo esc_attr($numposts); ?>" required/>
        </p>
        <?php
    }
    
    // update widget
    public function update($new_instance, $old_instance) {
        $instance = array();
        
        $instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : ' ';
        $instance['posttype'] = (!empty($new_instance['posttype'])) ? strip_tags($new_instance['posttype']) : 'post';
        $instance['numposts'] = (!empty($new_instance['numposts'])) ? strip_tags($new_instance['numposts']) : 5;
        
        return $instance;
    }
}


// register and load new widget
function FGLatestArticles_load_widget() {
    register_widget( 'FGLatestArticles' );
}

add_action( 'widgets_init', 'FGLatestArticles_load_widget' );

?>