<?php //if (current_user_can(ACCESS_VILLAGE_CONTENT)): ?>
<?php if ( isset($_COOKIE['sswp-contact']) || current_user_can(ACCESS_VILLAGE_CONTENT) ): ?>
<div class="widget mkd-rpc-holder slideshowlink">
<?php else: ?>
<div class="widget mkd-rpc-holder">
<?php endif; ?>
    <div class="news-field-row" id="form-container-side">
        <h3 class="news-field-cta-title">Get FREE Wellness Tips Delivered!</h3>
        <div class="news-field-cta-form">
            <form action="" id="side-news-form" method="post" class="not-wpcf7-form" enctype="multipart/form-data">
                <div class="form-control-wrap side-alert"> </div>
                <input type="hidden" name="form_title" value="Newsletter CTA"/>
                <div class="form-control-wrap your-email"><input type="email" id="your-email" name="your-email" placeholder=" EMAIL ADDRESS" value="" size="40" /></div>
                <div class="form-control-wrap your-zip"><input type="text" id="your-zip" name="your-zip" value="" placeholder=" ZIP CODE" size="40" /></div>
                <div class="form-control-wrap your-terms"><input type="checkbox" checked value="" id="news-side-terms" class="form-control terms" />I accept your<br/><a href="https://myevergreenwellness.com/terms-and-conditions/" target="_blank">Terms &amp; Conditions</a></div>
                <div class="form-control-wrap side-submit"><input type="submit" id="news-side-submit" value="Sign Me Up!" class="form-control submit" /></div>
                <?php //do_shortcode('[ssnfinclude placement="side"]'); ?>
            </form>
        </div>
    </div>
</div>
<?php $ssform = ( ENVIRONMENT_MODE == 0 ) ? '356824fe-d236-4906-82ef-1b24f74637a3' : 'd669f83e-cc9a-42d5-a95e-3efed133e4ca'; ?>
<script type='text/javascript'>
    jQuery(document).ready(function($) {
        var message = '<h3>Welcome!</h3><h4>Please check your email for more information. We hope you enjoy Evergreen Wellness<sup>&reg;</sup>.</h4><h5>If you don\'t see an email from us, please check your spam folder.</h5>';
        $('#news-side-submit').click(function() {
            var email = $("input#your-email").val();
            var zip = $("input#your-zip").val();
            var terms = $("input#news-side-terms").prop("checked");
            if ( (email == "") || (zip == "") || (terms == false) ) {
                $('.side-alert').html( '<span style="color:#f00;">All fields are required</span>' );
                return false;
            }
            $.ajax({
                type: "POST",
                url: "",
                data: { form_title : 'Newsletter CTA', your_email : email, your_zip : zip },
                complete: function() {
                    __ss_noform.push(['form','side-news-form', '<?php echo $ssform; ?>']);
                    __ss_noform.push(['submit', null, '<?php echo $ssform; ?>']);
                    $('#form-container-side').html( message );
                }
            });
            return false;
        });
    });
</script>
<?php //endif; ?>