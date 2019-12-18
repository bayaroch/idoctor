	<div class="columns story-block">
		<?php if (have_posts()): while (have_posts()) : the_post(); ?>
			<div class="column is-one-third">
				<article class="story-large card" id="post-<?php the_ID(); ?>">
					<div class="image">
						<a href="#">
							<picture>
								<img src="http://dev.idoctor.com/wp-content/themes/idoctor.mn/img/small-pic2.jpg" alt="How Dazzling Chinese Silk Defeated the Roman Army">
							</picture>
						</a>
					</div>
					<div class="text pt10">
						<a href="#">
							<h3>Эрүүл мэндийн ямар ч асуудалгүй үедээ жирэмсэлбэл хүүхдийн дархлаа сайн </h3>
							<p>Төрөл бүрийн жимс, хүнсний ногоо нь зохистой хооллолтын суурь болдог. Тэдгээр нь илчлэг багатай</p>
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