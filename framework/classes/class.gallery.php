<?php 

class ZoneGalleryManager
{
	
	public function ZoneGalleryManager()
	{
		add_action( 'init', array( $this, 'save_gallery_meta' ) );
	}
	
	public static function create_manager()
	{
		$output = '<div id="zone-gallery">';
		
		$output .= '</div>';
		
		return $output;
	}
	
	public function save_gallery_meta( $post )
	{
		
	}
}	
	
?>