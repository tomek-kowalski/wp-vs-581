<?php
/**
* Plugin Name:  Management of YARS.
* Plugin URI: https://www.kowlski-engineering.com/
* Description: Management of YARS.
* Version: 1.0
* Author: Tomasz Kowalski
* Author URI: https://pl.linkedin.com/in/tomasz-kowalski-6bb6a830
**/

//adding  titles parameter to array 

	
function widget_text_exec_php( $widget_text ) {
    if( strpos( $widget_text, '<' . '?' ) !== false ) {
        ob_start();
        eval( '?>' . $widget_text );
        $widget_text = ob_get_contents();
        ob_end_clean();
    }
    return $widget_text;
}
add_filter( 'widget_text', 'widget_text_exec_php', 99 );


function wpse_308130_posts_where( $where, $query ) {
    global $wpdb;

    // Check if our custom argument has been set on current query.
    if ( $query->get( 'titles' ) ) {
        $titles = $query->get( 'titles' );

        // Escape passed titles and add quotes.
        $titles = array_map( function( $title ) {
            return "'" . esc_sql( $title ) . "'";
        }, $titles );

        // Implode into string to use in IN() clause.
        $titles = implode( ',', $titles );

        // Add WHERE clause to SQL query.
        $where .= " AND $wpdb->posts.post_title IN ($titles)";
    }

    return $where;
}
add_filter( 'posts_where', 'wpse_308130_posts_where', 10, 2 );


// function that runs post loop in katalog page when shortcode is called

function rating() { 

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
                'category_name'  => 'szkolenia',
                'posts_per_page' => -1,
                'titles'         => $out,
                'orderby'        => 'title',
                'order'          => 'ASC',
            );


            $q = new WP_Query($args);

            

        if ($q->have_posts () ) :
        
            while ($q->have_posts () ) : $q->the_post();
            $ttd = explode(" ", get_the_title());
            ?>

<div class="row">
<div class="col-md-6 col-sm-6">
<div class="row single-row"><div class= "post-desc-firma-opis-s"><strong><?php

echo $t;    

?>   </strong></div></div>
<div class="col-rating">
	<div class="row row-rating-szkolenia-t"><p>Aktualny rating</p></div>
	<div class="row row-rating-szkolenia-t">
    <div class="tit-kat">
        <a href="<?php esc_url(the_permalink()) ?>"><?php echo $ttd[0] ?></a>
    </div>
        <?php 
    $post_id = get_the_id();
    echo do_shortcode("[yasr_visitor_votes readonly=yes size='small' postid='" .  $post_id . "']"); ?>
    </div>
</div>

<div class="post-image">
<?php if(has_post_thumbnail() ): //check for the feature image?>

			<?php the_post_thumbnail(); ?>
			<?php endif; ?>
</div><!--post-image-->

</div>

<div class="col-md-6 col-sm-6 single-row">   
<div class="fa-space"><div class="post-comments-badge">
	<a href="<?php comment_link(); ?>"><i class="fa fa-comments"></i><?php comments_number(0,1,'%'); ?><button class="btn-danger ml-3"> Komentarz</button></a>	
</div></div>  
<?php 

$post_id = get_the_id();

echo do_shortcode("[yasr_visitor_votes postid='" . $post_id . "']");

echo '<hr class="rate-line">'; ?> 
</div><!--col-->     
</div><!--row-->

<?php
    endwhile;
    endif;
    wp_reset_query();
    wp_reset_postdata();
    
    return;
}
    // register shortcode
    add_shortcode('working', 'rating'); 

 
    // function that runs post loop in szkolenia category when shortcode is called
    
    function comrating() { 

    $t = get_the_title();

    $terms = single_cat_title("", false); 

    $out[] = implode(' ',array($terms, $t));

    $args = array (
        'category_name'  => 'szkolenia',
        'posts_per_page' => -1,
        'titles'         => $out,
        'orderby'        => 'title',
        'order'          => 'ASC',
    );


$q = new WP_Query($args);

if ($q->have_posts () ) :

    while ($q->have_posts () ) : $q->the_post();

    $ttd = explode(" ", get_the_title()); ?>

    <div class="row">
    <div class="col-md-6 col-sm-6">
    <div class="row"><div class= "post-desc-firma-opis-s"><strong><?php

echo $t;    

?>   </strong></div></div>
    <div class="col-rating">
        <div class="row row-rating-szkolenia-t"><p>Aktualny rating</p></div>
        <div class="row row-rating-szkolenia-t">
        <div class="tit-kat">
            <a href="<?php esc_url(the_permalink()) ?>"><?php echo $ttd[0] ?></a>
        </div>
            <?php 
        $post_id = get_the_id();
        echo do_shortcode("[yasr_visitor_votes readonly=yes size='small' postid='" .  $post_id . "']"); ?>
        </div>
    </div>
    
    <div class="post-image">
    <?php if(has_post_thumbnail() ): //check for the feature image?>
    
                <?php the_post_thumbnail(); ?>
                <?php endif; ?>
    </div><!--post-image-->
    
    </div>
    
    <div class="col-md-6 col-sm-6">     
    <div class="fa-space"><div class="post-comments-badge">
	<a href="<?php comment_link(); ?>"><i class="fa fa-comments"></i><?php comments_number(0,1,'%'); ?><button class="btn-danger ml-3"> Komentarz</button></a>	
</div></div>
    <?php 
    
    $post_id = get_the_id();
    
    echo do_shortcode("[yasr_visitor_votes postid='" . $post_id . "']");
    
    echo '<hr class="rate-line">'; ?> 
    </div><!--col-->     
    </div><!--row-->
    
    
    <?php   endwhile;
            endif;
            wp_reset_query();
            wp_reset_postdata();
    
return;
}   

