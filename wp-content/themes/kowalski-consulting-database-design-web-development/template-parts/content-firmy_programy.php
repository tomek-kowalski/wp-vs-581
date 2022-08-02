	<?php
/**
 * Template part for displaying posts
 * Template Name: content-firmy_programy
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Kowalski_Consulting_Database_Design_Web_Development
 */

?>



<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

<div>
	
<header class="entry-header">
		<?php
		if ( is_singular() ) :
			the_title( '<h4 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h4>' );
		else :
			the_title( '<h4 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h4>' );
		endif; ?>
<?php if(is_page('katalog')!=true) { ?>
<div class="row archive-description"><p>Szukasz teraz w kategorii:</p><?php the_archive_description( '<div class="archive-description">', '</div>' ); 
}
else  {}
?>

</header><!-- .entry-header -->


<div class="post-excerpt-fm">

<div class="row">
<div class="post-column-1-fm">
	
<div class="logo-pic"><img src="<?php the_field('logo'); ?>" /></div>
</div>

<div class="post-column-2-fm">
<div class="row"><div class= "post-desc-firma-opis"><strong><?php the_field('nazwa_firmy'); ?></strong></div></div>
<div class="row"><div class= "post-desc-firma-opis"><?php the_field('adres_ul'); ?></div></div>
<div class="row"><div class= "post-desc-firma-opis"><?php the_field('adres_mi'); ?></div></div>
<div class="row"><div class= "post-desc-firma-opis"><?php the_field('kod'); ?></div></div>
<div class="row"><div class= "post-desc-firma-opis"><?php the_field('kraj'); ?></div></div>
<div class="row"><div class= "post-desc-firma-opis"><a href="<?php the_field('www'); ?>">Strona WWW Firmy</a></div></div>
<div class="row"><div class= "post-desc-firma-opis"><?php the_field('nazwa_handlowa'); ?></div></div>
</div>
</div>



<div class="post-details">	
<?php echo do_shortcode('[link_on_firmy_by_terms]'); ?>
<div class="fa-space"><i class="fa fa-tags fa-space"></i><?php $terms = wp_get_post_terms($post->ID, 'szkolenia_it');
    if ($terms) {
        $out = array();
        foreach ($terms as $term) {
            $out[] = '<a class="' .$term->slug .'" href="' .get_term_link( $term->slug, 'szkolenia_it') .'">' .$term->name .'</a>';
        }
        echo join( ', ', $out );
    } ?></div>



<div class="col"><?php edit_post_link('Edycja','<div><i class="fa fa-pencil"></i>','</div>'); ?></div>
</div>
<div class="post-rating">
	<div class="szkolenia-firma">	
    Oceń szkolenia:
	</div>
</div>
<div class="post-rating">
<ul>
<?php

if(is_page('katalog')==true) { 

echo do_shortcode("[working-1A]");
}

else {
echo do_shortcode("[working-1]");
}

?>
</ul>

</div>
</div><!--post-excerpt-fm-->

<footer class="entry-footer">

</footer><!-- .entry-footer -->


</article><!-- #post-<?php the_ID(); ?> -->



