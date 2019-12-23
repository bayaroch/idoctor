<?php 
/* Template Name: Home */
get_header(); ?>

<div class="home-slider">
  <div class="swiper-container" id="swiper-home">
    <div class="swiper-wrapper">
      <?php get_latest_featured_slider_post(3); ?>
    </div>

  </div>


  <div class="home-slider-navigation">
    <ul class="c11">
      <?php get_latest_featured_slider_bullet(3); ?>
    </ul>

  </div>

</div>

</div>

<section class="news-section section">
  <div class="container">
    <h2 class="section-title">Мэдээ мэдээлэл</h2>
    <div class="cat-list_container">
      <ul class="cat-list">
        <?php brand_nav(); ?>
      </ul>
    </div>

    <div class="columns">
      <div class="column is-one-third">
        <div class="news-sidebar">
          <div class="pdb-tabs">
            <button class="current" data-id="tab1">ШИНЭ</button>
            <button data-id="tab2"  class="">ЭРЭЛТТЭЙ</button>
          </div>
          <div class="tab_container">
            <div id="tab1" class="tab_content">
              <ul class="news-list clearfix">
               <?php latest_news(); ?>
                </ul>
              </div>
               <div id="tab2" class="tab_content">
              <ul class="news-list clearfix">
                <?php popular_news(); ?>
                </ul>
              </div>
            </div>

            <div class="sidebar-footer">
              <a href="">БУСАД МЭДЭЭЛЭЛ</a>
            </div>

          </div>
        </div>
        <div class="column top-stories-column">
          <div class="story-block story-block-large">
          
            <?php get_latest_post_by_type_single('brand', 'aminshim', 1); ?>
          </div>

          <div class="columns story-block">
           <div class="column">
             <?php get_latest_post_by_type_single('brand', 'fit', 1); ?>
            </div>
            <div class="column">
              <?php get_latest_post_by_type_single('brand', 'amarjihui', 1); ?>
              </div>


            </div>


          </div>
        </div>

      </div>
    </section>
    <section class="story-type section">
      <div class="container">
        <div class="featured-news">
          <div class="top-stories-column">
            <div class="story-block story-block-large">
              <?php get_latest_featured_post(); ?>
            </div>
            <div class="columns story-block">
             <div class="column">
                <?php get_latest_posts_by_type ('type', 'news' , 3 ); ?>
             </div>
             <div class="column">
              <?php get_latest_posts_by_type ('type', 'article' , 3 ); ?>
             </div>
             <div class="column">
              <?php get_latest_posts_by_type ('type', 'interview' , 3 ); ?>
             </div>
           </div>
         </div>
       </div>
     </div>
   </section>

   <section class="video-section section">
    <div class="video-section_header">
      <h2>ЦАХИМ ЭМЧ ШОУ</h2>
      <p>НЯМ ГАРАГ БҮР TV 5 ТЕЛЕВИЗЭЭР 18 ЦАГААС</p>
    </div>
    <div class="video-section_content">
      <div class="container">
        <div class="columns">
         <?php get_latest_videos(); ?>
        </div>
      </div>

    </div>

  </div>
  <div class="video-footer">
    <p><i class="fab fa-youtube"></i><a target="_blank" href="https://www.youtube.com/tsahimemch">ЭНД ДАРЖ</a> МАНАЙ YOUTUBE СУВАГТ НЭГДЭЭРЭЙ.  БҮХ ВИДЕО КОНТЕНТИЙГ ХҮЛЭЭН АВАХ БОЛОМЖТОЙ</p>
  </div>

</section>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
