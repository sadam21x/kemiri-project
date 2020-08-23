$(document).ready(function() {

    // Efek menu aktif pada navbar menu
    const menu = document.getElementById("supplier-menu");
    menu.classList.add("active");

    // Datatable
    const supplierTable = document.getElementById("supplier-table");
    $(supplierTable).DataTable();

    // Select2
    const selectComponent = document.getElementsByClassName("select-component");
    $(selectComponent).select2();

});