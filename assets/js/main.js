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
    },
  });
});
