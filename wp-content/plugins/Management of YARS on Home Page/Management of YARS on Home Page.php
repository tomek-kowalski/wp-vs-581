<?php
/**
* Plugin Name:  Management of YARS on Home Page.
* Plugin URI: https://www.kowlski-engineering.com/
* Description: Management of YARS.
* Version: 1.0
* Author: Tomasz Kowalski
* Author URI: https://pl.linkedin.com/in/tomasz-kowalski-6bb6a830
**/


// backend rating section

function homebackend() { 

    $t = get_the_title();


    global $post;
    $terms = wp_get_post_terms($post->ID, 'szkolenia_it', array( 'fields' => 'names' ));

    if ($terms) {
        $out = array();   
        foreach ($terms as $term) {
        $out[] = implode(' ',array($term, $t));
        }
        }
$args = array (
    'category_name'  => 'backend',
    'posts_per_page' =>  3,
    'titles'         => $out,
    'orderby'        => 'rand',
    'order'          => 'ASC',
);

$q = new WP_Query($args);

if ($q->have_posts () ) :
        
while ($q->have_posts () ) : $q->the_post();

$ttd = get_the_title();

$to = explode(' ', $ttd);


$object = get_the_title();		
$name = explode(' ', $object);

$nameput = implode(' ', array_slice($name, 1));

$args_k = array(
	'numberposts'	=> -1,
	'post_type'		=> 'firmy_programy',
	'meta_key'		=> 'nazwa_firmy',
	'meta_value'	=> $nameput,
  );
  

$firmy = new WP_Query( $args_k ); 

if( $firmy->have_posts() ): ?>

	<?php while( $firmy->have_posts() ) : $firmy->the_post(); 
		
	
//post title modified
	
	$name = explode(' ', $ttd);
	
	$nameput = implode(' ', array_slice($name, 1));

	$term_id = get_term_by('name', $to[0], 'szkolenia_it');
	$terms_link = get_category_link($term_id);

;?>
<a href="<?php echo esc_url( $terms_link ); ?>" title="<?php echo $to[0] ?>"><li><h4><?php echo $to[0] ?></h4></li></a>
<li><a href="<?php esc_url(the_permalink()) ?>">
				<?php echo $nameput; ?>
</a></li>   

<?php 
wp_reset_query(); 
endwhile; 
endif; 

$post_id = get_the_ID();
echo do_shortcode("[yasr_visitor_votes readonly=yes postid='" . $post_id . "']");
echo '<hr class="rate-line">';        

endwhile;
endif;
wp_reset_query();
wp_reset_postdata();
        
return;

}
    // register shortcode
    add_shortcode('home-backend', 'homebackend'); 

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

	//bezpieczenstwo rating section

	function bezpieczenstwo() { 

		$t = get_the_title();


		global $post;
		$terms = wp_get_post_terms($post->ID, 'szkolenia_it', array( 'fields' => 'names' ));
	
		if ($terms) {
			$out = array();   
			foreach ($terms as $term) {
			$out[] = implode(' ',array($term, $t));
			}
			}
	$args = array (
		'category_name'  => 'bezpieczenstwo',
		'posts_per_page' =>  3,
		'titles'         => $out,
		'orderby'        => 'rand',
		'order'          => 'ASC',
	);
	
	$q = new WP_Query($args);
	
	if ($q->have_posts () ) :
			
	while ($q->have_posts () ) : $q->the_post();
	
	$ttd = get_the_title();
	
	$to = explode(' ', $ttd);
	
	
	$object = get_the_title();		
	$name = explode(' ', $object);
	
	$nameput = implode(' ', array_slice($name, 1));
	
	$args_k = array(
		'numberposts'	=> -1,
		'post_type'		=> 'firmy_programy',
		'meta_key'		=> 'nazwa_firmy',
		'meta_value'	=> $nameput,
	  );
	  
	
	$firmy = new WP_Query( $args_k ); 
	
	if( $firmy->have_posts() ): ?>
	
		<?php while( $firmy->have_posts() ) : $firmy->the_post(); 
			
		
	//post title modified
		
		$name = explode(' ', $ttd);
		
		$nameput = implode(' ', array_slice($name, 1));
	
		$term_id = get_term_by('name', $to[0], 'szkolenia_it');
		$terms_link = get_category_link($term_id);
	
	;?>
	<a href="<?php echo esc_url( $terms_link ); ?>" title="<?php echo $to[0] ?>"><li><h4><?php echo $to[0] ?></h4></li></a>
	<li><a href="<?php esc_url(the_permalink()) ?>">
					<?php echo $nameput; ?>
	</a></li>   
	
	<?php 
	wp_reset_query(); 
	endwhile; 
	endif; 
	
	$post_id = get_the_ID();
	echo do_shortcode("[yasr_visitor_votes readonly=yes postid='" . $post_id . "']");
	echo '<hr class="rate-line">';        
	
	endwhile;
	endif;
	wp_reset_query();
	wp_reset_postdata();
			
	return;
	
	}
		// register shortcode
		add_shortcode('home-bezpieczenstwo', 'bezpieczenstwo'); 

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

	//frontend rating section

	function frontend() { 

	    $t = get_the_title();


    global $post;
    $terms = wp_get_post_terms($post->ID, 'szkolenia_it', array( 'fields' => 'names' ));

    if ($terms) {
        $out = array();   
        foreach ($terms as $term) {
        $out[] = implode(' ',array($term, $t));
        }
        }
$args = array (
    'category_name'  => 'fronted',
    'posts_per_page' =>  3,
    'titles'         => $out,
    'orderby'        => 'rand',
    'order'          => 'ASC',
);

$q = new WP_Query($args);

if ($q->have_posts () ) :
        
while ($q->have_posts () ) : $q->the_post();

$ttd = get_the_title();

$to = explode(' ', $ttd);


$object = get_the_title();		
$name = explode(' ', $object);

$nameput = implode(' ', array_slice($name, 1));

$args_k = array(
	'numberposts'	=> -1,
	'post_type'		=> 'firmy_programy',
	'meta_key'		=> 'nazwa_firmy',
	'meta_value'	=> $nameput,
  );
  

$firmy = new WP_Query( $args_k ); 

if( $firmy->have_posts() ): ?>

	<?php while( $firmy->have_posts() ) : $firmy->the_post(); 
		
	
//post title modified
	
	$name = explode(' ', $ttd);
	
	$nameput = implode(' ', array_slice($name, 1));

	$term_id = get_term_by('name', $to[0], 'szkolenia_it');
	$terms_link = get_category_link($term_id);

;?>
<a href="<?php echo esc_url( $terms_link ); ?>" title="<?php echo $to[0] ?>"><li><h4><?php echo $to[0] ?></h4></li></a>
<li><a href="<?php esc_url(the_permalink()) ?>">
				<?php echo $nameput; ?>
</a></li>   

<?php 
wp_reset_query(); 
endwhile; 
endif; 

$post_id = get_the_ID();
echo do_shortcode("[yasr_visitor_votes readonly=yes postid='" . $post_id . "']");
echo '<hr class="rate-line">';        

endwhile;
endif;
wp_reset_query();
wp_reset_postdata();
        
return;

}
		// register shortcode
		add_shortcode('home-frontend', 'frontend'); 

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


	//jezyki rating section

	function jezyki() { 

    $t = get_the_title();


    global $post;
    $terms = wp_get_post_terms($post->ID, 'szkolenia_it', array( 'fields' => 'names' ));

    if ($terms) {
        $out = array();   
        foreach ($terms as $term) {
        $out[] = implode(' ',array($term, $t));
        }
        }
$args = array (
    'category_name'  => 'jezyki-ogolnego-zastosowania',
    'posts_per_page' =>  3,
    'titles'         => $out,
    'orderby'        => 'rand',
    'order'          => 'ASC',
);

$q = new WP_Query($args);

if ($q->have_posts () ) :
        
while ($q->have_posts () ) : $q->the_post();

$ttd = get_the_title();

$to = explode(' ', $ttd);


$object = get_the_title();		
$name = explode(' ', $object);

$nameput = implode(' ', array_slice($name, 1));

$args_k = array(
	'numberposts'	=> -1,
	'post_type'		=> 'firmy_programy',
	'meta_key'		=> 'nazwa_firmy',
	'meta_value'	=> $nameput,
  );
  

$firmy = new WP_Query( $args_k ); 

if( $firmy->have_posts() ): ?>

	<?php while( $firmy->have_posts() ) : $firmy->the_post(); 
		
	
//post title modified
	
	$name = explode(' ', $ttd);
	
	$nameput = implode(' ', array_slice($name, 1));

	$term_id = get_term_by('name', $to[0], 'szkolenia_it');
	$terms_link = get_category_link($term_id);

;?>
<a href="<?php echo esc_url( $terms_link ); ?>" title="<?php echo $to[0] ?>"><li><h4><?php echo $to[0] ?></h4></li></a>
<li><a href="<?php esc_url(the_permalink()) ?>">
				<?php echo $nameput; ?>
</a></li>   

<?php 
wp_reset_query(); 
endwhile; 
endif; 

$post_id = get_the_ID();
echo do_shortcode("[yasr_visitor_votes readonly=yes postid='" . $post_id . "']");
echo '<hr class="rate-line">';        

endwhile;
endif;
wp_reset_query();
wp_reset_postdata();
        
return;

}
		// register shortcode
		add_shortcode('home-jezyki', 'jezyki'); 

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

			//analityka rating section

	function analityka() { 

		$t = get_the_title();


		global $post;
		$terms = wp_get_post_terms($post->ID, 'szkolenia_it', array( 'fields' => 'names' ));
	
		if ($terms) {
			$out = array();   
			foreach ($terms as $term) {
			$out[] = implode(' ',array($term, $t));
			}
			}
	$args = array (
		'category_name'  => 'analityka_danych',
		'posts_per_page' =>  3,
		'titles'         => $out,
		'orderby'        => 'rand',
		'order'          => 'ASC',
	);
	
	$q = new WP_Query($args);
	
	if ($q->have_posts () ) :
			
	while ($q->have_posts () ) : $q->the_post();
	
	$ttd = get_the_title();
	
	$to = explode(' ', $ttd);
	
	
	$object = get_the_title();		
	$name = explode(' ', $object);
	
	$comnameput = implode(' ', array_slice($name, 1));
	
	$args_k = array(
		'numberposts'	=> -1,
		'post_type'		=> 'firmy_programy',
		'meta_key'		=> 'nazwa_firmy',
		'meta_value'	=> $comnameput,
	  );
	  
	
	$firmy = new WP_Query( $args_k ); 
	
	if( $firmy->have_posts() ): ?>
	
		<?php while( $firmy->have_posts() ) : $firmy->the_post(); 
			
		
	//post title modified
		
		$name = explode(' ', $ttd);
		
		$nameput = implode(' ', array_slice($name, 1));
	
		$term_id = get_term_by('name', $to[0], 'szkolenia_it');
		$terms_link = get_category_link($term_id);
	
	;?>
	<a href="<?php echo esc_url( $terms_link ); ?>" title="<?php echo $to[0] ?>"><li><h4><?php echo $to[0] ?></h4></li></a>
	<li><a href="<?php esc_url(the_permalink()) ?>">
					<?php echo $nameput; ?>
	</a></li>   
	
	<?php 
	wp_reset_query(); 
	endwhile; 
	endif; 
	
	$post_id = get_the_ID();
	echo do_shortcode("[yasr_visitor_votes readonly=yes postid='" . $post_id . "']");
	echo '<hr class="rate-line">';        
	
	endwhile;
	endif;
	wp_reset_query();
	wp_reset_postdata();
			
	return;
	
	}
		// register shortcode
		add_shortcode('home-analityka', 'analityka'); 

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

