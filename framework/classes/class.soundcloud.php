<?php
	
/**
 * themep_soundcloud class.
 */
class ZoneSoundCloud
{
	
	/**
	 * themep_soundcloud_player function.
	 * 
	 * @access public
	 * @param mixed $config
	 * @return void
	 */
	public static function player( $config )
	{
		$player_id = self::prepare_soundcloud_player_id( $config["id"] );
		$player_url = "";
		
		$html = '<iframe id="' . esc_attr( $player_id ) . '" src="https://w.soundcloud.com/player/?url=' . esc_attr( $config["url"] ) . '?visual=' . esc_attr( $config["visual"] ) . '&amp;auto_play=' . esc_attr( $config["autoplay"] ) . '&sharing=' . esc_attr( $config["sharing"] ) . '&hide_related=' . esc_attr( $config["hide_related"] ) . '" width="100%" height="400" scrolling="no"></iframe>';
		
		$html .= '<script type="text/javascript">
		(function()
		{
		var widgetIframe = document.getElementById("' . esc_attr( $player_id ) . '"),
		widget = SC.Widget(widgetIframe);
		
		}());
		</script>';
		
		return $html;
	}
		
	/**
	 * themep_prepare_soundcloud_player_id function.
	 * 
	 * @access private
	 * @param mixed $id
	 * @return void
	 */
	private static function prepare_soundcloud_player_id( $id )
	{
		$id = str_replace( array( '-', ' ' ), '', $id );
				
		return $id;
	}
	
}