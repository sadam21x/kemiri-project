$(document).ready(function() {

    // Efek menu aktif pada navbar menu
    const menu = document.getElementById("penerimaan-menu");
    menu.classList.add("active");

    // Mencegah submit form via tombol enter
    $(window).keydown(function(event){
        if(event.keyCode == 13) {
          event.preventDefault();
          return false;
        }
    });
 
    // Datatable
    const penerimaanBahanBakuTable = document.getElementById("penerimaan-bahan-baku-table");
    $(penerimaanBahanBakuTable).DataTable();
    
    // Datepicker
    const dateComponent = document.getElementsByClassName("date-component");
    $(dateComponent).daterangepicker({
        singleDatePicker: true,
        showDropdowns: true
    });

    // Select2
    const selectComponent = document.getElementsByClassName("select-component");
    $(selectComponent).select2({
        placeholder: 'Pilih supplier . . '
    });

    // Hitung berat total bahan baku (input penerimaan)
    $('form :input').change(function() {

        let jumlahKarung = $('.input-jumlah-karung').val();
        let beratKarung = $('.input-berat-karung').val();

        let beratTotal = jumlahKarung * beratKarung;
        $('.input-berat-total').val(beratTotal);

    });

    // Hitung berat total bahan baku (edit penerimaan)
    $('form :input').change(function() {

        let jumlahKarung = $('.edit-jumlah-karung').val();
        let beratKarung = $('.edit-berat-karung').val();

        let beratTotal = jumlahKarung * beratKarung;
        $('.edit-berat-total').val(beratTotal);

    });

});
