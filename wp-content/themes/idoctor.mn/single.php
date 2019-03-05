<?php get_header(); ?>
<main class="main">
	<?php if (have_posts()): while (have_posts()) : the_post(); ?>	
		<div class="post-image">

			<?php  $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );  ?>

			<div class="image-wrapper parallax-window"  data-parallax="scroll" data-image-src="<?php echo $image[0]; ?>">	

			</div>

			<div class="meta-data">
				<div class="post-container">
					<div class="headline-block">
						<?php
						// Get the ID of a given category
						$category = get_the_category();
                        $first_category = $category[0];
						// Get the URL of this category
						$category_link = get_category_link( $category[0]->term_id );
						?>
						<div class="category-link"><a class="" href="<?php echo $category_link ?>"><?php echo $first_category->name ?></a></div>
						<h1><?php the_title(); ?></h1>
					</div>
					<div class="author-top_holder"><span class="author-top"><span>Нийтлэгч</span>@<span><?php the_author_posts_link(); ?></span></span></div>
				</div>
			</div>
		</div>
		<div class="post-container">
			<div class="columns">
				<div class="column is-three-quarters content-column">



					<!-- article -->
					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

						<?php the_content(); // Dynamic Content ?>

						<?php the_tags( __( 'Tags: ', 'html5blank' ), ', ', '<br>'); // Separated by commas with a line break at the end ?>

					</article>
					<!-- /article -->

				<?php endwhile; ?>

				<?php else: ?>

					<!-- article -->
					<article>

						<h1><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h1>

					</article>
					<!-- /article -->

				<?php endif; ?>
			</div>
			<div class="column">
				<div class="post-info">
					<div class="total_views_count"><i class="fas fa-eye"></i>2300</div>
					<div class="post_date_info"><i class="far fa-clock"></i><?php the_time('Y.m.d'); ?></div>
				</div>
				<div class="post-info">
					<p>Нийтлэсэн:</p>
					<div class="author_name_single"><?php the_author_posts_link(); ?></div>
					<div class="author_image_single">
						<img src="<?php echo get_template_directory_uri(); ?>/img/test-author.png" alt="image" />
					</div>
				</div>
			</div>

		</div>

	</div>

</main>


<?php get_footer(); ?>
