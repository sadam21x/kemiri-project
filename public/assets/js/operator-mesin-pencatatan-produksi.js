$(document).ready(function() {

    // Efek menu aktif pada navbar
    const menu = document.getElementById("pencatatan-produksi-menu");
    menu.classList.add("active");  

    // Datatable
    const pengambilanBahanBakuTable = document.getElementById("pengambilan-bahan-baku-table");
    $(pengambilanBahanBakuTable).DataTable();

    // Select2
    const selectComponent = document.getElementsByClassName("select-component");
    $(selectComponent).select2();

});