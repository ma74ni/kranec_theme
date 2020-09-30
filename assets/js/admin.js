const addButton = document.getElementById("btn-image-upload");
const deleteButton = document.getElementById("btn-image-delete");
const img = document.getElementById("logo-tag");
const hidden = document.getElementById("data-custom-image");
const customUploader = wp.media({
  title: "Selecciona una imagen",
  button: {
    text: "Seleccionar",
  },
  multiple: false,
});
let toogleVisibility = function(action) {
  if ("ADD" === action) {
    addButton.style.display = "none";
    img.setAttribute("style", "width: 100%");
    deleteButton.style.display = "";
  }

  if ("DELETE" === action) {
    addButton.style.display = "";
    deleteButton.style.display = "none";
    img.removeAttribute("style");
  }
};
addButton.addEventListener("click", () => {
  if (customUploader) {
    customUploader.open();
  }
});
customUploader.on("select", () => {
  const attachment = customUploader
    .state()
    .get("selection")
    .first()
    .toJSON();
  img.setAttribute("src", attachment.url);

  hidden.setAttribute(
    "value",
    JSON.stringify([{ id: attachment.id, url: attachment.url }])
  );
  toogleVisibility("ADD");
});
deleteButton.addEventListener("click", () => {
  img.removeAttribute("src");
  hidden.removeAttribute("value");
  toogleVisibility("DELETE");
});

window.addEventListener("DOMContentLoaded", () => {
  if ("" === customUploads.imageData || 0 === customUploads.imageData.length) {
    toogleVisibility("DELETE");
  } else {
    img.setAttribute("src", customUploads.imageData.src);
    hidden.setAttribute("value", JSON.stringify([customUploads.imageData]));
    toogleVisibility("ADD");
  }
});
