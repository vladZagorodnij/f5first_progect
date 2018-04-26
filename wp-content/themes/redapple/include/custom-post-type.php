<?php
/**
* Create custom post types.
*/
add_action('init', 'create_posttype');

function create_posttype()
{
  register_post_type('testimonials',
    array(
      'supports' => array('title', 'editor'),
      'labels' => array(
        'name' => __('Testimonials'),
        'singular_name' => __('Testimonial')
      ),
      'public' => true,
      'menu_position' => 5,
      'menu_icon' => 'dashicons-format-quote',
      'rewrite' => array('slug' => 'testimonials'),
      )
  );
  register_post_type('logo',
    array(
      'supports' => array('title', 'image'),
      'labels' => array(
        'name' => __('logo'),
        'singular_name' => __('logo')
      ),
      'public' => true,
      'menu_position' => 6,
      'menu_icon' => 'dashicons-images-alt2',
      'rewrite' => array('slug' => 'logo'),
      )
  );

  register_post_type( 'services',
    // CPT Options
    array(
      'labels' => array(
        'name' => __( 'Services' ),
        'singular_name' => __( 'Services' )
      ),
      'public' => true,
      'has_archive' => true,
      'rewrite' => array('slug' => 'services'),
    )
  );

  register_post_type( 'our-team',
    // CPT Options
    array(
      'labels' => array(
        'name' => __( 'Our team' ),
        'singular_name' => __( 'Our team' )
      ),
      'public' => true,
      'has_archive' => true,
      'rewrite' => array('slug' => 'our-team'),
    )
  );

  register_post_type( 'gallery',
    // CPT Options
    array(
      'labels' => array(
        'name' => __( 'Gallery' ),
        'singular_name' => __( 'Gallery' ),
      ),
      'public' => true,
      'has_archive' => true,
      'rewrite' => array('slug' => 'gallery'),
      'taxonomies'  => array( 'album' )
    )
  );

  register_post_type( 'vacancies',
    // CPT Options
    array(
      'labels' => array(
        'name' => __( 'Vacancies' ),
        'singular_name' => __( 'Vacancy' ),
      ),
      'public' => true,
      'has_archive' => true,
      'rewrite' => array('slug' => 'vacancies'),
    )
  );
  
}

// remove editor from custom post types

add_action( 'init', function() {
  remove_post_type_support( 'services', 'editor' );
  remove_post_type_support( 'gallery', 'editor' );
  remove_post_type_support( 'our-team', 'editor' );
  remove_post_type_support( 'vacancies', 'editor' );
}, 99);

// add taxonomy

add_action('init', 'create_taxonomy');

function create_taxonomy(){
  
  register_taxonomy('album', 'gallery', array(
    'labels'                => array(
      'name'              => 'Albums',
      'singular_name'     => 'Album',
      'search_items'      => 'Search Albums',
      'all_items'         => 'All Albums',
      'view_item '        => 'View Album',
      'parent_item'       => 'Parent Album',
      'parent_item_colon' => 'Parent Album:',
      'edit_item'         => 'Edit Album',
      'update_item'       => 'Update Album',
      'add_new_item'      => 'Add New Album',
      'new_item_name'     => 'New Album Name',
      'menu_name'         => 'Album',
    ),
    'description'           => '', 
    'public'                => true,
    'publicly_queryable'    => null, 
    'show_in_nav_menus'     => true, 
    'show_ui'               => true, 
    'show_tagcloud'         => true, 
    'show_in_rest'          => null, 
    'rest_base'             => null, 
    'hierarchical'          => true,
    'update_count_callback' => '',
    'rewrite'               => true,
    //'query_var'             => $taxonomy, // название параметра запроса
    'capabilities'          => array(),
    'meta_box_cb'           => null, 
    'show_admin_column'     => false, 
    '_builtin'              => false,
    'show_in_quick_edit'    => null, 
  ) );
}