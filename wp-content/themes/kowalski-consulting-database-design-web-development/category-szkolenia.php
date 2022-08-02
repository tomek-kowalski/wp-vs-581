<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Kowalski_Consulting_Database_Design_Web_Development
 */

get_header();

$nazwa_firmy      = get_field('nazwa_firmy');
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
<div class="container-fluid" id="contact-row"></div>
<section id="sub">
<div class="container mt-3">

<h5 class="mb-0">
	
<?php the_archive_title(); ?> 

</h5>


</div>
</section>



	<!-- MAIN POST LINE
	================================================== -->
	<div id="loadspin" class="column-layout" hidden>
		<div class="main-column" id="primary">

		<main id="primary" class="site-main">

<?php if ( have_posts() ) : ?>

	<header class="page-header">
	<div class="row search-title-center">
	<p class="page-title"><strong>
<?php
/* translators: %s: search query. */
printf( esc_html__( 'Znalezione wyniki: %s', 'kowalski-consulting-database-design-web-development' ), '<span>' . get_search_query() . '</span>' );?></strong></p>  
<p><strong><?php echo $wp_query->found_posts . " " . $result . "."?></strong></p>
</div>


	</header><!-- .page-header -->

	<?php
	/* Start the Loop */
	while ( have_posts() ) :
		the_post();

		/*
		 * Include the Post-Type-specific template for the content.
		 * If you want to override this in a child theme, then include a file
		 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
		 */
		get_template_part( 'template-parts/content', 'backend');

	endwhile;
	
	


else :

	get_template_part( 'template-parts/content', 'single-szkolenia');

endif;
?>
<?php fellowtuts_wpbs_pagination(); ?>
<?php wp_reset_postdata(); ?>
</main><!-- #main -->

	
	</div><!-- primary -->

	<div class="sidebar-one align-items-start">

	<?php if(is_active_sidebar('sidebar-1')):?>
<?php dynamic_sidebar('sidebar-1'); ?>

<?php endif;?>

	</div><!--sidebar-one-->

	<div class="sidebar-two">

	<?php if(is_active_sidebar('sidebar-2')):?>
<?php dynamic_sidebar('sidebar-2'); ?>
<?php get_template_part('sidebar','cat-4'); ?>

<?php endif;?>

	</div><!--sidebar-two-->

	</div><!-- column-layout -->

<?php get_footer();
