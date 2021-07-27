// * * * * * * * * * * * *
// READING AND WRITING URL
// * * * * * * * * * * * *

for (const collapsible of document.querySelectorAll(".collapsible")) {
  collapsible.addEventListener("click", function () {
    updateHash(collapsible);
  });
}

function updateHash(element) {
  let anchor = "#" + element.dataset.anchorId,
    currentHash = window.location.hash;
  if (currentHash === anchor) {
    history.pushState(null, null, " ");
  } else if (currentHash.includes(anchor)) {
    let newHash = currentHash.replace(anchor, "");
    history.pushState(null, null, newHash);
  } else {
    let newHash = currentHash.concat(anchor);
    history.pushState(null, null, newHash);
  }
}

// on page load
// look at the URL of the page
// divide the url into the "href"s of the options that are expanded,
//   (probably by seperating between each slash character -- use a regex)
// loop through each expandable tree option and if it's name === "href" found in URL ---> expand that option

expandCollapsibleElements(window.location.hash);

function expandCollapsibleElements(hash) {
  for (const collapsible of document.querySelectorAll(".collapsible")) {
    let anchor = "#" + collapsible.dataset.anchorId;
    if (hash.includes(anchor)) {
      collapsible.classList.toggle("active");
      document.querySelector("div#main-image img").classList.add("hide");
      document.getElementsByTagName("aside")[0].classList.add("hide");
    }
  }
}

// * * * * * * * *
// EXPANDABLE TREE
// * * * * * * * *

for (const collapsible of document.querySelectorAll(".collapsible")) {
  collapsible.addEventListener("click", function () {
    this.classList.toggle("active");
    mainImgToggle();
  });
}

// document.getElementById("logo").addEventListener("click", function () {
//   for (const collapsible of document.querySelectorAll(".collapsible")) {
//     collapsible.classList.remove("active");
//   }
// });

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
  let elements = document.getElementsByClassName("i-1"),
    modelViewer = document.querySelector("model-viewer");

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
        document.getElementsByTagName("aside")[0].classList.add("hide");
        break;
      } else {
        mainImage.classList.remove("hide");
        document.getElementsByTagName("aside")[0].classList.remove("hide");
      }
    }
  }
}

// Make the main image draggable

// dragElement(document.querySelectorAll("#main-image img")[0]);

// function dragElement(elmnt) {
//   var pos1 = 0,
//     pos2 = 0,
//     pos3 = 0,
//     pos4 = 0;
//   if (document.getElementById(elmnt.id + "header")) {
//     // if present, the header is where you move the DIV from:
//     document.getElementById(elmnt.id + "header").onmousedown = dragMouseDown;
//   } else {
//     // otherwise, move the DIV from anywhere inside the DIV:
//     elmnt.onmousedown = dragMouseDown;
//   }

//   function dragMouseDown(e) {
//     e = e || window.event;
//     e.preventDefault();
//     // get the mouse cursor position at startup:
//     pos3 = e.clientX;
//     pos4 = e.clientY;
//     document.onmouseup = closeDragElement;
//     // call a function whenever the cursor moves:
//     document.onmousemove = elementDrag;
//   }

//   function elementDrag(e) {
//     e = e || window.event;
//     e.preventDefault();
//     // calculate the new cursor position:
//     pos1 = pos3 - e.clientX;
//     pos2 = pos4 - e.clientY;
//     pos3 = e.clientX;
//     pos4 = e.clientY;
//     // set the element's new position:
//     elmnt.style.top = elmnt.offsetTop - pos2 + "px";
//     elmnt.style.left = elmnt.offsetLeft - pos1 + "px";
//   }

//   function closeDragElement() {
//     // stop moving when mouse button is released:
//     document.onmouseup = null;
//     document.onmousemove = null;
//   }
// }

// * * * *
// SWIPER
// * * * *

const swiper = new Swiper(".swiper-container", {
  centeredSlides: true,
  hashNavigation: {
    watchState: true,
  },
  keyboard: {
    enabled: true,
  },
  speed: 500,
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
});

// for (const galleryToggle of document.querySelectorAll(".gallery-toggle")) {
//   galleryToggle.addEventListener("click", function () {
//     this.classList.toggle("gallery-active");
//   });
//   galleryToggle
//     .querySelectorAll(".close-button")
//     .addEventListener("click", function () {
//       this.classList.toggle("gallery-active");
//     });
// }

// MicroModal.init();

// * * * * *
// LIGHTBOX
// * * * * *

// const customLightboxHTML = `<div id="glightbox-body" class="glightbox-container">
//     <div class="gloader visible"></div>
//     <div class="goverlay"></div>
//     <div class="gcontainer">
//     <div id="glightbox-slider" class="gslider"></div>
//     <button class="gnext gbtn" tabindex="0" aria-label="Next" data-customattribute="example"></button>
//     <button class="gprev gbtn" tabindex="1" aria-label="Previous"></button>
//     <button class="gclose gbtn" tabindex="2" aria-label="Close">x</button>
// </div>
// </div>`;

// // if .galleryToggle contains a gallery,
// // open the corresponding lightbox on click

// for (const toggle of document.querySelectorAll(".galleryToggle")) {
//   let hasGallery = toggle.querySelector(".gallery") != null,
//     galleryId = toggle.classList[3].replace("toggle", ""),
//     gallerySelector = "figure a[data-gallery=gallery".concat(galleryId);
//   if (hasGallery) {
//     toggle.addEventListener("click", function () {
//       let lightboxElements = toggle.querySelectorAll(".gallery figure");
//       console.log(lightboxElements);
//       lightboxContent = [];

//       for (const el of lightboxElements) {
//         lightboxContent.push({
//           content: el,
//         });
//       }

//       // initialize lightbox

//       let lightbox = GLightbox({
//         zoomable: false,
//         autoplayVideos: true,
//         // skin: "davina",
//       });

//       lightbox.setElements(lightboxContent);

//       lightbox.open();
//     });
//   }
// }

// initialize lightbox

// const lightbox = GLightbox({
//   lightboxHTML: customLightboxHTML,
//   zoomable: false,
//   autoplayVideos: true,
//   // skin: "davina",
// });

// for (const toggle of document.querySelectorAll(".galleryToggle")) {
//   let hasGallery = toggle.querySelector(".gallery") != null,
//     galleryId = toggle.classList[3].replace("toggle", ""),
//     gallerySelector = "figure a[data-gallery=gallery".concat(galleryId);
//   if (hasGallery) {
//     toggle.addEventListener("click", function () {
//       lightbox.open(document.querySelector(gallerySelector));
//     });
//   }
// }
