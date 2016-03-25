<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * ZoneLoader class. Loads the Framework.
 */
class ZoneLoader 
{
	public $template_directory;
	
	public function ZoneLoader()
	{
		$this->template_directory = get_template_directory() . '/';
		
		add_action( 'init', array( $this, 'add_theme_supports' ) );
		add_action( 'after_setup_theme', array( $this, 'load_textdomain' ) );
		add_action( 'after_setup_theme', array( $this, 'load_menus' ) );	
		add_action( 'admin_enqueue_scripts', array( $this, 'load_admin_scripts' ) );
		
		$this->load_frontend_functions();
		$this->load_sidebars();
		$this->load_woocommerce();
		$this->load_customizer();
		$this->load_gallery();
		$this->add_admin_pages();
		$this->load_social_apis();
		$this->load_plugins();
		$this->load_layouts();
		$this->load_helpers();
		$this->load_metaboxes();
		$this->load_widgets();
	}
	
	/**
	 * add_theme_supports function. Add Support For Various WordPress Features
	 * 
	 * @access public
	 * @return void
	 */
	public function add_theme_supports()
	{
		global $zone_image_sizes;
		
		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'post-formats', 
		array( 'aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat' ) );
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'woocommerce' );
		
		//add image sizez
		foreach( $zone_image_sizes as $image_size )
		{
			add_image_size( $image_size["name"], $image_size["width"], $image_size["height"], $image_size["crop"] );			
		}
		
		add_filter('widget_text', 'do_shortcode');
	}
	
	/**
	 * load_admin_scripts function.
	 * 
	 * @access public
	 * @return void
	 */
	public function load_admin_scripts() 
	{
        wp_enqueue_style( 'framework-css', THEME_FRAMEWORK_URI . 'assets/framework.css' );
        wp_enqueue_style( 'icon-bt-framework-css', THEME_FRAMEWORK_URI . 'assets/black-tie/css/black-tie.min.css' );
        wp_enqueue_style( 'icon-btb-framework-css', THEME_FRAMEWORK_URI . 'assets/black-tie-bold/css/black-tie.min.css' );
        wp_enqueue_script( 'framework-js', THEME_FRAMEWORK_URI . 'assets/framework.js' );
	}	
	
	/**
	 * load_textdomain function. Load the theme's text domain.
	 * 
	 * @access public
	 * @return void
	 */
	public function load_textdomain()
	{
	    load_theme_textdomain( 'zone', $this->template_directory . 'languages' );
	}
	
	/**
	 * load_plugins function. Load Required & Recommended Plugins
	 * 
	 * @access public
	 * @return void
	 */
	public function load_plugins()
	{
		require_once( $this->template_directory . 'framework/classes/class.tgmpa.php' );		
		require_once( $this->template_directory . 'framework/classes/class.plugins.php' );		
	}
	
	/**
	 * load_element_html function. Loads helper classes and functions.
	 * 
	 * @access public
	 * @return void
	 */
	public function load_helpers()
	{
		require_once( $this->template_directory . 'framework/classes/class.element.php' );				
		require_once( $this->template_directory . 'framework/classes/class.previewer.php' );				
	}
	
	/**
	 * load_menus function. Load Wordpress Navigation Menus
	 * 
	 * @access public
	 * @return void
	 */
	public function load_menus()
	{
		global $zone_menus_config;
		
		if( count( $zone_menus_config ) > 0 )
		{
			foreach( $zone_menus_config as $zone_menu )
			{
				register_nav_menu( $zone_menu["id"], $zone_menu["name"] );
 			}
		}
		
		require_once( $this->template_directory . 'framework/classes/class.mega-menu.php' );						
	}
	
	/**
	 * load_layouts function. Load Layouts.
	 * 
	 * @access public
	 * @return void
	 */
	public function load_layouts()
	{
		global $zone_layouts_config;
		
		require_once( $this->template_directory . 'framework/classes/' . $zone_layouts_config["super"] );
	}

	/**
	 * load_layouts function. Load Layouts.
	 * 
	 * @access public
	 * @return void
	 */
	public function load_metaboxes()
	{
		global $zone_metabox_config;
		
		require_once( $this->template_directory . 'framework/classes/' . $zone_metabox_config["elements"] );		
		require_once( $this->template_directory . 'framework/classes/' . $zone_metabox_config["super"] );
	}
	
	public function add_admin_pages()
	{
		require_once( $this->template_directory . 'framework/classes/class.hq.php' );		
	}
	
	public function load_customizer()
	{		
		foreach ( glob($this->template_directory . 'framework/classes/customizer/*.php') as $file ) 
		{
		    include_once $file;
		}			
		
		require_once( $this->template_directory . 'framework/classes/class.customizer.php' );	
	}
	
	public function load_social_apis()
	{
		require_once( $this->template_directory . 'framework/classes/class.dribbble.php' );			
		require_once( $this->template_directory . 'framework/classes/class.instagram.php' );			
		require_once( $this->template_directory . 'framework/classes/class.soundcloud.php' );			
	}
	
	public function load_gallery()
	{
		require_once( $this->template_directory . 'framework/classes/class.gallery.php' );					
	}
	
	public function load_frontend_functions()
	{
		require_once( $this->template_directory . 'framework/functions/functions.menu.php' );					
		require_once( $this->template_directory . 'framework/functions/functions.breadcrumbs.php' );					
		require_once( $this->template_directory . 'framework/functions/functions.settings.php' );					
	}
	
	public function load_woocommerce()
	{
		require_once( $this->template_directory . 'framework/classes/class.woocommerce.php' );							
	}
	
	public function load_sidebars()
	{
		require_once( $this->template_directory . 'framework/classes/class.sidebars.php' );									
	}
	
	public function load_widgets()	
	{
		global $zone_widgets_config;

		foreach( $zone_widgets_config["widgets"] as $widget )
		{
			require_once( $zone_widgets_config["folder"] . $widget . '.php' );
		}
		
		require_once( $this->template_directory . 'framework/classes/class.sidebars.php' );											
	}
}

new ZoneLoader()

?>