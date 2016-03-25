<?php
	
if( class_exists( 'WP_Customize_Control' ) ) :

class ZoneCustomizerLayout extends WP_Customize_Control 
{
	
	public $type = 'zone_layout';
	
	public function render_content() 
	{
	?>
	<div class="zone-customizer-element">
		<input type="hidden" <?php $this->link() ?>>
		
		<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
		<p><?php echo ZoneCustomizer::add_description( $this->id ) ?></p>
		
		<?php echo ZonePreviewer::create_customizer_preview( $this->id ) ?>
		
	</div>
	<?php
	}
	
}

endif;

?>