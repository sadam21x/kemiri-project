$(document).ready(function() {

    // Efek menu aktif pada navbar menu
    const menu = document.getElementById("pengiriman-menu");
    menu.classList.add("active");
 
    // Datatable
    const pengirimanBarangTable = document.getElementById("pengiriman-barang-table");
    $(pengirimanBarangTable).DataTable();

});
