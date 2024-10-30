<?php
/**
 * Plugin Name:   Mezar Quick View PRO
 * Plugin URI:    
 * Description:   Quick View for WooCommerce products.
 * Version:       1.0.0
 * Author:        Mezar
 * Author URI:    https://profiles.wordpress.org/mezar97/
 * Text Domain:   mezar-quick-view-pro
 * Domain Path:   /languages
 * WC requires at least: 5.6.3
 * WC tested up to: 5.7.1
 *
 * @package Mezar_Quick_View_Pro
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( !class_exists( 'Mezar_QV_PRO' ) ) {

	class Mezar_QV_PRO {

		public function __construct() {
			add_action( 'init', array( $this, 'mezar_qv_check_wooc' ), 2 );
			include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
			$this->mezar_qv_const();	
			require_once "loader.php";
			require_once "include/fields.php";
			add_action( 'plugins_loaded', array( $this, 'mezar_qv_load_textdomain' ) );		
		}
		

		/* Check if woocommerce exist */
		public function mezar_qv_check_wooc() {
			if ( !is_plugin_active( 'woocommerce/woocommerce.php' ) || !class_exists( 'WooCommerce' ) ) {
				add_action( 'admin_notices', array($this, 'mezar_qv_admin_woo_notices') );
				return;
			}else {
				require_once 'classes/frontend/frontend.php';
				require_once 'classes/backend/backend.php';
				
			}
		}

		/* the notice to show if woocomemrce is not activate */
		public function mezar_qv_admin_woo_notices() {
			?>
			<div class="notice notice-error">
				<p><?php _e( '<strong>Mezar Quick view Pro</strong> Plugin requires WooCommerce in order to work.', 'mezar-quick-view-pro' ); ?></p>
			</div>
			<?php
		}

		/* TextDomain */
		public function mezar_qv_load_textdomain() {
			$domain = "mezar-quick-view-pro";
			load_plugin_textdomain( $domain, false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );
			 
		}

		/* Constant */
		public static function mezar_qv_const() {
			!defined( 'MEZAR_QV_PRO_VERSION' ) && define( 'MEZAR_QV_PRO_VERSION', '1.0.0' );
			!defined( 'MEZAR_QV_PRO_URI' ) && define( 'MEZAR_QV_PRO_URI',  plugin_dir_path( __FILE__ ) . 'mezar-quick-view.php' );
			!defined( 'MEZAR_QV_PRO_PATH' ) && define( 'MEZAR_QV_PRO_PATH', plugin_dir_path( __FILE__ ) );
			!defined( 'MEZAR_QV_PRO_CSS_PATH' ) && define( 'MEZAR_QV_PRO_CSS_PATH', plugin_dir_url( __FILE__ ) . 'css/' );
			!defined( 'MEZAR_QV_PRO_JS_PATH' ) && define( 'MEZAR_QV_PRO_JS_PATH', plugin_dir_url( __FILE__ ) . 'js/' );
		}

		/* Validate */
		public static function mezar_qv_test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

	}

	new Mezar_QV_PRO(); 
}
