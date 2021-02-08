// document.querySelectorAll('ul li').forEach((el) => {
//   // indentLevel variable - returns number variable
//   var iL = parseInt(el.classList[0].replace('i-',''));
//
//
//   el.addEventListener('click', (v) => {
//     v.preventDefault();
//     // console.log(iL+1);
//     // console.log(typeof iL)
//     // console.log(getSiblings(el))
//     getSiblings(el).forEach((sibling) => {
//       // if classlist includes class matching 'i-' + iL+1
//       var nextIndentLevel = iL + 1;
//       if (sibling.classList.contains('i-' + nextIndentLevel)) {
//         // toggle hidden
//         sibling.classList.toggle('hidden');
//       }
//     });
//   });
// });
//
// // when you click on an element with class list i-NUMBER
// // show all sibling elements with class i-NUMBER++
//
// function getSiblings(el) {
//   // Setup siblings array and get the first sibling
//   var siblings = [];
//   var sibling = el.parentNode.firstChild;
//   // Loop through each sibling and push to the array
//   while (sibling) {
//     if (sibling.nodeType === 1 && sibling !== el) {
//       siblings.push(sibling);
//     }
//     sibling = sibling.nextSibling
//   }
//   return siblings;
// };
//
// // function getIndentLevel(el) {
// //   return el.classList[0].replace('i-','')
// // }

var coll = document.getElementsByClassName("collapsible");

//setting buttons of class 'collapsible' to extend on click
for (i = 0; i < coll.length; i++) {
  coll[i].addEventListener("click", function () {
    this.classList.toggle("active");
  });
}
