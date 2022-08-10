<?php
/*
Plugin Name: Binary Job Listing
Plugin URI:
Description:
Version: 1.0.0
Author: Arif Rahman
Author URI:
License: GPLv2 or later
Text Domain: binary-job-listing
*/

/**
 * Predefined PHP Constant file's path
 */

//Plugin ROOT Directory
if ( !defined('BINARY_JOB_LISTING_DIR_PATH') ) {
    define ( 'BINARY_JOB_LISTING_DIR_PATH', plugin_dir_path( __FILE__ ) );
}
if ( !defined('BINARY_JOB_LISTING_DIR_CSS') ) {
    define('BINARY_JOB_LISTING_DIR_CSS', plugins_url('/assets/public/css/', __FILE__) );
}
if ( !defined('BINARY_JOB_LISTING_DIR_JS') ) {
    define('BINARY_JOB_LISTING_DIR_JS', plugins_url('assets/public/js/', __FILE__) );
}
if ( !defined('BINARY_JOB_LISTING_DIR_VEND') ) {
    define('BINARY_JOB_LISTING_DIR_VEND', plugins_url('assets/public/vendors/', __FILE__) );
}


if ( !class_exists('Binary_Job_Listing') ) {

    class Binary_Job_Listing {

        private static $_instance = null;


        /**
         * @return Binary_Job_Listing An instance of the class.
         */
        public static function instance() {
            if ( is_null( self::$_instance ) ) {
                self::$_instance = new self();
            }
            return self::$_instance;
        }


        public function __construct() {

            $this->core_includes();

        }

        public function core_includes() {

            /**
             * Job post type file's path
             */
            require_once BINARY_JOB_LISTING_DIR_PATH . 'includes/posttypes/class-post-type-job.php';
            // Initialize Job post Class
            if ( class_exists('Binary_Job_Listing_Post_Type_Job') ) {
                new Binary_Job_Listing_Post_Type_Job();
            }


            /**
             * Register Enqueue Scripts
             */
            require BINARY_JOB_LISTING_DIR_PATH . 'includes/class-binary-job-listing-scripts.php';

            // Initialize Job post Class
            if ( class_exists('Binary_Job_Listing_Scripts') ) {
                new Binary_Job_Listing_Scripts();
            }

        }


    }

}


if ( !function_exists('binary_job_listing_load') ) {

    /**
     * Load "Binary_Job_Listing" class
     *
     * Main instance of Binary_Job_Listing
     */

    function binary_job_listing_load() {
        return Binary_Job_Listing::instance();
    }

    // Run Binary_Job_Listing
    binary_job_listing_load();

}


