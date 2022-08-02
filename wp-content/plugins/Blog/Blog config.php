<?php
/**
* Plugin Name:  Blog configuration.
* Plugin URI: https://www.kowlski-engineering.com/
* Description: Blog configuration.
* Version: 1.0
* Author: Tomasz Kowalski
* Author URI: https://pl.linkedin.com/in/tomasz-kowalski-6bb6a830
**/



//Sidebar Blog Szkolenia 

    
function blogszkolenia() { 

            $args = array (
                'category_name'  => 'blog-szkolenia',
                'posts_per_page' =>  3, 
                'orderby'    => 'meta_value_num',
                'order'          => 'ASC',
            );

            $q = new WP_Query($args);
         
        if ($q->have_posts () ) :
        
            while ($q->have_posts () ) : $q->the_post(); ?>
        	
     <p class="thep"><a href="<?php esc_url(the_permalink() ); ?>" ><?php the_title(); ?></a></p>

        
        <?php endwhile;
        endif;
        wp_reset_query();
        wp_reset_postdata();
        
    return;

}
    // register shortcode
    add_shortcode('blog-s', 'blogszkolenia'); 


//Sidebar Blog Wordpress 


    function blogwordpress() { 

        $args = array (
            'category_name'  => 'blog-wordpress',
            'posts_per_page' =>  3, 
            'orderby'    => 'meta_value_num',
            'order'          => 'ASC',
        );

        $q = new WP_Query($args);
     
    if ($q->have_posts () ) :
    
        while ($q->have_posts () ) : $q->the_post(); ?>

<p class="thep"><a href="<?php esc_url(the_permalink() ); ?>" ><?php the_title(); ?></a></p>

    
    <?php endwhile;
    endif;
    wp_reset_query();
    wp_reset_postdata();
    
return;

}
// register shortcode
add_shortcode('blog-word', 'blogwordpress'); 

//Sidebar Blog Woocommerce

function blogwoocommerce() { 

    $args = array (
        'category_name'  => 'blog-woocommerce',
        'posts_per_page' =>  3, 
        'orderby'    => 'meta_value_num',
        'order'          => 'ASC',
    );

    $q = new WP_Query($args);
 
if ($q->have_posts () ) :

    while ($q->have_posts () ) : $q->the_post(); ?>

    <p class="thep"><a href="<?php esc_url(the_permalink() ); ?>" ><?php the_title(); ?></a></p>

<?php endwhile;
endif;
wp_reset_query();
wp_reset_postdata();

return;

}
// register shortcode
add_shortcode('blog-woo', 'blogwoocommerce'); 

// DELETING ALL COMMENTS

/*
$query = get_posts(array(
'fields'          => 'ids', // Only get post IDs
'posts_per_page'  => -1
 ));

$comments = get_comments( array( $query => 'post_id' ) );  

foreach ( $comments as $comment ) {
wp_delete_comment( $comment->comment_ID, true);
}
*/
add_filter('duplicate_comment_id', '__return_false');

//Add comment flood just once in Szkolenia inbuilt category.  

/*
function comment_szkolenia() {

$query = get_posts(array(
    'fields'          => 'ids', // Only get post IDs
    'posts_per_page'  => -1
));

$agent = $_SERVER['HTTP_USER_AGENT'];

foreach ($query as $post_id) { 

    $count = get_comments_number($post_id);

    $data = array(
        'comment_post_ID' => $post_id,  
        'comment_author' => 'Kowalski Consulting',
        'comment_author_email' => 'data@epcontract.com',
        'comment_author_url' => 'http://www.kowalski-consulting.com',
        'comment_content' => 'Zapraszamy do komentowania i wyrażania opinii !',
        'comment_author_IP' => '127.3.1.1',
        'comment_agent' => $agent,
        'comment_type'  => '',
        'comment_date' => date('Y-m-d H:i:s'),
        'comment_date_gmt' => date('Y-m-d H:i:s'),
        'comment_approved' => 1,    
    );


    if( empty($count)){
    $comment_id = wp_insert_comment($data);				
    }
}
}
comment_szkolenia();
//Add comment flood just once in Firmy - Szkolenia(page Katalog). 


function comment_katalog() {

$args = array(
    'posts_per_page' => -1,     
    'fields' => 'ids',
    'post_type' => 'firmy_programy',
);

$q = get_posts($args);

$agent = $_SERVER['HTTP_USER_AGENT'];

foreach ($q as $post_id) { 

    $count = get_comments_number($post_id);
    
    $data = array(
        'comment_post_ID' => $post_id,  
        'comment_author' => 'Kowalski Consulting',
        'comment_author_email' => 'data@epcontract.com',
        'comment_author_url' => 'http://www.kowalski-consulting.com',
        'comment_content' => 'Zapraszamy do komentowania szkoleń programistycznych i wyrażania opinii !',
        'comment_author_IP' => '127.3.1.1',
        'comment_agent' => $agent,
        'comment_type'  => '',
        'comment_date' => date('Y-m-d H:i:s'),
        'comment_date_gmt' => date('Y-m-d H:i:s'),
        'comment_approved' => 1,    
    );


    if( empty($count)){
    $comment_id = wp_insert_comment($data);				
    }

}
}
comment_katalog();

//Add comment flood just once in Wordpress(plugin). 

function comment_wodpress() {

    $args = array(
        'posts_per_page' => -1,     
        'fields' => 'ids',
        'post_type' => 'wordpress_plugin',
    );
    
    $q = get_posts($args);
    
    $agent = $_SERVER['HTTP_USER_AGENT'];
    
    foreach ($q as $post_id) { 
    
        $count = get_comments_number($post_id);
        
        $data = array(
            'comment_post_ID' => $post_id,  
            'comment_author' => 'Kowalski Consulting',
            'comment_author_email' => 'data@epcontract.com',
            'comment_author_url' => 'http://www.kowalski-consulting.com',
            'comment_content' => 'Zapraszamy do komentowania wtyczek Wordpress i wyrażania opinii !',
            'comment_author_IP' => '127.3.1.1',
            'comment_agent' => $agent,
            'comment_type'  => '',
            'comment_date' => date('Y-m-d H:i:s'),
            'comment_date_gmt' => date('Y-m-d H:i:s'),
            'comment_approved' => 1,    
        );
    
    
        if( empty($count)){
        $comment_id = wp_insert_comment($data);				
        }
    
    }
    }
    comment_wodpress();

    function comment_woocommerce() {

        $args = array(
            'posts_per_page' => -1,     
            'fields' => 'ids',
            'post_type' => 'woocommerce_plugin',
        );
        
        $q = get_posts($args);
        
        $agent = $_SERVER['HTTP_USER_AGENT'];
        
        foreach ($q as $post_id) { 
        
            $count = get_comments_number($post_id);
            
            $data = array(
                'comment_post_ID' => $post_id,  
                'comment_author' => 'Kowalski Consulting',
                'comment_author_email' => 'data@epcontract.com',
                'comment_author_url' => 'http://www.kowalski-consulting.com',
                'comment_content' => 'Zapraszamy do komentowania wtyczek Woo i wyrażania opinii !',
                'comment_author_IP' => '127.3.1.1',
                'comment_agent' => $agent,
                'comment_type'  => '',
                'comment_date' => date('Y-m-d H:i:s'),
                'comment_date_gmt' => date('Y-m-d H:i:s'),
                'comment_approved' => 1,    
            );
        
        
            if( empty($count)){
            $comment_id = wp_insert_comment($data);				
            }
        
        }
        }
        comment_woocommerce();
        */


        //Update all saved posts in szkoleniaa category 
 
