<div class="section">
  <div class="header-blog">
    <div
      class="slide bg-no-repeat bg-cover bg-center"
      style="background-image: url('<?php echo the_post_thumbnail_url(); ?>')"
    >
      <h1 class="absolute text-center w-full text-5xl text-white">
        <?php single_post_title(); ?>
      </h1>
    </div>
    <div class="btn-dropdown-post absolute text-center w-full">
      <button class="nextSection mx-auto">
        <img
          src="<?php echo get_template_directory_uri(); ?>/assets/images/chev-white.png"
          alt="deslizar"
        />
      </button>
    </div>
  </div>
</div>
<?php
    the_content();
  ?>
