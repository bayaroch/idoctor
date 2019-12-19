<?php get_header(); 
   $term = get_queried_object();
   $path = get_template_directory_uri();
   $defaultimage = $path . "/img/backgrounds/gradiant.jpg";
   $image = get_field('category_image',$term);
   if (!empty($image)) {
    $show = $image;
   }
   else {
    $show = $defaultimage;
   }
?>
	<main class="main" role="main">
        <div class="post-image category-image">
            <?php  $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );  ?>

            <div class="image-wrapper parallax-window"  data-parallax="scroll" data-image-src="<?php echo $show; ?>">   
            </div>
            <div class="meta-data">
                <div class="post-container">
                    <div class="headline-block">
                        <div class="category-link"><a style="background-color:#fff; color:#333;" class="">Контент</a></div>
                        <h1><?php echo $term->name; ?></h1>
                        <p class="cat-desc"><?php echo $term->description; ?></p>
                    </div>
                </div>
            </div>
        </div>
	    <section class="category-loop">
            <div class="container">
               <?php get_template_part('loopterm'); ?>

              <?php get_template_part('pagination'); ?>
            </div>
            
        </section>

			
	</main>
<?php get_footer(); ?>
