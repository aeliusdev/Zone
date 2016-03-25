<?php
	
if( class_exists( 'WP_Customize_Control' ) ) :

class ZoneSelect extends WP_Customize_Control 
{
	
	public $type = 'zone_select';
	
	public function render_content() 
	{
		global $zone_customizer_config;
		
		foreach( $zone_customizer_config["settings"] as $setting )
		{
			if( $setting["id"] == $this->id ) 
			{
				$choices = $setting["choices"];
			}
		}
	?>
	<div class="zone-customizer-element">
		<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
		<p><?php echo ZoneCustomizer::add_description( $this->id ) ?></p>

		  <div class="zone-customizer-element-select">
		  <a href="#" class="zone-element-select-cover"><i class="btb bt-sort bt-fw"></i> <span></span></a>
		<select class="zone-element-customizer-select" <?php $this->link() ?>>
		<?php 
		foreach( $choices as $choice )
		{
			?>
			<option value="<?php echo esc_attr( $choice['id'] ) ?>"><?php echo esc_html( $choice['name'] ) ?></option>
		<?php	
		}
		?>
		</select>
		
		  <div class="clear"></div>
		</div>
	</div>
	<?php
	}
	
}

endif;

?>