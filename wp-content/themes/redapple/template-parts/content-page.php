<li class="clearfix blog_item">
  <div class="blog_image">
    <?php exam_post_thumbnail(); ?>
  </div>
  <div class="blog_description">
    <header class="entry-header">
      <?php the_title('<h1 class="entry-title">', '</h1>'); ?>
    </header><!-- .entry-header -->
    <div class="blog_about">
      <p class="blog_author">
        By <?php the_field('author'); ?>
      </p>
      <p class="blog_date">
        <?php the_time('j M Y') ?>
      </p>
    </div>
    <div class="entry-content">
      <?php
      the_content();

      wp_link_pages(array(
        'before' => '<div class="page-links">' . esc_html__('Pages:', 'exam'),
        'after' => '</div>',
      ));
      ?>
    </div>
    <a class="button testimonial_button"
       href="<?php the_permalink(); ?>"><?php echo get_theme_mod('button_testimonials_read_more'); ?></a>
  </div>
</li>
