<?php
/**
 * Template Name: Single
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Kowalski_Consulting_Database_Design_Web_Development
 */

get_header();
?>

<!--SUB
==================================================================================-->


<div class="container mt-3 title-inline">
<h5 class="mb-0">	

<?php echo the_category(); ?>

</h5>
</div>


	<!-- MAIN POST LINE
	================================================== -->
	<div class="column-layout">
		<div class="main-column" id="primary">

			<main id="content">

			<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content-blog-single' );

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

<?php if(is_active_sidebar('sidebar-1')):?>
<?php dynamic_sidebar('sidebar-1'); ?>

<?php endif;?>

		</div><!--sidebar-one-->
		
		<div class="sidebar-two">

<?php 

if(in_category('blog-szkolenia')) {
dynamic_sidebar('sidebar-szkolenia');
}
elseif ( in_category( 'blog-wordpress') ) {
dynamic_sidebar( 'sidebar-wordpress' );
} 
elseif ( in_category( 'blog-woocommerce') ) {
dynamic_sidebar( 'sidebar-woocommerce' );
} 

?>

</div><!--sidebar-two-->


</div><!-- column-layout -->

<?php

get_footer();
