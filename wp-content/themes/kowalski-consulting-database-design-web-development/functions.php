 <?php
/**
 * Kowalski Consulting Database Design Web Development functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Kowalski_Consulting_Database_Design_Web_Development
 */
if ( ! defined( '_S_VERSION' ) ) {
// Replace the version number of the theme on each release.
define( '_S_VERSION', '1.0.0' );
}
if ( ! function_exists( 'kowalski_consulting_database_design_web_development_setup' ) ) :
/**
* Sets up theme defaults and registers support for various WordPress features.
*
* Note that this function is hooked into the after_setup_theme hook, which
* runs before the init hook. The init hook is too late for some features, such
* as indicating support for post thumbnails.
*/
function kowalski_consulting_database_design_web_development_setup() {
/*
* Make theme available for translation.
* Translations can be filed in the /languages/ directory.
* If you're building a theme based on Kowalski Consulting Database Design Web Development, use a find and replace
* to change 'kowalski-consulting-database-design-web-development' to the name of your theme in all the template files.
*/
load_theme_textdomain( 'kowalski-consulting-database-design-web-development', get_template_directory() . '/languages' );
// Add default posts and comments RSS feed links to head.
add_theme_support( 'automatic-feed-links' );
/*
* Let WordPress manage the document title.
* By adding theme support, we declare that this theme does not use a
* hard-coded <title> tag in the document head, and expect WordPress to
* provide it for us.
*/
add_theme_support( 'title-tag' );
/*
 * Enable support for Post Thumbnails on posts and pages.
 *
 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
 */
add_theme_support( 'post-thumbnails' );
/*
 * Switch default core markup for search form, comment form, and comments
 * to output valid HTML5.
 */
add_theme_support(
'html5',
array(
'search-form',
'comment-form',
'comment-list',
'gallery',
'caption',
'style',
'script',
)
);
// Set up the WordPress core custom background feature.
add_theme_support(
'custom-background',
apply_filters(
'kowalski_consulting_database_design_web_development_custom_background_args',
array(
'default-color' => 'ffffff',
'default-image' => '',
)
)
);
// Add theme support for selective refresh for widgets.
add_theme_support( 'customize-selective-refresh-widgets' );
/**
 * Add support for core custom logo.
 *
 * @link https://codex.wordpress.org/Theme_Logo
 */
add_theme_support(
'custom-logo',
array(
'height'=> 250,
'width' => 250,
'flex-width'=> true,
'flex-height' => true,
)
);
}
endif;
add_action( 'after_setup_theme', 'kowalski_consulting_database_design_web_development_setup' );
/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function kowalski_consulting_database_design_web_development_content_width() {
$GLOBALS['content_width'] = apply_filters( 'kowalski_consulting_database_design_web_development_content_width', 640 );
}
add_action( 'after_setup_theme', 'kowalski_consulting_database_design_web_development_content_width', 0 );
/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function kowalski_consulting_database_design_web_development_widgets_init() {
register_sidebars( 9, array( 'name' => 'sidebar-%d' ));
}
add_action( 'widgets_init', 'kowalski_consulting_database_design_web_development_widgets_init' );
//widget
function footplus_widgets_init() {
 // First footer widget area, located in the footer. 
register_sidebar( array(
'name' => __( 'First Footer Widget Area', 'footplus' ),
'id' => 'first-footer-widget-area',
'description' => __( 'The first footer widget area', 'footplus' ),
) );
}
add_action( 'widgets_init', 'footplus_widgets_init' );
function blog_szkolenia() {
// Sidebar - blog szkolenia. 
register_sidebar( array(
'name' => __( 'Post Blog Szkolenia', 'footplus' ),
'id' => 'sidebar-szkolenia',
'description' => __( 'Post Blog Wordpres Sidebar', 'footplus' ),
) );
}
add_action( 'widgets_init', 'blog_szkolenia' );
function blog_wordpress() {
// Sidebar - blog - Wordpress. 
register_sidebar( array(
'name' => __( 'Post Blog Wordpress', 'footplus' ),
'id' => 'sidebar-wordpress',
'description' => __( 'Post Blog Wordpress Sidebar', 'footplus' ),
) );
}
add_action( 'widgets_init', 'blog_wordpress' );
// sidevar
function blog_woocommerce() {
// Sidebar - blog - Woocommerce. 
register_sidebar( array(
'name' => __( 'Post Blog Woocommerce', 'footplus' ),
'id' => 'sidebar-woocommerce',
'description' => __( 'Post Blog Woocommerce Sidebar', 'footplus' ),
) );
}
add_action( 'widgets_init', 'blog_woocommerce');
function buttonschool_widgets_init() {
// widget area for modal course submiting form. 
register_sidebar( array(
'name' => __( 'Button School Form', 'buttonschool' ),
'id' => 'button-school-widget-area',
'description' => __( 'Button school submiting form area', 'buttonschool' ),
) );
}
add_action( 'widgets_init', 'buttonschool_widgets_init' );
function wordpress_widgets_init() {
// widget area for modal wordpress plugin submiting form. 
register_sidebar( array(
'name' => __( 'Wordpress Form', 'buttonwordpress' ),
'id' => 'button-wordpress-widget-area',
'description' => __( 'Button Wordpress submiting form area', 'buttonwordpress' ),
) );
}
add_action( 'widgets_init', 'wordpress_widgets_init' );
function woocommerce_widgets_init() {
// widget area for modal woocomnmerce plugin submiting form. 
register_sidebar( array(
'name' => __( 'Woocommerce Form', 'buttonwoocommerce' ),
'id' => 'button-woocommerce-widget-area',
'description' => __( 'Button Woocommerce submiting form area', 'buttonwoocommerce' ),
) );
}
add_action( 'widgets_init', 'woocommerce_widgets_init' );
/**
 * Enqueue scripts and styles.
 */
