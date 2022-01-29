window.onscroll = function () {
  myFunction();
};

var container = document.getElementById("container");
var sticky = container.offsetTop;

function myFunction() {
  if (window.scrollY >= sticky) {
    container.classList.add("sticky");
  } else {
    container.classList.remove("sticky");
  }
}
