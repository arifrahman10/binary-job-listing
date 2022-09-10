<?php
if (!defined('ABSPATH')) {
    exit;
} // Exit if accessed directly

get_header();

?>
    <section class="binary-job-details-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <?php
                    while (have_posts()) : the_post();
                        the_content();
                    endwhile;
                    ?>
                </div>
            </div>
        </div>
    </section>
<?php

get_footer();