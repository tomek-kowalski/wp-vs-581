<?php
/**
* Plugin Name: Bootstrap pagination.
* Plugin URI: https://www.kowlski-engineering.com/
* Description: Bootstrap 4 pagination.
* Version: 1.0
* Author: Tomasz Kowalski
* Author URI: https://pl.linkedin.com/in/tomasz-kowalski-6bb6a830
**/

function fellowtuts_wpbs_pagination($pages = '', $range = 2) 
{  
	$showitems = ($range * 2) + 1;  
	global $paged;
	if(empty($paged)) $paged = 1;
	if($pages == '')
	{
		global $wp_query; 
		$pages = $wp_query->max_num_pages;
	
		if(!$pages)
			$pages = 1;		 
	}   
	
	if(1 != $pages)
	{
	    echo '<nav aria-label="Page navigation" role="navigation">';
        echo '<span class="sr-only">Page navigation</span>';
        echo '<ul class="pagination justify-content-center ft-wpbs">';
		
        echo '<li class="page-item disabled hidden-md-down d-none d-lg-block"><span class="page-link">Strona '.$paged.' z '.$pages.'</span></li>';
	
		for ($i=1; $i <= $pages; $i++)
		{
		    if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
				echo ($paged == $i)? '<li class="page-item active"><span class="page-link"><span class="sr-only">Tutaj jesteś </span>'.$i.'</span></li>' : '<li class="page-item"><a class="page-link" href="'.get_pagenum_link($i).'"><span class="sr-only">Strona </span>'.$i.'</a></li>';
		}

		echo '</ul>';
    
        echo '<ul class="pagination justify-content-center ft-wpbs">';

		if($paged > 2 && $paged > $range+1 && $showitems < $pages) 
		echo '<li class="page-item"><a class="page-link" href="'.get_pagenum_link(1).'" aria-label="First Page"><span class="hidden-sm-down d-none d-md-block">&laquo; Pierwsza</span></a></li>';

	 if($paged > 1 && $showitems < $pages) 
		echo '<li class="page-item"><a class="page-link" href="'.get_pagenum_link($paged - 1).'" aria-label="Previous Page"><span class="hidden-sm-down d-none d-md-block">&lsaquo; Poprzednia</span></a></li>';
		
		if ($paged < $pages && $showitems < $pages) 
			echo '<li class="page-item"><a class="page-link" href="'.get_pagenum_link($paged + 1).'" aria-label="Next Page"><span class="hidden-sm-down d-none d-md-block">Następna &rsaquo;</span></a></li>';  
	
	 	if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) 
			echo '<li class="page-item"><a class="page-link" href="'.get_pagenum_link($pages).'" aria-label="Last Page"><span class="hidden-sm-down d-none d-md-block">Ostatnia &raquo;</span></a></li>';

			echo '</ul>';
			echo '</nav>';
	

        //echo '<div class="pagination-info mb-5 text-center">[ <span class="text-muted">Page</span> '.$paged.' <span class="text-muted">of</span> '.$pages.' ]</div>';	 	
	}
}

//Bootstrap call to pagination 1 home


function bootstrap_pagination_1( \WP_Query $query1 = null, $echo = true) {
    if ( null === $query1 ) {
        global $query1;
    }

	$paged1 = isset( $_GET['paged1'] ) ? (int) $_GET['paged1'] : 1;
    $paged2 = isset( $_GET['paged2'] ) ? (int) $_GET['paged2'] : 1;

    //add query (GET) parameters to generated page URLs
    /*if (isset($_GET[ 'sort' ])) {
        $add_args[ 'sort' ] = (string)$_GET[ 'sort' ];
    }*/

    $pages = paginate_links( array_merge( [
	'add_fragment' => '#szkolenia',
	'format'   => '?paged1=%#%',
	'current'  => $paged1,
	'total'    => $query1->max_num_pages,
	'add_args' => array( 'paged2' => $paged2 ),
    'type'     => 'array',
    ], )
    );

    if ( is_array( $pages ) ) {
        //$current_page = ( get_query_var( 'paged' ) == 0 ) ? 1 : get_query_var( 'paged' );
        $pagination = '<div class="pagination"><ul class="pagination">'; 

        foreach ( $pages as $page ) {
            $pagination .= '<li class="page-item' . (strpos($page, 'current') !== false ? ' active' : '') . '"> ' . str_replace('page-numbers', 'page-link', $page) . '</li>';
        }

        $pagination .= '</ul></div>';

        if ( $echo ) {
            echo $pagination;
        } else {
            return $pagination;
        }
    }

    return null;
}

