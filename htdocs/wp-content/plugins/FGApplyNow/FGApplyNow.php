<?php
/*
Plugin Name: FGApplyNow
Plugin URI: http://fishgate.co.za
Description: Apply Now sidebar form built for the isacarstens.co.za
Version: 1.0
Author: Kyle Vermeulen <kyle@source-lab.co.za>
Author URI: http://source-lab.co.za/
*/

class FGApplyNow extends WP_Widget {
    function __construct() {
        parent::__construct('wp_fgapplynow', __('FG Apply Now', 'bonestheme'), array(
            'description' => 'Apply Now sidebar widget. This will place a link to the Apply Now page in the sidebar.'
        ));
    }
    
    //frontend
    public function widget($args, $instance) {
        echo $args['before_widget'];
        ?>

        <div class="panel-dark">
            <h3 style="color: white; text-align: center; font-size: 18px; margin-top: 0;">Interested in one of our courses?</h3>
            <p>Follow the link to complete our enquiry form and we will send you more information.</p>
            <div class="center">
                <a class="btn-primary" href="<?php if(isset($instance['applynow_url']) && !empty($instance['applynow_url'])) echo strip_tags ($instance['applynow_url']); ?>">ENQUIRE NOW</a>
            </div>
        </div>

        <?php 
        echo $args['after_widget'];
    }
    
    
    //backend 
    public function form($instance) {
        ?>
        <p>Please provide a link to the enquiry page.</p>
        
        <p><input type="text" class="widefat" value="<?php if(isset($instance['applynow_url']) && !empty($instance['applynow_url'])) echo strip_tags ($instance['applynow_url']); ?>" name="<?php echo $this->get_field_name('applynow_url'); ?>" /></p>
        
        <?php
    }
    
    
    // options update
    public function update($new_instance, $old_instance) {
        $instance = array();
        
        $instance['applynow_url'] = (!empty($new_instance['applynow_url'])) ? strip_tags($new_instance['applynow_url']) : 0;
        
        return $instance;
    }
    
}

//register and load
function FGApplyNow_widget_load() {
    register_widget('FGApplyNow');
}

add_action('widgets_init', 'FGApplyNow_widget_load');



?>