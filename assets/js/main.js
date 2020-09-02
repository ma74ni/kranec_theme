document.addEventListener("DOMContentLoaded", () => {
  new Vue({
    el: "#app",
    data() {
      return {
        message: "Hola desde Vue",
        isOpen: false,
        isShow: false,
      };
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
      const inicalSrc = document.getElementById("sandwich-icon").src;
      const seccitionsPage = new fullpage("#fullpage", {
        scrollOverflow: true,
        verticalCentered: true,
        controlArrows: false,
        slidesNavigation: true,
        afterLoad: function(anchorLink, index) {
          // last section loaded
          let iconMenuSrc = document.getElementById("sandwich-icon").src;
          const arraySrc = iconMenuSrc.split("/");
          const imageNameUbication = arraySrc.length;
          if (index.isLast && arraySrc[imageNameUbication - 1] == "nav_a.svg") {
            const newSrc = iconMenuSrc.replace("nav_a.svg", "nav.svg");
            document.getElementById("sandwich-icon").src = newSrc;
          } else {
            document.getElementById("sandwich-icon").src = inicalSrc;
          }
        },
        afterRender: function() {
          setInterval(function() {
            fullpage_api.moveSlideRight();
          }, 6000);
        },
      });
      const nextButton = document.querySelectorAll(".nextSection");
      nextButton.forEach((button) => {
        button.addEventListener("click", () => {
          console.log("ok");
          fullpage_api.moveSectionDown();
        });
      });
    },
  });
});
