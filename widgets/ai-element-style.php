<?php
namespace AI_Element_Style\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Text_Shadow;
use Elementor\Group_Control_Border;
use Elementor\Scheme_Typography;


if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}



class ai_element_style extends \Elementor\Widget_Base {

	public function get_name() {
		return 'aew_advanced_styling_single2';
	}

	public function get_title() {
		return __( 'Advanced Styling Single', 'advanced-elementor-widgets' );
	}

	public function get_icon() {
		return 'eicon-paint-brush';
	}

	public function get_categories() {
		return [ 'web-devs-category' ];
	}

	protected function _register_controls() {


		$this->start_controls_section( // MAIN ------------------------------------------
			'Main_section',
			[
				'label' => __( 'Selector', 'advanced-elementor-widgets' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);


			$this->add_control(
				'element_id', [
					'label' => __( 'Class or ID', 'advanced-elementor-widgets' ),
					'type' => \Elementor\Controls_Manager::TEXT,
					'label_block' => true,
				]
			);

			$this->add_control(
				'item_important',
				[
					'label' => __( 'add !important', 'advanced-elementor-widgets' ),
					'type' => \Elementor\Controls_Manager::SWITCHER,
					'label_on' => __( 'On', 'advanced-elementor-widgets' ),
					'label_off' => __( 'Off', 'advanced-elementor-widgets' ),
					'return_value' => '!important',
					'default' => '',
				]
			);

		$this->end_controls_section();
		

		$control = (array) $this;
		if ( \Elementor\Plugin::$instance->editor->is_edit_mode() || $control["\0Elementor\Controls_Stack\0data"]['settings']['element_id'] == '' ) {
         $el = '#AEW_AST_ELEMENT';
      } else {
			$el = $control["\0Elementor\Controls_Stack\0data"]['settings']['element_id'];
		}

		echo '<pre>' . print_r($el, true) . '</pre><br>';



		$this->start_controls_section( // TYPOGRAPHY ------------------------------------------
			'typography_section',
			[
				'label' => __( 'Typography', 'advanced-elementor-widgets' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
			// typography
			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' => 'aew_ast_typography',
					'label' => __( 'Typography', 'advanced-elementor-widgets' ),
					'scheme' => Scheme_Typography::TYPOGRAPHY_3,
					'selector' => $el,
				]
			);
			// color
			$this->add_control(
				'aew_ast_color',
				[
					'label' => __( 'Color', 'advanced-elementor-widgets' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'selectors' => [
						$el => 'color: {{VALUE}}',
					],
				]
			);
			// text shadow
			$this->add_group_control(
				Group_Control_Text_Shadow::get_type(),
				[
					'name' => 'aew_ast_text_shadow',
					'label' => __( 'Text Shadow', 'advanced-elementor-widgets' ),
					'selector' => $el,
				]
			);
			// text align
			$this->add_responsive_control(
				'aew_ast_text_align',
				[
					'label' => __( 'Text Align', 'advanced-elementor-widgets' ),
					'type' => Controls_Manager::CHOOSE,
					'options' => [
						'left' => [
							'title' => __( 'Left', 'advanced-elementor-widgets' ),
							'icon' => 'eicon-text-align-left',
						],
						'center' => [
							'title' => __( 'Center', 'advanced-elementor-widgets' ),
							'icon' => 'eicon-text-align-center',
						],
						'right' => [
							'title' => __( 'Right', 'advanced-elementor-widgets' ),
							'icon' => 'eicon-text-align-right',
						],
						'justify' => [
							'title' => __( 'Justified', 'advanced-elementor-widgets' ),
							'icon' => 'eicon-text-align-justify',
						],
					],
					'default' => '',
					'selectors' => [
						$el => 'text-align: {{VALUE}};',
					],
				]
			);
			// text vertacal align
			$this->add_responsive_control(
				'aew_ast_vertical_align',
				[
					'label' => __( 'Vertical Align', 'advanced-elementor-widgets' ),
					'type' => Controls_Manager::CHOOSE,
					'options' => [
						'top' => [
							'top' => __( 'Left', 'advanced-elementor-widgets' ),
							'icon' => 'eicon-v-align-top',
						],
						'middle' => [
							'middle' => __( 'Center', 'advanced-elementor-widgets' ),
							'icon' => 'eicon-v-align-middle',
						],
						'bottom' => [
							'bottom' => __( 'Right', 'advanced-elementor-widgets' ),
							'icon' => 'eicon-v-align-bottom',
						],
					],
					'default' => '',
					'selectors' => [
						$el => 'vertical-align: {{VALUE}};',
					],
					'separator' => 'before',
				]
			);
			// white space
			$this->add_control(
				'aew_ast_word_wrap',
				[
					'label' => __( 'Word Wrap', 'advanced-elementor-widgets' ),
					'type' => \Elementor\Controls_Manager::SELECT,
					'default' => 'normal',
					'options' => [
						'normal'  => __( 'Normal', 'advanced-elementor-widgets' ),
						'break-word' => __( 'Break-word', 'advanced-elementor-widgets' ),
						'initial' => __( 'Initial', 'advanced-elementor-widgets' ),
						'inherit' => __( 'Inherit', 'advanced-elementor-widgets' ),
					],
					'selectors' => [
						$el => 'word-wrap: {{VALUE}};',
					],
				]
			);
			// word wrap
			$this->add_control(
				'aew_ast_white_space',
				[
					'label' => __( 'White Space', 'advanced-elementor-widgets' ),
					'type' => \Elementor\Controls_Manager::SELECT,
					'default' => 'normal',
					'options' => [
						'normal'  => __( 'Normal', 'advanced-elementor-widgets' ),
						'nowrap' => __( 'Nowrap', 'advanced-elementor-widgets' ),
						'pre' => __( 'Pre', 'advanced-elementor-widgets' ),
						'inherit' => __( 'Inherit', 'advanced-elementor-widgets' ),
					],
					'selectors' => [
						$el => 'white-space: {{VALUE}};',
					],
				]
			);
			// text indent
			$this->add_control(
				'aew_ast_text_indent',
				[
					'label' => __( 'Text Indent', 'plugin-domain' ),
					'type' => Controls_Manager::SLIDER,
					'size_units' => [ 'px', 'em' ],
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 100,
						],
						'em' => [
							'min' => 0,
							'max' => 10,
						],
					],
					'default' => [
						'unit' => 'px',
						'size' => 0,
					],
					'selectors' => [
						$el => 'text-indent: {{SIZE}}{{UNIT}};',
					],
				]
			);
		$this->end_controls_section();





		$this->start_controls_section( // POSITION ------------------------------------------
			'positioning_section',
			[
				'label' => __( 'Positioning', 'advanced-elementor-widgets' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
			// display
			$this->add_control(
				'aew_ast_display',
				[
					'label' => __( 'Display', 'advanced-elementor-widgets' ),
					'type' => \Elementor\Controls_Manager::SELECT,
					'default' => 'block',
					'options' => [
						'block'  => __( 'Block', 'advanced-elementor-widgets' ),
						'inline-block' => __( 'Inline-block', 'advanced-elementor-widgets' ),
						'inline'  => __( 'Inline', 'advanced-elementor-widgets' ),
						'flex'  => __( 'Flex', 'advanced-elementor-widgets' ),
						'grid' => __( 'Grid', 'advanced-elementor-widgets' ),
						'none' => __( 'None', 'advanced-elementor-widgets' ),
					],
					'selectors' => [
						$el => 'display: {{VALUE}};',
					],
				]
			);		
			// position
			$this->add_control(
				'aew_ast_position',
				[
					'label' => __( 'Position', 'advanced-elementor-widgets' ),
					'type' => \Elementor\Controls_Manager::SELECT,
					'default' => 'relative',
					'options' => [
						'relative'  => __( 'Relative', 'advanced-elementor-widgets' ),
						'absolute' => __( 'Absolute', 'advanced-elementor-widgets' ),
						'fixed'  => __( 'Fixed', 'advanced-elementor-widgets' ),
					],
					'selectors' => [
						$el => 'position: {{VALUE}};',
					],
				]
			);	
			// top
			$this->add_control(
				'aew_ast_position_top',
				[
					'label' => __( 'Position Top', 'plugin-domain' ),
					'type' => Controls_Manager::SLIDER,
					'size_units' => [ 'px', 'vw', 'vh', 'em', '%' ],
					'range' => [
						'px' => [
							'min' => -1000,
							'max' => 1000,
						],
						'vw' => [
							'min' => -100,
							'max' => 100,
						],
						'vh' => [
							'min' => -100,
							'max' => 100,
						],
						'em' => [
							'min' => -100,
							'max' => 100,
						],
						'%' => [
							'min' => -100,
							'max' => 100,
						],						
					],
					'selectors' => [
						$el => 'top: {{SIZE}}{{UNIT}};',
					],
					'separator' => 'before',
				]
			);
			// bottom
			$this->add_control(
				'aew_ast_position_bottom',
				[
					'label' => __( 'Position Bottom', 'plugin-domain' ),
					'type' => Controls_Manager::SLIDER,
					'size_units' => [ 'px', 'vw', 'vh', 'em', '%' ],
					'range' => [
						'px' => [
							'min' => -1000,
							'max' => 1000,
						],
						'vw' => [
							'min' => -100,
							'max' => 100,
						],
						'vh' => [
							'min' => -100,
							'max' => 100,
						],
						'em' => [
							'min' => -100,
							'max' => 100,
						],
						'%' => [
							'min' => -100,
							'max' => 100,
						],						
					],
					'selectors' => [
						$el => 'bottom: {{SIZE}}{{UNIT}};',
					],
				]
			);
			// left
			$this->add_control(
				'aew_ast_position_left',
				[
					'label' => __( 'Position Left', 'plugin-domain' ),
					'type' => Controls_Manager::SLIDER,
					'size_units' => [ 'px', 'vw', 'vh', 'em', '%' ],
					'range' => [
						'px' => [
							'min' => -1000,
							'max' => 1000,
						],
						'vw' => [
							'min' => -100,
							'max' => 100,
						],
						'vh' => [
							'min' => -100,
							'max' => 100,
						],
						'em' => [
							'min' => -100,
							'max' => 100,
						],
						'%' => [
							'min' => -100,
							'max' => 100,
						],						
					],
					'selectors' => [
						$el => 'left: {{SIZE}}{{UNIT}};',
					],
				]
			);
			// right
			$this->add_control(
				'aew_ast_position_right',
				[
					'label' => __( 'Position Right', 'plugin-domain' ),
					'type' => Controls_Manager::SLIDER,
					'size_units' => [ 'px', 'vw', 'vh', 'em', '%' ],
					'range' => [
						'px' => [
							'min' => -1000,
							'max' => 1000,
						],
						'vw' => [
							'min' => -100,
							'max' => 100,
						],
						'vh' => [
							'min' => -100,
							'max' => 100,
						],
						'em' => [
							'min' => -100,
							'max' => 100,
						],
						'%' => [
							'min' => -100,
							'max' => 100,
						],						
					],
					'selectors' => [
						$el => 'right: {{SIZE}}{{UNIT}};',
					],
				]
			);
		
		$this->end_controls_section();
		




		$this->start_controls_section( // SIZE ------------------------------------------
			'size_section',
			[
				'label' => __( 'Size', 'advanced-elementor-widgets' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
			// width
			$this->add_control(
				'aew_ast_width',
				[
					'label' => __( 'Width', 'plugin-domain' ),
					'type' => Controls_Manager::SLIDER,
					'size_units' => [ 'px', 'vw', 'vh', 'em', '%' ],
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 1000,
						],
						'vw' => [
							'min' => 0,
							'max' => 100,
						],
						'vh' => [
							'min' => 0,
							'max' => 100,
						],
						'em' => [
							'min' => 0,
							'max' => 100,
						],
						'%' => [
							'min' => 0,
							'max' => 100,
						],						
					],
					'selectors' => [
						$el => 'width: {{SIZE}}{{UNIT}};',
					],
				]
			);
			// max-width
			$this->add_control(
				'aew_ast_max_width',
				[
					'label' => __( 'Max Width', 'plugin-domain' ),
					'type' => Controls_Manager::SLIDER,
					'size_units' => [ 'px', 'vw', 'vh', 'em', '%' ],
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 1000,
						],
						'vw' => [
							'min' => 0,
							'max' => 100,
						],
						'vh' => [
							'min' => 0,
							'max' => 100,
						],
						'em' => [
							'min' => 0,
							'max' => 100,
						],
						'%' => [
							'min' => 0,
							'max' => 100,
						],	
					],
					'selectors' => [
						$el => 'max-width: {{SIZE}}{{UNIT}};',
					],
				]
			);
			// height
			$this->add_control(
				'aew_ast_height',
				[
					'label' => __( 'Height', 'plugin-domain' ),
					'type' => Controls_Manager::SLIDER,
					'size_units' => [ 'px', 'vw', 'vh', 'em', '%' ],
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 1000,
						],
						'vw' => [
							'min' => 0,
							'max' => 100,
						],
						'vh' => [
							'min' => 0,
							'max' => 100,
						],
						'em' => [
							'min' => 0,
							'max' => 100,
						],
						'%' => [
							'min' => 0,
							'max' => 100,
						],	
					],
					'selectors' => [
						$el => 'height: {{SIZE}}{{UNIT}};',
					],
					'separator' => 'before',
				]
			);
			// max-height
			$this->add_control(
				'aew_ast_max_height',
				[
					'label' => __( 'Max Height', 'plugin-domain' ),
					'type' => Controls_Manager::SLIDER,
					'size_units' => [ 'px', 'vw', 'vh', 'em', '%' ],
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 1000,
						],
						'vw' => [
							'min' => 0,
							'max' => 100,
						],
						'vh' => [
							'min' => 0,
							'max' => 100,
						],
						'em' => [
							'min' => 0,
							'max' => 100,
						],
						'%' => [
							'min' => 0,
							'max' => 100,
						],	
					],
					'selectors' => [
						$el => 'max-height: {{SIZE}}{{UNIT}};',
					],
				]
			);
		$this->end_controls_section();
		




		$this->start_controls_section( // BACKGROUND ------------------------------------------
			'background_section',
			[
				'label' => __( 'Background', 'advanced-elementor-widgets' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		

		$this->end_controls_section();





		$this->start_controls_section( // BORDER AND SHADOW ------------------------------------------
			'border_shadow_section',
			[
				'label' => __( 'Border And Shodow', 'advanced-elementor-widgets' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		

		$this->end_controls_section();
		




		$this->start_controls_section( // FLEX ------------------------------------------
			'flex_section',
			[
				'label' => __( 'Flex', 'advanced-elementor-widgets' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		

		$this->end_controls_section();
		




		$this->start_controls_section( // GRID ------------------------------------------
			'grid_section',
			[
				'label' => __( 'Grid', 'advanced-elementor-widgets' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		

		$this->end_controls_section();		




		$this->start_controls_section( // TRANSFORM ------------------------------------------
			'transform_section',
			[
				'label' => __( 'Transform', 'advanced-elementor-widgets' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
			// translate x
			$this->add_responsive_control(
				'aew_ast_translate_x',
				[
					'label' => __( 'Translate X', 'plugin-domain' ),
					'type' => Controls_Manager::SLIDER,
					'size_units' => [ 'px', 'vw', 'vh', 'em', '%' ],
					'default' => [
						'unit' => 'px',
						'size' => 0,
					],
					'range' => [
						'px' => [
							'min' => -1000,
							'max' => 1000,
						],
						'vw' => [
							'min' => -100,
							'max' => 100,
						],
						'vh' => [
							'min' => -100,
							'max' => 100,
						],
						'em' => [
							'min' => -100,
							'max' => 100,
						],
						'%' => [
							'min' => -100,
							'max' => 100,
						],						
					],
					'selectors' => [
						$el => '',
						],
				]
			);	
			// translate Y
			$this->add_responsive_control(
				'aew_ast_translate_y',
				[
					'label' => __( 'Translate Y', 'plugin-domain' ),
					'type' => Controls_Manager::SLIDER,
					'size_units' => [ 'px', 'vw', 'vh', 'em', '%' ],
					'default' => [
						'unit' => 'px',
						'size' => 0,
					],
					'range' => [
						'px' => [
							'min' => -1000,
							'max' => 1000,
						],
						'vw' => [
							'min' => -100,
							'max' => 100,
						],
						'vh' => [
							'min' => -100,
							'max' => 100,
						],
						'em' => [
							'min' => -100,
							'max' => 100,
						],
						'%' => [
							'min' => -100,
							'max' => 100,
						],						
					],
					'selectors' => [
						$el => '',
				  	],
				]
			);
			// translate z
			$this->add_responsive_control(
				'aew_ast_translate_z',
				[
					'label' => __( 'Translate Z', 'plugin-domain' ),
					'type' => Controls_Manager::SLIDER,
					'size_units' => [ 'px', 'vw', 'vh', 'em', '%' ],
					'default' => [
						'unit' => 'px',
						'size' => 0,
					],
					'range' => [
						'px' => [
							'min' => -1000,
							'max' => 1000,
						],
						'vw' => [
							'min' => -100,
							'max' => 100,
						],
						'vh' => [
							'min' => -100,
							'max' => 100,
						],
						'em' => [
							'min' => -100,
							'max' => 100,
						],
						'%' => [
							'min' => -100,
							'max' => 100,
						],						
					],
					'selectors' => [
						$el => '',
				  	],
				]
			);
			// rotate x
			$this->add_responsive_control(
				'aew_ast_rotate_x',
				[
					'label' => __( 'Rotate X', 'plugin-domain' ),
					'type' => Controls_Manager::SLIDER,
					'size_units' => [ 'deg' ],
					'default' => [
						'unit' => 'deg',
						'size' => 0,
					],
					'range' => [
						'deg' => [
							'min' => -360,
							'max' => 360,
						],
					],
					'selectors' => [
						$el => '',
					],
					'separator' => 'before',
				]
			);	
			// rotate y
			$this->add_responsive_control(
				'aew_ast_rotate_y',
				[
					'label' => __( 'Rotate Y', 'plugin-domain' ),
					'type' => Controls_Manager::SLIDER,
					'size_units' => [ 'deg' ],
					'default' => [
						'unit' => 'deg',
						'size' => 0,
					],
					'range' => [
						'deg' => [
							'min' => -360,
							'max' => 360,
						],
					],
					'selectors' => [
						$el => '',
				  	],
				]
			);
			// rotate z
			$this->add_responsive_control(
				'aew_ast_rotate_z',
				[
					'label' => __( 'Rotate Z', 'plugin-domain' ),
					'type' => Controls_Manager::SLIDER,
					'size_units' => [ 'deg' ],
					'default' => [
						'unit' => 'deg',
						'size' => 0,
					],
					'range' => [
						'deg' => [
							'min' => -360,
							'max' => 360,
						],
					],
					'selectors' => [
						$el => '',
				  	],
				]
			);
			// scale
			$this->add_responsive_control(
				'aew_ast_scale',
				[
					'label' => __( 'Scale', 'plugin-domain' ),
					'type' => Controls_Manager::SLIDER,
					'size_units' => [ 'px' ],
					'default' => [
						'unit' => 'px',
						'size' => 1,
					],
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 5,
							'step' => 0.1,
						],
					],
					'selectors' => [
						$el => '',
					],
					'separator' => 'before',
				]
			);	
			// skew x
			$this->add_responsive_control(
				'aew_ast_skew_x',
				[
					'label' => __( 'Skew X', 'plugin-domain' ),
					'type' => Controls_Manager::SLIDER,
					'size_units' => [ 'deg' ],
					'default' => [
						'unit' => 'deg',
						'size' => 0,
					],
					'range' => [
						'deg' => [
							'min' => -360,
							'max' => 360,
						],
					],
					'selectors' => [
						$el => '',
					],
					'separator' => 'before',
				]
			);
			// skew y
			$this->add_responsive_control(
				'aew_ast_skew_y',
				[
					'label' => __( 'Skew Y', 'plugin-domain' ),
					'type' => Controls_Manager::SLIDER,
					'size_units' => [ 'deg' ],
					'default' => [
						'unit' => 'deg',
						'size' => 0,
					],
					'range' => [
						'deg' => [
							'min' => -360,
							'max' => 360,
						],
					],
					'selectors' => [
						$el => '',
				  	],
				]
			);

			// perspective
			$this->add_responsive_control(
				'aew_ast_perspective',
				[
					'label' => __( '3D Perspective', 'plugin-domain' ),
					'type' => Controls_Manager::SLIDER,
					'size_units' => [ 'px' ],
					'default' => [
						'unit' => 'px',
						'size' => 0,
					],
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 1000,
						],					
					],
					'selectors' => [
						'(desktop)' . $el => 'transform: perspective({{SIZE}}{{UNIT}}) rotateX({{aew_ast_rotate_x.SIZE}}{{aew_ast_rotate_x.UNIT}}) rotateY({{aew_ast_rotate_y.SIZE}}{{aew_ast_rotate_y.UNIT}}) rotateZ({{aew_ast_rotate_z.SIZE}}{{aew_ast_rotate_z.UNIT}}) translateX({{aew_ast_translate_x.SIZE}}{{aew_ast_translate_x.UNIT}}) translateY({{aew_ast_translate_y.SIZE}}{{aew_ast_translate_y.UNIT}}) translateZ({{aew_ast_translate_z.SIZE}}{{aew_ast_translate_z.UNIT}}) scale({{aew_ast_scale.SIZE}}) skew({{aew_ast_skew_x.SIZE}}deg, {{aew_ast_skew_y.SIZE}}deg);',
						'(tablet)' . $el => 'transform: translateX({{aew_ast_translate_x_tablet.SIZE}}{{aew_ast_translate_x_tablet.UNIT}}) translateY({{aew_ast_translate_y_tablet.SIZE}}{{aew_ast_translate_y_tablet.UNIT}}) translateZ({{aew_ast_translate_z_tablet.SIZE}}{{aew_ast_translate_z_tablet.UNIT}});',
						'(mobile)' . $el => 'transform: translateX({{aew_ast_translate_x_mobile.SIZE}}{{aew_ast_translate_x_mobile.UNIT}}) translateY({{aew_ast_translate_y_mobile.SIZE}}{{aew_ast_translate_y_mobile.UNIT}}) translateZ({{aew_ast_translate_z_mobile.SIZE}}{{aew_ast_translate_z_mobile.UNIT}});',
					],
					'separator' => 'before',
				]
			);	
			// transform-origin
			$this->add_control(
				'aew_ast_transform_origin', [
					'label' => __( 'Transform Origin', 'advanced-elementor-widgets' ),
					'type' => \Elementor\Controls_Manager::TEXT,
					'label_block' => false,
					'default' => 'center center',
					'selectors' => [
						$el => 'transform-origin: {{VALUE}}',
					],
					'separator' => 'before',
				]
			);		
			// backface-visibility
			$this->add_control(
				'aew_ast_backface_visibility',
				[
					'label' => __( 'Backface Visibility', 'advanced-elementor-widgets' ),
					'type' => \Elementor\Controls_Manager::SWITCHER,
					'label_on' => __( 'On', 'advanced-elementor-widgets' ),
					'label_off' => __( 'Off', 'advanced-elementor-widgets' ),
					'return_value' => 'hidden',
					'default' => 'visible',
					'selectors' => [
						$el => 'backface-visibility: {{VALUE}}',
					],
				]
			);	
			// $this->add_control(
			// 	'aew_ast__description',
			// 	[
			// 		'raw' => '<button class="elementor-button aew_transform_reset" style="padding: 4px 10px;">RESET</button>',
			// 		'type' => Controls_Manager::RAW_HTML,
			// 		'render_type' => 'ui',
			// 	]
			// );
		$this->end_controls_section();





		$this->start_controls_section( // MISC ------------------------------------------
			'misc_section',
			[
				'label' => __( 'Misc', 'advanced-elementor-widgets' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		

		$this->end_controls_section();		





		$this->start_controls_section( // CUSTOM ------------------------------------------
			'custom_section',
			[
				'label' => __( 'Custom', 'advanced-elementor-widgets' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		

		$this->end_controls_section();
	}

   

	protected function render() { // php template
		$settings = $this->get_settings_for_display();

		//var_dump($settings);

	echo '<pre>' . print_r($settings['element_id'], true) . '</pre><br>';


      if ( \Elementor\Plugin::$instance->editor->is_edit_mode() ) {
         echo '<div class="elementor-editor-preview elementor-widget-empty">Advanced Styling: ' . $settings['element_id'] . '</div>';
      }
	}

	protected function _content_template() {
		?>
		<# 



		//console.log(view.model.attributes.settings.controls);

		// if first run then create prototype object with selectors
		if (typeof window['as_' + view.model.id] === 'undefined') {
			var temp = {};
			for ( var control in view.model.attributes.settings.controls ) {
				if (control.includes('aew_ast_') && view.model.attributes.settings.controls[control].selectors) {
						temp[control] = view.model.attributes.settings.controls[control].selectors;
				}
			}
			window['as_' + view.model.id] = temp;
		}


		// assign selector to model
		var temp = window['as_' + view.model.id];
		for ( var control in view.model.attributes.settings.controls ) {
			if (control.includes('aew_ast_') && view.model.attributes.settings.controls[control].selectors) {
				delete view.model.attributes.settings.controls[control].selectors;
				var original_selectors_string = JSON.stringify(temp[control]);
				var new_selectors = JSON.parse(original_selectors_string.replace(/#AEW_AST_ELEMENT/g, settings.element_id));
				view.model.attributes.settings.controls[control].selectors = new_selectors;
			}
		}
		//console.log(view.model.attributes.settings.controls);


		#>

		<?php
	}
	
}