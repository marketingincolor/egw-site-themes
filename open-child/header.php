<!DOCTYPE html>
<html <?php language_attributes(); ?>  xmlns:fb="http://ogp.me/ns/fb#">
    <head>
        <?php if( get_option('egw_fb_comments_api_key') ): ?>
            <meta property="fb:app_id" content="<?php echo get_option('egw_fb_comments_api_key'); ?>" />
        <?php endif; ?>
        <?php
        /**
         * @see discussion_header_meta() - hooked with 10
         * @see mkd_user_scalable - hooked with 10
         */
        ?>
        <?php do_action('discussion_header_meta'); ?>
        <?php wp_head(); ?>

        <!-- ADSENSE DFP -->
        <?php if (ENVIRONMENT_MODE == 0) : ?>
        <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
        <script>
          (adsbygoogle = window.adsbygoogle || []).push({
            google_ad_client: "ca-pub-6318619639236633",
            enable_page_level_ads: true
          });
        </script>
        <?php endif; ?>
        <!-- /ADSENSE DFP -->

    </head>
    <body <?php
    if (is_single()) {
        body_class('mkd-apsc-custom-style-enabled');
    } else {
        body_class();
    }
    ?> itemscope itemtype="http://schema.org/WebPage">

        <!-- GOOGLE TAG MANAGER -->
        <?php if (ENVIRONMENT_MODE == 1) { ?>
        <noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-556TBH"
                          height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
        <script>(function (w, d, s, l, i) {
                w[l] = w[l] || [];
                w[l].push({'gtm.start':
                            new Date().getTime(), event: 'gtm.js'});
                var f = d.getElementsByTagName(s)[0],
                        j = d.createElement(s), dl = l != 'dataLayer' ? '&l=' + l : '';
                j.async = true;
                j.src =
                        '//www.googletagmanager.com/gtm.js?id=' + i + dl;
                f.parentNode.insertBefore(j, f);
            })(window, document, 'script', 'dataLayer', 'GTM-556TBH');</script>
        <?php } ?>
        <!-- END GOOGLE TAG MANAGER -->

        <?php discussion_get_side_area(); ?>
        <div class="mkd-wrapper">
            <div class="mkd-wrapper-inner">
                <?php discussion_get_header(); ?>

                <?php if (discussion_options()->getOptionValue('show_back_button') == "yes") { ?>
                    <a id='mkd-back-to-top'  href='#'>
                        <span class="mkd-icon-stack">
                            <?php
                            discussion_icon_collections()->getBackToTopIcon('font_elegant');
                            ?>
                        </span>
                        <span class="mkd-icon-stack-flip">
                            <?php
                            discussion_icon_collections()->getBackToTopIcon('font_elegant');
                            ?>
                        </span>
                    </a>
                <?php } ?>

                <div class="mkd-content" <?php discussion_content_elem_style_attr(); ?>>
                    <div class="mkd-content-inner">
                        <!-- Announcement Notifications -->
                        <?php

                        function wpsefsp_loop() {
                            global $wp_query;
                            $loop = 'notfound';

                            if ($wp_query->is_page) {
                                $loop = is_front_page() ? 'front' : 'page';
                            } elseif ($wp_query->is_home) {
                                $loop = 'home';
                            } elseif ($wp_query->is_single) {
                                $loop = ( $wp_query->is_attachment ) ? 'attachment' : 'single';
                            } elseif ($wp_query->is_category) {
                                $loop = 'category';
                            } elseif ($wp_query->is_tag) {
                                $loop = 'tag';
                            } elseif ($wp_query->is_tax) {
                                $loop = 'tax';
                            } elseif ($wp_query->is_archive) {
                                if ($wp_query->is_day) {
                                    $loop = 'day';
                                } elseif ($wp_query->is_month) {
                                    $loop = 'month';
                                } elseif ($wp_query->is_year) {
                                    $loop = 'year';
                                } elseif ($wp_query->is_author) {
                                    $loop = 'author';
                                } else {
                                    $loop = 'archive';
                                }
                            } elseif ($wp_query->is_search) {
                                $loop = 'search';
                            } elseif ($wp_query->is_404) {
                                $loop = 'notfound';
                            }

                            return $loop;
                        }
                        ?>
                        <div class="announcementcontainer">
                            <?php
                            //Find out current page is what? e.g. page, category or post etc..
                            $getInstantoutput = wpsefsp_loop();

                            //Get current sub-category name
                            global $current_category;
                            $current_category = strtolower(single_cat_title("", false));

                            //Get current page url
                            global $wp;
                            $current_url = home_url(add_query_arg(array(), $wp->request));
                            $current_page = explode('/', $current_url);
                            $getSlug = $current_page[sizeof($current_page) - 1];

                            query_posts(array(
                                'post_type' => 'announcement',
                                'showposts' => 100
                            ));
                            while (have_posts()) : the_post();
                                $value = get_field("display_pages");
                                $announceLink = get_field("announcements_link");
                                foreach ($value as $key => $valuerel) {
                                    if ($getInstantoutput == "front") {
                                        if ($valuerel == "home") {
                                            if ($announceLink != "") {
                                                echo "<div class='annonuce_set'><div class='mkd-grid'><a href=" . $announceLink . "><div class='annonuce_description'>" . get_the_content() . "</div></div></div></a>";
                                            } else {
                                                echo "<div class='annonuce_set'><div class='mkd-grid'><div class='annonuce_description'>" . get_the_content() . "</div></div></div>";
                                            }
                                        }
                                    }
                                    if ($getInstantoutput == "page") {
                                        if ($valuerel == $getSlug) {
                                            if ($announceLink != "") {
                                                echo "<div class='annonuce_set'><div class='mkd-grid'><a href=" . $announceLink . "><div class='annonuce_description'>" . get_the_content() . "</div></div></div></a>";
                                            } else {
                                                echo "<div class='annonuce_set'><div class='mkd-grid'><div class='annonuce_description'>" . get_the_content() . "</div></div></div>";
                                            }
                                        }
                                    }
                                    if ($getInstantoutput == "category") {
                                        if ($valuerel == $current_category) {
                                            if ($announceLink != "") {
                                                echo "<div class='annonuce_set'><div class='mkd-grid'><a href=" . $announceLink . "><div class='annonuce_description'>" . get_the_content() . "</div></div></div></a>";
                                            } else {
                                                echo "<div class='annonuce_set'><div class='mkd-grid'><div class='annonuce_description'>" . get_the_content() . "</div></div></div>";
                                            }
                                        }
                                    }
                                }
                            endwhile;
                            ?>
                            <?php wp_reset_postdata(); ?>
                            <?php wp_reset_query(); ?>
                        </div>
                        <!-- Announcement Notifications End -->
                        <?php discussion_get_content_top(); ?>