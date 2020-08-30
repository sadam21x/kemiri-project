$(document).ready(function() {

    // Efek menu aktif pada navbar menu
    const menu = document.getElementById("sales-menu");
    menu.classList.add("active");

    // Datatable
    const sales_aTable = document.getElementById("sales-a-table");
    $(sales_aTable).DataTable();
    const sales_bTable = document.getElementById("sales-b-table");
    $(sales_bTable).DataTable();

    // Select2
    const selectComponent = document.getElementsByClassName("select-component");
    $(selectComponent).select2();

});