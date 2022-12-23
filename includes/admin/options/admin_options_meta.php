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
        }


        /**
         * Add Meta Box
         *
         * @access public
         */
        public function add_meta_option() {
            add_meta_box( 'featured', __( 'Featured Post', 'binary-job-listing' ), [ $this, 'meta_box_callback' ], 'bjl_post', 'side' );
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

	        // Checks for input and sanitizes/saves if needed
	        if( isset( $_POST[ 'featured' ] ) ) {
		        update_post_meta( $post_id, 'featured', sanitize_text_field( $_POST[ 'featured' ] ) );
	        }

        }



    }
}


new Bjl_Admin_Meta_Options();