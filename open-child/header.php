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

        <!-- PINTEREST -->
        <meta name="p:domain_verify" content="4f03e837a6f1a3a03dac63b1c78dbc93"/>
        <!-- /PINTEREST -->
        
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">
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

        <?php if(is_single( 'agent-orange' )) : ?>
            <div class="ao_wrapper">
        <?php endif; ?>
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
                                // foreach ($value as $key => $valuerel) {
                                //     if ($getInstantoutput == "front") {
                                //         if ($valuerel == "home") {
                                //             if ($announceLink != "") {
                                //                 echo "<div class='annonuce_set'><div class='mkd-grid'><a href=" . $announceLink . "><div class='annonuce_description'>" . get_the_content() . "</div></div></div></a>";
                                //             } else {
                                //                 echo "<div class='annonuce_set'><div class='mkd-grid'><div class='annonuce_description'>" . get_the_content() . "</div></div></div>";
                                //             }
                                //         }
                                //     }
                                //     if ($getInstantoutput == "page") {
                                //         if ($valuerel == $getSlug) {
                                //             if ($announceLink != "") {
                                //                 echo "<div class='annonuce_set'><div class='mkd-grid'><a href=" . $announceLink . "><div class='annonuce_description'>" . get_the_content() . "</div></div></div></a>";
                                //             } else {
                                //                 echo "<div class='annonuce_set'><div class='mkd-grid'><div class='annonuce_description'>" . get_the_content() . "</div></div></div>";
                                //             }
                                //         }
                                //     }
                                //     if ($getInstantoutput == "category") {
                                //         if ($valuerel == $current_category) {
                                //             if ($announceLink != "") {
                                //                 echo "<div class='annonuce_set'><div class='mkd-grid'><a href=" . $announceLink . "><div class='annonuce_description'>" . get_the_content() . "</div></div></div></a>";
                                //             } else {
                                //                 echo "<div class='annonuce_set'><div class='mkd-grid'><div class='annonuce_description'>" . get_the_content() . "</div></div></div>";
                                //             }
                                //         }
                                //     }
                                // }
                            endwhile;
                            ?>
                            <?php wp_reset_postdata(); ?>
                            <?php wp_reset_query(); ?>
                        </div>
                        <!-- Announcement Notifications End -->
                        <?php discussion_get_content_top(); ?>