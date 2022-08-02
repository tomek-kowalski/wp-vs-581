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

<div class="post-excerpt">

<div class="col post-data">
<div class="row author-pic"><?php echo get_avatar( get_the_author_meta( 'ID') , 100); ?></div>
<div class="row d-flex ml-3 mb">
	
		<div class="row"><p>Opublikował(a):</p><div class="post-desc"><?php the_author(); ?></div></div>
	
		<div class="row"><p>W dniu:</p><div class="post-desc"><?php echo get_the_date(); ?></div></div>

</div>
</div>


<div class="col excerpt-text">
<div class="row">	
<?php if(has_post_thumbnail() ); {//check for the feature image?>
		<div class="post-image">
			<?php the_post_thumbnail(); ?>
	</div><!--post-image-->
	<?php } ?>

<?php the_excerpt(); ?>
</div>
</div>

</div><!-- post-excerpt -->


<div class="post-details">

<div class="row d-flex">


<div class="fa-space"><i class="fa fa-folder fa-space"></i><?php the_category(', '); ?></div>
<div class="fa-space"><i class="fa fa-tags fa-space"></i><?php the_tags('', ', '); ?></div>
<div class="fa-space">
<div class="post-comments-badge">
	<a href="<?php comment_link(); ?>"><i class="fa fa-comments"></i><?php comments_number(0,1,'%'); ?></a>
</div><!--post-comments-badge--></div>
<div>

<div class="col"><?php edit_post_link('Edycja','<div><i class="fa fa-pencil"></i>','</div>'); ?></div>

</div><!-- post-details -->


<footer class="entry-footer">

</footer><!-- .entry-footer -->

</div>
</article><!-- #post-<?php the_ID(); ?> -->


