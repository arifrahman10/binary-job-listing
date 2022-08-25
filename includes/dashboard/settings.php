<?php
namespace Binary_Job_Listing\Admin_Submenu;


class Settings {


    public function __construct() {

        // Register Submenu Page "Settings" for Job listing
        add_action('admin_menu', [$this, 'binary_job_listing_settings_init'], 5, 1);

        //add_action('admin_init', [$this, 'binary_job_listing_settings_fields_register'], 10, 1);

    }


    /**
     * Register Submenu "Settings"
     * @return void
     *
     * @access public
     */
    public function binary_job_listing_settings_init() {

        add_submenu_page(
            'edit.php?post_type=job',
            esc_html__('Post Settings', 'binary-job-listing'),
            esc_html__('Settings', 'binary-job-listing'),
            'manage_options',
            'job-settings',
            [$this, 'binary_job_listing_settings']
        );
    }

    public function binary_job_listing_settings() {

        // check user capabilities
        if ( ! current_user_can( 'manage_options' ) ) {
            return;
        }
        //Get the active tab from the $_GET param
        $default_tab = null;
        $tab = isset($_GET['tab']) ? $_GET['tab'] : $default_tab;
        $is_general = $tab == 'general' ? 'nav-tab-active' : '';
        $is_tools = $tab == 'tools' ? 'nav-tab-active' : '';
        ?>
        <!-- Our admin page content should all be inside .wrap -->
        <div class="wrap">

            <!-- Print the page title -->
            <h1><?php echo esc_html( get_admin_page_title() ); ?></h1>

            <!-- Here are our tabs -->
            <nav class="nav-tab-wrapper">
                <a href="?post_type=job&page=job-settings&tab=general" class="nav-tab <?php echo esc_attr($is_general) ?>">
                    <?php esc_html_e('General', 'binary-job-listing' ); ?>
                </a>
                <a href="?post_type=job&page=job-settings&tab=tools" class="nav-tab <?php echo esc_attr($is_tools) ?>">
                    <?php esc_html_e('Tools', 'binary-job-listing' ); ?>
                </a>
            </nav>

            <div class="tab-content">
                <?php switch($tab) :
                    case 'general':
                        echo 'General'; //Put your HTML here
                        break;
                    case 'tools':
                        echo 'Tools';
                        break;
                    default:
                        echo 'Default tab';
                        break;
                endswitch; ?>
            </div>


        </div><!-- /.wrap -->
        <?php

    }



    /**
     * @Render Submenu "Settings"
     * @return void
     * @since 1.0.0
     *
     * @access public
     */
    public function binary_job_listing_settings_fields_register() {

        // check user capabilities
        if ( ! current_user_can( 'manage_options' ) ) {
            return;
        }

        $active_tab = isset( $_GET[ 'tab' ] ) ? $_GET[ 'tab' ] : 'first_tab';

        if( isset( $_GET[ 'tab' ] ) ) {
            $active_tab = $_GET[ 'tab' ];
        } // end if

        if ($active_tab == 'first_tab') {
            register_setting('option_group1', 'option_name');
            add_settings_field(
                'first_tab_fields_slug',
                'First Tab Fields Title',
                'tab_fields_callback',
                'submenu_slug',
                'first_tab_section',
            );
            add_settings_section(
                'first_tab_section',
                'First Tab Titles',
                'tab_fields_callback',
                'submenu_slug',
            );
        }
        elseif($active_tab == 'second_tab') {
            register_setting('option_group2', 'option_name');
            add_settings_field(
                'second_tab_fields_slug',
                'Second Tab Fields Title',
                'tab_fields_callback',
                'submenu_slug',
                'second_tab_section',
            );
            add_settings_section(
                'second_tab_section',
                'Second Tab Titles',
                'tab_fields_callback',
                'submenu_slug',
            );
        }
        //and so on...


    }


}

new Settings();