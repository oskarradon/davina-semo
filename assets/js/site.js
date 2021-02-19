// * * * * * *
// EXPANDABLE DATA TREE
// * * * * * *

var coll = document.getElementsByClassName("collapsible");

//set elements with class 'collapsible' to extend on click
for (i = 0; i < coll.length; i++) {
  coll[i].addEventListener("click", function () {
    this.classList.toggle("active");
    mainImgToggle()
  });
}


// * * * * * *
// MAIN IMAGE
// * * * * * *

var zoomImage = document.querySelector('#main-image img');
var slider = document.getElementById('slider');
slider.addEventListener('input', function() {
    zoomImage.style.width = slider.value+'%';
}, false);

// hides main img & slider if any 1st-level elements are expanded
function mainImgToggle() {
  var elements = document.getElementsByClassName('i-1');
  for (var i = 0; i < elements.length; i++) {
    if (elements[i].classList.contains("active")) {
      zoomImage.classList.add("hide")
      slider.classList.add("hide")
      break // important to exit loop once if statement evaluates to true the first time
    } else {
      zoomImage.classList.remove("hide")
      slider.classList.remove("hide")
    }
  }
}


// * * * * *
// LIGHTBOX
// * * * * *

const lightbox = GLightbox();

const i2 = document.querySelectorAll('.i-2')

i2.forEach((elem, index) => {

  var hasChild = elem.querySelector(".gallery") != null;
  var gallerySelector = 'figure a[data-gallery=gallery'.concat( index + 1 , ']' )
  if (hasChild) {
    elem.addEventListener("click", function () {

      lightbox.open(document.querySelector(gallerySelector))

    });
  }

});

// schema:
// div.i-2
//   div.gallery
//     figure a[data-gallery=galleryX]  <-- X = $showCount
