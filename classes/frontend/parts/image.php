<?php 


/**
 * Image
*/


if (!defined( 'ABSPATH')) exit;

if ( !class_exists( 'mezar_qv_pro_frontend_image' ) ) {

    class mezar_qv_pro_frontend_image {


        public function __construct() {
            add_action( 'mezar_qv_product_image', array( $this, 'mezar_qv_show_product_image' ) );
        }

        
        public function mezar_qv_show_product_image() {

            global $product;

            $post_thumbnail_id = $product->get_image_id();
            $attachment_ids = $product->get_gallery_image_ids();
            array_push( $attachment_ids, get_post_thumbnail_id() );

            ?>

            <div class="jcarousel mezar-qv-image-container">
                <div class="demo">
                    <?php foreach ( array_reverse($attachment_ids) as $attachment_id ) : $img = wp_get_attachment_image_src( $attachment_id, 'large' ); ?>
                        
                        <?php $image = !empty( $img[0] ) ? $img[0] : WC()->plugin_url() . '/assets/images/placeholder.png'; ?>

                        <?php if ( esc_attr( get_option('mezar_qv_zoom') ) == 'true' ) : ?>

                            <figure class="zoo-item <?php echo esc_attr($active); ?>"
                                data-zoo-image="<?php echo esc_attr($image); ?>"
                                data-zoo-scale="<?php echo esc_attr( get_option('mezar_qv_zoom_scale') ); ?>"
                                data-zoo-move="true"
                                data-zoo-over="false"
                                data-zoo-cursor="false"
                                data-zoo-autosize="auto">
                            </figure>

                        <?php else: ?>

                            <div class="<?php echo esc_attr($active); ?>">
                                <?php $image = !empty( $img[0] ) ? esc_attr($img[0]) : WC()->plugin_url() . '/assets/images/placeholder.png'; ?>
                                <img src="<?php echo esc_attr($image); ?>" alt="">
                            </div>

                        <?php endif; ?>
                    

                    <?php endforeach; ?>

                </div>

            </div>

            <?php if ( esc_attr( get_option('mezar_qv_zoom') ) == 'true' ) : ?>

                <script type="text/javascript">
                    jQuery(document).ready(function(){
                        jQuery('.zoo-item').ZooMove();
                    });
                </script>

            <?php endif; ?>


            <script type="text/javascript">
                jQuery(document).ready(function($){
                    jQuery('.demo').slick({
                        adaptiveHeight : true,
                        draggable : <?php echo esc_attr(get_option('mezar_qv_draggable')); ?>,
                        arrows : <?php echo esc_attr(get_option('mezar_qv_button_arrow')); ?>,
                        dots : <?php echo esc_attr(get_option('mezar_qv_button_dots')); ?>,
                        autoplay: <?php echo esc_attr(get_option('mezar_qv_autoplay')); ?>,
                        fade: <?php echo esc_attr(get_option('mezar_qv_fade')); ?>,
                        <?php echo get_option('mezar_qv_gallery') == 'true' ? 'asNavFor:".mezar-qv-gallery-container-ulist",' : '' ?>
                        slidesToShow: 1,
                        prevArrow : '<button type="button" class="slick-prev"><i class="fa <?php echo esc_attr(get_option('mezar_qv_left_icon')); ?>"></i></button>',
                        nextArrow : '<button type="button" class="slick-next"><i class="fa <?php echo esc_attr(get_option('mezar_qv_right_icon')); ?>"></i></button>',
                    });

                    var count = $('.mezar-qv-gallery-container-ulist').data('count');
                    <?php if ( esc_attr(get_option('mezar_qv_gallery')) == 'true' ) : ?>
                        if (parseInt(count) > 1) {
                            jQuery('.mezar-qv-gallery-container-ulist').slick({
                                arrows : true,
                                dots : false,
                                centerMode: true,
                                centerPadding: '30px',
                                focusOnSelect: true,
                                asNavFor: '.demo',
                                slidesToShow: <?php echo esc_attr(get_option('mezar_qv_slide_show')); ?>,
                                <?php if ( esc_attr( get_option('mezar_qv_gallery_arrow') ) == 'true' ) : ?>
                                    'prevArrow' : '<button type="button" class="slick-prev"><i class="fa <?php echo esc_attr(get_option('mezar_qv_left_icon')); ?>"></i></button>',
                                    'nextArrow' : '<button type="button" class="slick-next"><i class="fa <?php echo esc_attr(get_option('mezar_qv_right_icon')); ?>"></i></button>',
                                <?php endif; ?>
                            });
                        }
                    <?php endif; ?>

                    
                });
            </script>

        <?php }


    }

    new mezar_qv_pro_frontend_image(); 

}


?>