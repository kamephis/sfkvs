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

                <?php if (get_theme_mod('facebook') || get_theme_mod('twitter')) { ?>
                    <div class="col item social">
                        <?php
                        if (get_theme_mod('facebook')) {
                            ?>
                            <a href="<?php echo get_theme_mod('facebook'); ?>">
                                <i class="fa fa-facebook-f"></i>
                            </a>
                        <?php } ?>

                        <?php
                        if (get_theme_mod('twitter')) {
                            ?>
                            <a href="<?php echo get_theme_mod('twitter'); ?>">
                                <i class="fa fa-twitter"></i>
                            </a>
                        <?php } ?>

                        <?php
                        if (get_theme_mod('snapchat')) {
                            ?>
                            <a href="<?php echo get_theme_mod('snapchat'); ?>">
                                <i class="fa fa-snapchat"></i>
                            </a>
                        <?php } ?>

                        <?php
                        if (get_theme_mod('instagram')) {
                            ?>
                            <a href="<?php echo get_theme_mod('instagram'); ?>">
                                <i class="fa fa-instagram"></i>
                            </a>
                        <?php } ?>
                    </div>
                <?php } ?>

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