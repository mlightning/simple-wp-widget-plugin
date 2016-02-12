var jack_widget_image_field;
jQuery(document).ready(function($) {
    $(document).on("click", ".upload_image_button", function() {
      var frame = wp.media({
				title : "Choose your image",
				multiple : false,
				library : { type : 'image' },
				button : { text : "Use this image" }
			});

      jack_widget_image_field = $(this).prev();
			// Handle results from media manager.
			frame.on('close',function( ) {
				var attachments = frame.state().get('selection').toJSON();
        var inputText = jQuery.data(document.body, 'prevElement');
        $(jack_widget_image_field).val(attachments[0].url);
			});

			frame.open();
			return false;
    });
});
