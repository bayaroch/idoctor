<?php 
/* Template Name: Archive Page */
get_header(); ?>
	<main class="main" role="main">
		<!-- section -->
     <div class="container">
		<section class="category-loop">

			<h1><?php _e( 'Архив', 'html5blank' ); ?></h1>

			<?php get_template_part('loopterm'); ?>

			<?php get_template_part('pagination'); ?>

		</section>
		<!-- /section -->
       </div>
	</main>
<?php get_footer(); ?>