//firmy_programy link to the main single firmy_company page on content-backend

function link_backend() { 




$object = get_the_title();		
$name = explode(' ', $object);

$nameput = implode(' ', array_slice($name, 1));

$args_k = array(
	'numberposts'	=> -1,
	'post_type'		=> 'firmy_programy',
	'meta_key'		=> 'nazwa_firmy',
	'meta_value'	=> $nameput,
  );
  

$firmy = new WP_Query( $args_k ); 

if( $firmy->have_posts() ): ?>

<?php while( $firmy->have_posts() ) : $firmy->the_post(); 
	

$terms_link = get_permalink();
?>
	
<div class="fa-space"><i class="fa fa-tags fa-space"></i>
<a href="<?php echo esc_url( $terms_link ); ?>" title="<?php echo $nameput ?>"><?php echo 'Zestawienie ' . $nameput;?></a>	
</div>

<?php 
endwhile;
endif;
wp_reset_query();
wp_reset_postdata();

return;

}

// register shortcode
add_shortcode('link_on_backend', 'link_backend'); 

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

function link_firmy_programy() { 

	$object = get_the_title();	
	$terms_link = get_permalink();
	?>
		
	<div class="fa-space"><i class="fa fa-tags fa-space"></i>
	<a href="<?php echo esc_url( $terms_link ); ?>" title="<?php echo $object ?>"><?php echo 'Zestawienie ' . $object;?></a>	
	</div>
	<?php
	return;
	
	}
	
	// register shortcode
	add_shortcode('link_on_firmy_by_terms', 'link_firmy_programy'); 

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


		// SECTION WORDPRESS

					//backup rating section

	function backup() { 

				$args = array (
					'post_type'      => 'wordpress_plugin',
					'posts_per_page' =>  3,
					'orderby'        => 'rand',
					'order'          => 'ASC',
					'tax_query' => array(
						array(
							'taxonomy' => 'wordpress_pl',
							'field'    => 'slug',
							'terms'    => 'backup',
						),
					),
				);
	
	
				$q = new WP_Query($args);
	
					
			if ($q->have_posts () ) :
			
				while ($q->have_posts () ) : $q->the_post(); ?>
					
				<li><a href="<?php esc_url(the_permalink()) ?>">
					<h4><?php the_field('nazwa_pluginu');  ?></h4>
				</a></li>

	<?php
$post_id = get_the_ID();
echo do_shortcode("[yasr_visitor_votes readonly=yes postid='" . $post_id . "']");    
echo '<hr class="rate-line">'; 
	
			endwhile;
			endif;
			wp_reset_query();
			wp_reset_postdata();
			
		return;
	
	}
		// register shortcode
		add_shortcode('home-backup', 'backup'); 



	//seo rating section

	function seo() { 

	$args = array (
		'post_type'      => 'wordpress_plugin',
		'posts_per_page' =>  3,
		'orderby'        => 'rand',
		'order'          => 'ASC',
		'tax_query' => array(
				array(
					'taxonomy' => 'wordpress_pl',
					'field'    => 'slug',
					'terms'    => 'seo',
								),
							),
						);
			
			
	$q = new WP_Query($args);
			
							
		if ($q->have_posts () ) :
					
		while ($q->have_posts () ) : $q->the_post();?>
					
		<li><a href="<?php esc_url(the_permalink()) ?>"><h4>
			<?php the_field('nazwa_pluginu');  ?></h4>
		</a></li>

<?php
			
		$post_id = get_the_ID();
		echo do_shortcode("[yasr_visitor_votes readonly=yes postid='" . $post_id . "']");
		echo '<hr class="rate-line">';        
			
		endwhile;
		endif;
		wp_reset_query();
		wp_reset_postdata();
					
		return;
			
	}
	// register shortcode
	add_shortcode('home-seo', 'seo'); 


		//terminarz rating section

		function terminarz() { 

			$args = array (
				'post_type'      => 'wordpress_plugin',
				'posts_per_page' =>  3,
				'orderby'        => 'rand',
				'order'          => 'ASC',
				'tax_query' => array(
						array(
							'taxonomy' => 'wordpress_pl',
							'field'    => 'slug',
							'terms'    => 'terminarz',
										),
									),
								);
					
					
			$q = new WP_Query($args);
					
									
				if ($q->have_posts () ) :
							
				while ($q->have_posts () ) : $q->the_post();?>
					
				<li><a href="<?php esc_url(the_permalink()) ?>">
				<h4><?php the_field('nazwa_pluginu');  ?></h4>
				</a></li>

	<?php
					
				$post_id = get_the_ID();
				echo do_shortcode("[yasr_visitor_votes readonly=yes postid='" . $post_id . "']");
				echo '<hr class="rate-line">';        
					
				endwhile;
				endif;
				wp_reset_query();
				wp_reset_postdata();
							
				return;
					
			}
			// register shortcode
			add_shortcode('home-terminarz', 'terminarz'); 


			
		//oferty pracy rating section

		function oferty() { 

			$args = array (
				'post_type'      => 'wordpress_plugin',
				'posts_per_page' =>  3,
				'orderby'        => 'rand',
				'order'          => 'ASC',
				'tax_query' => array(
						array(
							'taxonomy' => 'wordpress_pl',
							'field'    => 'slug',
							'terms'    => 'oferty-pracy',
										),
									),
								);
					
					
			$q = new WP_Query($args);
					
									
				if ($q->have_posts () ) :
							
				while ($q->have_posts () ) : $q->the_post(); ?>
					
				<li><a href="<?php esc_url(the_permalink()) ?>">
				<h4><?php the_field('nazwa_pluginu');  ?></h4>
				</a></li>

	<?php
					
				$post_id = get_the_ID();
				echo do_shortcode("[yasr_visitor_votes readonly=yes postid='" . $post_id . "']");
				echo '<hr class="rate-line">';        
					
				endwhile;
				endif;
				wp_reset_query();
				wp_reset_postdata();
							
				return;
					
			}
			// register shortcode
			add_shortcode('home-oferty-pracy', 'oferty'); 


