<div class="section">
  <?php
    if (is_home() && get_option('page_for_posts') ) {
    $img = wp_get_attachment_image_src(get_post_thumbnail_id(get_option('page_for_posts')),'full'); 
    $featured_image = $img[0];
    ?>
    <div class="header-blog">
      <div
      class="slide bg-no-repeat bg-cover bg-center"
      style="background-image: url('<?php echo $featured_image; ?>')"
    >
      <h1 class="absolute text-center w-full text-5xl text-white"><?php single_post_title(); ?></h1>
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
<?php } ?>
   
</div>
<div class="section">
  <div class="container mx-auto">
    <div class="mt-24 mb-8">
      <div class="text-center">
        <h2>Categorías</h2>
      </div>
      <div class="mx-auto">
        <?php
        $post = get_post();
        if ( $post ) {
        $categories = get_categories($post->ID); 
          if(! empty($categories)) {?>
        <ul class="blog-cat-list font-light uppercase flex divide-x-2 divide-kskyblue-100 justify-center">
          <?php
            foreach($categories as $category) { ?>
            <li class="inline-block px-8" href="" @click="showArticles = <?php echo $category->term_id; ?>">
              <?php echo $category->name; ?>
            </li>
      <?php } ?>
        </ul>
        <?php }
        } ?>
      </div>
    </div>
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-12">
      <?php
      if ( $post ) {
        $categories = get_categories($post->ID); 
          if(! empty($categories)) {
            foreach($categories as $category) {
              $principalPosts = new  WP_QUERY(
                array(
                  'orderby' => 'date',
                  'order' => 'ASC',
                  'posts_per_page' => 4,
                  'cat' => $category->term_id
                )
              );
              if($principalPosts->have_posts()) { 
                $numPosts = count($principalPosts->posts);
        while($principalPosts->have_posts()){
        $principalPosts->the_post(); ?>
        <div v-show="showArticles == <?php echo $category->term_id; ?>" class="<?php echo $numPosts == 1 ? 'col-span-2' : '' ?>">
          <div class="single-post text-center">
            <a href="<?php the_permalink(); ?>">
              <?php the_post_thumbnail(); ?>
            </a>
            <h3 class="header-post uppercase">
              <a href="<?php the_permalink(); ?>">
                <?php the_title(); ?>
              </a>
            </h3>
            <p class="text-xl"><?php the_excerpt(); ?></p>
            <div class="my-8">
              <a
                class="bg-kskyblue-100 hover:bg-kskyblue-200 text-white font-bold py-2 px-4 rounded-full"
                href="<?php the_permalink(); ?>"
                title="<?php the_title_attribute(); ?>"
                >Leer más</a
              >
            </div>
          </div>
        </div>
      <?php
        }
      } 
            }
          }
      } ?>
      
    </div>
  </div>
</div>
