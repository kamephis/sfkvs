<div class="features-boxed">
    <div class="container">
        <div class="intro">
            <h2 class="text-center"><?php echo SFK_UNSERE_INITIATIVE_HEADER; ?></h2>
            <p class="text-center">
                <?php echo SFK_UNSERE_INITIATIVE; ?>
            </p>
        </div>
        <div class="row justify-content-center features">
            <div class="col-sm-6 col-md-5 col-lg-4 item">
                <div class="box">
                    <?php if (is_active_sidebar('feature_box_left')) : ?>
                        <?php dynamic_sidebar('feature_box_left'); ?>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-sm-6 col-md-5 col-lg-4 item">
                <div class="box">
                    <?php if (is_active_sidebar('feature_box_center')) : ?>
                        <?php dynamic_sidebar('feature_box_center'); ?>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-sm-12 col-md-10 col-lg-4 item">
                <div class="box">
                    <?php if (is_active_sidebar('feature_box_right')) : ?>
                        <?php dynamic_sidebar('feature_box_right'); ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

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
                    <a href="#">
                        <i class="fa fa-facebook-f"></i>
                    </a>
                    <a href="#">
                        <i class="fa fa-twitter"></i>
                    </a>
                </div>
            </div>
            <p class="copyright">&copy; <?php echo date("Y");
                echo " ";
                echo bloginfo('name'); ?></p>
        </div>
    </footer>
</div>
<?php wp_footer(); ?>
</body>
</html>