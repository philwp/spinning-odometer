

	jQuery(document).ready(function($) {

		$(document).on('click', '#insert-image', function() {
			jQuery.data(document.body, 'prevElement', $(this).prev());

			window.send_to_editor = function(html) {
				var imgurl = jQuery('img', html).attr('src');
				var inputText = jQuery.data(document.body, 'prevElement');

				if (imgurl != undefined && inputText != '') {
					inputText.val(imgurl);
				}

				tb_remove();
			};

			tb_show( '', 'media-upload.php?type=image&TB_iframe=true' );
			return false;

		});
	});

	