<?php
namespace Binary_Job_Listing;

if (!defined('ABSPATH')) {
    exit;
} // Exit if accessed directly

/**
 * Binary_Job_Listing_Post_Type_Job Class
 *
 * This file is used to define the `job` custom post type.
 *
 * @since       1.0.0
 *
 * @package     Binary Job Listing
 * @subpackage  Binary Job Listing/includes/posttypes
 * @author     arifbb79@gmail.com
 */

if (!class_exists('Binary_Job_Listing_Post_Type_Job')) {

    class Binary_Job_Listing_Post_Type_Job {

        /**
         * Autoload method
         * @return void
         * Initialize the class and set its properties.
         *
         * @since 1.0.0
         *
         * @access public
         */
        public function __construct() {

            // Register the post type
            add_action('init', [$this, 'binary_job_listing_init'], 10);

            // Add Filter to redirect Archive Page Template
            add_filter('archive_template', [$this, 'get_binary_job_listing_archive_template'], 20);

            // Add Filter to redirect Single Page Template
            add_filter('single_template', [$this, 'get_binary_job_listing_single_template'], 20);

        }

        // Custom Post Type Register
        public function binary_job_listing_init() {

            $labels = array(
                'name'              => esc_html__( 'Jobs', 'binary-job-listing' ),
                'singular_name'     => esc_html__( 'Job', 'binary-job-listing' ),
                'add_new'           => esc_html__( 'Add New', 'binary-job-listing' ),
                'add_new_item'      => esc_html__( 'Add New Job', 'binary-job-listing' ),
                'edit_item'         => esc_html__( 'Edit Job', 'binary-job-listing' ),
                'new_item'          => esc_html__( 'New Job', 'binary-job-listing' ),
                'new_item_name'     => esc_html__( 'New Job Name', 'binary-job-listing' ),
                'all_items'         => esc_html__( 'All Jobs', 'binary-job-listing' ),
                'view_item'         => esc_html__( 'View Job', 'binary-job-listing' ),
                'view_items'        => esc_html__( 'Views', 'binary-job-listing' ),
                'search_items'      => esc_html__( 'Search Jobs', 'binary-job-listing' ),
                'not_found'         => esc_html__( 'No jobs found', 'binary-job-listing' ),
                'not_found_in_trash'     => esc_html__( 'No jobs found in Trash', 'binary-job-listing' ),
                'parent_item'       => esc_html__( 'Parent Job', 'binary-job-listing' ),
                'parent_item_colon' => esc_html__( 'Parent Job:', 'binary-job-listing' ),
                'update_item'       => esc_html__( 'Update Job', 'binary-job-listing' ),
                'menu_name'         => esc_html__( 'Job Listings', 'binary-job-listing' ),
            );

            $args = array(
                'labels'                => $labels,
                'public'                => true,
                'publicly_queryable'    => true,
                'show_in_rest'          => true,
                'show_ui'               => true,
                'show_in_menu'          => true,
                'query_var'             => true,
                'rewrite'               => array( 'slug' => 'bjl_post' ),
                'capability_type'       => 'post',
                'has_archive'           => true,
                'hierarchical'          => true,
                'menu_position'         => 8,
                'supports'              => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'revisions', 'custom-fields', 'permalinks', 'page-attributes' ),
                'yarpp_support'         => true,
                'menu_icon'             => 'dashicons-book',
                'show_admin_column'     => true,
            );

            register_post_type('bjl_post', $args);// Register the post type


            /**
             * @since  1.0.0
             *
             * Binary Job Listing Categories (bjl_category)
             */
            register_taxonomy('bjl_category', 'bjl_post', array(
                'public'                => true,
                'hierarchical'          => true,
                'show_admin_column'     => true,
                'show_in_nav_menus'     => false,
                'labels'                => array(
                    'name'  => esc_html__( 'Categories', 'binary-job-listing'),
                )
            ));

            /**
             * @since  1.0.0
             *
             * Binary Job Locations - (bjl_location)
             */
            register_taxonomy('bjl_location', 'bjl_post', array(
                'public'                => true,
                'hierarchical'          => true,
                'show_admin_column'     => true,
                'show_in_nav_menus'     => false,
                'labels'                => array(
                    'name'  => esc_html__( 'Locations', 'binary-job-listing'),
                )
            ));

            /**
             * @since  1.0.0
             *
             * Binary Job Types - (bjl_type)
             */
            register_taxonomy('bjl_type', 'bjl_post', array(
                'public'                => true,
                'hierarchical'          => true,
                'show_admin_column'     => true,
                'show_in_nav_menus'     => false,
                'labels'                => array(
                    'name'  => esc_html__( 'Types', 'binary-job-listing'),
                )
            ));

        }

        // Job Archive Page Job Listing
        public function get_binary_job_listing_archive_template( $archive_template ){
            if ( is_post_type_archive ( 'bjl_post' ) ) {
                $archive_template = BINARY_JOB_LISTING_DIR_PATH . 'templates/archive-content.php';
            }
            return $archive_template;
        }

        // Job Single Job Listing
        public function get_binary_job_listing_single_template($single_template) {
            if ( is_singular('bjl_post') ) {
                $single_template = BINARY_JOB_LISTING_DIR_PATH . '/templates/single-content.php';
            }
            return $single_template;
        }

    }
}

new Binary_Job_Listing_Post_Type_Job();