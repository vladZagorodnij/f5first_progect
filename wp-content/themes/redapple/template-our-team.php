<?php
/*
 * Template Name: Our team
 */
?>

<?php get_header(); ?>

<div class="team-header-container">
  
  <div class="container">

    <div class="team-header">
      <h2><?php echo CFS()->get('header'); ?></h2>
    </div>

    <div class="team-main-container">
      <div class="section-main-container team-subheader-container">
        <div class="section-first-item">
          <div class="section-header">
            <h4 class="header_in_box team-sub-header"><?php echo CFS()->get('image_label'); ?></h4>
          </div>
        </div>
        <div class="section-main-container__image team-image">
          <img src="<?php echo CFS()->get('second_image'); ?>" alt="">
        </div>
      </div>

      <div class="team-header-text">
        <p><?php echo CFS()->get('text'); ?></p>
      </div>
    </div>

  </div>
  
</div>

<div class="team-items-container">

  <div class="container">
    
    <ul class="team-items">
      <?php
      $args = [
        'post_type' => 'our-team',
        'posts_per_page' => 6
      ];

      query_posts($args);

      while (have_posts()) : the_post();

        get_template_part('template-parts/content', 'team');

        // If comments are open or we have at least one comment, load up the comment template.
        if (comments_open() || get_comments_number()) :
          comments_template();
        endif;

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
      <div class="more_block show-team-button">
        <div class="btn_more_blocks team-button" id="team_loadmore">
          <div class="container-load-more">
            <div class="team-load-more">
              <p class="btn-text">Show all team</p>
            </div>
          </div>
        </div>
      </div>
    <?php endif;
    wp_reset_query();?>
    
    <div class="background-popup"></div>

  </div>

</div>



<?php get_footer(); ?>
