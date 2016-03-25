<?php

class ZoneSoundcloudWidget extends WP_Widget 
{

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'soundcloud_widget', // Base ID
			__('Zone Soundcloud Widget', 'brand'), // Name
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
		$player_id = $instance["soundcloud_id"];
		$player_url = $instance["soundcloud_url"];
		$player_autoplay = ( $instance["soundcloud_autoplay"] == "on" ) ? "true" : "false";
		$player_sharing = ( $instance["soundcloud_sharing"] == "on" ) ? "true" : "false";
		$player_artwork = ( $instance["soundcloud_artwork"] == "on" ) ? "true" : "false";
		$player_comments = ( $instance["soundcloud_comments"] == "on" ) ? "true" : "false";
		$player_related = ( $instance["soundcloud_related"] == "on" ) ? "false" : "true";
		$player_visual = ( $instance["soundcloud_visual"] == "on" ) ? "true" : "false";
		
		$config = array( "id" => $player_id,
						"url" => $player_url,
						"autoplay" => $player_autoplay,
						"sharing" => $player_sharing,
						"show_artwork" => $player_artwork,
						"show_comments" => $player_comments,
						"hide_related" => $player_related,
						"visual" => $player_visual,
						);
	
	?>

	<div class="widget">
	
	<h2 class="widgettitle"><?php echo esc_html( $instance["title"] ) ?></h2>
	
	<div class="zone-video-wrapper"><?php echo ZoneSoundCloud::player( $config ); ?></div>
	
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
		
		$defaults = array( 'title' => 'Soundcloud Widget', 'soundcloud_id' => 'widget-player' );
                       
		$instance = wp_parse_args( (array) $instance, $defaults ); 

