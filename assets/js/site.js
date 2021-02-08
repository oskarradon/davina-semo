document.querySelectorAll('ul li').forEach((el) => {
  // indentLevel variable
  var iL = parseInt(el.classList[0].replace('i-',''));


  el.addEventListener('click', (v) => {
    v.preventDefault();
    console.log(iL);
    console.log(typeof iL)
    console.log(getSiblings(el))
    // const listArray = Array.from(el.children);
    // listArray.forEach((item) => {
    //   console.log(item)
    //   item.classList.toggle('hidden');
    // });
  });
});

// when you click on an element with class list i-NUMBER
// show all sibling elements with class i-NUMBER++

function getSiblings(elem) {
  // Setup siblings array and get the first sibling
  var siblings = [];
  var sibling = elem.parentNode.firstChild;
  // Loop through each sibling and push to the array
  while (sibling) {
    if (sibling.nodeType === 1 && sibling !== elem) {
      siblings.push(sibling);
    }
    sibling = sibling.nextSibling
  }
  return siblings;
};
