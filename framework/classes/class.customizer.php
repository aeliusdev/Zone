<?php 
	
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * ZoneCustomizer class.
 */
class ZoneCustomizer
{
	
	public function ZoneCustomizer()
	{
		add_action( 'customize_register', array( $this, 'add_sections' ) );
		add_action( 'customize_register', array( $this, 'add_settings' ) );
	}
	
	public function add_sections( $customizer )
	{
		global $zone_customizer_config;
		
		foreach( $zone_customizer_config["sections"] as $section )
		{
			$customizer->add_section( $section["id"], array(
	        'title'    => $section["name"],
	        'description' => '',
	        'priority' => $section["priority"],
			));			
		}
	}
	
	public function add_settings( $customizer )
	{
		global $zone_customizer_config;

		foreach( $zone_customizer_config["settings"] as $setting )
		{
			$customizer->add_setting( $setting["id"], array(
	        'default'        => $setting["default"],
	        'capability'     => 'edit_theme_options',
	        'type'           => 'option', 
			));
			
			switch( $setting["control"] )
			{
				case "zone_input":
					$customizer->add_control(
						new ZoneInput(
					        $customizer,
					        $setting["id"],
					        array(
					            'label'    => $setting["name"],
					            'settings' => $setting["id"],
					            'section'  => $setting["section"]
					        )
					    )
					);
				break;
				case "zone_layout":
					$customizer->add_control(
							new ZoneCustomizerLayout(
						        $customizer,
						        $setting["id"],
						        array(
						            'label'    => $setting["name"],
						            'settings' => $setting["id"],
						            'section'  => $setting["section"]
						        )
						    )
					);
				break;
				case "zone_select":
					$customizer->add_control(
							new ZoneSelect(
						        $customizer,
						        $setting["id"],
						        array(
						            'label'    => $setting["name"],
						            'settings' => $setting["id"],
						            'section'  => $setting["section"]
						        )
						    )
					);
				break;
			}
		}		
	}
	
	public static function add_description( $current )
	{
		global $zone_customizer_config;
		
		foreach( $zone_customizer_config["settings"] as $setting )
		{
			if( $setting["id"] == $current )
			{
				$output = $setting["description"];
			}
		}
		
		return $output;
	}
	
}

new ZoneCustomizer();
	
?>