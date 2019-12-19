	<div class="columns is-multiline story-block">
		<?php if (have_posts()): while (have_posts()) : the_post(); ?>
			<div class="column is-one-third">
				<article class="story-large card" id="post-<?php the_ID(); ?>">
					<div class="image">
						<a href="<?php the_permalink(); ?>">
							<picture>
								 <?php the_post_thumbnail('thumbnail'); // Declare pixel size you need inside the array ?>
							</picture>
						</a>
					</div>
					<div class="text pt10">
						<a href="<?php the_permalink(); ?>">
							<h3><?php the_title(); ?></h3>
							<p><?php echo get_the_popular_excerpt(220); ?></p>
						</a>
						</div>
					</article>
				</div>
			<?php endwhile; ?>

			<?php else: ?>

				<!-- article -->
				<article>
					<h2><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h2>
				</article>
				<!-- /article -->

			<?php endif; ?>
		</div>