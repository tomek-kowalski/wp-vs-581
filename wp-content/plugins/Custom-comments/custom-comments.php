<?php
/**
* Plugin Name: Custom Comments.
* Plugin URI: https://www.kowlski-engineering.com/
* Description: Customize comment form default fields, validation, custom post reply title, custom commenet repy cancel link author
* Version: 1.0
* Requires at least: 5.2
* Requires PHP:      7.2
* License:           GPL v2 or later
* License URI:       https://www.gnu.org/licenses/gpl-2.0.html
* Author: Tomasz Kowalski
* Text Domain:        Custom Comments.
* Author URI: https://pl.linkedin.com/in/tomasz-kowalski-6bb6a830
**/

/**
 * Customize comment form default fields.
 * Move the comment_field below the author, email, and url fields.
 */
function wpse250243_comment_form_default_fields( $fields ) {
    $commenter     = wp_get_current_commenter();
    $user          = wp_get_current_user();
    $user_identity = $user->exists() ? $user->display_name : '';
    $req           = get_option( 'require_name_email' );
    $aria_req      = ( $req ? " aria-required='true'" : '' );
    $html_req      = ( $req ? " required='required'" : '' );
    $html5         = current_theme_supports( 'html5', 'comment-form' ) ? 'html5' : false;

    $fields = [
        'author' => '<p class="comment-form-author">' . '<label for="author">' . __( 'Imię', 'kowalski_consulting_com'  ) . ( $req ? ' <span class="required">*</span>' : '' ) . '</label> ' .
                    '<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30" maxlength="30"' . $aria_req . $html_req . ' /></p>',
        'email'  => '<p class="comment-form-email"><label for="email">' . __( 'Twój Email', 'kowalski_consulting_com'  ) . ( $req ? ' <span class="required">*</span>' : '' ) . '</label> ' .
                    '<input id="email" name="email" ' . ( $html5 ? 'type="email"' : 'type="text"' ) . ' value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30" maxlength="100" aria-describedby="email-notes"' . $aria_req . $html_req  . ' /></p>',
        'url'    => '<p class="comment-form-url"><label for="url">' . __( 'Strona WWW', 'kowalski_consulting_com'  ) . '</label> ' .
                    '<input id="url" name="url" ' . ( $html5 ? 'type="url"' : 'type="text"' ) . ' placeholder="Adres z https:// lub pole zostawić puste."' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" maxlength="200" /></p>',
		'cookies' => '<p class="comment-form-cookies-consent"><input id="wp-comment-cookies-consent" name="wp-comment-cookies-consent" type="checkbox" value="yes"' . ' />' .
		'<label for="wp-comment-cookies-consent">' . __( 'Zapisz moje dane, adres e-mail i witrynę w przeglądarce aby wypełnić dane podczas pisania kolejnych komentarzy.' ) . '</label></p>',
    ];

    return $fields;
}
add_filter( 'comment_form_default_fields', 'wpse250243_comment_form_default_fields' );


/*Comment Validation*/
function comment_validation_init() {
	if(is_single() && comments_open() ) { ?>        
	  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
	  <script type="text/javascript">
	   jQuery(document).ready(function($) {
		  $('#commentform').validate({
			  rules: {
				  author: {
					  required: true,
					  minlength: 2
				  },
  
				  email: {
					  required: true,
					  email: true
				  },
  
				  comment: {
					  required: true,
					  minlength: 2
				  }
			  },
  
			  messages: {
				  author: "Proszę wpisać imię",
				  email: "Proszę podać ważny adres email.",
				  comment: "Proszę o wpisanie minimum 2 znaków"
			  },
  
			  errorElement: "div",
			  errorPlacement: function(error, element) {
				  element.after(error);
			  }
  
		  });
	  });    
	  </script>
	  <?php
	  }
  }
  add_action('wp_footer', 'comment_validation_init');


  // Add or edit the notes before the comments form
add_filter( 'comment_form_defaults', 'sp_add_comment_form_before' );
function sp_add_comment_form_before( $defaults ) {
	$defaults['comment_notes_before'] = '<p class="comment-notes">Twój adres e-mail nie zostanie opublikowany. Wymagane pola są oznaczone <span class="required">*</span></p>';
	return $defaults;
}

// Change the comment title_reply_to Post SUBJECT
add_filter( 'comment_form_defaults', 'wpb_change_comments' );
function wpb_change_comments( $defaults ) {

	$comment = get_comment();

$defaults['title_reply_to'] = '<div id="reply-title" class="row comment-reply-title">' . __(' Piszesz w temacie posta: ') . '</div>' .'<div class="row comment-title">' . get_the_title($comment->comment_post_ID) . '</div>';	
return $defaults;

}

/*
 * Change the comment reply cancel link to use 'Cancel Reply to 
 */
function add_comment_author_to_cancel_reply_link($formatted_link, $link, $text){

    $comment = get_comment();
    
        // If no comment author is blank, use 'Anonymous'
        
            if ($comment->user_id != '0' ){
                $author=get_user_meta( $comment->user_id, 'first_name', true );
                } else {
                $author=get_comment_author_link();
            }
    
    
        // If the user provided more than a first name, use only first name
        if(strpos($author, ' ')){
            $author = get_user_meta( $comment->user_id[0], 'first_name', true );
        }
    
        // Replace "Cancel Reply" with "Cancel Reply to "
        $formatted_link = str_ireplace($text, 'Anuluj odpowiedź na posta od ' . $author, $formatted_link);
    
        return $formatted_link;
    }
    add_filter('cancel_comment_reply_link', 'add_comment_author_to_cancel_reply_link', 10, 3);


	

