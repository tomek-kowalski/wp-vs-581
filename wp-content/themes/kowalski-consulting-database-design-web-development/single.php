<?php
$post = $wp_query->post;

  if (
    is_post_type_archive( 'szkolenia' ) 
    || get_post_type( get_the_ID() ) == 'szkolenia' 
  // in one of the parent cats?
  || is_category(array( 6,7,4,5,3)) 
  // in ANY of the subcats?
  || post_is_in_a_subcategory( array( 6,7,4,5,3 ) )
  
) {
  include( TEMPLATEPATH.'/single-szkolenia-backend.php');
}

elseif ( in_category( 'firmy_programy') ) { 
  include( TEMPLATEPATH.'/single-firmy_programy.php' ); //potential future template for paid profiles
} 

elseif ( in_category( 'wordpress_plugin') ) {
  include( TEMPLATEPATH.'/single-wordpress_plugin.php' );
} 
elseif ( in_category( 'woocommerce_plugin') ) {
  include( TEMPLATEPATH.'/single-woocommerce_plugin.php' );  
} 
else {
  include( TEMPLATEPATH.'/single-generic.php' );
}