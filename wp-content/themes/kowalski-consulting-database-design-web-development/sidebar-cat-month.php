
<?php
add_filter( 'getarchives_where', 'wse95776_archives_by_cat', 10, 2 );
/**
 * Filter the posts by category slug
 * @param $where
 * @param $r
 *
 * @return string
 */
function wse95776_archives_by_cat( $where, $r ){
    return "WHERE wp_posts.post_type = 'post' AND wp_posts.post_status = 'publish' AND wp_terms.slug = 'forum' AND wp_term_taxonomy.taxonomy = 'category'";
}

add_filter( 'getarchives_join', 'wse95776_archives_join', 10, 2 );

/**
 * Defines the necessary joins to query the terms
 * @param $join
 * @param $r
 *
 * @return string
 */
function wse95776_archives_join( $join, $r ){
    return 'inner join wp_term_relationships on wp_posts.ID = wp_term_relationships.object_id inner join wp_term_taxonomy on wp_term_relationships.term_taxonomy_id = wp_term_taxonomy.term_taxonomy_id inner join wp_terms on wp_term_taxonomy.term_id = wp_terms.term_id';
}
