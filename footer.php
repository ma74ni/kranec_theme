<?php
  if(is_front_page() || is_page(18) || $post->ID == 301 || $post->ID == 14){
?>
<div class="section">
  <div class="text-center mt-24 sm:mt-0 mb-8">
    <h2 class="w-auto inline-block mx-auto separator-h-c-200">VISITA NUESTRO BLOG</h2>
  </div>
  <div class="container px-8 mx-auto">
    <div class="grid grid-cols-1 sm:grid-cols-6 gap-12">
      <?php
            $principalPosts = new  WP_QUERY('orderby=date&order=ASC&posts_per_page=3');
              if( $principalPosts->have_posts() ) {
                $numPost = count($principalPosts->posts);
                while ( $principalPosts->have_posts() ) {
                  $principalPosts->the_post();?>
      <div class="<?php echo $numPost == 2 ? 'col-span-3' : 'col-span-2' ?> single-post text-center">
        <a href="<?php the_permalink(); ?>">
          <?php the_post_thumbnail(); ?>
        </a>
        <h3 class="header-post uppercase">
          <a class="text-2xl" href="<?php the_permalink(); ?>">
            <?php the_title(); ?>
          </a>
        </h3>
        <div class="text-lg"><?php the_excerpt(); ?></div>
        <div class="my-8">
          <a class="bg-kskyblue-100 hover:bg-kskyblue-200 text-white font-bold py-2 px-4 rounded-full"
            href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">Leer más</a>
        </div>
      </div>
      <?php
                }
              }
              wp_reset_postdata();
            ?>
    </div>
  </div>
  <div class="bottom-0 absolute text-center w-full">
    <button class="nextSection mx-auto">
      <img src="<?php echo get_template_directory_uri(); ?>/assets/images/chev-skyblue.png" alt="deslizar" />
    </button>
  </div>
</div>
<?php 
          }
        ?>
<footer class="section bg-kblue-200">
  <div class="container mt-24 sm:mt-20 px-8 mx-auto">
    <section class="mb-12">
      <div class="text-center mb-8">
        <?php
        global $product;
        $terms_post = get_the_terms( $post->cat_ID , 'product_cat' ); 
        $cat = $wp_query->get_queried_object(); 
        $cat_slug = $cat->slug;
        if( $cat_slug == 'equipos-de-proteccion-personal' ) { ?>
          <div class="text-center px-4 py-2 m-2">
            <a href="<?php echo esc_url( home_url( '/categoria-producto/productos/insumos-de-bioseguridad/' ) ); ?>"><img class="mx-auto" src="<?php echo get_template_directory_uri(); ?>/assets/images/bioseguridad.jpg" alt=""></a>
          </div>
          <a href="<?php echo esc_url( home_url( '/categoria-producto/productos/insumos-de-bioseguridad/' ) ); ?>" class="w-auto inline-block mx-auto separator-h-c-200 text-white text-4xl">compra nuestros insumos de bioseguridad</a>
        <?php } else if( $cat_slug == 'insumos-de-bioseguridad' ) { ?>
          <div class="text-center px-4 py-2 m-2">
            <a href="<?php echo esc_url( home_url( '/categoria-producto/productos/equipos-de-proteccion-personal/' ) ); ?>"><img class="mx-auto" src="<?php echo get_template_directory_uri(); ?>/assets/images/proteccion_personal.jpg"
            alt=""></a>
        </div>
          <a href="<?php echo esc_url( home_url( '/categoria-producto/productos/equipos-de-proteccion-personal/' ) ); ?>" class="w-auto inline-block mx-auto separator-h-c-200 text-white text-4xl">conoce nuestro catálogo de equipos de protección personal</a>
        <?php } else { ?>
          <h2 class="w-auto inline-block mx-auto separator-h-c-200 text-white">COMPRA NUESTROS PRODUCTOS EN LÍNEA</h2>
          <div class="flex justify-center mt-16">
            <div class="text-center px-4 py-2 m-2">
            <a href="<?php echo esc_url( home_url( '/categoria-producto/productos/equipos-de-proteccion-personal/' ) ); ?>"><img class="mx-auto" src="<?php echo get_template_directory_uri(); ?>/assets/images/proteccion_personal.jpg"
            alt=""></a>
            <h4 class="text-white"><a href="<?php echo esc_url( home_url( '/categoria-producto/productos/equipos-de-proteccion-personal/' ) ); ?>">Equipos de protección personal</a></h4>
          </div>
          <div class="text-center px-4 py-2 m-2">
            <a href="<?php echo esc_url( home_url( '/categoria-producto/productos/insumos-de-bioseguridad/' ) ); ?>"><img class="mx-auto" src="<?php echo get_template_directory_uri(); ?>/assets/images/bioseguridad.jpg" alt=""></a>
            <h4 class="text-white"><a href="<?php echo esc_url( home_url( '/categoria-producto/productos/insumos-de-bioseguridad/' ) ); ?>">Insumos de bioseguridad</a></h4>
          </div>
          </div>
        <?php } ?>
      </div>
    </section>
    <section class="sm:my-40">
      <div class="sm:flex-row flex flex-col items-center sm:divide-x-2 divide-kskyblue-100">
        <div class="sm:flex-1 sm:pr-4">
          <div class="footer-contact text-center mx-auto">
            <a class="text-white w-auto inline-block mx-auto separator-anima font-light text-4xl"
              href="<?php echo get_site_url(); ?>/contacto/">Contáctanos </a>
          </div>
        </div>
        <div class="sm:flex-1 sm:px-4 my-8 sm:my-0">
          <div class="flex justify-center">
            <div class="px-2 md:px-2 lg:px-8">
              <a href="https://wa.me/593994146626" target="_blank">
                <img class="mx-auto i-social"
                  src="<?php echo get_template_directory_uri(); ?>/assets/images/whatsapp.svg" alt="whatsapp">
              </a>
            </div>
            <div class="px-2 md:px-2 lg:px-8">
              <a href="https://www.instagram.com/kranec_s.a" target="_blank">
                <img class="mx-auto i-social"
                  src="<?php echo get_template_directory_uri(); ?>/assets/images/instagram.svg" alt="instagram"></a>
              </a>
            </div>
            <div class="px-2 md:px-2 lg:px-8">
              <a href="https://www.facebook.com/Kranec" target="_blank">
                <img class="mx-auto i-social"
                  src="<?php echo get_template_directory_uri(); ?>/assets/images/facebook.svg" alt="facebook"></a>
              </a>
            </div>
          </div>
        </div>
        <div class="sm:flex-1 sm:pl-4">
          <div class="w-full max-w-sm">
            <div class="flex sm:items-center">
              <div class="w-2/3 sm:px-1">
                <a href="<?php echo esc_url( home_url( '/subscribirse' ) ); ?>" class="w-full inline-block separator-anima text-white">Regístrate y recibe nuestro
                  newsletter</a>
              </div>
              <div class="w-1/3 sm:px-1">
                <a href="<?php echo esc_url( home_url( '/subscribirse' ) ); ?>"><img class="mx-auto sm:mx-0 i-social"
                    src="<?php echo get_template_directory_uri(); ?>/assets/images/sobre.svg" alt="sobre"></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="logo-content my-12">
      <img class="mx-auto" src="<?php echo get_template_directory_uri(); ?>/assets/images/logo_kranec_b.svg"
        alt="facebook"></a>
    </section>
  </div>
</footer>
</div>
</div>
<?php 
      wp_footer();
    ?>
</body>

</html>