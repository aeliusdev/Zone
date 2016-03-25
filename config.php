<?php 

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Theme Framework Constants
 */
define( "THEME_SN", "Zone" );
define( "THEME_TEXT_DOMAIN", "zone" );
define( "THEME_FRAMEWORK",  get_template_directory() . '/framework/' );
define( "THEME_FRAMEWORK_URI",  get_template_directory_uri() . '/framework/' );
define( "THEME_LAYOUTS", get_template_directory() . '/layouts/' );
define( "THEME_LAYOUTS_URI", get_template_directory_uri() . '/layouts/' );
define( "THEME_WIDGETS", get_template_directory() . '/framework/widgets/' );
define( "SHORTCODE_PREFIX", "zn" );

$zone_customizer_config = array( 'settings' => array(
															
							array( "id"   => "text-input",
								   'name' => 'Text Input',
								   'section' => 'test',
								   'control' => 'zone_input',
								   'transport' => 'refresh',
								   'description' => 'This is a input text area',
								   'default' => '<p>This is a description.</p>'
							),
							
							array( "id"   => "layout",
									   'name' => 'Select a Layout',
									   'section' => 'layout',
									   'control' => 'zone_layout',
									   'transport' => 'refresh',
									   'description' => 'Choose the main layout of your site.',
									   'default' => 'standard'
							),
							
							array( "id"   => "sidebars",
									   'name' => 'Global Sidebars Position',
									   'section' => 'layout',
									   'control' => 'zone_select',
									   'choices' => array(
										   array( 'id' => 'left_sidebar', 'name' => 'Left Sidebar' ),
										   array( 'id' => 'right_sidebar', 'name' => 'Right Sidebar' ),
										   array( 'id' => 'both_sidebars', 'name' => 'Both Sidebars' ),
									   ),
									   'transport' => 'refresh',
									   'description' => 'This is a input text area',
									   'default' => 'left_sidebar'
							)
								 
							),
									 
						'sections' => array(
														
							array( "id" => "test",
								   'name' => 'Test',
								   'priority' => 40
							),
															
							array( "id" => "layout",
								   'name' => 'Layout',
								   'priority' => 30
							)
						
						));

$zone_builder_config = array( 'allowed_post_types' => array( 'page' ) );

$zone_layouts_config = array( 'super'  => 'class.layout.php',
							  'folder' => THEME_LAYOUTS, 							  
							  'layouts' => array(
							  	array( 'id' => 'standard',
							  	"name" => "Standard" ),
							  	array( 'id' => 'boxed',
							  	"name" => "Boxed" ),
							  	array( 'id' => 'fullscreen',
							  	"name" => "Fullscreen" ),
							  	array( 'id' => 'framed',
							  	"name" => "Framed" ),   
							  )
							  
							  );

