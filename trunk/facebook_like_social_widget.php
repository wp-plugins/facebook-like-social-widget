<?php
/*
Plugin Name: Facebook Like Social Widget
Plugin URI: http://www.marijnrongen.com/wordpress-plugins/facebook-like-social-widget/
Description: Place a Facebook Like button on your Wordpress blog as a widget.
Version: 1.2
Author: Marijn Rongen
Author URI: http://www.marijnrongen.com
*/

class MR_Like_Widget extends WP_Widget {
	function MR_Like_Widget() {
		$widget_ops = array( 'classname' => 'MR_Like_Widget', 'description' => 'Place a Facebook Like button on your Wordpress blog as a widget.' );
		$control_ops = array( 'id_base' => 'mr-like-widget' );
		$this->WP_Widget( 'mr-like-widget', 'Facebook Like Social Widget', $widget_ops, $control_ops );
	}
	
	function widget( $args, $instance) {
		extract( $args );
		$layout = empty($instance['layout']) ? 'standard' : $instance['layout'];
		$show_faces = 'false';
		if ($instance['show_faces'])
		{
			$show_faces = 'true';
		}
		switch ($layout)
		{
			case 'box_count':
				$height = '65';
				break;
			case 'button_count':
				$height = '20';
				break;
			default:
				if ($instance['show_faces']) {
					$height = '80';	
				}
				else
				{		
					$height = '35';
				}
				break;	
		}
		if (!empty($instance['url'])) {
			$url = urlencode($instance['url']);
		}
		else {
			$url = urlencode('http://'.$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"]);
		}
		echo $before_widget;
		echo "\n	<iframe src=\"http://www.facebook.com/plugins/like.php?href=$url&amp;layout=$layout&amp;show_faces=$show_faces&amp;width=100%&amp;action=".$instance['caption']."&amp;font&amp;colorscheme=".$instance['color']."&amp;height=".$height."px\" scrolling=\"no\" frameborder=\"0\" style=\"border:none; overflow:hidden; width:100%; height:".$height."px;\" allowTransparency=\"true\"></iframe>";
		echo $after_widget;
	}
	
	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['layout'] = $new_instance['layout'];
		$instance['show_faces'] = isset($new_instance['show_faces']) ? true : false;
		$instance['caption'] = $new_instance['caption'];
		$instance['color'] = $new_instance['color'];
		$instance['url'] = strip_tags($new_instance['url']);
		return $instance;
	}
	
	function form($instance) {
		$instance = wp_parse_args((array) $instance, array( 'layout' => 'standard', 'show_faces' => false, 'caption' => like, 'color' =>light, 'url' => ''));
		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'layout' ); ?>">Button layout:</label>
			<select id="<?php echo $this->get_field_id( 'layout' ); ?>" name="<?php echo $this->get_field_name( 'layout' ); ?>" class="widefat" style="width:100%;">
				<option <?php if ( "standard" == $instance['layout'] ) echo 'selected="selected"'; ?> value="standard">Standard</option>
				<option <?php if ( "button_count" == $instance['layout'] ) echo 'selected="selected"'; ?> value="button_count">Button count</option>
				<option <?php if ( "box_count" == $instance['layout'] ) echo 'selected="selected"'; ?> value="box_count">Box count</option>
			</select>
		</p>
		<p>
			<input class="checkbox" type="checkbox" <?php checked( $instance['show_faces'], true ); ?> id="<?php echo $this->get_field_id( 'show_faces' ); ?>" name="<?php echo $this->get_field_name( 'show_faces' ); ?>" />
			<label for="<?php echo $this->get_field_id( 'show_faces' ); ?>">Show faces (only when using standard layout)</label>
		</p>	
		<p>
			<label for="<?php echo $this->get_field_id( 'caption' ); ?>">Caption:</label>
			<select id="<?php echo $this->get_field_id( 'caption' ); ?>" name="<?php echo $this->get_field_name( 'caption' ); ?>" class="widefat" style="width:100%;">
				<option <?php if ( "like" == $instance['caption'] ) echo 'selected="selected"'; ?> value="like">Like</option>
				<option <?php if ( "recommend" == $instance['caption'] ) echo 'selected="selected"'; ?> value="recommend">Recommend</option>
			</select>
		</p>	
		<p>
			<label for="<?php echo $this->get_field_id( 'color' ); ?>">Color scheme:</label>
			<select id="<?php echo $this->get_field_id( 'color' ); ?>" name="<?php echo $this->get_field_name( 'color' ); ?>" class="widefat" style="width:100%;">
				<option <?php if ( "light" == $instance['color'] ) echo 'selected="selected"'; ?> value="light">Light</option>
				<option <?php if ( "dark" == $instance['color'] ) echo 'selected="selected"'; ?> value="dark">Dark</option>
			</select>
		</p>	
		<p>
			<label for="<?php echo $this->get_field_id( 'url' ); ?>">URL to like / recommend (<b>Optional</b> leave empty for the URL of the page the button is on):</label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'url' ); ?>" name="<?php echo $this->get_field_name( 'url' ); ?>" value="<?php echo $instance['url']; ?>" />
		</p>
		<?php
	}
}
add_action('widgets_init', create_function('', 'return register_widget("MR_Like_Widget");'));
?>