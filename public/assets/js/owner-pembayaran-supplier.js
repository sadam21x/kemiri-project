$(document).ready(function() {

    // Efek menu aktif pada navbar
    const menu = document.getElementById("pembayaran-supplier-menu");
    menu.classList.add("active");

    // datatable
    $('.datatable-component').DataTable();
    

    // Modifikasi switch konfirmasi pembayaran
    $('.switch-bayar').change(function(e) {
        e.stopPropagation();
        let id = $(this).attr('id').slice(17);
        var token = $('meta[name="csrf-token"]').attr('content');
        var url = '/owner/pembayaran-supplier/update';
        $.ajax({
            type: 'POST',
            url: url,
            data: {
                _token: token,
                id : id
            },
            success: function(results){
                if (results.data.STATUS_PEMBAYARAN == 1){
                    $('#label-'+id).html('Sudah Bayar');
                    $('#label-'+id).removeClass('text-danger');
                    $('#label-'+id).addClass('text-success');
                    Swal.fire({
                      position: 'center',
                      icon: 'success',
                      title: 'Berhasil!',
                      text: 'Status Pembayaran berhasil disimpan.',
                      showConfirmButton: false,
                      timer: 2000
                    });
                }
                else {
                    $('#label-'+id).html('Belum Bayar');
                    $('#label-'+id).removeClass('text-success');
                    $('#label-'+id).addClass('text-danger');
                    Swal.fire({
                      position: 'center',
                      icon: 'success',
                      title: 'Berhasil!',
                      text: 'Status Pembayaran berhasil disimpan.',
                      showConfirmButton: false,
                      timer: 2000
                    });
                }
            }
        });
    });    
});