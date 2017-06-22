<?php
$url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$member_location = get_egw_member_location();
$tag_not_in = egw_tag_not_in($member_location);
list($post_per_section,$post_type)=scroll_loadpost_settings();
?>
<!-- <script>
    jQuery('li.welcome-my-pop a').magnificPopup({
        callbacks: {
            ajaxContentAdded: function () {
                var blog_id = jQuery('#current-blog').text();
                jQuery("#findavillage option[id='" + blog_id + "']").remove();
            }
        },
        type: 'ajax',
        ajax: {
            settings: null, // Ajax settings object that will extend default one - http://api.jquery.com/jQuery.ajax/#jQuery-ajax-settings
            // For example:
            // settings: {cache:false, async:false}
            cursor: 'mfp-ajax-cur', // CSS class that will be added to body during the loading (adds "progress" cursor)
            tError: '<a href="%url%">The content</a> could not be loaded.' //  Error message, can contain %curr% and %total% tags if gallery is enabled
        },
        closeOnBgClick: false
    });
</script> -->

<script>
    // Email form validation
    function validate_popupform() {
        var valreturn = 0;
        var emailRegex = /^[A-Za-z0-9._]*\@[A-Za-z]*\.[A-Za-z]{2,5}$/;
        var emailaddress = document.selectedArticleform.emailaddress.value,
                comments = document.selectedArticleform.comments.value;
        document.getElementById("errorBox-email").innerHTML = " ";
        document.getElementById("errorBox-comments").innerHTML = " ";
        if (emailaddress == "")
        {
            document.selectedArticleform.emailaddress.focus();
            document.getElementById("errorBox-email").innerHTML = "Enter the email address";
            return false;
        } else {
            //this validates all the emails that are seperated by a comma
            var emailArray = emailaddress.split(",");
            for (i = 0; i <= (emailArray.length - 1); i++) {
                if (checkEmail(emailArray[i])) {
                    //Do what ever with the email.
                } else {
                    document.getElementById("errorBox-email").innerHTML = "Send to one email at a time.";
                    return false;
                }
            }

        }
        if (comments == "")
        {
            document.selectedArticleform.emailaddress.focus();
            document.getElementById("errorBox-comments").innerHTML = "A personal message from you is required.";
            return false;
        }
        return true;
    }
    //this validates all the emails that are seperated by a comma
    function checkEmail(email) {
        var regExp = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9\-\.])+\.([A-Za-z]{2,4})$/;
        return regExp.test(email);
    }
    // jQuery('.f-newsletter').magnificPopup({
    //     type: 'ajax',
    //     ajax: {
    //         settings: null, // Ajax settings object that will extend default one - http://api.jquery.com/jQuery.ajax/#jQuery-ajax-settings
    //         // For example:
    //         // settings: {cache:false, async:false}

    //         cursor: 'mfp-ajax-cur', // CSS class that will be added to body during the loading (adds "progress" cursor)
    //         tError: '<a href="%url%">The content</a> could not be loaded.' //  Error message, can contain %curr% and %total% tags if gallery is enabled
    //     },
    //     closeOnBgClick: false
    // });


    jQuery(document).on('click', '#myevergreen', function () {
        if (jQuery("#findavillage").val() == "") {
            return false;
        } else {
            window.open(jQuery("#findavillage").val(), "_self");
            jQuery('.f-newsletter').magnificPopup('close');


        }
    });
    //pop email - cancel button
    jQuery(document).on('click', '.fsp_cancel_btn_pop', function () {
        jQuery.magnificPopup.close();
        jQuery("#savedArticles").trigger('reset');
        return false;
    });
    //pop email - close button
    jQuery(document).on('click', '.mfp-close', function () {
        jQuery.magnificPopup.close();
        //location.reload();
        jQuery("#savedArticles").trigger('reset');
        return false;
    });
    //pop email - send button
    jQuery('#successmsg').hide();
    jQuery(document).on('click', '#emailsend', function () {
        var isValidated = validate_popupform();

        if (isValidated == true) {
            var name = jQuery("#enquiryForm").val();
            var dataString = jQuery('#enquiryForm').serialize();


            jQuery.ajax({
                type: "POST",
                url: "<?php echo bloginfo('wpurl'); ?>/wp-admin/admin-ajax.php",
                data: {
                    action: 'saved_articles_popup_email',
                    emaildata: dataString,
                },
                success: function (result) {
                    jQuery('.form-group').hide();
                    jQuery('#successmsg').show();
                    jQuery('#successmsg>h3').html(result);
                }
            });


        }
        return false;
    });
    //pop email - selected article close button
    jQuery(document).on('click', '.ion-android-close', function () {
        var x;
        if (confirm("Do you want to remove this article?") == true) {
            jQuery('#element_' + this.id).remove();
        } else {

        }
    });

    jQuery(document).ready(function () {
        jQuery('#openEnquiryForm').click(function () {
            //console.log(jQuery('#savedArticles').serialize());
            //validation

            var values = jQuery('input:checkbox:checked.save-article-checkbox').map(function () {
                return this.value;
            }).get(); // ["18", "55", "10"]

            if (values.length == 0) {
                alert('You must check at least one box!');
                return false; // The form will *not* submit
            } else { //alert(values.length);
                jQuery.ajax({
                    type: "POST",
                    url: "<?php echo bloginfo('wpurl'); ?>/wp-admin/admin-ajax.php",
                    data: {
                        action: 'saved_articles_load_popup',
                        offset: jQuery('#savedArticles').serialize(),
                    },
                    success: function (data) {
                        jQuery.magnificPopup.open({
                            type: 'inline',
                            items: {
                                src: data
                            },
                            closeOnBgClick: false,
                            callbacks: {
                                open: function () {
                                    jQuery(window).scroll(function () {
                                        return false;
                                    });
                                    jQuery('html, body').addClass('mfp-overflow');
                                    jQuery('#enquiryForm').find('.fsp-saved-articles-pop').getNiceScroll().show();
                                    jQuery('#enquiryForm').find('.fsp-saved-articles-pop').niceScroll({cursorcolor: "#e8882e", autohidemode: false});
                                    jQuery('#enquiryForm').find('.fsp-saved-articles-pop').getNiceScroll().hide();
                                },
                                close: function () {
                                    jQuery(window).unbind('scroll');
                                    jQuery('html, body').removeClass('mfp-overflow');
                                    jQuery('#enquiryForm').find('.fsp-saved-articles-pop').getNiceScroll().hide();
                                }
                            }
                        });
                    }
                });
            }
        });

        //cancel button 
    });
