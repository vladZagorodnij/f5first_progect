<?php
/**
 * theme Theme Customizer
 *
 * @package theme
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function theme_customize_register($wp_customize)
{
  $wp_customize->get_setting('blogname')->transport = 'postMessage';
  $wp_customize->get_setting('blogdescription')->transport = 'postMessage';
  $wp_customize->get_setting('header_textcolor')->transport = 'postMessage';

  // add logo

  $wp_customize->add_setting('logo', array(
    'default' => '',
    'transport' => 'refresh',
  ));

  $wp_customize->add_control(
    new WP_Customize_Image_Control(
      $wp_customize,
      'logo',
      array(
        'label'      => __( 'LOGO', 'theme_name' ),
        'section'    => 'title_tagline',
        'settings'   => 'logo',
//                'context'    => 'your_setting_context'
      )
    )
  );

  //add footer

  $wp_customize->add_setting('text_copyright', array(
    'default' => '',
    'transport' => 'refresh',
  ));

  $wp_customize->add_section('footer', array(
    'title' => __('Footer', 'mytheme'),
    'priority' => 100,
  ));

  $wp_customize->add_control(
    'text_copyright',
    array(
      'label' => __('Text copyright', 'mytheme'),
      'section' => 'footer',
      'settings' => 'text_copyright',
      'type' => 'text',
    )
  );

}

add_action('customize_register', 'theme_customize_register');

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function theme_customize_preview_js()
{
  wp_enqueue_script('theme_customizer', get_template_directory_uri() . '/assets/scripts/customizer.js', array('customize-preview'), false, true);
}

add_action('customize_preview_init', 'theme_customize_preview_js');
