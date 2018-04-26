<?php
/*
 * Template Name: Gallery
 */
?>

<?php get_header(); ?>


<main class="gallery-wrapper">

  <div class="container">

    <div class="gallery-header">
      <h2><?php echo CFS()->get('gallery_header'); ?></h2>
    </div>
    
  <div class="portfolioFilter gallery-category">

    <span data-filter="*" class="current gallery-button-all isotop-button active" >All</span>
    <span data-filter=".Hair" class="gallery-button-hair isotop-button">Hair</span>
    <span data-filter=".Salon" class="gallery-button-salon isotop-button">Salon</span>

  </div>

  <div class="portfolioContainer gallery-container">

    <?php
    $args = [
      'post_type' => 'gallery',
      'posts_per_page' => -1
    ];

    query_posts($args);

    while (have_posts()) : the_post();

      get_template_part('template-parts/content', 'gallery');

      // If comments are open or we have at least one comment, load up the comment template.
      if (comments_open() || get_comments_number()) :
        comments_template();
      endif;

    endwhile;
    wp_reset_query();?>

  </div>

  </div>


</main>


<?php get_footer(); ?>
