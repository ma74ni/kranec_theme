<?php
  get_header();
?>
<?php
  if(have_posts()){
    while(have_posts()){
      the_post();
      $prefix = $wpdb->prefix;
      $url_uploads = wp_get_upload_dir()["baseurl"];
      $table_slide = $prefix . 'slide';
      $table_client = $prefix . 'client';
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
`client_order`" ); 
  $rowsQuery = $wpdb->num_rows;
  $cols = 6;
  $rowsShow =  ceil($rowsQuery / $cols);
  ?>
<div class="section text-center">
  <div class="container md:px-8 mx-auto">
    <div class="text-center mb-8">
      <h2 class="w-auto inline-block mx-auto separator-h-c-200">CLIENTES</h2>
    </div>
          <?php
          if(!empty($results)) {
            $contador = 0;
            for($i = 0; $i < $rowsShow; $i++) { ?>
            <div class="flex justify-center">
            <?php
              for($j = 0; $j < $cols; $j++){
                $pointer = $contador + $j; 
                if ($results[$pointer]->client_name != ''){ ?>
                <img
                  src="<?php echo $url_uploads; ?>/<?php echo $results[$pointer]->client_logo; ?>"
                  class="mx-8"
                  alt="<?php echo $results[$pointer]->client_name; ?>"
                />
              <?php 
                }
              }
              $contador = $contador + $cols; ?>
            </div>
            <?php }
          }
          ?>
    
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
