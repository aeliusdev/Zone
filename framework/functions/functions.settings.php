<?php 

function zone_get_option( $id )
{
	global $zone_customizer_config;
	 
	if( get_option( $id ) == "" )
	{
		foreach( $zone_customizer_config["settings"] as $setting )
		{
			if( $setting["id"] == $id )
			{
				return $setting["default"];
			}	
		}
	} else 
	{
		return get_option( $id );		
	}
}
	
?>