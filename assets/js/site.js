// * * * * * * * *
// EXPANDABLE TREE
// * * * * * * * *

// elements with class .collapsible have next sibling element with class .content
// .collapsible elements are given class .active which toggles showing .content element
// ex:
//   <div class="collapsible"><p>click this</p></div>
//   <div class="content"><p>Lorem ipsum dolor sit amet.</p></div>
// ex: https://codepen.io/oskarradon/pen/JjbLBrY

for (const collapsible of document.querySelectorAll(".collapsible")) {
  collapsible.addEventListener("click", function () {
    this.classList.toggle("active");
    updateHash(collapsible);
    mainObjectToggle();
  });
}

// collapse all tree options when user clicks top level of tree

if (document.getElementById("logo")) {
  document.getElementById("logo").addEventListener("click", function () {
    for (const collapsible of document.querySelectorAll(".collapsible")) {
      collapsible.classList.remove("active");
      history.pushState(null, null, " ");
    }
  });
}

// * * * * * *
// MAIN IMAGE
// * * * * * *

function initZoomSlider() {
  let mainObject = document.querySelector("div#main-object img"),
    slider = document.getElementById("slider");

  if (slider) {
    mainObject.style.height = slider.value + "%";
    slider.addEventListener(
      "input",
      function () {
        mainObject.style.height = slider.value + "%";
      },
      false
    );
  }
}

initZoomSlider();

// this function is called when a user clicks on a .collapsible element in the file tree
// it hides main image/model-viewer & slider if any 1st-level elements are expanded

function mainObjectToggle() {
  let elements = document.getElementsByClassName("i-1"),
    modelViewer = document.querySelector("model-viewer"),
    mainObject = document.getElementById("main-object"),
    aside = document.getElementsByTagName("aside")[0];

  if (modelViewer) {
    for (let i = 0; i < elements.length; i++) {
      if (elements[i].classList.contains("active")) {
        modelViewer.classList.add("hide");
        break; // important to exit loop once if statement evaluates to true the first time
      } else {
        modelViewer.classList.remove("hide");
      }
    }
  } else if (mainObject) {
    for (let i = 0; i < elements.length; i++) {
      if (elements[i].classList.contains("active")) {
        mainObject.classList.add("hide");
        if (aside) {
          aside.classList.add("hide");
        }
        break;
      } else {
        mainObject.classList.remove("hide");
        if (aside) {
          aside.classList.add("hide");
        }
      }
    }
  }
}

// * * * * * * * * * * * *
// READING AND WRITING URL
// * * * * * * * * * * * *

// to preserve a user's expanded options in the file tree this function uses the history API to store
// selected options as a long string of hashes using the data attribute anchor-id of each .collapsible element

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

// on page load this function opens the expanded options and hides the main image/model viewer

expandCollapsibleElements(window.location.hash);

function expandCollapsibleElements(hash) {
  for (const collapsible of document.querySelectorAll(".collapsible")) {
    let anchor = "#" + collapsible.dataset.anchorId;
    if (hash.includes(anchor)) {
      collapsible.classList.toggle("active");
      mainObjectToggle();
    }
  }
}

// * * * * * * *
// IMAGE GALLERY
// * * * * * * *

// Exhibition page uses Swiper library: https://swiperjs.com/

const swiper = new Swiper(".swiper-container", {
  centeredSlides: true,
  keyboard: {
    enabled: true,
  },
  speed: 500,
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
});

// "close button" goes home by default, unless sent to exhibition page from home page

if (
  document.getElementById("close-button") &&
  document.referrer.includes("davinasemo.com")
) {
  document
    .getElementById("close-button")
    .addEventListener("click", function (event) {
      event.preventDefault();
      window.history.back();
    });
}

// * * * * * * * * * * *
// VIDEO / AUDIO PLAYER
// * * * * * * * * * * *

// Implements plyr javascript library: https://github.com/sampotts/plyr

const player = new Plyr("#player");
