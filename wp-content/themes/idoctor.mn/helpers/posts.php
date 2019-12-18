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
  function filter_where($where = '') {
    //posts in the last 30 days
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