function fellowtuts_wpbs_pagination_com($pages = '', $range = 2) 
{  
	$showitems = ($range * 2) + 1;  
	global $paged;
	if(empty($paged)) $paged = 1;
	if($pages == '')
	{

		$total_comments = get_comments(array(
			'orderby'   => 'post_date',
			'order'     => 'DESC',
			'status'    => 'approve',	
			'parent'    =>  0,
		));
		$per_page = 4;  
		$pages = ceil(count($total_comments)/$per_page);
	
		if(!$pages)
			$pages = 1;		 
	}   
	
	if(1 != $pages)
	{
	    echo '<nav id="an-btn" aria-label="Page navigation" role="navigation">';
        echo '<span class="sr-only">Page navigation</span>';
        echo '<ul class="pagination justify-content-center ft-wpbs">';
		
        echo '<li class="page-item disabled hidden-md-down d-none d-lg-block"><span class="page-link">Strona '.$paged.' z '.$pages.'</span></li>';
	
	 	if($paged > 2 && $paged > $range+1 && $showitems < $pages) 
			echo '<li class="page-item"><a class="page-link" href="'.get_pagenum_link(1).'" aria-label="First Page"><span class="hidden-sm-down d-none d-md-block">&laquo; Pierwsza</span></a></li>';
	
	 	if($paged > 1 && $showitems < $pages) 
			echo '<li class="page-item"><a class="page-link" href="'.get_pagenum_link($paged - 1).'" aria-label="Previous Page"><span class="hidden-sm-down d-none d-md-block">&lsaquo; Poprzednia</span></a></li>';
	
		for ($i=1; $i <= $pages; $i++)
		{
		    if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
				echo ($paged == $i)? '<li class="page-item active"><span class="page-link"><span class="sr-only">Tutaj jesteś </span>'.$i.'</span></li>' : '<li class="page-item"><a class="page-link" href="'.get_pagenum_link($i).'"><span class="sr-only">Strona </span>'.$i.'</a></li>';
		}
		
		if ($paged < $pages && $showitems < $pages) 
			echo '<li class="page-item"><a class="page-link" href="'.get_pagenum_link($paged + 1).'" aria-label="Next Page"><span class="hidden-sm-down d-none d-md-block">Następna &rsaquo;</span></a></li>';  
	
	 	if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) 
			echo '<li class="page-item"><a class="page-link" href="'.get_pagenum_link($pages).'" aria-label="Last Page"><span class="hidden-sm-down d-none d-md-block">Ostatnia &raquo;</span></a></li>';
	
	 	echo '</ul>';
        echo '</nav>';
        //echo '<div class="pagination-info mb-5 text-center">[ <span class="text-muted">Page</span> '.$paged.' <span class="text-muted">of</span> '.$pages.' ]</div>';	 	
	}
}

function bootstrap_pagination_2( \WP_Query $query1 = null, $echo = true) {
    if ( null === $query1 ) {
        global $query1;
    }

	$paged1 = isset( $_GET['paged1'] ) ? (int) $_GET['paged1'] : 1;
    $paged2 = isset( $_GET['paged2'] ) ? (int) $_GET['paged2'] : 1;

    //add query (GET) parameters to generated page URLs
    /*if (isset($_GET[ 'sort' ])) {
        $add_args[ 'sort' ] = (string)$_GET[ 'sort' ];
    }*/

	$total_comments = get_comments(array(
		'orderby'   => 'post_date',
		'order'     => 'DESC',
		'status'    => 'approve',	
		'parent'    =>  0,
	));
	$per_page = 4;  
	$total = ceil(count($total_comments)/$per_page);

    $pages = paginate_links( array_merge( [
	'add_fragment' => '#komentarze',
	'format'   => '?paged1=%#%',
	'current'  => $paged1,
	'total'    => $total,
	'add_args' => array( 'paged2' => $paged2 ),
    'type'     => 'array',
    ], )
    );


    if ( is_array( $pages ) ) {
        //$current_page = ( get_query_var( 'paged' ) == 0 ) ? 1 : get_query_var( 'paged' );
        $pagination = '<div class="pagination"><ul class="pagination">'; 

        foreach ( $pages as $page ) {
            $pagination .= '<li class="page-item' . (strpos($page, 'current') !== false ? ' active' : '') . '"> ' . str_replace('page-numbers', 'page-link', $page) . '</li>';
        }

        $pagination .= '</ul></div>';

        if ( $echo ) {
            echo $pagination;
        } else {
            return $pagination;
        }
    }

    return null;
}