/*Section for enqueuing styles and scripts*/
function keyword_theme_styles_and_scripts(){
if(is_page() || is_404() || is_search() || is_archive() || is_author() || is_admin() || is_category() || is_home() || is_single() || is_tag() && 'post' == get_post_type() ) {
/* Styles CSS Below */
wp_enqueue_style('bootstrap-min-css', get_template_directory_uri().'/assets/css/bootstrap/bootstrap.min.css', array(), '1.0.0', 'all' );
wp_enqueue_style('main-css', get_template_directory_uri().'/style.css', array(), '1.0.0', 'all');
 /* Styles Below */
wp_enqueue_style('boxicons-js-min-css', get_template_directory_uri().'/assets/css/boxicons/css/boxicons.min.css'); 
wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&display=swap',array(), null );
wp_enqueue_style('font-awesome-min-css', get_template_directory_uri().'/assets/css/fontawesome-free-5.15.3-web/css/all.css', array(),'1.0.0', 'all');
wp_enqueue_style('font-awesome-min-css', get_template_directory_uri().'/assets/css/fontawesome-free-5.15.3-web/css/solid.css', array(),'1.0.0', 'all');
/* Scripts Below */
wp_enqueue_script('jquery-3.2.1-min-js', get_template_directory_uri().'/assets/js/jquery-3.2.1.min.js',array('jquery'), null, true);
wp_enqueue_script('jquery-1.12.4-min-js', 'https://code.jquery.com/jquery-1.12.4.min.js',array('jquery'), null, true);
wp_enqueue_script('bootstrap-bundle-min-js', get_template_directory_uri(). '/assets/js/js/bootstrap.bundle.min.js',array(), null, true);
}
/*
* Enqueue scrpits.js if file scrpits.js exists
*/
wp_enqueue_script('scripts', get_template_directory_uri() . '/assets/js/scripts.js', array('jquery'), null,true);
wp_enqueue_script('preloader', get_template_directory_uri() . '/assets/js/preloader.js', array('jquery'), null,true);
}
add_action('wp_enqueue_scripts', 'keyword_theme_styles_and_scripts');
function other_defer_scripts( $tag, $handle, $src ) {
$defer = array( 
'google-fonts',
'style-klaro'
);
if ( in_array( $handle, $defer ) ) {
return '<script src="' . $src . '" defer="defer" type="text/css"></script>' . "\n";
}
return $tag;
} 
add_filter( 'style_loader_tag', 'other_defer_scripts', 10, 4 );
// Load in our JS to comment-reply
function wptags_enqueue_scripts() {
// wp_enqueue_script( 'theme-js', get_stylesheet_directory_uri() . '/assets/js/theme.js', [], time(), true );
wp_enqueue_script( 'jquery-theme-js', get_stylesheet_directory_uri() . '/assets/js/jquery.theme.js', [ 'jquery' ], time(), true );
if ( is_singular() && comments_open() ) {
wp_enqueue_script( 'comment-reply' );
}
}
add_action( 'wp_enqueue_scripts', 'wptags_enqueue_scripts' );
// Klaro files enqueuing
function klaro_scripts() {
wp_enqueue_style('klaro-css', get_template_directory_uri().'/style-klaro.css', false, '1.0.0', 'all');
 wp_enqueue_script('config', get_template_directory_uri() . '/assets/klaro/config.js',array('jquery'), null,true);
 wp_enqueue_script('klaro', get_template_directory_uri() . '/assets/klaro/klaro.js',array('jquery'), null,true);
}
add_action('wp_enqueue_scripts', 'klaro_scripts');
//Klaro scripts defferring
function mind_defer_scripts( $tag, $handle, $src ) {
$defer = array( 
'config',
'klaro',
'bootstrap-bundle-min-js',
);
if ( in_array( $handle, $defer ) ) {
return '<script src="' . $src . '" defer="defer" type="text/javascript"></script>' . "\n";
}
return $tag;
} 
add_filter( 'script_loader_tag', 'mind_defer_scripts', 10, 4 );
// Load in our JS to search dropdown
function anchor_com() {
if(is_page_template( 'template-parts/forum.php' )) {
wp_enqueue_script( 'anchor-js', get_stylesheet_directory_uri() . '/assets/js/anchor.js', [ 'jquery' ], time(), true );
} else {
/** Call regular enqueue */
}
}
// wp_enqueue_script( 'theme-js', get_stylesheet_directory_uri() . '/assets/js/theme.js', [], time(), true );
add_action( 'wp_enqueue_scripts', 'anchor_com');
/**
 * Replaces the excerpt "more" text by a link.
 */
