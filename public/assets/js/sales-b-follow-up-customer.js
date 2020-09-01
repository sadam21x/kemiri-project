$(document).ready(function() {

    // Efek menu aktif pada navbar menu
    const menu = document.getElementById("follow-up-customer-menu");
    menu.classList.add("active");

    // Datatable
    const datatableComponent = document.getElementsByClassName("datatable-component");
    $(datatableComponent).DataTable();

    // Select2
    const selectComponent = document.getElementsByClassName("select-component");
    $(selectComponent).select2();

});