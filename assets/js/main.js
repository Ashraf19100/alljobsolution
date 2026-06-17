$(document).ready(function ($) {
	//meanmenu
	$("#navbar nav").meanmenu();
	  
	  
	//jQuery Sticky Area
	  $(".sticky-area").sticky({
		topSpacing: 0,
	  });
      
});

function DependentDropDown(sourceId, targetId, url, paramName){
    const sourceSelect = document.getElementById(sourceId);
    const targetSelect = document.getElementById(targetId);
    if(!sourceSelect) return;
    sourceSelect.addEventListener("change", function () {

        let sourcvalue = this.value;

        if (sourcvalue === "") {
            targetSelect.innerHTML = "<option value=''>-------Select------</option>";
            return;
        }
			console.log(sourcvalue);
        let xhr = new XMLHttpRequest();
        xhr.open("GET", `${url}?${paramName}=` + sourcvalue, true);

        xhr.onload = function () {
            if (this.status === 200) {
                targetSelect.innerHTML = this.responseText;
			console.log(this.responseText);

            } else {
                targetSelect.innerHTML = "<option value=''>Error loading data</option>";
            }
        };

        xhr.onerror = function () {
            targetSelect.innerHTML = "<option value=''>Request failed</option>";
        };
        
        xhr.send();
    });
}

document.addEventListener("DOMContentLoaded", function () {
    DependentDropDown("degreelevel", "formdegree", "layouts/degreelevel.php", "degree_level");
    DependentDropDown("formdegree", "degreeSubject", "layouts/degreeselect.php", "degree_id");
});
document.addEventListener("DOMContentLoaded", function () {
    DependentDropDown("company_name", "circulars_list", "layouts/circular_reference.php", "circular_id");
    
});

function searchTableData(tableclass, columnIndex , value){
    

    const rows = document.querySelectorAll(`.${tableclass} tbody tr`);

    rows.forEach(row => {

        const cellValue = row.cells[columnIndex]
            .innerText
            .trim()
            .toLowerCase();

        if (value === 'all' || cellValue.includes(value.toLowerCase()) ) {
            row.style.display = '';
        } else {
            row.style.display = 'none';
        }

    });    
    
    }

    if( document.getElementById('searchFilter')){
    const filter = document.getElementById('searchFilter');
        
        filter.addEventListener('change', function () {
            const value = filter.value.toLowerCase();
            searchTableData('userlist', 1 , value);
            searchTableData('userlist', 2 , value);

        });
    }
    
    
    
///pagination system


function tabletotalrow(tableId, page, limit){ ///row limit
	const rows = document.querySelectorAll(`#${tableId} tbody tr`);
    
    const start = (page - 1)* limit;
    const end = start + limit
		
    rows.forEach((row, index) => {

        if(index >= start && index < end){
            row.style.display = '';
        }else{
            row.style.display = 'none';
        }

    });
}
function createPagination(tableID, paginationID , limit) {

    const rows = document.querySelectorAll(`#${tableID} tbody tr`);
    const totalPages = Math.ceil(rows.length / limit);
    

    const pagination = document.getElementById(paginationID);
    pagination.innerHTML = ' ';
    let currentPage;
    for (let i = 1; i <= totalPages; i++) {//==============================work not done========

        const btn = document.createElement('button');
        btn.textContent = i;
        btn.classList.add('btn');
        btn.classList.add(`buttonno${i}`);
        btn.classList.add('mx-1');
        
        btn.addEventListener('click', () => {
            pagination.querySelectorAll('button').forEach(button =>{
                button.classList.remove('btn-primary')
            });
            btn.classList.add('btn-primary');
            currentPage = i;
           
            tabletotalrow(tableID, currentPage, limit);
            
        });

        pagination.appendChild(btn);

    }

}


function paginationWithRowlimit(tableID, totalrow, paginationID, nxtbtn, prevbtn ){
    
    const rowLimit = document.getElementById(totalrow);
    let limit = 20;
    let currentPage = 1;
    
    tabletotalrow(tableID, currentPage, limit);
    
    createPagination(tableID, paginationID , limit);
    
    rowLimit.addEventListener('change', function () {

        limit = parseInt(rowLimit.value);

        tabletotalrow(tableID, currentPage, limit);
        createPagination(tableID, paginationID , limit);

    });
    
    document.getElementById(nxtbtn).addEventListener('click', () =>{
        const rows = document.querySelectorAll(`#${tableID} tbody tr`);
        const totalPages = Math.ceil(rows.length / limit);

        if (currentPage < totalPages) {
            currentPage++;
            tabletotalrow(tableID, currentPage, limit);
        }
    });

    document.getElementById(prevbtn).addEventListener('click', () => {

        if (currentPage > 1) {
            currentPage--;
        tabletotalrow(tableID, currentPage, limit);
        }

    });
}

if(document.getElementById('DataTable')){
    paginationWithRowlimit('DataTable','totalrow', 'DatapaginationID', 'nxtbtn', 'prevbtn');
}



