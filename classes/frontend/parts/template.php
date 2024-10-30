<?php 


/**
 * Template
*/


if (!defined( 'ABSPATH')) exit;

if ( !class_exists( 'mezar_qv_pro_frontend_template' ) ) {

    class mezar_qv_pro_frontend_template {

        public function __construct() {
            add_action( "mezar_qv_product_display", array($this, "mezar_qv_product_html") );
            if ( get_option('mezar_qv_element_to_show') )  {
                foreach( get_option('mezar_qv_element_to_show') as $option ) {
                    add_action( 'mezar_qv_product_info', 'woocommerce_template_single_'.$option);
                }
            }
            require_once 'image.php';
            require_once 'gallery.php';
            
        }

        
        public function mezar_qv_product_html() {

            ?>

            <div class="product">

                <div id="product-<?php echo get_the_ID(); ?>" <?php post_class('product mezar-qv-product ' . esc_attr( get_option('mezar_qv_rtl') ) ); ?> >

                    <div class="mezar-qv-close">        
                        <i id="mezar-qv-close" class="fa <?php echo esc_attr(get_option('mezar_qv_close_icon')); ?>"></i>
                    </div>

                    <div class="mezar-qv-images">

                        <?php do_action( 'mezar_qv_product_image' );  ?>
                        
                    </div>

                    <div class="summary entry-summary scrollable">
                        <div class="summary-content">   
                            <?php do_action( 'mezar_qv_product_info' ); ?>

                            <?php if ( esc_attr( get_option( 'mezar_qv_button_detail' ) ) == "true" ) : ?>
                                <div class="mezar_qv_view_detail_container">
                                    <a class="mezar_qv_view_detail" href="<?php echo esc_url(the_permalink()); ?>"><?php printf( __( '%1$s', 'mezar-quick-view' ), esc_attr( get_option( 'mezar_qv_button_detail_text' ) ) ) ?></a>
                                </div>
                            <?php endif; ?>

                        </div>
                    </div>

                    <div class="mezar-qv-overlay"></div>

                </div> 

            </div>

        <?php }
        

    }

    new mezar_qv_pro_frontend_template(); 

}


?>