<?php
/*
Template Name: Home Page KC
 */

  // Custom Fields

  $obszar_1 = get_field('obszar_1');
  $obszar_2 = get_field('obszar_2');
  $obszar_3 = get_field('obszar_3');

  $szkolenia = get_field('szkolenia');
  $wordpress = get_field('wordpress');
  $woocommerce = get_field('woocommerce');


get_header();
?>

<div class="container-fluid" id="contact-row"></div>

<div id="loadspin" hidden><!--spinner-container-->

<!--SUB
==================================================================================-->

<section id="sub">
<div class="container mt-3">
    <div class="row">
    <div class="col-sm-8">
<h5 class="mb-0"><?php echo $obszar_1; ?></h5>
</div><!--col-8-->

<div class="col-sm-4 button-stripe">
    <div class="button-1">
     <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModalCenter" id="Modal_kurs_submit">
  Zgłoś kurs do oceny.
</button>
</div><!--class-button-->
</div><!--col-->

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="MODALSUBSCRIPTION" aria-hidden="true">
  <div class="modal-dialog school-position" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <div class="col">
        <div class="row"><h5 class="w-100 modal-title text-center" id="exampleModalLongTitle">Zgłoszenie kursu</h5></div>
        <div class="row"><?php echo do_shortcode("[blog-s]"); ?></div>
        </div><!--col-->
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="col">
      <div class="row">
<?php echo do_shortcode('[contact-form-7 id="3077" title="Submit Course Form"]') ?> 

</div>
</div>
</div><!--modal-content-->
</div><!--modal-dialog-->
</div><!--Modal-fade-->
</div><!--row-->    


</section>

<!--COURSES
==================================================================================-->

<section class="home-class"> 

<div class="call-container">

<div class="container">
  <div class="row">

    <div class="col-sm order-1 home-cal-1">
    <div class="box-frame">
<div class="call-child-2">
<h3>
    
<?php wp_list_categories( array(
        'include' => array(4),
        'title_li' => '',  
 ) ); ?> 
</h3>
</div><!--call-child-2-->
</div><!--box-frame-->

<div class="row-flex">
<h5>Lista rozwiązań</h5>
</div><!--row-flex-->

<div class="row-flex">
<ul>
<?php echo do_shortcode("[home-backend]"); ?>
</ul>
</div><!--row-flex-->
</div><!--col-sm-->


<div class="col-sm order-2 home-cal-2">
<div class="box-frame-add">
<div class="call-child-6">
<p class="blockquote text-school">
<?php echo $szkolenia; ?>
</p>
</div><!--call-child-6-->
</div><!--box-frame-->
</div><!--col-sm-->

<div class="col-sm order-3 home-cal-3">
<div class="box-frame">
<div class="call-child-3 normal">
<h3>

<?php wp_list_categories( array(
        'include' => array(5),
        'title_li' => '',  
 ) ); ?> 

</h3>
</div><!--call-child-3-->
</div><!--box-frame-->

<div class="row-flex">
<h5>Lista rozwiązań</h5>
</div><!--row-flex-->
<div class="row-flex">
    <ul>
    <?php echo do_shortcode("[home-bezpieczenstwo]"); ?>
        </ul>
</div><!--row-flex-->
</div><!--col-sm-->


</div><!--row-->
</div><!--container-->
</div><!--call-container-->


<div class="call-container-add">

<div class="container">
<div class="row">


<div class="col-sm">
<div class="box-frame">
<div class="call-child-1">

<h3>   
<?php wp_list_categories( array(
        'include' => array(3),
        'title_li' => '',  
 ) ); ?> 
</h3>
</div><!--call-child-1-->
</div><!--box-frame-->

<div class="row-flex">
<h5>Lista rozwiązań</h5>
</div><!--row-flex-->
<div class="row-flex">
    <ul>
    <?php echo do_shortcode("[home-frontend]"); ?>
</ul>
</div><!--row-flex-->
</div><!--col-sm-->


<div class="col-sm">
<div class="box-frame">
<div class="call-child-5 normal"> 
<h3>
<?php wp_list_categories( array(
        'include' => array(210),
        'title_li' => '',  
 ) ); ?> 
</h3>
</div><!--call-child-5-->
</div><!--box-frame-->
<div class="row-flex">
<h5>Lista rozwiązań</h5>
</div><!--row-flex-->
<div class="row-flex">
    <ul>
    <?php echo do_shortcode("[home-jezyki]"); ?>
        </ul>
</div><!--row-flex-->
</div><!--col-sm-->

<div class="col-sm">
<div class="box-frame">
<div class="call-child-4">
<h3>
  
<?php wp_list_categories( array(
        'include' => array(7),
        'title_li' => '',  
 ) ); ?> 

