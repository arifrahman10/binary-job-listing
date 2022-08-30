<?php
namespace Binary_Job_Listing\Admin_Submenu;


class Settings {

    public function __construct() {

        // Register Submenu Page "Settings" for Job listing
        add_action('admin_menu', [$this, 'binary_job_listing_settings_init'], 5, 1);

        //add_action('admin_init', 'job-settings');

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


            <form action="options.php" method="POST">
                <?php

                settings_fields( 'setting-group-1' );
                do_settings_sections( 'my-menu-slug-1' );

                if( $tab == 'general' ) {

                    ?>
                    <label for="">
                        Text:
                        <input type="text">
                    </label>
                    <?php

                } elseif( $tab == 'tools' )  {

                    ?>
                    <tr>
                        <th>Tags with CSS classes:</th>
                        <td>
                            <input id="ilc_tag_class" name="ilc_tag_class" type="text" value="true" />
                            <label for="ilc_tag_class">Checking this will output each post tag with a specific CSS class based on its slug.</label>
                        </td>
                    </tr>
                    <?php

                }
                ?>

                <?php submit_button(); ?>
            </form>

        </div><!-- /.wrap -->
        <?php


    }

}

new Settings();