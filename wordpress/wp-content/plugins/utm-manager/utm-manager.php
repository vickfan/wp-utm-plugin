<?php
  /**
   * Plugin Name: utm-manager
   * Description: plugin that is used to create and manage utm link for posts
   * Version: 0.0.1
   * Author: Vick Fan
   */

  if ( !defined('ABSPATH')) {
    die;
  }

  //  firing the utm meta box function whenever loading a post
  add_action('load-post.php', 'utm_meta_boxes_setup');
  add_action('load-post-new.php', 'utm_meta_boxes_setup');

  function utm_meta_boxes_setup() {
    add_action( 'add_meta_boxes', 'add_utm_meta_box' );
  }

  function add_utm_meta_box() {
    // meta box for new link at the side panel
    add_meta_box(
      'new-utm-link',
      esc_html__('New UTM Link'),
      'new_utm_meta_box',
      'post',
      'side',
      'default'
    );

    // meta box for the existing link at the main panel
    add_meta_box(
      'existing-utm-link',
      esc_html__('Existing UTM Links'),
      'existing_utm_meta_box',
      'post'
    );
  }

  function new_utm_meta_box() {
    require_once plugin_dir_path(__FILE__).'metabox/newLink.php';
  }

  function existing_utm_meta_box() {
    require_once plugin_dir_path(__FILE__).'metabox/existingLink.php';
  }

  // admin page
  add_action('admin_menu', 'add_utm_manager_admin_panel');

  function add_utm_manager_admin_panel() {
    add_menu_page(
      'UTM Manager Page', 
      'UTM Manager', 
      'manage_options',  
      'utm-manager', 
      'utm_manager_admin_page',
      'dashicons-tickets',
      5
    );
    add_submenu_page(
      'utm-manager',
      'UTM Manager Setting Page',
      'Setting',
      'publish_posts',
      'utm_manager_setting_page',
      'utm_manager_setting_page'
    );
  };

  function utm_manager_admin_page() {
    require_once plugin_dir_path(__FILE__).'templates/utmManager.php';
  }

  function utm_manager_setting_page() {
    require_once plugin_dir_path(__FILE__).'templates/setting.php';
  }

  // API
  add_action('wp_ajax_save_utm_options', 'save_utm_options');

  function save_utm_options() {
    global $wpdb;

    $type = $_POST['type'];
    $data = $_POST['data'];

    // try to get option first
    $saved_options = get_option($type);

    // set options
    if(empty($saved_options)) {
      // add option if empty 
      add_option($type, array($data));
    } else {
      // update option if exist
      // TODO: need to check duplicates
      $saved_options[] = $data;
      update_option($type, $saved_options);
    }
    echo $saved_options;

    wp_die();
  }