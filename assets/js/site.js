var coll = document.getElementsByClassName("collapsible");

//setting buttons of class 'collapsible' to extend on click
for (i = 0; i < coll.length; i++) {
  coll[i].addEventListener("click", function () {
    this.classList.toggle("active");
  });
}
