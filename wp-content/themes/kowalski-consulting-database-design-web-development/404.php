<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Kowalski_Consulting_Database_Design_Web_Development
 * Template Name:404
 */

get_header();
?>
<div class="container-fluid" id="contact-row"></div>
<div class="column-layout">

<div class="main-column">


	<main id="primary" class="site-main">

		<section class="error-404 not-found">

			<header class="page-header">
				<h5 id="forum-search" class="page-title"><?php esc_html_e( 'Oops! Wskazana strona została usnięta, lub nigdy nie istniała.', 'kowalski-consulting-database-design-web-development' ); ?></h5>
			</header><!-- .page-header -->

			<div class="page-content">
				<p><?php esc_html_e( 'Wygląda na to, że nie można znaleść strony po tym adresem. Sprawdź wyszukiwakę, lub użyj linków poniżej, aby namierzyć poszukiwane treści.', 'kowalski-consulting-database-design-web-development' ); ?></p>

				<?php get_template_part('custom','searchform'); ?>

					<div class="widget widget_categories">
						<p><strong><?php esc_html_e( 'Najpopularniejsze kategorie', 'kowalski-consulting-database-design-web-development' ); ?></strong></p>
						<ul>
							<?php
							wp_list_categories(
								array(
									'orderby'    => 'count',
									'order'      => 'DESC',
									'show_count' => 1,
									'title_li'   => '',
									'number'     => 10,
								)
							);
							?>
						</ul>
					</div><!-- .widget -->

					<h5><?php esc_html_e( 'Wpisy, komentarze i artykuły', 'kowalski-consulting-database-design-web-development' ); ?></h5>
<?php
$paged1 = isset( $_GET['paged1'] ) ? (int) $_GET['paged1'] : 1;
$paged2 = isset( $_GET['paged2'] ) ? (int) $_GET['paged2'] : 1;

// Custom Loop with Pagination 1
// http://codex.wordpress.org/Class_Reference/WP_Query#Usage
$args1 = array(
	'paged'          => $paged1,
	'posts_per_page' => 8,
	'order'        => 'desc',
);
$query1 = new WP_Query( $args1 );

while ( $query1->have_posts() ) : $query1->the_post();
?>
    
		<a href="<?php the_permalink(); ?>"><h4><?php the_title(); ?></h4></a>
		<?php 
			echo '<br>';
			?>
<div class="container">

			<div class="cat-info" ><?php the_category(); ?></div>

<div class="container">
	<div class="row">
			<div class="col-sm"><div class="row"><p>Opublikował(a):</p><div class="post-desc"><?php the_author(); ?></div></div></div><div class="col-sm"><div class="row"><p>W dniu:</p><div class="post-desc"><?php echo get_the_date(); ?></div></div></div>
</div>
</div>
			<div class="forum-1"><?php the_excerpt(); ?></div>
			</div> 	
			<?php
			echo '<hr>';
		endwhile;
		?>

<?php echo bootstrap_pagination_1($query1); ?>
		

<?php wp_reset_postdata(); ?>

			</div><!-- .page-content -->
		</section><!-- .error-404 -->

	</main><!-- #main -->

	 <a href="<?php echo esc_url(home_url ('/')); ?> "><h5>..lub wróć do strony głównej</h5></a>

	</div><!--main-column-->


<div class="sidebar-one align-items-start">



<?php get_sidebar('sidebar-1'); ?>

</div><!--sidebar-one-->


<div class="sidebar-two">



<?php dynamic_sidebar('sidebar-2'); ?>
<?php get_template_part('sidebar','cat-4'); ?>


</div><!--sidebar-two-->

</div><!--column-layout-->

<?php get_footer();
