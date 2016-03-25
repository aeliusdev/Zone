<?php
	
if( class_exists( 'WP_Customize_Control' ) ) :

class ZoneCustomizerSidebars extends WP_Customize_Control 
{
	
	public $type = 'zone_sidebar';
	
	public function render_content() 
	{
	?>
		<h3><?php esc_html_e( 'Global Sidebar Position', THEME_TEXT_DOMAIN ) ?></h3>
		
		<ul>
			<li><a href="#">Left Sidebar</a></li>
			<li><a href="#">Right Sidebar</a></li>
			<li><a href="#">Both Sidebars</a></li>
		</ul>
				
	<?php
	}
	
}

endif;

?>