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
                                '<select class="form-control select-component" id="" name="">' +
                                    '<option>Pilih bahan baku . . </option>' +
                                    '<option value="Plastik Bekas">Plastik Bekas</option>' +
                                    '<option value="Plastik Virgin">Plastik Virgin</option>' +
                                    '<option value="Pewarna">Pewarna</option>' +
                                '</select>' +
                            '</div>';

    // Elemen supplier
    var input_supplier = '<div class="form-group">' +
                            '<label class="col-form-label">Supplier Bahan Baku</label>' +
                            '<select class="form-control select-component" id="" name="">' +
                                '<option>Pilih supplier . . </option>' +
                                '<option value="UD. Pertama Makmur">UD. Pertama Makmur</option>' +
                                '<option value="UD. Dewata Indah">UD. Dewata Indah</option>' +
                                '<option value="Himasi">Himasi</option>' +
                            '</select>' +
                        '</div>';

    // Elemen jumlah bahan baku (Kg)
    var input_jumlah_kg = '<div class="form-group">' +
                                '<label class="col-form-label">Jumlah Bahan Baku (Kg)</label>' +
                                '<input type="number" name="" id="" class="form-control">' +
                            '</div>';

    // Elemen jumlah bahan baku (Karung)
    var input_jumlah_karung = '<div class="form-group">' +
                                '<label class="col-form-label">Jumlah Bahan Baku (Karung)</label>' +
                                '<input type="number" name="" id="" class="form-control">' +
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
    });

});