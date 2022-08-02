<?php
/**
* Plugin Name: Custom Post Type Rules on Tags and Categories. Cloud Tags with CPT tags.
* Plugin URI: https://www.kowlski-engineering.com/
* Description: Including Custom Taxonomy into IN-build wordpress archive logic, post taxonomy and cloud tags
* Version: 1.0
* Author: Tomasz Kowalski
* Author URI: https://pl.linkedin.com/in/tomasz-kowalski-6bb6a830
**/

register_taxonomy_for_object_type( 'post_tag', 'szkolenia_it' );


//Display only posts from referred category on date archive page

add_filter( 'query_vars', function ( $vars ) {

    $query_vars = [
        'cq'  
    ];
    $vars = array_merge( $vars, $query_vars );

    return $vars;

});


add_filter( 'get_archives_link', function ( $link_html ) {

    if( is_category() ) {

        preg_match ( "/href='(.+?)'/", $link_html, $url );

        $old_url = $url[1];
        $new_url = add_query_arg( ['cq' => get_queried_object_id()], $old_url );
        $link_html = str_replace( $old_url, $new_url, $link_html );

    }

    return $link_html;

});

add_action( 'pre_get_posts', function ( $q ) {

    $cat_id = filter_input( INPUT_GET, 'cq', FILTER_VALIDATE_INT );
    if(     !is_admin() // Target only the front end
         && $q->is_main_query() // Target only the main query
         && $q->is_date() // Only target the date archive pages
         && $cat_id // Only run the condition if we have a valid ID
    ) {

        $q->set( 'cat', $cat_id );

    }
});

/* Add category WHERE parameter to the get_archives function */
function categories_archive_where($sql_where, $parsed_args){
    global $wpdb;
    $cat_id = get_query_var('cq') ?: (is_category() ? get_queried_object_id() : false);
    if($cat_id){
         $sql_where = $wpdb->prepare("WHERE post_type = %s AND post_status = 'publish' AND {$wpdb->term_relationships}.term_taxonomy_id = %s", $parsed_args['post_type'], $cat_id);
    }
    return $sql_where;
}
add_filter('getarchives_where', 'categories_archive_where', 99, 2);

/* Add category JOIN parameter to the get_archives function */
function categories_archive_join($sql_join){
    global $wpdb;
    $cat_id = get_query_var('cq') ?: (is_category() ? get_queried_object_id() : false);
    if($cat_id){
         $sql_join = "JOIN {$wpdb->term_relationships} ON {$wpdb->posts}.ID = {$wpdb->term_relationships}.object_id";
    }
    return $sql_join;
}
add_filter('getarchives_join', 'categories_archive_join', 99, 1);

//sorting archive to category
add_filter( 'pre_get_posts', 'custom_get_posts' );

function custom_get_posts( $query ) {

if( is_category() || is_archive() ) { 
$query->query_vars['orderby'] = 'name';
$query->query_vars['order'] = 'ASC';
}

return $query;
}

