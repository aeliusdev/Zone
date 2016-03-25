<?php

class ZoneDribbbleWidget extends WP_Widget 
{

	/**
	 * Register widget with WordPress.
	 */
	function __construct() 
	{
		parent::__construct(
			'dribbble_widget', // Base ID
			__('Zone Dribbble Widget', 'brand'), // Name
			array( 'description' => __( 'A widget that displays a dribbble feed.', THEME_SN ), 'title' => __( 'Dribbble', THEME_SN ) ) // Args
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
			
	$shots = ZoneDribbble::get_shots( $instance["dribbble_username"], $instance["dribbble_items"] );
	
	?>
	
	<div class="widget">
	
	<h2 class="widgettitle"><?php echo $instance["title"] ?></h2>
	
	<?php	
		
	switch( $instance["dribbble_type"] )
	{
		
		case "gallery":
			
			if ( $shots )
			{
				$html[] = '<ul class="dribbble-shots">';
				
				foreach( $shots as $shot )
				{
					$html[] = '<li><a target="_blank" href="' . $shot->short_url . '"><img src="' . $shot->image_url . '" alt=""></a></li>';
				}
			}
			
			$html[] = '</ul><div class="clear"></div>';
			
			echo implode( "\n", $html );
		
		break;
		
		case "slider":

			if ( $shots )
			{
				$html[] = '<div class="dribbble-widget-slider"><div class="slider">';
				
				foreach( $shots as $shot )
				{
					$html[] = '<div class="item"><a target="_blank" href="' . $shot->short_url . '"><img src="' . $shot->image_url . '" alt=""></a></div>';
				}
			}
			
			$html[] = '</div></div><div class="clear"></div>';
			
			echo implode( "\n", $html );
		
		break;
	
	}
	
	?>
		
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
		$defaults = array( 'title' => 'Dribbble', 'dribbble_username' => '', 'dribbble_items' => '8');
                       
		$instance = wp_parse_args( (array) $instance, $defaults ); 

		$title = ( ! empty( $instance['title'] ) ) ? $instance["title"] : "";
		$dribbble_username = ( ! empty( $instance['dribbble_username'] ) ) ? $instance["dribbble_username"] : "";
		$dribbble_items = ( ! empty( $instance['dribbble_items'] ) ) ? $instance["dribbble_items"] : "";
		$dribbble_type = ( ! empty( $instance['dribbble_type'] ) ) ? $instance["dribbble_type"] : "";
		?>
		<p>
		<h4>Title</h4> 
		<p class="widget-desc">The title of this widget.</p>
		<input class="widget-input" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
		<p>
		<h4>Dribbble Username</h4> 
		<p class="widget-desc">Enter your Dribbble username.</p>		
		<input class="widget-input" id="<?php echo $this->get_field_id( 'dribbble_username' ); ?>" name="<?php echo $this->get_field_name( 'dribbble_username' ); ?>" type="text" value="<?php echo esc_attr( $dribbble_username ); ?>">
		</p>		
		<p>
		<h4>Type</h4> 
		<p class="widget-desc">Display your Dribbble shots in a gallery or slider format.</p>		
		<select name="<?php echo esc_attr( $this->get_field_name( 'dribbble_type' ) ) ?>">
			<option value="gallery"<?php if ( $dribbble_type == "gallery" ) { echo esc_attr( " selected" ); } ?>>Gallery</option>
			<option value="slider"<?php if ( $dribbble_type == "slider" ) { echo esc_attr( " selected" ); } ?>>Slider</option>
		</select>
		</p>
		<p>
		<h4>Number of Items</h4> 
		<p class="widget-desc">Enter the number of items you want to show.</p>		
		<input class="widget-input" id="<?php echo $this->get_field_id( 'dribbble_items' ); ?>" name="<?php echo $this->get_field_name( 'dribbble_items' ); ?>" type="text" value="<?php echo esc_attr( $dribbble_items ); ?>">
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
		$instance['dribbble_username'] = ( ! empty( $new_instance['dribbble_username'] ) ) ? strip_tags( $new_instance['dribbble_username'] ) : '';
		$instance['dribbble_items'] = ( ! empty( $new_instance['dribbble_items'] ) ) ? strip_tags( $new_instance['dribbble_items'] ) : '';
		$instance['dribbble_type'] = ( ! empty( $new_instance['dribbble_type'] ) ) ? strip_tags( $new_instance['dribbble_type'] ) : '';

		return $instance;
	}

} // class Foo_Widget

// register Foo_Widget widget
function register_dribbble_widget() 
{
    register_widget( 'ZoneDribbbleWidget' );
}
add_action( 'widgets_init', 'register_dribbble_widget' );