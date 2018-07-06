function move () {
	$('.subMenu').css('display', 'block');
}

function out () {
	$('.subMenu').css('display', 'none');
}
function move1 () {
	$('.subSubMenu').css('display', 'block');
}

function out1 () {
	$('.subSubMenu').css('display', 'none');
}
var btn = document.querySelector('.btn');
btn.onclick = function(e) {
	var element = document.querySelector(".block");
console.log(element);
  if(element.classList.contains("show-block")) {
  	element.classList.remove("show-block");
  } else {
  	element.classList.add("show-block");
  }
}