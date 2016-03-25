<?php
	
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly	
	
/**
 * _metabox class.
 * 
 * @extends _metaboxelement
 */
class ZoneMetabox extends ZoneMetaBoxElement
{	
	public $metaboxes, $metabox_elements;
	
	/**
	 * Main function.
	 *
	 * @since 1.0.0
	 * @access public
	 */
	public function ZoneMetabox()
	{	
		global $zone_metabox_config;
		
		$this->metaboxes = $zone_metabox_config['metaboxes'];
		$this->metabox_elements = $zone_metabox_config['metabox_elements'];
		
		add_action( 'add_meta_boxes', array( $this, 'add_metaboxes' ) );
		add_action( 'save_post', array( $this, 'save_metaboxes' ) );
	}

	/**
	 * Function to add custom meta boxes to WordPress.
	 *
	 * @since 1.0.0
	 * @access public
	 */	
	public function add_metaboxes( $post_type )
	{	
		foreach( $this->metaboxes as $metabox )
		{	
			add_meta_box(
				$metabox['id'],
				$metabox['name'],
				array( $this, 'render_meta_box_content' ),
				$metabox['post_type'],
				$metabox['context'],
				$metabox['priority'],
				array( 'metabox' => $metabox['id'] )
			);			
		}						
	}

	/**
	 * Function to save custom meta box data.
	 *
	 * @since 1.0.0
	 * @access public
	 */	
	public function save_metaboxes( $post_id ) 
	{
		// Check if our nonce is set.
		if ( ! isset( $_POST['_security_nonce_check'] ) )
			return $post_id;

		$nonce = $_POST['_security_nonce_check'];

		// Verify that the nonce is valid.
		if ( ! wp_verify_nonce( $nonce, '_security_nonce' ) )
			return $post_id;

		// If this is an autosave, our form has not been submitted,
                //     so we don't want to do anything.
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) 
			return $post_id;

		// check permissions
		if ( ! current_user_can( 'edit_posts' ) ) wp_die( 'You do not have the permission to view this page.' );

		foreach ( $this->metabox_elements as $metabox_element )
		{				
			if ( isset( $_POST[ $metabox_element["id"] ] ) )
			{				
				// Sanitize the user input.
				$data = sanitize_text_field( $_POST[ $metabox_element["id"] ] );
		
				// Update the meta field.
				update_post_meta( $post_id, $metabox_element["id"], $data );				
			}			
		}
	}
	
	/**
	 * Render Meta Box content.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @param WP_Post $post The post object.
	 */
	public function render_meta_box_content( $post, $metabox )
	{	
		// Add an nonce field so we can check for it later.
		wp_nonce_field( '_security_nonce', '_security_nonce_check' );

		foreach ( $this->metabox_elements as $metabox_element )
		{		
			if ( $metabox['args']['metabox'] == $metabox_element['metabox'] ) $this->output_metabox_element( $metabox_element, $post );			
		}
                
	}
	
}

new ZoneMetabox();

?>