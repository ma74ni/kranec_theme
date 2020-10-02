<div class="section">
  <div class="container mx-auto px-12">
    <div class="blog-title text-center">
      
      <h1 class="text-5xl uppercase separator-h-c-200">Resultados de la Búsqueda</h1>
      <div class="w-full max-w-lg py-8 mx-auto">
          <form action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get" class="w-full max-w-4xl">
            <div class="flex justify-center">
              <div class="1/5"></div>
              <input type="text" name="s" id="search" value="<?php echo get_search_query(); ?>" placeholder="Escribe los datos de tu búsqueda" class="appearance-none block text-kblue-100 border border-kskyblue-100 py-2 px-4 leading-tight rounded-full focus:outline-none mr-2 text-center w-3/5">
              <button type="submit" alt="Search" class="bg-kskyblue-100 hover:bg-kskyblue-200 text-white font-bold py-2 px-4 rounded-full w-1/5">Buscar</button></div>
          </form>
        </div>
      <div class="grid grid-cols-3">
        <div class="text-center">
        <h4 class="header-post">
          <a href="<?php the_permalink(); ?>">
            <?php the_title(); ?>
          </a>
        </h4>
          <a class="mx-auto" href="<?php the_permalink(); ?>">
          <?php the_post_thumbnail(); ?>
        </a>
        </div>
      </div>
      
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