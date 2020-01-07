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

function latest_news(){

  $latest_query=new WP_Query(array(
    'posts_per_page' => 6, 
    'post_type' => 'post',
    'post_status' => 'publish',
  ));
  ?>
  <?php  if ($latest_query->have_posts()) : while ($latest_query->have_posts()) : $latest_query->the_post(); ?>
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
  wp_reset_query();

}

function popular_news(){
  //popular posts in tabs front-page
  function filter_where($where = '') {
    $where .= " AND post_date > '" . date('Y-m-d', strtotime('-30 days')) . "'";
    return $where;
  }
  add_filter('posts_where', 'filter_where');

  $popular_query=new WP_Query(array(
    'posts_per_page' => 6, 
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
    <a class="truncate-h aligner" href="<?php the_permalink(); ?>">
      <h3 class="truncate-two"><?php the_title(); ?></h3>
      </a>
      <?php echo '<span class="human-time"><i class="far fa-clock"></i>'. mongolian_time_diff( get_the_time('U'), current_time('timestamp') ) . ' өмнө</span>'; ?>
      <p class="truncate-three"><?php echo get_the_popular_excerpt(220); ?></p>
    </div>
    <?php
    $i++;
    echo "<ul class='also-read'>";
  }
  else{
    ?>
    <li><a class="aligner" href="<?php the_permalink(); ?>"><h3 class="truncate-two"><?php the_title(); ?></h3></a>
    </li>
    <?php
  }
endwhile;
echo "</ul></article>";
wp_reset_query();
}

function get_latest_featured_slider_post($number) { 
  $n = $number;
  $args = array(
    'posts_per_page' => $n,
    'post_type'   => 'post',
    'meta_key'    => 'featured',
    'meta_value'  => 'Yes'
  );
  $the_query = new WP_Query( $args );
  ?>
  <?php if( $the_query->have_posts() ): ?>
    <?php $i=0; while( $the_query->have_posts() ) : $the_query->the_post(); ?>
    <?php $categories = get_the_category(); $cat_name = $categories[0]->cat_name; ?>
    <?php $i++; ?>
    <div class="swiper-slide">
        <a href="<?php the_permalink(); ?>">
          <div class="slide-image">
            <picture>
              <?php the_post_thumbnail('big'); // Declare pixel size you need inside the array ?>
            </picture>
          </div>
          <div class="slide-content">
            <div class="slide-content-sleeve">
              <p class="story-number">
                <span><?php echo $i; ?></span>
                <span class="c3"><?php echo $cat_name; ?></span>
              </p>
              <h2><?php the_title(); ?></h2>
              <p><?php echo get_the_popular_excerpt(150); ?></p>
            </div>
          </div>
        </a>
      </div>
    <?php endwhile; ?>
  <?php endif; ?>
  <?php wp_reset_query(); 
}

function get_latest_featured_slider_bullet($number) {
  $n = $number;
  $args = array(
    'posts_per_page' => $n,
    'post_type'   => 'post',
    'meta_key'    => 'featured',
    'meta_value'  => 'Yes'
  );
  $the_query = new WP_Query( $args );
  ?>
  <?php if( $the_query->have_posts() ): ?>
    <?php while( $the_query->have_posts() ) : $the_query->the_post(); ?>
    <li class="swiper-pagination-bullet"><span><?php the_post_thumbnail('author'); // Declare pixel size you need inside the array ?></span>
    </li>
    <?php endwhile; ?>
  <?php endif; ?>
  <?php wp_reset_query(); 
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
          <a href="f"><h3><?php the_title(); ?></h3>
          </a>
          <?php echo '<span class="human-time"><i class="far fa-clock"></i>'. mongolian_time_diff( get_the_time('U'), current_time('timestamp') ) . ' өмнө</span>'; ?>
          <p><?php echo get_the_popular_excerpt(250); ?></p>
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
                <a href="<?php the_permalink(); ?>">
                  <picture>
                    <?php the_post_thumbnail('normal'); // Declare pixel size you need inside the array ?>
                  </picture>
                </a>
              </div>
              <div class="text">
                <a href="<?php echo $link; ?>" class="cat-tag p-color"><?php echo $name; ?></a>
                <a href="<?php the_permalink(); ?>">
                  <h3 class="truncate-two"><?php the_title(); ?></h3>
                </a>
                  <?php echo '<span class="human-time"><i class="far fa-clock"></i>'. mongolian_time_diff( get_the_time('U'), current_time('timestamp') ) . ' өмнө</span>'; ?>
                  <p><?php echo get_the_popular_excerpt(220); ?></p>
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



/**
 * Determines the difference between two timestamps.
 *
 * The difference is returned in a human readable format such as "1 hour",
 * "5 mins", "2 days".
 *
 * @since 1.5.0
 *
 * @param int $from Unix timestamp from which the difference begins.
 * @param int $to Optional. Unix timestamp to end the time difference. Default becomes time() if not set.
 * @param int $limit Optional. The number of unit types to display (i.e. the accuracy). Defaults to 1. 
 * @return string Human readable time difference.
 */
function mongolian_time_diff( $from, $to = '', $limit = 1 ) {
    // Since all months/years aren't the same, these values are what Google's calculator says
    $units = apply_filters( 'time_units', array(
            31556926 => array( __('%s жилийн'),  __('%s жилийн') ),
            2629744  => array( __('%s сарын'), __('%s сарын') ),
            86400    => array( __('%s өдрийн'),   __('%s өдрийн') ),
            3600     => array( __('%s цагийн'),  __('%s цагийн') ),
            60       => array( __('%s минутын'),   __('%s минутын') ),
    ) );

    if ( empty($to) )
        $to = time();

    $from = (int) $from;
    $to   = (int) $to;
    $diff = (int) abs( $to - $from );

    $items = 0;
    $output = array();

    foreach ( $units as $unitsec => $unitnames ) {
            if ( $items >= $limit )
                    break;

            if ( $diff < $unitsec )
                    continue;

            $numthisunits = floor( $diff / $unitsec );
            $diff = $diff - ( $numthisunits * $unitsec );
            $items++;

            if ( $numthisunits > 0 )
                    $output[] = sprintf( _n( $unitnames[0], $unitnames[1], $numthisunits ), $numthisunits );
    }


    // translators: The seperator for human_time_diff() which seperates the years, months, etc.
    $seperator = _x( ', ', 'human_time_diff' );

    if ( !empty($output) ) {
            return implode( $seperator, $output );
    } else {
            $smallest = array_pop( $units );
            return sprintf( $smallest[0], 1 );
    }
}

add_filter( 'human_time_diff', function($since, $diff, $from, $to) {

    $replace = array(
        'year'  => 'жилийн',
        'years' => 'жилийн',
        'month'  => 'сарын',
        'months' => 'сарын',
        'week'  => 'долоо хоногын',
        'weeks' => 'долоо хоногын',
        'hour'  => 'цагийн',
        'hours' => 'цагийн',
        'day'   => 'өдрийн',
        'days'  => 'өдрийн',
        'min'   => 'минутын',
        'mins'  => 'минутын',
    );

    return strtr($since, $replace);

}, 10, 4 );



function get_story_image () {
   if( have_rows('photo_story') ): ?>
                        <?php $i=0; ?>
                        <h4 style="padding-bottom:10px">Фото түүх</h4>
                        <div id="gallery" class="gallery is-1 is-variable columns is-multiline" itemscope itemtype="http://schema.org/ImageGallery">
                          <?php while( have_rows('photo_story') ): the_row();   
                                $i++;
                            //vars
                                $image = get_sub_field('story_image');
                                $content = get_sub_field('story_text');
                                $size = 'thumbnail';
                                $fullsize = 'big';
                                $thumbnail = $image['sizes'][ $size ];
                                $bigimage = $image['sizes'][ $fullsize ];
                                $width = $image['sizes'][ $fullsize . '-width' ];
                                $height = $image['sizes'][ $fullsize . '-height' ];
                            ?>
                    <!-- Use figure for a more semantic html -->
                    <figure class="column is-one-third" itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
                      <span class="number-pic"><?php echo $i; ?></span>
                      <!-- Link to the big image, not mandatory, but usefull when there is no JS -->
                      <a href="<?php echo esc_url($bigimage); ?>" data-caption="<?php echo $content; ?>" data-width="<?php echo $width; ?>" data-height="<?php echo $height; ?>" itemprop="contentUrl">
                        <!-- Thumbnail -->
                        <img src="<?php echo esc_url($thumbnail); ?>" itemprop="thumbnail" alt="Image description">
                      </a>
                    </figure>
                    <?php endwhile; ?>
                    </div>
            <?php endif; 
}

function ci_get_related_posts( $post_id, $related_count, $args = array() ) {
    $args = wp_parse_args( (array) $args, array(
      'orderby' => 'rand',
      'return'  => 'query', // Valid values are: 'query' (WP_Query object), 'array' (the arguments array)
    ) );

    $related_args = array(
      'post_type'      => get_post_type( $post_id ),
      'posts_per_page' => $related_count,
      'post_status'    => 'publish',
      'post__not_in'   => array( $post_id ),
      'orderby'        => $args['orderby'],
      'tax_query'      => array()
    );

    $post       = get_post( $post_id );
    $taxonomies = get_object_taxonomies( $post, 'names' );

    foreach ( $taxonomies as $taxonomy ) {
      $terms = get_the_terms( $post_id, $taxonomy );
      if ( empty( $terms ) ) {
        continue;
      }
      $term_list                   = wp_list_pluck( $terms, 'slug' );
      $related_args['tax_query'][] = array(
        'taxonomy' => $taxonomy,
        'field'    => 'slug',
        'terms'    => $term_list
      );
    }

    if ( count( $related_args['tax_query'] ) > 1 ) {
      $related_args['tax_query']['relation'] = 'OR';
    }

    if ( $args['return'] == 'query' ) {
      return new WP_Query( $related_args );
    } else {
      return $related_args;
    }
  }