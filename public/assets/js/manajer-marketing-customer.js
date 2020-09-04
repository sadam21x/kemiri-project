$(document).ready(function() {

    // Efek menu aktif pada navbar menu
    const menu = document.getElementById("customer-menu");
    menu.classList.add("active");

    // Datatable
    const customerTable = document.getElementById("customer-table");
    $(customerTable).DataTable();

    // Select2
    const selectComponent = document.getElementsByClassName("select-component");
    $(selectComponent).select2();

    $('.tombol-edit-customer').click(function() {
        $('.select-kota').empty();
    });

    $('.tombol-tambah-customer').click(function() {
        $('.select-kota').empty();
    });

    // Tampilkan data kota sesuai provinsi yang dipilih
    $('.select-provinsi').on('change', function () {
        const id_provinsi = $(this).val();
        var token = $('meta[name="csrf-token"]').attr('content');
        var url = '/manajer-marketing/req-data-kota';

        $.ajax({
            type: 'POST',
            headers: {
                'X-CSRF-TOKEN': token
            },
            url: url,
            data: {id : id_provinsi},
            dataType: 'json',
            success: function(data){
                $('.select-kota').empty();

                $.each(data, function (id, name) {
                    $('.select-kota').append(new Option(name, id));
                });
            }
        });
    });

});