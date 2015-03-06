<?php
/*
Plugin Name: FGCategories
Plugin URI: http://fishgate.co.za
Description: A category plugin which lets you list default or custom taxonomies with post count and link in the side bar.
Version: 1.2
Author: Kyle Vermeulen <kyle@source-lab.co.za>
Author URI: http://source-lab.co.za/
*/

class FGCategories extends WP_Widget {
    function __construct() {
        parent::__construct('wp_fgcategories', __('FG Categories', 'bonestheme'), array(
            'description' => __('A category widget which lets you list default or custom taxonomies with post count and link in the side bar.', 'bonestheme'),
        ));
    }
    
    // front end of the widget
    public function widget ($args, $instance) {
        $title = !empty($instance['title']) ? $instance['title'] : ' ';
        $filter_title = !empty($title) ? apply_filters('widget_title', $title) : ' ';
        
        echo $args['before_widget'];
        
        // Get the term id of the post you are currently viewing within the loop
        $current_category = get_the_terms($post->ID, $instance['posttax']);
        $this_cat_term_ids = array();
        
        foreach($current_category as $current_cat) {
            array_push($this_cat_term_ids, $current_cat->term_id);
        }
        
        // Get all categories
        if(isset($instance['posttax']) && !empty($instance['posttax'])) {
            $tax_args = array(
                'orderby' => 'name',
                'order' => 'ASC',
                'taxonomy' => $instance['posttax']
            );
        }else{
            $tax_args = array(
                'orderby' => 'name',
                'order' => 'ASC',
                'taxonomy' => 'category'
            );
        }
        
        $categories = get_categories($tax_args);
              
        echo $args['before_title'] . $filter_title . $args['after_title']; 
        
        ?>

        <ul>
            <?php
            foreach($categories as $category) :
                if(is_single() && in_array($category->term_id, $this_cat_term_ids)) :
                    echo '<li class="cat-item"> <a class="current" href="' . get_term_link($category->slug, $category->taxonomy) . '" title="' . sprintf( __( "View all posts in %s" ), $category->name ) . '" ' . '> <strong>' . $category->name . '</strong> </a> (' .$category->count. ')</li> ';
                else :
                    echo '<li class="cat-item"> <a href="' . get_term_link($category->slug, $category->taxonomy) . '" title="' . sprintf( __( "View all posts in %s" ), $category->name ) . '" ' . '>' . $category->name. '</a> (' .$category->count. ')</li> ';
                endif;
            endforeach;
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
            $title = __('Categories', 'bonestheme');
        }
                
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"> <?php _e('Title:'); ?> </label><br />
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
        </p>
        
        <p>
            <label for="<?php echo $this->get_field_id('posttax'); ?>"> <?php _e('Taxonomy:'); ?> </label><br />
            
            <?php
            
            $taxonomies = get_taxonomies(array(
                'public'   => true,
                '_builtin' => false
             ), 'objects');
           
            ?>
            
            <select class="widefat" id="<?php echo $this->get_field_id('posttax'); ?>" name="<?php echo $this->get_field_name('posttax'); ?>">
                <option value="category">Category (Default)</option>
                <?php
                    foreach ( $taxonomies  as $taxonomy ) {
                        if($instance['posttax'] === $taxonomy->name) {
                            echo '<option selected="selected" value="'.$taxonomy->name.'">' . $taxonomy->labels->name . '</option>';
                        }else{
                            echo '<option value="'.$taxonomy->name.'">' . $taxonomy->labels->name . '</option>';
                        }
                    }
                ?>
            </select>
        </p>
        <?php
    }
    
    // update widget
    public function update($new_instance, $old_instance) {
        $instance = array();
        
        $instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : ' ';
        $instance['posttax'] = (!empty($new_instance['posttax'])) ? strip_tags($new_instance['posttax']) : 'post';
        
        return $instance;
    }
}


// register and load new widget
function FGCategories_load_widget() {
    register_widget( 'FGCategories' );
}

add_action( 'widgets_init', 'FGCategories_load_widget' );

?>