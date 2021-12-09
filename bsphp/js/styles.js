/************************************************* JS MODALS START ************************************************************************** */
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

//Modal for add a Plant pop-up window start
if (document.getElementById('addAPlantBtn'))
{
var addAPlantBtn = document.getElementById('addAPlantBtn');
var addAPlantModal = new bootstrap.Modal(document.getElementById('addAPlantModal'), {
    keyboard: false
})
addAPlantBtn.addEventListener('click', function () {
    addAPlantModal.toggle();
})

}
//Add A Plant Modal end

//Modal for edit a home pop-up window start
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
//Edit A Home Modal end

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

/************************************************* JS MODALS END ************************************************************************** */

/************************************************* JS FUNCTIONS START ************************************************************************** */

/************************************************* JS FUNCTIONS END ************************************************************************** */


//Add A specialty Modal start
if (document.getElementById('addASpecialtyBtn'))
{
var addASpecialtyBtn = document.getElementById('addASpecialtyBtn');
var addASpecialtyModal = new bootstrap.Modal(document.getElementById('addASpecialtyModal'), {
    keyboard: false
})
addASpecialtyBtn.addEventListener('click', function () {
    addASpecialtyModal.toggle();
})
}
//Add A specialty Modal end

//Edit A specialty Modal start
if (document.getElementById('EditSpecialtiesBtn'))
{
var EditSpecialtiesBtn = document.getElementById('EditSpecialtiesBtn');
var editASpecialtyModal = new bootstrap.Modal(document.getElementById('editASpecialtyModal'), {
    keyboard: false
})
EditSpecialtiesBtn.addEventListener('click', function () {
    editASpecialtyModal.toggle();
})
}

