<?php
$frontpage = get_post(get_option('page_on_front'));
?>
<!DOCTYPE html>
<html>
<head lang="sv-se">
    <meta charset="<?php bloginfo('charset');?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head();?>
</head>
<?php date_default_timezone_set("UTC");?>
<body>
<!-- <header>
</header> -->