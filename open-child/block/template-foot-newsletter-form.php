<?php if (current_user_can(ACCESS_VILLAGE_CONTENT)): ?>
<?php else: ?>
<div class="widget mkd-rpc-holder">
    <div class="news-field-row clearfix egw-show-for-large-up" id="form-container-foot">
        <h3 class="news-field-cta-title">Get FREE Wellness Tips Delivered!</h3>
        <div class="news-field-cta-form">
            <form action="" id="foot-news-form" method="post" class="not-wpcf7-form" enctype="multipart/form-data">
                <div class="form-control-wrap foot-alert"> </div>
                <input type="hidden" name="form_title" value="Newsletter CTA"/>
                <div class="form-control-wrap your-email"><input type="email" id="foot-your-email" name="your-email" placeholder=" EMAIL ADDRESS" value="" size="40" /></div>
                <div class="form-control-wrap your-zip"><input type="text" id="foot-your-zip" name="your-zip" placeholder=" ZIP CODE" value="" size="40" /></div>
                <div class="form-control-wrap your-terms"><input type="checkbox" checked value="terms" id="news-foot-terms" class="form-control terms" />I accept your <a href="https://myevergreenwellness.com/terms-and-conditions/" target="_blank">Terms &amp; Conditions</a></div>
                <div class="form-control-wrap foot-submit"><input type="submit" value="Sign Me Up!" id="news-foot-submit" class="form-control submit" /></div>
                <?php //do_shortcode('[ssnfinclude placement="foot"]'); ?>
            </form>
        </div>
    </div>
</div>
<script type='text/javascript'>
    jQuery(document).ready(function($) {
        var message = '<h3>Welcome!</h3><h4>Please check your email* for more information. We hope you enjoy Evergreen Wellness.</h4><h5>*If you don\'t see an email from us, please check your spam folder.</h5>';
        $('#news-foot-submit').click(function() {
            var email = $("input#foot-your-email").val();
            var zip = $("input#foot-your-zip").val();
            var terms = $("input#news-foot-terms").prop("checked");
            if ( (email == "") || (zip == "") || (terms == false) ) {
                $('.foot-alert').html( '<span style="color:#f00;">All fields are required</span>' );
                return false;
            }
            $.ajax({
                type: "POST",
                url: "",
                data: { form_title : 'Newsletter CTA', your_email : email, your_zip : zip },
                complete: function() {
                    __ss_noform.push(['form','foot-news-form', 'ba3745d9-b382-4197-b0f2-ed587005b1b7']);
                    __ss_noform.push(['submit', null, 'ba3745d9-b382-4197-b0f2-ed587005b1b7']);
                    $('#form-container-foot').html( message );
                }
            });
            return false;
        });
    });
</script>
<?php endif; ?>