<div class="section" data-anchor="header">
  <div class="header-blog">
    <div
      class="slide bg-no-repeat bg-cover bg-center"
      style="background-image: url('<?php echo the_post_thumbnail_url(); ?>')"
    >
      <h1
        class="absolute text-center w-full text-5xl text-white"
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
<div class="section" data-anchor="content">
  <div class="mt-24">
    <div class="text-center w-2/3 text-lg mx-auto separator-cat mb-20 pb-8"><?php the_excerpt(); ?></div>
      <?php
      $page_id = $post->ID;
      $prefix = $wpdb->prefix;
      $table_name = $prefix.'other_product';
      $url_uploads = wp_get_upload_dir()["baseurl"];
      $results = $wpdb->get_results( "SELECT * FROM $table_name WHERE `o_product_status` = 1 AND `o_product_page` = $page_id");
      if(!empty($results)) {
        foreach($results as $row){
        $id_type_product = $row->o_product_ID; ?>
        <div class="text-center pb-4 mt-4 mb-12" v-bind:class="{'open' : dropDowns.<?php echo $row->o_product_toggle; ?>.isOpen}">
          <img class="mx-auto" src="<?php echo $url_uploads; ?>/<?php echo $row->o_product_image; ?>" alt="<?php echo $row->o_product_name; ?>">
          <div class="flex justify-center items-center separator-cat w-2/5 mx-auto my-4">
            <h3 class="text-3xl pr-4"><?php echo $row->o_product_name; ?></h3>
            <div class="content-circle-plus" v-on:click="toggle('<?php echo $row->o_product_toggle; ?>')">
              <div class="circle-plus text-xl closed info-toggle px-1">
                <div class="circle relative cursor-pointer">
                  <div
                    class="horizontal rounded-full absolute bg-kblue-100"
                  ></div>
                  <div
                    class="vertical rounded-full absolute bg-kblue-100"
                  ></div>
                </div>
              </div>
            </div>
          </div>
          <div class="dropdown-info">
            <p class="w-2/3 mx-auto font-light"><?php echo nl2br($row->o_product_description); ?></p>
            <ul class="my-8 font-light list-disc items-products">
            <?php 
            $table_name = $prefix.'content_other_product';
            $results = $wpdb->get_results( "SELECT * FROM $table_name WHERE `c_o_product_status` = 1 AND `o_product_ID` = $id_type_product");
            if(!empty($results)) {
              foreach($results as $row){ ?>
                <li> <?php echo $row->c_o_product_item; ?></li>
              <?php }
              }?>
            </ul>
            <?php if($post->ID != 14){ ?>
            <div class="mt-10 pb-8">
              <a class="bg-kskyblue-100 hover:bg-kskyblue-200 text-white font-bold py-2 px-12 rounded-full" href="#quote" v-on:click="ok = !ok">Cotizar</a>
            </div>
            <?php } ?>
          </div>
        </div>
      <?php }
      }
      ?>
  </div>
</div>
<?php if($post->ID != 14){ ?>
<div id="quote" class="section">
  <h2 class="text-3xl text-center separator-cat">Quiero realizar una cotización</h2>
  <p class="text-center w-2/3 text-lg font-light mx-auto my-4">
    Escribe tus datos para que uno de nuestros expertos se contacte contigo y te asesore en la implementación de sistemas y equipos de protección colectiva
  </p>
  <div class="w-3/5 mx-auto">
    <form action="">
      <div class="flex my-6">
        <div class="w-1/2 px-4"><input class="appearance-none w-full rounded-full border border-kskyblue-100 py-2 font-medium focus:outline-none text-center text-kblue-100 text-opacity-50" type="text" placeholder="Nombres"></div>
        <div class="w-1/2 px-4"><input class="appearance-none w-full rounded-full border border-kskyblue-100 py-2 font-medium focus:outline-none text-center text-kblue-100 text-opacity-50" type="text" placeholder="Apellidos"></div>
      </div>
      <div class="flex my-6">
        <div class="w-1/4"></div>
        <div class="w-1/2 px-4"><input class="appearance-none w-full rounded-full border border-kskyblue-100 py-2 font-medium focus:outline-none text-center text-kblue-100 text-opacity-50" type="text" placeholder="Correo Electrónico"></div>
        <div class="w-1/4"></div>
      </div>
      <div class="flex my-6">
        <div class="w-1/2 px-4"><input class="appearance-none w-full rounded-full border border-kskyblue-100 py-2 font-medium focus:outline-none text-center text-kblue-100 text-opacity-50" type="text" placeholder="Teléfono"></div>
        <div class="w-1/2 px-4"><input class="appearance-none w-full rounded-full border border-kskyblue-100 py-2 font-medium focus:outline-none text-center text-kblue-100 text-opacity-50" type="text" placeholder="Ciudad"></div>
      </div>
      <div class="text-center mt-6">
        <button class="bg-kskyblue-100 hover:bg-kskyblue-200 text-white font-bold py-2 px-12 rounded-full">Enviar</button>
      </div>
    </form>
  </div>
</div>
<?php } ?>