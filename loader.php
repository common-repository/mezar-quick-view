<?php 

/**
 * Add / Delete options
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( !class_exists( 'Mezar_Qv_Pro_Loader' ) ) {

	class Mezar_Qv_Pro_Loader {

		public function __construct() {
			register_activation_hook( MEZAR_QV_PRO_URI, array( $this, 'mezar_qv_install' ) );
			register_deactivation_hook( MEZAR_QV_PRO_URI, array( $this, 'mezar_qv_deinstall' ) );
			require_once 'include/fields.php';
		}

		public function mezar_qv_loader_fields() {
			$options = Mezar_Qv_Pro_Fields::mezar_qv_fields();
			return $options;
		}

		public function mezar_qv_install () {
			if ( class_exists( 'Mezar_QV' ) ) {
				die('It May be Your using the free version of <strong>Mezar Quick View</strong>, Please Delete or Deactivate the free version then activate the premium');
			}else {
				$options = $this->mezar_qv_loader_fields();
				foreach ( $options as $option ) {
					add_option( $option['uid'], $option['default'], '', 'yes' );
				}
				add_option( "mezar_qv_pro_version", MEZAR_QV_PRO_VERSION, '', 'yes' );
			}		
		}

		public function mezar_qv_deinstall () {
			$options = $this->mezar_qv_loader_fields();
			foreach ( $options as $option ) {
				delete_option( $option['uid'] );
			}
			delete_option( "mezar_qv_pro_version" );
		}

	}

	new Mezar_Qv_Pro_Loader();

}


?>