</h3>
</div><!--call-child-4-->
</div><!--box-frame-->

<div class="row-flex">
<h5>Lista rozwiązań</h5>
</div><!--row-flex-->
<div class="row-flex">
    <ul>
    <?php echo do_shortcode("[home-analityka]"); ?>
        </ul>
</div><!--row-flex-->
</div><!--col-sm-->
  
</div><!--row-->
</div><!--container-->


</div><!--call-container-->   

</section>



<!--COURSES COMMENT SECTION
==================================================================================-->
<div class="column-layout " >
<div class="main-column">


<div class="container-fluid"> 
<div class="d-flex adbox-2 mx-auto justify-content-center">
<div class="box-s3 align-items-center">
<p> Zum Beispiel gibt es hier eine Werbung</p>
<h3 >SIDE WERBUNG 6</h3>
</div>
</div>
</div>



<?php get_template_part('content','forum-1'); ?>
				
</div><!--main-column-->

<div class="sidebar-one align-items-start">



<?php if(is_active_sidebar('sidebar-1')):?>
<?php dynamic_sidebar('sidebar-1'); ?>



<?php endif;?>
<div class="col tagcloud">	
   <?php wp_tag_cloud( array(
   'smallest' => 8, // size of least used tag
   'largest'  => 22, // size of most used tag
   'unit'     => 'px', // unit for sizing the tags
   'number'   => 45, // displays at most 45 tags
   'orderby'  => 'name', // order tags alphabetically
   'order'    => 'ASC', // order tags by ascending order
   'taxonomy' => 'szkolenia_it', // you can even make tags for custom taxonomies
   'exclude' => array(74, 70, 73, 71, 72)
) ); ?>
</div>


<div class="ad-frame"> 
<div class="adbox-1 mx-auto">
<p> Zum Beispiel gibt es hier eine Werbung</p>
<h3>SIDE WERBUNG 1</h3>
</div>
</div>


</div><!--sidebar-one-->


<div class="sidebar-two">
<aside id="secondary" class="widget-area" role="complementary">

<?php if( is_user_logged_in() ): ?>
        
<p class="exit-link"><?php wp_loginout( esc_url(get_permalink() )) ?></p>

<?php endif; ?>

<?php if( !is_user_logged_in() ): ?>

  <?php

    $args = [
      'label_username' => 'Wpisz swój login',
      'label_password' => 'Wpisz hasło',
    ];

    wp_login_form( $args );

 ?>

<?php endif; ?>

</aside>

<?php if(is_active_sidebar('sidebar-2')):?>
<?php dynamic_sidebar('sidebar-2'); ?>

<?php endif;?>


<?php get_template_part('sidebar','cat-4'); ?>
<?php get_template_part('last','author-posts'); ?>


</div><!--sidebar-two-->
	
</div><!--column-layout-courses-->

<!--SUB
==================================================================================-->

<section id="sub">
<div class="container mt-3">
    <div class="row">
    <div class="col-sm-8">
<h5 class="mb-0"><?php echo $obszar_2; ?></h5>
</div>
<div class="col-sm-4 button-stripe">
    <div class="button-1">
     <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModalCenter_1" id="Modal_word_submit">
  Zgłoś plugin WordPress do oceny.
</button>
</div><!--class-button-->
</div><!--col-->
<!-- Modal -->
<div class="modal fade" id="exampleModalCenter_1" tabindex="-1" role="dialog" aria-labelledby="MODALSUBSCRIPTION" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <div class="col">
        <div class="row"><h5 class="w-100 modal-title text-center" id="exampleModalLongTitle">Zgłoszenie wtyczki Wordpress</h5></div>
        <div class="row"><?php echo do_shortcode("[blog-word]"); ?></div>
        </div><!--col-->
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php if(is_active_sidebar('button-wordpress-widget-area')) : ?>
<?php dynamic_sidebar('button-wordpress-widget-area'); ?>

<?php endif;?>

</div><!--modal-content-->
</div><!--modal-dialog-->
</div><!--Modal-fade-->
</div><!--row-->    

</section>

<!--WORDPRESS PLUGIN 
==================================================================================-->



<section class="home-class"> 

<div class="call-container-1">

<div class="container">
  <div class="row">
    <div class="col-sm">

    <div class="box-frame-2">
<div class="call-child-2-1">
<h3>
<?php
wp_list_categories( array(
    'orderby'  =>  'name',
    'taxonomy' => 'wordpress_pl',
    'title_li' => '',
    'include'  =>  array(95),
) ); ?> 

</h3>
</div><!--box-frame-->
</div><!--call-->
<div class="row-flex">
<h5>Lista rozwiązań</h5>
    <ul>
    <?php echo do_shortcode("[home-backup]"); ?>
        </ul>
