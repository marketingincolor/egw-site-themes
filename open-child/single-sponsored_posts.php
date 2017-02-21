<?php get_header(); ?>
<div class="mkd-container-inner">
    <?php
    $title_tag = 'h3';
    $title_length = '20';
    $display_date = 'yes';
    $date_format = 'd. F Y';
    $display_category = 'yes';
    $display_category_singlepost = 'yes';
    $display_comments = 'yes';
    $display_share = 'yes';
    $display_count = 'yes';
    $display_excerpt = 'yes';
    $thumb_image_width = '';
    $thumb_image_height = '';
    $thumb_image_size = '150';
    $excerpt_length = '12';
    $post_author_id = get_post_field( 'post_author', $post_id );
    $company_name = get_the_author_meta( 'egwsp_company_name', $post_author_id );
    $company_website = get_the_author_meta( 'egwsp_company_website', $post_author_id );
    $custom_avatar_meta_data = get_user_meta($post_author_id, 'custom_avatar');

    if (isset($custom_avatar_meta_data) && !empty($custom_avatar_meta_data[0])) {
        $attachment = wp_get_attachment_image_src($custom_avatar_meta_data[0]);
    }

    ?>
    <div class="mkd-two-columns-75-25 mkd-content-has-sidebar clearfix">
        <div class="mkd-blog-holder mkd-column1 mkd-content-left-from-sidebar mkd-blog-single mkd-fsp-blog-holder">
            <div class="mkd-column-inner">
                <?php ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <div class="mkd-post-content">
                        <?php if (has_post_thumbnail()) { ?>
                            <div class="mkd-post-image-area">
                                <?php discussion_post_info_category(array('category' => 'no')) ?>
                                <?php

                                $display_custom_feature_image_width = '';
                                if(discussion_options()->getOptionValue('blog_single_feature_image_max_width') !== ''){
                                    $display_custom_feature_image_width = intval(discussion_options()->getOptionValue('blog_single_feature_image_max_width'));
                                }
                                ?>
                                <?php if ( has_post_thumbnail() ) { ?>
                                    <div class="mkd-post-image">
                                        <?php if($display_custom_feature_image_width !== '') {
                                            the_post_thumbnail(array($display_custom_feature_image_width, 0));
                                        } else {
                                            the_post_thumbnail('discussion_post_feature_image');
                                        } ?>
                                    </div>
                                <?php } ?>
                            </div>
                        <?php } ?>
                    </div>
                    <?php do_action('discussion_before_blog_article_closed_tag'); ?>
                </article>
                <div class="single-article-fsp-info">
                    <article>
                        <div class="mkd-post-info">
                            <?php
                            discussion_post_info(array(
                                'date' => $display_date,
                                'category_singlepost' => $display_category_singlepost
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
                                <?php if (!has_post_thumbnail()) { ?>
                                    <div class="mkd-post-info">
                                        <?php
                                        discussion_post_info(array(
                                            'comments' => $display_comments,
                                            'count' => $display_count,
                                            'date' => $display_date,
                                            'author' => $display_author,
                                            'like' => $display_like,
                                            'category' => $display_category
                                        ));
                                        ?>
                                    </div>
                                <?php } ?>
                                <?php discussion_get_module_template_part('templates/single/parts/title', 'blog'); ?>

                                <!-- SPONSORED CONTENT BLOCK -->
                                <div class="post-top">
                                    <img id="sponsored-img-top" src="<?php echo $attachment[0]; ?>" width="50" height="50" style="vertical-align: middle;"/>
                                    <p style="display:inline-block;">Sponsored Content By <a href="<?php echo $company_website; ?>"><?php echo $company_name ?></a></p>
                                </div>
                                <!-- /SPONSORED CONTENT BLOCK -->

                                    <div class="mdk-sng-pst">
                                    <?php the_content(); ?>
                                    <?php echo do_shortcode('[egw-learn-more]' ); ?>
                                    <?php do_action('last_updated'); ?>
                                    <span class="egw-sponsored-bottom text-center"><hr class="product-separator" /><img id="sponsored-img-bottom" src="<?php echo $attachment[0]; ?>" width="100" height="100"/><br/>Content for this post is provided by <?php echo $company_name; ?></span>
                                    <span class="text-center block">Find out more about our <a href="#">Sponsor Content</a></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </article>
                <?php include(locate_template('block/get-post-author.php')); ?>

                <?php
                $tm_disclaim = get_field('trademark_disclaimer'); //set via Custom Fields Plugin
                if ($tm_disclaim) {
                    include(locate_template('block/show-trademark-disclaimer.php'));
                } ?>

                <div class="disclamier">
                    <p><span>Disclaimer:</span> This content is for entertainment purposes only and it is not meant to be relied on as medical advice, diagnosis, or treatment. Consult your physician before starting any exercise or dietary program or taking any other action respecting your health. In case of a medical emergency, call 911. </p>
                </div>
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
                $params['display_date']     = $display_date;
                $params['display_author']   = $display_author;
                $params['display_comments'] = $display_comments;
                $params['display_like']     = $display_like;
                $params['display_count']    = $display_count;

                discussion_get_module_template_part('templates/single/post-formats/' . $post_format, 'blog', '', $params);

                //discussion_get_module_template_part('templates/single/parts/tags', 'blog');
                //discussion_get_module_template_part('templates/single/parts/single-navigation', 'blog');
                // discussion_get_module_template_part('templates/single/parts/author-info', 'blog');
                //discussion_get_single_related_posts();
                ?>
                <?php if (function_exists('the_tags')) { ?>
                    <div class="mkd-single-tags-holder">
                        <span class="mkd-single-tags-title"><strong>Tags: </strong></span>
                        <div class="mkd-tags">
                            <?php the_tags('', ' ', ''); ?><br />
                        </div>
                    </div>
                <?php } ?>
                <?php get_template_part('sidebar/template-ads-mobile'); ?>
                <div class="fsp-recommended-stories-cont">
                    <?php echo do_shortcode('[AuthorRecommendedPosts]'); ?>
                </div>
                <?php
                   get_template_part('block/comments-guidelines');
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
                    <?php get_template_part('sidebar/template-sidebar-single'); ?>
                </aside>
            </div>
        </div>
    </div> <!-- mkd-two-columns-75-25  mkd-content-has-sidebar clearfix -->
</div> <!-- mkd-container-inner -->
<?php get_footer(); ?>
