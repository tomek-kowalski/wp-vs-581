
    <?php
    $rand_posts = get_posts( array(
        'posts_per_page' => 2,
        'orderby'        => 'rand',
		'post_status' => 'publish',
		'category_name' => 'blog-wordpress',
		'numberposts' => 2,
    ) );
     
    if ( $rand_posts ) {
    foreach ( $rand_posts as $post ) : 
        setup_postdata( $post );
        ?>
		<div class="col author-frame">
		<div class="author-pic row"><?php echo get_avatar( get_the_author_meta( 'ID') ,$size = '60', $default = '', $alt = 'Kowalski Consulting', $args = array( 'class' => 'wt-author-img' )); ?></div>
		<div class="row"><p class="post-desc">Opublikował(a):</p><div class="post-desc"><?php the_author(); ?></div></div>
		<div class="row"><p class="post-desc">W dniu:</p><div class="post-desc"><?php echo get_the_date(); ?></div></div>
		<div class="row"><p class="post-desc">Tytuł posta:</p></div>
		<div class="row author-title"><a href="<?php the_permalink(); ?>"><h4><?php the_title(); ?></h4></a></div>
	   </div>
        <?php
    endforeach; 
    wp_reset_postdata();
    }
    