</div><!--box-call-->


</div>
<div class="col-sm">
     
<div class="box-frame-2">
<div class="call-child-2-2">
<h3>

<?php
wp_list_categories( array(
    'orderby' => 'name',
    'title_li' => '',
    'taxonomy' => 'wordpress_pl',
    'include'  =>  array(93) 
)); ?> 

</h3>
</div><!--box-frame-->
</div><!--call-->
<div class="row-flex">
<h5>Lista rozwiązań</h5>
    <ul>
    <?php echo do_shortcode("[home-seo]"); ?>
        </ul>
</div><!--box-call-->


    </div>
    <div class="col-sm">

    <div class="box-frame-2">
<div class="call-child-2-3">
<h3>

<?php
wp_list_categories( array(
    'orderby' => 'name',
    'title_li' => '',
    'taxonomy' => 'wordpress_pl',
    'include'  =>  array(104) 
)); ?> 

</h3>
</div><!--call-->
</div><!--box-frame-->
<div class="row-flex">
<h5>Lista rozwiązań</h5>
    <ul>
    <?php echo do_shortcode("[home-terminarz]"); ?>
        </ul>
</div><!--box-call-->


    </div>
    <div class="col-sm">
    <div class="box-frame-2">
<div class="call-child-2-4">
<h3>

<?php
wp_list_categories( array(
    'orderby' => 'name',
    'title_li' => '',
    'taxonomy' => 'wordpress_pl',
    'include'  =>  array(99) 
)); ?> 
</h3>
</div><!--call-->
</div><!--box-frame-->
<div class="row-flex">
<h5>Lista rozwiązań</h5>
    <ul>
    <?php echo do_shortcode("[home-oferty-pracy]"); ?>
        </ul>
</div><!--box-call-->

    </div>
  </div>
</div>
 
</div><!--call-container-->


</section>




<!--WORDPRESS PLUGIN COMMENT SECTION
==================================================================================-->
<div class="column-layout">
<div class="main-column">




<div class="container-fluid"> 
<div class="d-flex adbox-2 mx-auto justify-content-center">
<div class="box-s3 align-items-center">
<p> Zum Beispiel gibt es hier eine Werbung</p>
<h3 id="wordpress" class="anchor">SIDE WERBUNG 6</h3>
</div>
</div>
</div>

<?php get_template_part('content','forum-2'); ?>
 
</div><!--main-column-->

<div class="sidebar-one align-items-start">

<?php if(is_active_sidebar('sidebar-9')):?>
<?php dynamic_sidebar('sidebar-9'); ?>

<?php endif;?>

<div class="container-fluid align-items-start"> 
<div class="adbox-1 mx-auto">
<div class="box-s2">
<p> Zum Beispiel gibt es hier eine Werbung</p>
<h3>SIDE WERBUNG 2</h3>
</div>
</div>
</div>

</div><!--sidebar-one-->

<div class="sidebar-two">

		    	
<?php if(is_active_sidebar('sidebar-4')):?>
<?php dynamic_sidebar('sidebar-4'); ?>

<?php endif;?>



<?php get_template_part('sidebar','cat-2'); ?>
<?php get_template_part('last','author-posts-2'); ?>		




<div class="row"><div class= "post-desc-firma-opis"><?php the_field('ocena_firma', 'widget_' . 'rating-system'); ?></div></div>

</div><!--sidebar-two-->
	
</div><!--column-layout-->


<!--SUB
==================================================================================-->

<section id="sub">
<div class="container mt-3">
<div class="row">
<div class="col-sm-8">
<h5 class="mb-0"><?php echo $obszar_3; ?></h5>
</div>
<div class="col-sm-4 button-stripe">
    <div class="button-1">
     <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModalCenter_2" id="Modal_woo_submit">
  Zgłoś plugin WooCommerce do oceny.
</button>
</div>
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModalCenter_2" tabindex="-1" role="dialog" aria-labelledby="MODALSUBSCRIPTION" aria-hidden="true">
  <div class="modal-dialog school-position" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <div class="col">
        <div class="row"><h5 class="w-100 modal-title text-center" id="exampleModalLongTitle">Zgłoszenie wtyczki WooCommerces</h5></div>
        <div class="row"><?php echo do_shortcode("[blog-woo]"); ?></div> 
        </div><!--col-->
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php if(is_active_sidebar('button-woocommerce-widget-area')) : ?>
<?php dynamic_sidebar('button-woocommerce-widget-area'); ?>

<?php endif;?>

</div><!--modal-content-->
</div><!--modal-dialog-->
</div><!--Modal-fade-->
</div><!--row--> 
</section>

