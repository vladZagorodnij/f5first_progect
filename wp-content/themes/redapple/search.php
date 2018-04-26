<?php get_header(); ?>

<section class="blog">

  <div class="blog-container">

    <h2 class="blog-header"><?php echo CFS()->get('blog_header'); ?></h2>

    <div class="blog-container__items">

      <div class=" blogs-area">

        <ul class="blog-items clearfix">


          <?php
          while (have_posts()) : the_post();

            get_template_part('template-parts/content', 'blog');

            // If comments are open or we have at least one comment, load up the comment template.

          endwhile; // End of the loop.
          ?>

        </ul>

        <?php if ($wp_query->max_num_pages > 1) : ?>
          <script class="team-ajax-script">
            var ajaxurl = '<?php echo site_url() ?>/wp-admin/admin-ajax.php';
            var true_posts = '<?php echo serialize($wp_query->query_vars); ?>';
            var current_page = <?php echo (get_query_var('paged')) ? get_query_var('paged') : 1; ?>;
            var max_pages = '<?php echo $wp_query->max_num_pages; ?>';
          </script>
          <div class="more_block show-team-button blog-ajax-button">
            <div class="btn_more_blocks team-button" id="blog_loadmore">
              <div class="container-load-more">
                <div class="team-load-more">
                  <p class="btn-text">Show me more</p>
                </div>
              </div>
            </div>
          </div>
        <?php endif;
        wp_reset_query(); ?>

      </div>

      <div class="sidebar-area">
        <?php get_sidebar(); ?>
      </div>

    </div>

  </div>

</section>


<?php
get_footer(); ?>
