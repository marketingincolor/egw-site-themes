<?php get_template_part( 'sidebar/template-welcome-to-villages', 'page' ); ?>
<?php get_template_part( 'sidebar/template-newsletter-form', 'page' ); ?>
<?php if (!is_user_logged_in()): ?>
<div class="widget">
	<a href="https://www.youtube.com/c/MyEvergreenWellness?sub_confirmation=1" target="_blank"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/youtube-sidebar-evergreen-wellness.jpg" alt="Evergreen Wellness YouTube Channel"></a>
</div>
<?php endif; ?>
<?php get_template_part( 'sidebar/template-ads', 'page' ); ?>
<?php get_sidebar(); ?>
<?php get_template_part( 'sidebar/template-local-events', 'page' ); ?>
<?php //get_template_part( 'sidebar/template-local-news-stories', 'page' ); ?>
<?php //get_template_part( 'sidebar/template-recent-comments', 'page' ); ?>
<?php //get_template_part( 'sidebar/template-featured-personalities', 'page' ); ?>
