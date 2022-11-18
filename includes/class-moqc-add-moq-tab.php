<?php
/**
 * Adding MOQ Tab in Woocommerce Settings
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'MOQC_Add_MOQ_Tab' ) ) {
	/**
	 * Class MOQC_Add_MOQ_Tab
	 */
	class MOQC_Add_MOQ_Tab {

		/**
		 *  Constructor.
		 */
		public function __construct() {
			add_filter( 'woocommerce_settings_tabs_array', array( $this, 'adds_moqc_tab' ), 50 );
		}

		/**
		 * adding MOQ tab in woocommerce setting
		 */
		public function adds_moqc_tab( $settings_tabs ) {
			$settings_tabs['moq_settings'] = __( 'MOQ', 'moq-controller' );
			return $settings_tabs;
		}
	}
}

new MOQC_Add_MOQ_Tab();
