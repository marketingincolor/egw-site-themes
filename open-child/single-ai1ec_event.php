<?php get_header(); ?>

    <div class="mkd-container-inner"> 
        <?php
        $title_tag = 'h3';
        $title_length = '20';
        $display_date = 'yes';
        $date_format = 'd. F Y';
        $display_category = 'yes';
        $display_category_singlepost = 'no';
        $save_stories = 'yes';
        $display_comments = 'yes';
        $display_share = 'yes';
        $display_count = 'yes';
        $display_excerpt = 'yes';
        $thumb_image_width = '';
        $thumb_image_height = '';
        $thumb_image_size = '150';
        $excerpt_length = '12';
        ?>
        <?php if (has_post_thumbnail()) { ?>
            <div class="mkd-blog-holder mkd-blog-single">
                <?php ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <div class="mkd-post-content">
                        <?php if (has_post_thumbnail()) { ?>
                            <div class="mkd-post-image-area">
                                <?php discussion_post_info_category(array('category' => 'no')) ?>
                                <?php discussion_get_module_template_part('templates/single/parts/image', 'blog'); ?>
                               <div class="mkd-post-info">
                                    <?php
                                    discussion_post_info(array(
                                        'date' => $display_date,
                                        'category_singlepost' => $display_category_singlepost,
                                        'save_stories' => $save_stories,
                                    ))
                                    ?>
                                </div>

                            </div>
                        <?php } ?>
                    </div>
                    <?php do_action('discussion_before_blog_article_closed_tag'); ?>
                </article>
            </div>
        <?php } ?>
        <div class="mkd-two-columns-75-25  mkd-content-has-sidebar clearfix">
            <div class="mkd-column1 mkd-content-left-from-sidebar">
                <div class="mkd-column-inner">
                    <div class="mkd-blog-holder mkd-blog-single">
                        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                            <div class="mkd-post-content">
                                <div class="mkd-post-text">
                                    <div class="mkd-post-text-inner clearfix">
                                        <?php if (!has_post_thumbnail()) { ?>
                                            <div class="mkd-post-info">
                                                <?php
//                                                discussion_post_info(array(
//                                                    'comments' => $display_comments,
//                                                    'count' => $display_count,
//                                                    'date' => $display_date,
//                                                    'author' => $display_author,
//                                                    'like' => $display_like,
//                                                    'category' => $display_category
//                                                ));
                                                ?>
                                            </div>
                                        <?php } ?>
                                        <h1 itemprop="name" class="entry-title mkd-post-title event-title"><?php the_title(); ?></h1>
                                        <?php the_content(); ?>

                                        <!-- eNewsletter FORM -->
