<?php
          if(is_front_page() || is_page(18)){
        ?>
<div class="section">
  <div class="text-center mb-8">
    <h2 class="w-auto inline-block mx-auto separator-h-c-200">VISITA NUESTRO BLOG</h2>
  </div>
  <div class="container md:px-8 mx-auto">
    <div class="grid grid-cols-3 gap-12">
      <?php
            $principalPosts = new  WP_QUERY('orderby=date&order=ASC&posts_per_page=3');
              if( $principalPosts->have_posts() ) {
                while ( $principalPosts->have_posts() ) {
                  $principalPosts->the_post();?>
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
  <div class="btn-dropdown-post absolute text-center w-full">
    <button class="nextSection mx-auto">
      <img src="<?php echo get_template_directory_uri(); ?>/assets/images/chev-skyblue.png" alt="deslizar" />
    </button>
  </div>
</div>
<?php 
          }
        ?>
<footer class="section bg-kblue-200">
  <div class="container  md:px-8 mx-auto">
    <section class="mb-12">
      <div class="text-center mb-8">
        <h2 class="w-auto inline-block mx-auto separator-h-c-200 text-white">COMPRA NUESTROS PRODUCTOS EN LÍNEA</h2>
      </div>
      <div class="flex justify-center">
        <div class="text-center px-4 py-2 m-2">
          <img class="mx-auto" src="<?php echo get_template_directory_uri(); ?>/assets/images/proteccion_personal.jpg"
            alt="">
          <h4 class="text-white">Equipos de protección personal</h4>
        </div>
        <div class="text-center px-4 py-2 m-2">
          <img class="mx-auto" src="<?php echo get_template_directory_uri(); ?>/assets/images/bioseguridad.jpg" alt="">
          <h4 class="text-white">Insumos de bioseguridad</h4>
        </div>
      </div>
    </section>
    <section class="my-40">
      <div class="flex items-center divide-x-2 divide-kskyblue-100">
        <div class="flex-1 pr-4">
          <div class="footer-contact text-center mx-auto">
            <a class="text-white w-auto inline-block mx-auto separator-anima font-light text-4xl"
              href="<?php echo get_site_url(); ?>/contacto/">Contáctanos </a>
          </div>
        </div>
        <div class="flex-1 px-4">
          <div class="flex justify-center">
            <div class="px-8">
              <a href="https://wa.me/593994146626" target="_blank">
                <img class="mx-auto i-social"
                  src="<?php echo get_template_directory_uri(); ?>/assets/images/whatsapp.svg" alt="whatsapp">
              </a>
            </div>
            <div class="px-8">
              <a href="https://www.instagram.com/kranec_s.a" target="_blank">
                <img class="mx-auto i-social"
                  src="<?php echo get_template_directory_uri(); ?>/assets/images/instagram.svg" alt="instagram"></a>
              </a>
            </div>
            <div class="px-8">
              <a href="https://www.facebook.com/Kranec" target="_blank">
                <img class="mx-auto i-social"
                  src="<?php echo get_template_directory_uri(); ?>/assets/images/facebook.svg" alt="facebook"></a>
              </a>
            </div>
          </div>
        </div>
        <div class="flex-1 pl-4">
          <form name="subscribe" class="w-full max-w-sm">
            <div class="flex">
              <div class="w-2/3 ">
                <a href="" class="w-full inline-block separator-anima text-white">Regístrate y recibe nuestro
                  newsletter</a>
              </div>
              <div class="w-1/3 px-4">
                <button><img class="mx-auto i-social"
                    src="<?php echo get_template_directory_uri(); ?>/assets/images/sobre.svg" alt="sobre"></button>
              </div>
            </div>
          </form>
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