<?php 

class ZoneSidebars 
{
	public function ZoneSidebars()
	{
		add_action( 'init', array( $this, 'register_predefined_areas' ) );
	}
	
	public function register_predefined_areas()
	{
		global $zone_widgets_config;
		
		foreach( $zone_widgets_config["predefined_areas"] as $predefined_area )
		{
			register_sidebar( array( 'name'        => $predefined_area["name"],
		        					 'id'          => $predefined_area["id"],
									 'description' => $predefined_area["description"] ) 
			);
		}
	}
}	

new ZoneSidebars()
	
?>