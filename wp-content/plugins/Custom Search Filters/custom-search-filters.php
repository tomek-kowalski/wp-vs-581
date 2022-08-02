<?php
/**
* Plugin Name:Custom Search Filters.
* Plugin URI: https://www.kowlski-engineering.com/
* Description: 1. Parent Category. 2. Querying only publish status. 3. Prevent dupliocates. 4.Manipulating desc of search blog categor 5. Join posts and postmeta tables
* Version: 1.0
* Requires at least: 5.2
* Requires PHP:7.2
* License: GPL v2 or later
* License URI: https://www.gnu.org/licenses/gpl-2.0.html
* Author: Tomasz Kowalski
* Text Domain: Custom Search Filters.
* Author URI: https://pl.linkedin.com/in/tomasz-kowalski-6bb6a830
**/
// include subctagories to search
if ( ! function_exists( 'wpdocs_post_is_in_a_subcategory' ) ) {
function wpdocs_post_is_in_a_subcategory( $categories, $_post = null ) {
foreach ( (array) $categories as $category ) {
// get_term_children() only accepts integer ID
$subcats = get_term_children( (int) $category, 'category' );
if ( $subcats && in_category( $subcats, $_post ) )
return true;
}
return false;
}
}
//Quering only posts with publish status and publish img media
function SearchFilter($query) {
if ($query->is_search ){
$query->set('post_status', array( 'publish', 'inherit' ));
$query->set('post_type', array( 'post', 'attachment' ) );
}
return $query;
}
add_filter('pre_get_posts','SearchFilter');
/**
 * Prevent duplicates
 *
 * http://codex.wordpress.org/Plugin_API/Filter_Reference/posts_distinct
 * 
 */
function search_distinct() {
return "DISTINCT";
}
add_filter('posts_distinct', 'search_distinct');
/**
* Manipulating desc of search blog category
* 
*/
function category_has_parent($catid){
$category = get_category($catid);
if ($category->category_parent > 0){
return true;
}
return false;
}
/**
 * Join posts and postmeta tables
 *
 * http://codex.wordpress.org/Plugin_API/Filter_Reference/posts_join
 */
function cf_search_join( $join ) {
global $wpdb;
if ( is_search() ) {
$join .=' LEFT JOIN '.$wpdb->postmeta. ' ON '. $wpdb->posts . '.ID = ' . $wpdb->postmeta . '.post_id ';
}
return $join;
}
add_filter('posts_join', 'cf_search_join' );


