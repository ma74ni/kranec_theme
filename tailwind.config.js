// tailwind.config.js
module.exports = {
  theme: {
    extend: {
      inset: {
        "11": "11%",
        "4": "4%",
      },
    },
    height: {
      sm: "8px",
      md: "16px",
      lg: "24px",
      xl: "48px",
      "2xl": "550px",
    },
    fontFamily: {
      oswald: ["Oswald", "sans-serif"],
      bebas: ["Bebas Neue", "cursive"],
    },
    colors: {
      black: "#000",
      white: "#fff",
      kgray: {
        100: "#EAEAEA",
      },
      kblue: {
        100: "#202e4c",
        200: "#102a4b",
        300: "#385595",
        400: "#205497",
      },
      kskyblue: {
        100: "#77BFFA",
        200: "#205497",
      },
    },
  },
};
