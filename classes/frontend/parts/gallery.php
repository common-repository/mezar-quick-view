<?php 


/**
 * Assets
*/


if (!defined( 'ABSPATH')) exit;

if ( !class_exists( 'mezar_qv_pro_frontend_gallery' ) ) {

    class mezar_qv_pro_frontend_gallery {

        public function __construct() {
            if ( get_option( 'mezar_qv_gallery' ) == 'true' ) add_action( 'mezar_qv_product_image', array( $this, 'mezar_qv_show_product_gallery' ) );
        }

        
        public function mezar_qv_show_product_gallery() {

            global $product;

            $post_thumbnail_id = $product->get_image_id();
            $attachment_ids = $product->get_gallery_image_ids();
            array_push( $attachment_ids, get_post_thumbnail_id() );

            ?>

                <div class="jcarousel mezar-qv-gallery-container">
                    <?php $gallery = array_reverse($attachment_ids); ?>
                    <?php if ( count($gallery) > 1 ) : ?>
                        <div data-count="<?php echo esc_attr(count($gallery)); ?>" class="mezar-qv-gallery-container-ulist">
                            <?php $slide = 0; ?>
                            <?php foreach ( $gallery as $attachment_id ) : $img = wp_get_attachment_image_src( $attachment_id, 'large' ); ?>
                                <div class="broma" data-index=<?php echo esc_attr($slide); ?>>
                                    <div>
                                        <img src="<?php echo esc_attr($img[0]); ?>" alt="">
                                    </div>
                                </div>
                                <?php $slide++; ?>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>

        <?php }


    }

    new mezar_qv_pro_frontend_gallery(); 

}


?>