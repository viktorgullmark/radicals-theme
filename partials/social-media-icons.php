<?php 
$frontpage = get_post(get_option('page_on_front'));
?>
<?php if( get_field('facebook_url', $frontpage) ): ?>
    <a href="<?php the_field('facebook_url', $frontpage) ?>"><i class="social-media-icon fab fa-facebook"></i></a>
<?php endif; ?>
<?php if( get_field('twitter_url', $frontpage) ): ?>
    <a href="<?php the_field('twitter_url', $frontpage) ?>"><i class="social-media-icon fab fa-twitter"></i></a>
<?php endif; ?>
<?php if( get_field('youtube_url', $frontpage) ): ?>
    <a href="<?php the_field('youtube_url', $frontpage) ?>"><i class="social-media-icon fab fa-youtube"></i></a>
<?php endif; ?>
<?php if( get_field('twitch_url', $frontpage) ): ?>
    <a href="<?php the_field('twitch_url', $frontpage) ?>"><i class="social-media-icon fab fa-twitch"></i></a>
<?php endif; ?>
            