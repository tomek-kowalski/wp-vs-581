<?php
/*
Template Name: Blog Page KC
 */	

get_header();
?>

<!--Forum
==================================================================================-->

<div id="loadspin" class="column-layout" hidden>
<div class="main-column">

<?php
		if ( have_posts() ) :

			if ( is_home() && ! is_front_page() ) :
				?>
				<header>
					<h5 class="page-title screen-reader-text"><?php single_post_title(); ?></h5>
				</header>
				<?php
			endif;

			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
				get_template_part( 'template-parts/forum', get_post_type() );

			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'single-szkolenia' );

		endif;
		?>

</div><!--main-column-->


<div class="sidebar-one align-items-start">

<?php get_sidebar('sidebar-1'); ?>

</div><!--sidebar-one-->


<div class="sidebar-two">

<?php get_sidebar('sidebar-2'); ?>


</div><!--sidebar-two-->

</div><!--column-layout-->


<?php get_footer(); 