// SECTION WOOCOMMERCE

		//faktury rating section

		function faktury() { 

			$args = array (
				'post_type'      => 'woocommerce_plugin',
				'posts_per_page' =>  3,
				'orderby'        => 'rand',
				'order'          => 'ASC',
				'tax_query' => array(
						array(
							'taxonomy' => 'woocommerce_producent',
							'field'    => 'slug',
							'terms'    => 'faktury',
										),
									),
								);
					
					
			$q = new WP_Query($args);
					
									
				if ($q->have_posts () ) :
							
				while ($q->have_posts () ) : $q->the_post(); ?>
					
				<li><a href="<?php esc_url(the_permalink()) ?>">
					<h4><?php the_field('nazwa_woocommerce'); ?></h4>
				</a></li>

	<?php
					
				$post_id = get_the_ID();
				echo do_shortcode("[yasr_visitor_votes readonly=yes postid='" . $post_id . "']");
				echo '<hr class="rate-line">';        
					
				endwhile;
				endif;
				wp_reset_query();
				wp_reset_postdata();
							
				return;
					
			}
			// register shortcode
			add_shortcode('home-faktury', 'faktury'); 


		// logistyka rating section

		function logistyka() { 

			$args = array (
				'post_type'      => 'woocommerce_plugin',
				'posts_per_page' =>  3,
				'orderby'        => 'rand',
				'order'          => 'ASC',
				'tax_query' => array(
						array(
							'taxonomy' => 'woocommerce_producent',
							'field'    => 'slug',
							'terms'    => 'logistyka-i-zarzadzanie-sprzedaza',
										),
									),
								);
					
					
			$q = new WP_Query($args);
					
									
				if ($q->have_posts () ) :
							
				while ($q->have_posts () ) : $q->the_post(); ?>
					
				<li><a href="<?php esc_url(the_permalink()) ?>">
				<h4><?php the_field('nazwa_woocommerce'); ?></h4>
				</a></li>

	<?php
					
				$post_id = get_the_ID();
				echo do_shortcode("[yasr_visitor_votes readonly=yes postid='" . $post_id . "']");
				echo '<hr class="rate-line">';        
					
				endwhile;
				endif;
				wp_reset_query();
				wp_reset_postdata();
							
				return;
					
			}
			// register shortcode
			add_shortcode('home-logistyka', 'logistyka'); 


		// magazyn rating section

		function magazyn() { 

			$args = array (
				'post_type'      => 'woocommerce_plugin',
				'posts_per_page' =>  3,
				'orderby'        => 'rand',
				'order'          => 'ASC',
				'tax_query' => array(
						array(
							'taxonomy' => 'woocommerce_producent',
							'field'    => 'slug',
							'terms'    => 'magazyn',
										),
									),
								);
					
					
			$q = new WP_Query($args);
					
									
				if ($q->have_posts () ) :
							
				while ($q->have_posts () ) : $q->the_post(); ?>
					
				<li><a href="<?php esc_url(the_permalink()) ?>">
				<h4><?php the_field('nazwa_woocommerce'); ?></h4>
				</a></li>

	<?php
					
				$post_id = get_the_ID();
				echo do_shortcode("[yasr_visitor_votes readonly=yes postid='" . $post_id . "']");
				echo '<hr class="rate-line">';        
					
				endwhile;
				endif;
				wp_reset_query();
				wp_reset_postdata();
							
				return;
					
			}
			// register shortcode
			add_shortcode('home-magazyn', 'magazyn'); 


		// marketing rating section

		function marketing() { 

			$args = array (
				'post_type'      => 'woocommerce_plugin',
				'posts_per_page' =>  3,
				'orderby'        => 'rand',
				'order'          => 'ASC',
				'tax_query' => array(
						array(
							'taxonomy' => 'woocommerce_producent',
							'field'    => 'slug',
							'terms'    => 'marketing',
										),
									),
								);
					
					
			$q = new WP_Query($args);
					
									
				if ($q->have_posts () ) :
							
				while ($q->have_posts () ) : $q->the_post(); ?>
					
				<li><a href="<?php esc_url(the_permalink()) ?>">
				<h4><?php the_field('nazwa_woocommerce'); ?></h4>
				</a></li>

	<?php
					
				$post_id = get_the_ID();
				echo do_shortcode("[yasr_visitor_votes readonly=yes postid='" . $post_id . "']");
				echo '<hr class="rate-line">';        
					
				endwhile;
				endif;
				wp_reset_query();
				wp_reset_postdata();
							
				return;
					
			}
			// register shortcode
			add_shortcode('home-marketing', 'marketing'); 


