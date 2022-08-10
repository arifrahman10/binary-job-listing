<?php
get_header();


?>

    <section class="pt-110 pb-150 bg_disable banca_job_archive">
        <div class="container">
            <div class="row">
                <!-- left side bar -->

                <div class="col-lg-4 pr-lg-25">
                    <div class="left-sidebar-widget">
                        <div class="sidebar-header">
                            <div class="sidebar-title">
                                <h4>Search for jobs</h4>
                            </div>
                        </div>

                        <div id="job_search-2" class="job_sidebar_widget single-sidebar-widget mt-30 widget-shadow">        <form action="https://wordpress-theme.spider-themes.net/banca/" class="input-search-field input-group">
                                <input type="text" class="form-control" name="s" placeholder="Job title or keywords...">
                                <div class="input-group-append">
                                    <button class="btn"><i class="icon_search"></i></button>
                                </div>
                                <input type="hidden" name="post_type" value="job">
                            </form>
                        </div><div id="widgets_job_locations-2" class="job_sidebar_widget single-sidebar-widget mt-30 widget-shadow">        <div class="select-location">
                                <form action="https://wordpress-theme.spider-themes.net/banca/" method="get">
                                    <span class="arrow-icon"><i class="arrow_carrot-down"></i></span>
                                    <select id="locationSelect" class="form-control">
                                        <option value="Select Location" selected="">Select Location</option>                        <option value="https://wordpress-theme.spider-themes.net/banca/job_location/california-usa/">California, USA</option>
                                        <option value="https://wordpress-theme.spider-themes.net/banca/job_location/london-uk/">London, UK</option>
                                        <option value="https://wordpress-theme.spider-themes.net/banca/job_location/ny-united-states/">NY, United States</option>
                                        <option value="https://wordpress-theme.spider-themes.net/banca/job_location/sydney-australia/">Sydney, Australia</option>
                                    </select>
                                </form>
                            </div>

                            <script>
                                document.getElementById("locationSelect").onchange = function() {
                                    if (this.selectedIndex !== 0) {
                                        window.location.href = this.value;
                                    }
                                };
                            </script>
                        </div><div id="banca_widgets_job_categories-2" class="job_sidebar_widget single-sidebar-widget mt-30 widget-border"><div class="widget-title"><h5>Job Category</h5></div>            <div class="catagory-list-widget">
                                <div class="widget-content">
                                    <ul class="catagory-list">

                                        <li class="catagory-item ">
                                            <a href="#" class="catagory-link active">
                                                <span class="text">All Category</span>
                                                <span class="number">(8)</span>
                                            </a>
                                        </li>

                                        <li class="catagory-item">
                                            <a href="https://wordpress-theme.spider-themes.net/banca/job_cat/accounts-officer/" class="catagory-link">
                                                <span class="text">Accounts Officer</span>
                                                <span class="number">(2)</span>
                                            </a>
                                        </li>
                                        <li class="catagory-item">
                                            <a href="https://wordpress-theme.spider-themes.net/banca/job_cat/administration/" class="catagory-link">
                                                <span class="text">Administration</span>
                                                <span class="number">(2)</span>
                                            </a>
                                        </li>
                                        <li class="catagory-item">
                                            <a href="https://wordpress-theme.spider-themes.net/banca/job_cat/asset-management/" class="catagory-link">
                                                <span class="text">Asset Management</span>
                                                <span class="number">(1)</span>
                                            </a>
                                        </li>
                                        <li class="catagory-item">
                                            <a href="https://wordpress-theme.spider-themes.net/banca/job_cat/branch-banking/" class="catagory-link">
                                                <span class="text">Branch Banking</span>
                                                <span class="number">(2)</span>
                                            </a>
                                        </li>
                                        <li class="catagory-item">
                                            <a href="https://wordpress-theme.spider-themes.net/banca/job_cat/technology/" class="catagory-link">
                                                <span class="text">Technology</span>
                                                <span class="number">(1)</span>
                                            </a>
                                        </li>
                                    </ul>

                                </div>
                            </div>

                        </div><div id="widgets_job_schedule-2" class="job_sidebar_widget single-sidebar-widget mt-30 widget-border"><div class="widget-title"><h5>Job Schedule</h5></div>
                            <div class="widget-content pt-20 pb-20 pr-20 pl-20">
                                <a href="https://wordpress-theme.spider-themes.net/banca/job_type/full-time/" class="form-check form-check-inline mr-30">
                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="job_type1" value="job_type1">
                                    <label class="form-check-label" for="job_type1">
                                        Full-time                    </label>
                                </a>
                                <a href="https://wordpress-theme.spider-themes.net/banca/job_type/part-time/" class="form-check form-check-inline mr-30">
                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="job_type2" value="job_type2">
                                    <label class="form-check-label" for="job_type2">
                                        Part-time                    </label>
                                </a>
                            </div>

                        </div>
                    </div>
                </div>

                <!-- Right bar -->
                <div class="col-lg-8">

                    <div class="job-post-widget">

                        <div class="sidebar-header d-flex justify-content-between align-items-center mt-4 mt-lg-0">
                            <div class="sidebar-title">
                                <h4 class="wow fadeInRight">08 job offers</h4>
                            </div>
                            <form action="" method="get">
                                <div class="sorting-select wow fadeInLeft me-1">
                                    <select id="sort-select" name="orderby" onchange="document.location.href='?'+this.options[this.selectedIndex].value;" style="display: none;">
                                        <option value="" selected="">SortBy Default</option>
                                        <option value="orderby=date&amp;order=desc">Newest to Oldest</option>
                                        <option value="orderby=date&amp;order=asc">Oldest to Newest</option>
                                        <option value="orderby=title&amp;order=asc">Title Ascending </option>
                                        <option value="orderby=title&amp;order=desc">Title Descending</option>
                                    </select><div class="nice-select" tabindex="0"><span class="current">SortBy Default</span><ul class="list"><li data-value="" class="option selected">SortBy Default</li><li data-value="orderby=date&amp;order=desc" class="option">Newest to Oldest</li><li data-value="orderby=date&amp;order=asc" class="option">Oldest to Newest</li><li data-value="orderby=title&amp;order=asc" class="option">Title Ascending </li><li data-value="orderby=title&amp;order=desc" class="option">Title Descending</li></ul></div>
                                </div>
                            </form>
                        </div>
                        <div class="more_post_ajax">

                            <div class="single-job-post me-1 wow fadeInUp mt-15" data-wow-delay="0.1s">
                                <div class="post-header">
                                    <div>
                                        <h6 class="job-title">
                                            <a href="#">
                                                Accounts Payable/Receivable Manager
                                            </a>
                                        </h6>
                                        <div class="d-flex flex-wrap">
                                            <div class="job-location me-lg-3 me-2">
                                                <i class="icon_pin_alt"></i>
                                                NY, United States
                                            </div>
                                            <div class="job-catagory">
                                                <span>Branch Banking</span> | Full-time
                                            </div>
                                        </div>
                                    </div>
                                    <div class="timestamp">
                                        October 21, 2021
                                    </div>
                                </div>
                                <div class="post-content">
                                    <p>Position Purpose As a Teller at Capital you are the face of the credit union. It's more than just processing financial transactions. It's building lasting relationships...</p>
                                </div>
                            </div>

                        </div>

                        <div class="text-center mt-60 wow fadeInUp load_more">
                            <a href="javascript:void(0)" class="theme-btn theme-btn-outlined load_more_btn" data-page="1">
                                More jobs
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <!----------------------------- Job Mailchimp Form ------------------>
                <div class="col-lg-12">
                    <div class="email-alert-widget bg_white mt-140 wow fadeInUp shadow-lg">
                        <form action="" method="post" class="subscribe">
                            <h2>Get email alerts for the latest Jobs in Bangladesh</h2>
                            <p>You can cancel email alerts at any time.</p>
                            <div class="input-group mt-40">
                                <input type="text" class="form-control" placeholder="Type in your email...">
                                <div class="input-group-append">
                                    <button type="submit" class="theme-btn theme-btn-lg">Set Up Alert</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>


<?php

get_footer();