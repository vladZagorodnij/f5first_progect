<?php
/*
 * Template Name: Home page
 */
?>

<?php get_header(); ?>

<main id="main" class="page-main" role="main">
  <div class="container">
    <section class="page-main-image">
      <div class="page-main-image__container clearfix">
        <div class="page-main-image__left">
          <h1 class="main-header"><?php bloginfo('name'); ?><span class="dots">...</span></h1>
          <div class="main-image">
            <img src="<?php echo CFS()->get('main_image'); ?>" alt="">
          </div>
        </div>
        <div class="page-main-mage__right">
          <div class="page-main-mage__background"></div>
        </div>
      </div>
    </section>
  </div>
  
  <section class="welcome">
    
    <div class="container container-section">
      
      <div class="section-main-container invisible-left section-welcome-left">
        <div class="section-first-item">
          <div class="section-header">
            <h4 class="header_in_box"><?php echo CFS()->get('welcome_header'); ?></h4>
          </div>
        </div>
        <div class="section-main-container__image">
          <img src="<?php echo CFS()->get('welcome_image_first'); ?>" alt="">
        </div>
      </div>

      <div class="section-second-item invisible-right section-welcome-right">
        <div>
          <img src="<?php echo CFS()->get('welcome_image_second'); ?>" alt="">
        </div>
        <div class="section-second-item__text">
          <p class="text_in_box"><?php echo CFS()->get('welcome_text'); ?></p>
        </div>
      </div>
      
    </div>
    
  </section>

  <section class="services">
    <div class="container">
      <div class="services-header">
        <h2 class="home-section-header"><?php echo CFS()->get('section_services_header'); ?></h2>
      </div>
      <ul class="services-items">
        <?php
        $args = [
          'post_type' => 'services'
        ];

        query_posts($args);

        while (have_posts()) : the_post();

          get_template_part('template-parts/content', 'services');

          // If comments are open or we have at least one comment, load up the comment template.
          if (comments_open() || get_comments_number()) :
            comments_template();
          endif;

        endwhile; // End of the loop.+
        wp_reset_query();
        ?>
      </ul>
    </div>
  </section>

  <section class="relax">
    
    <div class="container container-relax">

      <div class="relax-first-item invisible-left">
        <div>
          <img src="<?php echo CFS()->get('relax_image_second'); ?>" alt="">
        </div>
        <div class="relax-first-item__text">
          <p class="text_in_box"><?php echo CFS()->get('relax_text'); ?></p>
        </div>
      </div>

      <div class="relax-main-container invisible-right">
        <div class="relax-second-item">
          <div class="relax-header">
            <h4 class="header_in_box"><?php echo CFS()->get('relax_header'); ?></h4>
          </div>
        </div>
        <div class="relax-main-container__image">
          <img src="<?php echo CFS()->get('relax_image_first'); ?>" alt="">
        </div>
      </div>
      
    </div>

  </section>
  
  <section class="partners">
    
    <div class="container">
      
      <div class="partners-header">
        <h2 class="home-section-header"><?php echo CFS()->get('partners_header'); ?></h2>
      </div>
      <ul class="partners-items">
        <?php
        $fields = CFS()->get( 'partner' );
        foreach ( $fields as $field ) {
          ?>
          <li>
            <img src="<?php echo $field['partners_icon'];?>" alt="">
          </li>
        <?php }
        wp_reset_query();?>
      </ul>
      
    </div>
    
  </section>

  <section class="beauty">
    
    <div class="container container-section">
      
      <div class="section-main-container section-beauty-left invisible-left">
        <div class="section-first-item">
          <div class="section-header">
            <h4 class="header_in_box"><?php echo CFS()->get('beauty_header'); ?></h4>
          </div>
        </div>
        <div class="section-main-container__image">
          <img src="<?php echo CFS()->get('beauty_image_first'); ?>" alt="">
        </div>
      </div>

      <div class="section-second-item section-beauty-right invisible-right">
        <div>
          <img src="<?php echo CFS()->get('beauty_image_second'); ?>" alt="">
        </div>
        <div class="section-second-item__text" id="button">
          <div class="text_in_box-container">
            <p class="text_in_box"><?php echo CFS()->get('beauty_text'); ?></p>
          </div>
          <div class="beauty-button">
            <a href="<?php echo get_page_link('23'); ?>"><?php echo CFS()->get('button_label'); ?></a>
          </div>
        </div>
      </div>
      
    </div>
    
  </section>

  <section class="news">
    <div class="container">
      <div class="news-header">
        <h2 class="home-section-header"><?php echo CFS()->get('news_header'); ?></h2>
      </div>
      <div>
        <ul class="news-items">
          <?php
          $args = [
            'post_type' => 'post',
            'posts_per_page' => 4,
          ];

          query_posts($args);

          while (have_posts()) : the_post();


            get_template_part('template-parts/content', 'news');

            // If comments are open or we have at least one comment, load up the comment template.
            if (comments_open() || get_comments_number()) :
              comments_template();
            endif;

          endwhile; // End of the loop.
          wp_reset_query();
          ?>
        </ul>
      </div>
    </div>
  </section>

  <section class="instagram">
    
    <div class="container container-instagram">
      
      <div class="instagram-header">
        <div class="instagram-header-container">
          <div>
            <h4 class="header_in_box"><?php echo CFS()->get('instagram_header'); ?></h4>
            <p><?php echo CFS()->get('instagram_text'); ?></p>
          </div>
        </div>
      </div>
      <div class="instagram-items">
        <?php echo do_shortcode('[instagram-feed showbutton=false]'); ?>
      </div>
      
    </div>
    
  </section>

</main>

<?php get_footer(); ?>
