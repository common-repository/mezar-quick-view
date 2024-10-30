<?php 


/**
 * Assets
*/


if (!defined( 'ABSPATH')) exit;

if ( !class_exists( 'mezar_qv_pro_backend_assets' ) ) {

    class mezar_qv_pro_backend_assets {

        public function __construct() {
            add_action( 'admin_enqueue_scripts', array($this,'mezar_qv_load_assets'));
        }

        public function mezar_qv_load_assets() {
            wp_register_script( "mezar_qv_back_script", MEZAR_QV_PRO_JS_PATH . 'backend.js', array( 'jquery', 'wp-color-picker'), '', true );
            wp_register_style( "mezar_qv_icons", MEZAR_QV_PRO_CSS_PATH . 'font-awesome.css', 10);
            wp_register_style( "mezar_qv_backend", MEZAR_QV_PRO_CSS_PATH . 'backend.css', 9);
            wp_enqueue_style( 'wp-color-picker' );
            wp_enqueue_style( 'mezar_qv_icons' );
            wp_enqueue_style( 'mezar_qv_backend' );
            wp_enqueue_script( 'mezar_qv_back_script' );

        }


    }

    new mezar_qv_pro_backend_assets();

}


?>