<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Kowalski_Consulting_Database_Design_Web_Development
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">
	
<div class="comments-wrap">

	<?php
	// You can start editing here -- including this comment!
	if ( have_comments() ) :
		?>
		<h4 class="comments-title">

			<?php
			$kowalski_consulting_database_design_web_development_comment_count = get_comments_number();
			if ( '1' === $kowalski_consulting_database_design_web_development_comment_count ) {
				printf(
					/* translators: 1: title. */
					esc_html__( 'komentarz na temat &ldquo;%1$s&rdquo;', 'kowalski-consulting-database-design-web-development' ),
					'<span>' . wp_kses_post( get_the_title() ) . '</span>'
				);
			} else {
				printf( 
					/* translators: 1: comment count number, 2: title. */
					esc_html( _nx( '%1$s komentarze na temat &ldquo;%2$s&rdquo;', '%1$s komentarze na temat &ldquo;%2$s&rdquo;', $kowalski_consulting_database_design_web_development_comment_count, 'comments title', 'kowalski-consulting-database-design-web-development' ) ),
					number_format_i18n( $kowalski_consulting_database_design_web_development_comment_count ), // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
					'<span>' . wp_kses_post( get_the_title() ) . '</span>'
				);
			}
			?>
		</h4><!-- .comments-title -->

<?php
      $args = [
        'callback' => 'wptags_comment'
      ];
      wp_list_comments( $args );
	  paginate_comments_links();
?>

		<?php

		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() ) :
			?>
			<p class="no-comments"><?php esc_html_e( 'Komentowanie wyłączone.', 'kowalski-consulting-database-design-web-development' ); ?></p>
			<?php
		endif;

	endif; // Check for have_comments().

	comment_form(array(
		'title_reply' => 'Zostaw swoją opinię',	
		
	));
	?>
</div><!-- comments-wrap -->
</div><!-- #comments -->
