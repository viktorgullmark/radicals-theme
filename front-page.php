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
<main class="container">

    </div>

            <?php the_content();?>
            <div class="row">
            <?php
foreach ($news as $item) {
            ?>
                <div class="col-lg-6">
                    <a class="item-container" href="<?php echo the_permalink($item) ?>">
                        <div class="row news-item-wrapper">
                                <?php if (get_field('image', $item)): ?>
                                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 news-image news-image" style="background-image: url('<?php the_field('image', $item)?>')">
                                <?php else: ?>
                                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 news-image news-image">
                                <?php endif;?>
                            </div>
                            <div class="news-col col">
                                <div class="news-meta-row">
                                    <div class="news-title-wrapper row align-items-center">
                                        <h3 class="news-title"><?php echo $item->post_title ?></h3>
                                    </div>
                                    <div class="meta-inner">
                                        <div class="col-12 news-meta-title meta-title">
                                            <div class="row">
                                                <div class="col d-flex justify-content-start">
                                                    Posted <?php echo human_time_diff(get_the_time('U', $item), current_time('timestamp', 1)) . ' ago'; ?>
                                                </div>
                                                <div class="col d-flex justify-content-end">
                                                by <?php echo get_the_author($item); ?></div>
                                                </div>
                                            </div>
                                    </div>
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
</main>
<?php
} // end while
} // end if
get_footer();