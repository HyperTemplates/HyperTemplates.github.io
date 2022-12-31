<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class EDD_hero_Elementor_Thing extends Widget_Base {

   public function get_name() {
      return 'mayosis-edd-hero';
   }

   public function get_title() {
      return __( 'Mayosis EDD Hero', 'mayosis-core' );
   }
public function get_categories() {
		return [ 'mayosis-ele-cat' ];
	}
   public function get_icon() { 
        return 'eicon-elementor';
   }

   protected function register_controls() {

      $this->add_control(
         'section_hero_main',
         [
            'label' => __( 'Hero Content', 'mayosis-core' ),
            'type' => Controls_Manager::SECTION,
         ]
      );
   $this->add_control(
         'hero_prefix',
         [
            'label' => __( 'Section Title Prefix', 'mayosis-core' ),
            'type' => Controls_Manager::TEXT,
            'default' => 'We Are The Secret Behind',
            'title' => __( 'Enter Section Title Prefix', 'mayosis-core' ),
            'section' => 'section_hero_main',
         ]
      );
       $this->add_control(
         'counter_type',
         [
            'label' => __( 'Counter Type', 'mayosis-core' ),
            'type' => Controls_Manager::SELECT,
            'default' => 'tdown',
            'title' => __( 'Select Counter Type', 'mayosis-core' ),
            'section' => 'section_hero_main',
             'options' => [
                    'tdown'  => __( 'Total Download', 'mayosis-core' ),
                    'tproduct' => __( 'Total Product', 'mayosis-core' ),
                    'ccount' => __( 'Custom Count', 'mayosis-core' ),
                 ],
         ]
      );
       $this->add_control(
         'custom_count',
         [
            'label' => __( 'Custom Count', 'mayosis-core' ),
            'type' => Controls_Manager::TEXT,
            'default' => '2592',
            'title' => __( 'Enter Custom Count', 'mayosis-core' ),
            'section' => 'section_hero_main',
         ]
      );
       
    $this->add_control(
         'hero_suffix',
         [
            'label' => __( 'Section Title Suffix', 'mayosis-core' ),
            'type' => Controls_Manager::TEXT,
            'default' => 'Graphic Designers',
            'title' => __( 'Enter Section Title Suffix', 'mayosis-core' ),
            'section' => 'section_hero_main',
         ]
      );
       
       $this->add_control(
         'section_content',
         [
            'label' => __( 'Section Content', 'mayosis-core' ),
            'type' => Controls_Manager::TEXTAREA,
            'default' => 'High End Graphic Templates & Resources such as Graphic Objects, Add Ons, PSD Templates, Photo Packs, Backgrounds, UI Kits and so on...
Browse, Download & Use Our Resources To Design Faster & Get Your Payment Quicker!',
            'title' => __( 'Enter Section Description', 'mayosis-core' ),
            'section' => 'section_hero_main',
         ]
      );
        $this->start_controls_section(
			'hero_style',
			[
				'label' => __( 'Hero Style', 'mayosis-core' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'title_font_size',
				'label' => __( 'Title Typography', 'mayosis-core' ),
				'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .hero-title',
			]
		);
      
      
      $this->add_control(
         'gap_title_desc',
         [
            'label' => __( 'Title & Description Gap', 'mayosis-core' ),
            'type' => Controls_Manager::TEXT,
            'default' => '22px',
            'title' => __( 'Enter gap between title & description', 'mayosis-core' ),
            'selectors' => [
					'{{WRAPPER}} .hero-description' => 'margin-top: {{VALUE}}',
					]
            
         ]
      );
       $this->add_responsive_control(
			'align_title',
			[
				'label' => __( 'Title Align', 'mayosis-core' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => __( 'Left', 'mayosis-core' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => __( 'Center', 'mayosis-core' ),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => __( 'Right', 'mayosis-core' ),
						'icon' => 'eicon-text-align-right',
					],
					'justify' => [
						'title' => __( 'Justified', 'elementor' ),
						'icon' => 'eicon-text-align-justify',
					],
				],
				'selectors' => [
					'{{WRAPPER}} .hero-title' => 'text-align: {{VALUE}};',
				],
			]
		);
		
     	$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'description_font',
				'label' => __( 'Description Typography', 'mayosis-core' ),
				'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .hero-description',
			]
		);
      
      $this->add_responsive_control(
			'align_description',
			[
				'label' => __( 'Description Align', 'mayosis-core' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => __( 'Left', 'mayosis-core' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => __( 'Center', 'mayosis-core' ),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => __( 'Right', 'mayosis-core' ),
						'icon' => 'eicon-text-align-right',
					],
					'justify' => [
						'title' => __( 'Justified', 'elementor' ),
						'icon' => 'eicon-text-align-justify',
					],
				],
				'selectors' => [
					'{{WRAPPER}} .hero-description' => 'text-align: {{VALUE}};',
				],
			]
		);
		
       $this->add_control(
         'suppri_color',
         [
            'label' => __( 'Color of Suffix & Prefix', 'mayosis-core' ),
            'type' => Controls_Manager::COLOR,
            'default' => '#ffffff',
            'title' => __( 'Select Suffix & Prefix Color', 'mayosis-core' ),
            'selectors' => [
					'{{WRAPPER}} .hero-title' => 'color: {{VALUE}};',
				],
            
         ]
      );
       
       $this->add_control(
         'count_color',
         [
            'label' => __( 'Color of Count', 'mayosis-core' ),
            'type' => Controls_Manager::COLOR,
            'default' => '#ffffff',
            'title' => __( 'Select Count Color', 'mayosis-core' ),
            'selectors' => [
					'{{WRAPPER}} .mhero_counter_main' => 'color: {{VALUE}};',
				],
            
         ]
      );
       $this->add_control(
         'content_color',
         [
            'label' => __( 'Color of Content', 'mayosis-core' ),
            'type' => Controls_Manager::COLOR,
            'default' => '#ffffff',
            'title' => __( 'Select Content Color', 'mayosis-core' ),
            'selectors' => [
					'{{WRAPPER}} .hero-description' => 'color: {{VALUE}}',
					]
            
         ]
      );
      
      	$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'count_font',
				'label' => __( 'Count Typography', 'mayosis-core' ),
				'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .mhero_counter_main',
			]
		);
       $this->end_controls_section();
   }

   protected function render( $instance = [] ) {

      // get our input from the widget settings.

       $settings = $this->get_settings();
      ?>

 <!-- Element Code start -->
       
  <div class="col-md-12 col-xs-12 col-sm-12">
                    <h1 class="hero-title"><?php echo $settings['hero_prefix']; ?>
                    
                   <span class="mhero_counter_main">  <?php if($settings['counter_type'] == "tdown"){ ?>
                          <?php echo edd_count_total_file_downloads(); ?>
                        <?php } elseif($settings['counter_type'] == "tproduct") { ?>
                       <?php
			$count_products = wp_count_posts('download');
	$total_products = $count_products->publish;
?>              <?php echo 	$total_products ; ?>
                    <?php } else { ?>
                       <?php echo $settings['custom_count']; ?>
					   <?php } ?></span>
                       <?php echo $settings['hero_suffix']; ?></h1>
                   <div class="hero-description"><?php echo $settings['section_content']; ?></div>
                   
			    </div>
        <div class="clearfix"></div>

      <?php

   }

   protected function content_template() {}

   public function render_plain_content( $instance = [] ) {}

}
Plugin::instance()->widgets_manager->register_widget_type( new EDD_hero_Elementor_Thing );
?>