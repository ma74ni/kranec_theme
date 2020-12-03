const mix = require("laravel-mix");
const tailwindcss = require("tailwindcss");

mix
  .postCss(
    "./assets/css/style.css",
    "./css/style.css",
    tailwindcss("./tailwind.config.js")
  )
  .sourceMaps(true, "source-map")
  .copy("node_modules/@fortawesome/fontawesome-free/webfonts", "dist/webfonts");
