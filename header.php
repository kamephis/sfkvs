<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>"/>

    <link rel="profile" href="http://gmpg.org/xfn/11" />

    <?php wp_head(); ?>

    <title><?php wp_title(' - ', true, 'right'); ?> <?php bloginfo('name'); ?></title>

</head>
<body <?php body_class(); ?>>
<?php require_once('navbar_top.php'); ?>
<div id="mainContent" style="min-height:550px!important;">

