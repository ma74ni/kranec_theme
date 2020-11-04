<?php
  get_header();
  if(have_posts()){
    while(have_posts()){
      the_post();
      $table_name = 'wp_krnc_slide';
      $results = $wpdb->get_results( "SELECT * FROM $table_name WHERE `slide_status` = 1 ORDER BY `slide_order` ASC"  ); ?>
<div class="section text-center">
  <?php
            if(!empty($results)) {
              foreach($results as $row){
                $url_uploads = wp_get_upload_dir()["baseurl"];
          ?>
  <div
    class="slide bg-no-repeat bg-cover bg-center"
    style="background-image: url('<?php echo $url_uploads; ?>/<?php echo $row->slide_image; ?>')"
  >
    <div class="sm:w-3/5 mx-auto px-8">
      <h2 class="text-white text-3xl md:text-4xl lg:text-5xl xl:text-6xl"><?php echo $row->slide_title; ?></h2>
      <p class="mt-8 mb-12 text-lg md:text-xl lg:text-2xl xl:text-3xl"><?php echo $row->slide_subtitle; ?></p>
      <?php
      if($row->slide_button == 1) { ?>
       <a href="<?php echo get_site_url().$row->slide_link; ?>" class="bg-kskyblue-100 hover:bg-kskyblue-200 text-white font-bold py-2 px-12 rounded-full"><?php echo $row->slide_button_text; ?></a>
      <?php } ?>
    </div>
  </div>
  <?php 
              }
          } ?>
  <div class="btn-dropdown-post absolute text-center w-full">
    <button class="nextSection">
      <img
        src="<?php echo get_template_directory_uri(); ?>/assets/images/chev-white.png"
        alt="deslizar"
      />
    </button>
  </div>
</div>
<div class="section">
  <div class="sm:container px-8 sm:mx-auto my-40">
    <?php
      the_content();
      ?>
  </div>
  <div class="btn-dropdown-post absolute text-center w-full">
    <button class="nextSection">
      <img
        src="<?php echo get_template_directory_uri(); ?>/assets/images/chev-skyblue.png"
        alt="deslizar"
      />
    </button>
  </div>
</div>
<?php
  $url_uploads = wp_get_upload_dir()["baseurl"];
  $prefix = $wpdb->prefix;
  $table_client = $prefix . 'client';
  $results = $wpdb->get_results( "SELECT client_name, client_logo,
client_order FROM $table_client WHERE `client_status` = 1 ORDER BY
`client_order`" ); 
  $rowsQuery = $wpdb->num_rows;
  $cols = 7;
  $rowsShow =  ceil($rowsQuery / $cols);
  ?>
<div class="section text-center">
  <div class="px-8 mx-auto pb-8 mb-4">
    <div class="text-center mb-8 mt-24 md:mt-0">
      <h2 class="w-auto inline-block mx-auto separator-h-c-200">CLIENTES</h2>
    </div>
    <div class="mb-4">
          <?php
          if(!empty($results)) { ?>
            <div class="flex flex-wrap justify-center">
            <?php for($i = 0; $i < $rowsQuery; $i++){?>
               <img
                  src="<?php echo $url_uploads; ?>/<?php echo $results[$i]->client_logo; ?>"
                  class="mx-2 lg:mx-10"
                  alt="<?php echo $results[$i]->client_name; ?>"
                />
            <?php } ?>
            </div>
          <?php }
          ?>
    </div>
    <a href="<?php echo get_site_url(); ?>/nuestra-experiencia/"
      class="bg-kskyblue-100 hover:bg-kskyblue-200 text-white font-bold py-2 px-12 rounded-full"
    >
      Proyectos
    </a>
  </div>
  <div class="btn-dropdown-post absolute w-full">
    <button class="nextSection mx-auto">
      <img
        src="<?php echo get_template_directory_uri(); ?>/assets/images/chev-skyblue.png"
        alt="deslizar"
      />
    </button>
  </div>
</div>
<?php }
  }
?>
<?php
  get_footer();
?>
