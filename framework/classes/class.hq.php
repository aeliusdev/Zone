<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * ZoneWelcome class. Creates a welcome page for the theme.
 */
class ZoneWelcome 
{
	
	/**
	 * ZoneLayout function.
	 * 
	 * @access public
	 * @return void
	 */
	public function ZoneWelcome()
	{
		add_action( 'admin_menu', array( &$this, 'add_theme_page' ) );	
	}
	
	/**
	 * themep_hq_add_theme_page function.
	 * 
	 * @access public
	 * @return void
	 */
	public function add_theme_page()
	{
		add_menu_page( THEME_SN . ' HQ', THEME_SN . ' HQ', 'manage_options', 'hq', array( &$this, 'create_welcome_page' ), "dashicons-admin-site", 3 );		
	}
	
	/**
	 * themep_create_hq_page function.
	 * 
	 * @access public
	 * @return void
	 */
	public function create_welcome_page () 
	{
		$theme_info = wp_get_theme();
				
		?>
		<div id="zone-welcome">
			
		<div class="wrap about-wrap">

<h1>Welcome to <?php echo esc_html( $theme_info->get( 'Name' ) ) ?> <?php echo esc_html( $theme_info->get( 'Version' ) ) ?></h1>

<div class="about-text">Thank you for purchasing <?php echo esc_html( $theme_info->get( 'Name' ) ) ?>! Make sure you read the documentation as it will help you to master the theme's functions. If you need support you can visit our Knowledge Base for FAQs and other articles or visit our dedicated support forum here: http://support.themeprovince.com/. Enjoy it!</div>

<div class="wp-badge">Version <?php echo esc_html( $theme_info->get( 'Version' ) ) ?></div>

<h2 class="nav-tab-wrapper">
	<a href="freedoms.php" class="nav-tab nav-tab-active">
		Documentation (Readme)	
	</a>	
	<a href="about.php" class="nav-tab">
		Tutorials & Support
	</a>
	<a href="credits.php" class="nav-tab">
		Theme Demos	
	</a>
</h2>

</div>	
			
		</div>
		<?php
	}
	
}	

new ZoneWelcome();

?>