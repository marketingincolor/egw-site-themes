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
            <div class="not-wpcf7" id="form-container">
                <form action="" id="news-side" method="post" class="not-wpcf7-form" enctype="multipart/form-data">
                    <input type="hidden" name="form_title" value="Newsletter CTA"/>
                    <label> Your Email (required)</label><br /><span class="wpcf7-form-control-wrap your-email"><input type="email" id="your-email" name="your-email" value="" size="40" /></span>
                    <label> ZIP Code</label><br /><span class="wpcf7-form-control-wrap your-zip"><input type="text" id="your-zip" name="your-zip" value="" size="40" /></span>
                    <input type="submit" id="news-side-submit" value="Sign Me Up!" class="wpcf7-form-control wpcf7-submit" />
                </form>
            </div>
        </div>
    </div>
</div>
<script type='text/javascript'>
    jQuery(document).ready(function($) {
        var message = '<h3>Welcome!</h3><h4>Please check your email* for more information. We hope you enjoy Evergreen Wellness.</h4><h5>*If you don\'t see an email from us, please check your spam folder.</h5>';
        $('#news-side-submit').click(function(e) {
            e.preventDefault();
            var email = $("input#your-email").val();
            var zip = $("input#your-zip").val();
            $.ajax({
                type: "POST",
                url: "",
                data: { form_title : 'Newsletter CTA', your_email : email, your_zip : zip },
                complete: function() {
                    $('#form-container').html( message );
                }
            });
        });
    });
</script>
<?php endif; ?>