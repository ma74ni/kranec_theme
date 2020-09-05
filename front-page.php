<?php
  get_header();
?>
<?php
  if(have_posts()){
    while(have_posts()){
      the_post();
      $url_uploads = wp_get_upload_dir()["baseurl"];
      $table_slide = 'wp_krnc_slide';
      $table_client = 'wp_krnc_client';
      $results = $wpdb->get_results( "SELECT * FROM $table_slide WHERE
`slide_status` = 1" ); ?>
<div class="section text-center">
  <?php
            if(!empty($results)) {
              foreach($results as $row){ 
          ?>
  <div
    class="slide bg-no-repeat bg-cover bg-center"
    style="background-image: url('<?php echo $url_uploads; ?>/<?php echo $row->slide_image; ?>')"
  >
    <div class=" w-1/3 mx-auto">
      <h2 class="text-white"><?php echo $row->slide_title; ?></h2>
      <p class="mt-8 mb-12"><?php echo $row->slide_subtitle; ?></p>
      <?php
              if($row->slide_button == 1) { ?>
      <button
        class="bg-kskyblue-100 hover:bg-kskyblue-200 text-white font-bold py-2 px-12 rounded-full"
      >
        <?php echo $row->slide_button_text; ?>
      </button>
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
  <div class="container md:px-8 mx-auto my-40">
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
      $results = $wpdb->get_results( "SELECT client_name, client_logo,
client_order FROM $table_client WHERE `client_status` = 1 ORDER BY
`client_order`" ); ?>
<div class="section text-center">
  <div class="container md:px-8 mx-auto">
    <div class="text-center mb-8">
      <h2 class="w-auto inline-block border-b-2 border-kskyblue-100 mx-auto">CLIENTES</h2>
    </div>
    <div class="grid grid-cols-6 gap-2 mx-auto">
      <?php
      $count = 1;
      $new_class = 'new-row';
            if(!empty($results)) {
              foreach($results as $row){
                if($count === 1 ){?>
                <div class="mx-auto">
        <img
          src="<?php echo $url_uploads; ?>/<?php echo $row->client_logo; ?>"
          alt="<?php echo $row->client_name; ?>"
        />
      </div>
                <?php } else if($count > 1) { ?>
                <div class="mx-auto <?php echo ((($count-1) % 6) == 0) ? 'new-row' : '' ?>">
        <img
          src="<?php echo $url_uploads; ?>/<?php echo $row->client_logo; ?>"
          alt="<?php echo $row->client_name; ?>"
        />
      </div>
                <?php }
              ?>
      
      <?php 
        $count ++;
            }
          }
          ?>
    </div>
    <button
      class="bg-kskyblue-100 hover:bg-kskyblue-200 text-white font-bold py-2 px-12 rounded-full"
    >
      Proyectos
    </button>
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
