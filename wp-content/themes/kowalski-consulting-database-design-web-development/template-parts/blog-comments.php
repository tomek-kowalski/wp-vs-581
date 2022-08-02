<div class="lista-kom">
<?php dynamic_sidebar('sidebar-5'); ?>
</div>

<div class="col side-category-frame">

<?php	

$paged = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;

$total_comments = get_comments(array(
    'orderby'   => 'post_date',
    'order'     => 'DESC',
    'status'    => 'approve',
    'parent'    =>  0,
));

$per_page = 4;  

$limit = $per_page;
$offset = ($page + $limit) - $limit;

$args_com  = array(
    'paged'          => $paged,
    'status'         => 'approve', 
    'post_status'    => 'publish',  
    'number'         => $limit,
    'offset'         => $offset,
);


$comments = get_comments($args_com);

foreach ( $comments as $comment ) :
    //name manipluation
    $nick = "admin-kc-tomasz";
    $author = $comment->comment_author;
    $author_name = "Tomasz";

    $name = str_replace($nick, $author_name, $author);
    //post title with link
    $title = get_the_title($comment->comment_post_ID);  

    //content limit 

    $length = 15;

    $content = $comment->comment_content;

    $content_trim = substr($content, 0, $length);

    //date format
    $date_format = get_option('date_format');


    echo date( $date_format, strtotime( $comment->comment_date ) ). '<br>' . 'Autor: ' . $name . '<br>' . 'Napisał: ' . $content_trim . '...' . '<br>' . '<a href="' . esc_url(get_permalink($comment->comment_post_ID)) . '">'. '<p>Temat:' . '</p>'. '<h5>' . $title . '</h5>' .'</a>' . '<br>';    

endforeach;
wp_reset_postdata();

  
?>  

</div>
<?php bootstrap_pagination_2(); 
 

