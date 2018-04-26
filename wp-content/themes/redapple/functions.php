<?php
/**
 * theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package theme
 */

//add footer menu

function wpb_custom_new_menu()
{
  register_nav_menus(
    array(
      'my-custom-menu' => __('Right menu'),
      'my-mobile-menu' => __('Mobile menu'),
    )
  );
}

add_action('init', 'wpb_custom_new_menu');


//ajax for team page

function team_load_posts(){
  $args = unserialize(stripslashes($_POST['query']));
  $args['paged'] = $_POST['page'] + 1; // следующая страница
  $args['post_status'] = 'publish';
  $q = new WP_Query($args);
  if( $q->have_posts() ):
    while($q->have_posts()): $q->the_post();
      ?>
      <li class="team-item">

        <div class="team-item-container">

          <div class="team-item__image">
            <img src="<?php echo CFS()->get('image'); ?>" alt="">

            <div class="team-overlay">

            </div>
            <div class="icon-container">
              <i class="icon icon-plus"></i>
            </div>

          </div>

          <div class="team-item__text">

            <div class="team-text-wrap">
              <h4><?php echo CFS()->get('name'); ?></h4>
              <p class="team-position"><?php echo CFS()->get('position'); ?></p>
            </div>

          </div>
        </div>
        

          <div class="team-popup container-popup">

            <div class="container-icon-close"><i class="icon icon-x"></i></div>
            <h4><?php echo CFS()->get('name'); ?></h4>
            <p class="team-popup-position"><?php echo CFS()->get('position'); ?></p>
            <p class="team-popup-text"><?php echo CFS()->get('about_person'); ?></p>

          </div>



      </li>
      <?php
    endwhile;
  endif;
  wp_reset_postdata();
  die();
}

add_action('wp_ajax_loadmore_team', 'team_load_posts');
add_action('wp_ajax_nopriv_loadmore_team', 'team_load_posts');


//isotope


function load_isotope() {

  wp_enqueue_script( 'isotope-js',  get_stylesheet_directory_uri() . '/assets/scripts/isotope.pkgd.js', true );
}

add_action( 'wp_enqueue_scripts', 'load_isotope' );

//swipebox

//function add_my_stylesheets()
//{
//  $myStyleFile = get_template_directory_uri() . '/assets/scripts/swipebox-master/src/css/swipebox.css';
//  wp_register_style('myStyleSheets', $myStyleFile);
//  wp_enqueue_style('myStyleSheets');
//}
//
//add_action('wp_enqueue_scripts', 'add_my_stylesheets');

function add_ui_stylesheets()
{
  $uiStyleFile = get_template_directory_uri() . '/assets/scripts//jquery-ui/jquery-ui.min.css';
  wp_register_style('uiStyleSheets', $uiStyleFile);
  wp_enqueue_style('uiStyleSheets');
}

add_action('wp_enqueue_scripts', 'add_ui_stylesheets');

function my_script()
{
//  wp_enqueue_script('new_script2', get_template_directory_uri() . '/assets/scripts/swipebox-master/src/js/jquery.swipebox.js');
  wp_enqueue_script('new_script2', get_template_directory_uri() . '/assets/scripts/html5lightbox/html5lightbox.js');
  wp_enqueue_script('new_script3', get_template_directory_uri() . '/assets/scripts/jquery.viewportchecker.min.js');
  wp_enqueue_script('new_script4', get_template_directory_uri() . '/assets/scripts//jquery-ui/jquery-ui.js');

}

add_action('wp_enqueue_scripts', 'my_script');

//edit search form

function html5_search_form() {

  $form = '<section class="search"><form class="search-form" role="search" method="get" id="search-form" action="' . home_url( '/' ) . '" >
     <input class="search-field" type="search" value="' . get_search_query() . '" name="s" id="s" placeholder="What are you looking for?" />
     <button class="search-submit" type="submit" id="searchsubmit" />
           <span><i class="icon icon-search"></i></span>   
      </button>
     </form></section>';

  return $form;

}

add_filter( 'get_search_form', 'html5_search_form' );

//ajax for blog page

function blog_load_posts(){
  $args = unserialize(stripslashes($_POST['query']));
  $args['paged'] = $_POST['page'] + 1; // следующая страница
  $args['post_status'] = 'publish';
  $q = new WP_Query($args);
  if( $q->have_posts() ):
    while($q->have_posts()): $q->the_post();
      ?>
      <li class="blog-item">

        <a href="<?php the_permalink(); ?>">

          <div class="blog-item-shadow">

            <div class="blog_image">
              <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="">
            </div>

            <div class="blog-item-text">
              <header class="entry-header">
                <?php the_title( '<h4 class="entry-title blog-item-header">', '</h4>' ); ?>
              </header>
              <div class="entry-content">
                <?php echo wp_trim_words( get_the_content(), 10 ); ?>
              </div>
              <div class="blog-date">
                <?php the_modified_date(); ?>
              </div>
            </div>

          </div>

        </a>

      </li>
      <?php
    endwhile;
  endif;
  wp_reset_postdata();
  die();
}

