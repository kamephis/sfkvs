<div class="col-md-12">
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <!-- Footer Widget Left -->
                <div class="col-lg-4 col-md-12">
					<?php if ( is_active_sidebar( 'footer_left' ) ) : ?>
						<?php dynamic_sidebar( 'footer_left' ); ?>
					<?php endif; ?>
                </div>
                <!-- Footer Widget Center -->
                <div class="col-lg-4 col-md-12">
					<?php if ( is_active_sidebar( 'footer_center' ) ) : ?>
						<?php dynamic_sidebar( 'footer_center' ); ?>
					<?php endif; ?>
                </div>

                <!-- Footer Widget Right -->
                <div class="col-lg-4 col-md-12">
					<?php if ( is_active_sidebar( 'footer_right' ) ) : ?>
						<?php dynamic_sidebar( 'footer_right' ); ?>
					<?php endif; ?>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="col-md-12" style="margin-top:45px;">
	        <nav class="text-center">
            <?php

	        wp_nav_menu( array(
			        'depth' => 1,
			        'container' => false,
                    'menu_class' => 'nav_text',
                    'theme_location' => 'bottom_menu'
	        ));
	        ?>
            </nav>
        </div>

        <div class="clearfix"></div>
        <div class="col-md-12">
            <h5 class="text-center"> &copy; <?php echo date("Y"); echo " "; echo bloginfo('name'); ?></h5>
        </div>

        <div class="clearfix"></div>
        <div class="col-md-12">

        </div>


    </div>
</div>
</div>
</div>
</div>

<script>
    jQuery(document).ready(function(){
        jQuery('[data-toggle="tooltip"]').tooltip({
            container: 'body'
        });

    });
</script>
</body>
</html>