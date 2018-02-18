<?php
get_header();
get_template_part('partials/menu');
if (have_posts()) {
    while (have_posts()) {
        the_post();
        ?>
<main>
    <div class="container">
        <h1>
            <?php echo get_the_title() ?>
        </h1>
        <div class="row">
            <div class="col-8">
                <?php the_field('text', the_post())?>
            </div>
            <div class="col-4">
                <div class="news-post-image" style="background-image: url('<?php the_field('image', the_post())?>')">

                </div>
            </div>
        </div>
        <hr class="divider">
        <div class="row">
            <div class="col-12 author-name d-flex justify-content-end">
            // <?php echo get_author_name() ?>
            </div>
        </div>
    </div>
</main>
<?php
} // end while
} // end if
get_footer();