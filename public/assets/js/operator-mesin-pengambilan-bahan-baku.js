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

    // Elemen bahan baku
    var input_bahan_baku = '<div class="form-group">' +
                                '<label class="col-form-label">Bahan Baku</label>' +
                                '<select class="form-control select-component" id="bahan_baku" name="bahan_baku">' +
                                    '<option>Pilih bahan baku . . </option>' +
                                '</select>' +
                            '</div>';

    // Elemen supplier
    var input_supplier = '<div class="form-group">' +
                            '<label class="col-form-label">Supplier Bahan Baku</label>' +
                            '<select class="form-control select-component" id="supplier" name="supplier">' +
                                '<option>Pilih supplier . . </option>' +
                            '</select>' +
                        '</div>';

    // Elemen jumlah bahan baku (Kg)
    var input_jumlah_kg = '<div class="form-group">' +
                                '<label class="col-form-label">Jumlah Bahan Baku (Kg)</label>' +
                                '<input type="number" name="jumlah_bahan_baku[]" id="" class="form-control">' +
                                '<div class="invalid-feedback">\
                                    Mohon isi jumlah bahan baku dengan benar.\
                                </div>'+
                            '</div>';

    // Elemen jumlah bahan baku (Karung)
    var input_jumlah_karung = '<div class="form-group">' +
                                '<label class="col-form-label">Jumlah Bahan Baku (Karung)</label>' +
                                '<input type="number" name="jumlah_karung_sak[]" id="" class="form-control">' +
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

    $('.tambah-bahan-baku-btn').click(function(){
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
                        $("#bahan_baku").append(o);
                    }
                }
            }
        });
        $.ajax({
            type: 'GET',
            url: "/operator-mesin/pengambilan-bahan-baku/getSupplier",
            success: function (results) {
                if (results.success === true) {
                    // $("#supplier").empty();
                    results.data.forEach(addOption)
                    function addOption(item, index, arr){
                        let text = item.NAMA_SUPPLIER;
                        let val = item.ID_SUPPLIER;
                        var o = new Option(text, val);
                        $(o).html(text);
                        $("#supplier").append(o);
                    }
                }
            }
        });
    });


    //ambil supplier ketika bahan_baku dipilih
    // $('#bahan_baku').change(function(){
    //     var jenis = $(this).val();
    //     console.log(jenis);
    //     $.ajax({
    //         type: 'GET',
    //         url: "/operator-mesin/pengambilan-bahan-baku/getSupplier"+jenis,
    //         success: function (results) {
    //             if (results.success === true) {
    //                 $("#supplier").empty();
    //                 results.data.forEach(addOption)
    //                 function addOption(item, index, arr){
    //                     let text = item.NAMA_SUPPLIER;
    //                     let val = item.ID_SUPPLIER;
    //                     var o = new Option(text, val);
    //                     $(o).html(text);
    //                     $("#supplier").append(o);
    //                 }
    //             }
    //         }
    //     });
    // });

});