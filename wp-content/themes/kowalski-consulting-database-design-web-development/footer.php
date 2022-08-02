<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Kowalski_Consulting_Database_Design_Web_Development
 */

$twitter_username = get_post_meta(164,'twitter_username',true);
$facebook_username = get_post_meta(164,'facebook_username',true);
$instagram_username = get_post_meta(164,'instagram_username',true);
$linkedin_username = get_post_meta(164,'linkedin_username',true);


?>

<?php wp_footer(); ?>

<!--FOOTER
==================================================================================-->

<footer id="footer">

    <div class="footer-top">
      <div class="container">
        <div class="row">

        <?php 
        $glowna = 'Strona Główna';
        $katalog = 'Katalog';
        $forum = 'Forum';
        $polityka = 'Polityka prywatności';
        $regulamin = 'Regulamin';
        $kontakt = 'Kontakt';

        ?>

          <div class="col-lg-3 col-md-6 footer-links">
            <h7 >Mapa strony</h7>
            <ul>
							<li><i class="bx bx-chevron-right"></i> <a href="<?php echo get_site_url('https', 'home'); ?>"><?php echo mb_convert_case($glowna, MB_CASE_UPPER, "UTF-8") ?></a></li>
							<li><i class="bx bx-chevron-right"></i> <a href="<?php echo get_site_url('https', 'katalog'); ?>"><?php echo mb_convert_case($katalog, MB_CASE_UPPER, "UTF-8") ?></a></li>
							<li><i class="bx bx-chevron-right"></i> <a href="<?php echo get_site_url('https', 'forum'); ?>"><?php echo mb_convert_case($forum, MB_CASE_UPPER, "UTF-8") ?></a></li>
							<li><i class="bx bx-chevron-right"></i> <a href="<?php echo get_site_url('https', 'polityka prywatnosci'); ?>"><?php echo mb_convert_case($polityka, MB_CASE_UPPER, "UTF-8") ?></a></li>
							<li><i class="bx bx-chevron-right"></i> <a href="<?php echo get_site_url('https', 'regulamin'); ?>"><?php echo mb_convert_case($regulamin, MB_CASE_UPPER, "UTF-8") ?></a></li>
							<li><i class="bx bx-chevron-right"></i> <a href="<?php echo get_site_url('https', 'kontakt'); ?>"><?php echo mb_convert_case($kontakt, MB_CASE_UPPER, "UTF-8") ?></a></li>
            </ul>
          </div>

<?php echo do_shortcode('[footer_links_xxx]'); ?>

          <div class="col-lg-4 col-md-6 footer-newsletter">
            <h7>Dołącz do naszej listy mailingowej</h7>




<div class="d-flex ml-30 mr-auto">			
 <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter-3" id="Modal_button">
  Subskrybuj
</button>
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModalCenter-3" tabindex="-1" role="dialog" aria-labelledby="MODALSUBSCRIPTION" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="w-100 modal-title text-center" id="exampleModalLongTitle">Zamawiam subskrypcje aktualności</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
  
<?php if(is_active_sidebar('first-footer-widget-area')) : ?>
<?php dynamic_sidebar('first-footer-widget-area'); ?>

<?php endif;?>

</div>
</div>
</div>

          </div><!--col-->
        </div><!--row-->
      </div><!--container-->
	 
    </div><!--end-footer-top-->


  <div class="container d-md-flex py-4">

<div class="col">
      <div class="row">

      <div class="mr-md-auto text-center text-md-left">
        
        <div class=""><?php bloginfo('name'); ?>
          &copy; Copyright and Design by <strong><span><a href="https://kowalski-engineering.ee/"><strong>Kowalski Engineering OÜ </strong></a></span></strong><?php echo date(' Y'); ?> All Rights Reserved
        </div>
        <div class="">
        </div>
      </div>
      </div>
      
      <div class="row mt-2 social-bottom">
      <div class="social-links text-center text-md-right pt-3 pt-md-0">
      <?php if( !empty($twitter_username) ) : ?>
<a href="https://twitter.com/<?php echo $twitter_username; ?>" class="twitter"><i class="bx bxl-twitter"></i></a>
<?php endif; ?>

<?php if( !empty($facebook_username) ) : ?>
       <a href="https://facebook.com/<?php echo $facebook_username; ?>" class="facebook"><i class="bx bxl-facebook"></i></a>
<?php endif; ?>

<?php if( !empty($twitter_username) ) : ?>
       <a href="https://instagram.com/<?php echo $instagram_username; ?>" class="instagram"><i class="bx bxl-instagram"></i></a>
<?php endif; ?>

<?php if( !empty($twitter_username) ) : ?>
       <a href="https://linkedin.com/<?php echo $linkedin_username; ?>" class="linkedin"><i class="bx bxl-linkedin"></i></a>  
<?php endif; ?>
      </div>
    </div>
</div>

</div>


</footer>



</body>
</html>