//links listing in the footer

function footer_link_listing() {

//szkolenia

$category_link_backend = get_category_link(4); 
$category_link_safe = get_category_link(5); 
$category_link_frontend = get_category_link(3); 
$category_link_lang = get_category_link(210); 
$category_link_analitics = get_category_link(7); 
$cat_backend = get_cat_name(4);
$cat_safe = get_cat_name(5);
$cat_frontend = get_cat_name(3);
$cat_lang = get_cat_name(210);
$cat_analitics = get_cat_name(7);

//wordpress

$category_link_backup = get_category_link(95); 
$category_link_seo = get_category_link(93); 
$category_link_terminarz = get_category_link(104); 
$category_link_oferty = get_category_link(99); 
$term_backup =get_term( 95, 'wordpress_pl' );
$term_seo =get_term( 93, 'wordpress_pl' );
$term_terminarz =get_term( 104, 'wordpress_pl' );
$term_oferty =get_term( 99, 'wordpress_pl' ); 


//woocommerce
$category_link_faktury = get_category_link(107); 
$category_link_koszyk = get_category_link(111); 
$category_link_logistyka = get_category_link(109); 
$category_link_magazyn = get_category_link(108); 
$category_link_platnosci = get_category_link(106); 
$term_faktury = get_term( 107, 'woocommerce_producent' );
$term_koszyk = get_term( 111, 'woocommerce_producent' );
$term_logistyka = get_term( 109, 'woocommerce_producent' );
$term_magazyn = get_term( 108, 'woocommerce_producent' ); 
$term_platnosci = get_term( 106, 'woocommerce_producent' ); 

?>
<div class="col-lg-3 col-md-6 footer-links">
<h7>Technologie</h7>
<ul>
  <li><i class="bx bx-chevron-right"></i> <a href="<?php echo $category_link_backend; ?>"><?php echo $cat_backend; ?></a></	li>
  <li><i class="bx bx-chevron-right"></i> <a href="<?php echo $category_link_safe; ?>"><?php echo $cat_safe; ?></a></li>
  <li><i class="bx bx-chevron-right"></i> <a href="<?php echo $category_link_frontend; ?>"><?php echo $cat_frontend; ?></a></li>
  <li><i class="bx bx-chevron-right"></i> <a href="<?php echo $category_link_lang; ?>"><?php echo $cat_lang; ?></a></li>
  <li><i class="bx bx-chevron-right"></i> <a href="<?php echo $category_link_analitics; ?>"><?php echo $cat_analitics; ?></a></li>
  <li><i class="bx bx-chevron-right"></i> <a href="<?php echo $category_link_backup; ?>"><?php echo $term_backup->name; ?></a></li>
  <li><i class="bx bx-chevron-right"></i> <a href="<?php echo $category_link_seo; ?>"><?php echo $term_seo->name; ?></a></li>
  <li><i class="bx bx-chevron-right"></i> <a href="<?php echo $category_link_terminarz; ?>"><?php echo $term_terminarz->name; ?></a></li>
  <li><i class="bx bx-chevron-right"></i> <a href="<?php echo $category_link_oferty; ?>"><?php echo $term_oferty->name; ?></a></li>
  <li><i class="bx bx-chevron-right"></i> <a href="<?php echo $category_link_faktury; ?>"><?php echo $term_faktury->name; ?></a></li>
  <li><i class="bx bx-chevron-right"></i> <a href="<?php echo $category_link_koszyk; ?>"><?php echo $term_koszyk->name; ?></a></li>
  <li><i class="bx bx-chevron-right"></i> <a href="<?php echo $category_link_logistyka; ?>"><?php echo $term_logistyka->name; ?></a></li>
  <li><i class="bx bx-chevron-right"></i> <a href="<?php echo $category_link_magazyn; ?>"><?php echo $term_magazyn->name; ?></a></li>
  <li><i class="bx bx-chevron-right"></i> <a href="<?php echo $category_link_platnosci; ?>"><?php echo $term_platnosci->name; ?></a></li>
</ul>
</div>

<?php
return;
}

add_shortcode('footer_links_xxx', 'footer_link_listing'); 