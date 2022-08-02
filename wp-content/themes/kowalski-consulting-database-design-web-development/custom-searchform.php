<form class="my-auto form-search-custom " id="searchform-1" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>"><!-- Topbar Search @media<993 -->
<div class="input-group ">
<input type="text" class="form-control" name="s" placeholder="Szukaj w ..." value="<?php echo get_search_query(); ?>"> 

<span class="input-group-append">  
<button class="btn" type="submit" value="<?php echo esc_attr_x( 'Search', 'submit button' ) ?>">
<i class="fa fa-search"></i>
</button>
</span>
</div>
</form>

