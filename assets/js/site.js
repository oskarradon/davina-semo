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
    mainImageToggle();
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
  let mainImage = document.querySelector("div#main-image img"),
    slider = document.getElementById("slider");

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
}

initZoomSlider();

// this function is called when a user clicks on a .collapsible element in the file tree
// it hides main image/model-viewer & slider if any 1st-level elements are expanded

function mainImageToggle() {
  let elements = document.getElementsByClassName("i-1"),
    modelViewer = document.querySelector("model-viewer"),
    mainImage = document.querySelector("div#main-image");

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
      mainImageToggle();
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
