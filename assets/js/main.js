$(document).ready(function ($) {
	//meanmenu
	$("#navbar nav").meanmenu();
	  
	  
	//jQuery Sticky Area
	  $(".sticky-area").sticky({
		topSpacing: 0,
	  });
      
});

function DependentDropDown(sourceId, targetId, url, paramName){
    const degreeSelect = document.getElementById(sourceId);
    const subjectSelect = document.getElementById(targetId);

    degreeSelect.addEventListener("change", function () {

        let sourcvalue = this.value;

        if (sourcvalue === "") {
            subjectSelect.innerHTML = "<option value=''>Select Subject</option>";
            return;
        }
			console.log(sourcvalue)
        let xhr = new XMLHttpRequest();
        xhr.open("GET", `${url}?${paramName}=` + sourcvalue, true);

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
}

document.addEventListener("DOMContentLoaded", function () {
    DependentDropDown("degreelevel", "formdegree", "layouts/degreelevel.php", "degree_level");
    DependentDropDown("formdegree", "degreeSubject", "layouts/degreeselect.php", "degree_id");
    

});





