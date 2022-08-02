<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Kowalski_Consulting_Database_Design_Web_Development
 */

?>

<section class="no-results not-found">
	<header class="page-header">
		<h6 class="page-title"><?php esc_html_e( 'Nie znaleziono poszukiwanej frazy', 'kowalski-consulting-database-design-web-development' ); ?></h6>
	</header><!-- .page-header -->

	<div class="page-content">
		<?php
		if ( is_home() && current_user_can( 'publish_posts' ) ) :

			printf(
				'<p>' . wp_kses(
					/* translators: 1: link to WP admin new post page. */
					__( 'Gotowy do publikacji pierwszego posta? <a href="%1$s">Get started here</a>.', 'kowalski-consulting-database-design-web-development' ),
					array(
						'a' => array(
							'href' => array(),
						),
					)
				) . '</p>',
				esc_url( admin_url( 'post-new.php' ) )
			);

		elseif ( is_search() ) :
			?>

			<p><?php esc_html_e( 'Przepraszamy, ale nie możemy odnaleść danych wg podanych kryteriów. Spróbuj z innymy słowami kluczowymi.', 'kowalski-consulting-database-design-web-development' ); ?></p>
			
			<div class="col-4">
			<?php get_template_part('custom','searchform'); ?>
			</div>
			<?php
		else :
			?>

			<p><?php esc_html_e( 'Nie możemy znaleść poszukiwanego kontentu. Może warto spróbować opcji wyszukiwania na stronie.', 'kowalski-consulting-database-design-web-development' ); ?></p>
			<div class="col-4">
			<?php get_template_part('custom','searchform'); ?>
			</div>
		<?php
		endif;
		?>
	</div><!-- .page-content -->
</section><!-- .no-results -->
