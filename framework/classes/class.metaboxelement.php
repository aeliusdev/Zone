<?php 

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * ZoneMetaBoxElement class.
 */
class ZoneMetaBoxElement
{
	
	/**
	 * output_metabox_element function.
	 * 
	 * @access public
	 * @param mixed $metabox_element
	 * @param mixed $post
	 * @return void
	 */
	public function output_metabox_element( $metabox_element, $post )
	{
		global $post;
		
		$metabox_element_value = get_post_meta( $post->ID, $metabox_element['id'], true );

		switch ( $metabox_element["type"] )
		{
			
			case "input":
			$params = array( 'id'          => $metabox_element['id'],
							 'title'       => $metabox_element['name'],
							 'value'       => $metabox_element_value,
							 'type'        => $metabox_element['type'],
							 'context'     => $metabox_element['context'],
							 'last'        => $metabox_element['last'],
							 'description' => $metabox_element['description'] );
			
			echo self::metabox_before( $params ) . ZoneElement::input( $params ) . self::metabox_after( $params );
			break;	
			
			case "select":
			$params = array( 'id'          => $metabox_element['id'],
							 'title'       => $metabox_element['name'],
							 'value'       => $metabox_element_value,
							 'type'        => $metabox_element['type'],
							 'context'     => $metabox_element['context'],
							 'choices'     => $metabox_element['choices'],
							 'last'        => $metabox_element['last'],
							 'description' => $metabox_element['description'] );
			
			echo self::metabox_before( $params ) . ZoneElement::select( $params ) . self::metabox_after( $params );			
			break;

			case "layout":
			$params = array( 'id'          => $metabox_element['id'],
							 'title'       => $metabox_element['name'],
							 'context'     => $metabox_element['context'],
							 'current'     => ZoneLayout::current_layout(),
							 'last'		   => $metabox_element['last'],
							 'type'        => $metabox_element['type'],
							 'description' => $metabox_element['description'] );
			
			echo self::metabox_before( $params ) . ZoneElement::layout( $params ) . self::metabox_after( $params );			
			break;			

			case "gallery":
			$params = array( 'id'          => $metabox_element['id'],
							 'title'       => $metabox_element['name'],
							 'context'     => $metabox_element['context'],
							 'last'		   => $metabox_element['last'],
							 'type'        => $metabox_element['type'],
							 'description' => $metabox_element['description'] );
			
			echo self::metabox_before( $params ) . ZoneElement::gallery( $params ) . self::metabox_after( $params );			
			break;	
		}
		
	}

	/**
	 * metabox_before function.
	 * 
	 * @access public
	 * @return void
	 */
	public static function metabox_before( $params )
	{
		$output = '<div class="zone-metabox-' . esc_attr( $params["type"] ) . ' zone-metabox ' . esc_attr( $params["context"] ) . '">';
		
		return $output;
	}

	/**
	 * metabox_after function.
	 * 
	 * @access public
	 * @return void
	 */
	public static function metabox_after( $params )
	{
		$output = '</div><div class="clear"></div>';
		
		if( $params["last"] == false ) $output .= '<div class="zone-metabox-separator"></div>';
		
		return $output;
	}	
}

?>