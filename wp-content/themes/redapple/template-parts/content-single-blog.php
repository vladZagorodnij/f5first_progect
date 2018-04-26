<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

  <header class="entry-header">
    <?php the_title('<h1 class="single-blog-header">', '</h1>'); ?>
  </header>

  <div class="blog-date">
    <?php the_modified_date(); ?>
  </div>

  <div class="single-blog-featured-image">
    <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="">
  </div>

  <div class="single-blog-content">
    <?php the_content(); ?>
  </div>
  
  <div class="single-blog-video">
    <?php echo CFS()->get('video'); ?>
  </div>
  
  <?php if(CFS()->get('quote')){?>
  <div class="blockquote">
    <p class="blockquote-text"><?php echo CFS()->get('quote');?></p>
    <p class="blockquote_author"><?php echo CFS()->get('quote_author'); ?></p>
  </div>
  <?php } else{} ?>
  
  
  <div class="share-buttons">
    <?php echo f5_social_sharing_buttons($content) ?>
  </div>
  
  
  <div class="single-blog-buttons">

      <div class="previous-button-container">
        <?php previous_post_link('%link', '');?>
      </div>

      <div class="next-button-container">
        <?php next_post_link('%link', '');?>
      </div>
    
  </div>
  

</article>


