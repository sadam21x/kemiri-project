$(document).ready(function() {

    // Efek menu aktif pada navbar menu
    const menu = document.getElementById("sales-menu");
    menu.classList.add("active");

    // Datatable
    const datatableComponent = document.getElementsByClassName("datatable-component");
    $(datatableComponent).DataTable();

    $('.ya').on('click', function(){
        document.getElementById('evaluasi').value = "Telah Memenuhi Target";
    });

    $('.tidak').on('click', function(){
        document.getElementById('evaluasi').value = "Tidak Memenuhi Target";
    });

});