$(document).ready(function ($) {
	//meanmenu
	$("#navbar nav").meanmenu();
	  
	  
	//jQuery Sticky Area
	  $(".sticky-area").sticky({
		topSpacing: 0,
	  });
      
});



// document.addEventListener("DOMContentLoaded", function () {

//     const degreeSelect = document.getElementById("degree");
//     const subjectSelect = document.getElementById("subject");

//     degreeSelect.addEventListener("change", function () {

//         let degreeId = this.value;

//         if (degreeId === "") {
//             subjectSelect.innerHTML = "<option value=''>Select Subject</option>";
//             return;
//         }

//         let xhr = new XMLHttpRequest();
//         xhr.open("GET", "index.php?page=educationalinfo&degree_id=" + degreeId, true);

//         xhr.onload = function () {
//             if (this.status === 200) {
//                 subjectSelect.innerHTML = this.responseText;
//             } else {
//                 subjectSelect.innerHTML = "<option value=''>Error loading data</option>";
//             }
//         };

//         xhr.onerror = function () {
//             subjectSelect.innerHTML = "<option value=''>Request failed</option>";
//         };

//         xhr.send();
//     });

// });



// //product show js

