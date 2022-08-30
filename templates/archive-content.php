<?php
use Binary_Job_Listing\Helper;

if (!defined('ABSPATH')) {
    exit;
} // Exit if accessed directly

get_header();

$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$args = [
    'post_type' => 'job',
    'post_status' => 'publish',
    'posts_per_page' => 6,
];

$job_post = new \WP_Query( $args );
?>
    <section class="binary-job-archive job-listing">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!---------------------- Start Binary Job Listing Archive list ------------------------>
                    <?php
                    while ($job_post->have_posts()) : $job_post->the_post();
                        ?>
                        <div class="job-list-content">
                            <div class="post-header">
                                <div class="post-info">
                                    <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute() ?>">
                                        <?php the_title('<h2 class="job-title">', '</h2>') ?>
                                    </a>
                                    <div class="post-meta">
                                        <?php
                                        if ( !empty(Helper::get_first_taxonomy('job-location')) ) { ?>
                                            <div class="meta location">
                                                <i class="icon_pin_alt"></i>
                                                <?php echo Helper::get_first_taxonomy('job-location') ?>
                                            </div>
                                            <?php
                                        }
                                        if ( !empty(Helper::get_first_taxonomy('job-category')) ) { ?>
                                            <div class="meta category">
                                                <?php echo Helper::get_first_taxonomy('job-category') ?>
                                            </div>
                                            <?php
                                        }
                                        if ( !empty(Helper::get_first_taxonomy('job-type')) ) { ?>
                                            <div class="meta type">
                                                | <?php echo Helper::get_first_taxonomy('job-type') ?>
                                            </div>
                                            <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                                <div class="post-date">
                                    <?php the_time(get_option('date_format')); ?>
                                </div>
                            </div>
                            <div class="post-content">
                                <p><?php echo wp_trim_words(get_the_content()) ?></p>
                            </div>
                        </div>
                        <?php
                    endwhile;
                    wp_reset_postdata();
                    ?>
                    <!---------------------- Start Binary Job Listing Pagination ------------------------>
                    <div class="binary-job-listing-pagination">
                        <?php
                        $big = 999999999; // need an unlikely integer
                        echo paginate_links(array(
                            'base' => str_replace( $big, '%#%', get_pagenum_link( $big ) ),
                            'format' => '?paged=%#%',
                            'current' => max(1, get_query_var('paged')),
                            'total' => $job_post->max_num_pages,
                            'next_text' => __('Next Page', 'rave-core'),
                            'prev_text' => __('Previous Page', 'rave-core')
                        ));
                        ?>
                    </div>

                </div>
            </div>
        </div>
    </section>
<?php

get_footer();