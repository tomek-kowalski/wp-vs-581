<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Kowalski_Consulting_Database_Design_Web_Development
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

<header class="entry-header">
		<?php
		if ( is_singular() ) :
			the_title( '<h4 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h4>' );
		else :
			the_title( '<h4 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h4>' );
		endif;

		if ( 'post' === get_post_type() ) :
			?>

<?php endif; ?>
<?php if(!empty(get_the_archive_description())) {?>
    <p>Szukasz teraz w kategorii:</p><?php the_archive_title( '<div class="archive-description">', '</div>' ); 
    }?>
	</header><!-- .entry-header -->

<div class="post-excerpt">

<div class="col ">
<div class="row sm-12">
<a href="<?php esc_url(the_permalink() ); ?>"><p class="kat-search">Sprawdź oceny pluginu i komentarz(e)!</p><div class= "post-desc-firma-opis-s move-left"><?php the_title(); ?></a>
</div>
</div>
</div>

</div><!-- post-excerpt -->


<div class="post-details">

<div class="row d-flex">


<div class="fa-space"><i class="fa fa-folder fa-space"></i><?php 
$taxonomy = 'wordpress_pl';	
 
// Get the term IDs assigned to post.
$post_terms = wp_get_object_terms( $post->ID, $taxonomy, array( 'fields' => 'ids' ) );
 
// Separator between links.
$separator = ', ';
 
if ( ! empty( $post_terms ) && ! is_wp_error( $post_terms ) ) {
 
    $term_ids = implode( ',' , $post_terms );
 
    $terms = wp_list_categories( array(
        'title_li' => '',
        'style'    => 'none',
        'echo'     => false,
        'taxonomy' => $taxonomy,
        'include'  => $term_ids
    ) );
 
    $terms = rtrim( trim( str_replace( '<br />',  $separator, $terms ) ), $separator );
 
    // Display post categories.
    echo  $terms;
}
?>
</div>
<div class="fa-space">
<div class="post-comments-badge">
	<a href="<?php comment_link(); ?>"><i class="fa fa-comments"></i><?php comments_number(0,1,'%'); ?></a>
</div><!--post-comments-badge--></div>
<div>

<div class="col"><a href="<?php echo esc_url(get_permalink($comment->slug))?>#comment-<?php comment_ID() ?>">
<button class="btn-danger ml-3"> Komentarz</button>
</a></div>

</div><!-- post-details -->


<footer class="entry-footer">

</footer><!-- .entry-footer -->

</div>
</article><!-- #post-<?php the_ID(); ?> -->
