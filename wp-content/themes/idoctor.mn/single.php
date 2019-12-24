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
						<div class="category-link"><a class="" style="background-color:#0f385a;" href="<?php echo $category_link ?>"><?php echo $first_category->name ?></a></div>
						<h1><?php the_title(); ?></h1>
					</div>
					<div class="author-top_holder"><span class="author-top"><span>Нийтлэгч</span>@<span><?php the_author_posts_link(); ?></span>
						<span>
							<?php 
							$terms = get_terms('type');
							$term = $terms[0];
							$termname = $term->name;
							$termlink = get_term_link($term->slug, 'type');
							?>
							Төрөл: <a href="<?php echo $termlink; ?>"><?php echo $termname; ?></a>
						</span>
					</span></div>
				</div>
			</div>
		</div>
		<div class="post-container">
			<div class="columns reverse-columns">
				<div class="column is-three-quarters content-column">
					<div class="content">
						<!-- article -->
						<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
							<?php the_content(); // Dynamic Content ?>

							<?php get_story_image (); ?>

							<?php the_tags( __( 'Агуулга: ', 'html5blank' ), ', ', ''); // Separated by commas with a line break at the end ?>
							<?php setPostViews(get_the_ID()); ?>
						</article>
						<!-- /article -->

					<?php endwhile; ?>

					<?php else: ?>

						<!-- article -->
						<article>

							<h1><?php _e( 'Уучлаарай. Контент одоогоор алга байна.', 'html5blank' ); ?></h1>

						</article>
						<!-- /article -->

					<?php endif; ?>

				</div>
			</div>
			<div class="column">
				<div class="post-info">
					<?php 
					$bterms = get_the_terms( $post->ID, 'brand');
					$bterm = $bterms[0];
					$btermname = $bterm->name;
					$btermlink = get_term_link($bterm->slug, 'brand');
					?>
					<?php if ( !empty( $bterms ) ){ ?>
						<div class="post-brand_info">
							<a href="<?php echo $btermlink; ?>"><?php echo $btermname; ?></a>
						</div>
					<?php } ?>
					<div class="total_views_count"><i class="fas fa-eye"></i><?php echo getPostViews(get_the_ID()); ?></div>
					<div class="post_date_info"><i class="far fa-clock"></i><?php the_time('Y.m.d'); ?></div>
					<div class="post-tag_info"><?php the_tags( __( 'Агуулга: ', 'html5blank' ), ', ', '' ); // Separated by commas with a line break at the end. ?></div>
				</div>
				<div class="post-info">
					<p>Нийтлэсэн:</p>
					<div class="author_name_single"><?php the_author_posts_link(); ?></div>
					<div class="author_image_single">
						<?php
						$author_id = get_the_author_meta('ID');
						$avatar_url = get_field( "avatar" ,'user_'. $author_id); 
						?>
						<img src="<?php echo $avatar_url ?>" alt="image" />
					</div>
				</div>
				<div class="post-info">
					<!-- Go to www.addthis.com/dashboard to customize your tools -->
					<div class="addthis_inline_share_toolbox_lzti"></div>
				</div>

			</div>

		</div>

		
		<?php $related = ci_get_related_posts( get_the_ID(), 3 ); 
		if ( $related->have_posts() ): ?>
			<div class="columns is-multiline story-block related-block">
				<?php while ( $related->have_posts() ): $related->the_post(); ?>
					<div class="column is-one-third">
						<article class="card" id="post-<?php the_ID(); ?>">
							<div class="image">
								<a href="<?php the_permalink(); ?>">
									<picture>
										<?php the_post_thumbnail('thumbnail'); // Declare pixel size you need inside the array ?>
									</picture>
								</a>
							</div>
							<div class="text pt10 text-related">
								<a class="truncate-h aligner" href="<?php the_permalink(); ?>">
									<h3 class="truncate-two"><?php the_title(); ?></h3>
								</a>
								<?php echo '<span class="human-time"><i class="far fa-clock"></i>'. mongolian_time_diff( get_the_time('U'), current_time('timestamp') ) . ' өмнө</span>'; ?>						
							</div>
						</article>
					</div>
				<?php endwhile; ?>
			</div>
			<?php
		endif;
		wp_reset_postdata(); ?>

	</div>

</div>

</main>

<!-- Go to www.addthis.com/dashboard to customize your tools -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-4e83ff6441206ade"></script>

<?php get_footer(); ?>
