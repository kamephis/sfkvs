<nav class="navbar fixed-top navbar-toggleable-md navbar-light" role="navigation"
     style="display: block; background: #fff; border-bottom:10px solid rgb(23,27,44);">
    <div class="container">

        <?php
        $custom_logo_id = get_theme_mod('custom_logo');
        $logo = wp_get_attachment_image_src($custom_logo_id, 'full');

        if (has_custom_logo()) {
            echo '<img src="' . esc_url($logo[0]) . '" class="img img-responsive">';
        } else {
            echo '<h1>' . get_bloginfo('name') . '</h1>';
        }
        ?>

        <button class="navbar-toggler" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span
                    class="navbar-toggler-icon"></span></button>

        <div class="collapse navbar-collapse" id="navcol-1" style="margin-left:250px;">
            <?php
            wp_nav_menu(array(
                    'theme_location' => 'primary',
                    'depth' => 2,
                    'container' => 'div',
                    'container_class' => 'navbar navbar-light float-right',
                    'container_id' => 'navcol-1',
                    'menu_class' => 'nav navbar-nav ml-auto',
                    'fallback_cb' => 'WP_Bootstrap_Navwalker::fallback',
                    'walker' => new WP_Bootstrap_Navwalker())
            );
            ?>
        </div>
    </div>
</nav>
