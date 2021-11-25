//Modal for add a home pop-up window start
var addAHomeBtn = document.getElementById('addAHomeBtn');
var addAHomeModal = new bootstrap.Modal(document.getElementById('addAHomeModal'), {
    keyboard: false
})
addAHomeBtn.addEventListener('click', function () {
    addAHomeModal.toggle();
})
//Add A Home Modal end