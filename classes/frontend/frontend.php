<?php


/**
 * front-end
 */

if (!defined( 'ABSPATH')) exit;

if ( !class_exists( 'Mezar_QV_Pro_Frontend' ) ) {

    class Mezar_QV_Pro_Frontend {

        public function __construct() {
            require_once 'parts/assets.php';
            require_once 'parts/button.php';
            require_once 'parts/image.php';
            require_once 'parts/modal.php';
            require_once 'parts/pagination.php';
            require_once 'parts/product.php';
        }

    }

    new Mezar_QV_Pro_Frontend(); 

}

?>