<?php
/*
Plugin Name: FGTestimonials
Plugin URI: http://example.com/
Description: Testimonials widget which works with the Testimonials custom post type built into the Isa Carstens website.
Version: 1.0
Author: Kyle Vermeulen <kyle@source-lab.co.za>
Author URI: http://source-lab.co.za/
*/


class FGTesti extends WP_Widget {
    public function __construct() {
        parent::__construct('wp_fgtesti', __('FG Testimonials', 'bonestheme'), array(
           'description' => 'Testimonials widget which works with the Testimonials custom post type built into the Isa Carstens website.'
        ));
    }
    
    public function widget($args, $instance) {
        // get testi that are related to this page
        //$related = p2p_type( 'testimonials_to_pages' )->get_connected( get_queried_object() );
        
        $related = new WP_Query(array(
            'connected_type' => 'testimonials_to_pages',
            'connected_items' => get_queried_object(),
            'orderby' => 'rand',
            'posts_per_page' => 3,
        ));
        
        if($related->have_posts()) {
            echo $args['before_widget'];

            echo $args['before_title'] . __('Testimonials', 'bonestheme') . $args['after_title'];
            
            while ($related->have_posts()) : $related->the_post();
                the_content();
                echo '<p><em><strong>';
                
                    echo get_the_title();
                
                    if(get_field('company_name')) {
                        echo '<br />';
                        echo get_field('company_name');
                    }
                    
                echo '</strong></em></p><hr />';
            endwhile; 
            
            wp_reset_postdata();
            
            echo $args['after_widget'];
        }
    }
}

function FGTesti_load_widget(){
    register_widget('FGTesti');
}

add_action('widgets_init', 'FGTesti_load_widget');

?>