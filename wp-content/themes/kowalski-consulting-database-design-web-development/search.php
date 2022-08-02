<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Kowalski_Consulting_Database_Design_Web_Development
 * 
 */
get_header();
?>

<div class="column-layout" id="loadspin" hidden>
<div class="main-column">
<div class="container-fluid" id="contact-row">
</div>

	<main id="primary" class="site-main">

		<?php 
		  global $wp_query; 
		  if($wp_query->found_posts < 1) {
			$result = "";
		  } else {
			$result = "";
		  }
		if ( have_posts() ) : ?>
<div class="row search-title-center mb-6">
				<p class="page-title"><strong>
					<?php
					/* translators: %s: search query. */
					printf( esc_html__( 'Znalezione wyniki: %s', 'kowalski-consulting-database-design-web-development' ), '<span>' . get_search_query() . '</span>' );?></strong></p>  
					<p><strong><?php echo $wp_query->found_posts . " " . $result . "."?></strong></p>
					
</div>					
				

			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */


				if ( in_category ('28') ) {
					get_template_part( 'template-parts/content', 'search-firmy_programy' );
				} 
				elseif (wpdocs_post_is_in_a_subcategory( array(6, 4, 7, 5, 3, 210 ))) {
					get_template_part( 'template-parts/content', 'search-firmy_programy-s');
				}
				elseif ( wpdocs_post_is_in_a_subcategory(array(222,29, 221, 220,1 ) )) {
					get_template_part( 'template-parts/content', 'search'); 
				}	
				elseif (in_category( '23') ){
					get_template_part( 'template-parts/search', 'wordpress-plugin');
				}
				elseif ( in_category( '113') ){
					get_template_part( 'template-parts/search', 'woocommerce-produkt');	
				}
				else {
				get_template_part( 'template-parts/content', 'none'); 
				}
			endwhile;

			fellowtuts_wpbs_pagination();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

	</main><!-- #main -->

	</div><!--main-column-->


<div class="sidebar-one align-items-start">

<?php if(is_active_sidebar('sidebar-1')):?>
<?php dynamic_sidebar('sidebar-1'); ?>

<?php endif;?>

</div><!--sidebar-one-->


<div class="sidebar-two">

<?php 
if(is_category('blog-szkolenia') ) {
dynamic_sidebar('sidebar-2');
get_template_part('sidebar','cat-4');	
	}
elseif(is_category('blog-wordpress')) {
	dynamic_sidebar('sidebar-4');
	get_template_part('sidebar','cat-2');
}
elseif(is_category('blog-woocommerce')) { 
	dynamic_sidebar('sidebar-7');
	get_template_part('sidebar','cat-3');
}
elseif ( is_category( 'katalog') ) {
	dynamic_sidebar('sidebar-2');
	get_template_part('sidebar','cat-4');	
} 
elseif ( wpdocs_post_is_in_a_subcategory(6) ){
	dynamic_sidebar('sidebar-2');
	get_template_part('sidebar','cat-4');	
}
elseif ( in_category( '23') ){
	dynamic_sidebar('sidebar-4');
	get_template_part('sidebar','cat-2');
}
elseif ( in_category( '113') ){
	dynamic_sidebar('sidebar-7');
	get_template_part('sidebar','cat-3');
}
?>

<div class="ad-frame"> 
<div class="adbox-1 mx-auto">
<p> Zum Beispiel gibt es hier eine Werbung</p>
<h3>SIDE WERBUNG 1</h3>
</div>
</div>

<div class="ad-frame"> 
<div class="adbox-1 mx-auto">
<p> Zum Beispiel gibt es hier eine Werbung</p>
<h3>SIDE WERBUNG 2</h3>
</div>
</div>

<div class="ad-frame"> 
<div class="adbox-1 mx-auto">
<p> Zum Beispiel gibt es hier eine Werbung</p>
<h3>SIDE WERBUNG 3</h3>
</div>
</div>

</div><!--sidebar-two-->

</div><!--column-layout-->


<?php get_footer(); 
