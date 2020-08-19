<?php
  get_header();
?>
<div class="slide-content min-h-screen w-full bg-blue-400">
  <?php
    if(have_posts()){
      while(have_posts()){
        the_post();
        the_content();
      }
    }
  ?>
</div>
<?php
  get_footer();
?>
