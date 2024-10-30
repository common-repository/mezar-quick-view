<?php 


/**
 * Modal
*/


if (!defined( 'ABSPATH')) exit;

if ( !class_exists( 'mezar_qv_pro_frontend_modal' ) ) {

    class mezar_qv_pro_frontend_modal {

        public function __construct() {
            add_action( 'wp_footer', array($this, 'mezar_qv_modal'));
        }

        
        public function mezar_qv_modal() {

            echo '<div id="mezar_qv_modal">
            <div class="mezar-qv-content-container"> 
            <div data-animation="' . esc_attr( get_option ('mezar_qv_animation') ) . '" class="mezar-qv-content ' . esc_attr( get_option ('mezar_qv_animation') ) . '">
            <span class="mezar-qv-close">&times;</span>
            <p>Some text in the Modal..</p>
            </div>
            <div id="mezar-qv-preloader"><div class="'. esc_attr(get_option('mezar_qv_preloader')) .'">Loading...</div></div> 
            </div>
            </div>';
        
        }


    }

    new mezar_qv_pro_frontend_modal(); 

}


?>