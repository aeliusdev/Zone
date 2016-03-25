<?php

class ZoneInstagramWidget extends WP_Widget 
{

	/**
	 * Register widget with WordPress.
	 */
	function __construct() 
	{
		parent::__construct(
			'instagram_widget', // Base ID
			esc_html__( 'Zone Instagram Widget', THEME_SN ), // Name
			array( 'description' => __( 'A widget that displays instagram related content.', THEME_SN ), 'title' => __( 'Vimeo Widget Title', THEME_SN ) ) // Args
		);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) 
	{
		
	?>

	<div class="widget">
	
	<h2 class="widgettitle"><?php echo esc_html( $instance["title"] ) ?></h2>
			
	<?php		
	$photos = ZoneInstagram::get_photos( $instance["instagram_username"] );
	$count = 0;
	
	switch ( $instance["instagram_type"] )
	{		
		case "gallery":
	
		if ( $photos )
		{
			$html[] = '<ul class="instagram-shots">';
			
			foreach( $photos as $photo )
			{
				if ( $count < $instance["instagram_items"] )
				{ 
					$html[] = '<li><a target="_blank" href="' . $photo->link . '"><img src="' . $photo->images->standard_resolution->url . '" alt=""></a></li>';
					$count++;
				}
			}
		}
		
		$html[] = '</ul><div class="clear"></div>';
	
		echo implode( "\n", $html );
		
		break;
		
		case "slider":
		
		if ( $photos )
		{
			$html[] = '<div class="instagram-widget-slider"><div class="slider">';
			
			foreach( $photos as $photo )
			{
				if ( $count < $instance["instagram_items"] )
				{ 
					$html[] = '<div class="item"><a target="_blank" href="' . $photo->link . '"><img src="' . $photo->images->standard_resolution->url . '" alt=""></a></div>';
					$count++;
				}
			}
		}
		
		$html[] = '</div></div><div class="clear"></div>';
	
		echo implode( "\n", $html );
		
		break;
	
	}

	?>
						
	<div class="instagram-desc"><p><?php echo htmlspecialchars_decode( esc_html( $instance["instagram_description"] ) ) ?></p></div>
	
	</div>
		
	<?php 
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) 
	{
		
		$defaults = array( 'title' => 'Instagram', 'instagram_username' => '', 'instagram_items' => '8');
                       
		$instance = wp_parse_args( (array) $instance, $defaults ); 

		$title = ( ! empty( $instance['title'] ) ) ? $instance["title"] : "";
		$instagram_username = ( ! empty( $instance['instagram_username'] ) ) ? $instance["instagram_username"] : "";
		$instagram_items = ( ! empty( $instance['instagram_items'] ) ) ? $instance["instagram_items"] : "";
		$instagram_description = ( ! empty( $instance['instagram_description'] ) ) ? $instance["instagram_description"] : "";
		$instagram_type = ( ! empty( $instance['instagram_type'] ) ) ? $instance["instagram_type"] : "";
		?>
		<p>
		<h4>Title</h4> 
		<p class="widget-desc">The title of this widget.</p>
		<input class="widget-input" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
		<p>
		<h4>Instagram User ID</h4> 
		<p class="widget-desc">Enter your Instagram User ID. This is NOT your Instagram username, you will need to generate your user id <a target="_blank" href="http://jelled.com/instagram/lookup-user-id">here</a>.</p>		
		<input class="widget-input" id="<?php echo $this->get_field_id( 'instagram_username' ); ?>" name="<?php echo $this->get_field_name( 'instagram_username' ); ?>" type="text" value="<?php echo esc_attr( $instagram_username ); ?>">
		</p>		
		<p>
		<h4>Number of Items</h4> 
		<p class="widget-desc">Enter the number of items you want to show.</p>		
		<input class="widget-input" id="<?php echo $this->get_field_id( 'instagram_items' ); ?>" name="<?php echo $this->get_field_name( 'instagram_items' ); ?>" type="text" value="<?php echo esc_attr( $instagram_items ); ?>">
		</p>
		<p>
		<h4>Type</h4> 
		<p class="widget-desc">Display your Instagram posts in a gallery or slider format.</p>		
		<select name="<?php echo esc_attr( $this->get_field_name( 'instagram_type' ) ) ?>">
			<option value="gallery"<?php if ( $instagram_type == "gallery" ) { echo esc_attr( " selected" ); } ?>>Gallery</option>
			<option value="slider"<?php if ( $instagram_type == "slider" ) { echo esc_attr( " selected" ); } ?>>Slider</option>
		</select>
		</p>
		<p>
		<h4>Description</h4> 
		<p class="widget-desc">Enter some additional info about your instagram here.</p>		
		<input class="widget-input" id="<?php echo esc_attr( $this->get_field_id( 'instagram_description' ) ) ?>" name="<?php echo esc_attr( $this->get_field_name( 'instagram_description' ) ) ?>" type="text" value="<?php echo esc_attr( $instagram_description ); ?>">
		</p>

		<?php 
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) 
	{
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['instagram_username'] = ( ! empty( $new_instance['instagram_username'] ) ) ? strip_tags( $new_instance['instagram_username'] ) : '';
		$instance['instagram_items'] = ( ! empty( $new_instance['instagram_items'] ) ) ? strip_tags( $new_instance['instagram_items'] ) : '';
		$instance['instagram_type'] = ( ! empty( $new_instance['instagram_type'] ) ) ? strip_tags( $new_instance['instagram_type'] ) : '';
		$instance['instagram_description'] = ( ! empty( $new_instance['instagram_description'] ) ) ? strip_tags( $new_instance['instagram_description'] ) : '';

		return $instance;
	}

} // class Foo_Widget

// register Foo_Widget widget
function register_instagram_widget() 
{
    register_widget( 'ZoneInstagramWidget' );
}
add_action( 'widgets_init', 'register_instagram_widget' );