add_action('wp_ajax_loadmore_blog', 'blog_load_posts');
add_action('wp_ajax_nopriv_loadmore_blog', 'blog_load_posts');

//add fontawesome

function enqueue_our_required_stylesheets()
{
  wp_enqueue_style('font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
}

add_action('wp_enqueue_scripts', 'enqueue_our_required_stylesheets');

function f5_social_sharing_buttons($content) {
  global $post;
  if(is_singular() || is_home()){

    // Get current page URL
    $f5URL = urlencode(get_permalink());

    // Get current page title
    $f5Title = str_replace( ' ', '%20', get_the_title());

    // Construct sharing URL without using any script
    $twitterURL = 'https://twitter.com/intent/tweet?text='.$f5Title.'&amp;url='.$f5URL.'&amp;';
    $facebookURL = 'https://www.facebook.com/sharer/sharer.php?u='.$f5URL;
    $googleURL = 'https://plus.google.com/share?url='.$f5URL;

    // Add sharing button at the end of page/page content
    $content .= '<div class="f5-social">';
    $content .= '<a class="f5-link f5-twitter" href="'. $twitterURL .'" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a>';
    $content .= '<a class="f5-link f5-facebook" href="'.$facebookURL.'" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a>';
    $content .= '<a class="f5-link f5-googleplus" href="'.$googleURL.'" target="_blank"><i class="fa fa-google-plus" aria-hidden="true"></i></a>';
    $content .= '</div>';

    return $content;
  }else{
    // if not a post/page then don't include sharing button
    return $content;
  }
};

if (!function_exists('theme_setup')) :
  /**
   * Sets up theme defaults and registers support for various WordPress features.
   *
   * Note that this function is hooked into the after_setup_theme hook, which
   * runs before the init hook. The init hook is too late for some features, such
   * as indicating support for post thumbnails.
   */
  function theme_setup()
  {
    /*
     * Let WordPress manage the document title.
     * By adding theme support, we declare that this theme does not use a
     * hard-coded <title> tag in the document head, and expect WordPress to
     * provide it for us.
     */
    add_theme_support('title-tag');

    /*
     * Enable support for Post Thumbnails on posts and pages.
     *
     * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
     */
    add_theme_support('post-thumbnails');

    // This theme uses wp_nav_menu() in one location.
    register_nav_menus(array(
      'menu-1' => esc_html__('Primary', 'theme'),
    ));

    /*
     * Switch default core markup for search form, comment form, and comments
     * to output valid HTML5.
     */
    add_theme_support('html5', array(
      'search-form',
      'comment-form',
      'comment-list',
      'gallery',
      'caption',
    ));

    // Add theme support for selective refresh for widgets.
    add_theme_support('customize-selective-refresh-widgets');
  }
endif;
add_action('after_setup_theme', 'theme_setup');

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function theme_widgets_init()
{
  register_sidebar(array(
    'name' => esc_html__('Sidebar', 'theme'),
    'id' => 'sidebar-1',
    'description' => esc_html__('Add widgets here.', 'theme'),
    'before_widget' => '<section id="%1$s" class="widget %2$s">',
    'after_widget' => '</section>',
    'before_title' => '<h2 class="widget-title">',
    'after_title' => '</h2>',
  ));
}

add_action('widgets_init', 'theme_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function theme_scripts()
{
  // Styles
  //wp_enqueue_style( 'theme-style', get_stylesheet_uri() );
  wp_enqueue_style('normalize', get_template_directory_uri() . '/assets/css/normalize.css');
  wp_enqueue_style('theme-main-style', get_template_directory_uri() . '/assets/dist/main.css');
  wp_enqueue_style('theme-custom-style', get_template_directory_uri() . '/assets/css/custom.css');
  // Scripts
  wp_enqueue_script('theme-script', get_template_directory_uri() . '/assets/scripts/main.js', array('jquery'), false, true);
}

add_action('wp_enqueue_scripts', 'theme_scripts');

/**
 * Clear WP HEAD
 */
//require get_template_directory() . '/include/clear-wp-head.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/include/customizer.php';

/**
 * Create custom post types.
 */
require get_template_directory() . '/include/custom-post-type.php';
