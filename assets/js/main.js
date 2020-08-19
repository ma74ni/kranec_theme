document.addEventListener("DOMContentLoaded", () => {
  new Vue({
    el: "#app",
    data() {
      return {
        message: "Hola desde Vue",
        isOpen: false,
      };
    },
    methods: {},
    mounted() {
      document.addEventListener("keydown", (e) => {
        if (e.keyCode == 27 && this.isOpen) this.isOpen = false;
      });
    },
  });
});
