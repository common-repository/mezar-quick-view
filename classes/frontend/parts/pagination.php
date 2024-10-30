<?php 


/**
 * Assets
*/


if (!defined( 'ABSPATH')) exit;

if ( !class_exists( 'mezar_qv_pro_frontend_pagination' ) ) {

    class mezar_qv_pro_frontend_pagination {

        public function __construct() {
            if ( esc_attr( get_option( 'mezar_qv_pagination' ) ) == 'true' ) {
                add_action( 'mezar_qv_product_pagination', array( $this, 'mezar_qv_prev_next_product' ) );
            }
        }
        
        public function mezar_qv_prev_next_product() {

            $previous_post = get_previous_post( true, '',  'product_cat');
            $next_post = get_next_post( true, '',  'product_cat');
            
    
            echo '<div class="mezar_qv_prev_next_buttons">';
            
    
            echo '<div class="mezar_qv_prev_buttons">';
            if ( !empty($previous_post) )
            echo '<i data-product_id="'.esc_attr($previous_post->ID).'" class="mezar_qv_prev_button fa '.esc_attr(get_option('mezar_qv_left_icon')).' "></i>';
            echo '</div>';
        
            echo '<div class="mezar_qv_next_buttons">';
            if ( !empty($next_post) )
            echo '<i data-product_id="'.esc_attr($next_post->ID).'" class="mezar_qv_next_button fa '.esc_attr(get_option('mezar_qv_right_icon')).' "></i>';
            echo '</div>';
        
                        
            echo '</div>';
        }


    }

    new mezar_qv_pro_frontend_pagination(); 

}


?>