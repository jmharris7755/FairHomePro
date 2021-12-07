//Modal for add a home pop-up window start
if (document.getElementById('addAHomeBtn'))
{
var addAHomeBtn = document.getElementById('addAHomeBtn');
var addAHomeModal = new bootstrap.Modal(document.getElementById('addAHomeModal'), {
    keyboard: false
})
addAHomeBtn.addEventListener('click', function () {
    addAHomeModal.toggle();
})
}
//Add A Home Modal end

//Modal for add a home pop-up window start
if (document.getElementById('editAHomeBtn'))
{
var editAHomeBtn = document.getElementById('editAHomeBtn');
var editAHomeModal = new bootstrap.Modal(document.getElementById('editAHomeModal'), {
    keyboard: false
})
editAHomeBtn.addEventListener('click', function () {
    editAHomeModal.toggle();
})
}
//Add A Home Modal end

//Modal for add a service pop-up window start
if (document.getElementById('addAServiceBtn'))
{
var addAServiceBtn = document.getElementById('addAServiceBtn');
var addAServiceModal = new bootstrap.Modal(document.getElementById('addAServiceModal'), {
    keyboard: false
})
addAServiceBtn.addEventListener('click', function () {
    addAServiceModal.toggle();
})
}
//Add A Service Modal end
//Edit A service Modal start
if (document.getElementById('EditServicesBtn'))
{
var EditServicesBtn = document.getElementById('EditServicesBtn');
var EditAServiceModal = new bootstrap.Modal(document.getElementById('EditAServiceModal'), {
    keyboard: false
})
EditServicesBtn.addEventListener('click', function () {
    EditAServiceModal.toggle();
})
}
//Edit A service Modal end

//Function to who hide edit home form
function SaveStreetCookie() {
    var edit_home_select = document.getElementById("editHomeSelect");
    //var edit_home_form = document.getElementById("editHomeForm");
    var name = "edit_home_select"
    var edit_home_select_value = "";

    //edit_home_form.style.display = edit_home_select.value == "" ? "none" : "block";
    edit_home_select_value = edit_home_select.value;
    
    document.cookie =  'edit_home_select='+edit_home_select_value+'; max-age=1800';



    alert(document.cookie);

}