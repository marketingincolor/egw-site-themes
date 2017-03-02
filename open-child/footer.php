<?php
discussion_get_footer();
$member_location = get_egw_member_location();
$tag_not_in = egw_tag_not_in($member_location);
list($post_per_section,$post_type)=scroll_loadpost_settings();
?>
<script>
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
</script>

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
    jQuery('.f-newsletter').magnificPopup({
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

</script>

<input type="hidden" id="accountvalid" value="test"/>
<input type="hidden" name="user_primary_site" id="user_primary_site" value="<?php echo (is_user_logged_in() ? '0' : '1');//echo other_user_profile_redirection(); ?>">
<input type="hidden" name="is_user_login" id="is_user_login" value="<?php echo is_user_logged_in(); ?>" >
<input type="hidden" name="member_location" id="member_location" value="<?php echo $member_location; ?>" >
<input type="hidden" name="tag_not_in" id="tag_not_in" value="<?php var_dump($tag_not_in); ?>" >

<div class="white-popup-block user-session-block mfp-hide" id="site_user_validation_popup">
    <div class="find-a-branch-container">        
        <div class="fs-custom-select-container fs-custom-session-container">
            <div class="egw-homesite egw-homesite-session-popup" id="site_user_validation_popup_message">                
            </div>
            <div class="fs-custom-select">                
            </div>
        </div>        
    </div>
</div>

<script>
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

<script type="text/javascript">
jQuery(document).ready(function($){
    $('#upload-btn').click(function(e) {
        e.preventDefault();
        var image = wp.media({ 
            title: 'Upload Image',
            // mutiple: true if you want to upload multiple files at once
            multiple: false
        }).open()
        .on('select', function(e){
            // This will return the selected image from the Media Uploader, the result is an object
            var uploaded_image = image.state().get('selection').first();
            // We convert uploaded_image to a JSON object to make accessing it easier
            // Output to the console uploaded_image
            console.log(uploaded_image);
            var image_url = uploaded_image.toJSON().url;
            // Let's assign the url value to the input field
            $('#image_url').val(image_url);
        });
    });
});
</script>

<?php
/** Newesletter CTA 
* Cookie data set via PHP and manipulated with both PHP and JS as needed
*/
$cta = (!isset($_COOKIE['ew-cta'])) ? setcookie('ew-cta', '0', time() * 20, '/') : $_COOKIE['ew-cta'];
$cnt = (!isset($_COOKIE['ew-cta-cnt'])) ? setcookie('ew-cta-cnt', '0', time() * 20, '/') : $_COOKIE['ew-cta-cnt'] ;
$viewed = (!isset($_COOKIE['ew-cta-viewed'])) ? setcookie('ew-cta-viewed', 'no', time() * 20, '/') : $_COOKIE['ew-cta-viewed'];
if ( is_singular( array( 'post', 'videos' ) ) ) {
    setcookie('ew-cta-cnt', isset($_COOKIE['ew-cta-cnt']) ? ++$_COOKIE['ew-cta-cnt'] : 1, time() * 20, '/');
}
if ($_COOKIE['ew-cta-cnt'] >= 4) {
    setcookie('ew-cta-cnt', '4', time() * 20, '/');
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
                    src: '<div class="white-popup-block"><div class="news-field-row clearfix" id="form-container-pop"><div class="news-field-cta-title">Get FREE Wellness Tips Delivered!</div><div class="news-field-cta-form"><div role="form" class="not-wpcf7"><form action="" id="news-pop" method="post" class="not-wpcf7-form"><input type="hidden" name="form_title" value="Newsletter CTA"/><label>Your Email (required)</label><br /><span class="wpcf7-form-control-wrap your-email"><input type="email" id="pop-your-email" name="your-email" value="" size="40" /></span><label>ZIP Code</label><br /><span class="wpcf7-form-control-wrap your-zip"><input type="text" id="pop-your-zip" name="your-zip" value="" size="40" /></span><input type="submit" id="news-pop-submit" value="Sign Me Up!" class="wpcf7-form-control wpcf7-submit" /></form></div></div></div></div>', 
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
    });
</script>