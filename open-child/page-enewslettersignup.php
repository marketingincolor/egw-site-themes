<?php
get_header();?>
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
                        <?php
                        do_shortcode('[vc_row]' );
                        do_shortcode('[vc_column]');
                        do_shortcode('[vc_column_text]' );
                        ?>
                        <h1 class="" style="text-align: center; color: #f79c49; font-size: 2.66667em; padding: 4rem 0rem;">Being healthy just got a lot more fun!</h1>
                        <?php
                        do_shortcode('[/vc_column_text]' );
                        do_shortcode('[/vc_column]' );
                        do_shortcode('[/vc_row]' );
                        do_shortcode('[vc_row]' );
                        do_shortcode( '[vc_column width="1/2"][vc_column_text]');
                        ?>
                        <div class="mdk-sng-pst">
                        <h1 style="text-transform: none; font-size: 1.733em;">Sign Up for Our Free eNewsletter</h1>
                        The Evergreen Wellness® eNewsletter delivers a regular dose of inspiration right to your inbox. From engaging articles and videos filled with helpful tips to invitations to exciting events, we’ll make living a healthy lifestyle easier and more fun than you ever dreamed possible.
                        </div>
                        <?php
                        do_shortcode( '[/vc_column_text][/vc_column][vc_column width="1/2"][vc_column_text][contact-form-7 id="2082" title="Newsletter CTA" html_id="newsletter-landing-page"][/vc_column_text][/vc_column][/vc_row][vc_row][vc_column][vc_column_text]');
                        ?>
                        <script type="text/javascript">
                        var __ss_noform = __ss_noform || [];
                        __ss_noform.push(['baseURI', 'https://app-3QMYANU21K.marketingautomation.services/webforms/receivePostback/MzawMDG2NDQxAwA/']);
                        __ss_noform.push(['form', 'newsletter-landing-page', 'ba3745d9-b382-4197-b0f2-ed587005b1b7']);
                        __ss_noform.push(['submitType', 'manual']);
                        </script>
                        <script type="text/javascript" src="https://koi-3QMYANU21K.marketingautomation.services/client/noform.js?ver=1.24"></script>[/vc_column_text][/vc_column][/vc_row]
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    
<?php
get_footer();
?>