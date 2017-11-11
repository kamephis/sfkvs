<?php get_header(); ?>
    <div class="clearfix"></div>
<?php

// Einbinden des Meta-Slider Plugins
// TODO: Herausfinden, wie alle WP-Mulisites den selben Slider nutzen können
echo do_shortcode("[metaslider id=32]");
?>
    <!-- Separator -->
    <div style="background-color:rgb(195,225,247);height:10px;"></div>

    <!-- Quote -->
    <div class="highlight-clean" style="background-color:rgb(23,27,44);">
        <div class="container">
            <div class="intro">
                <h2 class="text-center"><i class="fa fa-quote-left"></i></h2>
                <p class="text-center" style="font-size:21px;">
                    <?php echo SFK_QUOTE; ?>
                </p>
            </div>
            <div class="buttons"></div>
        </div>
    </div>
    <div style="background-color:rgb(195,225,247);height:10px;">
    </div>

    <!-- Feature Boxes -->
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
    <!-- ./ Feature Boxes -->

<?php get_footer(); ?>