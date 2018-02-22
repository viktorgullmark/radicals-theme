<?php
$frontpage = get_post(get_option('page_on_front'));
?>
<!DOCTYPE html>
<html>
<head lang="sv-se">
    <meta charset="<?php bloginfo('charset');?>">
    <meta name="description" content="Team Radicals - Overwatch team">
    <meta name="keywords" content="Team,Radicals,OW,Overwatch">
    <meta name="author" content="Viktor Gullmark">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta property="og:title" content="Team Radicals - Overwatch team" />
    <meta property="og:description" content="Team-site for the Overwatch team Radicals" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="<?php echo get_site_url(); ?>" />
    <meta property="og:image" content="<?php echo get_site_url(); ?>/wp-includes/images/radicals_og.jpg" />
    <?php wp_head();?>
</head>
<?php date_default_timezone_set("UTC");?>
<body>
<!-- <header>
</header> -->