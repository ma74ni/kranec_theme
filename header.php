<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
    <meta charset="<?php bloginfo('charset'); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <?php
  wp_head();
  ?>
  </head>

  <body <?php body_class(); ?>>
    <div id="app">
      <header class="fixed w-full pt-2 sm:pt-10 z-20 bg-transparent header-menu">
        <div class="sm:mx-auto md:container px-8 flex flex-col-reverse sm:flex-row sm:justify-between relative">
          <div class="flex items-center">
            <button @click="isOpen = !isOpen" class="btn-menu mr-4 focus:outline-none">
              <?php 
                $class_color_icon = 'text-kblue-100';
                $class_color_logo = 'text-kblue-100';
                if(is_front_page() || is_home()) {
                  $class_color_icon = 'text-white';
                } else if($post->ID == 33) {
                  $class_color_icon = 'text-white';
                  $class_color_logo = 'text-white';
                } else if ( is_search() ) {
                  $class_color_icon = 'text-kblue-100';
                  $class_color_logo = 'text-kblue-100';
                }
              ?>
              <svg
                id="sandwich-icon"
                width="26.22"
                heigth="25.56"
                class="fill-current inline-block <?php echo $class_color_icon; ?>"
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 26.22 25.56"
              >
                <rect width="26.22" height="4.37" rx="2.19" ry="2.19" />
                <rect
                  y="10.6"
                  width="26.22"
                  height="4.37"
                  rx="2.19"
                  ry="2.19"
                />
                <rect
                  y="21.19"
                  width="26.22"
                  height="4.37"
                  rx="2.19"
                  ry="2.19"
                />
              </svg>
            </button>
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" id="logo-name">
              <svg
                width="140.37"
                heigth="24"
                class="fill-current <?php echo $class_color_logo; ?> inline-block"
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 140.37 24"
              >
                <polygon
                  points="22.08 23.77 14.59 23.77 7.52 14.3 6.1 16.05 6.1 23.77 0 23.77 0 0.12 6.1 0.12 6.1 10.83 14.55 0.12 21.62 0.12 12.38 11.06 22.08 23.77"
                />
                <path
                  d="M47.13,23.77H39.68L33.25,15.1H30.42v8.67H24.35V.11H34.58a23.32,23.32,0,0,1,3.61.24,7.62,7.62,0,0,1,2.83,1,6.22,6.22,0,0,1,2.12,2.05,5.93,5.93,0,0,1,.78,3.17,7.08,7.08,0,0,1-1.21,4.27,9.11,9.11,0,0,1-3.47,2.75ZM37.62,7.36a3.07,3.07,0,0,0-.37-1.53,2.48,2.48,0,0,0-1.25-1,4.15,4.15,0,0,0-1.39-.25c-.55,0-1.19-.06-1.93-.06H30l0,6h4a6.82,6.82,0,0,0,1.8-.16A2.8,2.8,0,0,0,37.32,9a3.59,3.59,0,0,0,.3-1.6"
                />
                <path
                  d="M73.12,23.77H66.81L65.16,19H56.41l-1.64,4.78H48.62L57.35.11h7ZM63.7,15,60.79,6.17,57.88,15Z"
                />
                <polygon
                  points="97.38 23.77 91.24 23.77 80.53 7.53 80.53 23.77 74.91 23.77 74.91 0.12 82.53 0.12 91.76 13.66 91.76 0.12 97.38 0.12 97.38 23.77"
                />
                <polygon
                  points="118.1 23.77 101 23.77 101 0.12 118.1 0.12 118.1 4.69 106.74 4.69 106.74 8.98 116.1 8.98 116.1 13.56 106.74 13.56 106.74 19.46 118.1 19.46 118.1 23.77"
                />
                <path
                  d="M132,24a15.21,15.21,0,0,1-4.87-.75A10.64,10.64,0,0,1,123.29,21a10,10,0,0,1-2.48-3.75,14.19,14.19,0,0,1-.88-5.21,14.14,14.14,0,0,1,.84-5,10.83,10.83,0,0,1,2.44-3.83A10.49,10.49,0,0,1,127,.84,14.32,14.32,0,0,1,132,0a20,20,0,0,1,2.69.16,20.85,20.85,0,0,1,2.22.43,15.34,15.34,0,0,1,1.92.66c.58.24,1.09.47,1.52.68v5.6h-.7c-.29-.25-.67-.54-1.12-.88a13.53,13.53,0,0,0-1.53-1,10.4,10.4,0,0,0-1.89-.83A6.73,6.73,0,0,0,133,4.47a7.61,7.61,0,0,0-2.44.39,6.05,6.05,0,0,0-2.15,1.31,6.55,6.55,0,0,0-1.52,2.34,9.7,9.7,0,0,0-.58,3.53,9.11,9.11,0,0,0,.63,3.62,6.37,6.37,0,0,0,1.58,2.3,5.8,5.8,0,0,0,2.16,1.21,7.84,7.84,0,0,0,2.36.37,7.57,7.57,0,0,0,2.2-.33,9.07,9.07,0,0,0,2-.88,13.28,13.28,0,0,0,1.44-.95c.45-.34.81-.64,1.09-.88h.64V22l-1.7.73a14.78,14.78,0,0,1-1.7.59,19.33,19.33,0,0,1-2.17.49A17.2,17.2,0,0,1,132,24"
                />
              </svg>
            </a>
          </div>
          <div>
            <ul class="flex justify-end list-store">
              <li class="cursor-pointer bg-white rounded-full border-2 border-white hover:border-kblue-100 mr-8" :class="[showLogin ? 'border-kblue-100' : '']" v-on:click="showLogin = !showLogin">
                <img class="w-10" src="<?php echo get_template_directory_uri(); ?>/assets/images/login.svg" alt="">
              </li>
              <li class="bg-white rounded-full border-2 border-white hover:border-kblue-100">
                <a href="<?php echo wc_get_cart_url(); ?>">
                  <img class="w-10" src="<?php echo get_template_directory_uri(); ?>/assets/images/cart.svg" alt="">
                </a>
              </li>
            </ul>
            <?php 
                if(is_user_logged_in()) { 
                  $current_user = wp_get_current_user();
                  $name_user = $current_user->user_firstname .' '. $current_user->user_lastname ;
                ?>
                <ul class="bg-blue-kranec py-12 px-8  text-center sm:absolute login-menu" v-if="showLogin">
                  <li class="mb-8 text-white cursor-default">Hola, <?php echo $name_user; ?></li>
                  <li><a href="<?php echo get_site_url() ?>/mi-cuenta" class="bg-kskyblue-100 hover:bg-kskyblue-200 text-white font-bold py-2 sm:px-12 px-4 rounded-full">Ver mi cuenta</a></li>
                </ul>
                <?php } else { ?>
                <ul class="bg-blue-kranec py-12 px-8  text-center sm:absolute login-menu" v-if="showLogin">
                  <li><a href="<?php echo get_site_url() ?>/mi-cuenta" class="bg-kskyblue-100 hover:bg-kskyblue-200 text-white font-bold py-2 sm:px-12 px-4 rounded-full">Registrar o Iniciar sesión</a></li>
                </ul>
                <?php } ?>
          </div>
        </div>
      </header>
      <div v-if="showLogin" @click="showLogin = false" class="fixed w-full h-full z-10"></div>
      <div
        @keydown.esc="isOpen = false"
        v-show="isOpen"
        class="z-10 fixed inset-0"
      >
        <div
          @click="isOpen = false"
          class="absolute inset-0"
          tabindex="0"
        ></div>
      </div>
      <nav
        class="w-2/3 sm:w-2/5 bg-blue-kranec px-8 py-8 transform top-0 left-0 bg-white fixed h-full overflow-auto ease-in-out transition-all duration-300 z-30"
        :class="isOpen ? 'translate-x-0' : '-translate-x-full'"
      >
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logo-nav-content"
          ><img
            src="<?php echo get_template_directory_uri(); ?>/assets/images/logo_kranec_b.svg"
            alt=""
        /></a>
        <?php
          $menuLocations = get_nav_menu_locations();
          $menuID = $menuLocations['primary'];
          $primaryNav = wp_get_nav_menu_items($menuID);
          ?>
          <ul class="font-light text-white uppercase pt-8 pb-4 text-lg">
          <?php
          $countSubmenu = -1;
        foreach ( $primaryNav as $navItem ) {
        $title = $navItem->title;
        $link = $navItem->url;
        if(!$navItem->menu_item_parent){
          $parent_id = $navItem->ID; ?>
          <li class="py-2">
            <div class="flex items-center">
              <a class="mr-2" href="<?php echo $link; ?>"><?php echo $title; ?></a>
          <?php } 
          if($parent_id == $navItem->menu_item_parent) {
            if(!$submenu) {
              $submenu = true;
              
              if ($submenu) { ?>
              <div @click="showSubmenu = <?php echo $countSubmenu; ?>" class="circle-plus text-xl px-1" v-bind:class="[showSubmenu == <?php echo $countSubmenu; ?> ? 'opened' : 'closed']">
                <div class="circle relative cursor-pointer">
                  <div class="horizontal rounded-full absolute bg-kskyblue-100"></div> 
                  <div class="vertical rounded-full absolute bg-kskyblue-100"></div>
                </div>
              </div>
              <?php 
                }
                ?>
            </div>
            <ul v-show="showSubmenu == <?php echo $countSubmenu; ?>" class="pl-8">
            <?php } ?>
            <li class="py-2">
              <a href="<?php echo $link; ?>"><?php echo $title; ?></a>
            </li>
            <?php
              if($primaryNav[$count + 1]->menu_item_parent != $parent_id && $submenu){ ?>
              </ul>
              <?php
              
              $submenu = false; 
              }
            }
            if($primaryNav[$count + 1]->menu_item_parent != $parent_id){?>
              </li>
            <?php
            $submenu = false;
            }
            $count++;
            $countSubmenu++;
            }
            ?>
            </ul>
        <div class="search pb-8">
          <?php get_product_search_form(); ?>
          <form action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get" class="w-full max-w-sm">
            <div class="flex">
              <input type="text" name="s" id="search" value="" placeholder="BUSCAR" class="appearance-none block w-full text-white border py-2 px-4 leading-tight mr-2">
              <input type="image" alt="Search" src="<?php echo get_template_directory_uri(); ?>/assets/images/search_icon.svg"></div>
          </form>
        </div>
        <div class="w-full bg-kskyblue-100 h-1 rounded-sm"></div>
        <div class="contact text-white py-8 text-lg">
          <?php
            dynamic_sidebar('contact-sidebar');
          ?>
        </div>
      </nav>

      <div class="btn-whatsapp fixed w-full z-20">
        <div class="container md:px-8 mx-auto relative">
          <a
            href="https://wa.me/593"
            target="_blank"
            class="absolute right-0 block"
          >
            <img
              src="<?php echo get_template_directory_uri(); ?>/assets/images/whatsapp-green.png"
              alt="whatsapp"
              title="CONVERSEMOS"
            />
          </a>
        </div>
      </div>

      <div id="fullpage">
