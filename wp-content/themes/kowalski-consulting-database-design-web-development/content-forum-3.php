<main> 
<h5 id="woocommerce">Blog - Woocommerce</h5>
<?php 

$paged1 = isset( $_GET['paged1'] ) ? (int) $_GET['paged1'] : 1;
$paged2 = isset( $_GET['paged2'] ) ? (int) $_GET['paged2'] : 1;
$paged3 = isset( $_GET['paged3'] ) ? (int) $_GET['paged3'] : 1;

// Custom Loop with Pagination 1
// http://codex.wordpress.org/Class_Reference/WP_Query#Usage
$args3 = array(
	'paged'          => $paged3,
	'posts_per_page' => 4,
	'category_name'      => 'blog-woocommerce'
);
$query3 = new WP_Query( $args3 );

while ( $query3->have_posts() ) : $query3->the_post();
?>
      
		<a href="<?php the_permalink(); ?>"><h4><?php the_title(); ?></h4></a>
		<?php 
			echo '<br>';
			?>

			<div class="cat-info" ><?php the_category(); ?></div>

			<div class="container-page">

<div class="row breakline">
	<p class="post-desc">Opublikował(a):</p>
	<p class="post-desc"><?php the_author(); ?></p>
	<p class="post-desc"> W dniu: </p>
	<p class="post-desc"><?php echo get_the_date(); ?></p>
</div>
			<div class="forum-1"><?php the_excerpt(); ?></div>
			</div> 	
			<?php
			echo '<hr>';
		endwhile;
		?>

<?php echo bootstrap_pagination_1($query3); ?>

<?php wp_reset_postdata(); ?>

</main><!-- content -->