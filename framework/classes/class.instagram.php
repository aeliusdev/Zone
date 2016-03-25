<?php
	
class ZoneInstagram
{
	
	/*
	http://jelled.com/instagram/access-token
	*/
	
	/**
	* Instagram API URL	
	*/
	public static $instagram_api_url = 'https://api.instagram.com/';

	/**
	* Instagram Access Token	
	*/
	public static $instagram_access_token = '10622089.ab103e5.d3e01303eeed4b38998bf779923e0f39';
		
	/**
	* Function to get instagram info from the api	
	*/
	public static function get_photos ( $user_id )
	{
		$json = wp_remote_get( self::$instagram_api_url . 'v1/users/' . $user_id . '/media/recent/?access_token=' . self::$instagram_access_token, array( "timeout" => 120 ) );
         
        $array = json_decode( $json['body'] );       
         
        $photos = $array->data;	
    
        return $photos;	
	}
	
	public function username_to_id( $username )
	{
		$json = wp_remote_get( self::$instagram_api_url . 'v1/users/search?q=' . $username . '&access_token=' . self::$instagram_access_token );
		
		$array = json_decode( $json['body'] );  
		
        $photos = $array->data;	
        
        echo $photos;		     		
		
		return $username;
	}
	
}

?>