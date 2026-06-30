
//Dependent Dropdown
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

document.addEventListener("DOMContentLoaded", function () {//add education form
    DependentDropDown("degreelevel", "formdegree", "layouts/degreelevel.php", "degree_level");
    DependentDropDown("formdegree", "degreeSubject", "layouts/degreeselect.php", "degree_id");
});
document.addEventListener("DOMContentLoaded", function () {
    DependentDropDown("company_name", "circulars_list", "layouts/circular_reference.php", "circular_id");//add company form
    
});
// Search Table Data
function searchTableData(tableclass,  value){
    

    const rows = document.querySelectorAll(`.${tableclass} tbody tr`);

    rows.forEach(row => {
        const found = Array.from(row.cells).some(cell =>
            cell.innerText.trim().toLowerCase().includes(value.toLowerCase())
        );

        row.style.display = (value === 'all' || found) ? '' : 'none';

    });
    
    
    }

    if( document.getElementById('searchFilter')){
    const filter = document.getElementById('searchFilter');
        
        filter.addEventListener('change', function () {
            const value = filter.value.toLowerCase();
            searchTableData('searchtableData', value);
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

//search data
    function searchData(cardclass,  value){
    const divsCards = document.querySelectorAll(`.${cardclass}`);

    divsCards.forEach(card => {
        const found = card.innerText.toLowerCase().includes(value);
        card.style.display = (value === '' || value === 'all' || found) ? '' : 'none';
        card.style.witdh = (value === '' || value === 'all' || found) ? '' : '0px';
        card.style.height = (value === '' || value === 'all' || found) ? '' : '0px';

    });
    
    
    }

    if( document.getElementById('searchDatainput')){
        
    const searchinput = document.getElementById('searchDatainput');
        
        searchinput.addEventListener('change', function () {
            const value = searchinput.value.trim().toLowerCase();
            searchData('searchcard', value);
        });
    }


///Multi page data button function
function multipageDataView(view_onebtnID, view_OneSectionID, view_twobtnID, view_twoSectionID){
    const view_onebtn=document.getElementById(view_onebtnID);
    const view_twobtn=document.getElementById(view_twobtnID);

    const view_OneSection = document.getElementById(view_OneSectionID);
    const view_twoSection = document.getElementById(view_twoSectionID);
    
    if(view_onebtn){
        
    view_OneSection.style.display = '';
    view_twoSection.style.display = 'none';
        
        view_onebtn.addEventListener('click', ()=>{
            view_OneSection.style.display = '';
            view_twoSection.style.display = 'none';
            
            view_onebtn.classList.add('btn-primary');
            view_twobtn.classList.remove('btn-primary');
            view_onebtn.classList.remove('btn-outline-dark');
        });
    }
    if(view_twobtn){
        view_twobtn.addEventListener('click', ()=>{
            view_OneSection.style.display = 'none';
            view_twoSection.style.display = '';

            view_twobtn.classList.add('btn-primary');
            view_onebtn.classList.add('btn-outline-dark');
            view_onebtn.classList.remove('btn-primary');
        });
    }
}
    
multipageDataView('circularBtn', 'Circular_section', 'postBtn', 'Allpost_section');
multipageDataView('gridViewBtn', 'gridList', 'tableViewBtn', 'tableList');
//card pagination


function divitempagination(cardID, paginationnav){
    function createCardsPagination() {

    cardpagination.innerHTML = "";

    const totalPages = Math.ceil(cards.length / cardsPerPage);
    console.log(cards.length);
    // Previous Button
    const prev = document.createElement("li");
    prev.className = `page-item ${presentPage === 1 ? "disabled" : ""}`;

    prev.innerHTML = `<a href="#" class="page-link">Previous</a>`;

    prev.onclick = function(e){
        e.preventDefault();
        if(presentPage > 1){
            displayCards(presentPage - 1);
        }
    };

    cardpagination.appendChild(prev);

    // Page Numbers
    for(let i = 1; i <= totalPages; i++){

        const li = document.createElement("li");
        li.className = `page-item ${presentPage === i ? "active" : ""}`;

        li.innerHTML = `<a href="#" class="page-link">${i}</a>`;

        li.onclick = function(e){
            e.preventDefault();
            displayCards(i);
        };

        cardpagination.appendChild(li);
    }

    // Next Button
    const next = document.createElement("li");
    next.className = `page-item ${presentPage === totalPages ? "disabled" : ""}`;

    next.innerHTML = `<a href="#" class="page-link">Next</a>`;

    next.onclick = function(e){
        e.preventDefault();
        if(presentPage < totalPages){
            displayCards(presentPage + 1);
        }
    };

    cardpagination.appendChild(next);

    }
    function displayCards(page) {
        
        presentPage = page;

        const start = (page - 1) * cardsPerPage;
        const end = start + cardsPerPage;

        cards.forEach((card, index) => {
            if (index >= start && index < end) {
                card.style.display = "";
            } else {
                card.style.display = "none";
            }
        });

        createCardsPagination();
    }
    const cards = document.querySelectorAll(`.${cardID}`);
    const cardpagination = document.getElementById(`${paginationnav}`);

    const cardsPerPage = 8;
    let presentPage = 1;
    displayCards(1);
}

divitempagination('card-item','pagination');
divitempagination('card-item-job','paginationjobs');
