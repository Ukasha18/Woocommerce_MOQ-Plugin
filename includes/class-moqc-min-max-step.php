<?php
/**
 * Setting Min/Max Quantities & Step Multiples for Single product & Cart page.
 *

 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'MOQC_Min_Max_Step' ) ) {
	/**
	 * Class MOQC_Min_Max_Step
	 */
	class MOQC_Min_Max_Step {

		/**
		 *  Constructor.
		 */
		public function __construct() {
			add_filter( 'woocommerce_quantity_input_min', array( $this, 'min_quantity_place' ), 10, 2 );
			add_filter( 'woocommerce_quantity_input_max', array( $this, 'max_quantity_place' ), 10, 2 );
			add_filter( 'woocommerce_quantity_input_step', array( $this, 'place_step_multiple' ), 10, 2 );
		}

		/**
		 * Sets for selected Products/Categories Minimum quantity
		 *
		 */
		public function min_quantity_place( $min, $product ) {
			if ( ! empty( get_option( 'select_products' ) ) || ! empty( get_option( 'select_categories' ) ) ) {
				foreach ( get_option( 'select_products' ) as $key => $prod_ids ) {
					if ( strval( $product->get_id() ) === strval( $prod_ids ) ) {
						$min = get_option( 'minimum_qty' );
					}
				}

				foreach ( get_option( 'select_categories' ) as $key => $selected_cat_ids ) {
					foreach ( $product->category_ids as $key => $total_cat_ids ) {
						if ( strval( $selected_cat_ids ) === strval( $total_cat_ids ) ) {
							$min = get_option( 'minimum_qty' );
						}
					}
				}
			} else {
				foreach ( $product->category_ids as $key => $total_cat_ids ) {
					$min = get_option( 'minimum_qty' );
				}
			}

			return $min;
		}

		/**
		 * Sets selected Products/Categories Maximum quantity.
		 *

		 */
		public function max_quantity_place( $max, $product ) {
			if ( ! empty( get_option( 'select_products' ) ) || ! empty( get_option( 'select_categories' ) ) ) {
				foreach ( get_option( 'select_products' ) as $key => $prod_ids ) {
					if ( strval( $product->get_id() ) === strval( $prod_ids ) ) {
						$max = get_option( 'maximum_qty' );
					}
				}

				foreach ( get_option( 'select_categories' ) as $key => $selected_cat_ids ) {
					foreach ( $product->category_ids as $key => $total_cat_ids ) {
						if ( strval( $selected_cat_ids ) === strval( $total_cat_ids ) ) {
							$max = get_option( 'maximum_qty' );
						}
					}
				}
			} else {
				foreach ( $product->category_ids as $key => $total_cat_ids ) {
					$max = get_option( 'maximum_qty' );
				}
			}

			return $max;
		}

		/*
		place step multiple
		 */
		public function place_step_multiple( $step, $product ) {
			if ( ! empty( get_option( 'select_products' ) ) || ! empty( get_option( 'select_categories' ) ) ) {
				foreach ( get_option( 'select_products' ) as $key => $prod_ids ) {
					if ( strval( $product->get_id() ) === strval( $prod_ids ) ) {
						$step = get_option( 'step_multiple' );
					}
				}

				foreach ( get_option( 'select_categories' ) as $key => $selected_cat_ids ) {
					foreach ( $product->category_ids as $key => $total_cat_ids ) {
						if ( strval( $selected_cat_ids ) === strval( $total_cat_ids ) ) {
							$step = get_option( 'step_multiple' );
						}
					}
				}
			} else {
				foreach ( $product->category_ids as $key => $total_cat_ids ) {
					$step = get_option( 'step_multiple' );
				}
			}

			return $step;
		}
	}
}

new MOQC_Min_Max_Step();
