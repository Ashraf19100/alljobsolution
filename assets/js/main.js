$(document).ready(function ($) {
	//meanmenu
	$("#navbar nav").meanmenu();
	  
	  
	//jQuery Sticky Area
	  $(".sticky-area").sticky({
		topSpacing: 0,
	  });
      
});
const btn2 = document.getElementById("nav-btn2");
const sub_nav2 = document.getElementById("sub_nav2");

btn2.addEventListener('click', function (){
	if(sub_nav2.style.display === 'none' || sub_nav2.style.display === '' ){
		sub_nav2.style.display = 'block';
		sub_nav2.style.height = '100px';
		btn2.innerText='X';
	}else{
		sub_nav2.style.display = 'none';
		sub_nav2.style.height = '0px';
		btn2.innerText='+';
	}

});
const btn = document.getElementById("nav-btn");
const sub_nav = document.getElementById("sub_nav");
btn.addEventListener('click', function (){
	if(sub_nav.style.display === 'none' || sub_nav.style.display === '' ){
		sub_nav.style.display = 'block';
		sub_nav.style.height = '100px';
		btn.innerText='X';
	}else{
		sub_nav.style.display = 'none';
		sub_nav.style.height = '0px';
		btn.innerText='+';
	}

});

const adddegree = document.getElementById('edit_btn');
const formdiv= document.getElementById('add_degree');

adddegree.addEventListener('click', function(){
	if(formdiv.classList.contains('add-btn-action')){
		formdiv.classList.remove('add-btn-action');
		formdiv.classList.add('mb-2');
		formdiv.classList.add('p-4');
	
	}else{
		formdiv.classList.add('add-btn-action');
		formdiv.classList.remove('mb-2');
		formdiv.classList.remove('p-4');
	}
});



//product show js

