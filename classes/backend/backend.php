<?php 

/**
 * Dashboard
 */


if (!defined( 'ABSPATH')) exit;

if ( !class_exists( 'Mezar_QV_Pro_Backend' ) ) {

    class Mezar_QV_Pro_Backend {

        public function __construct() {
            require_once 'parts/shortcode.php';
            require_once 'parts/assets.php';
            require_once 'parts/menu.php';
        }

    }

    new Mezar_QV_Pro_Backend(); 

}