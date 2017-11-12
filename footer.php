</div><!-- end Main -->
<div class="footer-dark">
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-md-3 item">
                    <?php ?>
                    <?php if (is_active_sidebar('footer_left')) : ?>
                        <?php dynamic_sidebar('footer_left'); ?>
                    <?php endif; ?>
                </div>

                <div class="col-sm-6 col-md-3 item">
                    <?php if (is_active_sidebar('footer_center')) : ?>
                        <?php dynamic_sidebar('footer_center'); ?>
                    <?php endif; ?>
                </div>

                <div class="col-md-6 item text">
                    <?php if (is_active_sidebar('footer_right')) : ?>
                        <?php dynamic_sidebar('footer_right'); ?>
                    <?php endif; ?>
                </div>
                <div class="col item social">
                    <?php

                    // Eintragen der entsprechenden Social Links, je nach Website ID

                    $fb_link = '';
                    $twitter_link = '';

                    switch (get_current_blog_id()) {
                        // VS
                        case '1':
                            $fb_link = 'https://www.facebook.com/sfk.vs/';
                            $twitter_link = 'https://twitter.com/sfk_vs';
                            break;
                        // Furtwangen
                        case '2':
                            $fb_link = 'https://www.facebook.com/sfk.fuwa/';
                            $twitter_link = '';
                            break;
                    }


                    ?>
                    <a href="<?php echo $fb_link; ?>">
                        <i class="fa fa-facebook-f"></i>
                    </a>
                    <a href="<?php echo $twitter_link; ?>">
                        <i class="fa fa-twitter"></i>
                    </a>
                </div>
            </div>
            <p class="copyright">
                <?php echo '&copy; ' . date("Y"); ?>
                <?php echo '&nbsp;' . bloginfo('name'); ?>
                <br>
                <br>
                <a style="color:#fff; margin-right:1em;" href="<?php echo get_home_url(); ?>/impressum">Impressum</a><a
                        style="color:#fff;" href="<?php echo get_home_url(); ?>/datenschutz">Datenschutz</a>
            </p>

        </div>
    </footer>
</div>
<?php wp_footer(); ?>
</body>
</html>