/*
    function update_all_saved_posts( $single_post ) {


        if ( wp_is_post_revision( $single_post ) ) return;
        if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return; 
        // if ('NNN' !== $_POST['post_type']) return; return if post type is not NNN
    
        // unhook this function so it doesn't loop infinitely

        $args = array(
            'category' => '6',  
            'numberposts' => -1
        );
        $all_posts = get_posts($args);

        foreach ($all_posts as $single_post) {
        
        $oldcontent =  get_the_title($single_post);

        $content =  $oldcontent . ' ' . 'Szkolenia programistyczne. Nauka programowania. Szkolenie i kurs IT. Firma szkoleniowa IT. Ocena firm szkoleniowych IT. Firmy uczące programowania. Ocena szkoleń. Komentarze dotyczące szkoleń. ';

        $single_post->post_content = $single_post->$oldcontent . $content;

        // Update the post into the database
        wp_update_post( $single_post );

        }
    }
    
        // hook this function
        add_action('wp_loaded', 'update_all_saved_posts');

 
*/

/*

// Update all saved posts in WordPress plugin custom taxonomy 
function update_all_saved_posts_word( $single_post ) {

    $args = array (
        'post_type'      => 'wordpress_plugin',
        'posts_per_page' =>  -1,
        'tax_query' => array(
            array(
                'taxonomy' => 'wordpress_pl',
                'field'    => 'term_id',
                'terms'    =>  array(95,102,97,96,100,92,101,99,91,93,103,104,105,94)
            )
        )
    );

    $all_posts = get_posts($args);

    foreach ($all_posts as $single_post) {
    
    $oldcontent =  get_the_title($single_post);

    $content =  $oldcontent . ' ' . 'Plugin WordPress. Ocena i ranking pluginów. Komentarze użytkowników. Przydatne wtyczki dla aplikacji opartej o CMS WordPress. Najlepsza wtyczka Wordpress wg użytkownika.';

    $single_post->post_content = $single_post->$oldcontent . $content;

    // Update the post into the database
    wp_update_post( $single_post );
    }
}

// hook this function
add_action('wp_loaded', 'update_all_saved_posts_word');
*/


/*
// Update all saved posts in Woocommerce plugin custom taxonomy 
function update_all_saved_posts_woo( $single_post ) {

    $args = array (
        'post_type'      => 'woocommerce_plugin',
        'posts_per_page' =>  -1,
        'tax_query' => array(
            array(
                'taxonomy' => 'woocommerce_producent',
                'field'    => 'term_id',
                'terms'    =>  array(107,111,109,108,110,106)
            )
        )
    );

    $all_posts = get_posts($args);

    foreach ($all_posts as $single_post) {
    
    $oldcontent =  get_the_title($single_post);

    $content =  $oldcontent . ' ' . 'Plugin Backup WooCoomerce. Ocena i ranking pluginów. Komentarze użytkowników. Przydatne wtyczki dla aplikacji opartej o CMS WordPress z wtyczka Woo. Najlepsza wtyczka WooCommerce wg użytkownika.';

    $single_post->post_content = $single_post->$oldcontent . $content;

    // Update the post into the database
    wp_update_post( $single_post );
    }
}

// hook this function
add_action('wp_loaded', 'update_all_saved_posts_woo');
*/
   