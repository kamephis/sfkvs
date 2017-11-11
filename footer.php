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