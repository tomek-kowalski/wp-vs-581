<?php
/**
 * Template part for displaying posts
 * Template Name: wordpress-plugin
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Kowalski_Consulting_Database_Design_Web_Development
 */

$nazwa_pluginu       = get_field('nazwa_pluginu');
$opis_pluginu        = get_field('opis_pluginu');
$url_pluginu         = get_field('url_pluginu');

?>

<!--SUB
==================================================================================-->


<div class="container-fluid" id="contact-row"></div>
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
	</header><!-- .entry-header -->

<div class="post-word">

<div class="row">
<div class="col-lg-6 col-md-6 col-sm-6">
<div class="row"><div class= "post-desc-plugin"><strong><?php the_field('nazwa_pluginu'); ?></strong></div></div>
<div class="row">
<div class="col-sm-3">

<div class="post-image-word">
<?php if(has_post_thumbnail() ): //check for the feature image?>

			<?php the_post_thumbnail(); ?>
			<?php endif; ?>
</div><!--post-image-->
</div><!--col-->

<div class="col-special ">
	<div class="row row-rating-plugin"><p>Aktualny rating</p></div>
	<div class="row row-rating-plugin"><?php echo do_shortcode("[wordpressratevote]"); ?></div>
</div><!--col-->

<div class="row text-special">
<div class="row"><div class= "post-desc-word"><strong><?php the_field('opis_pluginu'); ?></strong></div></div>
<div class="row"><div class= "post-desc-word"><a href="<?php the_field('url_pluginu'); ?>"><?php echo the_field('label_pluginu'); ?></a></div></div>
</div>
</div>
</div>

<div class="col-lg-6 col-md-6 col-sm-6">
<div class="post-column">	
<ul>
<?php echo do_shortcode("[wordpressrate]"); ?>
</ul>
</div><!--post-column-->	
</div><!--col-->



</div><!--row-->

</div><!--post-word-->


<div class="excerpt-text">

<div class="post-details">

<div class="row d-flex">

<div class="fa-space"><i class="fa fa-folder fa-space"></i>
<?php
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
	<a href="<?php comment_link(); ?>"><i class="fa fa-comments"></i><?php comments_number(0,1,'%'); ?><button class="btn-danger ml-3"> Komentarz</button></a>	
</div><!--post-comments-badge--></div>
<div>

<div class="col"><?php edit_post_link('Edycja','<div><i class="fa fa-pencil"></i>','</div>'); ?></div>

</div><!-- post-details -->


<footer class="entry-footer">

</footer><!-- .entry-footer -->

</div>
</article><!-- #post-<?php the_ID(); ?> -->	