<?php

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
			'odometer_style' => 'Default',
			'start_num' => 123,
			'end_num' => 456,
			'delay_time' => 1.5,
			'font_size' => 18,
			);
		$instance = wp_parse_args( (array) $instance, $defaults );
		$odometer_style = $instance[ 'odometer_style' ];
		$start_num = $instance['start_num'];
		$end_num = $instance['end_num'];		
		$delay_time = $instance['delay_time'];
		$font_size = $instance['font_size'];
		$before_text = $instance['before_text'];
		$after_text = $instance['after_text'];
		
		$html = '<p>Odometer Style:';
			$html .= '<select name=" ' . $this->get_field_name('odometer_style') . '">';
				$html .= '<option value="default"'. selected( $odometer_style, 'default', false ). '>Default</option>';
				$html .= '<option value="car"'. selected( $odometer_style, 'car', false ). '>Car</option>';
				$html .= '<option value="digital"'. selected( $odometer_style, 'digital', false ). '>Digital</option>';
				$html .= '<option value="minimal"'. selected( $odometer_style, 'minimal', false ). '>Minimal</option>';
				$html .= '<option value="plaza"'. selected( $odometer_style, 'plaza', false ). '>Plaza</option>';
				$html .= '<option value="slot"'. selected( $odometer_style, 'slot', false ). '>Slot Machine</option>';
				$html .= '<option value="train"'. selected( $odometer_style, 'train', false ). '>Train Station</option>';
			$html .= '</select>';
		$html .= '<p>Start Number:';
			$html .= '<input class="widefat"
						name="'. $this->get_field_name('start_num') . '"
						type="text" value="'. esc_attr($start_num) . '" />';
		$html .= '</p>'; 

		$html .= '<p>End Number:';
			$html .= '<input class="widefat"
						name="' . $this->get_field_name('end_num') . '"
						type="text" value="' . esc_attr($end_num) . '" />';
		$html .= '</p>';

		
		$html .= '<p>Delay Time (in seconds ie. 1.5):';
			$html .= '<input class="widefat"
						name="' . $this->get_field_name('delay_time') . '"
						type="text" value="' . esc_attr($delay_time) . '" />';
		$html .= '</p>';

		$html .= '<p>Font Size (in pixels ie. 18):';
			$html .= '<input class="widefat"
						name="' . $this->get_field_name('font_size'). ' "
						type="text" value="' . esc_attr($font_size) . '" />';
		$html .= '</p>';

		$html .= '<p>Text Before Odometer:';
			$html .= '<textarea class="widefat" rows="5" cols="20"
						name=" ' . $this->get_field_name('before_text').'" >';
				$html.= esc_attr($before_text);
			$html .= '</textarea>';
		$html .= '</p>';

		$html .= '<p>Text After Odometer:';
			$html .= '<textarea class="widefat" rows="5" cols="20"
						name="' . $this->get_field_name('after_text') . '" >';
				$html .= esc_attr($after_text);
			$html .= '</textarea>';
		$html .= '</p>';			 			 
				 						
		echo $html;	
	}


		function update( $new_instance, $old_instance)  {
			$instance = $old_instance;
			$instance['odometer_style'] = strip_tags( $new_instance['odometer_style']);
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

			//Enqueue styles and scripts
			$odometer_styles = array(
				'car' 		=>	'car.css',
				'default' 	=> 	'default.css',
				'digital' 	=> 	'digital.css',
				'minimal' 	=> 	'minimal.css',
				'plaza' 	=> 	'plaza.css',
				'slot' 		=> 	'slot-machine.css',
				'train'	 	=> 	'train-station.css');

			wp_enqueue_style( 'so-styles', SO_PLUGIN_URL . 'assests/css/odometer-theme-' . $odometer_styles[$odometer_style]);
			
			wp_enqueue_script( 'so-odometer', SO_PLUGIN_URL . 'assests/js/odometer.js',	array( ));
			
			

			wp_enqueue_script( 'so-script', SO_PLUGIN_URL . 'assests/js/so-script.js', array( 'jquery', 'so-odometer'));
			
			// variables to send to javascript
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
 