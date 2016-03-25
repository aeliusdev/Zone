<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


/**
 * ZoneLayout class - Create a Frontend Template
 */
class ZoneLayout 
{
	
	/**
	 * ZoneLayout function.
	 * 
	 * @access public
	 * @return void
	 */
	public function ZoneLayout()
	{}

	public static function get_header()
	{
		require_once( THEME_LAYOUTS . zone_get_option( "layout" ) . '/templates/tmpl-header-' . self::get_header_alignment() . '.php');
	}
	
	public static function get_header_alignment()
	{
		return 'top';
	}
	
	public static function get_footer()
	{
		require_once( THEME_LAYOUTS . zone_get_option( "layout" ) . '/templates/tmpl-footer.php');
	}
		
	public static function current_layout()
	{
		return zone_get_option( "layout" );
	}
	
}

new ZoneLayout();

?>