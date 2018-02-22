<?php
/**
 * Template Name: Contact-page
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
        <?php echo wp_title('') ?>
        </h1>
        <?php echo do_shortcode("[ninja_form id=2]"); ?>
    </div>
    </div>
</main>

<?php
} // end while
} // end if
get_footer();