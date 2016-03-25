<?php

class ZoneYouTubeWidget extends WP_Widget 
{

	/**
	 * Register widget with WordPress.
	 */
	function __construct() 
	{
		parent::__construct(
			'youtube_widget', // Base ID
			__('Zone YouTube Widget', 'brand'), // Name
			array( 'description' => __( 'A widget that displays a soundcloud player.', THEME_SN ), 'title' => __( 'Soundcloud', THEME_SN ) ) // Args
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
		
		<div class="zone-video-wrapper">
			<iframe src="https://www.youtube.com/embed/<?php echo esc_attr( $instance["youtube_widget"] ) ?>?title=0&amp;byline=0&amp;portrait=0&amp;wmode=opaque" wmode="opaque" width="500" height="281" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
		</div> 
				
		<?php if ( $instance["youtube_description"] != "" ) : ?>
		<div class="youtube-desc"><p><?php echo esc_attr( $instance["youtube_description"] ) ?></p></div>
		<?php endif; ?>
		
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
		
		$defaults = array( 'title' => 'YouTube Widget', 'youtube_widget' => '', 'youtube_description' => '');
                       
		$instance = wp_parse_args( (array) $instance, $defaults ); 

		$title = ( ! empty( $instance['title'] ) ) ? $instance["title"] : "";
		$youtube_widget = ( ! empty( $instance['youtube_widget'] ) ) ? $instance["youtube_widget"] : "";
		$youtube_description = ( ! empty( $instance['youtube_description'] ) ) ? $instance["youtube_description"] : "";
		?>
		<p>
		<h4>Title</h4> 
		<p class="widget-desc">The title of this widget.</p>
		<input class="widget-input" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
		<p>
		<h4>YouTube Video</h4> 
		<p class="widget-desc">Enter the YouTube video id (for example: 1lIm-dcJwK8).</p>		
		<input class="widget-input" id="<?php echo $this->get_field_id( 'youtube_widget' ); ?>" name="<?php echo $this->get_field_name( 'youtube_widget' ); ?>" type="text" value="<?php echo esc_attr( $youtube_widget ); ?>">
		</p>
		<p>
		<h4>YouTube Description</h4> 
		<p class="widget-desc">Enter the YouTube description.</p>		
		<input class="widget-input" id="<?php echo $this->get_field_id( 'youtube_description' ); ?>" name="<?php echo $this->get_field_name( 'youtube_description' ); ?>" type="text" value="<?php echo esc_attr( $youtube_description ); ?>">
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
		$instance['youtube_widget'] = ( ! empty( $new_instance['youtube_widget'] ) ) ? strip_tags( $new_instance['youtube_widget'] ) : '';
		$instance['youtube_description'] = ( ! empty( $new_instance['youtube_description'] ) ) ? strip_tags( $new_instance['youtube_description'] ) : '';

		return $instance;
	}

} // class Foo_Widget

// register Foo_Widget widget
function register_youtube_widget() 
{
    register_widget( 'ZoneYouTubeWidget' );
}
add_action( 'widgets_init', 'register_youtube_widget' );