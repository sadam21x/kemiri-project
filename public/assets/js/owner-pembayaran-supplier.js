$(document).ready(function() {

    // Efek menu aktif pada navbar
    const menu = document.getElementById("pembayaran-supplier-menu");
    menu.classList.add("active");

    // datatable
    // $('.datatable-component').DataTable();

    $('.datatable-component').DataTable( {
        
        ajax:{
            type: 'GET',
            url: '/owner/pembayaran-supplier/get',
            dataSrc: 'data',
            success: function(results){
                data: results.data; 
                
            },
                columns: [ 
                    { data: 'TGL_PEMBAYARAN' } ,
                    { data: 'ID_PENERIMAAN' } ,
                    { data: 'STATUS_PEMBAYARAN'}
                ]
                
        }
    });

    $.ajax({
        type: 'GET',
        url: '/owner/pembayaran-supplier/get',
        dataSrc: 'data',
        success: function(results){
            data: results.data;
            
        }
    });

    // Modifikasi switch konfirmasi pembayaran
    $('.switch-bayar').change(function(e) {
        e.stopPropagation();
        var token = $('meta[name="csrf-token"]').attr('content');
        var url = '/owner/pembayaran-supplier/update';
        let id = $(this).attr('id').slice(17);
        $.ajax({
                    type: 'POST',
                    url: url,
                    data: {
                        _token: token,
                        id : id
                    },
                    success: function(results){
                        if (results.data.STATUS_PEMBAYARAN == 1){
        
                            // $('#label-'+id).html('Sudah Bayar');
                            // $('#label-'+id).removeClass('text-danger');
                            // $('#label-'+id).addClass('text-success');
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
                            // $('#label-'+id).html('Belum Bayar');
                            // $('#label-'+id).removeClass('text-success');
                            // $('#label-'+id).addClass('text-danger');
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

    // $('.switch-bayar').change(function(e) {
    //     e.stopPropagation();
    //     let id = $(this).attr('id').slice(17);
    //     var token = $('meta[name="csrf-token"]').attr('content');
    //     var url = '/owner/pembayaran-supplier/update';

    //     var tgl = document.getElementById("tanggal-"+id).value;
    //     var nama_supplier = document.getElementById("nama_supplier-"+id).value;
    //     console.log(tgl);

    //     let row = '<tr id="'+id+'">'+
    //                     '<td id="tanggal-'+id+'">'+tgl+'</td>'+
    //                     '<td id="nama_supplier-'+id+'">'+nama_supplier+'</td>'+
    //                     '<td id="status" class="text-success">Sudah Bayar</td>'+
    //                     '<td>'+
    //                         '<button type="button" class="btn btn-sm btn-linkedin" data-toggle="modal" data-target="#modal-detail-penerimaan-bahan-baku-'+id+'">'+
    //                             '<i class="fas fa-info-circle mr-2"></i>'+
    //                             'DETAIL'+
    //                         '</button>'+
    //                     '</td>'+
    //                 '</tr>';

    //     $.ajax({
    //         type: 'POST',
    //         url: url,
    //         data: {
    //             _token: token,
    //             id : id
    //         },
    //         success: function(results){
    //             if (results.data.STATUS_PEMBAYARAN == 1){
                    

    //                 $(".tabel-riwayat tbody").append(row);
    //                 document.getElementById("tanggal-"+id).html = tgl;
    //                 document.getElementById("nama_supplier-"+id).html = nama_supplier;
    //                 console.log(tgl);

                    // $('#label-'+id).html('Sudah Bayar');
                    // $('#label-'+id).removeClass('text-danger');
                    // $('#label-'+id).addClass('text-success');
                    // Swal.fire({
                    //   position: 'center',
                    //   icon: 'success',
                    //   title: 'Berhasil!',
                    //   text: 'Status Pembayaran berhasil disimpan.',
                    //   showConfirmButton: false,
                    //   timer: 2000
                    // });
                    // $("#"+id).remove();
        //         }
        //         else {
        //             $('#label-'+id).html('Belum Bayar');
        //             $('#label-'+id).removeClass('text-success');
        //             $('#label-'+id).addClass('text-danger');
        //             Swal.fire({
        //               position: 'center',
        //               icon: 'success',
        //               title: 'Berhasil!',
        //               text: 'Status Pembayaran berhasil disimpan.',
        //               showConfirmButton: false,
        //               timer: 2000
        //             });
        //         }
        //     }
        // });
    // });
    
});