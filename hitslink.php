<?php
/*
<<<<<<< HEAD
Version: 1.0.1
=======
Plugin Name: HitsLink
Plugin URI: http://www.semiologic.com/software/hitslink/
Description: Adds <a href="http://go.semiologic.com/hitslink">HitsLink</a> tracking to your site.
Version: 2.0.3
Author: Denis de Bernardy, Mike_Koepke
Author URI: http://www.getsemiologic.com
Text Domain: hitslink
Domain Path: /lang
>>>>>>> orig-code
*/
// obsolete file

<<<<<<< HEAD
$active_plugins = get_option('active_plugins');
=======
/*
Terms of use
------------

This software is copyright Mesoconcepts (http://www.mesoconcepts.com), and is distributed under the terms of the GPL license, v.2.

http://www.opensource.org/licenses/gpl-2.0.php
**/


load_plugin_textdomain('hitslink', false, dirname(plugin_basename(__FILE__)) . '/lang');


/**
 * hitslink
 *
 * @package HitsLink
 **/

class hitslink {
	/**
	 * header_scripts()
	 *
	 * @return void
	 **/
	
	function header_scripts() {
		$script = hitslink::get_options();

		if ( !$script ) {
			echo '<!-- '
				. __('You need to configure the HitsLink plugin under Settings / HitsLink', 'hitslink')
				. ' -->' . "\n";
		} elseif ( current_user_can('publish_posts') || current_user_can('publish_pages') ) {
			echo '<!-- '
				. __('The HitsLink plugin does not track site authors, editors and admins when they are logged in', 'hitslink')
				. ' -->' . "\n";
		} else {
			echo $script;
		}
	} # header_scripts()
	
	
	/**
	 * get_options()
	 *
	 * @return string
	 **/
	
	static function get_options() {
		$o = get_option('hitslink');
		
		if ( $o === false ) {
			$o = get_option('hitslink_params');
			if ( is_array($o) )
				$o = $o['script'];
			else
				$o = '';
			update_option('hitslink', $o);
		}
		
		return $o;
	} # get_options()
	
	
	/**
	 * admin_menu()
	 *
	 * @return void
	 **/

	function admin_menu() {
		if ( !current_user_can('unfiltered_html') )
			return;
		
		add_options_page(
			__('HitsLink', 'hitslink'),
			__('HitsLink', 'hitslink'),
			'manage_options',
			'hitslink',
			array('hitslink_admin', 'edit_options')
			);
	} # admin_menu()
} # hitslink()
>>>>>>> orig-code

if ( !is_array($active_plugins) )
{
	$active_plugins = array();
}

foreach ( (array) $active_plugins as $key => $plugin )
{
	if ( $plugin == 'hitslink.php' )
	{
		unset($active_plugins[$key]);
		break;
	}
}

if ( !in_array('hitslink/hitslink.php', $active_plugins) )
{
	$active_plugins[] = 'hitslink/hitslink.php';
}

sort($active_plugins);

update_option('active_plugins', $active_plugins);
?>