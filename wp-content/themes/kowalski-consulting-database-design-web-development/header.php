<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Kowalski_Consulting_Database_Design_Web_Development
 */ 

  //Advanced Custom Fields

  $tytul_glowny    = get_post_meta (165,'tytul_glowny',true);
  $opis_strony    = get_post_meta (165,'opis_strony',true);

  $twitter_username = get_post_meta(164,'twitter_username',true);
  $facebook_username = get_post_meta(164,'facebook_username',true);
  $instagram_username = get_post_meta(164,'instagram_username',true);
  $linkedin_username = get_post_meta(164,'linkedin_username',true);

?>

<!doctype html>
<html <?php language_attributes(); ?>>

<head>

	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="content-type" content="<?php bloginfo( 'html_type' ); ?>; charset=<?php bloginfo( 'charset' ) ?>">
  <base href="<?php echo get_site_url(); ?>/">


<link rel="icon" href="<?php bloginfo('stylesheet_directory'); ?>/assets/img/KC-logo.jpg">
<link rel="alternate" href="https://kowalski-consulting.com" hreflang="pl-pl" />


<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-NTPBJKV');</script>
<!-- End Google Tag Manager -->


<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-Z6V01ED0XS"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-Z6V01ED0XS');

</script>
<?php wp_head(); ?>
</head>

<!--HEAD BANNER
==================================================================================-->

<body <?php body_class(); ?>>

<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NTPBJKV"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->



<!--BANNER ANIMATION
==================================================================================-->

<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'kowalski-consulting-database-design-web-development' ); ?></a>

	<div id="advertisement" class="advertisement show center">

	<div class="ads">
  <p>TOP Banner</p>
  <p>LargeLeading Ads are being placed here</p>
</div>

	</div>


<!--Navbar========================================================================-->

<header>

<nav id="navbar" class="navbar navbar-expand-lg navbar-light navbar-custom scrolling-navbar double-nav justify-content-between">
	

<a href="https://kowalski-consulting.com" class="navbar-brand my-auto mx-1"><img src="<?php bloginfo('stylesheet_directory'); ?>/assets/img/stopka.jpg" class="d-inline-block align-bottom my-1 img-custom"  alt="Kowalski Consulting"></a>


<?php
						wp_nav_menu( array(
							'depth'             =>  2,
							'container'         => 'div',
							'container_class'   => 'collapse navbar-collapse',
							'container_id'      => 'navbarResponsive',
							'menu_class'        => 'nav navbar-nav',
							'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
							'walker'            => 'WP_Bootstrap_Navwalker',
						) );
					?>


<div class="nav-line">
  <div class="nav-title">
    KOWALSKI CONSULTING WEB DEVELOPMENT
  </div>
</div>

<div class="social-links my-1 mx-1"><!--Social Icons-->

<?php if( !empty($twitter_username) ) : ?>
<a href="https://twitter.com/<?php echo $twitter_username; ?>" class="twitter"><i class="bx bxl-twitter"></i></a>
<?php endif; ?>

<?php if( !empty($facebook_username) ) : ?>
       <a href="https://facebook.com/<?php echo $facebook_username; ?>" class="facebook"><i class="bx bxl-facebook"></i></a>
<?php endif; ?>

<?php if( !empty($twitter_username) ) : ?>
       <a href="https://instagram.com/<?php echo $instagram_username; ?>" class="instagram"><i class="bx bxl-instagram"></i></a>
<?php endif; ?>

<?php if( !empty($twitter_username) ) : ?>
       <a href="https://linkedin.com/<?php echo $linkedin_username; ?>" class="linkedin"><i class="bx bxl-linkedin"></i></a>  
<?php endif; ?>

</div><!--Social Icons-->

<div class="dropdown show drop-object mx-auto"><!--Icon Dropdown Search-->

<a class="btn btn-secondary icon-search " data-toggle="dropdown" id="dropdownSearch" href="" role="button" aria-expanded="false" aria-haspopup="true"><i class="fa fa-search"></i></a>

<div class="dropdown-menu" aria-labelledby="dropdownSearch" role="menu">
<div class="dropdown-item drop-window">

<form class="mx-auto icon-search-custom "><!-- Responsive Topbar Search -->
<div class="input-group">
<?php get_template_part('custom','searchform'); ?>
</div>
</form>

</div>	
</div>
</div> 


<div class="col-4">
<?php get_template_part('custom','searchform-1'); ?>
</div>


<button class="navbar-toggler collapsed ml-auto" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Przełącznik nawigacji">
		<span class="my-1 mx-2 close">X</span>
 		<span class="navbar-toggler-icon"></span>
</button>

</nav>
<div id="nav_bar" class="d-flex nav_bar justify-content-center">
<?php get_template_part('custom','searchform-nav'); ?>
  <!-- Navbar content -->
</div>

<!--HEADER
==================================================================================-->

<header id="site-header" class="masthead" role="banner">

    <div class="masthead-content">
    <div class="container mt-3">

        <h1 class="masthead-heading mb-0">Web Development</h1>
        <h2 class="masthead-subheading mb-0">Wordpress, Woocommerce, JS, JQueries, HTML, CSS, Bootstrap, Python, PHP, API REST, MySQL, MariaDB, itd.</h2>
      </div>
    </div>
	<div class="bg-circle-1 bg-circle"></div>
    <div class="bg-circle-2 bg-circle"></div>
    <div class="bg-circle-3 bg-circle"></div>
    <div class="bg-circle-4 bg-circle"></div>
	<div class="bg-circle-5 bg-circle"></div>
	<div class="bg-circle-6 bg-circle"></div>
	<div class="bg-circle-7 bg-circle"></div>
	<div class="bg-circle-8 bg-circle"></div>

		</header>

  <div class="d-flex justify-content-center">
  <div id="loader" class="spinner-border spinner-custom" role="status">
    <span class="sr-only">Loading..</span>
  </div>
</div>