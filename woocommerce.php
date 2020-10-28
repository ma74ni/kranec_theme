<?php get_header(); ?>
<?php
  if(is_product_category(21) && !is_shop() && !is_product()) {
    $categories = get_categories(
      array(
        'hide_empty' =>0, 
        //'exclude' => 1, 
        //'name' => 'productos', 
        'parent' => 21, 
        'child_of' => 0,
        'taxonomy' => 'product_cat'
        )
      ); 
    if(!empty($categories)) { ?>
<div class="section">
  <ul class="flex flex-col">
    <?php
    foreach($categories as $category) { 
      $thumbnail_id = get_woocommerce_term_meta( $category->cat_ID, 'thumbnail_id', true ); 
      $image = wp_get_attachment_url( $thumbnail_id );
      $wc_cat_id = $category->term_id; ?>
    <li
      class="text-center py-48 bg-cover bg-top bg-kblue-100"
      style="background-image:linear-gradient( rgba(32, 46, 76, 0.2), rgba(32, 46, 76, 0.2) ), url('<?php echo $image; ?>');"
    >
      <a
        class="inline-block px-8 text-white uppercase text-3xl"
        href="<?php echo get_category_link($wc_cat_id); ?>"
        ><?php echo $category->name; ?></a
      >
    </li>
  <?php } ?>
  </ul>
</div>
<?php }
    } else {
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
    if(!empty($terms_post)) {
      foreach ($terms_post as $term_cat) { 
        $term_cat_id = $term_cat->term_id; 
        $cat_parent = $term_cat->parent;
        $categories = get_categories( 
          array( 'hide_empty' => 0, 
            //'exclude' => 1,
            //'name' => 'productos', 
            'parent' => $cat_parent, 
            'child_of' => 0, 
            'taxonomy'=> 'product_cat' 
            // mention taxonomy here. 
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
                  v-on:click="showProd = <?php echo $wc_cat_id; ?>" 
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
              <div v-if="showProd == 0" class="overflow-y-auto h-screen">
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
                <div class="text-center flex w-1/3 mx-auto justify-center">
                  <a href="#" class="uppercase font-bebas">Más información</a>
                  <div class="circle-plus text-xl closed px-1">
                    <div class="circle relative cursor-pointer">
                      <div class="horizontal rounded-full absolute bg-kskyblue-100"></div> 
                      <div class="vertical rounded-full absolute bg-kskyblue-100"></div>
                    </div>
                  </div>
                </div>
                <div class="w-2/3 mx-auto text-center">
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
        <?php } 
      } 
  ?>
</div>

<!-- <div class="">
            <?php //dynamic_sidebar('woo_categories'); ?>
            <?php //woocommerce_content(); ?>
        </div> -->

<?php }
    ?>
<?php get_footer(); ?>
