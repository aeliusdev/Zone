<?php

if( class_exists( 'WP_Customize_Control' ) ) :

class ZoneInput extends WP_Customize_Control 
{
	
	public $type = 'zone_input';
	
	public function render_content() 
	{
	?>
	<div class="zone-customizer-element">
		<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
		<p><?php echo ZoneCustomizer::add_description( $this->id ) ?></p>
		<input class="zone-customizer-input" type="text" <?php $this->link(); ?>>
	</div>
	<?php
	}
	
}

endif;

?>