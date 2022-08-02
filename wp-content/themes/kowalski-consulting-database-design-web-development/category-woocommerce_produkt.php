<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Kowalski_Consulting_Database_Design_Web_Development
 * Template Name: Katalog
 */

get_header();
?>

<!--SUB
==================================================================================-->

<section id="sub">
<div class="container mt-3">

<h5 class="mb-0">
	
<?php 

$paged1 = isset( $_GET['paged1'] ) ? (int) $_GET['paged1'] : 1;
$paged2 = isset( $_GET['paged2'] ) ? (int) $_GET['paged2'] : 1;

// Custom Loop with Pagination 1
// http://codex.wordpress.org/Class_Reference/WP_Query#Usage
$args1 = array(
	'paged'          => $paged1,
	'posts_per_page' => 4,
	'post_type'      => 'woocommerce_produkt'
);
$query1 = new WP_Query( $args1 );

the_archive_title(); ?> 

</h5>


</div>
</section>


	<!-- MAIN POST LINE
	================================================== -->
	<div id="loadspin" class="column-layout">
		<div class="main-column" id="primary">

		<main id="primary" class="site-main">

<?php if ($query1 -> have_posts() ) : ?>

	<header class="page-header">
	<div class="row search-title-center">
	<p class="page-title"><strong>
<?php
/* translators: %s: search query. */
printf( esc_html__( 'Znalezione wyniki: %s', 'kowalski-consulting-database-design-web-development' ), '<span>' . get_search_query() . '</span>' );?></strong></p>  
<p><strong><?php echo $query1 -> found_posts . " " . $result . "."?></strong></p>
</div>
<?php the_archive_description( '<div class="archive-description">', '</div>' ); ?>

	</header><!-- .page-header -->

	<?php
	/* Start the Loop */
	while ($query1 -> have_posts() ) :
		   $query1 -> the_post();

		/*
		 * Include the Post-Type-specific template for the content.
		 * If you want to override this in a child theme, then include a file
		 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
		 */
		get_template_part( 'template-parts/content', 'woocommerce' );

	endwhile;
	
	bootstrap_pagination_1();


else :

	get_template_part( 'template-parts/content', 'woocommerce_producent' );

endif;
?>


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

<?php endif;?>

	</div><!--sidebar-two-->

	</div><!-- column-layout -->

<?php get_footer();
