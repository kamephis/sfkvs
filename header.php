<!DOCTYPE html>
<html lang="<?php language_attributes(); ?>">
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=10" />
    <meta name="viewport" content="width=device-width">
    <!--<meta name="viewport" content="width=device-width, initial-scale=1.0">-->
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

    <link rel="profile" href="http://gmpg.org/xfn/11" />

    <?php wp_head(); ?>

    <title><?php wp_title(' - ', true, 'right'); ?> <?php bloginfo('name'); ?></title>
</head>
<body <?php body_class(); ?>>
<div class="container">
    <div class="col-lg-12 col-md-12">
        <div class="row">

            <div class="col-lg-6">
                <?php
                $custom_logo_id = get_theme_mod( 'custom_logo' );
                $logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );

                if ( has_custom_logo() ) {
	                echo '<img src="'. esc_url( $logo[0] ) .'" class="img img-responsive">';
                } else {
	                echo '<h1>'. get_bloginfo( 'name' ) .'</h1>';
                }
                ?>
            </div>
            <div class="col-lg-4 col-md-offset-2">
				<?php if ( is_active_sidebar( 'widget_top_right' ) ) : ?>
					<?php dynamic_sidebar( 'widget_top_right' ); ?>
				<?php endif; ?>
            </div>
            <div class="clearfix"></div>
            <div class="col-lg-12" style="margin-top:25px;">
                <div class="row">
                    <div class="col-lg-12">
                        <!-- Nav -->

                        <nav class="navbar navbar-inverse" role="navigation" style="-webkit-box-shadow: 10px 7px 68px -12px rgba(0,0,0,0.75);
-moz-box-shadow: 10px 7px 68px -12px rgba(0,0,0,0.75);
box-shadow: 10px 7px 68px -12px rgba(0,0,0,0.75);">
                            <!-- Brand and toggle get grouped for better mobile display -->
                            <div class="navbar-header">
                                <a class="navbar-brand hidden-lg" href="#">Studenteninitiative für Kinder</a>
                                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                            </div>

                            <div class="collapse navbar-collapse navbar-ex1-collapse">
								<?php
								/* Top Navigation */
								wp_nav_menu( array(
										'depth' => 2,
										'container' => false,
										'theme_location' => 'top_menu',
										'menu_class' => 'nav navbar-nav',
										'walker' => new wp_bootstrap_navwalker())
								);
								?>
                                <ul class="nav navbar-nav pull-right">
                                    <li><a href="https://www.facebook.com/sfk.vs/" target="_blank" class="tooltip-social" data-toggle="tooltip" data-trigger="hover" data-html="true" title="Folge uns auf Facebook" data-placement="top"><i class="fa fa-facebook-official"></i></a></li>
                                    <li><a href="https://twitter.com/sfk_vs" target="_blank" class="tooltip-social" data-toggle="tooltip" data-trigger="hover" data-html="true" title="Folge uns auf Twitter" data-placement="top"><i class="fa fa-twitter"></i></a></li>
                                </ul>
                            </div>
                        </nav>
                        <!-- ./ Nav -->
                    </div>
                </div>
            </div>
            <div class="clearfix separator"></div>