</script>

<?php
/** Newesletter CTA 
* Cookie data set via PHP and manipulated with both PHP and JS as needed
*
* SharpSpring DEV code: ba3745d9-b382-4197-b0f2-ed587005b1b7
* SharpSpring PROD code: 8c3dc976-1925-4b51-a875-ae8bf4d1e9b0
* 
*/
$ssform = ( ENVIRONMENT_MODE == 0 ) ? 'ba3745d9-b382-4197-b0f2-ed587005b1b7' : '8c3dc976-1925-4b51-a875-ae8bf4d1e9b0';
$cta = (!isset($_COOKIE['ew-cta'])) ? setcookie('ew-cta', '0', time() * 20, '/') : $_COOKIE['ew-cta'];
$cnt = (!isset($_COOKIE['ew-cta-cnt'])) ? setcookie('ew-cta-cnt', '0', time() * 20, '/') : $_COOKIE['ew-cta-cnt'] ;
$viewed = (!isset($_COOKIE['ew-cta-viewed'])) ? setcookie('ew-cta-viewed', 'no', time() * 20, '/') : $_COOKIE['ew-cta-viewed'];
if ( is_singular( array( 'post', 'videos' ) ) ) {
    setcookie('ew-cta-cnt', isset($_COOKIE['ew-cta-cnt']) ? ++$_COOKIE['ew-cta-cnt'] : 1, time() * 20, '/');
}
if ($_COOKIE['ew-cta-cnt'] >= 3) {
    setcookie('ew-cta-cnt', '3', time() * 20, '/');
}
?>
<script>
    jQuery(document).ready(function ($) {
        var pop = <?php echo $cnt; ?>;
        var seen = "<?php echo $viewed; ?>";
        // display modal dialog when cnt cookie value > 3, then set viewed cookie value to yes
        if (( pop == 3 ) && ( seen == "no") ) {
            $.magnificPopup.open({
                items: {
                    src: '<div class="white-popup-block"><div class="news-field-row clearfix" id="form-container-pop"><h3 class="news-field-cta-title">Get FREE Wellness Tips Delivered!</h3><div class="news-field-cta-form"><form action="" id="pop-news-form" method="post" class="not-wpcf7-form"><div class="form-control-wrap pop-alert"><input id="page-url" type="hidden" name="page_url" value="<?php echo $url; ?>" /></div><div class="form-control-wrap your-email"><input type="email" id="pop-your-email" name="your-email"placeholder=" EMAIL ADDRESS" value="" size="40" /></div><div class="form-control-wrap your-zip"><input type="text" id="pop-your-zip" name="your-zip" placeholder=" ZIP CODE" value="" size="40" /></div><div class="form-control-wrap your-terms"><input type="checkbox" checked value="terms" id="news-pop-terms" class="form-control terms" />I accept your <br/><a href="https://myevergreenwellness.com/terms-and-conditions/" target="_blank">Terms &amp; Conditions</a></div><input type="submit" id="news-pop-submit" value="Sign Me Up!" class="form-control submit" /></form></div><span class="msg">I\'ll do it later. <a id="txt-close">I just want to browse your site for now.</a></span></div></div>',
                    type: 'inline'
                }
            });
            var a = new Date(<?php echo time() * 20; ?>000);
            var months = ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'];
            var year = a.getFullYear();
            var month = months[a.getMonth()];
            var date = a.getDate();
            var hour = a.getHours();
            var min = a.getMinutes();
            var sec = a.getSeconds();
            var time = date + ' ' + month + ' ' + year + ' ' + hour + ':' + min + ':' + sec ;
            document.cookie = "ew-cta-viewed=yes; path=/; expires="+time+";" ;
        }
        $('#txt-close').click( function(e) {e.preventDefault(); $.magnificPopup.close(); } );
        var message = '<h3>Welcome!</h3><h4>Please check your email for more information. We hope you enjoy Evergreen Wellness<sup>&reg;</sup>.</h4><h5>If you don\'t see an email from us, please check your spam folder.</h5>';
        $('#news-pop-submit').click(function() {
            var page_url = $("page-url").val();
            var email = $("input#pop-your-email").val();
            var zip = $("input#pop-your-zip").val();
            var terms = $("input#news-pop-terms").prop("checked");
            if ( (email == "") || (zip == "") || (terms == false) ) {
                $('.pop-alert').html( '<span style="color:#f00;">All fields are required</span>' );
                return false;
            }
            $.ajax({
                type: "POST",
                url: "",
                data: { form_title : 'Newsletter CTA', your_email : email, your_zip : zip, page_url : page_url },
                complete: function() {
                    __ss_noform.push(['form','pop-news-form', '<?php echo $ssform; ?>']);
                    __ss_noform.push(['submit', null, '<?php echo $ssform; ?>']);
                    $('#form-container-pop').html( message );
                }
            });
            return false;
        });
    });
