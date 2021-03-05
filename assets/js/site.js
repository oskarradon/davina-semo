// * * * * * * * *
// EXPANDABLE TREE
// * * * * * * * *

for (const collapsible of document.querySelectorAll('.collapsible')) {
  collapsible.addEventListener('click', function() {
    this.classList.toggle("active");
    mainImgToggle()
  });
}



// * * * * * * * *
// EXPANDABLE TREE
// * * * * * * * *

// for (const hoverable of document.querySelectorAll('.i.i-3')) {
//   hoverable.addEventListener('mouseover', function() {
//     console.log('asdf')
//   });
// }




// * * * * * *
// MAIN IMAGE
// * * * * * *

let mainImage = document.querySelector('div#main-image img');

// image zoom slider

let slider = document.getElementById('slider');

if (slider) {
  slider.addEventListener('input', function() {
      mainImage.style.width = slider.value+'%';
  }, false);
}

// hides main img/model-viewer & slider if any 1st-level elements are expanded
function mainImgToggle() {
  let elements = document.getElementsByClassName('i-1');
  let modelViewer = document.querySelector('model-viewer');

  if (modelViewer) {
    for (let i = 0; i < elements.length; i++) {
      if (elements[i].classList.contains("active")) {
        modelViewer.classList.add("hide")
        break // important to exit loop once if statement evaluates to true the first time
      } else {
        modelViewer.classList.remove("hide")
      }
    }
  } else if(mainImage) {
    for (let i = 0; i < elements.length; i++) {
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

// if .i-2 contains a gallery, open the corresponding lightbox on click

document.querySelectorAll('.i-2').forEach((elem, index) => {
  let hasGallery = elem.querySelector(".gallery") != null;
  let gallerySelector = 'figure a[data-gallery=gallery'.concat( index + 1 , ']' )
  console.log(gallerySelector)
  if (hasGallery) {
    elem.addEventListener("click", function () {
      console.log(gallerySelector)
      lightbox.open(document.querySelector(gallerySelector))
    });
  }
});

document.querySelectorAll('.i-3').forEach((elem, index) => {
  let hasGallery = elem.querySelector(".gallery") != null;
  let gallerySelector = 'figure a[data-gallery=gallery'.concat( index + 1 , ']' )
  if (hasGallery) {
    elem.addEventListener("click", function () {
      console.log(gallerySelector)
      lightbox.open(document.querySelector(gallerySelector))
    });
  }
});
