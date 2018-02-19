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
<main class="container">
        <h1>
            <?php echo the_field('header') ?>
        </h1>
        <div class="row">
            <div class="col-12">
                <?php the_content() ?>
            </div>
        </div>
</main>

<?php
} // end while
} // end if
get_footer();