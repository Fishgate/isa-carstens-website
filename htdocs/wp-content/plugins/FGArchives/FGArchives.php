<?php
/*
Plugin Name: FGArchives
Plugin URI: http://fishgate.co.za
Description: A plugin which generates archives list for default and custom post types.
Version: 1.1
Author: Kyle Vermeulen <kyle@source-lab.co.za>
Author URI: http://source-lab.co.za/
*/

class FGArchives extends WP_Widget {
    function __construct() {
        parent::__construct('wp_fgarchives', __('FG Archives', 'bonestheme'), array(
            'description' => __('A widget which generates archives list for default and custom post types.', 'bonestheme'),
        ));
    }
    
    // front end
    public function widget($args, $instance) {
        $title = !empty($instance['title']) ? $instance['title'] : ' '; 
        $filter_title = !empty($title) ? apply_filters('widget_title', $title) : ' ';
        
        echo $args['before_widget'];
        
        echo $args['before_title'] . $filter_title . $args['after_title'];
        
        if(isset($instance['posttype']) && !empty($instance['posttype'])) {
            $archive_args = array(
                'post_type' => $instance['posttype'],
                'type' => $instance['archivetype'],
                'show_post_count' => $instance['showpostcount']
            );
        }else{
            $archive_args = array(
                'type' => $instance['archivetype'],
                'show_post_count' => $instance['showpostcount']
            );
        }
        
        echo '<ul>';
        wp_get_archives($archive_args);
        echo '</ul>';
        
        echo $args['after_widget'];
    }
    
    // widget admin panel
    public function form($instance) {
        
        if(isset($instance['title']) && !empty($instance['title'])) {
            $title = $instance['title'];
        }else{
            $title = __('Archive', 'bonestheme');
        }
        
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"> <?php _e('Title:'); ?> </label>
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
                <option value="">Posts (Default)</option>
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
            <label for="<?php echo $this->get_field_id('archivetype'); ?>"> <?php _e('Archive Type:') ?> </lable></br>
            <select class="widefat" id="<?php echo $this->get_field_id('archivetype'); ?>" name="<?php echo $this->get_field_name('archivetype'); ?>" >
                <?php if($instance['archivetype'] == "monthly") : ?>
                    <option selected="selected" value="monthly">Monthly</option>
                <?php else : ?>
                    <option value="monthly">Monthly</option>
                <?php endif; ?>
                    
                    
                <?php if($instance['archivetype'] == "yearly") : ?>    
                    <option selected="selected" value="yearly">Yearly</option>
                <?php else : ?>
                    <option value="yearly">Yearly</option>
                <?php endif; ?>
            </select>
        </p>
        
        <p>
            <?php if($instance['showpostcount'] == "true") : ?>
                <input checked="checked" value="1" type="checkbox" id="<?php echo $this->get_field_id('showpostcount'); ?>" name="<?php echo $this->get_field_name('showpostcount'); ?>" />
            <?php else : ?>
                <input value="true" type="checkbox" id="<?php echo $this->get_field_id('showpostcount'); ?>" name="<?php echo $this->get_field_name('showpostcount'); ?>" />
            <?php endif; ?>
            <label for="<?php echo $this->get_field_id('showpostcount'); ?>"> <?php _e('Show post count') ?> </lable>    
        </p>
        
        <?php
    }
    
    // update widget
    public function update($new_instance, $old_instance) {
        $instance = array();
        
        $instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : ' ';
        $instance['posttype'] = (!empty($new_instance['posttype'])) ? strip_tags($new_instance['posttype']) : '';
        $instance['archivetype'] = (!empty($new_instance['archivetype'])) ? strip_tags($new_instance['archivetype']) : 'monthly';
        $instance['showpostcount'] = (!empty($new_instance['showpostcount'])) ? strip_tags($new_instance['showpostcount']) : '0';
        
        return $instance;
    }
}


//register and load plugin
function FGArchives_load_widget() {
    register_widget('FGArchives');
}

add_action('widgets_init', 'FGArchives_load_widget');

// add a filter to the sql query for the wp_get_archive method to include custom post types
function FGArchives_custom_post_type_archive($where, $args) {
    $post_type  = isset($args["post_type"]) ? $args["post_type"]  : "post";
    $where = "WHERE post_type = '$post_type' AND post_status = 'publish'";
    return $where;  
}
add_filter( "getarchives_where","FGArchives_custom_post_type_archive",10,2);

