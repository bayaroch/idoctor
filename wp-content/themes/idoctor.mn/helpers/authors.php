<?php


function get_author_list() {
     $display_admins = false;
 /*    $order_by = 'post_count'; // 'nicename', 'email', 'url', 'registered', 'display_name', or 'post_count'*/
     $order = 'DESC';
     $role = 'author';// 'subscriber', 'contributor', 'editor', 'author' - leave blank for 'all'
     $hide_empty = false; // hides authors with zero posts
		
     if(!empty($display_admins)) {
          $blogusers = get_users('orderby='.$order_by.'&role='.$role);
     } else {

     $admins = get_users('role=administrator');
     $exclude = array();
     
     foreach($admins as $ad) {
          $exclude[] = $ad->ID;
     }

     $exclude = implode(',', $exclude);
     $blogusers = get_users('exclude='.$exclude.'&orderby='.$order_by.'&order='.$order.'&role='.$role);
     }
	
     $authors = array();
     foreach ($blogusers as $bloguser) {
     $user = get_userdata($bloguser->ID);

     if(!empty($hide_empty)) {
          $numposts = count_user_posts($user->ID);
          if($numposts < 1) continue;
          }
          $authors[] = (array) $user;
     }
		
     foreach($authors as $author) {

          $display_name = $author['data']->display_name;
          $avatar = get_field('avatar', 'user_'. $author['ID']);
          $author_profile_url = get_author_posts_url($author['ID']);
          $author_id = $author['ID'];

          ?>

          <div class="swiper-slide author-slide" data-id="<?php echo $author_id; ?>">
                                <a href="<?php echo $author_profile_url; ?>">
                                  <div class="author-box">
                                    <img src="<?php echo $avatar; ?>" alt="<?php echo $display_name; ?>" />
                                    <div class="author-name"><h4><?php echo $display_name; ?></h4></div>
                                  </div>
              </a>
           </div>
          <?php
          }
 
}


function get_author_bio() {
     $display_admins = false;
 /*    $order_by = 'post_count'; // 'nicename', 'email', 'url', 'registered', 'display_name', or 'post_count'*/
     $order = 'DESC';
     $role = 'author'; // 'subscriber', 'contributor', 'editor', 'author' - leave blank for 'all'
     $hide_empty = false; // hides authors with zero posts
		
     if(!empty($display_admins)) {
          $blogusers = get_users('orderby='.$order_by.'&role='.$role);
     } else {

     $admins = get_users('role=administrator');
     $exclude = array();
     
     foreach($admins as $ad) {
          $exclude[] = $ad->ID;
     }

     $exclude = implode(',', $exclude);
     $blogusers = get_users('exclude='.$exclude.'&orderby='.$order_by.'&order='.$order.'&role='.$role);
     }
	
     $authors = array();
     foreach ($blogusers as $bloguser) {
     $user = get_userdata($bloguser->ID);

     if(!empty($hide_empty)) {
          $numposts = count_user_posts($user->ID);
          if($numposts < 1) continue;
          }
          $authors[] = (array) $user;
     }
		
     foreach($authors as $author) {

          $author_id = $author['ID'];
          $author_bio = get_the_author_meta('description', $author['ID']);

          ?>
            <div class="author-content_text" id="author-<?php echo $author_id; ?>"><?php echo $author_bio; ?></div>

          <?php
          }
 
}