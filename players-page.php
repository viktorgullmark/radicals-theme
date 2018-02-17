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
$news = $result->posts;
get_header();
get_template_part('partials/menu');
if (have_posts()) {
    while (have_posts()) {
        the_post();
        ?>
<main>
        <div class="container">
            <?php the_content();?>
            <div class="row player-row">
            <?php
foreach ($news as $item) {
            // player-roster
            $roster = get_field_object('roster', $item);
            $rosterValue = $roster['value'];
            $rosterLabel = $roster['choices'][$rosterValue];
            ?>
                <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12 player-col">
                    <div class="item-container">
                        <div class="row player-photo">
                            <div class="col-12" style="background-image: url('<?php the_field('photo', $item)?>')">
                        </div>
                        </div>
                        <div class="row player-info" onclick="">
                            <div class="col">
                                <div class="meta-title"><?php echo $rosterLabel; ?></div>
                                <!-- <img class="role-icon" src="<?php bloginfo('stylesheet_directory');?>/includes/resources/images/icon--<?php the_field('role', $item)?>.svg" /> -->
                                <?php if (get_field('role', $item) === 'flex'): ?>
                                    <i class="role-icon fas fa-recycle"></i>
                                <?php elseif (get_field('role', $item) === 'offense'): ?>
                                    <i class="role-icon fas fa-crosshairs"></i>
                                <?php elseif (get_field('role', $item) === 'tank'): ?>
                                    <i class="role-icon fas fa-shield-alt"></i>
                                <?php elseif (get_field('role', $item) === 'support'): ?>
                                    <i class="role-icon fas fa-plus"></i>
                                <?php endif;?>
                                <h3 class="news-title"><?php echo $item->post_title ?></h3>
                            </div>
                        </div>

                        <div class="row player-social">
                            <div class="col align-items-center player-social-row">
                            <?php if (get_field('twitch_account', $item)): ?>
                                <a href="https://twitch.tv/<?php the_field('twitch_account', $item)?>"><i class="social-media-icon fab fa-twitch"></i></a>
                            <?php endif;?>
                            </div>
                        </div>
                        <div class="player-social-placeholder">
                        </div>
                   </div>
                </div>

            <?php
}
        ?>
            </div>
        </div>
    </div>
</main>
<?php
} // end while
} // end if
get_footer();