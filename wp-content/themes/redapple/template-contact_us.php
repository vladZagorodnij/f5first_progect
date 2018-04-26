<?php
/*
 * Template Name: Contact us
 */
?>

<?php get_header(); ?>

<section class="contact-form">
  <div class="container-contact">

    <div class="contact-header">
      <h2><?php echo CFS()->get('header'); ?></h2>
      <p class="contact-text"><?php echo CFS()->get('text_under_header'); ?></p>
    </div>
    
    <div class="contact-form-container">
      <?php echo do_shortcode("[ninja_form id=1]"); ?>
    </div>

  </div>
</section>

<section class="contact-map">
  <div class="container-contact">
    
    <div class="contact-wrapper clearfix">
      
      <div class="description-container">
        <div class="contact-subheader-container">
          <div class="contact-first-item">
            <div class="contact-background-header">
              <h4 class="header-in-contact"><?php echo CFS()->get('second_header'); ?></h4>
            </div>
          </div>
        </div>
        <div class="description-text">
          <table>
            <tbody>
            <tr>
              <td><i class="icon icon-black-point"></i></td>
              <td class="table-text"><?php echo CFS()->get('address1'); ?></td>
            </tr>
            <tr>
              <td></td>
              <td class="table-text"><?php echo CFS()->get('address2'); ?></td>
            </tr>
            <tr>
              <td></td>
              <td class="table-text"><?php echo CFS()->get('address3'); ?></td>
            </tr>
            <tr>
              <td><i class="icon icon-phone"></i></td>
              <td class="table-text"><?php echo CFS()->get('phone'); ?></td>
            </tr>
            <tr>
              <td><i class="icon icon-mail"></i></td>
              <td class="table-text table-email"><?php echo CFS()->get('email'); ?></td>
            </tr>
            </tbody>
          </table>
        </div>
        <div>

        </div>
      </div>

      <div class="map-container">
        <?php echo do_shortcode('[google_map_easy id="1"]')?>
      </div>
      
    </div>
    
  </div>

</section>

<?php get_footer(); ?>