$zone_metabox_config = array( 'super'     => 'class.metabox.php',
							  'elements'  => 'class.metaboxelement.php',
							  'folder'    => THEME_FRAMEWORK, 
							  
							  'metaboxes' => array( 
						  						
		  						array( 'id' => 'post_settings',
								'name'      => __( 'Post Settings', THEME_TEXT_DOMAIN ),
								'post_type' => 'post',
								'context'   => 'advanced',
								'priority'  => 'core',
								),
							
								array( 'id' => 'page_settings',
								'name'      => __( 'Page Settings', THEME_TEXT_DOMAIN ),
								'post_type' => 'page',
								'context'   => 'advanced',
								'priority'  => 'core',
								),

								array( 'id' => 'gallery_settings',
								'name'      => __( 'Gallery Manager', THEME_TEXT_DOMAIN ),
								'post_type' => 'theme_gallery',
								'context'   => 'advanced',
								'priority'  => 'core',
								),
								
								array( 'id' => 'portfolio_item_settings',
								'name'      => __( 'Portfolio Item Settings', THEME_TEXT_DOMAIN ),
								'post_type' => 'portfolio',
								'context'   => 'advanced',
								'priority'  => 'core',
								),
								
								array( 'id' => 'layout_settings',
								'name'      => __( 'Layout Settings', THEME_TEXT_DOMAIN ),
								'post_type' => 'page',
								'context'   => 'side',
								'priority'  => 'low',
								)	
										
							  ),							
							
							  'metabox_elements' => array( 
									
									array(
									'id' => 'zone-page-show-header',
									'name' => __('Dropdown Example', THEME_TEXT_DOMAIN),
									'metabox' => 'page_settings',
									'context' => 'core',
									'type' => 'select',
									'choices' => array( 
										array( 'id' => 'yes', 'name' => 'Yes, Show the header in place.' ),
										array( 'id' => 'no', 'name' => 'No' )
									 ),
									'description' => '<p>This is the page subtitle, the title that appears under the main heading.</p>',
									'last' => false
									),
									
									array(
									'id' => 'zone-page-subtitle-2',
									'name' => __('Input Example', THEME_TEXT_DOMAIN),
									'metabox' => 'page_settings',
									'context' => 'core',
									'type' => 'input',
									'description' => '<p>This is the page subtitle, the title that appears under the main heading.</p>',
									'last' => true
									),
									
									array(
									'id' => 'zone-builder-layout',
									'name' => 'Page Layout',
									'metabox' => 'layout_settings',
									'context' => 'side',
									'type' => 'layout',
									'description' => '',
									'last' => false	
									),
									
									array(
									'id' => 'zone-layout-sidebars',
									'name' => __('Sidebar Layout', THEME_TEXT_DOMAIN),
									'metabox' => 'layout_settings',
									'context' => 'side',
									'type' => 'select',
									'choices' => array( 
										array( 'id' => 'default', 'name' => 'Default - Defined in Appearance > Customise > Layout.' ),
										array( 'id' => 'left', 'name' => 'Left Sidebar' ),
										array( 'id' => 'right', 'name' => 'Right Sidebar' ),
										array( 'id' => 'both', 'name' => 'Both Sidebars' ),
										array( 'id' => 'no', 'name' => 'No Sidebar' ),
									 ),
									'description' => '<p>This is the page subtitle, the title that appears under the main heading.</p>',
									'last' => false
									),
									
									array(
									'id' => 'zone-layout-header',
									'name' => __('Header', THEME_TEXT_DOMAIN),
									'metabox' => 'layout_settings',
									'context' => 'side',
									'type' => 'select',
									'choices' => array( 
										array( 'id' => 'default', 'name' => 'Default - Defined in Appearance > Customise > Layout.' ),
										array( 'id' => 'show_header', 'name' => 'Show Header' ),
										array( 'id' => 'hide_header', 'name' => 'Hide Header' ),
									 ),
									'description' => '<p>This is the page subtitle, the title that appears under the main heading.</p>',
									'last' => false
									),
									
									array(
									'id' => 'zone-layout-footer',
									'name' => __('Footer', THEME_TEXT_DOMAIN),
									'metabox' => 'layout_settings',
									'context' => 'side',
									'type' => 'select',
									'choices' => array( 
										array( 'id' => 'default', 'name' => 'Default - Defined in Appearance > Customise > Layout.' ),
										array( 'id' => 'show_footer', 'name' => 'Show Footer' ),
										array( 'id' => 'hide_footer', 'name' => 'Hide Footer' ),
									 ),
									'description' => '<p>Choose whether you want to display or hide the footer on this page.</p>',
									'last' => false
									),
									
									array(
									'id' => 'zone-gallery',
									'name' => __('Gallery', THEME_TEXT_DOMAIN),
									'metabox' => 'gallery_settings',
									'context' => 'side',
									'type' => 'gallery',
									'description' => '<p>Choose whether you want to display or hide the footer on this page.</p>',
									'last' => true
									),
									
									array(
									'id' => 'zone-portfolio-item-type',
									'name' => __('Media Type', THEME_TEXT_DOMAIN),
									'metabox' => 'portfolio_item_settings',
									'context' => 'core',
									'choices' => array( 
										array( 'id' => 'image', 'name' => 'Image' ),
										array( 'id' => 'slider', 'name' => 'Slider' ),
										array( 'id' => 'video', 'name' => 'HTML5 Video' ),
										array( 'id' => 'vimeo', 'name' => 'Vimeo' ),
										array( 'id' => 'youtube', 'name' => 'YouTube' ),
										array( 'id' => 'gallery', 'name' => 'Gallery' ),
										array( 'id' => 'audio', 'name' => 'Audio' ),
									 ),
									'type' => 'select',
									'description' => '<p>Determine the type of media to be displayed by this portfolio item. New options will appear for certain types.</p>',
									'last' => true
									),
														
							  ));
					
