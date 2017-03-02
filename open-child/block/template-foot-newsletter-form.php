<?php if (current_user_can(ACCESS_VILLAGE_CONTENT)): ?>
<?php else: ?>
<div class="widget mkd-rpc-holder">
    <div class="news-field-row clearfix" id="form-container-foot">
        <div class="news-field-cta-title">Get FREE Wellness Tips Delivered!</div>
        <div class="news-field-cta-form">
            <div class="not-wpcf7">
                <form action="" id="news-foot" method="post" class="not-wpcf7-form" enctype="multipart/form-data">
                    <input type="hidden" name="form_title" value="Newsletter CTA"/>
                    <label> Your Email (required)</label><br /><span class="wpcf7-form-control-wrap your-email"><input type="email" id="foot-your-email" name="your-email" value="" size="40" /></span>
                    <label> ZIP Code</label><br /><span class="wpcf7-form-control-wrap your-zip"><input type="text" id="foot-your-zip" name="your-zip" value="" size="40" /></span>
                    <input type="submit" value="Sign Me Up!" id="news-foot-submit" class="wpcf7-form-control wpcf7-submit" />
                </form>
            </div>
        </div>
    </div>
</div>
<script type='text/javascript'>
    jQuery(document).ready(function($) {
        var message = '<h3>Welcome!</h3><h4>Please check your email* for more information. We hope you enjoy Evergreen Wellness.</h4><h5>*If you don\'t see an email from us, please check your spam folder.</h5>';
        $('#news-foot-submit').click(function(e) {
            e.preventDefault();
            var email = $("input#foot-your-email").val();
            var zip = $("input#foot-your-zip").val();
            $.ajax({
                type: "POST",
                url: "",
                data: { form_title : 'Newsletter CTA', your_email : email, your_zip : zip },
                complete: function() {
                    $('#form-container-foot').html( message );
                }
            });
        });
    });
</script>
<?php endif; ?>