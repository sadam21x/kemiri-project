$(document).ready(function() {

    // Efek menu aktif pada navbar
    const menu = document.getElementById("pembayaran-supplier-menu");
    menu.classList.add("active");

    // datatable
    $('.datatable-component').DataTable();
    

    // Modifikasi switch konfirmasi pembayaran
    $('.switch-bayar').change(function() {
        if (this.checked){
            $('.label-bayar').html('Sudah Bayar');
            $('.label-bayar').removeClass('text-danger');
            $('.label-bayar').addClass('text-success');
        }
        else {
            $('.label-bayar').html('Belum Bayar');
            $('.label-bayar').removeClass('text-success');
            $('.label-bayar').addClass('text-danger');
        }
    });
});