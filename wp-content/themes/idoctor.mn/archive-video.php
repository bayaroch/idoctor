<?php 
get_header(); ?>
	<main class="main" role="main">
		<!-- section -->
     <div class="container">
            <div class="content">

                <h1><span><?php the_title(); ?></span></h1>

			<h1><?php _e( 'Архив', 'html5blank' ); ?></h1>

			<?php get_template_part('loop'); ?>

			<?php get_template_part('pagination'); ?>

          </div>
       </div>
	</main>
<?php get_footer(); ?>
