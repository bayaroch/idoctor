<?php 
/* Template Name: Home */
get_header(); ?>

<div class="home-slider">
  <div class="swiper-container" id="swiper-home">
    <div class="swiper-wrapper">
      <div class="swiper-slide">
        <a href="">
          <div class="slide-image">
            <picture>
              <img src="<?php echo get_template_directory_uri(); ?>/img/banner.jpg"  alt="banner"/>
            </picture>
          </div>
          <div class="slide-content">
            <div class="slide-content-sleeve">
              <p class="story-number">
                <span>1</span>
                <span class="c3">Ярилцлага</span>
              </p>
              <h2>Мах идэхэд хүний биед дотоод хүчилшилт орчин үүсдэг</h2>
              <p>Шүлтлэг орчин үүсгэдэг хоолоор хүчилшилт орчноо тэнцвэржүүлэхгүй бол олон өвчний суурь нөхцөл болдог.</p>
            </div>
          </div>
        </a>
      </div>
      <div class="swiper-slide">
        <a href="">
          <div class="slide-image">
            <picture>
              <img src="<?php echo get_template_directory_uri(); ?>/img/banner2.jpg"  alt="banner"/>
            </picture>
          </div>
          <div class="slide-content">
            <div class="slide-content-sleeve">
              <p class="story-number">
                <span>1</span>
                <span class="c3">Fast Forward</span>
              </p>
              <h2>Эрүүл ХООЛЛОЛТЫН тухай сонирхолтой 5 БАРИМТ</h2>
              <p>Тэгэхээр би бол хүний их эмч. Хүний биеийн махбодийн бодисын солилцоо, шим тэжээл, хоол зүй, спорт, амьдралын хэв маяг чиглэлд судалдаг. Харин ажиллаж байгаа салбар маань нийгмийн эрүүл мэнд байгаа юм..&nbsp;</p>
            </div>
          </div>
        </a>
      </div>
      <div class="swiper-slide">
        <a href="">
          <div class="slide-image">
            <picture>
              <img src="<?php echo get_template_directory_uri(); ?>/img/banner3.jpg"  alt="banner"/>
            </picture>
          </div>
          <div class="slide-content">
            <div class="slide-content-sleeve">
              <p class="story-number">
                <span>1</span>
                <span class="c3">Fast Forward</span>
              </p>
              <h2>Цахим эмч Б.Баярбямба: Хүн дараах дөрвөн дүрмийг баримталбал эрүүл байна</h2>
              <p>-Ажил, амьдралаа нэг хэмнэлд оруулахаас ер нь зайлсхийдэг. Тогтоол ус өмхийрдөг гэдэг шүү дээ. Шинийг сэтгэж, шинийг эрэлхийлж, өөрийгөө хөгжүүлж байх нь чухал.&nbsp;</p>
            </div>
          </div>
        </a>
      </div>
    </div>

  </div>


  <div class="home-slider-navigation">
    <ul class="c11">
      <li class="swiper-pagination-bullet"><span><img src="<?php echo get_template_directory_uri(); ?>/img/thumb3.jpg" alt=""></span></li>
      <li class="swiper-pagination-bullet"><span><img src="<?php echo get_template_directory_uri(); ?>/img/thumb2.jpg" alt=""></span></li>
      <li class="swiper-pagination-bullet"><span><img src="<?php echo get_template_directory_uri(); ?>/img/thumb1.jpg" alt=""></span></li>
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
                <?php if (have_posts()): $i=1; while (have_posts() && $i < 6) : the_post(); ?>
                 <?php $categories = get_the_category(); $cat_name = $categories[0]->cat_name; ?>
                 <li>
                  <article class="clearfix">
                    <a href="<?php the_permalink(); ?>">
                      <div class="image">
                        <?php the_post_thumbnail('small'); // Declare pixel size you need inside the array ?></div><div class="text"><p class="short-title"><?php echo $cat_name; ?></p><h4><?php the_title(); ?></h4></div>
                      </a>
                    </article>
                  </li>
                  <?php $i++; endwhile; ?>
                  <?php else: ?>
                  <?php endif; ?>
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
      <p>ӨДӨР БҮР TV 5 ТЕЛЕВИЗЭЭР 18 ЦАГААС</p>
    </div>
    <div class="video-section_content">
      <div class="container">
       <div class="columns">
         <div class="column is-four-fifths">
          <div class="big-video_news">
            <span class="new-tag">ШИНЭ ДУГААР</span>
            <a href="#">
              <div class="big-video_image">
                <img src="<?php echo get_template_directory_uri(); ?>/img/video-image.jpg" alt="video"/>
              </div>
            </a>
            <h2><a href="#">109 - Нүдээ хамгаалья / "Цахим Эмч" шоу</a></h2>
            <p>Гар утас, таблет, зурагтны дэлгэцнээс ялгардаг хөх гэрэл нь нүдний хараанд сөргөөр нөлөөлдөг.</p>
          </div>
        </div>
        <div class="column">
          <div class="small-video_news">
            <a href="#">
              <img src="<?php echo get_template_directory_uri(); ?>/img/video-image.jpg" alt="video"/>
              <h2>Нүдээ хамгаалья / "Цахим Эмч" шоу</h2>
            </a>
          </div>
          <div class="small-video_news">
            <a href="#">
              <img src="<?php echo get_template_directory_uri(); ?>/img/video-image.jpg" alt="video"/>
              <h2>Нүдээ хамгаалья / "Цахим Эмч" шоу</h2>
            </a>
          </div>
          <div class="small-video_news">
            <a href="#">
              <img src="<?php echo get_template_directory_uri(); ?>/img/video-image.jpg" alt="video"/>
              <h2>Нүдээ хамгаалья / "Цахим Эмч" шоу</h2>
            </a>
          </div>

        </div>
      </div>

    </div>

  </div>
  <div class="video-footer">
    <p><i class="fab fa-youtube"></i><a href="#">ЭНД ДАРЖ</a> МАНАЙ YOUTUBE СУВАГТ НЭГДЭЭРЭЙ.  БҮХ ВИДЕО КОНТЕНТИЙГ ХҮЛЭЭН АВАХ БОЛОМЖТОЙ</p>
  </div>

</section>

<section class="section section-podcast">
  <div class="container">asdasdds</div>
</section>

<?php get_footer(); ?>