</script>
<?php 
    $place = basename(get_permalink());
    //if ( ($place != 'login') || ($place != 'register') || ($place != 'welcome-survey') ) {
    $array = array('login', 'register', 'welcome-survey');
    if (!in_array($place, $array, TRUE)) {
        do_shortcode('[ssnfinclude placement="pop"]');
        do_shortcode('[cfdb-save-form-post]');
    }
?>
<?php if(get_option('egw_fb_comments_api_key')) : ?>
<div id="fb-root"></div>
<script>(function(d, s, id) {
var js, fjs = d.getElementsByTagName(s)[0];
if (d.getElementById(id)) return;
js = d.createElement(s); js.id = id;
js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&appId=<?php echo get_option('egw_fb_comments_api_key'); ?>&version=v2.3";
fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<?php endif; ?>
<input type="hidden" id="accountvalid" value="test"/>
<input type="hidden" name="user_primary_site" id="user_primary_site" value="<?php echo (is_user_logged_in() ? '0' : '1');//echo); ?>">
<input type="hidden" name="is_user_login" id="is_user_login" value="<?php echo is_user_logged_in(); ?>" >
<input type="hidden" name="member_location" id="member_location" value="<?php echo $member_location; ?>" >
<input type="hidden" name="tag_not_in" id="tag_not_in" value="<?php var_dump($tag_not_in); ?>" >
<div class="white-popup-block user-session-block mfp-hide" id="site_user_validation_popup">
    <div class="find-a-branch-container">
        <div class="fs-custom-select-container fs-custom-session-container">
            <div class="egw-homesite egw-homesite-session-popup" id="site_user_                                                                                                                                                                                               validation_popup_message">
            </div>
            <div class="fs-custom-select">
            </div>
        </div>
    </div>
</div>
<?php //do_shortcode('[cfdb-save-form-post]'); ?>
<?php discussion_get_footer(); ?>