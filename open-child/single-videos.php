<?php get_header(); ?>
<div class="mkd-container-inner">
     <?php
    $title_tag        = 'h3';
    $title_length     = '20';
    $display_date     = 'yes';
    $date_format      = 'd. F Y';
    $display_category = 'no';
    $display_share    = 'no';
    $display_count    = 'yes';
    $display_comments = 'yes';
    ?>

    <div class="mkd-two-columns-75-25 mkd-content-has-sidebar clearfix">
        <div class="mkd-blog-holder mkd-column1 mkd-content-left-from-sidebar mkd-blog-single mkd-fsp-blog-holder">
            <div class="mkd-column-inner">
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <div class="mkd-post-content">
                        <?php get_template_part('block/template-single-video-block'); ?>
                    </div>
                    <?php do_action('discussion_before_blog_article_closed_tag'); ?>
                </article>
                <div class="single-article-video-fsp-info">
                    <!-- Post Info -->
                    <article>
                        <div class="mkd-post-info">
                            <?php
                            discussion_post_info(array(
                                'date'     => $display_date,
                                'count'    => $display_count,
                                'category_singlepost' => $display_category_singlepost,
                            ))
                            ?>
                            <div class="mkd-post-fsp-savestories">
                            <?php
                                customized_saved_stories();
                            ?>
                            </div>
                        </div>
                    </article>
                </div>
            </div>
            <div class="mkd-column-inner">
                <div class="mkd-blog-holder mkd-blog-single">
                    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                        <div class="mkd-post-content">
                            <div class="mkd-post-text">
                                <div class="mkd-post-text-inner clearfix">
                                    <?php discussion_get_module_template_part('templates/single/parts/title', 'blog'); ?>
                                    <div class="mdk-sng-pst">
                                    <?php the_content(); ?>
                                    <?php echo do_shortcode('[egw-learn-more]' ); ?>
                                    <?php do_action('last_updated'); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php do_action('discussion_before_blog_article_closed_tag'); ?>
                    </article>
                    <?php include(locate_template('block/get-post-author.php')); ?>

                    <?php
                    $tm_disclaim = get_field('trademark_disclaimer'); //set via Custom Fields Plugin
                    if ($tm_disclaim) {
                        include(locate_template('block/show-trademark-disclaimer.php'));
                    } ?>

                    <div class="disclamier">
                        <p><span>Disclaimer:</span> This content is for entertainment purposes only and it is not meant to be relied on as medical advice, diagnosis, or treatment. Consult your physician before starting any exercise or dietary program or taking any other action respecting your health. In case of a medical emergency, call 911.</p>
                    </div>
                </div>
                <?php if (function_exists('the_tags')) { ?>
                    <div class="mkd-single-tags-holder">
                        <span class="mkd-single-tags-title"><strong>Tags: </strong></span>
                        <div class="mkd-tags">
                            <?php the_tags('', ' ', ''); ?><br />
                        </div>
                    </div>
                <?php } ?>
                <?php egw_pre_footer(); ?>
                <?php get_template_part('sidebar/template-ads-mobile'); ?>
                <div class="fsp-recommended-stories-cont">
                <?php echo do_shortcode('[AuthorRecommendedPosts]'); ?>
                </div>

                <!-- Show Facebook Comments or WP Comments-->
                <?php if( get_option('egw_fb_comments_single_videos') && get_option('egw_fb_comments_api_key' ) ): ?>
                    <div class="fb-comments" data-href="<?php the_permalink();?>" data-numposts="10" data-width="100%" data-colorscheme="light"></div>
                <?php else:
                    get_template_part('block/comments-guidelines');
                    comments_template('', true);
                endif; ?>
                <!-- /Show Facebook Comments or WP Comments -->
                
            </div>
        </div>
        <div class="mkd-column2">
            <div class="mkd-column-inner">
                <aside class="mkd-sidebar" style="transform: translateY(0px);">
                    <?php get_template_part('sidebar/template-sidebar-single'); ?>
                </aside>
            </div>
        </div>
    </div> <!-- mkd-two-columns-75-25  mkd-content-has-sidebar clearfix -->
</div> <!-- mkd-container-inner -->
<?php get_footer(); ?>