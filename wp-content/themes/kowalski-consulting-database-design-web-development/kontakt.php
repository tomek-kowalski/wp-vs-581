<?php
/*
Template Name: Kontakt KC
 */

  // Advanced Custom Fields

get_header();
?>

<!--SUB
==================================================================================-->


<div class="container-fluid" id="contact-row"></div>

<section id="loadspin" id="sub" hidden>
<div class="container mt-3">
<h5 class="mb-0">BĄDŹ Z NAMI W KONTAKCIE</h5>
</div>
</section>


<!--CONTACT FORM
==================================================================================-->

<section>

<?php while ( have_posts() ) : the_post(); ?>

<?php the_content(); ?>

<?php endwhile; ?>

</section>

<?php get_footer();
