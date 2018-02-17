<?php
$args = array(
    'post_type' => 'rcs_news',
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

    </div>
        <div class="container">
            <?php the_content();?>
            <div class="row">
            <?php
foreach ($news as $item) {
            ?>  
                <div class="col-lg-6">
                    <a class="item-container" href="<?php echo the_permalink($item) ?>">
                        <div class="row news-item-wrapper">
                            <div class="col-4 news-image" style="background-image: url('<?php the_field('image', $item)?>')">

                            </div>
                            <div class="news-col col">
                                <div class="news-meta-title meta-title">Posted <?php echo human_time_diff(get_the_time('U', $item), current_time('timestamp', 1)) . ' ago'; ?></div>
                                <div class="news-title-wrapper align-items-center">
                                    <h3 class="news-title"><?php echo $item->post_title ?></h3>
                                </div>
                            </div>
                    </div>
                    </a>
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