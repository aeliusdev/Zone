<?php

/**
 * Theme WooCommerce Class - Includes all WooCommerce related functions.
 */

class ZoneWooCommerce 
{
	
	public function ZoneWooCommerce()
	{
		global $zone_woocommerce_config;
		
		$this->zone_woocommerce_remove_actions( $zone_woocommerce_config["actions"] );	
	}
	
	/**
	 * Function to check whether WooCommerce is activated.
	 * @return true or false.
	 */
	public static function is_active()
	{
		if ( class_exists( 'Woocommerce' ) ) 
		{			
			return true;			
		} else 
		{	
			return false;	
		}
	}

	/**
	 * Function to remove unwanted actions from WooCommerce.
	 * @param $actions - Array of actions to remove.
	 */
	public function zone_woocommerce_remove_actions($actions)
	{
		if( count( $actions ) > 0 )
		{
			foreach($actions as $action)
			{		
				remove_action( $action["name"], $action["function"], $action["priority"] );	
			}
		}		
	}	
	
}

new ZoneWooCommerce(); 