<div class="col side-category-frame">

<?php	


$terms = get_terms('szkolenia_it'); 
if ( !empty( $terms ) && !is_wp_error( $terms ) ){ 
  echo '<ul>'; 

  foreach ( $terms as $term ) { 
    $term = sanitize_term( $term, 'szkolenia_it' ); 
    $term_link = get_term_link( $term, 'szkolenia_it' );  

    echo '<li><a href="' . esc_url( $term_link ) . '">' . $term->name .     '&nbsp;(' . $term->count . ')' . '</a></li>'; 
  } 
  echo '</ul>';
}
 ?>

</div>