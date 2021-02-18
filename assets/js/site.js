var zoomImage = document.querySelector('#main-image img');
var slider = document.getElementById('slider');
slider.addEventListener('input', function() {
    zoomImage.style.width = slider.value+'%';
}, false);


var coll = document.getElementsByClassName("collapsible");

//setting buttons of class 'collapsible' to extend on click
for (i = 0; i < coll.length; i++) {
  coll[i].addEventListener("click", function () {
    this.classList.toggle("active");
    mainImgToggle()
  });
}

// hides main img & slider if any 1st-level elements are expanded
function mainImgToggle() {
  var elements = document.getElementsByClassName('i-1');
  for (var i = 0; i < elements.length; i++) {
    if (elements[i].classList.contains("active")) {
      zoomImage.classList.add("hide")
      slider.classList.add("hide")
      break
    } else {
      zoomImage.classList.remove("hide")
      slider.classList.remove("hide")
    }
  }
}

const lightbox = GLightbox({
  width: "100vw"
});
