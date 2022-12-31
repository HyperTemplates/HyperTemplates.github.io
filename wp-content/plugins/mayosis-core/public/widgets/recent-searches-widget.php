<?php

if ( !class_exists( 'RecentSearchesWidget' ) ) {

class RecentSearchesWidget {
	// Constructor
	function __construct() {
		// Initialize plugin
		add_action( 'init', array( &$this, 'init' ) );
		
		// Page load
		add_action( 'template_redirect', array( &$this, 'template_redirect' ) );
		
	
	}
	
	// Plugin initialization
	function init() {
		load_plugin_textdomain( 'mayosis-core', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );
	}
	
	// Page load
	function template_redirect() {
		if ( is_search() ) {
			// Store search term
			$query = $this->strtolower( trim( get_search_query() ) );
			
			$options = get_option( 'recent_searches_widget' );
			if ( !is_array( $options ) ) {
				$options = $this->get_default_options();
			}
			$max = $options['max'];
			
			$data = get_option( 'recent_searches_widget_data', array() );
			if ( !is_array( $data ) ) {
				if ( isset( $options['data'] ) ) {
					$data = $options['data'];
					unset( $options['data'] );
					update_option( 'recent_searches_widget', $options );
				}
				if ( !is_array( $data ) ) {
					$data = array();
				}
			}
			
			$pos = array_search( $query, $data );
			if ( $pos !== false ) {
				if ( $pos != 0 ) {
					$data = array_merge( array_slice( $data, 0, $pos ),
						array( $query ), array_slice( $data, $pos + 1 ) );
				}
			} else {
				array_unshift( $data, $query );
				if ( count( $data ) > $max ) {
					array_pop( $data );
				}
			}
			
			update_option( 'recent_searches_widget_data', $data );
		}
	}
	
	// Widgets initialization
	function widgets_init() {
		$widget_ops = array(
			'classname' => 'widget_rsw', 
			'description' => __('Shows recent searches', 'mayosis-core'),
		);
		wp_register_sidebar_widget( 'recentsearcheswidget', __('Mayosis Recent Searches', 'mayosis-core'), 
			array( &$this, 'widget_rsw' ), $widget_ops );
		wp_register_widget_control( 'recentsearcheswidget', __('Mayosis Recent Searches', 'mayosis-core'), 
			array( &$this, 'widget_rsw_control' ) );
	}
	
	function widget_rsw( $args ) {
		extract( $args );
		$title = isset( $options['title'] ) ? $options['title'] : '';
		$title = apply_filters( 'widget_title', $title );
		if ( empty($title) )
			$title = '&nbsp;';
		echo $before_widget . $before_title . $title . $after_title, "\n";
		$this->show_recent_searches( "<ul>\n<li>", "</li>\n</ul>", "</li>\n<li>" );
		echo $after_widget;
	}
	
	function show_recent_searches( $before_list, $after_list, $between_items ) {
		$options = get_option( 'recent_searches_widget' );
		if ( !is_array( $options ) ) {
			$options = $this->get_default_options();
		}
		
		$data = get_option( 'recent_searches_widget_data' );
		if ( !is_array( $data ) ) {
			if ( isset( $options['data'] ) ) {
				$data = $options['data'];
			}
			if ( !is_array( $data ) ) {
				$data = array();
			}
		}
		
		if ( count( $data ) > 0 ) {
			echo $before_list;
			$first = true;
			foreach ( $data as $search ) {
				if ( $first ) {
					$first = false;
				} else {
					echo $between_items;
				}
				
				echo '<a href="', get_search_link( $search ), '"';
				if ( $options['nofollow'] ) {
					echo ' rel="nofollow"';
				}
				echo '>', esc_html( $search ), '</a>';
			}
			echo $after_list, "\n";
		} else {
			_e('No searches yet', 'mayosis-core');
		}
	}
	
	function widget_rsw_control() {
		$options = $newoptions = get_option('recent_searches_widget', array() );
		if ( count( $options ) == 0 ) {
			$options = $this->get_default_options();
			update_option( 'recent_searches_widget', $options );
		}
		if ( isset( $_POST['rsw-submit'] ) ) {
			$options['title'] = strip_tags( stripslashes( $_POST['rsw-title'] ) );
			$options['max'] = (int)( $_POST['rsw-max'] );
			$options['nofollow'] = isset( $_POST['rsw-nofollow'] );
			if ( count( $options['data'] ) > $options['max'] ) {
				$options['data'] = array_slice( $options['data'], 0, $options['max'] );
			}
			update_option( 'recent_searches_widget', $options );
		}
		$title = esc_attr( $options['title'] );
		$max = esc_attr( $options['max'] );
		$nofollow = $options['nofollow'];
	?>
	<p><label for="rsw-title"><?php _e('Title:', 'mayosis-core'); ?> <input class="widefat" id="rsw-title" name="rsw-title" type="text" value="<?php echo $title; ?>" /></label></p>
	<p><label for="rsw-max"><?php _e('Max searches:', 'mayosis-core'); ?> <input id="rsw-max" name="rsw-max" type="text" size="3" maxlength="5" value="<?php echo $max; ?>" /></label></p>
	<p><label for="rsw-nofollow"><?php _e('Add <code>rel="nofollow"</code> to links:', 'mayosis-core'); ?> <input id="rsw-nofollow" name="rsw-nofollow" type="checkbox" value="yes" <?php checked( $nofollow, true ); ?>" /></label></p>
	<input type="hidden" id="rsw-submit" name="rsw-submit" value="1" />
	<?php
	}
	
	// Make string lowercase
	function strtolower( $str ) {
		if ( function_exists( 'mb_strtolower' ) ) {
			return mb_strtolower( $str );
		} else {
			return strtolower( $str );
		}
	}
	
	function get_default_options() {
		return array(
			'title' => '',
			'max' => 15,
			'nofollow' => true,
		);
	}
}

// Add functions from WP2.8 for previous WP versions
if ( !function_exists( 'esc_html' ) ) {
	function esc_html( $text ) {
		return esc_html( $text );
	}
}

if ( !function_exists( 'esc_attr' ) ) {
	function esc_attr( $text ) {
		return esc_attr( $text );
	}
}

// Add functions from WP3.0 for previous WP versions
if ( !function_exists( 'get_search_link' ) ) {
	function get_search_link( $query = '' ) {
		global $wp_rewrite;
	
		if ( empty($query) )
			$search = get_search_query();
		else
			$search = stripslashes($query);
	
		$permastruct = $wp_rewrite->get_search_permastruct();
	
		if ( empty( $permastruct ) ) {
			$link = home_url('?s=' . urlencode($search) );
		} else {
			$search = urlencode($search);
			$search = str_replace('%2F', '/', $search); // %2F(/) is not valid within a URL, send it unencoded.
			$link = str_replace( '%search%', $search, $permastruct );
			$link = trailingslashit( get_option( 'home' ) ) . user_trailingslashit( $link, 'search' );
		}
	
		return apply_filters( 'search_link', $link, $search );
	}
}

$wp_recent_searches_widget = new RecentSearchesWidget();

// Show recent searches anywhere in the theme
function mayosis_show_recent_searches( $before_list = "<ul>\n<li>", $after_list = "</li>\n</ul>", $between_items = "</li>\n<li>" ) {
	global $wp_recent_searches_widget;
	$wp_recent_searches_widget->show_recent_searches( $before_list, $after_list, $between_items );
}

} // END

?>