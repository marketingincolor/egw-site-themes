<?php
/**
 * Purpose - For displaying activity based blogs
 * Template Name: Activity page
 */
?>

<?php get_header(); 
$category='activity';
$member_location = get_egw_member_location();
$tag_not_in = egw_tag_not_in($member_location);
list($post_per_section,$post_type)=scroll_loadpost_settings();
?>
<div class="mkd-content">
    <div class="mkd-content-inner">
        <div class="mkd-full-width">
            <div class="mkd-full-width-inner">               
               <?php
                get_template_part('template-page-featured-content');?>

                <!-- Member Can Access Content -->
                <?php if (current_user_can('access_village_content' )): ?>
                <div class="mkd-container">
                    <div class="mkd-container-inner clearfix">
                        <div class="mkd-two-columns-75-25  mkd-content-has-sidebar clearfix">
                            <div class="mkd-column1 mkd-content-left-from-sidebar">
                                <div class="mkd-column-inner">
                                    <div class="vc_empty_space" style="height: 0px">
                                        <span class="vc_empty_space_inner"></span>
                                    </div> 
                                    <?php
                                    $my_query = null;
                                    $my_query = discussion_custom_category_query($post_type,$category,$post_per_section,$tag_not_in); 
                                    global $wp_query;
                                    get_template_part('block/category-blog-list');   
                                    ?>
                                </div>
                            </div><!-- #content -->
                            <div class="mkd-column2">
                                <div class="mkd-column-inner">
                                    <aside class="mkd-sidebar" style="transform: translateY(0px);">
                                      <div class="widget widget_apsc_widget">  
                                        <div class="vc_empty_space" style="height: 40px"><span class="vc_empty_space_inner"></span></div> 
                                       <?php get_template_part('sidebar/template-sidebar-home'); ?>
                                      </div>    
                                    </aside>
                                </div>
                            </div>
                        </div>
                     </div>
                </div>
                
                <!-- User Not Signed In -->
                <?php else: ?>
                <div style="" class="vc_row wpb_row vc_row-fluid mkd-section mkd-content-aligment-left mkd-grid-section">
                    <div class="mkd-container-inner clearfix">
                        <div class="mkd-section-inner-margin clearfix">
                            <?php
                            $my_query = null;
                            $my_query = discussion_custom_category_query($post_type,$category,$post_per_section, $tag_not_in);      
                            global $wp_query;
                            get_template_part('block/category-blog-list');                             
                            ?>      
                        </div>
                    </div>
                </div>

                <!-- End User Not Signed In -->
              <?php endif; ?>
            </div>
        </div>
    </div>
</div>
   
<?php
/**
 * For loading post based on scrolling
 */

include(locate_template('block/ajax-pagination.php'));   
get_footer(); ?>

