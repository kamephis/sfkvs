<?php get_header(); ?>
    <div class="container">
        <div class="row justify-content-left features" style="padding:40px 0;">
            <div class="col-xs-12 col-sm-7">
                <?php if (function_exists('nav_breadcrumb')) nav_breadcrumb(); ?>
                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                    <h3><?php the_title(); ?></h3>
                    <?php the_content(); ?><?php edit_post_link(); ?>

                <?php endwhile; else: ?>
                    <p>Tut mir leid, es wurde kein passender Beitrag gefunden.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
<?php get_footer(); ?>