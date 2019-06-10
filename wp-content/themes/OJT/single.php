<?php get_header(); ?>

<div class="container-fluid">
  <div class="row">
    <div class="col-sm-2"></div>
    <div class="col-sm-7">
      <?php if(have_posts()): the_post(); ?>
        <article>
          <div class="article">
<!--                 <div class="breadcrumbs">
                        <?php if(function_exists( 'bcn_display' )) {
                              bcn_display();
                         }?>
                </div>            
 -->

              <div class="article_img">
                <?php the_post_thumbnail('large'); ?>
              </div>

          <div class= "article_title">    
                          <!--タイトルを取得-->
                          <h1><?php the_title(); ?></h1> 
                          <!--投稿日を取得-->
                           <span class="article_date">
                            <i class="fas fa-pencil-alt"></i>
                            <time datetime="<?php echo get_the_date( 'Y-m-d' ); ?>">
                              <?php echo get_the_date(); ?>
                            </time>
                          </span>
                        </div> 
                        <!--本文取得-->
                        <div class="article_content">
                          <?php the_content(); ?>
                        </div>

                      <?php else: ?>
                
                        <p>投稿はありません</p>

        <?php endif; ?>
          <div class="nav-below">
              <span class="pre_text">
                <?php previous_post_link('%link','< 前へ'); ?>
              </span>
          <span class="next_text">  
                <?php next_post_link('%link','次へ >'); ?>
          </span>
          </div>

          <!-- <div class="polls">
          <?php wpp_get_mostpopular($wpp); ?>
          </div> -->
          <div class="article_archive">
            <p class="latest_title">お知らせ</p>
              <div class="article_loop">
                <?php query_posts("posts_per_page=3&paged+$paged"); ?>

              <!-- 表示件数を指定するための配列 -->
      <?php $args =  array( 
        'posts_per_page' => 3,
        'post_type' => 'infomation' );?>

<!-- postsの中に表示件数で指定した数の投稿を代入 --> 　　
      <?php $posts = get_posts($args);?>
  
<!-- ここから記事取得のループ -->
  <?php if( have_posts('')): ?>
    <?php foreach ( $posts as $post ):?> 
      <div class="archive_block">
          <span class="archive_cat">
            <?php echo esc_html(get_post_type_object(get_post_type())->label); ?>
          </span>   

          <span class="archive_date">
            <time><?php echo get_the_date( 'Y/m/d' ); ?></time>
          </span>

          <?php the_title( '<h1><a href="'.esc_url( get_permalink() ).'">','</a><h1>' ); ?>
          </div>
        <?php endforeach; ?>
    
      <?php else: ?>
      
      <p>まだ投稿はありません</p>
    
    <?php endif; ?>


              </div>
              </div>

          <div class="list-btn">
            <a href="<?php echo home_url(); ?>">TOPへ</a>
          </div>

      </div>
  
       <div class="col-sm-2">
              <?php get_template_part( 'sidebar' ); ?>
    </div>

     </div>
</div>
</article>

<?php get_footer(); ?>













