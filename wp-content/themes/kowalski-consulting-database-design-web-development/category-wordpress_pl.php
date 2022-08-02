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
<div class="container-fluid" id="contact-row"></div>
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
	'post_type'      => 'wordpress_plugin'
);
$query1 = new WP_Query( $args1 );

the_archive_title(); ?> 

</h5>


</div>
</section>

<div id="loadspin" class="column-layout-cat" hidden>
<div class="main-column">


<div class="button_grp">
				<ul>
					<li id="btn-all" data-li="all" class="btn active">Wszystko</li>
					<li id="btn-word" data-li="course" class="btn">Pluginy Wordpress</li>
					<li id="btn-kurs" data-li="lang" class="btn">Szkolenia i kursy</li>
					<li id="btn-woo" data-li="software" class="btn">Pluginy Woocommerce</li>
				</ul>
			</div>

			<div class="item_grp btn-group" data-toggle="buttons">


				<div class="item lang">
					<div class="icon_wrp">
					<?php $category_link = get_category_link( 36 ); ?>
						<button onclick="location.href='<?php echo $category_link; ?>'"	 class="icon button" data-li="lang" type="button" data-toggle="tooltip" data-placement="top" title="Ruby"><img src="<?php bloginfo('stylesheet_directory'); ?>/assets/img/Icons/rubyonrails.png" alt="Ruby on Rails"/></button>
					</div>

				</div>

				<div class="item lang">
					<div class="icon_wrp">
					<?php $category_link_1 = get_category_link( 34 ); ?>
						<button onclick="location.href='<?php echo $category_link_1; ?>'" class="icon button" data-li="lang" data-toggle="tooltip" data-placement="top" title="Delphi"><img src="<?php bloginfo('stylesheet_directory'); ?>/assets/img/Icons/delphi.png" alt="Delphi" /></button>
					</div>
				</div>

				<div class="item lang">
					<div class="icon_wrp">
					<?php $category_link_2 = get_category_link( 35 ); ?>
						<button onclick="location.href='<?php echo $category_link_2; ?>'" class="icon button" data-li="lang" data-toggle="tooltip" data-placement="top" title="Cybersecurity"><img src="<?php bloginfo('stylesheet_directory'); ?>/assets/img/Icons/cybersecurity.png" alt="Cybersecurity"/></button>
					</div>
				</div>

				<div class="item software">
					<div class="icon_wrp">
						<button class="icon button" data-li="software" data-toggle="tooltip" data-placement="top" title="Software"><img src="" /></button>
					</div>
				</div>

				<div class="item software">
					<div class="icon_wrp">
						<button class="icon button" data-li="software" data-toggle="tooltip" data-placement="top" title="Software"><img src="" /></button>
					</div>
				</div>

				<div class="item lang">
					<div class="icon_wrp">
					<?php $category_link_3 = get_category_link( 37 ); ?>
						<button onclick="location.href='<?php echo $category_link_3; ?>'" class="icon button" data-li="lang" data-toggle="tooltip" data-placement="top" title="Angular"><img src="<?php bloginfo('stylesheet_directory'); ?>/assets/img/Icons/angular.png" alt="Angular"/></button>
					</div>
				</div>

				<div class="item software">
					<div class="icon_wrp">
						<button class="icon button" data-li="software" data-toggle="tooltip" data-placement="top" title="Software"><img src="" /></button>
					</div>
				</div>

				<div class="item course">
					<div class="icon_wrp">
						<button class="icon button" data-li="course" data-toggle="tooltip" data-placement="top" title="Course"><img src="" /></button>
					</div>
				</div>

				<div class="item course">
					<div class="icon_wrp">
						<button class="icon button" data-li="course" data-toggle="tooltip" data-placement="top" title="Course"><img src="" /></button>
					</div>
				</div>

				<div class="item course">
					<div class="icon_wrp">
						<button class="icon button" data-li="course" data-toggle="tooltip" data-placement="top" title="Course"><img src="" /></button>
					</div>
				</div>

				<div class="item lang">
					<div class="icon_wrp">
					<?php $category_link_4 = get_category_link( 38 ); ?>
						<button onclick="location.href='<?php echo $category_link_4; ?>'" class="icon button" data-li="lang" data-toggle="tooltip" data-placement="top" title="React"><img src="<?php bloginfo('stylesheet_directory'); ?>/assets/img/Icons/react.png" alt="React"/></button>
					</div>
				</div>

				<div class="item lang">
					<div class="icon_wrp">
					<?php $category_link_5 = get_category_link( 39 ); ?>
						<button onclick="location.href='<?php echo $category_link_5; ?>'" class="icon button" data-li="lang" data-toggle="tooltip" data-placement="top" title="Redux"><img src="<?php bloginfo('stylesheet_directory'); ?>/assets/img/Icons/Redux.png" alt="Redux"/></button>
					</div>
				</div>

				<div class="item lang">
					<div class="icon_wrp">
					<?php $category_link_6 = get_category_link( 40 ); ?>
						<button onclick="location.href='<?php echo $category_link_6; ?>'" class="icon button" data-li="lang" data-toggle="tooltip" data-placement="top" title="Node.js"><img src="<?php bloginfo('stylesheet_directory'); ?>/assets/img/Icons/node.png" alt="Node.js"/></button>
					</div>
				</div>

				<div class="item lang">
					<div class="icon_wrp">
					<?php $category_link_7 = get_category_link( 41 ); ?>
						<button onclick="location.href='<?php echo $category_link_7; ?>'" class="icon buton" data-li="lang" data-toggle="tooltip" data-placement="top" title="Java"><img src="<?php bloginfo('stylesheet_directory'); ?>/assets/img/Icons/java.png" alt="Java"/></button>
					</div>
				</div>

				<div class="item lang">
					<div class="icon_wrp">
					<?php $category_link_8 = get_category_link( 42 ); ?>
						<button onclick="location.href='<?php echo $category_link_8; ?>'" class="icon button" data-li="lang" data-toggle="tooltip" data-placement="top" title="Django"><img src="<?php bloginfo('stylesheet_directory'); ?>/assets/img/Icons/django.png" alt="Django"/></button>
					</div>
				</div>

				<div class="item lang">
					<div class="icon_wrp">
					<?php $category_link_9 = get_category_link( 43 ); ?>
						<button onclick="location.href='<?php echo $category_link_9; ?>'" class="icon button" data-li="lang" data-toggle="tooltip" data-placement="top" title="TypeScript"><img src="<?php bloginfo('stylesheet_directory'); ?>/assets/img/Icons/typescript.png" alt="Typescript"/></button>
					</div>
				</div>


				<div class="item software">
					<div class="icon_wrp">
						<button class="icon button" data-li="software" data-toggle="tooltip" data-placement="top" title="Software"><img src="" /></button>
					</div>
				</div>

				<div class="item software">
					<div class="icon_wrp">
						<button class="icon button" data-li="software" data-toggle="tooltip" data-placement="top" title="Software"><img src="" /></button>
					</div>
				</div>

				<div class="item software">
					<div class="icon_wrp">
						<button class="icon button" data-li="software" data-toggle="tooltip" data-placement="top" title="Software"><img src="" /></button>
					</div>
				</div>

				<div class="item lang">
					<div class="icon_wrp">
					<?php $category_link_10 = get_category_link( 44 ); ?>
						<button onclick="location.href='<?php echo $category_link_10; ?>'" class="icon button" data-li="lang" data-toggle="tooltip" data-placement="top" title="SQLite"><img src="<?php bloginfo('stylesheet_directory'); ?>/assets/img/Icons/sqlite.png" alt="SQLite"/></button>
					</div>
				</div>

				<div class="item lang">
					<div class="icon_wrp">
					<?php $category_link_11 = get_category_link( 45 ); ?>
						<button onclick="location.href='<?php echo $category_link_11; ?>'" class="icon button" data-li="lang" data-toggle="tooltip" data-placement="top" title="PostgresSQL"><img src="<?php bloginfo('stylesheet_directory'); ?>/assets/img/Icons/postgressql.png" alt="PostgresSql"/></button>
					</div>
				</div>

				<div class="item lang">
					<div class="icon_wrp">
					<?php $category_link_12 = get_category_link( 46 ); ?>
						<button onclick="location.href='<?php echo $category_link_12; ?>'" class="icon button" data-li="lang" data-toggle="tooltip" data-placement="top" title="Redis"><img src="<?php bloginfo('stylesheet_directory'); ?>/assets/img/Icons/redis.png" alt="Redis"/></button>
					</div>
				</div>

				<div class="item lang">
					<div class="icon_wrp">
						<?php $category_link_13 = get_category_link( 47 ); ?>
						<button onclick="location.href='<?php echo $category_link_13; ?>'" class="icon button" data-li="lang" data-toggle="tooltip" data-placement="top" title="MongoDB"><img src="<?php bloginfo('stylesheet_directory'); ?>/assets/img/Icons/mongodb.png" alt="MongoDB"/></button>
					</div>
				</div>

				<div class="item lang">
					<div class="icon_wrp">
						<?php $category_link_14 = get_category_link( 48); ?>
						<button onclick="location.href='<?php echo $category_link_14; ?>'" class="icon button" data-li="lang" data-toggle="tooltip" data-placement="top" title="MySQL"><img src="<?php bloginfo('stylesheet_directory'); ?>/assets/img/Icons/mysql.png" alt="MySQL"/></button>
					</div>
				</div>

				<div class="item lang">
					<div class="icon_wrp">
					<?php $category_link_15 = get_category_link( 49); ?>
						<button onclick="location.href='<?php echo $category_link_15; ?>'" class="icon button" data-li="lang" data-toggle="tooltip" data-placement="top" title="PHP"><img src="<?php bloginfo('stylesheet_directory'); ?>/assets/img/Icons/php.png" alt="PHP" /></button>
					</div>
				</div>

				<div class="item lang">
					<div class="icon_wrp">
					<?php $category_link_16 = get_category_link( 50); ?>	
						<button onclick="location.href='<?php echo $category_link_16; ?>'" class="icon button" data-li="lang" data-toggle="tooltip" data-placement="top" title="JQuery"><img src="<?php bloginfo('stylesheet_directory'); ?>/assets/img/Icons/jquery.png" alt="Jquery"/></button>
					</div>
				</div>

				<div class="item lang">
					<div class="icon_wrp">
					<?php $category_link_17 = get_category_link( 51); ?>
						<button onclick="location.href='<?php echo $category_link_17; ?>'" class="icon button" data-li="lang" data-toggle="tooltip" data-placement="top" title="JavaScript"><img src="<?php bloginfo('stylesheet_directory'); ?>/assets/img/Icons/js.png" alt="JS"/></button>
					</div>
				</div>


				<div class="item lang">
					<div class="icon_wrp">
					<?php $category_link_18 = get_category_link( 52); ?>
						<button onclick="location.href='<?php echo $category_link_18; ?>'" class="icon button" data-li="lang" data-toggle="tooltip" data-placement="top" title="CSS"><img src="<?php bloginfo('stylesheet_directory'); ?>/assets/img/Icons/css.png" alt=""CSS/></button>
					</div>
				</div>

				<div class="item lang">
					<div class="icon_wrp">
					<?php $category_link_19 = get_category_link( 53); ?>
						<button onclick="location.href='<?php echo $category_link_19; ?>'" class="icon button" data-li="lang" data-toggle="tooltip" data-placement="top" title="HTML"><img src="<?php bloginfo('stylesheet_directory'); ?>/assets/img/Icons/html.png" alt="HTML"/></button>
					</div>
				</div>

				<div class="item lang">
					<div class="icon_wrp">
					<?php $category_link_20 = get_category_link( 54); ?>
						<button onclick="location.href='<?php echo $category_link_20; ?>'" class="icon button" data-li="lang" data-toggle="tooltip" data-placement="top" title="Bootstrap"><img src="<?php bloginfo('stylesheet_directory'); ?>/assets/img/Icons/bootstrap.png" alt="Bootstrap"/></button>
					</div>
				</div>

				<div class="item lang">
					<div class="icon_wrp">
					<?php $category_link_21 = get_category_link( 68); ?>
						<button onclick="location.href='<?php echo $category_link_21; ?>'" class="icon button" data-li="lang" data-toggle="tooltip" data-placement="top" title="Wordpress"><img src="<?php bloginfo('stylesheet_directory'); ?>/assets/img/Icons/wordpress.png" alt="Wordpress"/></button>
					</div>
				</div>


				<div class="item lang">
					<div class="icon_wrp">
					<?php $category_link_22 = get_category_link( 57); ?>
						<button onclick="location.href='<?php echo $category_link_22; ?>'" class="icon button" data-li="lang" data-toggle="tooltip" data-placement="top" title="Python"><img src="<?php bloginfo('stylesheet_directory'); ?>/assets/img/Icons/python.png" alt="Python" /></button>
					</div>
				</div>

				<div class="item lang">
					<div class="icon_wrp">
					<?php $category_link_23 = get_category_link( 58); ?>	
						<button onclick="location.href='<?php echo $category_link_23; ?>'" class="icon button" data-li="lang" data-toggle="tooltip" data-placement="top" title="C"><img src="<?php bloginfo('stylesheet_directory'); ?>/assets/img/Icons/c.png" alt="C" /></button>
					</div>
				</div>

				<div class="item lang">
					<div class="icon_wrp">
					<?php $category_link_24 = get_category_link( 59); ?>
						<button onclick="location.href='<?php echo $category_link_24; ?>'" class="icon button" data-li="lang" data-toggle="tooltip" data-placement="top" title="C#"><img src="<?php bloginfo('stylesheet_directory'); ?>/assets/img/Icons/csharp.png" alt="Csharp"/></button>
					</div>
				</div>

				<div class="item lang">
					<div class="icon_wrp">
					<?php $category_link_25 = get_category_link( 33); ?>
						<button onclick="location.href='<?php echo $category_link_25; ?>'" class="icon button" data-li="lang" data-toggle="tooltip" data-placement="top" title="C++"><img src="<?php bloginfo('stylesheet_directory'); ?>/assets/img/Icons/cplus.png" alt="cplus"/></button>
					</div>
				</div>

				<div class="item lang">
					<div class="icon_wrp">
					<?php $category_link_26 = get_category_link( 61); ?>
						<button onclick="location.href='<?php echo $category_link_26; ?>'" class="icon button" data-li="lang" data-toggle="tooltip" data-placement="top" title="Scala"><img src="<?php bloginfo('stylesheet_directory'); ?>/assets/img/Icons/scala.png" alt="scala"/></button>
					</div>
				</div>

				<div class="item lang">
					<div class="icon_wrp">
					<?php $category_link_27 = get_category_link( 62); ?>
						<button onclick="location.href='<?php echo $category_link_27; ?>'" class="icon button" data-li="lang" data-toggle="tooltip" data-placement="top" title="R"><img src="<?php bloginfo('stylesheet_directory'); ?>/assets/img/Icons/r.png" alt="R"/></button>
					</div>
				</div>

				<div class="item lang">
					<div class="icon_wrp">
					<?php $category_link_28 = get_category_link( 63); ?>
						<button onclick="location.href='<?php echo $category_link_28; ?>'" 	class="icon button" data-li="lang" data-toggle="tooltip" data-placement="top" title="Oracle"><img src="<?php bloginfo('stylesheet_directory'); ?>/assets/img/Icons/oracle.png" alt="Oracle"/></button>
					</div>
				</div>

				<div class="item lang">
					<div class="icon_wrp">
					<?php $category_link_29 = get_category_link( 55); ?>
						<button onclick="location.href='<?php echo $category_link_29; ?>'" 	class="icon button" data-li="lang" data-toggle="tooltip" data-placement="top" title="Rest API"><img src="<?php bloginfo('stylesheet_directory'); ?>/assets/img/Icons/rest-api.png" alt="Rest API"/></button>
					</div>
				</div>

				<div class="item lang">
					<div class="icon_wrp">
					<?php $category_link_30 = get_category_link( 65); ?>
						<button onclick="location.href='<?php echo $category_link_30; ?>'" 	class="icon button" data-li="lang" data-toggle="tooltip" data-placement="top" title="Docker"><img src="<?php bloginfo('stylesheet_directory'); ?>/assets/img/Icons/Docker-Symbol.png" alt="Docker-Symbol"/></button>
					</div>
				</div>

				<div class="item lang">
					<div class="icon_wrp">
					<?php $category_link_31 = get_category_link( 56); ?>
						<button onclick="location.href='<?php echo $category_link_31; ?>'" 	class="icon button" data-li="lang" data-toggle="tooltip" data-placement="top" title="Kotlin"><img src="<?php bloginfo('stylesheet_directory'); ?>/assets/img/Icons/Kotlin.png" alt="Kotlin"/></button>
					</div>
				</div>

				<div class="item lang">
					<div class="icon_wrp">
					<?php $category_link_32 = get_category_link( 66); ?>
						<button onclick="location.href='<?php echo $category_link_32; ?>'" 	class="icon button" data-li="lang" data-toggle="tooltip" data-placement="top" title="XML"><img src="<?php bloginfo('stylesheet_directory'); ?>/assets/img/Icons/xml.jpg" alt="XML"/></button>
					</div>
				</div>

				<div class="item lang">
					<div class="icon_wrp">
					<?php $category_link_33 = get_category_link( 69); ?>
						<button onclick="location.href='<?php echo $category_link_33; ?>'" 	class="icon button" data-li="lang" data-toggle="tooltip" data-placement="top" title="GraphQL"><img src="<?php bloginfo('stylesheet_directory'); ?>/assets/img/Icons/GraphQL.png" alt="GraphQL"/></button>
					</div>
				</div>

				<div class="item lang">		
					<div class="icon_wrp">
					<?php $category_link_34 = get_category_link( 67); ?>
						<button onclick="location.href='<?php echo $category_link_34; ?>'" 	class="icon button" data-li="lang" data-toggle="tooltip" data-placement="top" title="Woocommerce"><img src="<?php bloginfo('stylesheet_directory'); ?>/assets/img/Icons/Woo.jpg" alt="Woocommerce"/></button>
					</div>
				</div>

				<div class="item lang">		
					<div class="icon_wrp">
					<?php $category_link_35 = get_category_link( 60); ?>
						<button onclick="location.href='<?php echo $category_link_35; ?>'" 	class="icon button" data-li="lang" data-toggle="tooltip" data-placement="top" title="Microsoft .NET"><img src="<?php bloginfo('stylesheet_directory'); ?>/assets/img/Icons/microsoft-net-logo-black-and-white.png" alt="Microsoft .NET"/></button>
					</div>
				</div>

			</div>



	<!-- MAIN POST LINE
	================================================== -->
		

		<main id="primary" class="site-main">

<?php 
if ($query1 -> have_posts() ) : ?>

	<header class="page-header">
	<div class="row search-title-center">
	<p class="page-title"><strong>
<?php
/* translators: %s: search query. */
printf( esc_html__( 'Znalezione wyniki: %s', 'kowalski-consulting-database-design-web-development' ), '<span>' . get_search_query() . '</span>' );?></strong></p>  
<p><strong><?php echo $query1->found_posts . " " . $result . "."?></strong></p>
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
		get_template_part( 'template-parts/content', 'wordpress' );

	endwhile;
	
	bootstrap_pagination_1(); 


else :

	get_template_part( 'template-parts/content', 'wordpress_pl' );

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

	<?php if(is_active_sidebar('sidebar-4')):?>
<?php dynamic_sidebar('sidebar-4'); ?>

<?php endif;?>
<?php get_template_part('sidebar','cat-2'); ?>
	</div><!--sidebar-two-->

	</div><!-- column-layout -->

<?php get_footer();
