<?php 


/**
 * Assets
*/


if (!defined( 'ABSPATH')) exit;

if ( !class_exists( 'mezar_qv_pro_frontend_assets' ) ) {

    class mezar_qv_pro_frontend_assets {

        public function __construct() {
            add_action( 'wp_enqueue_scripts', array($this,'mezar_qv_load_assets'));
        }

        public function mezar_qv_load_assets() {
            wp_register_style( "mezar_qv_icons", MEZAR_QV_PRO_CSS_PATH . 'font-awesome.css', 10);
            wp_register_style( "mezar_qv_slickest", MEZAR_QV_PRO_CSS_PATH . 'slick.css', 8);
            wp_register_style( "mezar_qv_slickestem", MEZAR_QV_PRO_CSS_PATH . 'slick-theme.css', 7);
            wp_register_style( "mezar_qv_style", MEZAR_QV_PRO_CSS_PATH . 'style.css', 20);
            wp_register_script( "mezar_qv_script", MEZAR_QV_PRO_JS_PATH . 'frontend.js', array('jquery') );
            wp_register_script( "mezar_qv_slick", MEZAR_QV_PRO_JS_PATH . 'slick.min.js', array('jquery') );
            wp_register_script( "mezar_qv_zoomove", MEZAR_QV_PRO_JS_PATH . 'zoomove.js', array('jquery') );
            wp_localize_script( 'mezar_qv_script', 'mezar_Qv_Pro_Ajax', array( 'ajaxurl' => admin_url( 'admin-ajax.php' )));
        
            
            wp_enqueue_style( 'mezar_qv_slickest' );
            wp_enqueue_style( 'mezar_qv_slickestem' );
            wp_enqueue_style( 'mezar_qv_icons' );
            wp_enqueue_style( 'mezar_qv_style' );
        
            wp_enqueue_script( 'jquery' );
            wp_enqueue_script( 'mezar_qv_slick' );
            wp_enqueue_script( 'mezar_qv_zoomove' );
            wp_enqueue_script( 'mezar_qv_script' );
            

            $pre_size = esc_attr(get_option('mezar_qv_preloader_size')) == '0' ? 'default' : esc_attr(get_option('mezar_qv_preloader_size')).'px';

            $css = "
                .mezar-qv-button {
                    background-color: " . esc_attr( get_option('mezar_qv_bbg_color_normal') ) . ";
                }
                .mezar-qv-button:hover {
                    background-color: " . esc_attr( get_option('mezar_qv_bbg_color_hover') ) . ";
                }
                .qv {
                    font-size: " . esc_attr( get_option('mezar_qv_button_font_size') ) . "px;
                    color: " . esc_attr( get_option('mezar_qv_color_normal') ) . ";
                }
                .mezar-qv-preloader-container {
                    background-color: " . esc_attr( get_option('mezar_qv_bbg_color_normal') ) . ";
                }
                .mezar-qv-button:hover .qv {
                    color: " . esc_attr( get_option('mezar_qv_color_hover') ) . ";
                }
                .mezar-qv-content {
                    -webkit-animation-duration:  " . esc_attr( get_option('mezar_qv_animation_time') ) . "s;
                    animation-duration: " . esc_attr( get_option('mezar_qv_animation_time') ) . "s;
                }
                .mezar-qv-product {
                    background-color: " . esc_attr( get_option('mezar_qv_bg_color') ) . ";
                    width: " . esc_attr( get_option('mezar_qv_bg_width') ) . "%;
                    max-height: " . esc_attr( get_option('mezar_qv_bg_height') ) . "px;
                    padding: " . esc_attr( get_option('mezar_qv_cont_padd') ) . ";
                    grid-template-columns: " . esc_attr( get_option('mezar_qv_image_container_size') ) . " auto;
                }
                .slick-next:before {
                    content: '';
                }
                .mezar-qv-button i:before {
                    color: " . esc_attr( get_option('mezar_qv_icon_to_view_color_normal') ) . ";
                    font-size: " . esc_attr( get_option('mezar_qv_button_icon_size') ) . "px;
                }
                .mezar-qv-button:hover i:before {
                    color: " . esc_attr( get_option('mezar_qv_icon_to_view_color_hover') ) . ";
                }
                .mezar-qv-button .mezar-qv-gallery-container-ulist button:hover i:before {
                    color: " . esc_attr( get_option('mezar_qv_icon_to_view_color_hover') ) . ";
                }
                #mezar-qv-close:before {
                    color: " . esc_attr( get_option('mezar_qv_close_icon_color_normal') ) . ";
                }
                #mezar-qv-close:hover:before {
                    color: " . esc_attr( get_option('mezar_qv_close_icon_color_hover') ) . ";
                }
                .mezar-qv-images .slick-arrow i:before {
                    color: " . esc_attr( get_option('mezar_qv_arrows_icon_color_normal') ) . ";
                }
                .mezar-qv-images .slick-arrow i:hover:before {
                    color: " . esc_attr( get_option('mezar_qv_arrows_icon_color_hover') ) . ";
                }
                .mezar_qv_prev_button, .mezar_qv_next_button {
                    font-size: " . esc_attr( get_option('mezar_qv_pagination_arrows_size') ) . "px !important;
                    color: " . esc_attr( get_option('mezar_qv_pagination_arrows_normal') ) . ";
                }
                .mezar_qv_prev_button:hover, .mezar_qv_next_button:hover {
                    color: " . esc_attr( get_option('mezar_qv_pagination_arrows_hover') ) . ";
                }
                .". esc_attr(get_option('mezar_qv_preloader')) ." {
                    font-size: ".$pre_size.";
                }
                .mezar-qv-spinner-loader3 {
                    background-color: ". esc_attr(get_option('mezar_qv_preloader_color')) .";
                    background: linear-gradient(to right, #3b95db00 10%, #3b95db00 42%);
                }
                .mezar-qv-spinner-loader2,
                .mezar-qv-spinner-loader5,
                .mezar-qv-spinner-loader4  {
                    color: ". esc_attr(get_option('mezar_qv_preloader_color')) .";
                }
                .mezar-qv-loader-bar {
                    color: ". esc_attr(get_option('mezar_qv_preloader_color')) .";
                }
                .mezar-qv-loader-bar, 
                .mezar-qv-loader-bar:before, 
                .mezar-qv-loader-bar:after {
                    background-color: ". esc_attr(get_option('mezar_qv_preloader_color')) .";
                }
                .mezar-qv-spinner-loader3:before {
                    background-color: ". esc_attr(get_option('mezar_qv_preloader_color')) .";
                }
                .mezar-qv-spinner-loader3:after {
                    background-color: ". esc_attr(get_option('mezar_qv_bbg_color_normal')) .";
                }
                .mezar-qv-spinner-loader2:after, .mezar-qv-spinner-loader2:before {
                    background-color: ". esc_attr(get_option('mezar_qv_bbg_color_normal')) .";
                }
                
                .mezar_qv_view_detail {
                color: " . esc_attr( get_option('mezar_qv_detail_normal') ) . ";
                background-color: " . esc_attr( get_option('mezar_qv_detail_bg_normal') ) . ";
                font-size: " . esc_attr( get_option('mezar_qv_button_detail_text_size') ) . "px;
                padding: " . esc_attr( get_option('mezar_qv_detail_padd') ) . ";
                }
                .mezar_qv_view_detail:hover {
                    color: " . esc_attr( get_option('mezar_qv_detail_hover') ) . ";
                    background-color: " . esc_attr( get_option('mezar_qv_detail_bg_hover') ) . "; 
                }

                #mezar_qv_modal #mezar-qv-preloader .". esc_attr(get_option('mezar_qv_preloader')) ." {
                    color: ". esc_attr(get_option('mezar_qv_pagination_preloader_color')) .";

                }
                #mezar_qv_modal #mezar-qv-preloader .mezar-qv-loader-bar,
                #mezar_qv_modal #mezar-qv-preloader .mezar-qv-loader-bar:before,
                #mezar_qv_modal #mezar-qv-preloader .mezar-qv-loader-bar:after {
                    background-color: ". esc_attr(get_option('mezar_qv_pagination_preloader_color')) .";
                }

                #mezar_qv_modal #mezar-qv-preloader .mezar-qv-spinner-loader3 {
                    background-color: ". esc_attr(get_option('mezar_qv_pagination_preloader_color')) .";
                    font-size: 8px;
                }
                #mezar_qv_modal #mezar-qv-preloader .mezar-qv-spinner-loader3:before,
                #mezar_qv_modal #mezar-qv-preloader .mezar-qv-spinner-loader3:after {
                    background-color: ". esc_attr(get_option('mezar_qv_pagination_overlay')) .";
                }
                .mezar-qv-overlay {
                    background-color: ". esc_attr(get_option('mezar_qv_pagination_overlay')) .";
                }
                .slick-slide img {
                    height: ". ((int)get_option('mezar_qv_bg_height') -30) ."px;
                }
                .slick-dots li button:before {
                    font-size: ". esc_attr(get_option('mezar_qv_button_dots_size')) ."px;
                    color: ". esc_attr(get_option('mezar_qv_color_dots')) .";
                }
                .slick-dots li.slick-active button:before {
                    color: ". esc_attr(get_option('mezar_qv_color_dots')) .";
                }   
            ";
            wp_add_inline_style( 'mezar_qv_style', $css );
        }


    }

    new mezar_qv_pro_frontend_assets(); 

}


?>