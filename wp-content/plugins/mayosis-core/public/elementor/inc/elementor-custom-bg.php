<?php
	namespace Elementor;

    use \Elementor\Controls_Manager;

class Mayosis_custom_bg {
	private static $_instance = null;

	public static function instance() {
		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}

	private function __construct() {
		add_action('elementor/element/after_section_end',[ $this, '_add_controls'],10,3);

		add_action( 'elementor/frontend/element/before_render', [ $this, '_before_render'],10,1);

		add_action( 'elementor/frontend/column/before_render', [ $this, '_before_render'],10,1);
		add_action( 'elementor/frontend/section/before_render', [ $this, '_before_render'],10,1);

		add_action( 'elementor/element/print_template', [ $this, '_print_template'],10,2);
		add_action( 'elementor/section/print_template', [ $this, '_print_template'],10,2);
		add_action( 'elementor/column/print_template', [ $this, '_print_template'],10,2);

	
	}


	public function _add_controls( $element, $section_id, $args ) {
		if ( ('section' === $element->get_name() && 'section_background' === $section_id) || ('column' === $element->get_name() && 'section_style' === $section_id)) {



			$element->start_controls_section(
				'mayosis_code_bg_section',
				[
					'label' => __( 'Mayosis :: Custom Background', 'mayosis-core' ),
					'tab'   => Controls_Manager::TAB_STYLE
				]
			);
			
				$element->add_control(
			'mayosis_darkmode_enabled',[
				'label' => esc_html__( 'Dark Mode Type', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'none',
				'options' => [
					'dark'  => esc_html__( 'Dark', 'plugin-name' ),
					'dark-alt' => esc_html__( 'Dark Alter Color', 'plugin-name' ),
					'dark-sec' => esc_html__( 'Dark Alter Color', 'plugin-name' ),
					'none' => esc_html__( 'None', 'plugin-name' ),
				],
		]
		);
		
				$element->add_control(
			'mayosis_darkmode_inner',[
				'label' => esc_html__( 'Dark Mode Inner Background', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'none',
				'options' => [
					'enable'  => esc_html__( 'Enable', 'plugin-name' ),
					'none' => esc_html__( 'None', 'plugin-name' ),
				],
		]
		);
		
			$element->add_control(
			'mayosis_custombg_enabled', [
				'label'        => __( 'Enable Code Background', 'mayosis-core' ),
				'type'         => Controls_Manager::SWITCHER,
				'default'      => '',
				'label_on'     => __( 'Yes', 'mayosis-core' ),
				'label_off'    => __( 'No', 'mayosis-core' ),
				'return_value' => 'yes',
			]
		);
		
			$element->add_control(
			'mayosis_thumbnail_enabled', [
				'label'        => __( 'Featured Image', 'mayosis-core' ),
				'type'         => Controls_Manager::SWITCHER,
				'default'      => 'no',
				'label_on'     => __( 'Yes', 'mayosis-core' ),
				'label_off'    => __( 'No', 'mayosis-core' ),
				'return_value' => 'yes',
			]
		);
        $element->add_control(
        			'custom_bg',
        			[
        				'label' => __( 'Custom HTML', 'plugin-domain' ),
        				'type' => \Elementor\Controls_Manager::CODE,
        				'language' => 'html',
        				'rows' => 20,
        				'condition'   => [
					'mayosis_custombg_enabled'     => 'yes',
				],
        			]
        		);

		

			$element->end_controls_section();

		}
	}

	function _before_render( \Elementor\Element_Base $element ) {

		if ( $element->get_name() != 'section' && $element->get_name() != 'column' ) {
			return;
		}
		$settings = $element->get_settings();
		$custom_code_enable = $settings['mayosis_custombg_enabled'];
		$mayosis_thumbnail_enabled = $settings['mayosis_thumbnail_enabled'];
		$mayosis_darkmode_enabled = $settings['mayosis_darkmode_enabled'];
		$mayosis_darkmode_inner= $settings['mayosis_darkmode_inner'];
		global $post;
		 $feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
		
		if ($mayosis_darkmode_inner=="enable"){
		    $element->add_render_attribute( '_wrapper', [
		'class' => 'has_mayosis_elementor_inner_bg',
	]);
		}
		
		
		
		if ( $mayosis_darkmode_enabled == 'dark' ) {
		    		$element->add_render_attribute( '_wrapper', [
		'class' => 'has_mayosis_dark_bg',
	]);
		} elseif($mayosis_darkmode_enabled == 'dark-alt' ){
		    	$element->add_render_attribute( '_wrapper', [
		'class' => 'has_mayosis_dark_alt_bg',
	]);
		} elseif($mayosis_darkmode_enabled == 'dark-sec' ){
		    	$element->add_render_attribute( '_wrapper', [
		'class' => 'has_mayosis_dark_sec_bg',
	]);
		}

		if ( $custom_code_enable == 'yes' ) {
		    	$custom_code = $settings['custom_bg'];
		$element->add_render_attribute( '_wrapper', [
		'class' => 'has_mayosis_custom_bg',
		'style' => $custom_code,
	] );
		} elseif ($mayosis_thumbnail_enabled =='yes'){
		    
		      global $post;
		    $feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
		$custom_code = 'background:url('.$feat_image.');';
		$element->add_render_attribute( '_wrapper', [
		'class' => 'has_mayosis_custom_bg_thumbnail',
		'style' => $custom_code,
	] );
		    
		}

		
		
		?>
      
		<?php
	}

	function _print_template( $template, $widget ) {
		if ( $widget->get_name() != 'section' && $widget->get_name() != 'column' ) {
			return $template;
		}

		$old_template = $template;
		ob_start();
		?>
		

<#
if ( settings.mayosis_custombg_enabled ) {
		var html = '<div class="mayosis-custom-bg-wrapper" style="' + settings.custom_bg + '">';

		

		html += '</div>';

		print( html );
		}
		#>
		
        
		<?php
		$custombg_content = ob_get_contents();
		ob_end_clean();
		$template = $custombg_content . $old_template;

		return $template;
	}

}

Mayosis_custom_bg::instance();