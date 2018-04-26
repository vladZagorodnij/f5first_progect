<?php
/*
 * Template Name: Career
 */
?>

<?php get_header(); ?>

<section class="career-header">

  <div class="career-header-image">

    <h1 class="career-main-header"><?php echo CFS()->get('header'); ?><span class="dots">...</span></h1>
    <img  class="career-main-image" src="<?php echo CFS()->get('image'); ?>" alt="">

  </div>

</section>


<section class="assistant">

  <div class="assistant-container">

    <div class="assistant-background">

      <img class="assistant-avatar" src="<?php echo CFS()->get('avatar'); ?>" alt="">
      <h3 class="assistant-header"><?php echo CFS()->get('assistant_header'); ?></h3>
      <p class="assistant-text"><?php echo CFS()->get('text'); ?></p>

    </div>

  </div>

</section>


<section class="vacancies">
  
  <div class="vacancies-container">
    
    <h2 class="vacancies-header"><?php echo CFS()->get('vacancies_header'); ?></h2>

    <ul class="vacancy-items">

      <?php
      $args = [
        'post_type' => 'vacancies',
      ];

      query_posts($args);

      while (have_posts()) : the_post();

        get_template_part('template-parts/content', 'vacancy');

        // If comments are open or we have at least one comment, load up the comment template.
        if (comments_open() || get_comments_number()) :
          comments_template();
        endif;

      endwhile; // End of the loop.
      wp_reset_query()
      ?>

    </ul>
    
  </div>
  
</section>

<section class="apply" id="apply">

  <div class="apply-container">

    <h2 class="form-header"><?php echo CFS()->get('form_header'); ?></h2>

    <div class="apply-form">
      <?php echo do_shortcode("[ninja_form id=15]"); ?>
    </div>

  </div>

</section>


<?php get_footer(); ?>
