<?php 


/***
 * Menu page
*/

if (!defined( 'ABSPATH')) exit;

if ( !class_exists( 'mezar_qv_pro_backend_menu_page' ) ) {

    class mezar_qv_pro_backend_menu_page {

        public function __construct() {
            add_action( 'admin_menu', array( $this, 'mezar_qv_plugin_settings_page' ) );
            require_once 'section.php';
            require_once 'fields.php';
            add_filter( 'plugin_action_links_mezar-quick-view/mezar-quick-view.php', array( $this, 'mezar_qv_setting_link' ), 10, 2 );
        }

        public function mezar_qv_setting_link( $links_array, $plugin_file_name ){     
            array_unshift( $links_array, '<a href="'. admin_url('admin.php?page=mezar_qv_fields') .'">Settings</a>' );
            return $links_array;
        }

        public function mezar_qv_plugin_settings_page() {
            // Add the menu item and page
            $page_title = 'Mezar Quick View Pro';
            $menu_title = 'Mezar Quick View Pro';
            $capability = 'manage_options';
            $slug = 'mezar_qv_fields';
            $callback = array( $this, 'mezar_qv_plugin_settings_page_content' );
            $icon = 'dashicons-visibility';
            $position = 100;
        
            add_menu_page( $page_title, $menu_title, $capability, $slug, $callback, $icon, $position );
            //add_submenu_page( 'options-general.php', $page_title, $menu_title, $capability, $slug, $callback );
        }

        public function mezar_qv_plugin_settings_page_content() { ?>
            <div class="wrap">
                <h2><?php _e( "Mezar Quick View Pro", "mezar-quick-view-pro" ) ?></h2>
                <form class="mezar_qv_backend_form" method="post" action="options.php">
                    <?php
                        settings_fields( 'mezar_qv_fields' );
                        do_settings_sections( 'mezar_qv_fields' );
                        submit_button();
                    ?>
                </form>
            </div> <?php
        }


    }

    new mezar_qv_pro_backend_menu_page(); 

}



?>