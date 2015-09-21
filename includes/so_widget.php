<?php
// hook using widget_init
add_action( 'widgets_init', 'so_register_widgets' );

// register widget
function so_register_widgets() {
	register_widget( 'SO_Widget' );
}


// CPN Widget class
class SO_Widget extends WP_Widget {
	function __construct() {
		$widget_ops = array(
			'classname' => 'SO_Widget_Class',
			'description' => 'Widget to display odometer');
		parent::__construct('SO_Widget', 'Odometer Widget', $widget_ops);
	}

	function form($instance) {
		$defaults = array(
			'start_num' => 000,
			'end_num' => 456,
			'delay_time' => 1.5,
			'font_size' => 18,
			);
		$instance = wp_parse_args( (array) $instance, $defaults );
		$start_num = $instance['start_num'];
		$end_num = $instance['end_num'];		
		$delay_time = $instance['delay_time'];
		$font_size = $instance['font_size'];
		$before_text = $instance['before_text'];
		$after_text = $instance['after_text'];

		?>
		
		<p>Start Number:
			<input class="widefat"
					name="<?php echo $this->get_field_name('start_num'); ?>"
					type="text" value="<?php echo esc_attr($start_num); ?>" />
		</p> 

		<p>End Number:
			<input class="widefat"
					name="<?php echo $this->get_field_name('end_num'); ?>"
					type="text" value="<?php echo esc_attr($end_num); ?>" />
		</p>

		
		<p>Delay Time (in seconds ie. 1.5):
			<input class="widefat"
				name="<?php echo $this->get_field_name('delay_time'); ?>"
				type="text" value="<?php echo esc_attr($delay_time); ?>" />
		</p>

		<p>Font Size (in pixels ie. 18):
			<input class="widefat"
				name="<?php echo $this->get_field_name('font_size'); ?>"
				type="text" value="<?php echo esc_attr($font_size); ?>" />
		</p>

		<p>Text Before Odometer:
			<textarea class="widefat" rows="5" cols="20"
				name="<?php echo $this->get_field_name('before_text'); ?>" >
					<?php echo esc_attr($before_text); ?>
			</textarea>
		</p>

		<p>Text After Odometer:
			<textarea class="widefat" rows="5" cols="20"
				name="<?php echo $this->get_field_name('after_text'); ?>" >
					<?php echo esc_attr($after_text); ?>
			</textarea>
		</p>			 			 
				 						
	
	<?php 
}
		function update( $new_instance, $old_instance)  {
			$instance = $old_instance;
			$instance['start_num'] = sanitize_text_field( $new_instance['start_num']);
			$instance['end_num'] = sanitize_text_field( $new_instance['end_num']);
			$instance['delay_time'] = sanitize_text_field( $new_instance['delay_time']);
			$instance['font_size'] = sanitize_text_field( $new_instance['font_size']);
			$instance['before_text'] =  stripslashes( wp_filter_post_kses( addslashes($new_instance['before_text']) ) );
			$instance['after_text'] = stripslashes( wp_filter_post_kses( addslashes($new_instance['after_text']) ) );
			return $instance;
		}

		


		 function widget( $args, $instance){
			extract( $args );
			extract( $instance);
			wp_enqueue_style( 'so-styles', SO_PLUGIN_URL . 'assests/css/odometer-theme-train-station.css');
			
			wp_enqueue_script( 'so-odometer', SO_PLUGIN_URL . 'assests/js/odometer.js',	array( ));
			
			

			wp_enqueue_script( 'so-script', SO_PLUGIN_URL . 'assests/js/so-script.js', array( 'jquery', 'so-odometer'));
			$so_script_vars = array(
						'delay_time' => $delay_time,
						'end_num' => $end_num);
			wp_localize_script( 'so-script', 'so_script_vars', $so_script_vars);

			echo $before_widget;
			if( $before_text ) {
				echo '<div>' . $before_text. '</div>';
			}
			
			echo '<div class="odometer" id="example1" style="font-size: '. $font_size.'px; margin: 0 auto;"> '
                . $start_num . ' </div>';
		   	
		  	
			if ( $after_text) {
				echo '<div>'. $after_text . '</div>';
			}			
			
			echo $after_widget;
		}
	} 

?> 