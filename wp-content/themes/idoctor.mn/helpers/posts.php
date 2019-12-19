<?php
// Page views
function getPostViews($postID){
  $count_key = 'post_views_count';
  $count = get_post_meta($postID, $count_key, true);
  if($count==''){
    delete_post_meta($postID, $count_key);
    add_post_meta($postID, $count_key, '0');
    return "0 Үзсэн";
  }
  return $count.' Үзсэн';
}
function setPostViews($postID) {
  $count_key = 'post_views_count';
  $count = get_post_meta($postID, $count_key, true);
  if($count==''){
    $count = 0;
    delete_post_meta($postID, $count_key);
    add_post_meta($postID, $count_key, '0');
  }else{
    $count++;
    update_post_meta($postID, $count_key, $count);
  }
}

function popular_news(){
  //popular posts in tabs front-page
  function filter_where($where = '') {
    $where .= " AND post_date > '" . date('Y-m-d', strtotime('-30 days')) . "'";
    return $where;
  }
  add_filter('posts_where', 'filter_where');

  $popular_query=new WP_Query(array(
    'showposts'=>6,
    'meta_key'=>'post_views_count',
    'orderby'=>'meta_value_num',
    'order'=>'DESC'
  ));
  ?>
  <?php  if ($popular_query->have_posts()) : while ($popular_query->have_posts()) : $popular_query->the_post(); ?>
   <?php $categories = get_the_category(); $cat_name = $categories[0]->cat_name; ?>
   <li>
    <article class="clearfix">
      <a href="<?php the_permalink(); ?>">
        <div class="image">
          <?php the_post_thumbnail('small'); // Declare pixel size you need inside the array ?></div><div class="text"><p class="short-title"><?php echo $cat_name; ?></p><h4><?php the_title(); ?></h4></div>
        </a>
      </article>
    </li>
    <?php
  endwhile; endif;
  remove_filter('posts_where', 'filter_where');
  wp_reset_query();

}

function get_latest_posts_by_type($tax, $slug , $count) {
  // query latest news by term type
  $slugname = $slug;
  $countnumber = $count;
  $taxonomy = $tax;
  $term = get_term_by('slug', $slug, $tax);
  $name = $term->name;
  $link = get_term_link($term);
  $the_query = new WP_Query( array(
    'posts_per_page' => $countnumber,
    'post_type' => 'post',
    'tax_query' => array(
      array (
        'taxonomy' => $tax,
        'field' => 'slug',
        'terms' => $slugname,
      )
    ),
  ) );
  $i=0; while ( $the_query->have_posts() ) :
  echo "<article class='story-large card'>";
  $the_query->the_post();
  if ($i==0) { 
     ?>
    <div class="image">
      <a href="<?php the_permalink(); ?>">
        <picture>
         <?php the_post_thumbnail('thumbnail'); // Declare pixel size you need inside the array ?>
       </picture>
     </a>
   </div>
   <div class="text">
    <a href="<?php echo $link; ?>" class="cat-tag p-color"><?php echo $name; ?></a>
    <a href="<?php the_permalink(); ?>">
      <h3><?php the_title(); ?></h3>
      <p><?php echo get_the_popular_excerpt(220); ?></p></a>
    </div>
    <?php
    $i++;
    echo "<ul class='also-read'>";
  }
  else{
    ?>
    <li><a href="<?php the_permalink(); ?>"><h3><?php the_title(); ?></h3></a></li>
    <?php
  }
endwhile;
echo "</ul></article>";
wp_reset_query();
}

function get_latest_featured_post() {
  $args = array(
    'posts_per_page' => 1,
    'post_type'   => 'post',
    'meta_key'    => 'featured',
    'meta_value'  => 'Yes'
  );
  $the_query = new WP_Query( $args );
  ?>
  <?php if( $the_query->have_posts() ): ?>
    <?php while( $the_query->have_posts() ) : $the_query->the_post(); ?>
      <article class="story-large card">
        <div class="image">
          <a href="<?php the_permalink(); ?>">
             <?php the_post_thumbnail('large'); // Declare pixel size you need inside the array ?>
          </a>
        </div>
        <div class="text">
          <a href="" class="cat-tag p-color">ОНЦЛОХ</a>
          <a href="<?php the_permalink(); ?>"><h3><?php the_title(); ?></h3>
            <p><?php echo get_the_popular_excerpt(250); ?></p>
          </a>
        </div>
      </article>
    <?php endwhile; ?>
  <?php endif; ?>
  <?php wp_reset_query(); 
}


function get_latest_post_by_type_single($tax, $slug , $count) {
  // query latest news by term type
  $slugname = $slug;
  $countnumber = $count;
  $taxonomy = $tax;
  $term = get_term_by('slug', $slug, $tax);
  $name = $term->name;
  $link = get_term_link($term);
  $the_query = new WP_Query( array(
    'posts_per_page' => $countnumber,
    'post_type' => 'post',
    'tax_query' => array(
      array (
        'taxonomy' => $tax,
        'field' => 'slug',
        'terms' => $slugname,
      )
    ),
  ) );
  while ( $the_query->have_posts() ) :
  $the_query->the_post();
   ?>
    <article class="story-large card">
              <div class="image">
                <a href="#">
                  <picture>
                    <?php the_post_thumbnail('normal'); // Declare pixel size you need inside the array ?>
                  </picture>
                </a>
              </div>
              <div class="text">
                <a href="<?php echo $link; ?>" class="cat-tag p-color"><?php echo $name; ?></a>
                <a href="<?php the_permalink(); ?>">
                  <h3><?php the_title(); ?></h3>
                  <p><?php echo get_the_popular_excerpt(220); ?></p></a>
                </div>
     </article>
    <?php
  endwhile;
wp_reset_query();
}


function get_latest_videos() {
  // query latest news by term type
  $args = array(  
        'post_type' => 'video',
        'post_status' => 'publish',
        'posts_per_page' => 4, 
  );
  $loop = new WP_Query( $args ); 

  $i=0; while ( $loop->have_posts() ) :
  $loop->the_post();
  if ($i==0) { 
     ?>
     <div class="column is-four-fifths">
          <div class="big-video_news">
            <span class="new-tag">ШИНЭ ДУГААР</span>
            <a href="<?php the_permalink(); ?>">
              <div class="big-video_image">
                <?php the_post_thumbnail('large'); // Declare pixel size you need inside the array ?>
              </div>
            </a>
            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
            <p><?php echo get_the_popular_excerpt(220); ?></p>
          </div>
      </div>
    <?php
    $i++;
    echo  "<div class='column'>";
  }
  else{
    ?>
    <div class="small-video_news">
            <a href="<?php the_permalink(); ?>">
              <?php the_post_thumbnail('normal'); // Declare pixel size you need inside the array ?>
              <h2><?php the_title(); ?></h2>
            </a>
    </div>
    <?php
  }
endwhile;
echo "</div>";
wp_reset_query();
}

function get_the_popular_excerpt($length){
  $excerpt = get_the_content();
  $excerpt = preg_replace(" (\[.*?\])",'',$excerpt);
  $excerpt = strip_shortcodes($excerpt);
  $excerpt = strip_tags($excerpt);
  $excerpt = substr($excerpt, 0, $length);
  $excerpt = substr($excerpt, 0, strripos($excerpt, " "));
  $excerpt = trim(preg_replace( '/\s+/', ' ', $excerpt));

  return $excerpt;
}