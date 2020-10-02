document.addEventListener("DOMContentLoaded", () => {
  new Vue({
    el: "#app",
    data() {
      return {
        message: "Hola desde Vue",
        isOpen: false,
        isShow: false,
        openTab: 1,
        itemsCarousel: 4,
        showInfo: 0,
        openData: false,
        open: false,
        actionSearch: false,
        search: "",
      };
    },
    created() {
      let uri = new URL(window.location.href);
      let params = new URLSearchParams(uri.search);
      let searchedString = params.get("s");
      this.search = searchedString;
    },
    methods: {},
    mounted() {
      document.addEventListener("keydown", (e) => {
        if (e.keyCode == 27 && this.isOpen) this.isOpen = false;
      });
      const listMenu = document.querySelectorAll(".menu-item-has-children");
      listMenu.forEach((item) => {
        item.addEventListener("click", () => {
          const btnLink = item.childNodes[0];
          const subMenu = item.childNodes[2];
          if (!btnLink.className) {
            btnLink.className = "active";
            subMenu.className = "sub-menu show";
          } else {
            btnLink.className = "";
            subMenu.className = "sub-menu";
          }
        });
      });
      const itemSearch = document.querySelectorAll(".result-item-search");
      if (itemSearch.length > 0) {
        itemSearch.forEach((item) => {
          item.addEventListener("mouseover", () => {
            const imageItem = item.childNodes[2].childNodes[0];
            imageItem.className =
              "attachment-post-thumbnail size-post-thumbnail wp-post-image selected";
          });
          item.addEventListener("mouseout", () => {
            const imageItem = item.childNodes[2].childNodes[0];
            imageItem.className =
              "attachment-post-thumbnail size-post-thumbnail wp-post-image";
          });
        });
      }

      const infoProject = document.querySelectorAll(".title-project");
      if (infoProject.length > 0) {
        infoProject.forEach((item) => {
          item.addEventListener("click", () => {
            const buttonOpen = item.childNodes[0].childNodes[4];
            const infoProject = item.childNodes[2];
            if (buttonOpen.className != "circle-plus text-xl opened") {
              buttonOpen.className = "circle-plus text-xl opened";
              infoProject.className = "block content-project-block";
            } else {
              buttonOpen.className = "circle-plus text-xl closed";
              infoProject.className = "hidden";
            }
          });
        });
      }
      const inicalSrc = document.getElementById("sandwich-icon").src;
      const seccitionsPage = new fullpage("#fullpage", {
        scrollOverflow: true,
        verticalCentered: true,
        controlArrows: false,
        slidesNavigation: true,
        afterLoad: function(anchorLink, index) {
          // last section loaded
          /* let iconMenuSrc = document.getElementById("sandwich-icon").src;
          const arraySrc = iconMenuSrc.split("/");
          const imageNameUbication = arraySrc.length;
          if (index.isLast && arraySrc[imageNameUbication - 1] == "nav_a.svg") {
            const newSrc = iconMenuSrc.replace("nav_a.svg", "nav.svg");
            document.getElementById("sandwich-icon").src = newSrc;
          } else {
            document.getElementById("sandwich-icon").src = inicalSrc;
          } */
        },
        afterRender: function() {
          setInterval(function() {
            fullpage_api.moveSlideRight();
          }, 6000);
        },
      });
      const carousel = new ElderCarousel(".carousel-example", {
        infinite: false,
      });
      const nextButton = document.querySelectorAll(".nextSection");
      nextButton.forEach((button) => {
        button.addEventListener("click", () => {
          fullpage_api.moveSectionDown();
        });
      });
    },
  });
});
