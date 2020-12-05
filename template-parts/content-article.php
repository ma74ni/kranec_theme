<div class="section">
  <div class="container mx-auto px-12 pt-24">
    <div class="blog-title text-center">
      <h1 class="text-5xl uppercase"><?php the_title(); ?></h1>
      <div class="text-xl font-light pb-8"><?php the_excerpt(); ?></div>
      <img
        class="object-cover w-full"
        src="<?php echo krnc_first_image(); ?>"
        alt="<?php the_title(); ?>"
      />
      <div class="btn-dropdown-post absolute left-0 w-full">
        <img
          class="mx-auto"
          src="<?php echo get_template_directory_uri(); ?>/assets/images/chev-white.png"
          alt="deslizar"
        />
      </div>
    </div>
  </div>
</div>

<div class="section">
  <div class="container mx-auto mt-20 px-20 py-12 border-b-2 border-kskyblue-100 blog text-justify">
    <?php
      the_content();
    ?>
  </div>
</div>