<!--                                         <div id="form-container-side" class="news-field-row event-enewsletter-form">
                                        <h3 class="news-field-cta-title">Get FREE Wellness Tips Delivered!</h3>
                                            <div class="news-field-cta-form-event">
                                                <form id="bottom-events" class="not-wpcf7-form" action="" enctype="multipart/form-data" method="post">
                                                    <div class="form-control-wrap side-alert">&nbsp;</div>
                                                    <input name="form_title" type="hidden" value="Newsletter CTA">
                                                    <div class="form-control-wrap your-email">
                                                        <div class="vc_row">
                                                            <input class="vc_col-xs-8 vc_col-xs-offset-2" id="your-email" name="your-email" size="40" type="email" value="" placeholder=" EMAIL ADDRESS">
                                                        </div>
                                                    </div>
                                                    <div class="vc_row">
                                                        <div class="form-control-wrap your-zip-event">
                                                                <input class="vc_col-xs-8 vc_col-xs-offset-2 vc_col-md-4 vc_col-md-offset-2" id="your-zip" name="your-zip" size="40" type="text" value="" placeholder=" ZIP CODE">
                                                        </div>
                                                        <div class="vc_col-xs-8 vc_col-xs-offset-2 vc_col-md-4 vc_col-md-offset-0">
                                                            <div class="form-control-wrap your-terms-event">
                                                                <input id="news-side-terms-event" class="form-control terms" checked="checked" type="checkbox" value="" style="display:initial;">I accept your
                                                                <a href="https://myevergreenwellness.com/terms-and-conditions/" target="_blank">Terms &amp; Conditions</a>
                                                            </div>
                                                        </div>
                                                        <div class="vc_col-xs-12">
                                                            <input id="news-side-submit-event" class="form-control submit" type="submit" value="Sign Me Up!" style="margin-top:1rem;">
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div> -->
                                        <!-- /eNewsletter FORM -->
                                        <!-- eNewsletter FORM -->
                                        <div id="form-container-side" class="news-field-row">
                                        <h3 class="news-field-cta-title">Get FREE Wellness Tips Delivered!</h3>
                                            <div class="news-field-cta-form">
                                                <form id="bottom-events" class="not-wpcf7-form" action="" enctype="multipart/form-data" method="post">
                                                    <div class="form-control-wrap side-alert">&nbsp;</div>
                                                    <input name="form_title" type="hidden" value="Newsletter CTA">
                                                    <div class="form-control-wrap your-email">
                                                    <input id="your-email" name="your-email" size="40" type="email" value="" placeholder=" EMAIL ADDRESS"></div>
                                                    <div class="form-control-wrap your-zip">
                                                    <input id="your-zip" name="your-zip" size="40" type="text" value="" placeholder=" ZIP CODE"></div>
                                                    <div class="form-control-wrap your-terms-event">
                                                    <input id="news-side-terms-event" class="form-control terms" checked="checked" type="checkbox" value="">I accept your
                                                    <a href="https://myevergreenwellness.com/terms-and-conditions/" target="_blank">Terms &amp; Conditions</a></div>
                                                    <div class="form-control-wrap side-submit">
                                                    <input id="news-side-submit-event" class="form-control submit" type="submit" value="Sign Me Up!"></div>
                                                </form>
                                            </div>
                                        </div>
                                        <!-- /eNewsletter FORM -->

                                    </div>
                                </div>
                            </div>
                        </article>
                        <?php
                        //$post_format = get_post_format();

                        if ($post_format === false) {
                            $post_format = 'standard';
                        }

                        $params = array();

                        $display_category = 'yes';
                        if (discussion_options()->getOptionValue('blog_single_category') !== '') {
                            $display_category = discussion_options()->getOptionValue('blog_single_category');
                        }

                        $display_date = 'yes';
                        if (discussion_options()->getOptionValue('blog_single_date') !== '') {
                            $display_date = discussion_options()->getOptionValue('blog_single_date');
                        }

                        $display_author = 'no';
                        if (discussion_options()->getOptionValue('blog_single_author') !== '') {
                            $display_author = discussion_options()->getOptionValue('blog_single_author');
                        }

                        $display_comments = 'yes';
                        if (discussion_options()->getOptionValue('blog_single_comment') !== '') {
                            $display_comments = discussion_options()->getOptionValue('blog_single_comment');
                        }

                        $display_like = 'no';
                        if (discussion_options()->getOptionValue('blog_single_like') !== '') {
                            $display_like = discussion_options()->getOptionValue('blog_single_like');
                        }

                        $display_count = 'no';
                        if (discussion_options()->getOptionValue('blog_single_count') !== '') {
                            $display_count = discussion_options()->getOptionValue('blog_single_count');
                        }

                        $params['display_category'] = $display_category;
                        $params['display_date'] = $display_date;
                        $params['display_author'] = $display_author;
                        $params['display_comments'] = $display_comments;
                        $params['display_like'] = $display_like;
                        $params['display_count'] = $display_count;

                        discussion_get_module_template_part('templates/single/post-formats/' . $post_format, 'blog', '', $params);

                        discussion_get_module_template_part('templates/single/parts/tags', 'blog');
                        //discussion_get_module_template_part('templates/single/parts/single-navigation', 'blog');
                        // discussion_get_module_template_part('templates/single/parts/author-info', 'blog');
                        //discussion_get_single_related_posts();
                        ?>
                        <div class="fsp-recommended-stories-cont">
                            <?php echo do_shortcode('[AuthorRecommendedPosts]'); ?>
                        </div>
                        <?php
                        if (discussion_show_comments()) {
                            comments_template('', true);
                        }
                        ?>
                    </div>
                </div>
            </div>
            <div class="mkd-column2">
                <div class="mkd-column-inner">
                    <aside class="mkd-sidebar" style="transform: translateY(0px);">
                            <?php get_template_part('sidebar/template-upcoming-events'); ?>
                    </aside>
                </div>
            </div>
        </div>
    </div>

    <?php $ssform = ( ENVIRONMENT_MODE == 0 ) ? 'ba3745d9-b382-4197-b0f2-ed587005b1b7' : '8c3dc976-1925-4b51-a875-ae8bf4d1e9b0'; ?>
    <!-- If certain event page add enewsletter form -->
    <script type="text/javascript">
    jQuery(document).ready(function($) {
        var message = '</p><h3>Welcome!</h3><h4>Please check your email for more information. We hope you enjoy Evergreen Wellness<sup>&reg;</sup>.</h4><h5>If you don\'t see an email from us, please check your spam folder.</h5><p>';
        $('#news-side-submit-event').click(function() {
            var email = $("input#your-email").val();
            console.log(email);
            var zip = $("input#your-zip").val();
            console.log(zip);
            var terms = $("input#news-side-terms-event").prop("checked");
            console.log(terms);
            if ( (email == "") || (zip == "") || (terms == false) ) {
                $('.side-alert').html( '<span style="color:#f00;">All fields are required</span>' );
                return false;
            }
            $.ajax({
                type: "POST",
                url: "",
                data: { form_title : 'Newsletter CTA', your_email : email, your_zip : zip },
                complete: function() {
                    __ss_noform.push(['form','bottom-events', '<?php echo $ssform; ?>']);
                    __ss_noform.push(['submit', null, '<?php echo $ssform; ?>']);
                    $('#form-container-side').html( message );
                }
            });
            return false;
        });
    });
</script>

<?php get_footer(); ?>