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
      <header class="fixed w-full">
        <div class="container mx-auto flex justify-between">
          <div class="flex items-center">
            <button @click="isOpen = !isOpen" class="btn-menu pr-4">
              <img
                src="wp-content/themes/kranec_theme/assets/images/nav.svg"
                alt=""
              />
            </button>
            <a href="" class="logo-content"
              ><img
                src="wp-content/themes/kranec_theme/assets/images/logo_kranec.svg"
                alt=""
            /></a>
          </div>
          <div class="">
            <ul class="flex store-nav">
              <li class="pr-4">
                <a href=""
                  ><img
                    src="wp-content/themes/kranec_theme/assets/images/login.svg"
                    alt=""
                /></a>
              </li>
              <li>
                <a href=""
                  ><img
                    src="wp-content/themes/kranec_theme/assets/images/cart.svg"
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
            src="wp-content/themes/kranec_theme/assets/images/logo_kranec_b.svg"
            alt=""
        /></a>
        <ul>
          <li>
            Productos
            <ul class="pl-8">
              <li>Equipos de Protección Personal</li>
              <li>Equipos de Protección Colectiva</li>
            </ul>
          </li>
          <li>
            Servicios
            <ul class="pl-8">
              <li>Servicio 1</li>
              <li>Servicio 2</li>
            </ul>
          </li>
          <li>ADN Empresarial</li>
          <li>Nuestra Experiencia</li>
          <li>Blog</li>
        </ul>
      </nav>