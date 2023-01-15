<?php
if (!defined('ABSPATH')) {
	exit;
}


add_action('widgets_init', function () {
	register_sidebar(array(
		'name' => esc_html__( 'Job Sidebar', 'binary-job-listing' ),
		'description' => esc_html__('Add widgets here for the Right Sidebar of the Doc pages', 'binary-job-listing'),
		'id' => 'bjl_job_sidebar',
		'before_widget' => '<div id="%1$s" class="widget job_sidebar %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="title">',
		'after_title' => '</h3>'
	));
});