// register shortcode
add_shortcode('working-1', 'comrating'); 

// function that runs overall voting post loop in szkolenia category when shortcode is called
    
function voting_rating() { 

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
                'category_name'  => 'szkolenia',
                'posts_per_page' => -1,
                'titles'         => $out,
                'orderby'        => 'title',
                'order'          => 'ASC',
            );

    $q = new WP_Query($args);
         
    if ($q->have_posts () ) :
        
    while ($q->have_posts () ) : $q->the_post();
    $ttd = explode(" ", get_the_title()); 
    $post_id = get_the_ID();
            ?>

    <div class="row">
    <div class="col-md-6 col-sm-6">
    <div class="row"><div class= "post-desc-firma-opis-s"><strong><?php

    the_title();    

    ?>
    </strong></div></div>
    <div class="col-rating">
    <div class="row row-rating-szkolenia-t"><p>Aktualny rating</p></div>
    <div class="row row-rating-szkolenia">
    <div class="tit-kat">
        <a href="<?php esc_url(the_permalink()) ?>"><?php echo $ttd[0] ?></a>
    </div>
    <?php 
    $post_id = get_the_id();
    echo do_shortcode("[yasr_visitor_votes readonly=yes size='small' postid='" .  $post_id . "']"); ?>
    </div>
    </div>
            
    <div class="post-image">
    <?php if(has_post_thumbnail() ): //check for the feature image?>
            
    <?php the_post_thumbnail(); ?>
    <?php endif; ?>
    </div><!--post-image-->
            
    </div>
            
    <div class="col-md-6 col-sm-6">     
    <div class="fa-space"><div class="post-comments-badge">
	<a href="<?php comment_link(); ?>"><i class="fa fa-comments"></i><?php comments_number(0,1,'%'); ?><button class="btn-danger ml-3"> Komentarz</button></a>	
    </div></div>
    <?php 
            
    $post_id = get_the_id();
            
    echo do_shortcode("[yasr_visitor_votes postid='" . $post_id . "']");
            
    echo '<hr class="rate-line">'; ?> 
    </div><!--col-->     
    </div><!--row-->        
            
    <?php   
    endwhile;
    endif;
    wp_reset_query();
    wp_reset_postdata(); 
            
                    
    return;

}
    // register shortcode
    add_shortcode('working-1A', 'voting_rating'); 


// function that runs rating of wordpress_plugin when shortcode is called
    
function wordpressrate() { 

dynamic_sidebar('rating-system');

echo '<hr class="rate-line">';    
        
return;
}   

// register shortcode
add_shortcode('wordpressrate', 'wordpressrate'); 


// function that runs rating of woocommerce_plugin when shortcode is called
    
function woocommercerate() { 

dynamic_sidebar('rating-system');

echo '<hr class="rate-line">';    
        
return;
}   

// register shortcode
add_shortcode('woocommercerate', 'woocommercerate'); 

//VOTING OVERLL 

// function that runs VOTING OVERALL of wordpress_plugin when shortcode is called
    
function wordpressratevote() { 

$post_id = get_the_id();

echo do_shortcode("[yasr_visitor_votes readonly=yes size='small' postid='" .  $post_id . "']");  
        
return;
}   

// register shortcode
add_shortcode('wordpressratevote', 'wordpressratevote'); 


// function that runs VOTING of woocommerce_plugin when shortcode is called
    
function woocommerceratevote() { 

dynamic_sidebar('voting-system');

$post_id = get_the_id();

echo do_shortcode("[yasr_visitor_votes readonly=yes size='small' postid='" .  $post_id . "']");  
        
return;
}   

// register shortcode
add_shortcode('woocommerceratevote', 'woocommerceratevote'); 

// function that runs VOTING of courses in category pages when shortcode is called
    
function backendvote() { 

    $post_id = get_the_id();

    echo do_shortcode("[yasr_visitor_votes readonly=yes size='small' postid='" .  $post_id . "']");
         
return;
}   

// register shortcode
add_shortcode('backendvote', 'backendvote'); 

// function that runs rating of courses in category pages when shortcode is called
    
function backend() { 

    $post_id = get_the_id();

    echo do_shortcode("[yasr_visitor_votes postid='" . $post_id . "']");
    
    echo '<hr class="rate-line">';   
   
    return;
    }   
    
    // register shortcode
    add_shortcode('backend', 'backend'); 


