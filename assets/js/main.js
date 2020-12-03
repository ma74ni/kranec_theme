document.addEventListener("DOMContentLoaded", () => {
  new Vue({
    el: "#app",
    ready: function() {
      var self = this;
      window.addEventListener(
        "click",
        function(e) {
          if (!e.target.parentNode.classList.contains("info-toggle")) {
            self.close();
          }
        },
        false
      );
    },
    data() {
      return {
        message: "Hola desde Vue",
        isOpen: false,
        isShow: false,
        openTab: 1,
        showAtribute: -1,
        showDescProd: -1,
        isActive: true,
        showDesc: false,
        itemsCarousel: 4,
        showInfo: 0,
        openData: false,
        open: false,
        actionSearch: false,
        search: "",
        FNAME: null,
        errorFNAME: "",
        CONAME: null,
        errorCONAME: "",
        EMAIL: null,
        errorEMAIL: "",
        LNAME: null,
        errorLNAME: "",
        fixedNav: false,
        showProd: 0,
        quantity: 1,
        ok: true,
        showLogin: false,
        actionAccess: "login",
      };
    },
    created() {
      let uri = new URL(window.location.href);
      let params = new URLSearchParams(uri.search);
      let searchedString = params.get("s");
      this.search = searchedString;
    },
    methods: {
      checkForm: function(e) {
        if (this.FNAME && this.LNAME && this.EMAIL && this.CONAME) {
          return true;
        }
        this.errorCONAME = "";
        this.errorEMAIL = "";
        this.errorLNAME = "";
        this.errorFNAME = "";

        if (!this.FNAME) {
          this.errorFNAME = "Obligatorio";
        }
        if (!this.CONAME) {
          this.errorCONAME = "Obligatorio";
        }
        if (!this.EMAIL) {
          this.errorEMAIL = "Obligatorio";
        }
        if (!this.LNAME) {
          this.errorLNAME = "Obligatorio";
        }
        e.preventDefault();
      },
    },
    mounted() {
      document.addEventListener("keydown", (e) => {
        if (e.keyCode == 27 && this.isOpen) this.isOpen = false;
      });
      const listMenu = document.querySelectorAll(".menu-item-has-children");
      let itemActive = false;
      listMenu.forEach((item) => {
        item.addEventListener("click", () => {
          const btnLink = item.childNodes[0];
          const subMenu = item.childNodes[2];
          itemActive = !itemActive;
          if (itemActive) {
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
      const logoName = document.querySelector("#logo-name svg");
      const logoNameClass = logoName.className.baseVal;
      const sandwichIcon = document.getElementById("sandwich-icon");
      const sandwichIconClass = sandwichIcon.className.baseVal;
      const headerNav = document.querySelector(".header-menu");
      const seccitionsPage = new fullpage("#fullpage", {
        anchors: [
          "firstPage",
          "secondPage",
          "thirdPage",
          "fourthPage",
          "fifthPage",
          "sixthPage",
        ],
        scrollOverflow: true,
        scrollOverflowReset: true,
        verticalCentered: true,
        controlArrows: false,
        slidesNavigation: true,
        afterLoad: function(anchorLink, index) {
          if (index.isLast) {
            sandwichIcon.className.baseVal =
              "fill-current inline-block text-white";
            logoName.className.baseVal = "fill-current text-white inline-block";
          } else {
            sandwichIcon.className.baseVal = sandwichIconClass;
            logoName.className.baseVal = logoNameClass;
          }
        },
        onLeave: function(origen, destination, direction) {
          if (destination.index == 0) {
            headerNav.className =
              "fixed w-full pt-2 sm:pt-10 z-20 bg-transparent header-menu";
          } else {
            headerNav.className =
              "fixed w-full py-2  sm:py-4 z-20 bg-kblue-100 bg-opacity-25 header-menu";
          }
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
      const showPass = document.querySelectorAll(".show-password-input");
      showPass.forEach((btnView) => {
        btnView.addEventListener("click", (e) => {
          const inputPass = e.target.parentElement.firstChild;
          if (inputPass.type === "password") {
            inputPass.type = "text";
          } else {
            inputPass.type = "password";
          }
        });
      });
    },
  });
});
