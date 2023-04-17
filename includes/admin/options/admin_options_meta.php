<?php
if ( ! defined( 'ABSPATH' ) ) {
	die;
} // Cannot access directly.


if ( ! class_exists( 'Bjl_Admin_Meta_Options' ) ) {

    class Bjl_Admin_Meta_Options {


        /**
         * Bjl_Admin_Meta_Options constructor.
         */
        public function __construct() {

            // Create Meta Box
            add_action( 'add_meta_boxes', [ $this, 'add_meta_option' ] );

            // Save Meta Box
            add_action( 'save_post', [ $this, 'meta_box_save' ] );
            add_action( 'save_post', [ $this, 'meta_box2_save' ] );
        }


        /**
         * Add Meta Box
         *
         * @access public
         */
        public function add_meta_option() {
            add_meta_box( 'featured', __( 'Featured Post', 'binary-job-listing' ), [ $this, 'meta_box_callback' ], 'bjl_post', 'side' );
            add_meta_box( 'job_attributes', __( 'Job Attributes', 'binary-job-listing' ), [ $this, 'meta_box_repeater_callback' ], 'bjl_post', 'normal' );
        }


        /**
         * Meta Box Callback
         *
         * @access public
         */
		public function meta_box_callback($post) {
			wp_nonce_field( basename( __FILE__ ), 'bjl_post_nonce' );
			$bjl_stored_meta = get_post_meta( $post->ID );

			?>
            <p>
                <label for="meta-featured">
                    <input type="checkbox" name="featured" id="meta-featured" value="yes" <?php if ( isset ( $bjl_stored_meta['featured'] ) ) checked( $bjl_stored_meta['featured'][0], 'yes' ); ?> />
                </label>
            </p>
			<?php

		}


        /**
         * Meta Box Repeater Callback
         *
         * @access public
         */
        public function meta_box_repeater_callback($post) {
	        wp_nonce_field( basename( __FILE__ ), 'bjl_post_nonce' );
	        $bjl_stored_meta = get_post_meta( $post->ID );

	        $gpminvoice_group = get_post_meta($post->ID, 'customdata_group', true);
	        wp_nonce_field( 'gpm_repeatable_meta_box_nonce', 'gpm_repeatable_meta_box_nonce' );

            ?>
            <script type="text/javascript">
                jQuery(document).ready(function( $ ){
                    $( '#add-row' ).on('click', function() {
                        var row = $( '.empty-row.screen-reader-text' ).clone(true);
                        row.removeClass( 'empty-row screen-reader-text' );
                        row.insertBefore( '#repeatable-fieldset-one tbody>tr:last' );
                        return false;
                    });

                    $( '.remove-row' ).on('click', function() {
                        $(this).parents('tr').remove();
                        return false;
                    });
                });
            </script>

            <table id="repeatable-fieldset-one" width="100%">
                <thead>
                    <tr>
                        <th>First name</th>
                        <th>Last name</th>
                    </tr>
                </thead>

                <tbody>
		        <?php
		        if ( $bjl_stored_meta ) :
			        foreach ( $bjl_stored_meta as $field ) {
				        ?>
                        <tr>
                            <td width="30%">
                                <input type="text"  placeholder="Title" name="TitleItem[]" value="<?php if($field['TitleItem'] != '') echo esc_attr( $field['TitleItem'] ); ?>" />
                            </td>
                            <td width="50%">
                                <input type="text" placeholder="Description" name="TitleDescription[]" value="<?php if ($field['TitleDescription'] != '') echo esc_attr( $field['TitleDescription'] ); ?>" />
                            </td>
                            <td width="20%"><a class="button remove-row" href="#1">Remove</a></td>
                        </tr>
				        <?php
			        }
		        else :
			        // show a blank one
			        ?>
                    <tr>
                        <td>
                            <input type="text" placeholder="Title" title="Title" name="TitleItem[]" />
                        </td>
                        <td>
                            <input type="text" placeholder="Description" title="Description" name="TitleDescription[]" />
                        </td>
                        <td><a class="button cmb-remove-row-button button-disabled" href="#">Remove</a></td>
                    </tr>
		        <?php endif; ?>

                <!-- empty hidden one for jQuery -->
                <tr class="empty-row screen-reader-text">
                    <td>
                        <input type="text" placeholder="Title" title="Title" name="TitleItem[]" />
                    </td>
                    <td>
                        <input type="text" placeholder="Description" title="Description" name="TitleDescription[]" />
                    </td>
                    <td><a class="button remove-row" href="#">Remove</a></td>
                </tr>
                </tbody>
            </table>
            <p><a id="add-row" class="button" href="#">Add another</a></p>
            <?php


        }


	    /**
	     * @param $post_id
	     *
	     * @return void
	     * Save Meta Box
	     */
	    public function meta_box_save( $post_id ) {

		    // Checks save status
		    $is_autosave = wp_is_post_autosave( $post_id );
		    $is_revision = wp_is_post_revision( $post_id );
		    $is_valid_nonce = ( isset( $_POST[ 'bjl_post_nonce' ] ) && wp_verify_nonce( $_POST[ 'bjl_post_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';

		    // Exits script depending on save status
		    if ( $is_autosave || $is_revision || !$is_valid_nonce ) {
			    return;
		    }

		    // Checks for input and sanitizes/saves if needed (featured checkbox)
		    if ( isset( $_POST[ 'featured' ] ) ) {
			    update_post_meta( $post_id, 'featured', sanitize_text_field( $_POST[ 'featured' ] ) );
		    }

	    }


        public function meta_box2_save( $post_id ) {

	        if ( ! isset( $_POST['gpm_repeatable_meta_box_nonce'] ) ||
	             ! wp_verify_nonce( $_POST['gpm_repeatable_meta_box_nonce'], 'gpm_repeatable_meta_box_nonce' ) )
		        return;

	        if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
		        return;

	        if (!current_user_can('edit_post', $post_id))
		        return;

	        $old = get_post_meta($post_id, 'customdata_group', true);
	        $new = array();
	        $invoiceItems = $_POST['TitleItem'];
	        $prices = $_POST['TitleDescription'];
	        $count = count( $invoiceItems );
	        for ( $i = 0; $i < $count; $i++ ) {
		        if ( $invoiceItems[$i] != '' ) :
			        $new[$i]['TitleItem'] = stripslashes( strip_tags( $invoiceItems[$i] ) );
			        $new[$i]['TitleDescription'] = stripslashes( $prices[$i] ); // and however you want to sanitize
		        endif;
	        }
	        if ( !empty( $new ) && $new != $old ) {
		        update_post_meta( $post_id, 'customdata_group', $new );
	        } elseif ( empty($new) && $old ) {
		        delete_post_meta( $post_id, 'customdata_group', $old );
	        }

        }



    }
}


new Bjl_Admin_Meta_Options();