<?php get_header(); ?>
<?php
  if(is_shop()) {
    $prefix = $wpdb->prefix;
      $table_name = $prefix.'slide';
      $results = $wpdb->get_results( "SELECT * FROM $table_name WHERE `slide_status` = 1 ORDER BY `slide_order` ASC"  );
      if(!empty($results)) { ?>
<div class="section">
  <ul class="flex flex-col">
    <?php
    $url_uploads = wp_get_upload_dir()["baseurl"];
    foreach($results as $row) { ?>
    <li
      class="text-center py-48 bg-cover bg-top bg-kblue-100"
      style="background-image:linear-gradient( rgba(32, 46, 76, 0.2), rgba(32, 46, 76, 0.2) ), url('<?php echo $url_uploads; ?>/<?php echo $row->slide_image; ?>');"
    >
      <a
        class="inline-block px-8 text-white uppercase text-3xl"
        href="<?php echo get_site_url().$row->slide_link; ?>"
        ><?php echo $row->slide_title; ?></a
      >
    </li>
  <?php } ?>
  </ul>
</div>
<?php }
} else if(is_product()){
      $product = wc_get_product();
      $id = $product->get_id();
      $price = $product->price;
      $price_values = explode(".", $price);
      $price_int = $price_values[0];
      $price_dec = $price_values[1];
  ?>
    <div class="section">
      <?php 
      //echo wp_get_attachment_image(396);
      $images_product = $product->gallery_image_ids;
      
      //echo $product;
      //print_r ($product->gallery_image_ids);
      ?>
      <div class="flex px-8 sm:mx-auto sm:container mt-24">
        <div class="w-3/4">
          <div class="flex justify-around">
          <?php 
          foreach ($images_product as $image_product) { ?>
            <div>
              <img class="border-solid border-2 border-kblue-100" src="<?php echo wp_get_attachment_url( $image_product ); ?>" alt="<?php echo $product->slug . '_' . $image_product; ?>">
            </div>
          <?php } ?>
          </div>
        </div>
        <div class="w-1/4">
            <div class="title-prod pb-2">
              <h3 class="text-center text-2xl"><?php echo $product->name; ?></h3>
            </div>
            <div class="flex font-medium w-2/3 mx-auto my-8">
              <div>
                <p class="text-3xl">USD $</p>
              </div>
              <div>
                <p class="text-6xl text-center px-2"><?php echo $price_int; ?></p> 
              </div>
              <div>
                <p class="text-2xl border-b-2 border-kskyblue-100 px-2"><?php echo $price_dec ? $price_dec : '00' ?> </p>
              </div>
            </div>
            <div class="mx-auto product-desc border-t border-kskyblue-100 mb-8">
              <?php print($product->description); ?>
              <?php echo wc_display_product_attributes( $product ); ?>
            </div>
            <div class="flex mb-4">
              <div class="w-2/3">
                <p class="rounded-full border border-kskyblue-100 text-center mr-4 py-2 font-medium text-kblue-100 text-opacity-50">Cantidad</p>
              </div>
              <div class="w-1/3">
                <input class="appearance-none w-full rounded-full border border-kskyblue-100 py-2 font-medium focus:outline-none text-center text-kblue-100 text-opacity-50" type="number" name="quantity-prod" id="quantity-prod" v-model="quantity">
              </div>
            </div>
            <div class="mb-8">
              <?php 
              $aux = '[add_to_cart_url id="'. $id .'" sku="'. $product->sku .'"]';
              $url_cart = do_shortcode($aux);
              //do_action( 'woocommerce_after_shop_loop_item' ); ?>
              <a href="<?php echo $url_cart; ?>" :data-quantity="quantity" data-product_id="<?php echo $id; ?>" data-product_sku="<?php echo $product->sku; ?>" aria-label="Añade “<?php echo $product->name; ?>” a tu carrito" rel="nofollow" class="bg-kskyblue-100 block w-full text-center hover:bg-kskyblue-200 text-white font-bold py-2 px-12 rounded-full product_type_simple add_to_cart_button ajax_add_to_cart">Añadir al carrito</a>
            </div>
        </div>
      </div>
    </div>
    <div class="section">
      <div class="sm:w-2/3 sm:mx-auto mt-24">
    <div class="text-center mb-8 mt-24 md:mt-0">
      <h2 class="w-auto inline-block mx-auto separator-h-c-200">PRODUCTOS MÁS BUSCADOS</h2>
    </div>
      <?php
        $aux = '[products best_selling="true" columns="3" limit="3"]';
        echo do_shortcode($aux);
      ?>
  </div>
    </div>
    <?php } else {
      $terms_post = get_the_terms( $post->cat_ID , 'product_cat' ); 
      $cat = $wp_query->get_queried_object(); 
      $title_page = $cat->name; 
      $thumbnail_id = get_term_meta( $cat->term_id, 'thumbnail_id', true );
      $description_page = $cat->description;
      $url_image = wp_get_attachment_url( $thumbnail_id );
      $cat_slug = $cat->slug;
  ?>
<div class="section">
  <div
    class="text-center min-h-screen bg-cover"
    style="background-image: url('<?php echo $url_image; ?>');"
  >
    <h1 class="py-48 text-5xl text-kblue-100">
      <?php echo $title_page; ?>
    </h1>
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
<div class="section" id="products">
  <div>
    <p class="text-center w-3/5 mx-auto pb-2 separator-cat my-20">
      <?php 
        echo $description_page;
      ?>
    </p>
  </div>
  <?php
    $cat = $wp_query->get_queried_object();
    $cat_parent = $cat->term_id;
        $categories = get_categories( 
          array( 'hide_empty' => 0, 
            'parent' => $cat_parent, 
            'child_of' => 0, 
            'taxonomy'=> 'product_cat'
          ) 
        );
        
        ?>
        <div class="md:mx-auto bg-kgray-100 md:container py-8">
          <div class="flex">
            <div class="w-1/3">
              <ul>
          <?php 
          
          $count= 0;
          foreach($categories as $category) { 
            $thumbnail_id = get_woocommerce_term_meta( $category->cat_ID, 'thumbnail_id', true ); 
            $image = wp_get_attachment_url( $thumbnail_id );
            $wc_cat_id = $category->term_id;
            $count ++;
          ?>
                <li 
                  v-on:click="showProd = <?php echo $wc_cat_id; ?>, aux()" 
                  class="flex items-center py-2 my-1 hover:bg-kblue-400 hover:text-white text-center cat-item cursor-pointer"
                  :class="[(showProd == <?php echo $wc_cat_id; ?>) ? 'active' : '']"
                >
                  <div class="w-1/5">
                    <img class="mx-auto" src="<?php echo $image; ?>" alt="">
                  </div>
                  <a href="#" class="w-3/5 font-bebas text-xl"><?php echo $category->name; ?></a>
                  <span class="text-kblue-100 w-1/5">
                    <svg class="inline-block fill-current" xmlns="http://www.w3.org/2000/svg" width="12.79" height="23.58" viewBox="0 0 12.79 23.58"><path d="M1,23.58a1,1,0,0,1-.71-.29,1,1,0,0,1,0-1.41L10.38,11.79.29,1.71A1,1,0,0,1,1.71.29L12.5,11.08a1,1,0,0,1,.29.71,1,1,0,0,1-.29.71L1.71,23.29A1,1,0,0,1,1,23.58Z"/></svg>
                  </span>
                </li>
          <?php } ?>
              </ul>
            </div>
            <div class="w-2/3 px-8">
              <div v-if="showProd == 0" class="overflow-y-auto h-2xl">
                  <?php
                    $aux = '[products category="'.$cat_slug . '" columns="2"]';
                    echo do_shortcode($aux);
                  ?>
              </div>
                <?php
                foreach($categories as $category) {
                  $cat_slug = $category->slug;
                ?>
              <div :class="{ block: showProd == <?php echo $category->term_id; ?>, hidden: showProd != <?php echo $category->term_id; ?> }">
                <div @click="showDesc = !showDesc" class="cursor-pointer text-center flex w-1/3 mx-auto justify-center">
                  <a href="#" class="uppercase font-bebas">Más información</a>
                  <div class="circle-plus text-xl px-1" v-bind:class="[showDesc ? 'opened' : 'closed']">
                    <div class="circle relative cursor-pointer">
                      <div class="horizontal rounded-full absolute bg-kskyblue-100"></div> 
                      <div class="vertical rounded-full absolute bg-kskyblue-100"></div>
                    </div>
                  </div>
                </div>
                <div v-if="showDesc" class="w-2/3 mx-auto text-center">
                  <?php echo $category->category_description; ?>
                </div>
                
                <div class="overflow-y-auto h-screen">
                  
                  <?php
                    $aux = '[products category="'.$cat_slug . '" columns="2"]';
                    echo do_shortcode($aux);
                  ?>
                </div>
              </div>
                <?php } ?>
            </div>
          </div>
        </div>
  <div class="sm:w-2/3 sm:mx-auto my-8">
    <div class="text-center">
      <h2 class="w-auto inline-block mx-auto separator-h-c-200">PRODUCTOS MÁS BUSCADOS</h2>
    </div>
    <div class="flex justify-center mt-12">
    <?php
      $args = array(
          'post_type' => 'product',
          'meta_key' => 'total_sales',
          'orderby' => 'meta_value_num',
          'posts_per_page' => 3,
      );
      $loop = new WP_Query( $args );
      while ( $loop->have_posts() ) : $loop->the_post(); ?>
      <div class="w-1/6 sm:mx-12">
        <a href="<?php the_permalink(); ?>" id="id-<?php the_id(); ?>" title="<?php the_title(); ?>" class="text-center">
          <?php if (has_post_thumbnail( $loop->post->ID )) {
              $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id( $loop->post->ID ), 'full' );
              ?>
              <img class="rounded-full" src="<?php echo $large_image_url[0]; ?>" alt="<?php the_title(); ?>">
          <?php } else {
            echo '<img class="rounded-full border-2" src="'.woocommerce_placeholder_img_src().'" alt="product placeholder Image" />';
          }
          ?>
          <h4 class="pt-4 text-base font-bold pb-4 separator-h-c-200"><?php the_title(); ?></h4>
        </a>
      </div>
      <?php endwhile; ?>
      <?php wp_reset_query(); ?>
    </div>
  </div>
</div>
<?php }
    ?>
<?php get_footer(); ?>
