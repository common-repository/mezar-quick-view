<?php 

/**
 * ShortCode
*/

if (!defined( 'ABSPATH')) exit;

if ( !class_exists( 'mezar_qv_pro_shortcode' ) ) {

    class mezar_qv_pro_shortcode {


        public function __construct() {
            add_action( 'init', array( $this, 'mezar_qv_add_shortcode' ) );
        }

        public function mezar_qv_sc_func ( $atts = array() ) {
            $atts = shortcode_atts( array(
                'id' => null,
            ), $atts );

            if ( ! $atts['id'] ) {
                global $woocommerce, $product;
                if ( $woocommerce->version >= '3.0' ) {
                    $atts['id'] = $product->get_id();
                } else {
                    $atts['id'] = $product->id;
                }
            }

            $icon = esc_attr( get_option( 'mezar_qv_icon_to_view' ) );
            $label = esc_attr(get_option('mezar_qv_button_label'));
            $preloader = esc_attr(get_option('mezar_qv_preloader'));


            $output = '';
            if ( $atts['id'] ) {
                $output .= '<a data-product_id="'.$atts['id'].'" class="mezar-qv-button">
                <i class="fa '.$icon.'"></i>
                <h1 class="qv">'. $label .'</h1>
                <div class="mezar-qv-preloader-container">
                <div id="mezar-qv-preloader"><div class="'.$preloader.'">Loading...</div></div> 
                </div>
                </a>';
            }
            return $output;
        }

        public function mezar_qv_add_shortcode() {
            add_shortcode( 'mezar_qv_sc', array( $this, 'mezar_qv_sc_func' ) );
        }


    }

    new mezar_qv_pro_shortcode();

}



?>