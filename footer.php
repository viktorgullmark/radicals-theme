
<?php
$frontpage = get_post(get_option('page_on_front'));
global $post;
?>

<footer>
    <div class="container footer-content">
        <div class="row">
            <div class="col-12 row align-items-center">
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6  align-items-center left-section">
                    <div class="row">
                        <div class="col-12">
                            <?php if( get_field('facebook_url', $frontpage) || get_field('twitter_url', $frontpage) || get_field('youtube_url', $frontpage) || get_field('twitch_url', $frontpage)): ?>
                            <div class="social-media-icons">
                                <?php get_template_part('partials/social-media-icons');?>
                            </div>
                            <div class="footer-divider"></div>
                            <?php endif; ?>
                            <?php if (get_field('contact_email', $frontpage)): ?>
                            <a class="mailto-link" href="mailto:<?php the_field('contact_email', $frontpage)?>"><?php the_field('contact_email', $frontpage)?></a>
                            <?php endif;?>
                            </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 right-section">
                    <span class="copyright-text">
                        <?php the_field('copyright_text', $frontpage)?>
                    </span>
                </div>
            </div>
        </div>
    </div>
</footer>

<?php wp_footer();?>

</body>
</html>