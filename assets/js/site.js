document.querySelectorAll('ul').forEach((el) => {
  var iL = el.classList[0].replace('i-','');


  el.addEventListener('click', (v) => {
    v.preventDefault();
    console.log(iL);
    const listItems = el.children;
    console.log(listItems)
    const listArray = Array.from(el.children);
    listArray.forEach((item) => {
      console.log(item)
      item.classList.toggle('hidden');
    });
  });
});
