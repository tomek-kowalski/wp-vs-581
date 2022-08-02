<?php
/**
 * Template part for displaying posts
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Kowalski_Consulting_Database_Design_Web_Development
 */

$nazwa_firmy      = get_field('nazwa_firmy');
$adres_ul         = get_field('adres_ul');
$adres_mi         = get_field('adres_mi');
$kod              = get_field('kod');
$kraj             = get_field('kraj');
$www              = get_field('www');
$nazwa_handlowa   = get_field('nazwa_handlowa');
$logo             = get_field('logo');
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<div>

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

<div id="loadspin" 	class="post-excerpt">

<div class="row"><div class= "post-desc-firma-opis-blog">
	
<?php the_content(); ?>

</strong></div></div>

</div><!-- post-excerpt -->


<div class="post-details">

<div class="row d-flex">

<div class="fa-space"><i class="fa fa-folder fa-space"></i><?php the_category(', '); ?></div>

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


