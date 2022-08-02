	<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Kowalski_Consulting_Database_Design_Web_Development
 */

$nazwa_firmy      = get_field('nazwa_firmy',);
$adres_ul         = get_field('adres_ul');
$adres_mi         = get_field('adres_mi');
$kod              = get_field('kod');
$kraj             = get_field('kraj'); 
$www              = get_field('www');
$nazwa_handlowa   = get_field('nazwa_handlowa');
$logo             = get_field('logo');
?>

<!--SUB
==================================================================================-->

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<header class="entry-header">

<div class="row archive-description"><p>Temat szkolenia:</p><?php 
$object = get_the_title();		
$name = explode(' ', $object);

$nameput = implode(' ', array_slice($name, 1));
echo strtoupper($name[0]); 
?></div>
</header><!-- .entry-header -->
<div id="loadspin" class="post-excerpt-fm">


<?php 

$args = array(
	'numberposts'	=> -1,
	'post_type'		=> 'firmy_programy',
	'meta_key'		=> 'nazwa_firmy',
	'meta_value'	=>  $nameput
  );
   
$firmy = new WP_Query( $args ); 

if( $firmy->have_posts() ): 
	
	while( $firmy->have_posts() ) : $firmy->the_post(); 
 ?>

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
<?php wp_reset_query();	 // Restore global post data stomped by the_post(). ?>
<div class="row">
<div class="col-md-6">



<div class="post-column">


<div class="post-image">
<?php if(has_post_thumbnail() ): //check for the feature image?>

			<?php the_post_thumbnail(); ?>
			<?php endif; ?>
</div><!--post-image-->
<div class="col-rating">
	<div class="row row-rating-szkolenia-t"><p>Aktualny rating</p></div>
	<div class="row row-rating-szkolenia-s"><?php echo do_shortcode("[backendvote]"); ?></div>
</div>
</div>
<div class="post-column-title">		
		<p class="rating-desc">Szkolenie
				<?php echo strtoupper($name[0]); ?> zorganizowe przez <?php echo $nameput; ?></p>
</div>


<?php endwhile; ?>

<?php endif; ?>

<?php wp_reset_query();	 // Restore global post data stomped by the_post(). ?>
</div><!--col-->

<div class="col-md-6">
<div class="post-column">	
<ul class="ul-single">
<?php echo do_shortcode("[backend]"); ?>
</ul>
</div>	


</div><!--col-->

</div><!--row-->

</div><!--post-excerpt-->


<div class="excerpt-text">

<div class="post-details">

<div class="row d-flex">

<div class="fa-space"><i class="fa fa-folder fa-space"></i>
<?php 

$cat = get_the_category(); 

if ( ! empty( $cat) ) {
echo '<a href="' . esc_url( get_term_link( $cat[0]->slug, 'szkolenia_it') ) . '">' . esc_html( $cat[0]->name ) . '</a>';
}

?>
</div>
<div class="fa-space"><i class="fa fa-tags fa-space"></i><?php 

$post_tags = get_the_tags();
if ( ! empty( $post_tags ) ) {
    foreach( $post_tags as $post_tag ) {
        echo '<a href="' . get_tag_link( $post_tag,'szkolenia_it' ) . '">' . $post_tag->name . '</a>';
    }
}  


?></div>

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