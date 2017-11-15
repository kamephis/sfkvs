<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>"/>

    <link rel="profile" href="http://gmpg.org/xfn/11" />

    <?php wp_head(); ?>

    <title><?php wp_title(' - ', true, 'right'); ?> <?php bloginfo('name'); ?></title>

    <style>
        #navbar-top {
            display: block;
            background: #fff;
            opacity: 0.9;
            border-bottom: 10px solid rgb(23, 27, 44);
        }

        .btn-nav a.nav-link {
            color: white !important;
        }

        #navcol-2 ul li {

            padding: 0.25rem 0.5rem;
            font-size: 0.875rem;
            border-radius: 0.2rem;
            color: white !important;

            background: #f0ad4e;
            /*background: #5cb85c;*/

            display: inline-block;
            font-weight: normal;
            line-height: 1.25;
            text-align: center;
            white-space: nowrap;
            vertical-align: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;

            -webkit-transition: all 0.2s ease-in-out;
            -o-transition: all 0.2s ease-in-out;
            transition: all 0.2s ease-in-out;
        }

        #navcol-2 ul li:focus, #navcol-2 ul li:hover {
            text-decoration: none;
        }

        #navcol-2 ul li:a {
            color: white !important;
        }

        /*
            ul.nav li.dropdown:hover > ul.dropdown-menu {
                display: block;
            }

            @media (min-width: 979px) {
                ul.nav li.dropdown:hover > ul.dropdown-menu {
                    display: block;
                }
            }
            */

        .nav-button-right {
            position: absolute;
            right: 0;
        }
    </style>

</head>
<body <?php body_class(); ?>>
<?php require_once('navbar_top.php'); ?>
<div id="mainContent" style="min-height:550px;">

