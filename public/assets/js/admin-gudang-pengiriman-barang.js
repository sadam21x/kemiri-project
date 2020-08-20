$(document).ready(function() {

    // Efek menu aktif pada navbar menu
    var menu = document.getElementById("pengiriman-menu");
    menu.classList.add("active");
 
    // Datatable
    var pengirimanBarangTable = document.getElementById("pengiriman-barang-table");
    $(pengirimanBarangTable).DataTable();
    
    // Datepicker untuk modal
    var inputTanggal = document.getElementById("input-tanggal");
    $(inputTanggal).daterangepicker({
        singleDatePicker: true,
        showDropdowns: true
    });

    // Interactive select untuk modal
    var inputSupplier = document.getElementById("input-supplier");
    $(inputSupplier).select2({
        placeholder: 'Pilih supplier . . '
    });

    // Hitung berat total bahan baku
    $('form :input').change(function() {

        let jumlahKarung = $('#input-jumlah-karung').val();
        let beratKarung = $('#input-berat-karung').val();

        let beratTotal = jumlahKarung * beratKarung;
        $('#input-berat-total').val(beratTotal);

    });

    // Reset modal kembali seperti semula saat user menekan tombol input order masak
    $('.tombol-input-penerimaan').click(function(){
        $('#modal-form-label').html('Input Penerimaan Bahan Baku');
        $('.modal-body form').attr('action', '/admin-gudang/input-penerimaan-bahan'); // action disesuaikan ke keadaan awal sesuai route input
        $('#input-jumlah-karung').val('');
        $('#input-berat-karung').val('');
        $('#input-berat-total').val('');
    });

    // Modifikasi modal input penerimaan bahan baku untuk edit data penerimaan
    // Call data menggunakan ajax
    $('.tombol-edit-penerimaan').click(function(){
        $('#modal-form-label').html('Edit Penerimaan Bahan Baku');
        $('.modal-body form').attr('action', '/admin-gudang/update-penerimaan-bahan'); // action disesuaikan ke route update penerimaan
        
        // id penerimaan yang mau dipanggil datanya, data id dikirim dari button edit
        const id = $(this).data('id');

        // csrf token
        var token = $('meta[name="csrf-token"]').attr('content');
        
        // sesuaikan route ke function di controller yang menangani ajax req
        var url = '/admin-gudang/edit-penerimaan-bahan';

        $.ajax({
            type: 'POST',
            headers: {
                'X-CSRF-TOKEN': token
            },
            url: url,
            cache: false,
            data: {id : id},
            dataType: 'json',
            success: function(data){
                console.log(data);

                // output
                // $('#input-id').val(data.id);
            }
        });

    });

});
