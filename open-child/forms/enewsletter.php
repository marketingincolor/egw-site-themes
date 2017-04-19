<?php
    $ssform = ( ENVIRONMENT_MODE == 0 ) ? 'ba3745d9-b382-4197-b0f2-ed587005b1b7' : '8c3dc976-1925-4b51-a875-ae8bf4d1e9b0';
?>
<script>
jQuery(document).ready(function($) {
    var message = '</p><h3>Welcome!</h3><h4>Please check your email for more information. We hope you enjoy Evergreen Wellness<sup>&reg;</sup>.</h4><h5>If you don\'t see an email from us, please check your spam folder.</h5><p>';
    $('#news-side-submit-event').click(function() {
        var email = $("input#your-email").val();
        var zip = $("input#your-zip").val();
        var terms = $("input#news-side-terms-event").prop("checked");
        if ( (email == "") || (zip == "") || (terms == false) ) {
            $('.side-alert').html( '<span style="color:#f00;">All fields are required</span>' );
            return false;
        }
        $.ajax({
            type: "POST",
            url: "",
            data: { form_title : 'Newsletter CTA', your_email : email, your_zip : zip },
            complete: function() {
                __ss_noform.push(['form','bottom-events', '<?php echo $ssform; ?>']);
                __ss_noform.push(['submit', null, '<?php echo $ssform; ?>']);
                $('#form-container-side').html( message );
            }
        });
        return false;
    });
});
</script>