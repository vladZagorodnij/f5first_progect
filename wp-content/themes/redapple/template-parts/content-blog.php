<li class="blog-item">

  <a href="<?php the_permalink(); ?>">
    
    <div class="blog-item-shadow">

      <div class="blog_image">
        <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="">
      </div>

      <div class="blog-item-text">
        <header class="entry-header">
          <?php the_title( '<h4 class="entry-title blog-item-header">', '</h4>' ); ?>
        </header>
        <div class="entry-content">
          <?php echo wp_trim_words( get_the_content(), 10 ); ?>
        </div>
        <div class="blog-date">
          <?php the_modified_date(); ?>
        </div>
      </div>
      
    </div>

  </a>

</li>



