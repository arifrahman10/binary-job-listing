<?php
namespace Binary_Job_Listing\Templates;

if (!defined('ABSPATH')) {
	exit;
}

/**
 * Class Templates
 *
 * @package Binary_Job_Listing\Templates
 */
class Templates {


	public function __construct() {

		// Add Filter to redirect Archive Page Template
		add_filter( 'template_include', array( $this, 'template_loader' ) );

		// Template Hooks
		add_filter( 'theme_page_templates', array( $this, 'add_custom_page_templates' ) );

	}


	/**
	 * @param $template
	 *
	 * @return mixed|string
	 * Load custom template
	 * @since 1.0.0
	 */
	public function template_loader( $template ) {

		if ( is_page() && is_page_template( 'page-template.php' ) ) {
			$template = BINARY_JOB_LISTING_DIR_PATH . '/templates/archive-content.php';
		}

		return $template;
	}


	/**
	 * @param $page_templates
	 *
	 * @return mixed
	 * Add custom page template
	 * @since 1.0.0
	 */
	public function add_custom_page_templates( $page_templates ) {

		$page_templates['page-template.php'] = __( 'Binary Job Listing', 'binary-job-listing' );

		return $page_templates;

	}

}

new Templates();