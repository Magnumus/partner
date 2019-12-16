


var one = document.querySelector(".one");
var two = document.querySelector(".two");
var th = document.querySelector(".th");

var img1 = document.querySelector(".img1");
var img2 = document.querySelector(".img2");
var img3 = document.querySelector(".img3");

one.onclick = function() {
	this.classList.add("hiu");
	two.classList.remove("hiu");
	th.classList.remove("hiu");
	img2.classList.remove("active");
	img3.classList.remove("active");
	img1.classList.add("active");
}

two.onclick = function() {
	this.classList.add("hiu");
	one.classList.remove("hiu");
	th.classList.remove("hiu");
	img1.classList.remove("active");
	img3.classList.remove("active");
	img2.classList.add("active");
}

th.onclick = function() {
	this.classList.add("hiu");
	one.classList.remove("hiu");
	two.classList.remove("hiu");
	img1.classList.remove("active");
	img2.classList.remove("active");
	img3.classList.add("active");
}






var on = document.querySelector(".on");
var tw = document.querySelector(".tw");
var t = document.querySelector(".t");

var con_1 = document.querySelector(".con_1");
var con_2 = document.querySelector(".con_2");
var con_3 = document.querySelector(".con_3");

var onp = document.querySelector(".onp");
var twp = document.querySelector(".twp");
var tp = document.querySelector(".tp");

var hz1 = document.querySelector(".hz1");
var hz2 = document.querySelector(".hz2");
var hz3 = document.querySelector(".hz3");


on.onclick = function() {
	tw.classList.remove("ac");
	twp.classList.remove("ac");
	
	t.classList.remove("ac");
	tp.classList.remove("ac");
	
	hz2.src = "images/menu2w.png";
	hz3.src = "images/menu3w.png";
	
	con_2.classList.remove("lox");
	con_3.classList.remove("lox");
	
	this.classList.add("ac");
	con_1.classList.add("lox");
	onp.classList.add("ac");
	hz1.src= "images/menu1r.png";
}

tw.onclick = function() {
	on.classList.remove("ac");
	twp.classList.remove("ac");
	
	onp.classList.remove("ac");
	tp.classList.remove("ac");
	
	hz1.src = "images/menu1w.png";
	hz3.src = "images/menu3w.png";
	
	con_1.classList.remove("lox");
	con_3.classList.remove("lox");
	
	this.classList.add("ac");
	con_2.classList.add("lox");
	twp.classList.add("ac");
	hz2.src= "images/menu2r.png";
}

t.onclick = function() {
	on.classList.remove("ac");
	tw.classList.remove("ac");
	
	onp.classList.remove("ac");
	twp.classList.remove("ac");
	
	hz1.src = "images/menu1w.png";
	hz2.src = "images/menu2w.png";
	
	con_1.classList.remove("lox");
	con_2.classList.remove("lox");
	
	this.classList.add("ac");
	con_3.classList.add("lox");
	tp.classList.add("ac");
	hz3.src= "images/menu3r.png";
}