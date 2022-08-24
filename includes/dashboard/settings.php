<?php
namespace Binary_Job_Listing\Admin_Submenu;


class Settings {


    public function __construct() {

        // Register Submenu Page "Settings" for Job listing
        add_action('admin_menu', [$this, 'binary_job_listing_settings_init'], 5, 1);

        add_action('admin_init', [$this, 'binary_job_listing_settings_fields_register'], 10, 1);

    }


    /**
     * Register Submenu "Settings"
     * @return void
     *
     * @access public
     */
    public function binary_job_listing_settings_init() {

        add_submenu_page('edit.php?post_type=job', 'Job Post Settings', 'Settings', 'manage_options', 'job-settings', [$this, 'binary_job_listing_settings']);
    }


    /**
     * @Render Submenu "Settings"
     * @return void
     * @since 1.0.0
     *
     * @access public
     */
    public function binary_job_listing_settings_fields_register() {

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


    public function binary_job_listing_settings() {

        $active_tab = isset( $_GET[ 'tab' ] ) ? $_GET[ 'tab' ] : 'first_tab';

        ?>
        <!-- Create a header in the default WordPress 'wrap' container -->
        <div class="wrap">

            <div id="icon-themes" class="icon32"></div>
            <h2>This is My Sub-Menu Page</h2>
            <?php settings_errors();

            if( isset( $_GET[ 'tab' ] ) ) {
                $active_tab = $_GET[ 'tab' ];
            } // end if
            ?>
            <h2 class="nav-tab-wrapper">
                <a href="?page=submenu_slug&tab=first_tab" class="nav-tab <?php echo $active_tab == 'multi_order' ? 'nav-tab-active' : ''; ?>">First Tab</a>
                <a href="?page=submenu_slug&tab=second_tab" class="nav-tab <?php echo $active_tab == 'bulk_shipping' ? 'nav-tab-active' : ''; ?>">Second Tab</a>
            </h2>

            <form method="post" action="options.php">
                <?php
                if($active_tab == 'first_tab') {
                    settings_fields( 'option_group1' );
                    do_settings_sections( 'submenu_slug' );
                }
                elseif($active_tab == 'second_tab') {
                    settings_fields( 'option_group2' );
                    do_settings_sections( 'submenu_slug' );
                }
                //And so on...

                submit_button();

                ?>
            </form>

        </div><!-- /.wrap -->
        <?php

    }


}

new Settings();