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
            <ul class="flex store-nav justify-end list-store">
              <li class="pr-4 cursor-pointer" v-on:click="showLogin = !showLogin">
                <svg
                    width="43.39"
                    heigth="43.39"
                    class="inline-block fill-current"
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 43.39 43.39"
                  >
                    <circle
                      class="text-white stroke-2 circle-nav-header"
                      cx="22"
                      cy="22"
                      r="20"
                    />
                    <path
                      class="text-kskyblue-100"
                      d="M13.66,34.16H29.8S31.26,20.6,21.69,20.6C12.89,20.6,13.66,34.16,13.66,34.16Z"
                    />
                    <circle
                      class="text-kskyblue-100"
                      cx="21.69"
                      cy="14.98"
                      r="5.62"
                    />
                    <path
                      class="text-kblue-100"
                      d="M21.69,21.27A6.29,6.29,0,1,1,28,15,6.29,6.29,0,0,1,21.69,21.27Zm0-11.35A5.06,5.06,0,1,0,26.75,15,5.06,5.06,0,0,0,21.69,9.92Z"
                    />
                    <path
                      class="text-kblue-100"
                      d="M30.43,34.7H13l0-.58c0-.31-.47-7.7,3.18-11.6a7.35,7.35,0,0,1,5.59-2.32,7.36,7.36,0,0,1,5.6,2.32c3.65,3.9,3.2,11.29,3.18,11.6Zm-16.3-1.23H29.26c0-1.77-.13-7.19-2.87-10.11a6.17,6.17,0,0,0-4.7-1.93A6.17,6.17,0,0,0,17,23.36C14.26,26.29,14.1,31.7,14.13,33.47Z"
                    /></svg
                >
                <?php 
                if(is_user_logged_in()) { 
                  $current_user = wp_get_current_user();
                  $name_user = $current_user->user_firstname .' '. $current_user->user_lastname ;
                ?>
                <ul class="bg-blue-kranec py-12 px-8  text-center absolute login-menu" v-if="showLogin">
                  <li class="mb-8 text-white cursor-default">Hola, <?php echo $name_user; ?></li>
                  <li><a href="<?php echo get_site_url() ?>/mi-cuenta" class="bg-kskyblue-100 hover:bg-kskyblue-200 text-white font-bold py-2 px-12 rounded-full">Ver mi cuenta</a></li>
                </ul>
                <?php } else { ?>
                <ul class="bg-blue-kranec py-12 px-8  text-center absolute login-menu" v-if="showLogin">
                  <li><a href="<?php echo get_site_url() ?>/mi-cuenta" class="bg-kskyblue-100 hover:bg-kskyblue-200 text-white font-bold py-2 px-12 rounded-full">Registrar o Iniciar sesión</a></li>
                </ul>
                <?php } ?>
              </li>
              <li>
                <a href="<?php echo wc_get_cart_url(); ?>"
                  ><svg
                    width="43.39"
                    heigth="43.39"
                    class="inline-block fill-current"
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 43.39 43.39"
                  >
                    <circle
                      class="text-white stroke-2 circle-nav-header"
                      cx="22"
                      cy="22"
                      r="20"
                    />
                    <path
                      class="text-blue-300"
                      d="M15.2,16.25l-.58-5.44a1,1,0,0,0-1-.91H10a.93.93,0,0,0-.71.35.89.89,0,0,0-.17.77,1,1,0,0,0,.94.7h2.25a.46.46,0,0,1,.46.4l1.67,15.12a.91.91,0,0,0,.91.8H31.47a.91.91,0,0,0,.89-.73l1.85-10a.9.9,0,0,0-.89-1.07Z"
                    />
                    <path
                      class="text-kskyblue-100"
                      d="M19.37,20.79H15.64l-.27-2.72h3.7Z"
                    />
                    <path
                      class="text-kskyblue-100"
                      d="M19.53,23.51H15.91l.26,2.72H20l-.31-2.72Z"
                    />
                    <path
                      class="text-kskyblue-100"
                      d="M19.67,23.51H23.6V20.79H19.37Z"
                    />
                    <path
                      class="text-kskyblue-100"
                      d="M19.07,18.07l.3,2.72H23.6V18.07Z"
                    />
                    <path
                      class="text-kskyblue-100"
                      d="M28.14,18.07l-.31,2.72h3.93l.46-2.72Z"
                    />
                    <path
                      class="text-kskyblue-100"
                      d="M28.14,18.07l-.31,2.72H23.6V18.07Z"
                    />
                    <path
                      class="text-kskyblue-100"
                      d="M27.83,20.79l-.3,2.72H23.6V20.79Z"
                    />
                    <path
                      class="text-kskyblue-100"
                      d="M31.76,20.79l-.45,2.72H27.53l.3-2.72Z"
                    />
                    <path
                      class="text-kskyblue-100"
                      d="M31.31,23.51l-.45,2.72H27.23l.3-2.72Z"
                    />
                    <path
                      class="text-kskyblue-100"
                      d="M19.67,23.51l-.3-2.72H15.64l.27,2.72Z"
                    />
                    <path
                      class="text-kskyblue-100"
                      d="M23.6,23.51v2.72h3.63l.3-2.72Z"
                    />
                    <path
                      class="text-kskyblue-100"
                      d="M19.67,23.51,20,26.23H23.6V23.51Z"
                    />
                    <path
                      class="text-kskyblue-100"
                      d="M29.5,31.67a1.82,1.82,0,1,1-1.82-1.81,1.81,1.81,0,0,1,1.82,1.81Z"
                    />
                    <path
                      class="text-kskyblue-100"
                      d="M20.43,31.67a1.82,1.82,0,1,1-1.82-1.81,1.81,1.81,0,0,1,1.82,1.81Z"
                    />
                    <path
                      class="text-blue-100"
                      d="M34.73,17.36a1.32,1.32,0,0,0-1.3-1.56H15.6l-.53-5a1.45,1.45,0,0,0-1.44-1.31H10a1.33,1.33,0,0,0-1,.4,1.35,1.35,0,0,0-.36,1.27,1.41,1.41,0,0,0,1.39,1.05h2.25L14,27.59a2.27,2.27,0,0,0,.05,4.53h2.31a2.27,2.27,0,0,0,4.45,0h4.62a2.27,2.27,0,0,0,4.45,0h1.84a.45.45,0,1,0,0-.9H29.91a2.27,2.27,0,0,0-4.45,0H20.84a2.27,2.27,0,0,0-4.45,0H14.11a1.39,1.39,0,0,1-1.39-1.31,1.35,1.35,0,0,1,1.36-1.41H31.47a1.36,1.36,0,0,0,1.33-1.11l1.88-9.75Zm-7,13a1.36,1.36,0,1,1-1.36,1.36,1.36,1.36,0,0,1,1.36-1.36Zm-9.07,0a1.36,1.36,0,0,1,1,2.32,1.36,1.36,0,1,1-1-2.32Zm-3.24-12.7a.45.45,0,0,0-.33.15.46.46,0,0,0-.12.35l.8,8.16a.46.46,0,0,0,.45.41H30.86a.46.46,0,0,0,.45-.38l1.44-8.69Zm17.84-.9a.6.6,0,0,1,.59.7l-1.89,9.81a.45.45,0,0,1-.44.37H14.94L13.21,12.07a.91.91,0,0,0-.9-.81H10.07a.5.5,0,0,1-.51-.34.43.43,0,0,1,.13-.43.4.4,0,0,1,.31-.13h3.63a.55.55,0,0,1,.54.5l.58,5.44a.46.46,0,0,0,.45.41Zm-9.15,6.34V21.24h3.27l-.2,1.81ZM27,24l-.21,1.81H24.06V24Zm-3-3.63V18.52h3.57l-.2,1.81Zm-4,2.72-.2-1.81h3.27v1.81Zm3.07.91v1.81H20.38L20.18,24Zm-3.37-3.63-.2-1.81h3.57v1.81Zm-.82.91.21,1.81H16.32l-.18-1.81Zm-2.91-.91-.18-1.81h2.79l.2,1.81ZM19.27,24l.2,1.81H16.58L16.41,24Zm12-2.72-.3,1.81H28l.2-1.81Zm.47-2.72-.32,1.81h-3l.2-1.81ZM30.78,24l-.31,1.81H27.74l.2-1.81Z"
                    /></svg
                ></a>
              </li>
            </ul>
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
        class="w-2/3 sm:w-2/5 bg-blue-kranec px-8 py-8 transform top-0 left-0 w-64 bg-white fixed h-full overflow-auto ease-in-out transition-all duration-300 z-30"
        :class="isOpen ? 'translate-x-0' : '-translate-x-full'"
      >
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logo-nav-content"
          ><img
            src="<?php echo get_template_directory_uri(); ?>/assets/images/logo_kranec_b.svg"
            alt=""
        /></a>
        <?php
          wp_nav_menu(
            array(
              'menu' =>
        'primary', 'container' => '', 'theme_location' => 'primary',
        'items_wrap' => '
        <ul
          id="%1$s"
          class="%2$s flex flex-col font-light text-white uppercase pt-8 pb-4 text-lg"
        >
          %3$s
        </ul>
        ', 'add_li_class' => 'py-2' ) ) ?>
        <div class="search pb-8">
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
