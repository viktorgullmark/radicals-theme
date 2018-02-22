<?php
get_header();
get_template_part('partials/menu');
if (have_posts()) {
    while (have_posts()) {
        the_post();
        ?>  
                <div class="news-post-filler"></div>
                <div class="news-post-image d-flex align-items-center" style="background-image: url('<?php the_field('image', the_post())?>')">
                <div class="container">
                    <h1 class="news-post-caption">
                    <?php echo wp_title('') ?>
                    </h1>
                </div>
                </div>
        <main class="container">

        <div class="row">

            <div class="col-12">
                <?php the_field('text', the_post())?>
            </div>
        </div>
        <hr class="divider">
        <div class="row">
            <div class="col-12 author-name d-flex justify-content-end">
            // <?php echo get_author_name() ?>
            </div>
        </div>
</main>
<?php
} // end while
} // end if
get_footer();