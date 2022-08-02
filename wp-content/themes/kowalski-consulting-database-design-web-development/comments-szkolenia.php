
<div class="comment">
<h5>Ostatnio dodane komenarze w kategorii szkolenia</h5> 
    
<?php
$ppp = 5;
$category_parent = 6;

// lets fetch sub categories of this category and build an array
$categories = get_terms( 'category', array( 'child_of' => $category_parent, 'hide_empty' => false ) );
$category_list =  array( $category_parent );
foreach( $categories as $term ) {
 $category_list[] = (int) $term->term_id;
}

$posts = get_objects_in_term( $category_list, 'category' );

$sql = "SELECT comment_ID, comment_date, comment_content, comment_post_ID
 FROM {$wpdb->comments} WHERE
 comment_post_ID in (".implode(',', $posts).") AND comment_approved = 1
 ORDER by comment_date DESC LIMIT $ppp";

$comments = $wpdb->get_results( $sql );
 

foreach ( $comments as $comment ) :
    //name manipluation
    //post title with link
    $title = get_the_title($comment->comment_post_ID);  

    //content limit 

    $length = 9;

    $content = $comment->comment_content;

    $content_trim = substr($content, 0, $length);

    echo '<a href="' . esc_url(get_permalink($comment->comment_post_ID)) . '">'. $title . '</a>' . '<br>';    

endforeach;
wp_reset_postdata();?>
</div>

