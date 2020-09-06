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

    // number
    $no = 1;

    // Elemen bahan baku
    var input_bahan_baku = '<div class="form-group">' +
                                '<label class="col-form-label">Bahan Baku</label>' +
                                '<select class="form-control select-component" id="" name="bahan_baku'+$no+'">' +
                                    '<option>Pilih bahan baku . . </option>' +
                                    '@foreach($bahan_baku as $b)' +
                                    '<option value="{!!$b->KODE_BAHAN_BAKU!!}"></option>' +
                                    '@endforeach'
                                '</select>' +
                            '</div>';

    // Elemen supplier
    var input_supplier = '<div class="form-group">' +
                            '<label class="col-form-label">Supplier Bahan Baku</label>' +
                            '<select class="form-control select-component" id="" name="supplier'+$no+'">' +
                                '<option>Pilih supplier . . </option>' +
                                '<option value=""></option>' +
                            '</select>' +
                        '</div>';

    // Elemen jumlah bahan baku (Kg)
    var input_jumlah_kg = '<div class="form-group">' +
                                '<label class="col-form-label">Jumlah Bahan Baku (Kg)</label>' +
                                '<input type="number" name="jumlah_bahan_baku'+$no+'" id="" class="form-control">' +
                            '</div>';

    // Elemen jumlah bahan baku (Karung)
    var input_jumlah_karung = '<div class="form-group">' +
                                '<label class="col-form-label">Jumlah Bahan Baku (Karung)</label>' +
                                '<input type="number" name="jumlah_karung_sak'+$no+'" id="" class="form-control">' +
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

    // Ambil stok penerimaan
    $(document).on("select","#supplier",function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: "{{ url('/pengambilan-bahan-baku/ambilPenerimaan') }}",
            method: 'POST',
            data: {
                id_supplier : $("#supplier").val(),
                kode_bahan_baku : $("#bahan_baku").val(),
            },
            success: function(result){
                let data_p = result.penerimaan; 
                $("#total_berat").val(data_p.total_berat);
                $("#jumlah_karung_sak").val(data_p.jumlah_karung_sak);
            }
        });
    });

});