<div class="fsp-welcome-branch">
<?php if (current_user_can(ACCESS_VILLAGE_CONTENT)): ?>
    <div class="fsp-branch-title"><h4>Welcome to The Villages!</h4></div>
<?php else: ?>
    <div class="fsp-branch-title"><h4>Welcome to Evergreen Wellness!</h4></div>
<?php endif; ?>
    <div class="fsp-branch-content">        
        <ul>
            <?php if(ENVIRONMENT_MODE!=1){ ?>
            <?php if (!is_user_logged_in()) { ?>
            <li><a href = "<?php echo network_site_url(); ?>register"><i class="fa fa-check" aria-hidden="true"></i> Join This Branch?</a></li>
            <?php }  } ?>
        </ul>    
    </div>
</div>
<div id="current-blog" style="display:none"><?php echo $blog_id = get_current_blog_id(); ?></div>


