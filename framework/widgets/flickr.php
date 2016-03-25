<?php

class ZoneFlickrWidget extends WP_Widget 
{

	/**
	 * Register widget with WordPress.
	 */
	function __construct() 
	{
		parent::__construct(
			'flickr_widget', // Base ID
			esc_html__( 'Zone Flickr Widget', 'brand' ), // Name
			array( 'description' => __( 'A widget that displays a responsive Vimeo video in 16:9.', 'brand' ), 'title' => 'Vimeo Widget Title', 'vimeo_widget' => '', 'vimeo_description' => '') // Args
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
		
		<h2 class="widgettitle"><?php echo $instance["title"] ?></h2>
		
		<div class="video-wrapper">
			<iframe src="//player.vimeo.com/video/<?php echo esc_attr( $instance["vimeo_widget"] ) ?>?title=0&amp;byline=0&amp;portrait=0&amp;wmode=opaque" wmode="opaque" width="500" height="281" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
		</div> 
				
		<div class="vimeo_desc"><?php echo esc_attr( $instance["vimeo_description"] ) ?></div>
		
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
		
		$defaults = array( 'title' => 'Vimeo Widget', 'vimeo_widget' => '', 'vimeo_description' => '');
                       
		$instance = wp_parse_args( (array) $instance, $defaults ); 

		$title = ( ! empty( $instance['title'] ) ) ? $instance["title"] : "";
		$vimeo_widget = ( ! empty( $instance['vimeo_widget'] ) ) ? $instance["vimeo_widget"] : "";
		$vimeo_description = ( ! empty( $instance['vimeo_description'] ) ) ? $instance["vimeo_description"] : "";
		?>
		<p>
		<h4>Title</h4> 
		<p class="widget-desc">The title of this widget.</p>
		<input class="widget-input" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
		<p>
		<h4>Vimeo Video</h4> 
		<p class="widget-desc">Enter the Vimeo video id (for example: 3024834).</p>		
		<input class="widget-input" id="<?php echo $this->get_field_id( 'vimeo_widget' ); ?>" name="<?php echo $this->get_field_name( 'vimeo_widget' ); ?>" type="text" value="<?php echo esc_attr( $vimeo_widget ); ?>">
		</p>
		<p>
		<h4>Vimeo Description</h4> 
		<p class="widget-desc">Enter the Vimeo description.</p>		
		<input class="widget-input" id="<?php echo $this->get_field_id( 'vimeo_description' ); ?>" name="<?php echo $this->get_field_name( 'vimeo_description' ); ?>" type="text" value="<?php echo esc_attr( $vimeo_description ); ?>">
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
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['vimeo_widget'] = ( ! empty( $new_instance['vimeo_widget'] ) ) ? strip_tags( $new_instance['vimeo_widget'] ) : '';
		$instance['vimeo_description'] = ( ! empty( $new_instance['vimeo_description'] ) ) ? strip_tags( $new_instance['vimeo_description'] ) : '';

		return $instance;
	}

} // class Foo_Widget

// register Foo_Widget widget
function register_flickr_widget() 
{
    register_widget( 'ZoneFlickrWidget' );
}
add_action( 'widgets_init', 'register_flickr_widget' );