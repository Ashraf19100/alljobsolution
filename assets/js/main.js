$(document).ready(function ($) {
	//meanmenu
	$("#navbar nav").meanmenu();
	  
	  
	//jQuery Sticky Area
	  $(".sticky-area").sticky({
		topSpacing: 0,
	  });
      
});



document.addEventListener("DOMContentLoaded", function () {

    const degreeSelect = document.getElementById("formdegree");
    const subjectSelect = document.getElementById("degreeSubject");

    degreeSelect.addEventListener("change", function () {

        let degreeId = this.value;

        if (degreeId === "") {
            subjectSelect.innerHTML = "<option value=''>Select Subject</option>";
            return;
        }
			console.log(degreeId)
        let xhr = new XMLHttpRequest();
        xhr.open("GET", "layouts/degreeselect.php?degree_id=" + degreeId, true);

        xhr.onload = function () {
            if (this.status === 200) {
                subjectSelect.innerHTML = this.responseText;
			console.log(this.responseText)

            } else {
                subjectSelect.innerHTML = "<option value=''>Error loading data</option>";
            }
        };

        xhr.onerror = function () {
            subjectSelect.innerHTML = "<option value=''>Request failed</option>";
        };

        xhr.send();
    });

});





