<?php
/**
 * Template Name: Single-firmy_programy
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Kowalski_Consulting_Database_Design_Web_Development
 */

get_header();
?>

<!--SUB
==================================================================================-->
<div class="container-fluid" id="contact-row"></div>

<section id="sub">
<div class="container mt-3">
<h5 class="mb-0">Wybrano: <div style="color:black">Plugin Woo <?php the_field('nazwa_woocommerce'); ?> stworzony przez <?php the_field('producent_woocommerce');?></div></h5>
</div>
</section>




<!-- MAIN POST LINE
	================================================== -->
	<div id="loadspin" class="column-layout" hidden>
		<div class="main-column" id="primary">

			<main id="content">

			<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'woocommerce_plugin' );

			the_post_navigation(
				array(
					'prev_text' => '<span class="nav-subtitle">' . esc_html__( 'Poprzedni:', 'kowalski-consulting-database-design-web-development' ) . '</span> <span class="nav-title">%title</span>',
					'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Następny:', 'kowalski-consulting-database-design-web-development' ) . '</span> <span class="nav-title">%title</span>',
				)
			);

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>



	</main><!-- content -->
	
		</div><!-- primary -->

		<div class="sidebar-one align-items-start">

<?php if(is_active_sidebar('sidebar-3')):?>
<?php dynamic_sidebar('sidebar-3'); ?>

<?php endif;?>

		</div><!--sidebar-one-->
		
		<div class="sidebar-two">

<?php if(is_active_sidebar('sidebar-7')):?>
<?php dynamic_sidebar('sidebar-7'); ?>

<?php endif;?>
<?php get_template_part('sidebar','cat-3'); ?>

</div><!--sidebar-two-->


</div><!-- column-layout -->

<?php

get_footer();
