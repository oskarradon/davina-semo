// * * * * * * * *
// EXPANDABLE TREE
// * * * * * * * *

var coll = document.getElementsByClassName("collapsible");

//set elements with class 'collapsible' to extend on click

for (i = 0; i < coll.length; i++) {
  coll[i].addEventListener("click", function () {
    this.classList.toggle("active");
    mainImgToggle()
    overflow()
  });
}


// * * * * * *
// MAIN IMAGE
// * * * * * *

var mainImage = document.querySelector('div#main-image img');

// image zoom slider

var slider = document.getElementById('slider');
if (slider) {
  slider.addEventListener('input', function() {
      mainImage.style.width = slider.value+'%';
  }, false);
}

// hides main img/model-viewer & slider if any 1st-level elements are expanded
function mainImgToggle() {
  var elements = document.getElementsByClassName('i-1');
  var modelViewer = document.querySelector('model-viewer');

  if (modelViewer) {
    for (var i = 0; i < elements.length; i++) {
      if (elements[i].classList.contains("active")) {
        modelViewer.classList.add("hide")
        break // important to exit loop once if statement evaluates to true the first time
      } else {
        modelViewer.classList.remove("hide")
      }
    } // need to refactor this into D.R.Y.
  } else if(mainImage) {
    for (var i = 0; i < elements.length; i++) {
      if (elements[i].classList.contains("active")) {
        mainImage.classList.add("hide")
        slider.classList.add("hide")
        break
      } else {
        mainImage.classList.remove("hide")
        slider.classList.remove("hide")
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
    <button class="gnext gbtn" tabindex="0" aria-label="Next" data-customattribute="example">{nextSVG}</button>
    <button class="gprev gbtn" tabindex="1" aria-label="Previous">{prevSVG}</button>
    <button class="gclose gbtn" tabindex="2" aria-label="Close">x</button>
</div>
</div>`;

// initialize lightbox

const lightbox = GLightbox({
  lightboxHTML: customLightboxHTML,
  zoomable: false
});

const i2 = document.querySelectorAll('.i-2')

// if .i-2 contains a gallery, open the corresponding lightbox on click

i2.forEach((elem, index) => {
  var hasGallery = elem.querySelector(".gallery") != null;
  var gallerySelector = 'figure a[data-gallery=gallery'.concat( index + 1 , ']' )
  if (hasGallery) {
    elem.addEventListener("click", function () {
      lightbox.open(document.querySelector(gallerySelector))
    });
  }
});


// * * * * * * * *
// COLUMN OVERFLOW
// * * * * * * * *

function overflow() {
  document.querySelectorAll('.column[data-overflow]').forEach((el, index) => {

      var parent = document.querySelector(el.dataset.overflow);
      var colHeight = parent.clientHeight;
      var scroll = parseInt(colHeight) * (index + 1);
      var newHeight = "-" + scroll + "px";

      el.innerHTML = parent.innerHTML;
      document.querySelector('#' + el.id + ' .content').style.marginTop = newHeight;

  });
}
