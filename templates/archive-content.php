<?php
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
                <!-- left side bar -->
                <div class="col-lg-4  pr-lg-55">
                    <div class="left-sidebar-widget">
                        <div class="sidebar-header">
                            <div class="sidebar-title">
                                <h4>Search for jobs</h4>
                            </div>
                        </div>
                        <div class="single-sidebar-widget mt-35 widget-shadow">
                            <div class="input-search-field input-group">
                                <input type="text" class="form-control" placeholder="Job title or keywords...">
                                <div class="input-group-append">
                                    <button class="btn"><i class="icon_search"></i></button>

                                </div>
                            </div>
                        </div>

                        <div class="single-sidebar-widget mt-30 widget-shadow">
                            <div class="select-location">
                                <span class="arrow-icon"><i class="arrow_carrot-down"></i></span>
                                <select id="locationSelect" class="form-control">
                                    <option value="Bagerhat" selected>Bagerhat</option>
                                    <option value="Bandarban">Bandarban</option>
                                    <option value="Barguna">Barguna</option>
                                    <option value="Barisal">Barisal</option>
                                    <option value="Bhola">Bhola</option>
                                    <option value="Barishal Metro">Barishal Metro</option>
                                    <option value="Bogra">Bogra</option>
                                    <option value="Brahmmanbaria">Brahmmanbaria</option>
                                    <option value="Chandpur">Chandpur</option>
                                    <option value="Chapai Nawabganj">Chapai Nawabganj</option>
                                    <option value="Chittagong">Chittagong</option>
                                    <option value="Chuadanga">Chuadanga</option>
                                    <option value="Chottogram Metro">Chottogram Metro</option>
                                    <option value="Cox&#039;s Bazar">Cox&#039;s Bazar</option>
                                    <option value="Coxsbazar">Coxsbazar</option>
                                    <option value="Cumilla">Cumilla</option>
                                    <option value="Dhaka">Dhaka</option>
                                    <option value="Dinajpur">Dinajpur</option>
                                    <option value="Dhaka Metro">Dhaka Metro</option>
                                    <option value="Faridpur">Faridpur</option>
                                    <option value="Feni">Feni</option>
                                    <option value="Gaibandha">Gaibandha</option>
                                    <option value="Gazipur">Gazipur</option>
                                    <option value="Gazipur Metro">Gazipur Metro</option>
                                    <option value="Gopalgonj">Gopalgonj</option>
                                    <option value="Habigonj">Habigonj</option>
                                    <option value="Jaflong">Jaflong</option>
                                    <option value="Jamalpur">Jamalpur</option>
                                    <option value="Jessore">Jessore</option>
                                    <option value="Jhalokathi">Jhalokathi</option>
                                    <option value="Jhenaidah">Jhenaidah</option>
                                    <option value="Joypurhat">Joypurhat</option>
                                    <option value="Khagrachari">Khagrachari</option>
                                    <option value="Khulna">Khulna</option>
                                    <option value="Kishoregonj">Kishoregonj</option>
                                    <option value="Khulna Metro">Khulna Metro</option>
                                    <option value="Kurigram">Kurigram</option>
                                    <option value="Kustia">Kustia</option>
                                    <option value="Lalmonirhat">Lalmonirhat</option>
                                    <option value="Laxmipur">Laxmipur</option>
                                    <option value="Madaripur">Madaripur</option>
                                    <option value="Magura">Magura</option>
                                    <option value="Manikgonj">Manikgonj</option>
                                    <option value="Meherpur">Meherpur</option>
                                    <option value="Moulabhibazar">Moulabhibazar</option>
                                    <option value="Munshigonj">Munshigonj</option>
                                    <option value="Mymensingh">Mymensingh</option>
                                    <option value="Naogaon">Naogaon</option>
                                    <option value="Narail">Narail</option>
                                    <option value="Narayangonj">Narayangonj</option>
                                    <option value="Narsingdi">Narsingdi</option>
                                    <option value="Natore">Natore</option>
                                    <option value="Netrokona">Netrokona</option>
                                    <option value="Nilphamari">Nilphamari</option>
                                    <option value="Noakhali">Noakhali</option>
                                    <option value="Pabna">Pabna</option>
                                    <option value="Panchagarh">Panchagarh</option>
                                    <option value="Patuakhali">Patuakhali</option>
                                    <option value="Pirojpur">Pirojpur</option>
                                    <option value="Rajbari">Rajbari</option>
                                    <option value="Rajshahi">Rajshahi</option>
                                    <option value="Rangamati">Rangamati</option>
                                    <option value="Rangpur">Rangpur</option>
                                    <option value="Rajshahi Metro ">Rajshahi Metro </option>
                                    <option value="Rangpur Metro ">Rangpur Metro </option>
                                    <option value="Saint Martin">Saint Martin</option>
                                    <option value="Satkhira">Satkhira</option>
                                    <option value="Shariatpur">Shariatpur</option>
                                    <option value="Sherpur">Sherpur</option>
                                    <option value="Sirajgonj">Sirajgonj</option>
                                    <option value="Sylhet Metro">Sylhet Metro</option>
                                    <option value="Srimangal">Srimangal</option>
                                    <option value="Sunamgonj">Sunamgonj</option>
                                    <option value="Sylhet">Sylhet</option>
                                    <option value="Tangail">Tangail</option>
                                    <option value="Teknaf">Teknaf</option>
                                    <option value="Thakurgaon">Thakurgaon</option>
                                </select>
                            </div>
                        </div>


                        <div class="single-sidebar-widget mt-60 widget-border">
                            <div class="catagory-list-widget">
                                <div class="widget-title">
                                    <h5>Job Category</h5>
                                </div>
                                <div class="widget-content ">

                                    <ul class="catagory-list py-3">
                                        <li class="catagory-item ">
                                            <a href="#" class="catagory-link active">
                                                <span class="text">All Category</span>
                                                <span class="number">(25)</span>
                                            </a>
                                        </li>
                                        <li class="catagory-item">
                                            <a href="#" class="catagory-link">
                                                <span class="text">Administration</span>
                                                <span class="number">(05)</span>
                                            </a>
                                        </li>
                                        <li class="catagory-item">
                                            <a href="#" class="catagory-link">
                                                <span class="text">Asset Management</span>
                                                <span class="number">(03)</span>
                                            </a>
                                        </li>
                                        <li class="catagory-item">
                                            <a href="#" class="catagory-link">
                                                <span class="text">Accounts Officer</span>
                                                <span class="number">(04)</span>
                                            </a>
                                        </li>
                                        <li class="catagory-item">
                                            <a href="#" class="catagory-link">
                                                <span class="text">Branch Banking</span>
                                                <span class="number">(10)</span>
                                            </a>
                                        </li>
                                        <li class="catagory-item ">
                                            <a href="#" class="catagory-link ">
                                                <span class="text">Technology</span>
                                                <span class="number">(03)</span>
                                            </a>
                                        </li>
                                    </ul>

                                </div>
                            </div>
                        </div>

                        <div class="single-sidebar-widget mt-60 widget-border">
                            <div class="widget-title">
                                <h5>Job Schedule</h5>
                            </div>
                            <div class="widget-content pt-20 pb-20 pr-20 pl-20">
                                <div class="form-check form-check-inline mr-30">
                                    <input class="form-check-input" type="radio" name="inlineRadioOptions"
                                           id="fulltime" value="option1">
                                    <label class="form-check-label" for="fulltime">Full-time</label>
                                </div>
                                <div class="form-check form-check-inline mr-30">
                                    <input class="form-check-input" type="radio" name="inlineRadioOptions"
                                           id="parttime" value="option2">
                                    <label class="form-check-label" for="parttime">Part Time</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right bar -->
                <div class="col-lg-8">
                    <div class="job-post-widget">
                        <?php
                        while ($job_post->have_posts()) : $job_post->the_post();
                            ?>
                            <div class="single-job-post">
                                <div class="post-header">
                                    <div>
                                        <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute() ?>">
                                            <?php the_title('<h2 class="job-title">', '<h2>') ?>
                                        </a>
                                        <div class="d-flex flex-wrap">
                                            <div class="job-location me-lg-3 me-2">
                                                <i class="icon_pin_alt"></i>
                                                NY,
                                                United
                                                States
                                            </div>
                                            <div class="job-catagory"><span>Branch Banking</span> | Full-time
                                            </div>
                                        </div>
                                    </div>
                                    <div class="timestamp">
                                        <?php the_time(get_option('date_format')); ?>
                                    </div>
                                </div>
                                <div class="post-content">
                                    <p><?php ///the_content(); ?></p>
                                </div>
                            </div>
                            <?php
                        endwhile;
                        wp_reset_postdata();
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php

get_footer();