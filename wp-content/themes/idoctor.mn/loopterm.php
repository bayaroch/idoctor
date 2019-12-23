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
						<?php 
						$categories = get_the_category();
						if ( ! empty( $categories ) ) {
							$catlink = esc_url( get_category_link( $categories[0]->term_id ) );
							$catname = esc_html( $categories[0]->name );
						} 
						?>
						<a href="<?php echo $catlink; ?>" class="cat-tag p-color c-color" data-evcat="Home Page" data-evact="DailyDose" data-evlabel="Flashback">
                           <?php echo $catname; ?>
						</a>
						<a class="truncate-h aligner" href="<?php the_permalink(); ?>">
							<h3 class="truncate-two"><?php the_title(); ?></h3>
						</a>
						<?php echo '<span class="human-time"><i class="far fa-clock"></i>'. mongolian_time_diff( get_the_time('U'), current_time('timestamp') ) . ' өмнө</span>'; ?>
						<p><?php echo get_the_popular_excerpt(220); ?></p>

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