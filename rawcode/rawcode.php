<?php

/*
Plugin Name: RawCode
Plugin URL: http://businessmarketingsystems.net/rawcode.html
Description: Insert complete code (HTML, CSS, and Javascript) directly to Wordpress posts, pages, and widget content.
Author: Tak L Hong and Edward Phelps
Version: 1.3
License: GPL v2
Author URL: http://businessmarketingsystems.net
Min WP Version: 2.7
*/

define("RAWCODE_DIR",       dirname(plugin_basename(__FILE__)));      
define('RAWCODE_PLUGINDIR', PLUGINDIR.'/'.RAWCODE_DIR);            // Relative path to plugin. (no leading slash).

add_action('admin_init', 'rawcode_admin_init');
add_action('admin_menu', 'rawcode_add_menu');
add_filter('the_content', 'rawcode_the_content');

function rawcode_admin_init()
{
  if ( function_exists('register_setting') )
  {
    for( $i = 1; $i < 10; $i++) {
      register_setting('rawcode_options', 'rawcode_content_'.$i, '');
      register_setting('rawcode_options', 'rawcode_note_'.$i, 'wp_filter_nohtml_kses');
    }
  }
}

/**
* @desc Action hook for 'admin_menu'
*/
function rawcode_add_menu()
{
  add_menu_page('RawCode', 'RawCode', 8, __FILE__);    
  add_submenu_page(plugin_basename(__FILE__), 'Code Content', 'Code Content', 8, plugin_basename(__FILE__), 'rawcode_admin_page');
}

function rawcode_admin_page()
{
  $adminFile=dirname(realpath(__FILE__)).'/admin.php';
  if ( file_exists( $adminFile ))
  {
    include($adminFile);
  }
  else
  {
     echo "Admin page could not be found.";
  }
}

function rawcode_the_content($content)
{
  if ( strpos($content, '@@rawcode') !== FALSE )
  {
    $replacements = array( '@@rawcode_1' => 'rawcode_content_1',
                           '@@rawcode_2' => 'rawcode_content_2',
                           '@@rawcode_3' => 'rawcode_content_3',
                           '@@rawcode_4' => 'rawcode_content_4',
                           '@@rawcode_5' => 'rawcode_content_5',
                           '@@rawcode_6' => 'rawcode_content_6',
                           '@@rawcode_7' => 'rawcode_content_7',
                           '@@rawcode_8' => 'rawcode_content_8',
                           '@@rawcode_9' => 'rawcode_content_9'
                           );
    foreach( $replacements as $tag => $option )
    {
      $content = str_replace( $tag, get_option($option), $content);
    }
  }
  
  return $content;
}