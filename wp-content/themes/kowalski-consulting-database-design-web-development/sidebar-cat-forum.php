

<div class="col side-category-frame">
<h5>Folder blogu</h5>
<?php	


$exclude_slugs      = array( 'katalog','woocommerce_produkt', '	wordpress_plugin', 'szkolenia');                                   
$exclude_ids        = array();

foreach( $exclude_slugs as $slug ) { 
    $tmp_term = get_term_by( 'slug', $slug, 'category' );

    if( is_object( $tmp_term ) ) {
        $exclude_ids[] = $tmp_term->term_id;
    }
}

$args = array(
    'orderby'            => 'name',
    'show_count'         => 1, //Use 1 to show the count
    'hierarchical'       => true,
    'taxonomy'           => 'category',
    'child of'           => '6',
    'use_desc_for_title' => 1,
    'echo'               => 1, //Use 0 to not output results
    'title_li'           => '', //creates an <li> entry with text entered here - can be blank
    'exclude'            => $exclude_ids,
);

wp_list_categories( $args );
 ?>

</div>