<?php


class jack_member_login extends WP_Widget {

	// constructor
	function jack_member_login() {
		/* ... */
    parent::__construct(false, $name = __('Jack Member Login', 'wp_widget_plugin') );
	}

	function form($instance) {

		if( $instance) {
			$title = esc_attr($instance['title']);
			$image_uri = esc_attr($instance['image_uri']);
			$text = esc_attr($instance['text']);
			$textarea = esc_textarea($instance['textarea']);

		} else {
			$title = '';
			$image_uri = '';
			$text = '';
			$textarea = '';
		}
?>
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Widget Title', 'wp_widget_plugin'); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
		</p>
		<p>
      <label for="<?php echo $this->get_field_id( 'image_uri' ); ?>"><?php _e( 'Header Image:' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('image_uri'); ?>" name="<?php echo $this->get_field_name('image_uri'); ?>" type="text" size="36" value="<?php echo $image_uri; ?>" />
      <input class="upload_image_button button button-primary" type="button" value="Upload Image" />
    </p>
    <p>
	    <label for="<?php echo $this->get_field_id('text'); ?>"><?php _e('Text:', 'wp_widget_plugin'); ?></label>
	    <input class="widefat" id="<?php echo $this->get_field_id('text'); ?>" name="<?php echo $this->get_field_name('text'); ?>" type="text" value="<?php echo $text; ?>" />
    </p>

    <p>
	    <label for="<?php echo $this->get_field_id('textarea'); ?>"><?php _e('Textarea:', 'wp_widget_plugin'); ?></label>
	    <textarea class="widefat" id="<?php echo $this->get_field_id('textarea'); ?>" name="<?php echo $this->get_field_name('textarea'); ?>"><?php echo $textarea; ?></textarea>
    </p>
<?php
	}

	// update widget
	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		// Fields
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['image_uri'] = strip_tags($new_instance['image_uri']);
		$instance['text'] = strip_tags($new_instance['text']);
		$instance['textarea'] = strip_tags($new_instance['textarea']);
		return $instance;
	}

	function widget($args, $instance) {
		extract( $args );
		// these are the widget options
		$title = apply_filters('widget_title', $instance['title']);
		$image_uri = $instance['image_uri'];
		$text = $instance['text'];
		$textarea = $instance['textarea'];
		echo $before_widget;

		echo '<div class="widget-text wp_widget_jack_member_login">';
		if ( $title ) {
			echo $before_title . $title . $after_title;
		}
		if ( $image_uri ) {
			echo '<img src="'.esc_url($image_uri).'" />';
		}
		if( $text ) {
			echo '<p class="wp_widget_plugin_text">'.$text.'</p>';
		}
		if( $textarea ) {
			echo '<p class="wp_widget_plugin_textarea">'.$textarea.'</p>';
		}
		echo '</div>';
		echo $after_widget;
	}
}
