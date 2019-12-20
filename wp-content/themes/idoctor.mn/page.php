<?php get_header(); ?>

	<main role="main" class="main">
		<!-- section -->
		<section class="page">
		  <div class="container">

			<h1><?php the_title(); ?></h1>

		<?php if (have_posts()): while (have_posts()) : the_post(); ?>

			<!-- article -->
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

				<?php the_content(); ?>


			</article>
			<!-- /article -->

		<?php endwhile; ?>

		<?php else: ?>

			<!-- article -->
			<article>

				<h2><?php _e( 'Уучлаарай. Контент одоогоор алга байна.', 'html5blank' ); ?></h2>

			</article>
			<!-- /article -->

		<?php endif; ?>
		  </div>s

		</section>
		<!-- /section -->
	</main>

<?php get_footer(); ?>
