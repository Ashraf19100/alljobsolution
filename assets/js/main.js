$(document).ready(function ($) {
	//meanmenu
	$("#navbar nav").meanmenu();
	  
	  
	//jQuery Sticky Area
	  $(".sticky-area").sticky({
		topSpacing: 0,
	  });
      
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

