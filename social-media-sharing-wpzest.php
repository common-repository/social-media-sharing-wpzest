<?php
defined( 'ABSPATH' ) or die( "No script kiddies please!" );
/*
Plugin Name: Social Media Share | WPZest  
Plugin URI: http://www.wpzest.com/
Description: WPZest Social Media Share is fully loaded with the Social media icons allows you to share your wordpress site content on the web.
Version: 1.1
Author: WPZest
Author URI:http://www.wpzest.com/
License: GPLv2
*/
add_action("admin_menu", "wpzest_social_media_share_menu_item");
function wpzest_social_media_share_menu_item()
{
    $page = add_options_page( 
        __( 'Social Media Share', 'textdomain' ),
        __( 'Social Media Share', 'textdomain' ),
        'manage_options',
        'social-media-sharing-wpzest.php',
        'wpzest_social_media_share_page'
    );
      add_action('admin_print_styles-' . $page, 'wpz_admin_css_custom_page');
      add_action('admin_print_scripts-'. $page, 'wpzest_social_media_share_style');
}
function wpzest_social_media_share_style()
 {
  wp_enqueue_script('wpzest-social-media-share-script-file', plugins_url('js/custom.js', __FILE__) );
  wp_enqueue_script( 'wpz-admin-js', plugins_url('js/drag-drop.js', __FILE__), array( 'jquery', 'jquery-ui-sortable' ));   
 }
function wpz_admin_css_custom_page() {
    /** Register */
    wp_register_style('wpzest-social-media-share-style-file', plugins_url('css/social-style.css', __FILE__), array(), '1.0', 'all');
    wp_register_style('wpz-font-awsome', plugins_url('css/font-awesome-4.7.0/css/font-awesome.min.css', __FILE__), array(), '1.0', 'all');
    wp_enqueue_style('wpzest-social-media-share-style-file');
    wp_enqueue_style('wpz-font-awsome');
  }
function frontend_css() {
  wp_register_style( 'wpz-frontend-css',  plugin_dir_url( __FILE__ ) . 'css/custom.css' );
  wp_enqueue_style( 'wpz-frontend-css' );
  wp_register_style('wpz-font-awsome', plugins_url('css/font-awesome-4.7.0/css/font-awesome.min.css', __FILE__), array(), '1.0', 'all'); 
  wp_enqueue_style('wpz-font-awsome');
}
add_action( 'wp_enqueue_scripts', 'frontend_css' );
function wpzest_social_media_share_settings()
{
    add_settings_section("wpzest_social_media_share_config_section", "", null, "wpzest-social-share");
    register_setting("wpzest_social_media_share_config_section", "wpzest_social_media_share_button_layout");
    register_setting("wpzest_social_media_share_config_section", "wpzest_social_media_share_button_share");
    register_setting("wpzest_social_media_share_config_section", "wpzest_social_media_share_content_before_in_post");
    register_setting("wpzest_social_media_share_config_section", "wpzest_social_media_share_content_after_in_post");
    register_setting("wpzest_social_media_share_config_section", "wpzest_social_media_share_content_before_in_page");
    register_setting("wpzest_social_media_share_config_section", "wpzest_social_media_share_content_after_in_page");
    register_setting("wpzest_social_media_share_config_section", "wpzest_social_media_share");
    register_setting("wpzest_social_media_share_config_section", "wpzest_icon_themes");
    register_setting("wpzest_social_media_share_config_section", "wpzest_icon_css_color");
    register_setting("wpzest_social_media_share_config_section", "wpzest_icon_size");
    register_setting("wpzest_social_media_share_config_section", "wpzest_share_settings");
    register_setting("wpzest_social_media_share_config_section", "wpzest_social_media_share_message_icon");
    register_setting("wpzest_social_media_share_config_section", "wpzest_social_media_share_fake_count");
    register_setting("wpzest_social_media_share_config_section", "wpzest_social_media_share_facebook_id");
    register_setting("wpzest_social_media_share_config_section", "wpzest_social_media_share_facebook_key");
    register_setting("wpzest_social_media_share_config_section", "wpzest_social_media_share_clear_cache");
    register_setting("wpzest_social_media_share_config_section", "wpzest_social_media_share_clear_cache_time");
    update_option("wpzest_social_media_share_config_section", "wpzest_social_media_share_page");     
}
add_action("admin_init", "wpzest_social_media_share_settings");
require('includes/wpzest-view.php');
require('includes/wpzest-share.php');
    function wpzest_social_media_share_clear_data() {
            if ( !empty($_GET) && wp_verify_nonce( $_GET['_wpnonce'] ,'wpzest-social-media-share-data-clear') ) {
                include( 'includes/wpzest-count.php' );
                $wpzest_social_media_share_trans  = get_option( WPZEST_SHARE_TRANSE );
                foreach ( $wpzest_social_media_share_trans as $data ) {
                    delete_transient( $data );
                }
                update_option( WPZEST_SHARE_TRANSE, array() );
                wp_redirect( admin_url() . 'options-general.php?page=wpzest-social-share' );
            }
        }
?>