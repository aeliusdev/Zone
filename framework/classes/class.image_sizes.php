<?php

/**
 * Theme Image Sizes - Includes all the image sizes needed for the theme.
 */

class themep_image_sizes 
{

	function themep_image_sizes()
	{
		
		global $themep_image_sizes;
		
		$this->themep_add_image_sizes( $themep_image_sizes );
		
	}
	
	function themep_add_image_sizes ( $image_sizes )
	{
		
		foreach ( $image_sizes as $image_size )
		{
			
			add_image_size( $image_size["name"], $image_size["width"], $image_size["height"], $image_size["crop"] );
			
		}
		
	}

}

$themep_images = new themep_image_sizes();

?>