<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Kowalski_Consulting_Database_Design_Web_Development
 */

?>



<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>


<header class="entry-header">
<?php
		$object = get_the_title();		
		$name = explode(' ', $object);
		
		$nameput = implode(' ', array_slice($name, 1));
		if ( is_singular() ) : 

		echo '<h4 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . 'Szkolenia' . ' ' . $name[0] . ' ' . 'w firmie' . ' ' . $nameput . '</a></h4>';

		else :
		echo '<h4 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . 'Szkolenia' . ' ' . $name[0] . ' ' . 'w firmie' . ' ' . $nameput . '</a></h4>';

		endif; 
if (!empty(the_archive_())) {?>
<p>Szukasz teraz w kadddtegorii:</p><?php the_archive_description	( '<div class="archive-description">', '</div>' ); 
}?>
	</header><!-- .entry-header -->	

<div class="post-excerpt">

<div class="col ">
<div class="row sm-12">
<a href="<?php esc_url(the_permalink() ); ?>"><p class="kat-search">Sprawdź oceny kursów i komentarz(e)!</p><div class= "post-desc-firma-opis-s"><?php the_title(); ?></a>
</div>
</div>
</div>

</div><!-- post-excerpt -->


<div class="post-details">

<div class="row d-flex ml-0	">
<div class="fa-space-1"><i class="fa fa-folder fa-space-1"></i><?php 
the_category(', ');
?>
</div>
<div class="fa-space"><i class="fa fa-tags fa-space-1"></i><?php the_tags('', ', '); ?></div>


<div class="fa-space-1">
<div class="post-comments-badge">
	<a href="<?php comment_link(); ?>"><i class="fa fa-comments"></i><?php comments_number(0,1,'%'); ?></a>
</div><!--post-comments-badge-->
</div>
<div>

<div class="col"><a href="<?php echo esc_url(get_permalink($comment->slug))?>#comment-<?php comment_ID() ?>">
<button class="btn-danger ml-3"> Komentarz</button>
</a></div>

</div><!-- post-details -->

<footer class="entry-footer">

</footer><!-- .entry-footer -->


</article><!-- #post-<?php the_ID(); ?> -->


