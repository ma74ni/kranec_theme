<div class="section">
  <div class="container mx-auto px-12">
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
  <div class="container mx-auto mt-20 px-20">
    <?php
      the_content();
    ?>
  </div>
  <div class="hk-2 wk-420 bg-skyblue-kranec mx-auto mt-8 mb-20"></div>
  <div class="text-center my-12 mx-auto">
    <h2>Puedes ver estros productos en nuestra tienda</h2>
  </div>
</div>
