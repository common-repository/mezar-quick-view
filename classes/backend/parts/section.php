<?php 


/**
 * Section
*/

if (!defined( 'ABSPATH')) exit;

if ( !class_exists( 'mezar_qv_pro_backend_section' ) ) {
    
    class mezar_qv_pro_backend_section {

        public function __construct() {
            add_action( 'admin_init', array( $this, 'mezar_qv_setup_sections' ) );
        }

        public function mezar_qv_setup_sections() {
            add_settings_section( 'mezar_qv_sixth_section', 'Container', array( $this, 'mezar_qv_section_callback' ), 'mezar_qv_fields' );
            add_settings_section( 'mezar_qv_third_section', 'Button', array( $this, 'mezar_qv_section_callback' ), 'mezar_qv_fields' );
            add_settings_section( 'mezar_qv_fourth_section', 'Slider', array( $this, 'mezar_qv_section_callback' ), 'mezar_qv_fields' );
            add_settings_section( 'mezar_qv_fifth_section', 'Gallery', array( $this, 'mezar_qv_section_callback' ), 'mezar_qv_fields' );
            add_settings_section( 'mezar_qv_eight_section', 'Pagination', array( $this, 'mezar_qv_section_callback' ), 'mezar_qv_fields' );
            add_settings_section( 'mezar_qv_first_section', 'Icons', array( $this, 'mezar_qv_section_callback' ), 'mezar_qv_fields' );
            add_settings_section( 'mezar_qv_second_section', 'Animation', array( $this, 'mezar_qv_section_callback' ), 'mezar_qv_fields' );
            add_settings_section( 'mezar_qv_ninth_section', 'Zoom', array( $this, 'mezar_qv_section_callback' ), 'mezar_qv_fields' );
            add_settings_section( 'mezar_qv_seventh_section', 'Style', array( $this, 'mezar_qv_section_callback' ), 'mezar_qv_fields' );  
        }
        
        public function mezar_qv_section_callback( $arguments ) {
            
        }

    }

    new mezar_qv_pro_backend_section();

}

?>