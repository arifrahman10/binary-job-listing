<?php
namespace Binary_Job_Listing;

if (!defined('ABSPATH')) {
    exit;
}

//Helper Class
class Helper {

    /**
     * Get the first taxonomy Name
     *
     * @since 1.0.0
     * @param string $term
     */
    public static function get_first_taxonomy( $term ) {
        $cats = get_the_terms(get_the_ID(), $term);
        $cat  = is_array($cats) ? $cats[0]->name : '';
        return $cat;
    }

    /**
     * Get the first taxonomy Link
     *
     * @since 1.0.0
     * @param string $term
     */
    public static function get_first_taxonomy_link( $term ) {
        $cats = get_the_terms(get_the_ID(), $term);
        $cat  = is_array($cats) ? get_category_link($cats[0]->term_id) : '';
        return $cat;
    }

}