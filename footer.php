        <div class="section">
          <div class="subtitle text-center mb-8">
            <h2 class="w-auto inline-block mx-auto">VISITA NUESTRO BLOG</h2>
          </div>
          <div class="container mx-auto">
            <div class="grid grid-cols-3 gap-12">
            <?php
            $pincipalPosts = new  WP_QUERY('cat=3&orderby=date&order=ASC');
              if( $pincipalPosts->have_posts() ) {
                while ( $pincipalPosts->have_posts() ) {
                  $pincipalPosts->the_post();?>
                  <div class="single-post text-center">
                    <a href="<?php the_permalink(); ?>">
                        <?php the_post_thumbnail(); ?>
                      </a>
                    <h3 class="header-post uppercase">
                      <a href="<?php the_permalink(); ?>">
                        <?php the_title(); ?>
                      </a>
                    </h3>
                    <p class="text-xl"><?php the_excerpt(); ?></p>
                    <div class="my-8">
                      <a class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">Leer más</a>
                    </div>
                  </div>
                <?php
                }
              }
              wp_reset_postdata();
            ?>
            </div>
          </div>
        </div>
        <div class="section bg-blue-kranec-200">
          <div class="container mx-auto">
            <div class="subtitle text-center mb-8">
            <h2 class="w-auto inline-block mx-auto text-white">COMPRA NUESTROS PRODUCTOS EN LÍNEA</h2>
          </div>
          <div class="flex justify-center w-2/4 mx-auto">
            <div class="text-center px-4 py-2 m-2">
              <img class="mx-auto" src="<?php echo get_template_directory_uri(); ?>/assets/images/proteccion_personal.jpg" alt="">
              <h4 class="text-white">Equipos de protección personal</h4>
            </div>
            <div class="text-center px-4 py-2 m-2">
              <img class="mx-auto" src="<?php echo get_template_directory_uri(); ?>/assets/images/bioseguridad.jpg" alt="">
              <h4 class="text-white">Insumos de bioseguridad</h4>
            </div>
          </div>
          </div>
        </div>
      </div>
    </div>
    <?php 
      wp_footer();
    ?>
  </body>
</html>
