<nav class="navbar sticky-top navbar-toggleable-md navbar-light" role="navigation" id="navbar-top">
    <div class="container">
        <?php
        $custom_logo_id = get_theme_mod('custom_logo');
        $logo = wp_get_attachment_image_src($custom_logo_id, 'full');

        echo '<a href="' . get_home_url() . '" title="Zurück zur Startseite">';

        if (has_custom_logo()) {
            echo '<img src="' . esc_url($logo[0]) . '" class="img img-fluid">';
        } else {
            echo '<h1>' . get_bloginfo('name') . '</h1>';
        }

        echo '</a>';
        ?>
        <button class="navbar-toggler" data-toggle="collapse" data-target="#navcol-1" style="float:right;">
            <span class="sr-only">Navigation einblenden</span>
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="clearfix visible-xs visible-sm"></div>
        <div class="collapse navbar-collapse offset-xl-2" id="navcol-1">

            <?php
            wp_nav_menu(array(
                    'theme_location' => 'primary',
                    'depth' => 2,
                    'container' => 'div',
                    'container_class' => 'navbar navbar-light',
                    'container_id' => 'navcol-1',
                    'menu_class' => 'nav navbar-nav',
                    'fallback_cb' => 'WP_Bootstrap_Navwalker::fallback',
                    'walker' => new WP_Bootstrap_Navwalker())
            );
            ?>

            <?php
            wp_nav_menu(array(
                    'theme_location' => 'top_right',
                    'depth' => 2,
                    'container' => 'div',
                    'container_class' => 'navbar navbar-light',
                    'container_id' => 'navcol-2',
                    'menu_class' => 'nav navbar-nav btn-nav',
                    'fallback_cb' => 'WP_Bootstrap_Navwalker::fallback',
                    'walker' => new WP_Bootstrap_Navwalker())
            );
            ?>
        </div>
    </div>
</nav>

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
</style>