function custom_excerpt_more($more ) {
global $post;
 return '<a class="moretag" href="'. get_permalink($post->ID) . '"> ...czytaj dalej &raquo;</a>';
}
add_filter( 'excerpt_more', 'custom_excerpt_more' );
//Change the length of post excerpt 
function wphooks_excerpt_length ($length_in_words) {
$new_length_in_words = 15;
return $new_length_in_words;
}
add_filter ('excerpt_length','wphooks_excerpt_length',20,1);
/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';
/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';
/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';
/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';
/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
require get_template_directory() . '/inc/jetpack.php';
}
/**
 * Register Custom Navigation Walker
 */
function register_navwalker(){
require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';
}
add_action( 'after_setup_theme', 'register_navwalker' );
/*Navigation Menus*/
function register_my_menus() {
register_nav_menus(
array(
'header-menu' => __( 'Header Menu' ),
'extra-menu' => __( 'Extra Menu' ),
'katalog-menu' => __('Katalog Menu')
)
);
}
add_action( 'init', 'register_my_menus' );
/*adding attrs to extra menu items*/
function slug_provide_walker_instance( $args ) {
if ( isset( $args['walker'] ) && is_string( $args['walker'] ) && class_exists( $args['walker'] ) ) {
$args['walker'] = new $args['walker'];
}
return $args;
}
add_filter( 'wp_nav_menu_args', 'slug_provide_walker_instance', 1001 );
// Getting 2 rand posts on sidebar
function ratings() {
// First footer widget area, located in the footer. 
register_sidebar( array(
'name' => __( 'Rating System Widget', 'postplus' ),
'id' => 'rating-system',
'description' => __( 'Rating System Widget', 'postplus' ),
) );
}
add_action( 'widgets_init', 'ratings' );
function votings() {
// First footer widget area, located in the footer. 
register_sidebar( array(
'name' => __( 'Voting System Widget', 'postplus' ),
'id' => 'voting-system',
'description' => __( 'Voting System Widget', 'postplus' ),
) );
}
add_action( 'widgets_init', 'votings' );
//Use Static Pages as Category Archives
add_filter('request', function( array $query_vars ) {
 if ( is_admin() ) {
return $query_vars;
 }
if ( isset( $query_vars['category_name'] ) ) {
$pagename = $query_vars['category_name'];
if ( $pagename == 'katalog') {
 $query_vars = array( 'pagename' => "$pagename" );
}
}
 return $query_vars;
} );
// Comment Custom callback
function wptags_comment() {
get_template_part( 'comment' );
}
function my_login_logo() { ?>
 <style type="text/css">
#login h1 a, .login h1 a {
background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/assets/img/KC-logo.jpg),
height:60px,
width:60px,
background-size: 60px 60px,
background-repeat: no-repeat,
padding-bottom: 30px,
}
 </style>
