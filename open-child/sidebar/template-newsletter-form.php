<?php if (current_user_can(ACCESS_VILLAGE_CONTENT)): ?>
<?php else: ?>
<!--<div class="widget mkd-rpc-holder">
    <div class="news-field-row clearfix">
        <div class="news-field-cta-title">Get FREE Wellness Tips Delivered!</div>
        <div class="news-field-cta-form"><?php //echo do_shortcode('[contact-form-7 id="2971" title="Newsletter CTA"]');?></div>
    </div>
</div>-->
<div class="widget mkd-rpc-holder">
    <div class="news-field-row clearfix">
        <div class="news-field-cta-title">Get FREE Wellness Tips Delivered!</div>
        <div class="news-field-cta-form">
            <div class="not-wpcf7">
                <form action="" method="post" class="not-wpcf7-form" enctype="multipart/form-data">
                    <input type="hidden" name="form_title" value="Newsletter CTA"/>
                    <p><label> Your Email (required)<br /><span class="wpcf7-form-control-wrap your-email"><input type="email" name="your-email" value="" size="40" /></span> </label></p>
                    <p><label> ZIP Code<br /><span class="wpcf7-form-control-wrap your-zip"><input type="text" name="your-zip" value="" size="40" /></span> </label></p>
                    <p><input type="submit" value="Sign Me Up!" class="wpcf7-form-control wpcf7-submit" /></p>
                </form>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>