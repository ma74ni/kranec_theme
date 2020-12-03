<div class="section" data-anchor="header">
  <div class="header-blog">
    <div
      class="slide bg-no-repeat bg-cover bg-center"
      style="background-image: url('<?php echo the_post_thumbnail_url(); ?>')"
    >
      <h1 class="absolute text-center w-full text-5xl text-white">
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
    <div class="text-center w-2/3 text-lg mx-auto separator-cat mb-20 pb-8">
      <?php the_excerpt(); ?>
    </div>
    <?php
      $page_id = $post->ID; $prefix = $wpdb->prefix; $table_name =
    $prefix.'other_product'; $url_uploads = wp_get_upload_dir()["baseurl"];
    $results = $wpdb->get_results( "SELECT * FROM $table_name WHERE
    `o_product_status` = 1 AND `o_product_page` = $page_id");
    $count_item = -1;
    if(!empty($results)) { 
      foreach($results as $row) { 
        $id_type_product = $row->o_product_ID; ?>
    <div
      class="text-center pb-4 mt-4 mb-12"
    >
      <img
        class="mx-auto"
        src="<?php echo $url_uploads; ?>/<?php echo $row->o_product_image; ?>"
        alt="<?php echo $row->o_product_name; ?>"
      />
      <div
        @click="showDescProd = <?php echo $count_item; ?>"
        class="flex justify-center items-center separator-cat w-2/5 mx-auto my-4"
      >
        <h3 class="text-3xl pr-4"><?php echo $row->o_product_name; ?></h3>
        <div class="content-circle-plus">
          <div class="circle-plus text-xl info-toggle px-1" v-bind:class="[showDescProd == <?php echo $count_item; ?> ? 'opened' : 'closed']">
            <div class="circle relative cursor-pointer">
              <div class="horizontal rounded-full absolute bg-kblue-100"></div>
              <div class="vertical rounded-full absolute bg-kblue-100"></div>
            </div>
          </div>
        </div>
      </div>
      <div v-show="showDescProd == <?php echo $count_item; ?>" class="dropdown-info">
        <p class="w-2/3 mx-auto font-light">
          <?php echo nl2br($row->o_product_description); ?>
        </p>
        <?php 
            $table_name = $prefix.'content_other_product';
            $results = $wpdb->get_results( "SELECT * FROM $table_name WHERE
          `c_o_product_status` = 1 AND `o_product_ID` = $id_type_product");
          if(!empty($results)) { ?>
        <ul class="my-8 font-light list-disc items-products">
          <?php foreach($results as $row){ ?>
          <li><?php echo $row->c_o_product_item; ?></li>
          <?php }
              }?>
        </ul>
        <div class="mt-10 pb-8">
          <a
            class="bg-kskyblue-100 hover:bg-kskyblue-200 text-white font-bold py-2 px-12 rounded-full"
            href="#thirdPage"
            v-on:click="ok = !ok"
            >Cotizar</a
          >
        </div>
      </div>
    </div>
    <?php 
      $count_item++;
      }
    } ?>
  </div>
</div>
<?php
  $response = "";
  $form_response = "";
  function quote_form_email_response($type, $message){ 
    global $response; 
    if($type == "error") $response = '<div class="error">{$message}</div>'; 
  }
  function quote_form_generate_reponse($type, $message) {
    global $form_response;
    echo '<br>' . $type;
    if($type == "success") {
      $form_response = '<div class="success">{$message}</div>';
    } else {
      $form_response = '<div class="error">{$message}</div>';
    }
  }
  //response messages
  $email_invalid   = "Email Address Invalid.";
  $message_unsent  = "Algo salió mal, intentalo nuevamente.";
  $message_sent    = "Gracias, tu cotización fue enviada con éxito.";
  
  //user posted variables
  $name = $_POST['quote_name'];
  $lastname = $_POST['quote_lastname'];
  $email = $_POST['quote_email'];
  $phone = $_POST['quote_mobil'];
  $city = $_POST['quote_city'];
  
  //php mailer variables
  $to = get_option('admin_email');
  $subject = "Someone sent a message from ".get_bloginfo('name');
  $headers = 'From: '. $email . "\r\n" .
  'Reply-To: ' . $email . "\r\n";

  $message = 'prueba de control';

  if(!filter_var($email, FILTER_VALIDATE_EMAIL))
    quote_form_email_response("error", $email_invalid);
  else { //email is valid
    //validate presence of name and message
    if(!empty($name) && !empty($lastname) && !empty($email) && !empty($phone) && !empty($city)){
      $sent = wp_mail($to, $subject, $message, $headers);
      if($sent) quote_form_generate_reponse("success", $message_sent); //message sent!
      else quote_form_generate_reponse("error", $message_unsent); //message wasn't sent
    }
  }
  ?>
<div class="section">
  <h2 class="text-3xl text-center separator-cat">
    Quiero realizar una cotización
  </h2>
  <p class="text-center w-2/3 text-lg font-light mx-auto my-4">
    Escribe tus datos para que uno de nuestros expertos se contacte contigo y te
    asesore en la implementación de sistemas y equipos de protección colectiva
  </p>
  <div class="w-3/5 mx-auto">
    <?php echo $form_response; ?>
    <form action="<?php the_permalink(); ?>" method="post">
      <div class="flex my-6">
        <div class="w-1/2 px-4">
          <input
            class="appearance-none w-full rounded-full border border-kskyblue-100 py-2 font-medium focus:outline-none text-center text-kblue-100 text-opacity-50"
            type="text"
            placeholder="Nombres"
            name="quote_name"
            value="<?php echo esc_attr($_POST['quote_name']); ?>"
          />
          <?php echo $response; ?>
        </div>
        <div class="w-1/2 px-4">
          <input
            class="appearance-none w-full rounded-full border border-kskyblue-100 py-2 font-medium focus:outline-none text-center text-kblue-100 text-opacity-50"
            type="text"
            placeholder="Apellidos"
            value="<?php echo esc_attr($_POST['quote_lastname']); ?>"
            name="quote_lastname"
          />
        </div>
      </div>
      <div class="flex my-6">
        <div class="w-1/4"></div>
        <div class="w-1/2 px-4">
          <input
            class="appearance-none w-full rounded-full border border-kskyblue-100 py-2 font-medium focus:outline-none text-center text-kblue-100 text-opacity-50"
            type="text"
            placeholder="Correo Electrónico"
            name="quote_email"
            value="<?php echo esc_attr($_POST['quote_email']); ?>"
          />
        </div>
        <div class="w-1/4"></div>
      </div>
      <div class="flex my-6">
        <div class="w-1/2 px-4">
          <input
            class="appearance-none w-full rounded-full border border-kskyblue-100 py-2 font-medium focus:outline-none text-center text-kblue-100 text-opacity-50"
            type="text"
            placeholder="Teléfono"
            name="quote_mobil"
            value="<?php echo esc_attr($_POST['quote_mobil']); ?>"
          />
        </div>
        <div class="w-1/2 px-4">
          <input
            class="appearance-none w-full rounded-full border border-kskyblue-100 py-2 font-medium focus:outline-none text-center text-kblue-100 text-opacity-50"
            type="text"
            placeholder="Ciudad"
            name="quote_city"
            value="<?php echo esc_attr($_POST['quote_city']); ?>"
          />
        </div>
      </div>
      <div class="text-center mt-6">
        <button
          type="submit"
          class="bg-kskyblue-100 hover:bg-kskyblue-200 text-white font-bold py-2 px-12 rounded-full"
        >
          Enviar
        </button>
      </div>
    </form>
  </div>
</div>
