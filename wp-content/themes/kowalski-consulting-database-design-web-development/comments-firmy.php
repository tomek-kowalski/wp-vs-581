<div class="comment">
<h5>Ostatnio dodane komenarze w kategorii firmy</h5> 
    
<?php
$paged = get_query_var( 'page' ) ? get_query_var( 'page' ) : 1;
$args  = array(
    'post_type' => 'firmy_programy',
    'number'    => 5,
    'orderby'   => 'post_date',
    'order'     => 'DESC',
    'status'    => 'approve',
    'paged'     => $paged,
    'parent'    => 0,
);
$comments = get_comments($args);


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

