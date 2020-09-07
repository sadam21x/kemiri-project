$(document).ready(function() {

    // Efek menu aktif pada navbar menu
    const menu = document.getElementById("sales-menu");
    menu.classList.add("active");

    // Datatable
    const datatableComponent = document.getElementsByClassName("datatable-component");
    $(datatableComponent).DataTable();

});