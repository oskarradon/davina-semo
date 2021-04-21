// * * * * * * * *
// EXPANDABLE TREE
// * * * * * * * *

for (const collapsible of document.querySelectorAll(".collapsible")) {
  collapsible.addEventListener("click", function () {
    this.classList.toggle("active");
    mainImgToggle();
  });
}

document.getElementById("logo").addEventListener("click", function () {
  for (const collapsible of document.querySelectorAll(".collapsible")) {
    collapsible.classList.remove("active");
  }
});

// * * * * * *
// MAIN IMAGE
// * * * * * *

let mainImage = document.querySelector("div#main-image img");

// image zoom slider

let slider = document.getElementById("slider");

if (slider) {
  mainImage.style.height = slider.value + "%";
  slider.addEventListener(
    "input",
    function () {
      mainImage.style.height = slider.value + "%";
    },
    false
  );
}

// hides main img/model-viewer & slider if any 1st-level elements are expanded
function mainImgToggle() {
  let elements = document.getElementsByClassName("i-1");
  let modelViewer = document.querySelector("model-viewer");

  if (modelViewer) {
    for (let i = 0; i < elements.length; i++) {
      if (elements[i].classList.contains("active")) {
        modelViewer.classList.add("hide");
        break; // important to exit loop once if statement evaluates to true the first time
      } else {
        modelViewer.classList.remove("hide");
      }
    }
  } else if (mainImage) {
    for (let i = 0; i < elements.length; i++) {
      if (elements[i].classList.contains("active")) {
        mainImage.classList.add("hide");
        slider.classList.add("hide");
        break;
      } else {
        mainImage.classList.remove("hide");
        slider.classList.remove("hide");
      }
    }
  }
}

// * * * * *
// LIGHTBOX
// * * * * *

const customLightboxHTML = `<div id="glightbox-body" class="glightbox-container">
    <div class="gloader visible"></div>
    <div class="goverlay"></div>
    <div class="gcontainer">
    <div id="glightbox-slider" class="gslider"></div>
    <button class="gnext gbtn" tabindex="0" aria-label="Next" data-customattribute="example"></button>
    <button class="gprev gbtn" tabindex="1" aria-label="Previous"></button>
    <button class="gclose gbtn" tabindex="2" aria-label="Close">x</button>
</div>
</div>`;

// initialize lightbox

const lightbox = GLightbox({
  lightboxHTML: customLightboxHTML,
  zoomable: false,
  autoplayVideos: true,
});

// if .galleryToggle contains a gallery,
// open the corresponding lightbox on click

for (const toggle of document.querySelectorAll(".galleryToggle")) {
  let hasGallery = toggle.querySelector(".gallery") != null;
  let galleryId = toggle.classList[3].replace("toggle", "");
  let gallerySelector = "figure a[data-gallery=gallery".concat(galleryId);
  if (hasGallery) {
    toggle.addEventListener("click", function () {
      lightbox.open(document.querySelector(gallerySelector));
    });
  }
}
