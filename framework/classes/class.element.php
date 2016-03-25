<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * ZoneElement class - Generates HTML content for a specific element.
 */
class ZoneElement 
{
	/**
	 * input function.
	 * 
	 * @access public
	 * @static
	 * @return void
	 */
	public static function input( $params = null )
	{		
		$output = '<div class="zone-element-info">';
		$output .= '<h4>' . $params["title"] . '</h4>';
		$output .= $params["description"];
		$output .= '</div>';
		$output .= '<input type="text" name="' . $params["id"] . '" value="' . $params["value"] . '">';
		$output .= '<div class="clear"></div>';
		
		return $output;
	}
	
	public static function visual()
	{}
	
	public static function textarea()
	{}

	/**
	 * select function.
	 * 
	 * @access public
	 * @static
	 * @param mixed $params
	 * @return void
	 */
	public static function select( $params )
	{
		$output = '<div class="zone-element-info">';
		$output .= '<h4>' . $params["title"] . '</h4>';
		$output .= $params["description"];
		$output .= '</div>';
		$output .= '<div class="zone-element-select">';
		$output .= '<a href="#" class="zone-element-select-cover"><i class="btb bt-sort bt-fw"></i> <span></span></a>';
		$output .= '<select name="' . $params["id"] . '">';
		
		foreach( $params["choices"] as $choice )
		{
			$selected = $choice['id'] == $params["value"] ? "selected" : "";
			$output .= '<option value="' . esc_attr( $choice["id"] ) . '" ' . esc_attr( $selected ) . '>' . esc_html( $choice["name"] )  . '</option>';
		}
		
		$output .= '<div class="clear"></div>';
		$output .= '</select>';
		$output .= '</div>';		

		return $output;		
	}
	
	public static function radio()
	{}
	
	public static function group()
	{}
	
	public static function layout( $params )
	{
		$output = '<div class="zone-layout-preview">';
		$output .= ZonePreviewer::create_preview();
		$output .= '</div>';
						
		return $output;
	}
	
	public static function gallery()
	{
		return ZoneGalleryManager::create_manager();
	} 
		
}

?>