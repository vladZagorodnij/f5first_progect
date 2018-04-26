<?php get_header(); ?>

<section class="single-blog">
  

    <div class="single-blog-container">

      <div class="single-blog-area">

        <div class="single-blog-item">

          <?php while (have_posts()) : the_post(); ?>

            <?php get_template_part('template-parts/content', 'single-blog'); ?>

          <?php endwhile; ?>

        </div>

      </div>

      <div class="sidebar-area">
        <?php get_sidebar(); ?>
      </div>

    </div>
  

</section>

<?php get_footer(); ?>
