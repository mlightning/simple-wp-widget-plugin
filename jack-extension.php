<?php
/*
Plugin Name: jack-extension
Plugin URI: http://jackentertainment.com
Description: jackentertainment extension plugin
Version: 1.0
Author: Marius Dalca
License: GPL2
*/

require_once 'widgets/member-login.php';

// register widget
add_action('widgets_init', create_function('', 'return register_widget("jack_member_login");'));

// queue up the necessary js
function jack_admin_enqueue()
{
  wp_enqueue_style('thickbox');
  wp_enqueue_script('media-upload');
  wp_enqueue_script('thickbox');
  wp_enqueue_script('jack-extension', plugin_dir_url(__FILE__) . '/js/jack-extension.js', array('jquery'));
}
add_action('admin_enqueue_scripts', 'jack_admin_enqueue');

function jack_front_enqueue()
{
  wp_enqueue_style('jack-extension', plugin_dir_url(__FILE__) . '/css/jack-extension.css');
}
add_action('wp_enqueue_scripts', 'jack_front_enqueue');
