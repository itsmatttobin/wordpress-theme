<?php get_header(); ?>

	<div class="row">

		<div class="col-xs-12 col-md-8">

			<?php if (have_posts()) : ?>

				<h2><?php _e('Search Results','textdomain'); ?></h2>

				<?php while (have_posts()) : the_post(); ?>

					<article <?php post_class() ?> id="post-<?php the_ID(); ?>">

						<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

						<?php posted_on(); ?>

						<div class="entry">

							<?php the_excerpt(); ?>

						</div>

					</article>

				<?php endwhile; ?>

				<?php post_navigation(); ?>

			<?php else : ?>

				<h2><?php _e('Nothing Found','textdomain'); ?></h2>

			<?php endif; ?>

		</div>

		<div class="col-xs-12 col-md-4">

			<?php get_sidebar(); ?>

		</div>

	</div>

<?php get_footer(); ?>
