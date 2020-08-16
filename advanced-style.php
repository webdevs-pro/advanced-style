<?php
/**
 * Plugin Name: Advansed Style Widget
 * Description: Widget for Elementor that allows visualy to style elemnts basis on class names
 * Plugin URI:  http://web-devs.pro/
 * Version:     1.0
 * Author:      web-devs.pro
 * Text Domain: advanced-style
 */


if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

final class AI_Element_Style_Elementor {

	public function __construct() {
		add_action( 'init', array( $this, 'i18n' ) );
		add_action( 'plugins_loaded', array( $this, 'init' ) );
	}

	public function i18n() {
		load_plugin_textdomain( 'advanced-style' );
	}

	public function init() {
		// Check if Elementor installed and activated
		if (!did_action('elementor/loaded')) 
			return;

		require_once('plugin.php');

		// register web devs category
		add_action( 'elementor/elements/categories_registered', function($elements_manager) {
			$elements_manager->add_category(
				'web-devs-category',
				[
					'title' => __('Web Devs Widgets','advanced-style'),
					'icon' => 'fa fa-plug',
				]
			);
		});
	}

}
new AI_Element_Style_Elementor();



// plugin updates
// require 'plugin-update-checker/plugin-update-checker.php';
// $myUpdateChecker = Puc_v4_Factory::buildUpdateChecker(
// 	'https://github.com/webdevs-pro/advanced-style',
// 	__FILE__,
// 	'advanced-style'
// );
