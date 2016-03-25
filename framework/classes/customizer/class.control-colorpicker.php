<?php
	
if( class_exists( 'WP_Customize_Control' ) ) :

class ZoneColorPicker extends WP_Customize_Control 
{
	
	public $type = 'zone_colorpicker';
	
	public function render_content() 
	{
	?>
		<label>
		<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
		<input type="text" <?php $this->link(); ?>>
		</label>
	<?php
	}
	
}

endif;

?>