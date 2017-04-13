<?php
get_header();?>

<style>
.half-column { width:50%; }
</style>
<div class="mkd-content">
    <div class="mkd-content-inner">
        <div class="mkd-container">
            <div class="mkd-container-inner clearfix">
                <div class="white-block-container">
                    <?php the_post_thumbnail(); ?>
                    <?php if ( the_title() != null || the_title() != "" ) : ?>
                    <h2><?php the_title(); ?></h2>
                    <?php endif; ?>
                    <div class="white-block">
                        <div class="half-column" id="message">
                            <h1 class="" style="text-align: center; color: #f79c49; font-size: 2.66667em; padding: 4rem 0rem;">Being healthy just got a lot more fun!</h1>
                            <div class="mdk-sng-pst">
                            <h1 style="text-transform: none; font-size: 1.733em;">Sign Up for Our Free eNewsletter</h1>
                            <div class="mdk-sng-pst"><p>The Evergreen Wellness® eNewsletter delivers a regular dose of inspiration right to your inbox. From engaging articles and videos filled with helpful tips to invitations to exciting events, we’ll make living a healthy lifestyle easier and more fun than you ever dreamed possible.</p></div>
                            </div>
                        </div>
                        <div class="half-column" id="">
                            <h3 class="news-field-cta-title">Get FREE Wellness Tips Delivered!</h3>
                            <div class="news-field-cta-form">
                                <form action="" id="newsletter-landing-page" method="post" class="not-wpcf7-form" enctype="multipart/form-data">
                                    <div class="form-control-wrap side-alert"> </div>
                                    <input type="hidden" name="form_title" value="eNewsletter Sign Up"/>
                                    <div class="form-control-wrap your-email"><input type="email" id="your-email" name="your-email" placeholder=" EMAIL ADDRESS" value="" size="40" /></div>
                                    <div class="form-control-wrap your-zip"><input type="text" id="your-zip" name="your-zip" value="" placeholder=" ZIP CODE" size="40" /></div>
                                    <div class="form-control-wrap your-terms"><input type="checkbox" checked value="" id="news-terms" class="form-control terms" />I accept your<br/><a href="https://myevergreenwellness.com/terms-and-conditions/" target="_blank">Terms &amp; Conditions</a></div>
                                    <div class="form-control-wrap side-submit"><input type="submit" id="enewsletter-submit" value="Sign Me Up!" class="form-control submit" /></div>
                                    <div class="form-control-wrap pop-alert"></div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <script type="text/javascript">
                    jQuery(document).ready(function() {
                        $('#enewsletter-submit').click(function() {
                            var email = $("input#your-email").val();
                            var zip = $("input#your-zip").val();
                            var terms = $("input#news-terms").prop("checked");
                            if ( (email == "") || (zip == "") || (terms == false) ) {
                                $('.pop-alert').html( '<span style="color:#f00;">All fields are required</span>' );
                                return false;
                            }
                            $.ajax({
                                type: "POST",
                                url: "",
                                data: { form_title : 'eNewsletter Sign Up', your_email : email, your_zip : zip },
                                complete: function() {
                                    __ss_noform.push(['form','newsletter-landing-page', 'ba3745d9-b382-4197-b0f2-ed587005b1b7']);
                                    __ss_noform.push(['submit', null, 'ba3745d9-b382-4197-b0f2-ed587005b1b7']);
                                $('#message').html( message );
                                }
                            });
                            return false;
                        });
                    });
                    </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    
<?php
get_footer();
?>