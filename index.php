<?php
/*
Plugin Name: Nike Plus for Wordpress
Plugin URI:
Description: Display last activity from Nike Plus
Version: 0.0.1
Author: robertob
Author URI: 
Licence:
*/



require_once dirname(__FILE__)."/cls/autoload.php";

const RB_CONST_NAME="rb-nike-plus";
add_filter( 'the_content', array("Rbit_Nike_Plus_Filter", "content_post") );
add_filter( 'the_content', array("Rbit_Nike_Plus_Filter", "debug_content_filter") );
add_action( 'admin_menu', array( 'Rbit_Nike_Plus_Admin', 'admin_menu' ) );
add_action( 'widgets_init', function(){
     register_widget( 'Rbit_Nike_Plus_Widget' );
});

//add_shortcode( 'nike-plus-last-activity', array( 'Rbit_Nike_Plus_Filter', 'last_activity' ) );