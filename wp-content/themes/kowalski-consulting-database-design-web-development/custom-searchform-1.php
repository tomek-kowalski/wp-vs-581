<form class="my-auto form-search-custom" id="searchform-1" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>"><!-- Topbar Search @media>1810 -->
<div class="input-group ">
<input type="text" class="form-control" name="s" placeholder="Szukaj w ..." value="<?php echo get_search_query(); ?>"> 


<?php wp_dropdown_categories( array(
'show_option_all'   => '',
'show_option_none'  => __('WYBIERZ KATEGORIĘ','kowalski_consulting_com'),
'orderby'           => 'name',
'order'             => 'DESC',
'echo'              => 1,
'selected'          => $cat,
'hierarchical'      => true,
'class'             => 'form-select',
'id'                => 'custom-cat-drop-1',
'value_field'       => 'term_id',
'depth'             => 1,
));?>

<span class="input-group-append">  
<button class="btn" type="submit" value="<?php echo esc_attr_x( 'Search', 'submit button' ) ?>">
<i class="fa fa-search"></i>
</button>
</span>

</div>
</form>

