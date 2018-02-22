<?php
/**
 * Template Name: About-page
 */
get_header();
get_template_part('partials/menu');
if (have_posts()) {
    while (have_posts()) {
        the_post();
        ?>
<main class="container wrapped-content">
    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-12 contact-form-wrapper mx-auto">
       
        <h1>
        <?php echo $post->post_title ?>
        </h1>
        <div class="row">
            <div class="col-12">
                <?php the_content() ?>
            </div>
        </div>
        </div>
    </div>
</main>

<?php
} // end while
} // end if
get_footer();