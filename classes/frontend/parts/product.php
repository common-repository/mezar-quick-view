<?php 


/**
 * Get Product
*/


if (!defined( 'ABSPATH')) exit;

if ( !class_exists( 'mezar_qv_pro_frontend_product' ) ) {

    class mezar_qv_pro_frontend_product {

        public function __construct() {
            add_action( 'wp_ajax_mezar_qv_get_product', array($this,'mezar_qv_get_product') );
            add_action( 'wp_ajax_nopriv_mezar_qv_get_product', array($this,'mezar_qv_get_product') );
            require_once 'template.php';
        }

        
        public function mezar_qv_get_product() {

            $id = Mezar_QV_PRO::mezar_qv_test_input($_POST['product_id']);
            wp( 'p=' . $id . '&post_type=product' );

            ob_start();?>

            <?php while ( have_posts() ) : the_post(); ?>

                <?php do_action('mezar_qv_product_display'); ?>
                
            <?php endwhile; ?>

            <?php do_action( 'mezar_qv_product_pagination' ); ?>

            <?php

            wp_send_json_success( ob_get_clean() );

            exit(); 
        
        }
        

    }

    new mezar_qv_pro_frontend_product(); 

}


?>