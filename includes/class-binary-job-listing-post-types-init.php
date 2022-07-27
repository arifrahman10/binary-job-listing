<?php

if (!defined('ABSPATH')) {
    exit;
} // Exit if accessed directly


class Binary_Job_Listing_Post_Types_Init {

    public function __construct() {

        //Job Listing Custom Post Type
        require_once plugin_dir_path ( __FILE__ ) . 'posttypes/class-post-type-job.php';

        // Initialize Job post Class
        if ( class_exists('Binary_Job_Listing_Post_Type_Job') ) {
            new Binary_Job_Listing_Post_Type_Job();
        }
    }

}

new Binary_Job_Listing_Post_Types_Init();