<?php }
add_action( 'login_enqueue_scripts', 'my_login_logo' );
function my_login_logo_url() {
return home_url();
}
add_filter( 'login_headerurl', 'my_login_logo_url' );
function my_login_logo_url_title() {
return 'Kowalski Consulting Database Design Web Development';
}
add_filter( 'login_headertext', 'my_login_logo_url_title' );
//Child template recognises parent template
function new_subcategory_hierarchy() { 
$category = get_queried_object();
$parent_id = $category->category_parent;
$templates = array();
if ( $parent_id == 0 ) {
// Use default values from get_category_template()
$templates[] = "category-{$category->slug}.php";
$templates[] = "category-{$category->term_id}.php";
$templates[] = 'category.php';
} else {
// Create replacement $templates array
$parent = get_category( $parent_id );
// Current first
$templates[] = "category-{$category->slug}.php";
$templates[] = "category-{$category->term_id}.php";
// Parent second
$templates[] = "category-{$parent->slug}.php";
$templates[] = "category-{$parent->term_id}.php";
$templates[] = 'category.php'; 
}
return locate_template( $templates );
}
add_filter( 'category_template', 'new_subcategory_hierarchy' );
// adding parameters to wp_query
add_filter( 'posts_where', 'title_like_posts_where', 10, 2 );
function title_like_posts_where( $where, $wp_query ) {
global $wpdb;
if ( $post_title_like = $wp_query->get( 'post_title_like' ) ) {
$where .= ' AND ' . $wpdb->posts . '.post_title LIKE \'%' . esc_sql( $wpdb->esc_like( $post_title_like ) ) . '%\'';
}
return $where;
}
//Checking for post in subcategories for single template single.php
if ( ! function_exists( 'post_is_in_a_subcategory' ) ) {
function post_is_in_a_subcategory( $categories, $_post = null ) {
foreach ( (array) $categories as $category ) {
// get_term_children() only accepts integer ID
$subcats = get_term_children( (int) $category, 'category' );
if ( $subcats && in_category( $subcats, $_post ) )
return true;
}
return false;
}
}
// add this filter to your themes functions.php file
add_filter('category_template', 'yourprefix_use_lumber_category_template_for_child_categories');
function yourprefix_use_lumber_category_template_for_child_categories( $template ) {
// get the current category object
 $category = get_queried_object();
// if current category has lumber category(assuming lumber category id == 7) as its parent...
if( $category->parent == 6 ) {
// ...then find the named category-lumber.php template in theme, and replace whatever default $template is found by WordPress...
$template = locate_template('category-szkolenia.php');
// ...finally return the lumber category template file
return $template;
}
else {
// ...the current category has no lumber category as parent, so just return default $template file found by WordPress
return $template;
}
}
function defer_parsing_of_js( $url ) {
if ( is_user_logged_in() ) return $url; //don't break WP Admin
if ( FALSE === strpos( $url, '.js' ) ) return $url;
if ( strpos( $url, 'jquery.js' ) ) return $url;
return str_replace( ' src', ' defer src', $url );
}
add_filter( 'script_loader_tag', 'defer_parsing_of_js', 10 );

function defer_parsing_of_css( $url ) {
if ( is_user_logged_in() ) return $url; //don't break WP Admin
if ( FALSE === strpos( $url, '.css' ) ) return $url;
if ( strpos( $url, 'css' ) ) return $url;
return str_replace( ' href', ' async defer href', $url);
}
add_filter( 'style_loader_tag', 'defer_parsing_of_css', 10,4 );

function custom_post_type_cat_filter($query) {
if ( !is_admin() && $query->is_main_query() ) {
if ($query->is_search()) {
$query->set( 'post_type', array( 'post', 'firmy_programy', 'wordpress_plugin', 'woocommerce_plugin') );
}
}
}
add_action('pre_get_posts','custom_post_type_cat_filter');  

add_action( 'pre_get_posts', 'add_my_custom_post_type' );
/**
 * @param WP_Query $query
 * @return WP_Query
 */
function add_my_custom_post_type( $query ) {
    if ($query->is_main_query()) 
        $query->set( 'post_type', array( 'post', 'page', 'firmy_programy', 'wordpress_plugin', 'woocommerce_plugin') );
    return $query;
}