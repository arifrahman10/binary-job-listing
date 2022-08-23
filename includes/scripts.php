<?php
namespace Binary_Job_Listing\Scripts;


class Scripts {

    public function __construct() {

        // Scripts Enqueue Hook's
        add_action( 'wp_enqueue_scripts', [$this, 'binary_job_listing_enqueue_scripts'] );

    }


    //Scripts Enqueue
    public function binary_job_listing_enqueue_scripts() {

        wp_enqueue_style('bootstrap', BINARY_JOB_LISTING_DIR_VEND . 'bootstrap/css/bootstrap.css');
        wp_enqueue_style('elegant-icons', BINARY_JOB_LISTING_DIR_FONT . 'elegant-icons/elegant-icons.css');
        wp_enqueue_style('binary-job-listing', BINARY_JOB_LISTING_DIR_CSS . 'style.min.css');

    }

}

new Scripts();