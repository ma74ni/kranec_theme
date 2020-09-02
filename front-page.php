<?php
  get_header();
?>
<?php
  if(have_posts()){
    while(have_posts()){
      the_post();
      $table_name = 'wp_krnc_slide';
      $results = $wpdb->get_results( "SELECT * FROM $table_name WHERE `slide_status` = 1" ); ?>
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
    <div class=" w-1/3 mx-auto">
      <h2 class="text-white"><?php echo $row->slide_title; ?></h2>
      <p class="mt-8 mb-12"><?php echo $row->slide_subtitle; ?></p>
      <?php
              if($row->slide_button == 1) { ?>
      <button class="bg-skyblue-kranec hover:bg-skyblue-kranec-200 text-white font-bold py-2 px-12 rounded-full"><?php echo $row->slide_button_text; ?></button>
      <?php } ?>
    </div>
  </div>
  <?php 
              }
          } ?>
  <div class="btn-dropdown-post absolute w-full">
    <button class="nextSection mx-auto">
      <img
        src="<?php echo get_template_directory_uri(); ?>/assets/images/chev-white.png"
        alt="deslizar"
      />
    </button>
  </div>
</div>
<?php
      the_content();
    }
  }
?>
<?php
  get_footer();
?>
