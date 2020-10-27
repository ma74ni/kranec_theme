<?php
/*
*Template Name: Product Categories
*/
?>
<?php get_header();?>
<div class="section">
  <div class="flex">
    <?php
      
            dynamic_sidebar('woo_categories');
          ?>
  <?php if($post->ID == 371) {
    echo $post->ID;
    echo do_shortcode('[products category="equipos-de-proteccion-personal"]');
  }
  if($post->ID == 376) {
    echo $post->ID;
    echo do_shortcode('[products category="proteccion-anticaidas"]');
  }?>
  </div>
</div>
<?php get_footer(); ?>