<div class="section">
  <div class="header-blog">
    <div
      class="slide bg-no-repeat bg-cover bg-center"
      style="background-image: url('<?php echo the_post_thumbnail_url(); ?>')"
    >
      <h1
        class="absolute text-center w-full text-5xl text-white <?php echo ($post->ID == 33) ? 'text-kblue-100' : '' ?>"
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
<?php
   if(($post->ID != 33)) { the_content(); } else { ?>

<div class="section relative">
  <div class="w-full h-2 bg-kskyblue-100 absolute k-align-line"></div>
  <div class="container mx-auto md:px-8">
    <div class="carousel-example">
      <?php
    $principalPosts = new  WP_QUERY(array( 'post_type' =>
      'portfolio', 'orderby' => 'date', 'order' => 'ASC' )); if(
      $principalPosts->have_posts() ) { while ( $principalPosts->have_posts() )
      { $principalPosts->the_post(); $src = get_post_meta(get_the_ID(),
      'data-custom-image', true); ?>
      <div>
        <div class="box">
          <div
            class="max-w-sm overflow-hidden flex flex-col justify-center relative"
          >
            <img
              class="pb-8"
              src="<?php echo $src['src']; ?>"
              alt="<?php the_title(); ?>"
            />
            <div
              class="rounded-full h-6 w-6 bg-kblue-100 mx-auto absolute k-align-round right-0 left-0"
            ></div>
            <div class="pt-8 content_item_carousell">
              <div class="flex">
                <div class="w-1/5"></div>
                <div class="w-3/5 text-center">
                  <?php the_post_thumbnail(); ?>
                </div>
                <div class="w-1/5"></div>
              </div>
              <div class="title-project py-4">
                <div class="flex justify-center items-center">
                  <div class="w-1/5"></div>
                  <a
                    href="#"
                    class="text-base font-bold cursor-pointer text-center px-1 w-2/5"
                  >
                    <?php
                    the_title();
                    ?>
                  </a>
                  <div class="circle-plus text-xl closed px-1 w-1/5">
                    <div class="circle relative cursor-pointer">
                      <div
                        class="horizontal rounded-full absolute bg-kblue-100"
                      ></div>
                      <div
                        class="vertical rounded-full absolute bg-kblue-100"
                      ></div>
                    </div>
                  </div>
                  <div class="w-1/5"></div>
                </div>

                <div class="hidden">
                  <div class="flex">
                    <div class="w-1/5"></div>
                    <div class="w-3/5 text-center">
                      <?php
                    the_content();
                    ?>
                    </div>
                    <div class="w-1/5"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php
        }
      } ?>
    </div>
  </div>
</div>
<?php }  ?>
