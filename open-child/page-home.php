<?php
/**
 * Template Name: home-index page
 * For displaying featured article and showing latest category feeds
 */
?>

<?php
get_header();
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
                get_template_part('block/home-page-banner'); 

                // Show Membership Layout if user has access
                if (current_user_can(ACCESS_SIDEBAR_CONTENT)) { 
                    get_template_part('branch', 'member-sidebar-layout' ); 
                }
                else {
                    get_template_part('branch', 'no-sidebar-layout');
                }
                ?>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>