$zone_menus_config = array( array( 'id'       => 'primary',
								   'name'     => __( 'Primary Navigation', THEME_TEXT_DOMAIN ),
								   'supports' => array( 'standard' )
								   ),
							array( 'id'       => 'upper',
								   'name'     => __( 'Upper Navigation', THEME_TEXT_DOMAIN ) 
								   ),
							array( 'id'       => 'footer',
								   'name'     => __( 'Footer Navigation', THEME_TEXT_DOMAIN ) 
								   ) 	    
							  );


/**
 * Theme Translations
 */

$zone_translations_config = array(
	
	"add_new" => __( "Add New", THEME_TEXT_DOMAIN ), 
	"edit" => __( "Edit", THEME_TEXT_DOMAIN ), 
	"new" => __( "New", THEME_TEXT_DOMAIN ), 
	"view" => __( "View", THEME_TEXT_DOMAIN ), 
	"search" => __( "Search", THEME_TEXT_DOMAIN ), 
	"no_items_found" => __( "No Items Found", THEME_TEXT_DOMAIN ),
	"no_items_found_in_trash" => __( "No Items Found In Trash", THEME_TEXT_DOMAIN ),
	"all" => __( "All", THEME_TEXT_DOMAIN ),
	"parent" => __( "Parent", THEME_TEXT_DOMAIN ),
	"name" => __( "Name", THEME_TEXT_DOMAIN ),
	"update" => __( "Update", THEME_TEXT_DOMAIN ),
	
);

$zone_post_types_config = array(
	
	array( "post_type_name" => 'portfolio',
	"singular_name" => __( "Portfolio Item", THEME_TEXT_DOMAIN ),
	"plural_name" => __( "Portfolio Items", THEME_TEXT_DOMAIN ),
	"lowercase_singular_name" => __( "portfolio item", THEME_TEXT_DOMAIN ),
	"lowercase_plural_name" =>  __( "portfolio items", THEME_TEXT_DOMAIN ),
	"public" => true,
	"publicly_queryable" => true,
	"show_ui" => true,
	"show_in_menu" => true,
	"query_var" => true,
	"rewrite" => true,
	"capability_type" => 'post',
    'has_archive' => true, 
    'hierarchical' => false,
    'menu_position' => null,
    'supports' => array( 'title', 'thumbnail', 'editor' ),		
    'icon' => "dashicons-index-card" 
    ),

	array( "post_type_name" => 'theme_gallery',
	"singular_name" => __( "Gallery", THEME_TEXT_DOMAIN ),
	"plural_name" => __( "Galleries", THEME_TEXT_DOMAIN ),
	"lowercase_singular_name" => __( "gallery", THEME_TEXT_DOMAIN ),
	"lowercase_plural_name" =>  __( "galleries", THEME_TEXT_DOMAIN ),
	"public" => true,
	"publicly_queryable" => true,
	"show_ui" => true,
	"show_in_menu" => true,
	"query_var" => true,
	"rewrite" => true,
	"capability_type" => 'post',
    'has_archive' => true, 
    'hierarchical' => false,
    'menu_position' => null,
    'supports' => array( 'title', 'thumbnail' ),
    'icon' => "dashicons-images-alt2" )

);

