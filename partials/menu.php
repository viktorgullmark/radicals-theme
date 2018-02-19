<?php
$frontpage = get_post(get_option('page_on_front'));
$main_menu = array(
    'theme_location' => '',
    'menu' => '',
    'container' => 'div',
    'container_class' => '',
    'container_id' => '',
    'menu_class' => 'main-menu',
    'menu_id' => '',
    'echo' => true,
    'fallback_cb' => 'wp_page_menu',
    'before' => '',
    'after' => '',
    'link_before' => '',
    'link_after' => '',
    'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
    'depth' => 0,
    'walker' => '',
);
$top_image = !empty(get_the_post_thumbnail_url($post, "full")) ? get_the_post_thumbnail_url($post, "full") : get_the_post_thumbnail_url(get_post(get_option('page_on_front')), "full");
?>

<header id="header">

    <div class="header">
        <div style="background-image:url(<?php echo $top_image ?>)" class="main-pic row">
        <div id="header-image" class="align-self-center col-12">
            <div class="row align-items-center">
                <div class="col-md-4"></div>
                <div class="col-md-4 align-self-center">
                <a href="<?php echo esc_url(home_url('/')); ?>" title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" rel="home">
                    <img width="200" height="158" src="<?php the_field('logo', $frontpage)?>" /> 
                    <!-- https://via.placeholder.com/200x169/CCC/000000 -->
                </a>
                </div>
                <div class="col-md-4 social-media-icons-wrapper">
                    <div>
                        <?php get_template_part('partials/social-media-icons');?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="main-nav">
        <div class="container">
            <?php wp_nav_menu($main_menu);?>
        </div>
    </div>
</header>