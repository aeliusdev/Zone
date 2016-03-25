<?php
	
class ZoneDribbble 
{
	
	/**
	* Dribbble API URL	
	*/
	protected static $dribbble_api_url = 'http://api.dribbble.com/';
		
	/**
	* Function to get dribbble shots from the api	
	*/
	public static function get_shots ( $user, $no_of_images )
	{
		$json = wp_remote_get( ZoneDribbble::$dribbble_api_url . 'players/' . $user . '/shots?per_page=' . $no_of_images, array( "timeout" => 50 ) ) or array();
         
        $array = json_decode( $json['body'] );
         
        $shots = ($array->shots) ? $array->shots : "No data recieved.";	
        
        return $shots;	
	}
	
}

?>