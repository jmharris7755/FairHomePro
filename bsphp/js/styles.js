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