$zone_taxonomies_config = array(
	
	array("plural_name" => __( 'Portfolio Tags', THEME_TEXT_DOMAIN ),
	"singular_name" => __( 'Portfolio Tag', THEME_TEXT_DOMAIN ),
	"taxonomy_name" => 'portfolio-tags',
	"post_type" => 'portfolio',
	"hierarchical" => false,
	"show_ui" => true,
	"query_var" => true,
	"rewrite" => true),
	 
	array("plural_name" => __( 'Portfolios', THEME_TEXT_DOMAIN ),
	"singular_name" => __( 'Portfolio', THEME_TEXT_DOMAIN ),
	"taxonomy_name" => 'portfolio-categories',
	"post_type" => 'portfolio',
	"hierarchical" => true,
	"show_ui" => true,
	"query_var" => true,
	"rewrite" => true)	
	 
);

$zone_widgets_config = array( 'folder'  => THEME_WIDGETS,
							  'widgets' => array( 'dribbble','flickr','galleries','instagram','soundcloud','vimeo','youtube' ),		
					   		  'predefined_areas' => array( 
						   		  array( 'id' => 'default_left', 'name' => 'Default Sidebar (Left)', 'description' => 'The default left sidebar.' ),
						   		  array( 'id' => 'default_right', 'name' => 'Default Sidebar (Right)', 'description' => 'The default right sidebar.' ), 
						   		  array( 'id' => 'footer_widget_1', 'name' => 'Footer Widget 1st Column', 'description' => 'The default sidebar.' ),
						   		  array( 'id' => 'footer_widget_2', 'name' => 'Footer Widget 2nd Column', 'description' => 'The default sidebar.' ),
						   		  array( 'id' => 'footer_widget_3', 'name' => 'Footer Widget 3rd Column', 'description' => 'The default sidebar.' ),
						   		  array( 'id' => 'footer_widget_4', 'name' => 'Footer Widget 4th Column', 'description' => 'The default sidebar.' ),
						   		  array( 'id' => 'footer_widget_5', 'name' => 'Footer Widget 5th Column', 'description' => 'The default sidebar.' ),
						   		  array( 'id' => 'footer_widget_6', 'name' => 'Footer Widget 6th Column', 'description' => 'The default sidebar.' ),
						   		  array( 'id' => 'side_area', 'name' => 'Side Area', 'description' => 'The side area section.' ),						   		  
					   		   )	
	
);

$zone_image_sizes = array(
	
	array( 'name' => 'blog-thumb', 
	'width' => 900, 
	'height' => 800, 
	'crop' => true ),
	
	array( 'name' => 'portfolio-thumb', 
	'width' => 60, 
	'height' => 60, 
	'crop' => true ),
		
	array( 'name' => 'standard', 
	'width' => 200, 
	'height' => 200, 
	'crop' => true ),

	array( 'name' => 'masonry', 
	'width' => 800, 
	'height' => 99999, 
	'crop' => false ),

	array( 'name' => 'gallery_one_column', 
	'width' => 1000, 
	'height' => 99999, 
	'crop' => false ),

	array( 'name' => 'gallery_two_column', 
	'width' => 1000, 
	'height' => 800, 
	'crop' => true ),

	array( 'name' => 'gallery_three_column', 
	'width' => 600, 
	'height' => 550, 
	'crop' => true ),

	array( 'name' => 'gallery_four_column', 
	'width' => 600, 
	'height' => 550, 
	'crop' => true ),

	array( 'name' => 'gallery_five_column', 
	'width' => 500, 
	'height' => 450, 
	'crop' => true ),
	
	array( 'name' => 'portfolio_medium', 
	'width' => 500, 
	'height' => 450, 
	'crop' => true ),	
	
);

$zone_woocommerce_config = array( 'actions' => array( array( 'name' => 'woocommerce_before_main_content', 'function' => 'woocommerce_output_content_wrapper', 'priority' => 10 ), 
	array( 'name' => 'woocommerce_after_main_content', 'function' => 'woocommerce_output_content_wrapper_end', 'priority' => 10 ),
	array( 'name' => 'woocommerce_before_main_content', 'function' => 'woocommerce_breadcrumb', 'priority' => 20 )
	)
);
	
?>