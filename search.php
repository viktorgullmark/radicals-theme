<?php
get_header();
get_template_part('partials/menu');
$top_image = get_the_post_thumbnail_url(get_post(get_option('page_on_front')), "full");

global $wp_query;
$total_results = $wp_query->found_posts;
$paged = (get_query_var('paged')) ? absint(get_query_var('paged')) : 1;

?>
<main class="search-page">
    <div class="main-top-image red-gradient" style="background-image:url('<?php echo $top_image ?>');"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Sök</h1>
                <form method="get" class="searchform" action="<?php echo esc_url(home_url('/')); ?>">
                    <div class="row">
                        <div class="col-sm-8">
                            <div class="form-group">
                                <input type="search" class="form-control" name="s" placeholder="Sök här" value="<?php echo get_search_query() ?>" />
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <input type="submit" class="btn btn-blue btn-block" value="Sök" />
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <?php
if ($total_results > 0) {
    ?>
                <p class="search-count">
                    Din sökning på '
                    <b>
                        <?php echo get_search_query() ?>
                    </b>' gav
                    <b>
                        <?php echo $total_results ?>
                    </b>resultat.
                </p>

                <?php if (have_posts()) {?>

                <div class="main-list">

                    <?php while (have_posts()) {
        the_post();
        $thumbnail = get_the_post_thumbnail_url($post, 'medium');
        if ($thumbnail == "") {
            $thumbnail = get_stylesheet_directory_uri() . '/includes/resources/images/no-photo.png';
        }
        ?>
                    <a class="list-item search-item" href="<?php the_permalink();?>">
                        <div class="list-image" style="background-image:url('<?php echo $thumbnail ?>')"></div>
                        <div class="list-info">
                            <h5>
                                <?php the_title();?>
                            </h5>
                            <?php echo substr(get_the_excerpt(), 0, 200) . "..."; ?>
                        </div>
                        <span class="btn btn-blue list-btn">Läs mer</span>
                    </a>

                    <?php }?>

                </div>

                <div class="pagination">
                    <?php echo paginate_links(array(
        'base' => '%_%',
        'format' => '?paged=%#%',
        'total' => $wp_query->max_num_pages,
        'current' => $paged,
        'show_all' => true,
        'prev_next' => false,
    )); ?>
                </div>
                <?php }?>
                <?php
} else {
    ?>
                <p class="search-count">
                    Din sökning på '
                    <b>
                        <?php echo get_search_query() ?>
                    </b>' gav
                    <b>
                        <?php echo $total_results ?>
                    </b>resultat.
                </p>
                <?php
}
?>
            </div>
        </div>
        <br />
    </div>
</main>
<?php
get_footer();