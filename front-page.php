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

<?php get_footer(); ?>