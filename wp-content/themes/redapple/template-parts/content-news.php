<li class="news-item">
  
  <a href="#">
    
    <div class="blog_image">
      <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="">
    </div>

    <div class="news-item-text">
      <header class="entry-header">
        <?php the_title( '<h4 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h4>' ); ?>
      </header>
      <div class="entry-content">
        <?php echo wp_trim_words( get_the_content(), 10 ); ?>
      </div>
      <div class="news-date">
        <?php the_modified_date(); ?>
      </div>
    </div>
    
  </a>

</li>

