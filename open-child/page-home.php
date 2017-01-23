<?php
/**
 * Template Name: home-index page
 * For displaying featured article and showing latest category feeds
 */
?>

<?php get_header();
list($post_per_section, $post_type) = scroll_loadpost_settings();
$category = 'feature-home';
$my_query = null;
$subcat_id_ar = array();
$cat_id_ar = get_main_category_detail();
$total_subcat_posts = 0;
$merged_new_ar = array();
$member_location = get_egw_member_location();
$tag_not_in = egw_tag_not_in($member_location);
/* for showing post type feeds with feature category as home banner image */
?>

<div class="mkd-content">
    <div class="mkd-content-inner">
        <div class="mkd-full-width">
            <div class="mkd-full-width-inner">
                <?php
                if ($_REQUEST['redirect'] == "success") {
                    get_template_part('block/register-success');
                }
                get_template_part('block/home-page-banner'); ?>
                <?php if (current_user_can(ACCESS_SIDEBAR_CONTENT)) : ?> 
                <div class="mkd-container">
                    <div class="mkd-container-inner clearfix">
                        <div class="mkd-two-columns-75-25 mkd-content-has-sidebar clearfix">
                            <div class="mkd-column1 mkd-content-left-from-sidebar">
                                <div class="mkd-column-inner">
                                <?php $my_query = discussion_custom_categorylist_query($post_type, $cat_id_ar, $post_per_section, $tag_not_in);
                                if (empty($subcat_id_ar)) {
                                    global $wp_query;
                                    get_template_part('block/category-blog-list');   
                                }
                                ?>
                                </div>
                            </div>
                            <div class="mkd-column2">
                                <div class="mkd-column-inner">
                                    <div class="vc_empty_space" style="height: 40px"><span class="vc_empty_space_inner"></span></div>
                                    <aside class="mkd-sidebar" style="transform: translateY(0px);">
                                        <div class="widget widget_apsc_widget">   
                                            <?php get_template_part('sidebar/template-sidebar-home'); ?>
                                        </div>    
                                    </aside>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php else : ?>
                <div style="" class="vc_row wpb_row vc_row-fluid mkd-section mkd-content-aligment-left mkd-grid-section">
                    <div class="mkd-container-inner clearfix">
                        <div class="mkd-section-inner-margin clearfix">
                        <?php $my_query = discussion_custom_categorylist_query($post_type, $cat_id_ar, $post_per_section);
                        if (empty($subcat_id_ar)) {
                            global $wp_query;
                            get_template_part('block/category-blog-list');   
                        }
                        ?>
                        </div>
                    </div>
                </div>
                <?php endif; ?>

            </div>
        </div>
    </div>
</div>

<?php 
include(locate_template('block/ajax-pagination.php'));
get_footer(); ?>


