<?php
namespace Binary_Job_Listing\Scripts;

if (!defined('ABSPATH')) {
    exit;
} // Exit if accessed directly

class Scripts {

    public function __construct() {

        // Scripts Enqueue Hook's
        add_action( 'wp_enqueue_scripts', [$this, 'binary_job_listing_enqueue_scripts'] );

    }

    //Scripts Enqueue
    public function binary_job_listing_enqueue_scripts() {

        /**
         * Enqueue Style file's
         */
        wp_enqueue_style('bootstrap', BINARY_JOB_LISTING_DIR_VEND . 'bootstrap/css/bootstrap.min.css');
        wp_enqueue_style('elegant-icons', BINARY_JOB_LISTING_DIR_FONT . 'elegant-icons/elegant-icons.css');
        wp_enqueue_style('binary-job-listing', BINARY_JOB_LISTING_DIR_CSS . 'style.min.css');


        /**
         * Enqueue Script's files
         */
        wp_enqueue_script('popper', BINARY_JOB_LISTING_DIR_VEND . 'bootstrap/js/popper.min.js', ['jquery'], '2.9.2', true);
        wp_enqueue_script('bootstrap', BINARY_JOB_LISTING_DIR_VEND . 'bootstrap/js/bootstrap.min.js', ['jquery'], '5.2.1', true);

    }

}

new Scripts();