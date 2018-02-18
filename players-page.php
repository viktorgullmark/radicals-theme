<?php
/**
 * Template Name: Players-page
 */
$args = array(
    'post_type' => 'rcs_players',
    'orderby' => 'date',
    'order' => 'DESC',
    'posts_per_page' => 10,
    'paged' => $paged,
    'category_name' => $category_query,
);
$result = new WP_Query($args);
$players = $result->posts;
get_header();
get_template_part('partials/menu');
if (have_posts()) {
    while (have_posts()) {
        the_post();
        ?>
<main>
<div class="container">
            <?php

        $field_key = "field_5a82e972860d2";
        $field = get_field_object($field_key);

        if ($field) {
            foreach ($field['choices'] as $k => $v) {
                ?>

        <?php the_content();?>

        <?php
echo '<h3>' . $v . '</h3>';
?>
                <hr class="divider">
         <div class="row player-row">
             <?php
                foreach ($players as $item) {

                    $role = get_field_object('role', $item);
                    $roleValue = $role['value'];
                    $roleLabel = $role['choices'][$roleValue];
                    if (get_field('roster', $item) === $k):
                    ?>
   
                <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12 player-col item-container-wrapper">
                    <div class="item-container player-item-container">
                        <div class="row player-photo">
                            <div class="col-12" style="background-image: url('<?php the_field('photo', $item)?>')">
                        </div>
                        </div>
                        <div class="hover-trigger" onclick="">
                        <div class="row player-info">
                            <div class="col-10 player-col">
                                <div class="meta-title"><?php echo $roleLabel ?></div>
                            </div>
                            <div class="col-2 player-col role-icon-wrapper align-items-center justify-content-end">
                                <?php if (get_field('role', $item) === 'flex'): ?>
                                    <i class="role-icon fas fa-recycle"></i>
                                <?php elseif (get_field('role', $item) === 'offense'): ?>
                                    <i class="role-icon fas fa-crosshairs"></i>
                                <?php elseif (get_field('role', $item) === 'tank'): ?>
                                    <i class="role-icon fas fa-shield-alt"></i>
                                <?php elseif (get_field('role', $item) === 'support'): ?>
                                    <i class="role-icon fas fa-plus"></i>
                                <?php endif;?>
                            </div>
                        </div>
                        <div class="row player-info">
                            <div class="col-12 player-col">
                                <h4 class="player-title"><?php echo $item->post_title ?></h4>
                            </div>
                        </div>
                        <div class="row player-info">
                            <div class="col-12 player-col player-name-wrapper">
                                <span class="player-name"><?php the_field('real_name', $item)?></span>
                            </div>
                        </div>
                        </div>
                        <div class="row player-social">
                            <div class="col player-col align-items-center player-social-row">
                            <?php if (get_field('facebook_url', $item)): ?>
                                <a href="<?php the_field('facebook_url', $item)?>"><i class="social-media-icon fab fa-facebook"></i></a>
                            <?php endif;?>
                            <?php if (get_field('twitter_url', $item)): ?>
                                <a href="<?php the_field('twitter_url', $item)?>"><i class="social-media-icon fab fa-twitter"></i></a>
                            <?php endif;?>
                            <?php if (get_field('youtube_url', $item)): ?>
                                <a href="<?php the_field('youtube_url', $item)?>"><i class="social-media-icon fab fa-youtube"></i></a>
                            <?php endif;?>
                            <?php if (get_field('twitch_url', $item)): ?>
                                <a href="<?php the_field('twitch_url', $item)?>"><i class="social-media-icon fab fa-twitch"></i></a>
                            <?php endif;?>
                            </div>
                        </div>
                        <div class="player-social-placeholder">
                        </div>
                   </div>
                </div>
                
                <?php
endif;
                }
                
                ?>
</div>

        <?php
}
        }

        foreach ($players as $item) {
            ?>

        </div>
            <?php
}
        ?>
            </div>
</main>
<?php
} // end while
} // end if
get_footer();