<?php
namespace AI_Element_Style;

use AI_Element_Style\Widgets\ai_element_style;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class AI_Element_Style_Plugin {

	public function __construct() {
		$this->add_actions();
	}

	private function add_actions() {
		add_action( 'elementor/widgets/widgets_registered', [ $this, 'on_widgets_registered' ] );
		// add_action( 'elementor/frontend/after_register_scripts', function() {
		// 	wp_register_script( 'ai-style-element-script', plugins_url( '/assets/js/ai-element-style.js', __FILE__ ), [ 'jquery' ], false, true );
		// });
		// add_action( 'elementor/frontend/after_enqueue_styles', function() {
		// 	wp_enqueue_style( 'ai-element-style', plugins_url( '/assets/css/ai-element-style.css', __FILE__ ) );
		// });
	}

	public function on_widgets_registered() {
		$this->includes();
		$this->register_widget();
	}

	private function includes() {
		require __DIR__ . '/widgets/ai-element-style.php';
	}

	private function register_widget() {
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new ai_element_style() );
	}
}
new AI_Element_Style_Plugin();
