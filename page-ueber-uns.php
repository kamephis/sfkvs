<?php get_header(); ?>
    <div class="container">
        <div class="row justify-content-left features" style="padding:40px 0;">
            <div class="col-xl-8">
                <?php if (function_exists('nav_breadcrumb')) nav_breadcrumb(); ?>
                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                    <h3><?php the_title(); ?></h3>
                    <?php the_content(); ?><?php edit_post_link(); ?>

                <?php endwhile; else: ?>
                    <p>Tut mir leid, es wurde kein passender Beitrag gefunden.</p>
                <?php endif; ?>
            </div>

            <div class="offset-1 col-xs-3">
                <?php if (is_active_sidebar('about_right')) : ?>
                    <?php dynamic_sidebar('about_right'); ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
<?php get_footer(); ?>