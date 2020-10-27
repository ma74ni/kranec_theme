
<?php get_header(); ?>
  <div class="section">
    <div>
    <?php
      if(is_product_category(21) && !is_shop() && !is_product()) {
        $categories = get_categories(
          array(
            'hide_empty' =>  0,
            //'exclude'  =>  1,
            //'name' => 'productos',
            'parent' => 21,
            'child_of' => 0,
            'taxonomy'   =>  'product_cat' // mention taxonomy here. 
          )
        );
        
        if(! empty($categories)) {?>
        <ul class="flex flex-col">
          <?php
            foreach($categories as $category) { 
            //print_r($category);
            $thumbnail_id = get_woocommerce_term_meta( $category->cat_ID, 'thumbnail_id', true ); 
            $image = wp_get_attachment_url( $thumbnail_id );
            $wc_cat_id = $category->term_id;
            ?>
          <li class="text-center py-48 bg-cover bg-top bg-kblue-100" style="background-image:linear-gradient( rgba(32, 46, 76, 0.2), rgba(32, 46, 76, 0.2) ), url('<?php echo $image; ?>');">
              <a class="inline-block px-8 text-white uppercase text-3xl" href="<?php echo get_category_link($wc_cat_id); ?>"><?php echo $category->name; ?></a>
            </li>
      <?php } ?>
        </ul>
        <?php }
      } else { ?>
        <div class="flex">
            <?php dynamic_sidebar('woo_categories'); ?>
            <?php woocommerce_content(); ?>
        
        </div>
          
      <?php }
    ?>      
    </div>
  </div>
<?php get_footer(); ?>