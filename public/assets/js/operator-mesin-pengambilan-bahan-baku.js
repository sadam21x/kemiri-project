$(document).ready(function() {

    // Efek menu aktif pada navbar
    const menu = document.getElementById("pengambilan-bahan-baku-menu");
    menu.classList.add("active");  

    // Datatable
    const pengambilanBahanBakuTable = document.getElementById("pengambilan-bahan-baku-table");
    $(pengambilanBahanBakuTable).DataTable();

    // Select2
    const selectComponent = document.getElementsByClassName("select-component");
    $(selectComponent).select2();

    var no = 0;

    // ambil supplier 1
    $('.kode-bahan-baku').change(function(){
        var token = $('meta[name="csrf-token"]').attr('content');
        var id = $(this).val();
        $.ajax({
            type: 'POST',
            url: "/operator-mesin/pengambilan-bahan-baku/getSupplier",
            data: {
                _token: token,
                KODE_BAHAN_BAKU : id
            },
            success: function (results) {
                if (results.success === true) {
                    $("#nama-supplier"+no).empty();
                    results.data.forEach(addOption)
                    function addOption(item, index, arr){
                        let text = item.NAMA_SUPPLIER;
                        let val = item.ID_SUPPLIER;
                        var o = new Option(text, val);
                        $(o).html(text);
                        $("#nama-supplier"+no).append(o);
                    }
                }
            }
        });
    });

    // ambil stock 1
    $('.id-supplier').change(function(){
        var token = $('meta[name="csrf-token"]').attr('content');
        var id = $(this).val();
        $.ajax({
            type: 'POST',
            url: "/operator-mesin/pengambilan-bahan-baku/getStock",
            data: {
                _token: token,
                ID_SUPPLIER : id
            },
            success: function (results) {
                if (results.success === true) {
                    $('#total_kg'+no).val(results.data[0].STOK_PENERIMAAN);
                    $('#total_sak'+no).val(results.data[0].JUMLAH_KARUNG_SAK);
                }
            }
        });
    });

    $('.tambah-bahan-baku-btn').click(function(){
        no++;

    // Elemen bahan baku
    var input_bahan_baku = '<div class="form-group">' +
                                '<label class="col-form-label">Bahan Baku</label>' +
                                '<select class="form-control select-component kode-bahan-baku" id="bahan_baku'+no+'" name="bahan_baku">' +
                                    '<option>Pilih bahan baku . . </option>' +
                                '</select>' +
                            '</div>';

    // Elemen supplier
    var input_supplier = '<div class="form-group">' +
                            '<label class="col-form-label">Supplier Bahan Baku</label>' +
                            '<select class="form-control select-component id-supplier" id="nama-supplier'+no+'" name="supplier">' +
                                '<option>Pilih supplier . . </option>' +
                            '</select>' +
                        '</div>';

    // Elemen jumlah bahan baku (Kg)
    var input_jumlah_kg = '<div class="form-group">' +
                                '<label class="col-form-label">Jumlah Bahan Baku (Kg)</label>' +
                                '<input type="number" name="jumlah_bahan_baku[]" id="total_kg'+no+'" class="form-control">' +
                                '<div class="invalid-feedback">\
                                    Mohon isi jumlah bahan baku dengan benar.\
                                </div>'+
                            '</div>';

    // Elemen jumlah bahan baku (Karung)
    var input_jumlah_karung = '<div class="form-group">' +
                                '<label class="col-form-label">Jumlah Bahan Baku (Karung)</label>' +
                                '<input type="number" name="jumlah_karung_sak[]" id="total_sak'+no+'" class="form-control">' +
                                '<div class="invalid-feedback">\
                                    Mohon isi jumlah bahan baku dengan benar.\
                                </div>'+
                            '</div>';
   
    // Elemen modal button
    var modal_button = '<div class="modal-footer">' +
                            '<button type="button" class="btn btn-sm btn-google" data-dismiss="modal">BATAL</button>' +
                            '<button type="submit" class="btn btn-sm btn-linkedin">SIMPAN</button>' +
                        '</div>';
                    
    // Garis pembatas
    var garis_rambut = '<hr>';

    // $('.tambah-bahan-baku-btn').click(function(){
        // Hapus modal button saat ini untuk digantikan yang baru
        $('.modal-footer').remove();
        
        // Tambah input field bahan baku
        $('.modal-body-pengambilan-bahan-baku').append(
            garis_rambut,
            input_bahan_baku,
            input_supplier,
            input_jumlah_kg,
            input_jumlah_karung,
            modal_button
        );
    // });

    //ambil bahan baku

        $.ajax({
            type: 'GET',
            url: "/operator-mesin/pengambilan-bahan-baku/getBahanBaku",
            success: function (results) {
                if (results.success === true) {
                    // $("#bahan_baku").empty();
                    results.data.forEach(addOption)
                    function addOption(item, index, arr){
                        let text = item.NAMA_BAHAN_BAKU;
                        let val = item.KODE_BAHAN_BAKU;
                        var o = new Option(text, val);
                        $(o).html(text);
                        $("#bahan_baku"+no).append(o);
                    }
                }
            }
        });

    // ambil supplier 2
        $('.kode-bahan-baku').change(function(){
            var token = $('meta[name="csrf-token"]').attr('content');
            var id = $(this).val();
            $.ajax({
                type: 'POST',
                url: "/operator-mesin/pengambilan-bahan-baku/getSupplier",
                data: {
                    _token: token,
                    KODE_BAHAN_BAKU : id
                },
                success: function (results) {
                    if (results.success === true) {
                        $("#nama-supplier"+no).empty();
                        results.data.forEach(addOption)
                        function addOption(item, index, arr){
                            let text = item.NAMA_SUPPLIER;
                            let val = item.ID_SUPPLIER;
                            var o = new Option(text, val);
                            $(o).html(text);
                            $("#nama-supplier"+no).append(o);
                        }
                    }
                }
            });
        });

    // ambil stock 2
        $('.id-supplier').change(function(){
            var token = $('meta[name="csrf-token"]').attr('content');
            var id = $(this).val();
            $.ajax({
                type: 'POST',
                url: "/operator-mesin/pengambilan-bahan-baku/getStock",
                data: {
                    _token: token,
                    ID_SUPPLIER : id
                },
                success: function (results) {
                    if (results.success === true) {
                        $('#total_kg'+no).val(results.data[0].STOK_PENERIMAAN);
                        $('#total_sak'+no).val(results.data[0].JUMLAH_KARUNG_SAK);
                    }
                }
            });
        });
    });
});

//validation
'use strict';
window.addEventListener('load', function() {
// Fetch all the forms we want to apply custom Bootstrap validation styles to
var forms = document.getElementsByClassName('needs-validation');
// Loop over them and prevent submission
var validation = Array.prototype.filter.call(forms, function(form) {
    form.addEventListener('submit', function(event) {
    if (form.checkValidity() === false) {
        event.preventDefault();
        event.stopPropagation();
    }
    form.classList.add('was-validated');
    }, false);
});
}, false);