<!--WOO
==================================================================================-->

<section>

<div class="call-container">

<div class="container">
  <div class="row">
    <div class="col-sm">
 
    <div class="box-frame">
<div class="call-child-3-1">
<h5>

<?php
wp_list_categories( array(
    'orderby' => 'name',
    'title_li' => '',
    'taxonomy' => 'woocommerce_producent',
    'include'  =>  array(107) 
)); ?> 

</h5>
</div><!--call-->
</div><!--box-frame-->
<div class="row-flex">
<h5>Lista rozwiązań</h5>
    <ul>
    <?php echo do_shortcode("[home-faktury]"); ?>
        </ul>
</div><!--box-call-->

    </div>
    <div class="col-sm">

    <div class="box-frame">
<div class="call-child-3-2">
<h5>
<?php
wp_list_categories( array(
    'orderby' => 'name',
    'title_li' => '',
    'taxonomy' => 'woocommerce_producent',
    'include'  =>  array(109) 
)); ?> 

</h5>
</div><!--call-->
</div><!--box-frame-->
<div class="row-flex">
<h5>Lista rozwiązań</h5>
    <ul>
    <?php echo do_shortcode("[home-logistyka]"); ?>
        </ul>
</div><!--box-call-->


    </div>
    <div class="col-sm">

    <div class="box-frame">
<div class="call-child-3-3">
<h5>
<?php
wp_list_categories( array(
    'orderby' => 'name',
    'title_li' => '',
    'taxonomy' => 'woocommerce_producent',
    'include'  =>  array(108) 
)); ?>        
</h5>
</div><!--call-->
</div><!--box-frame-->
<div class="row-flex">
<h5>Lista rozwiązań</h5>
    <ul>
    <?php echo do_shortcode("[home-magazyn]"); ?>
        </ul>
</div><!--box-call-->


    </div>
    <div class="col-sm">
    <div class="box-frame">
<div class="call-child-3-4">
<h5>
<?php
wp_list_categories( array(
    'orderby' => 'name',
    'title_li' => '',
    'taxonomy' => 'woocommerce_producent',
    'include'  =>  array(110) 
)); ?> 
</h5>
</div><!--call-->
</div><!--box-frame-->
<div class="row-flex">
<h5>Lista rozwiązań</h5>
    <ul>
    <?php echo do_shortcode("[home-marketing]"); ?>
        </ul>
</div><!--box-call-->

    </div>
  </div>
</div>

        
</div><!--call-container-->


</section>


<!-- WOOCOMMERCE COMMENT
==================================================================================-->

<div class="column-layout">
<div class="main-column">


<div class="container-fluid"> 
<div class="d-flex adbox-2 mx-auto justify-content-center">
<div class="box-s3 align-items-center">
<p> Zum Beispiel gibt es hier eine Werbung</p>
<h3>SIDE WERBUNG 6</h3>
</div>
</div>
</div>
			
<?php get_template_part('content','forum-3'); ?>
				
</div><!--main-column-->
<div class="sidebar-one align-items-start">

<?php if(is_active_sidebar('sidebar-3')):?>
<?php dynamic_sidebar('sidebar-3'); ?>

<?php endif;?>

<div class="container-fluid"> 
<div class="adbox-1 mx-auto">
<p> Zum Beispiel gibt es hier eine Werbung</p>
<h3>SIDE WERBUNG 3</h3>
</div>
</div>

<div class="container-fluid align-items-start"> 
<div class="adbox-1 mx-auto">
<div class="box-s2">
<p> Zum Beispiel gibt es hier eine Werbung</p>
<h3>SIDE WERBUNG 4</h3>
</div>
</div>
</div>

<div class="container-fluid align-items-start"> 
<div class="adbox-1 mx-auto">
<div class="box-s2">
<p> Zum Beispiel gibt es hier eine Werbung</p>
<h3>SIDE WERBUNG 5</h3>
</div>
</div>
</div>

</div><!--sidebar-one-->

<div class="sidebar-two">
				
		    	
<?php if(is_active_sidebar('sidebar-7')):?>
<?php dynamic_sidebar('sidebar-7'); ?>

<?php endif;?>

<?php get_template_part('sidebar','cat-3'); ?>
<?php get_template_part('last','author-posts-3'); ?>		

</div><!--sidebar-two-->
	
</div><!--column-layout-->



<!--WHO BENEFITS
==================================================================================-->

<section>


</section>

<!--COURSE FEATURES
==================================================================================-->

<section>

</section>

<!--SOFTWARE FEATURES
==================================================================================-->

<section>


</section>

<!--TECHNOLOGY FEATURES
==================================================================================-->



<?php get_footer();
