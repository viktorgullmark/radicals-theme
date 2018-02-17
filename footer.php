
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
                        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                            <h4>Connect:</h4>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                            <div class="social-media-icons">
                                <?php get_template_part('partials/social-media-icons');?>
                            </div>
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