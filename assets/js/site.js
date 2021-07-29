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
    let anchor = "#" + collapsible.dataset.anchorId,
      mainImage = document.querySelector("div#main-image img"),
      aside = document.getElementsByTagName("aside")[0];
    if (hash.includes(anchor)) {
      collapsible.classList.toggle("active");
      mainImage.classList.add("hide");
      aside.classList.add("hide");
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
  // hashNavigation: {
  //   watchState: true,
  // },
  keyboard: {
    enabled: true,
  },
  speed: 500,
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
});
