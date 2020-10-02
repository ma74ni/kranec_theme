<?php
  get_header();
  ?>
<div class="section">
  <div class="container mx-auto px-12">
    <div class="blog-title text-center">
      <h1 class="text-5xl uppercase separator-h-c-200 mt-20">
        Resultados de la Búsqueda
      </h1>
      <div class="w-full max-w-lg py-8 mx-auto">
        <form
          action="<?php echo esc_url( home_url( '/' ) ); ?>"
          method="get"
          class="w-full max-w-4xl"
        >
          <div class="flex justify-center items-center">
            <div class="1/5"></div>
            <input
              type="text"
              @focus="actionSearch =! actionSearch"
              name="s"
              id="search"
              v-model="search"
              value="<?php echo get_search_query(); ?>"
              placeholder="Escribe los datos de tu búsqueda"
              class="appearance-none block text-kblue-100 border border-kskyblue-100 py-2 px-4 leading-tight rounded-full focus:outline-none mr-2 text-center w-3/5"
            />
            <div class="w-1/5" v-if="search == '' && !actionSearch">
              <button
                type="submit"
                alt="Search"
                class="bg-kskyblue-100 hover:bg-kskyblue-200 text-white font-bold py-2 px-4 rounded-full focus:outline-none"
              >
                Buscar
              </button>
            </div>
            <div class="w-1/5" v-if="search != '' && !actionSearch">
              <button
                v-on:click="search = ''"
                type="button"
                class="pr-8 text-kblue-200"
              >
                <svg
                  width="17.19"
                  height="17.19"
                  xmlns="http://www.w3.org/2000/svg"
                  viewBox="0 0 17.19 17.19"
                  class="fill-current"
                >
                  <path
                    d="M546.65,531.44l-14.94,14.94c-1,1,.57,2.62,1.59,1.59L548.24,533a1.12,1.12,0,0,0-1.59-1.59Z"
                    transform="translate(-531.38 -531.11)"
                  />
                  <path
                    d="M548.24,546.38,533.3,531.44a1.12,1.12,0,0,0-1.59,1.59L546.65,548a1.12,1.12,0,0,0,1.59-1.59Z"
                    transform="translate(-531.38 -531.11)"
                  />
                </svg>
              </button>
            </div>
            <div
              class="w-1/5 flex"
              v-if="(search != '' || search == '') && actionSearch"
            >
              <button
                v-on:click="search = ''"
                type="button"
                class="pr-8 text-kblue-200"
              >
                <svg
                  width="17.19"
                  height="17.19"
                  xmlns="http://www.w3.org/2000/svg"
                  viewBox="0 0 17.19 17.19"
                  class="fill-current"
                >
                  <path
                    d="M546.65,531.44l-14.94,14.94c-1,1,.57,2.62,1.59,1.59L548.24,533a1.12,1.12,0,0,0-1.59-1.59Z"
                    transform="translate(-531.38 -531.11)"
                  />
                  <path
                    d="M548.24,546.38,533.3,531.44a1.12,1.12,0,0,0-1.59,1.59L546.65,548a1.12,1.12,0,0,0,1.59-1.59Z"
                    transform="translate(-531.38 -531.11)"
                  />
                </svg>
              </button>
              <button
                type="submit"
                alt="Search"
                class="bg-kskyblue-100 hover:bg-kskyblue-200 text-white font-bold py-2 px-4 rounded-full focus:outline-none"
              >
                Buscar
              </button>
            </div>
          </div>
        </form>
      </div>
      <?php
          global $wp_query;
          $total_results = $wp_query->found_posts; if( $total_results == 1){ ?>
      <div class="grid grid-cols-1 mb-8">
        <?php
          }
          if( $total_results == 2){
            ?>
        <div class="grid grid-cols-2">
          <?php
          }
          if( $total_results >
          2){ ?>
          <div class="grid grid-cols-3">
            <?php
          }
        ?>

            <?php
  if(have_posts()){

    while(have_posts()){
      the_post();
      ?>
            <div class="result-item-search text-center">
              <h4 class="search-header-post mx-auto py-8 separator-anima">
                <a href="<?php the_permalink(); ?>">
                  <?php the_title(); ?>
                </a>
              </h4>
              <a class="search-image block" href="<?php the_permalink(); ?>">
                <?php the_post_thumbnail(); ?>
              </a>
            </div>

            <?php
    }
  } else {
    ?>
            <h3 class="py-8 text-center">
              - No se encontraron resultados. -
            </h3>
            <?php
  }
  ?>
          </div>
        </div>
      </div>
    </div>
    <?php
  get_footer();
?>
  </div>
</div>
