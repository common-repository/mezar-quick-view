<?php 

/**
 * Fields
*/


if (!defined( 'ABSPATH')) exit;

if ( !class_exists( 'mezar_qv_pro_backend_fields' ) ) {

    class mezar_qv_pro_backend_fields {

        public function __construct() {
            add_action( 'admin_init', array( $this, 'mezar_qv_setup_fields' ) );
            require_once MEZAR_QV_PRO_PATH . 'include/fields.php';
        }

        public function mezar_qv_setup_fields() {
            $fields = Mezar_Qv_Pro_Fields::mezar_qv_fields();

            foreach( $fields as $field ){
                add_settings_field( $field['uid'], $field['label'], array( $this, 'mezar_qv_field_callback' ), 'mezar_qv_fields', $field['section'], $field );
                register_setting( 'mezar_qv_fields', $field['uid'] );
            }
        }

        public function mezar_qv_field_callback( $arguments ) {
            //$arguments['type'] == 'group' ? $value = get_option( $arguments['id'] ) : $value = get_option( $arguments['uid'] );
            $value = get_option( $arguments['uid'] ); // Get the current value, if there is one
            if( ! $value ) { // If no value exists
                $value = $arguments['default']; // Set to our default
                update_option( $arguments['uid'], $arguments['default'] );
            }
        
            // Check which type of field we want
            switch( $arguments['type'] ){
                case 'text': // If it is a text field
                    printf( '<input name="%1$s" id="%1$s" type="%2$s" placeholder="%3$s" value="%4$s" />', $arguments['uid'], $arguments['type'], $arguments['placeholder'], $value );
                    break;
                case 'label': // If it is a text field
                    printf( '<p>%1$s</p>', $arguments['text'] );
                    break;
                case 'color': // If it is a color field
                    printf( '<input name="%1$s" class="mezar_qv_color" id="%1$s" type="text" placeholder="%2$s" value="%3$s" />', $arguments['uid'], $arguments['placeholder'], $value );
                    break;
                case 'number': // If it is a number field
                    printf( '<input name="%1$s" id="%1$s" type="%2$s" placeholder="%3$s" value="%4$s" />', $arguments['uid'], $arguments['type'], $arguments['placeholder'], $value );
                    break;
                case 'gcheckbox': // If it is a group of checkbox field
                    if ( is_array( $arguments['options'] )) {
                        $options_markup = '';
                        if ( !$value ) $value = array();
                        foreach ( $arguments['options'] as $key => $label ) {
                            $options_markup .= sprintf( '<span><input name="%1$s[]" id="%1$s" value="%3$s" type="checkbox"" %2$s /><label>%4$s</label></span>', $arguments['uid'], checked(in_array( $key, $value, 1 ), 1, false), $key, $label );
                        }
                        printf( '<div class="%1$s" id="%1$s">%2$s</div> ', $arguments['container'], $options_markup );
                    }
                    break;
                case 'igroup': // If it is a icon group field
                    if( ! empty ( $arguments['options'] ) && is_array( $arguments['options'] ) ){
                        $options_markup = '';
                        foreach( $arguments['options'] as $key => $label ){
                            $checked = ( $value == $key ) ? ' checked="checked" ' : '';
                            $name = $arguments['uid'];
                            $options_markup .= sprintf( '<label><input %1$s value="%2$s" name="%3$s" type="%4$s" /><p>%5$s</span></p></label><br />', 
                            $checked, $key, $name, $arguments['single'], $label );
                        }
                        printf( '<div class="%1$s" id="%1$s">%2$s</div> ', $arguments['container'], $options_markup );
                    }
                    break;
        
                case 'select': // If it is a select dropdown
                    if( ! empty ( $arguments['options'] ) && is_array( $arguments['options'] ) ){
                        $options_markup = '';
                        foreach( $arguments['options'] as $key => $label ){
                            $options_markup .= sprintf( '<option value="%s" %s>%s</option>', $key, selected( $value, $key, false ), $label );
                        }
                        printf( '<select name="%1$s" id="%1$s">%2$s</select> ', $arguments['uid'], $options_markup );
                    }

            }
            
        
            // If there is help text
            if( $helper = $arguments['helper'] ){
                printf( '<span class="helper"> %s</span>', $helper ); // Show it
            }
        
            // If there is supplemental text
            if( $supplimental = $arguments['supplemental'] ){
                printf( '<p class="description">%s</p>', $supplimental ); // Show it
            }

            
        }


    }

    new mezar_qv_pro_backend_fields(); 

}


?>