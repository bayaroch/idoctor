<?php get_header(); ?>

	<main class="main" role="main">

		 <div class="container">
		 	<?php 
		 	    $author_id = get_the_author_meta('ID');
				$user_info = get_userdata($author_id);
				$first_name = $user_info->first_name;
                $last_name = $user_info->last_name;
				$avatar = get_field('avatar', 'user_'. $author_id);
				$author_profile_url = get_author_posts_url($author_id);
            ?>

		 	    <div class="author-header card">
					<article class="media">
					  <figure class="media-left">
					    <p class="image is-128x128 author-page-img">
					      <img src="<?php echo $avatar; ?>" alt="<?php echo $display_name; ?>" />
					    </p>
					  </figure>
					  <div class="media-content author-content">
					      <h2>
					        Нийтлэгч:<span><?php echo $last_name; ?>.<?php echo $first_name; ?></span></h2>
					        <?php echo wpautop( get_the_author_meta('description') ); ?>
					      </p>
					  </div>
					</article>
		 	    </div>
               <?php get_template_part('loop'); ?>

              <?php get_template_part('pagination'); ?>
         </div>
	
	</main>

<?php get_footer(); ?>
