<?php get_header(); ?>
<main class="main">
<?php if (have_posts()): while (have_posts()) : the_post(); ?>	
<div class="post-image">
   
	   <div class="image-wrapper">				<?php the_post_thumbnail('big'); // Fullsize image for the single post ?> </div>
</div>
<div class="post-container">
	<div class="columns">
		<div class="column is-three-quarters">



		<!-- article -->
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

			<!-- post thumbnail -->
		
			<!-- /post thumbnail -->

			<!-- post title -->
			<h1>
				<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
			</h1>
			<!-- /post title -->

			<!-- post details -->
			<span class="date"><?php the_time('Y.m.d'); ?> <?php the_time('g:i a'); ?></span>
			<span class="author"><?php _e( 'Published by', 'html5blank' ); ?> <?php the_author_posts_link(); ?></span>
			<span class="comments"><?php if (comments_open( get_the_ID() ) ) comments_popup_link( __( 'Leave your thoughts', 'html5blank' ), __( '1 Comment', 'html5blank' ), __( '% Comments', 'html5blank' )); ?></span>
			<!-- /post details -->

			<?php the_content(); // Dynamic Content ?>

			<?php the_tags( __( 'Tags: ', 'html5blank' ), ', ', '<br>'); // Separated by commas with a line break at the end ?>

			<p><?php _e( 'Categorised in: ', 'html5blank' ); the_category(', '); // Separated by commas ?></p>

			<p><?php _e( 'This post was written by ', 'html5blank' ); the_author(); ?></p>

			<?php edit_post_link(); // Always handy to have Edit Post Links available ?>


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
	    		<div class="author_name_single">Б.Жаргалмаа</div>
	    		<div class="author_image_single">
	    			<img src="<?php echo get_template_directory_uri(); ?>/img/test-author.png" alt="image" />
	    		</div>
	    	</div>
	    </div>

   </div>

</div>

</main>


<?php get_footer(); ?>
