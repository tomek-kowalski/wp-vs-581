<?php



/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Kowalski_Consulting_Database_Design_Web_Development
 */

get_header();

?>

<!--SUB
==================================================================================-->
<div class="container-fluid" id="contact-row"></div>
<?php get_template_part('content','blog-page-sub'); ?>

<!--Forum
==================================================================================-->




<div id="loadspin" class="column-layout" hidden>
<div class="main-column">


<?php
$paged1 = isset( $_GET['paged1'] ) ? (int) $_GET['paged1'] : 1;
$paged2 = isset( $_GET['paged2'] ) ? (int) $_GET['paged2'] : 1;

// Custom Loop with Pagination 1
// http://codex.wordpress.org/Class_Reference/WP_Query#Usage
$args1 = array(
	'paged'          => $paged1,
	'posts_per_page' => 6,
	'order'          => 'DESC',
	'category_name'  => 'blog'
);
$query4 = new WP_Query( $args1 );


		if ( $query4->have_posts() ) :

			if ( is_home() && ! is_front_page() ) :
				?>
				<header id="forum">
					<h4 class="page-title author-title screen-reader-text"><?php single_post_title(); ?></h4>
				</header>
				<?php
			endif;

			/* Start the Loop */
			while ( $query4->have_posts() ) :
				$query4->the_post();

				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
				get_template_part( 'template-parts/forum', get_post_type() );	
				
			endwhile;

		else :

			get_template_part( 'template-parts/content', 'blog-single' );

		endif;
		?>
<?php echo bootstrap_pagination_1($query4); ?>		
<?php wp_reset_postdata(); ?>


<?php get_template_part( 'template-parts/blog','comments' );?>
</div><!--main-column-->



<div class="sidebar-one align-items-start">

<?php if(is_active_sidebar('sidebar-1')):?>
<?php dynamic_sidebar('sidebar-1'); ?>

<?php endif;?>

</div><!--sidebar-one-->


<div class="sidebar-two">

<?php if(is_active_sidebar('sidebar-8')):
dynamic_sidebar('sidebar-8'); 
 endif;
get_template_part('last','author-posts-forum'); 
get_template_part('sidebar','cat-forum'); 
get_template_part('comments','firmy'); 
get_template_part('comments','szkolenia');
get_template_part('comments','wordpress'); 
get_template_part('comments','woocommerce'); ?>

</div><!--sidebar-two-->

</div><!--column-layout-->


<?php get_footer();
