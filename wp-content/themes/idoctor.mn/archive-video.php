<?php 
/* Template Name: Videos */
get_header(); ?>
<?php
$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
$args = array(
  'posts_per_page' => 42,
  'paged' => $paged,
  'post_type' => 'video',
);
$custom_query = new WP_Query( $args );
?>
<main class="main" role="main">
  <!-- section -->
  <section class="page">
    <div class="container">
        <div class="content">

            <h1><span><?php the_title(); ?></span></h1>

            <div class="columns is-multiline story-block">
                <?php if ($custom_query->have_posts()): while ($custom_query->have_posts()) : $custom_query->the_post(); ?>
                    <div class="column is-one-quarter">
                        <div class="small-video-block">
                            <div class="small-video_news">
                                <a href="<?php the_permalink(); ?>">
                                  <?php the_post_thumbnail('normal'); // Declare pixel size you need inside the array ?>
                                  <h2><?php echo get_the_popular_excerpt(100); ?></h2>
                              </a>
                          </div>
                          <h4 class="truncate-two"><?php the_title(); ?></h4>
                      </div>
                      
                  </div>

              <?php endwhile; ?>

              <?php else: ?>
                <?php if (function_exists("html5wp_pagination")) {
                    html5wp_pagination();
                } ?>
                <!-- article -->
                <article>
                    <h2><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h2>
                </article>
                <!-- /article -->

            <?php endif; ?>
        </div>
    </div>
</div>
</section>
</main>
<?php get_footer(); ?>
