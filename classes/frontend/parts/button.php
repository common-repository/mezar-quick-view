<?php 


/**
 * Button
*/


if (!defined( 'ABSPATH')) exit;

if ( !class_exists( 'mezar_qv_pro_frontend_button' ) ) {

    class mezar_qv_pro_frontend_button {

        public function __construct() {
            switch (esc_attr(get_option('mezar_qv_button_position'))) {
                case "before_cart_button":
                    add_action( 'woocommerce_after_shop_loop_item', array($this,'mezar_qv_add_button'), 9 );
                    break;

                case "after_cart_button":
                    add_action( 'woocommerce_after_shop_loop_item', array($this,'mezar_qv_add_button'), 11 );
                    break;

                case "after_price":
                    add_action( 'woocommerce_after_shop_loop_item_title', array($this,'mezar_qv_add_button'), 11 );
                    break;

                case "after_rating":
                    add_action( 'woocommerce_after_shop_loop_item_title', array($this,'mezar_qv_add_button'), 6 );
                    break;

                case "after_title":
                    add_action( 'woocommerce_shop_loop_item_title', array($this,'mezar_qv_add_button'), 11 );
                    break;

                case "before_title":
                    add_action( 'woocommerce_shop_loop_item_title', array($this,'mezar_qv_add_button'), 6 );
                    break;
            }
        }

        public function mezar_qv_add_button () {
            global $post;
            $button = esc_attr(get_option('mezar_qv_button_label'));
            $id = $post->ID;
            $icon = esc_attr( get_option( 'mezar_qv_icon_to_view' ) );
            $preloader = esc_attr(get_option('mezar_qv_preloader'));

            printf(
                '<a data-product_id="%1$s" class="mezar-qv-button">
                <i class="fa %3$s"></i>
                <h1 class="qv">%2$s</h1>
                <div class="mezar-qv-preloader-container">
                <div id="mezar-qv-preloader"><div class="%4$s">Loading...</div></div> 
                </div>
                </a>', $id, $button, $icon , $preloader
            );
        }


    }

    new mezar_qv_pro_frontend_button(); 

}


?>