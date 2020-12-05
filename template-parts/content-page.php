<?php
//echo $post->ID;
   if($post->ID != 304 && $post->ID != 308 && !is_checkout() && !is_cart() && !is_account_page()) { ?>
<div class="section">
  <div class="header-blog">
    <div
      class="slide bg-no-repeat bg-cover bg-center"
      style="background-image: url('<?php echo the_post_thumbnail_url(); ?>')"
    >
      <h1
        class="absolute text-center w-full text-5xl text-white <?php echo ($post->ID == 33) ? 'text-kblue-100' : '' ?>"
      >
        <?php single_post_title();?>
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
  }
   if(($post->ID == 33)) {?>
<div class="section">
    <h2 class="text-2xl sm:text-4xl text-center"><strong>Proyectos Destacados</strong></h2>
    <div class="text-center w-2/3 text-lg mx-auto separator-cat mb-20 pb-8">
      <?php the_excerpt(); ?>
    </div>
</div>
<div class="section relative">
  <div class="w-full h-2 bg-kskyblue-100 absolute k-align-line"></div>
  <div class="container absolute top-4 left-0 right-0 mx-auto md:px-8">
    <div class="carousel-example">
      <?php
    $principalPosts = new  WP_QUERY(array( 'post_type' =>
      'portfolio', 'orderby' => 'date', 'order' => 'ASC' )); 
      if($principalPosts->have_posts() ) { 
        $count = -1;
        while ( $principalPosts->have_posts() ){ 
          $principalPosts->the_post(); 
          $src = get_post_meta(get_the_ID(),'data-custom-image', true); ?>
      <div>
        <div class="box">
          <div
            class="max-w-sm overflow-hidden flex flex-col justify-center relative"
          >
          <?php if($src) { ?>
            <img
              class="pb-8"
              src="<?php echo $src['src']; ?>"
              alt="<?php the_title(); ?>"
            />
            <?php } else { ?>
              <div class="h-32"></div>
            <?php } ?>
            <div
              class="rounded-full h-6 w-6 bg-kblue-100 mx-auto absolute k-align-round right-0 left-0"
            ></div>
            <div class="content_item_carousell">
              <div class="flex">
                <div class="w-1/5"></div>
                <div class="w-3/5 text-center">
                  <?php the_post_thumbnail(); ?>
                </div>
                <div class="w-1/5"></div>
              </div>
              <div class="title-project py-4">
                <div class="flex flex-col sm:flex-row justify-center items-center">
                  <div class="w-1/5"></div>
                  <h2
                    class="text-base font-bold cursor-pointer text-center px-1 w-2/5"
                    @click="showInfoProyect = <?php echo $count; ?>"
                  >
                    <?php
                    the_title();
                    ?>
                  </h2>
                  <div @click="showInfoProyect = <?php echo $count; ?>" class="circle-plus text-xl px-1 w-1/5" v-bind:class="[showInfoProyect == <?php echo $count; ?> ? 'opened' : 'closed']">
                    <div class="circle relative cursor-pointer">
                      <div
                        class="horizontal rounded-full absolute bg-kblue-100"
                      ></div>
                      <div
                        class="vertical rounded-full absolute bg-kblue-100"
                      ></div>
                    </div>
                  </div>
                  <div class="w-1/5"></div>
                </div>

                <div v-show="showInfoProyect == <?php echo $count; ?>">
                  <div class="flex">
                    <div class="w-1/5"></div>
                    <div class="w-3/5 text-center">
                      <?php
                    the_content();
                    ?>
                    </div>
                    <div class="w-1/5"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php
        $count++;
        }
      } ?>
    </div>
  </div>
</div>
<?php } else if(($post->ID == 304)) {?>
<div class="section">
  <div class="md:container md:mx-auto">
    <h2 class="text-center separator-h-c-200">Registro de Newsletter</h2>
    <form
      action="https://kranec.us2.list-manage.com/subscribe/post?u=8a7d4b8594fddf6edcf612775&amp;id=dc8328b725"
      method="post"
      id="mc-embedded-subscribe-form"
      name="mc-embedded-subscribe-form"
      class="max-w-4xl mx-auto mt-12"
      target="_blank"
      @submit="checkForm"
      novalidate
    >
      <div class="flex flex-wrap">
        <div class="w-full sm:w-1/2 px-3">
          <input
            class="appearance-none text-center block w-full border border-kskyblue-100 rounded-full py-3 px-4 mb-3 focus:outline-none"
            placeholder="Nombres"
            type="text"
            value=""
            name="FNAME"
            id="mce-FNAME"
            v-model="FNAME"
          />
          <p v-if="errorFNAME" class="text-kskyblue-100 text-xs text-center">
            {{ errorFNAME }}
          </p>
        </div>
        <div class="w-full sm:w-1/2 px-3">
          <input
            class="appearance-none text-center block w-full border border-kskyblue-100 rounded-full py-3 px-4 mb-3 focus:outline-none"
            placeholder="Apellidos"
            type="text"
            value=""
            name="LNAME"
            v-model="LNAME"
            id="mce-LNAME"
          />
          <p v-if="errorLNAME" class="text-kskyblue-100 text-xs text-center">
            {{ errorLNAME }}
          </p>
        </div>
        <div class="w-full sm:w-1/2 px-3">
          <input
            class="appearance-none text-center block w-full border border-kskyblue-100 rounded-full py-3 px-4 mb-3 focus:outline-none"
            placeholder="Correo Electrónico"
            type="email"
            value=""
            name="EMAIL"
            v-model="EMAIL"
            id="mce-EMAIL"
          />
          <p v-if="errorEMAIL" class="text-kskyblue-100 text-xs text-center">
            {{ errorEMAIL }}
          </p>
        </div>
        <div class="w-full sm:w-1/2 px-3">
          <input
            class="appearance-none text-center block w-full border border-kskyblue-100 rounded-full py-3 px-4 mb-3 focus:outline-none"
            placeholder="Empresa"
            type="text"
            value=""
            name="CONAME"
            v-model="CONAME"
            class="required"
            id="mce-CONAME"
          />
          <p v-if="errorCONAME" class="text-kskyblue-100 text-xs text-center">
            {{ errorCONAME }}
          </p>
        </div>
        <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
        <div style="position: absolute; left: -5000px;" aria-hidden="true">
          <input
            type="text"
            name="b_8a7d4b8594fddf6edcf612775_dc8328b725"
            tabindex="-1"
            value=""
          />
        </div>
      </div>
      <div id="mce-responses" class="clear">
        <div
          class="response"
          id="mce-error-response"
          style="display:none"
        ></div>
        <div
          class="response"
          id="mce-success-response"
          style="display:none"
        ></div>
      </div>
      <div class="text-center mt-12">
        <input
          type="submit"
          value="Registrar"
          name="subscribe"
          id="mc-embedded-subscribe"
          class="cursor-pointer text-xl font-light bg-kskyblue-100 hover:bg-kskyblue-200 focus:outline-none focus:shadow-outline text-white py-2 px-12 rounded-full"
        />
      </div>
    </form>
  </div>
</div>
<?php } else if(($post->ID == 308)) {?>
<div class="section">
  <div class="text-center">
    <div class="logo">
      <img
        class="w-64 mx-auto"
        src="<?php echo get_template_directory_uri(); ?>/assets/images/logo_kranec.svg"
        alt=""
      />
    </div>
    <p>te agradece por registrarte</p>
    <div class="content-icon my-8">
      <img
        class="mx-auto"
        src="<?php echo get_template_directory_uri(); ?>/assets/images/icon_register.png"
        alt=""
      />
    </div>
    <p class="mb-8">Visita nuestros diferentes productos y servicios</p>
    <button
      class="text-xl font-light bg-kskyblue-100 hover:bg-kskyblue-200 focus:outline-none focus:shadow-outline text-white py-2 px-12 rounded-full"
    >
      Ir a tienda
    </button>
  </div>
</div>

<?php } else if(is_cart() || is_checkout()){ ?> 
  <div class="section">
    <div class="md:container md:mx-auto mt-24">
    <?php
    if(is_checkout()) {
    $args = array(
      'delimiter' => '<span class="text-kskyblue-100"> > </span>',
      'wrap_before' => '<nav class="text-gray-500" itemprop="breadcrumb">',
      'wrap_after'  => '</nav>',
      'home' => 'Tienda',
    ); 
    woocommerce_breadcrumb($args); 
    } ?>
    <?php 
    if(is_cart()) { ?>
      <h2 class="text-center separator-h-c-200 mb-8">Carrito de Compras</h2>
    <?php } ?>
      <div>
      <?php the_content(); ?>
      <?php /* echo do_shortcode('[best_selling_products category="categoria" limit="2"]'); */ ?>
      </div>
    </div>
  </div>
<?php } else if(is_account_page()){ ?>
  <div class="section">
    <?php the_content();  ?>
  </div>
<?php } else {
  the_content(); 
  } ?>
