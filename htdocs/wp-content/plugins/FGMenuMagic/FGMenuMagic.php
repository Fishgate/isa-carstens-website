<?php
/*
Plugin Name: FGMenuMagic
Plugin URI: http://fishgate.co.za/
Description: Select a parent menu item and it will display its child menu items in the sidebar, it's MENU MAGICAL!
Version: 1.0
Author: Kyle Vermeulen <kyle@source-lab.co.za>
Author URI: http://source-lab.co.za/
*/

// gets navigation menu items from a given menu location id set in the theme.
function get_nav_menu_from_location($location_id) {
    $menus = wp_get_nav_menus();
    $menu_locations = get_nav_menu_locations();

    if(isset($menu_locations[$location_id])) {
        foreach($menus as $menu) {
            if($menu->term_id == $menu_locations[$location_id]) {
                return wp_get_nav_menu_items($menu);
            }
        }
    }else{
        return false;
    }
}

// runs a small loop to check if a given menu item has children elements or not, if it doesnt, there is no need for it to even appear in this widget as an option
function has_children($nav_items, $item_id){
    $depth = 0;

    foreach($nav_items as $item){
        if($item->menu_item_parent == $item_id){
            $depth++;
            break;
        }
    }

    if($depth > 0){
        return true;
    }else{
        return false;
    }
}

class FGMenuMagic extends WP_Widget {
    function __construct() {
        parent::__construct('wp_fgmenumagic', 'FG Menu Magic', array(
            'description' => __('Select a parent menu item and it will display the child menu items in the sidebar, it\'s MENU MAGICAL!', 'bonestheme'),
        ));
    }
    
    // front end
    public function widget($args, $instance) {
        echo $args['before_widget'];
        
        $menuitemID = !empty($instance['menuitem']) ? $instance['menuitem'] : 0;     
        $currentPageID = get_the_ID(); //get the ID of the current page in the loop
        
        if($menu_items = get_nav_menu_from_location('main-nav')){
            // check that variable menuitemID is set, as defined above, this should never be the case unless the plugin was freshly activated and they didnt set the options for the widget
            if($menuitemID != 0) {
                
                //determine the title of the menu item, this will be used in the widget title
                foreach($menu_items as $item) {
                    if($item->ID == $menuitemID) {
                        $title = $item->title;
                        break;
                    }
                }
                
                //output the title
                echo $args['before_title'] . $title . $args['after_title'];
                ?>
                <ul>
                    <?php
                    //output the navigation list
                    foreach($menu_items as $item) {
                        if($item->menu_item_parent == $menuitemID) {
                            if($item->object_id == $currentPageID) {
                                echo '<li class="cat-item"> <a class="current" href="' . $item->url . '" title="' . sprintf( __( "View page %s" ), $item->title ) . '" ' . '> <strong>' . $item->title . '</strong> </a> </li> ';
                            } else {
                                echo '<li class="cat-item"> <a class="" href="' . $item->url . '" title="' . sprintf( __( "View page %s" ), $item->title ) . '" ' . '>' . $item->title . '</a> </li> ';
                            }

                        }
                    }
                    ?>
                </ul>
                <?php
            //display the following error if no menuitemID has been set in the widget admin panel
            }else{
                 echo $args['before_title'] . 'FG Menu Magic' . $args['after_title'];
                 echo '<p>' . __('There is currently no menu item selected.', 'bonestheme') . '</p>';
            }
        //display the following error if the menu location specified does not exist set in /library/bones.php
        //as long as this plugin is being used with bones development theme this should never be an issue
        }else{
            echo $args['before_title'] . 'FG Menu Magic' . $args['after_title'];
            echo '<p>' . __('There is currently no menu items set in the menu location.', 'bonestheme') . '</p>';
        }
        
        echo $args['after_widget'];
    }
    
    // back end
    public function form($instance) {        
        //get a full list of parent menu items that have children
        if($menu_items = get_nav_menu_from_location('main-nav')){
            ?>
            <p>
                <select id="<?php echo $this->get_field_id('menuitem'); ?>" name="<?php echo $this->get_field_name('menuitem'); ?>" class="widefat">                    
                    <?php
                    //output options for the select menu
                    foreach($menu_items as $item) {
                       if($item->post_parent == 0){
                           if(has_children($menu_items, $item->ID)) {
                               if(isset($instance['menuitem']) && !empty($instance['menuitem']) && $instance['menuitem'] == $item->ID) {
                                   echo '<option selected="selected" value="' . $item->ID . '">' . $item->title .'</option>';
                               }else{
                                   echo '<option value="' . $item->ID . '">' . $item->title .'</option>';
                               }
                           }
                       }
                    }   
                    ?>
                </select>
            </p>
            <?php
        }else{
            echo '<p>' . __('There is currently no menu items set in the menu location.', 'bonestheme') . '</p>';
        }
    }
    
    // options update
    public function update($new_instance, $old_instance) {
        $instance = array();
        
        $instance['menuitem'] = (!empty($new_instance['menuitem'])) ? strip_tags($new_instance['menuitem']) : 0;
        
        return $instance;
    }
    
}

// register and load widget
function FGMenuMagic_load_widget () {
    register_widget('FGMenuMagic');
}

add_action('widgets_init', 'FGMenuMagic_load_widget');


?>