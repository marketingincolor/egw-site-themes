<?php if (current_user_can(ACCESS_VILLAGE_CONTENT)): ?>
<?php else: ?>
<div class="widget mkd-rpc-holder">
    <div class="news-field-row clearfix">
        <div class="news-field-cta-title">Get FREE Wellness Tips Delivered!</div>
        <div class="news-field-cta-form"><?php echo do_shortcode('[contact-form-7 id="2971" title="Newsletter CTA"]');?></div>
    </div>
</div>
<?php endif; ?>