<nav class="navbar sticky-top navbar-toggleable-md navbar-light" id="navbar-top">
    <div class="container">
        <?php
        $custom_logo_id = get_theme_mod('custom_logo');
        $logo = wp_get_attachment_image_src($custom_logo_id, 'full');

        echo '<a href="' . get_home_url() . '" title="Zurück zur Startseite">';

        if (has_custom_logo()) {
            echo '<img src="' . esc_url($logo[0]) . '" class="img img-fluid" alt="SfK-Logo">';
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
                    'container_id' => 'navcol_1',
                    'menu_class' => 'nav navbar-nav',
                    'fallback_cb' => 'WP_Bootstrap_Navwalker::fallback',
                    'walker' => new WP_Bootstrap_Navwalker())
            );
            ?>

            <div class=" hidden-md-down">
                <?php
                wp_nav_menu(array(
                        'theme_location' => 'top_right',
                        'depth' => 2,
                        'container' => 'div',
                        'container_class' => 'navbar navbar-light  nav-button-right',
                        'container_id' => 'navcol-2',
                        'menu_class' => 'nav navbar-nav btn-nav',
                        'fallback_cb' => 'WP_Bootstrap_Navwalker::fallback',
                        'walker' => new WP_Bootstrap_Navwalker())
                );
                ?>
            </div>
        </div>
    </div>
</nav>