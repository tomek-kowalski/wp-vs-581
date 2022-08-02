<div id="<?php comment_ID(); ?>" <?php comment_class(); ?>>

<div class="container comment-form">

<div class="row">

<div class="col-sm-4">

<div class="avatar-frame">
<div class="avatar-img">

<?php echo get_avatar( $comment); $alt = 'Kowalski Consulting' ?>

</div>
</div><!--avatar-img-->
</div><!--col-sm-4-->

<div class="col-sm-4">
<?php 

if ( $comment->user_id != '0' ) {
  echo '<div class="author-class">' . get_user_meta( $comment->user_id, 'nickname', true ) . '</div>';
} else {
  echo '<div class="user-class">' . get_comment_author_link() . '</div>';
}
   
?>
</div><!--col-sm-4-->

<div class="col-sm-4">
<p class="comment-date">
  <?php
    esc_html_e(
      sprintf(
        'Opublikowane: %s @ %s',
        get_comment_date( 'd.m.y' ),
        get_comment_time( )
      ),
      'wptags'
    );
  ?>
</p>
</div><!--col-sm-3-->
</div><!--row-avatar-author-date-->

<div class="container">
<div class="row">

<?php 
    $args = [
      'style'     => 'div',
      'depth'     => 1,
      'max_depth' => 3,
    ];
    comment_reply_link( $args );
  ?>
</div><!--row-->
</div><!--container-->


<div class="container">

<div class="row">
<div class="comment-text">
  <?php comment_text(); ?>
</div>
  </div><!--row-->
  </div><!--column-add-->

</div><!--container-comment-form-->






