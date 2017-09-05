<?php
// TODO: Condense Styles

$author_email = get_the_author_meta('user_email');
$user = get_user_by('email', $author_email);
$getUserID = $user->ID;
$user = new WP_User($getUserID);

if (!empty($user->roles) && is_array($user->roles)) {
    foreach ($user->roles as $role) {
        $role;
        $user->first_name;
        $user->last_name;
    }
}
if (!empty($user->first_name) && !empty($user->last_name)) {
    $displayNameis = $user->first_name . " " . $user->last_name;
} else {
    $displayNameis = $author_email = get_the_author_meta('user_nicename');
}
?>

<?php
?>
<?php if ($role == "coach") { ?>
    <div class="article-created">


        <div class="row">
            <div class="vc_col-sm-12">
                <?php

                $fetchresult = get_user_meta($getUserID);
                if (!empty($fetchresult['wpcf-user-profile-avatar'][0])):
                        $fetchresultRel = $fetchresult['wpcf-user-profile-avatar'][0];
                    ?>
                    <img src="<?php echo $fetchresultRel; ?>" width="150" height="150" class="avatar avatar-176 photo" alt="Coach Image" style="    margin-right: 2rem; margin-bottom: 0rem; float: left; border-radius: 50%;"/>
                <?php else : ?>                                                    
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/aavathar.jpg" width="150" height="150" class="avatar avatar-176 photo" alt="Evergreen Wellness Avatar" style="float: left; margin-right: 2rem; margin-bottom: 0rem;"/>
                <?php endif; ?>
                <h4 style="font-size: 1.5rem; color: #595959; padding: 0rem 0rem 1.5rem 0rem;">
                <?php 
                    if(get_field('written_by_condition')) {
                        the_field('written_by_condition');
                    }
                    echo ' ' . $displayNameis; 
                ?>
                </h4>
                <p><?php echo $user->description; ?></p>
            <p><?php echo $user->signature; ?></p>
            </div>
        </div>

    </div>

<?php }
?>