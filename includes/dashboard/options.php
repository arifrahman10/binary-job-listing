<?php


echo 'Hello test';

/* ----------------------------------------------------------------------------- */
/* Setting Sections And Fields */
/* ----------------------------------------------------------------------------- */

function sandbox_initialize_theme_options() {

    add_settings_section(
        'page_1_section',         // ID used to identify this section and with which to register options
        'Section 1',                  // Title to be displayed on the administration page
        'page_1_section_callback', // Callback used to render the description of the section
        'my-menu-slug-1'                           // Page on which to add this section of options

    );

    /* ----------------------------------------------------------------------------- */
    /* Option 1 */
    /* ----------------------------------------------------------------------------- */
    add_settings_field (
        'option_1',                      // ID used to identify the field throughout the theme
        'Option 1',                           // The label to the left of the option interface element
        'option_1_callback',   // The name of the function responsible for rendering the option interface
        'my-menu-slug-1',                          // The page on which this option will be displayed
        'page_1_section',         // The name of the section to which this field belongs
        array(                              // The array of arguments to pass to the callback. In this case, just a description.
            'This is the description of the option 1',
        )
    );

    register_setting(
    //~ 'my-menu-slug',
        'setting-group-1',
        'option_1'
    );

}

add_action('admin_init', 'sandbox_initialize_theme_options');

function page_1_section_callback() {
    echo '<p>Section Description here</p>';
} // function page_1_section_callback


/* ----------------------------------------------------------------------------- */
/* Field Callbacks */
/* ----------------------------------------------------------------------------- */
function option_1_callback($args) {
    ?>
    <input type="text" id="option_1" class="option_1" name="option_1" value="<?php echo get_option('option_1') ?>">
    <p class="description option_1"> sdfsdfsdfsdf <?php echo $args[0] ?> </p>
    <?php
} // end sandbox_toggle_header_callback