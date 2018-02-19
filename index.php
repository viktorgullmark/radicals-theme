<?php
get_header();
get_template_part('partials/menu');
if (have_posts()) {
    while (have_posts()) {
        the_post();
        ?>
<main class="container">
        <h1>
            <?php echo get_the_title() ?>
        </h1>
        <?php the_content();?>
</main>
<?php
} // end while
} // end if
get_footer();