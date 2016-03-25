<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * ZonePreviewer class - Create a visualization of layouts.
 */
class ZonePreviewer extends ZoneLayout 
{
	
	/**
	 * create_preview function. Retrieve & output the current layout's preview template.
	 * 
	 * @access public
	 * @static
	 * @return void
	 */
	public static function create_preview()
	{
		$current = self::current_layout();
		
		//start output buffer
		ob_start();		
		
		//output current tmpl
		require_once( THEME_LAYOUTS . $current . '/templates/tmpl-layout.php' );	
		
		//get output buffer and store in an array		
		$output = ob_get_clean();
		
		return $output;	
	}
	
	public static function create_customizer_preview( $value )
	{		
		global $zone_layouts_config;
		
		$output = '<ul class="zone-layout-customizer-previews">';
		$count = 1;
		
		foreach( $zone_layouts_config["layouts"] as $layout )
		{
			//start output buffer
			ob_start();		
			
			//output current tmpl
			require_once( THEME_LAYOUTS . $layout["id"] . '/templates/tmpl-preview.php' );	
						
			if( $count % 2 == 0 && $count > 1 ) 
			{
				$output .= '<li id="' . esc_attr( $layout["id"] ) . '" class="last">' . ob_get_clean() . '</li>';		
			} else 
			{
				$output .= '<li id="' . esc_attr( $layout["id"] ) . '">' . ob_get_clean() . '</li>';		
			}
			
			$count++;	
		}
		
		$output .= '</ul>';
		
		return $output;			
	}
	
}

?>