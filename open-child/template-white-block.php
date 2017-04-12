<?php
/**
 * Template Name: White Block
 *
 * 
 */
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
                        the_content();
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