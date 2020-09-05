<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <?php
  wp_head();
  ?>
  </head>
  <body>
    <div id="app">
      <header class="fixed w-full pt-10 z-10">
        <div class="container mx-auto md:px-8 flex justify-between">
          <div class="flex items-center">
            <button @click="isOpen = !isOpen" class="btn-menu pr-4">
              <?php
                if(is_front_page() || is_home()){
              ?>
              <img id="sandwich-icon"
                src="<?php echo get_template_directory_uri(); ?>/assets/images/nav.svg"
                alt=""
              />
              <?php
              } else {
              ?>
              <img id="sandwich-icon"
                src="<?php echo get_template_directory_uri(); ?>/assets/images/nav_a.svg"
                alt=""
              />
              <?php 
              }
              ?>
            </button>
            <a href="" class="logo-content">
              <?php
                if ( function_exists( 'the_custom_logo' ) ) {
                  the_custom_logo();
                }
              ?>
            </a>
          </div>
          <div class="">
            <ul class="flex store-nav">
              <li class="pr-4">
                <a href=""
                  ><img
                    src="<?php echo get_template_directory_uri(); ?>/assets/images/login.svg"
                    alt=""
                /></a>
              </li>
              <li>
                <a href=""
                  ><img
                    src="<?php echo get_template_directory_uri(); ?>/assets/images/cart.svg"
                    alt=""
                /></a>
              </li>
            </ul>
          </div>
        </div>
      </header>
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
        class="w-2/5 bg-blue-kranec px-8 py-8 transform top-0 left-0 w-64 bg-white fixed h-full overflow-auto ease-in-out transition-all duration-300 z-30"
        :class="isOpen ? 'translate-x-0' : '-translate-x-full'"
      >
        <a href="" class="logo-nav-content"
          ><img
            src="<?php echo get_template_directory_uri(); ?>/assets/images/logo_kranec_b.svg"
            alt=""
        /></a>
        <?php
          wp_nav_menu(
            array(
              'menu' => 'primary',
              'container' => '',
              'theme_location' => 'primary',
              'items_wrap' => '<ul id="%1$s" class="%2$s flex flex-col font-light text-white uppercase py-8 text-lg">%3$s</ul>',
              'add_li_class'  => 'py-2'
            )
          )
        ?>
        <div class="w-full bg-skyblue-kranec h-1 rounded-sm"></div>
        <div class="contact text-white py-8 text-lg">
          <h2 class="uppercase">Contáctanos</h2>
          <div class="flex flex-col">
            <div class="pt-2">
              <img src="" alt="">
              <a href="mailto: ventas@kranec.ec" class="font-light">ventas@kranec.ec</a>
            </div>
            <div class="pt-2">
              <img src="" alt="">
              <a href="tel:593994146626" class="text-k-blue font-light">099 414 6626</a>
            </div>
          </div>
        </div>
      </nav>
      <?php 
      if(is_front_page()){
      ?>
      <div class="btn-whatsapp fixed w-full z-20">
        <div class="container md:px-8 mx-auto relative">
          <a href="https://wa.me/593" target="_blank" class="absolute right-0 block">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/whatsapp-green.png" alt="whatsapp" title="CONVERSEMOS">
          </a>
        </div>
      <?php } ?>
</div>
      <div id="fullpage">