		$title = ( ! empty( $instance['title'] ) ) ? $instance["title"] : "";
		$soundcloud_id = ( ! empty( $instance['soundcloud_id'] ) ) ? $instance["soundcloud_id"] : "";
		$soundcloud_url = ( ! empty( $instance['soundcloud_url'] ) ) ? $instance["soundcloud_url"] : "";
		$soundcloud_autoplay = ( ! empty( $instance['soundcloud_autoplay'] ) ) ? $instance["soundcloud_autoplay"] : "off";
		$soundcloud_sharing = ( ! empty( $instance['soundcloud_sharing'] ) ) ? $instance["soundcloud_sharing"] : "off";
		$soundcloud_artwork = ( ! empty( $instance['soundcloud_artwork'] ) ) ? $instance["soundcloud_artwork"] : "off";
		$soundcloud_comments = ( ! empty( $instance['soundcloud_comments'] ) ) ? $instance["soundcloud_comments"] : "off";
		$soundcloud_related = ( ! empty( $instance['soundcloud_related'] ) ) ? $instance["soundcloud_related"] : "off";
		$soundcloud_visual = ( ! empty( $instance['soundcloud_visual'] ) ) ? $instance["soundcloud_visual"] : "off";
		?>
		<p>
		<h4>Title</h4> 
		<p class="widget-desc">The title of this widget.</p>
		<input class="widget-input" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
		<p>
		<h4>Player ID</h4> 
		<p class="widget-desc">Enter a unique player id.</p>		
		<input class="widget-input" id="<?php echo $this->get_field_id( 'soundcloud_id' ); ?>" name="<?php echo $this->get_field_name( 'soundcloud_id' ); ?>" type="text" value="<?php echo esc_attr( $soundcloud_id ); ?>">
		</p>		
		<p>
		<h4>Soundcloud Track/Playlist/Likes URL</h4> 
		<p class="widget-desc">Paste the Soundcloud content url you want to show here. For example if you want to play a track paste the url here from Soundcloud. (eg. https://soundcloud.com/its-my-life-2/frank-sinatra-my-way) </p>		
		<input class="widget-input" id="<?php echo $this->get_field_id( 'soundcloud_url' ); ?>" name="<?php echo $this->get_field_name( 'soundcloud_url' ); ?>" type="text" value="<?php echo esc_attr( $soundcloud_url ); ?>">
		</p>		
		<p>
		<h4>Autoplay</h4> 
		<p style="position: relative;"><a class="themep-widget-checkbox" href="#" style=""><?php if ( $soundcloud_autoplay == "on" ) { echo '<i class="fa fa-check"></i>'; } ?><input name="<?php echo $this->get_field_name( 'soundcloud_autoplay' ); ?>" type="hidden" value="<?php echo esc_attr( $soundcloud_autoplay ); ?>"></a></p>
		<p class="widget-desc">Would you like the audio to play automatically on page load?</p>		
		</p>
		<p>
		<h4>Sharing Buttons</h4> 
		<p style="position: relative;"><a class="themep-widget-checkbox" href="#"><?php if ( $soundcloud_sharing == "on" ) { echo '<i class="fa fa-check"></i>'; } ?><input name="<?php echo $this->get_field_name( 'soundcloud_sharing' ); ?>" type="hidden" value="<?php echo esc_attr( $soundcloud_sharing ); ?>"></a></p>
		<p class="widget-desc">Show/hide the social sharing buttons on the player.</p>		
		</p>
		<p>
		<h4>Show Artwork</h4> 
		<p style="position: relative;"><a class="themep-widget-checkbox" href="#"><?php if ( $soundcloud_artwork == "on" ) { echo '<i class="fa fa-check"></i>'; } ?><input name="<?php echo $this->get_field_name( 'soundcloud_artwork' ); ?>" type="hidden" value="<?php echo esc_attr( $soundcloud_artwork ); ?>"></a></p>
		<p class="widget-desc">Show/hide the artwork for the current track.</p>		
		</p>
		<p>
		<h4>Show Comments</h4> 
		<p style="position: relative;"><a class="themep-widget-checkbox" href="#"><?php if ( $soundcloud_comments == "on" ) { echo '<i class="fa fa-check"></i>'; } ?><input name="<?php echo $this->get_field_name( 'soundcloud_comments' ); ?>" type="hidden" value="<?php echo esc_attr( $soundcloud_comments ); ?>"></a></p>
		<p class="widget-desc">Show/hide track comments that appear on the player.</p>		
		</p>
		<h4>Hide Related Info</h4> 
		<p style="position: relative;"><a class="themep-widget-checkbox" href="#"><?php if ( $soundcloud_related == "on" ) { echo '<i class="fa fa-check"></i>'; } ?><input name="<?php echo $this->get_field_name( 'soundcloud_related' ); ?>" type="hidden" value="<?php echo esc_attr( $soundcloud_related ); ?>"></a></p>
	<p class="widget-desc">Show/hide related tracks which appear when the track is paused or finishes.</p>		
		</p>
		<p>
		<h4>Visual Mode</h4> 
		<p style="position: relative;"><a class="themep-widget-checkbox" href="#"><?php if ( $soundcloud_visual == "on" ) { echo '<i class="fa fa-check"></i>'; } ?><input name="<?php echo $this->get_field_name( 'soundcloud_visual' ); ?>" type="hidden" value="<?php echo esc_attr( $soundcloud_visual ); ?>"></a></p>
		<p class="widget-desc">Display the player in visual mode.</p>		
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
		$instance['soundcloud_id'] = ( ! empty( $new_instance['soundcloud_id'] ) ) ? strip_tags( $new_instance['soundcloud_id'] ) : '';
		$instance['soundcloud_url'] = ( ! empty( $new_instance['soundcloud_url'] ) ) ? strip_tags( $new_instance['soundcloud_url'] ) : '';
		$instance['soundcloud_autoplay'] = ( ! empty( $new_instance['soundcloud_autoplay'] ) ) ? strip_tags( $new_instance['soundcloud_autoplay'] ) : '';
		$instance['soundcloud_sharing'] = ( ! empty( $new_instance['soundcloud_sharing'] ) ) ? strip_tags( $new_instance['soundcloud_sharing'] ) : '';
		$instance['soundcloud_artwork'] = ( ! empty( $new_instance['soundcloud_artwork'] ) ) ? strip_tags( $new_instance['soundcloud_artwork'] ) : '';
		$instance['soundcloud_comments'] = ( ! empty( $new_instance['soundcloud_comments'] ) ) ? strip_tags( $new_instance['soundcloud_comments'] ) : '';
		$instance['soundcloud_related'] = ( ! empty( $new_instance['soundcloud_related'] ) ) ? strip_tags( $new_instance['soundcloud_related'] ) : '';
		$instance['soundcloud_visual'] = ( ! empty( $new_instance['soundcloud_visual'] ) ) ? strip_tags( $new_instance['soundcloud_visual'] ) : '';

		return $instance;
	}

} // class Foo_Widget

// register Foo_Widget widget
function register_soundcloud_widget() {
    register_widget( 'ZoneSoundcloudWidget' );
}
add_action( 'widgets_init', 'register_soundcloud_widget' );