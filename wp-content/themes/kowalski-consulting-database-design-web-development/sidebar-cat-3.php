<div class="col side-category-frame">

<?php	


$terms = get_terms('woocommerce_producent'); 
if ( !empty( $terms ) && !is_wp_error( $terms ) ){ 
  echo '<ul>'; 

  foreach ( $terms as $term ) { 
    $term = sanitize_term( $term, 'woocommerce_producent' ); 
    $term_link = get_term_link( $term, 'woocommerce_producent' );  

    echo '<li><a href="' . esc_url( $term_link ) . '">' . $term->name .     '&nbsp;(' . $term->count . ')' . '</a></li>'; 
  } 
  echo '</ul>';
}
 ?>

</div>