<?php get_header(); ?>
<div class="col-lg-9">
	<?php if (function_exists('nav_breadcrumb')) nav_breadcrumb(); ?>
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<h2><?php the_title(); ?></h2>
		<?php the_content(); ?> <?php edit_post_link(); ?>

<?php endwhile; else: ?>
	<p>Tut mir leid, es wurde kein passender Beitrag gefunden.</p>
<?php endif; ?>
</div>

<div class="col-lg-3">
    Sidebar
</div>
<?php get_footer(); ?>