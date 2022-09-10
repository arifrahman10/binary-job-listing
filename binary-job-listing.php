<?php
/**
 * Plugin Name: Binary Job Listing
 * Description: Binary Job Listing is a clean and simple plugin to manage job post and apply form on your WordPress site.
 * Author: Arif Rahman
 * Version: 1.0.0
 * Requires at least: 5.0
 * Tested up to: 6.0.2
 * Requires PHP: 7.4
 * License: GPLv2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text domain: binary-job-listing
 * Domain Path: /languages
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}


if ( !class_exists('Binary_Job_Listing') ) {

    class Binary_Job_Listing {

        /**
         * Binary Job Listing Version
         *
         * Holds the version of the plugin.
         *
         * @var string The plugin version.
         */
        const version = '1.0.0';

        private static $_instance = null;


        /**
         * instance class
         *
         * @return Binary_Job_Listing An instance of the class.
         *
         * @access public
         */
        public static function instance() {
            if ( is_null( self::$_instance ) ) {
                self::$_instance = new self();
            }
            return self::$_instance;
        }


        /**
         * Constructor.
         *
         * Initialize the Binary Job Listing plugin
         *
         * @access public
         */
        public function __construct() {
            $this->define_constants();
            $this->core_includes();

            add_action( 'init', [ $this, 'i18n' ] );
        }

        /**
         * Load Text-domain
         *
         * Load plugin localization files.
         *
         * @access public
         */
        public function i18n() {
            load_plugin_textdomain( 'binary-job-listing', false, plugin_basename( dirname( __FILE__ ) ) . '/languages' );
        }

        /**
         * Plugin define "Constants" ROOT directory
         *
         * @return void
         *
         * @access public
         */
        public function define_constants() {

            // Binary Job Listing plugin current version
            if ( !defined('BINARY_JOB_LISTING_VERSION') ) {
                define ( 'BINARY_JOB_LISTING_VERSION', self::version );
            }

            // directory - "binary-job-listing"
            if ( !defined('BINARY_JOB_LISTING_DIR_PATH') ) {
                define ( 'BINARY_JOB_LISTING_DIR_PATH', plugin_dir_path( __FILE__ ) );
            }

            // directory - "binary-job-listing/assets/css"
            if ( !defined('BINARY_JOB_LISTING_DIR_CSS') ) {
                define('BINARY_JOB_LISTING_DIR_CSS', plugins_url('/assets/css/', __FILE__) );
            }

            // directory - "binary-job-listing/assets/js"
            if ( !defined('BINARY_JOB_LISTING_DIR_JS') ) {
                define('BINARY_JOB_LISTING_DIR_JS', plugins_url('assets/js/', __FILE__) );
            }

            // directory - "binary-job-listing/assets/fonts"
            if ( !defined('BINARY_JOB_LISTING_DIR_FONT') ) {
                define('BINARY_JOB_LISTING_DIR_FONT', plugins_url('assets/fonts/', __FILE__) );
            }

            // directory - "binary-job-listing/assets/vendors"
            if ( !defined('BINARY_JOB_LISTING_DIR_VEND') ) {
                define('BINARY_JOB_LISTING_DIR_VEND', plugins_url('assets/vendors/', __FILE__) );
            }
        }


        /**
         * Include Files
         *
         * Load core files required to run the plugin.
         *
         * @access public
         */
        public function core_includes() {

            /**
             * Job post type file's path
             */
            require_once BINARY_JOB_LISTING_DIR_PATH . 'includes/posttypes/class-post-type-job.php';

            /**
             * Register Enqueue Scripts
             */
            require BINARY_JOB_LISTING_DIR_PATH . 'includes/scripts.php';

            /**
             * Binary Job Listing Helper Functions
             */
            require BINARY_JOB_LISTING_DIR_PATH . 'includes/helper-functions.php';

        }


    }

}


/**
 * @return "binary_job_listing_load" | false
 */
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