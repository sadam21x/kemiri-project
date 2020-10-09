$(document).ready(function() {

    // Efek menu aktif pada navbar menu
    const menu = document.getElementById("order-barang-menu");
    menu.classList.add("active");
 
    // Datatable
    const orderBarangTable = document.getElementById("order-barang-table");
    $(orderBarangTable).DataTable();

    // Element
    var El = '<div>' +
                '<span>KONFIRMASI</span>' +
                 '<i class="fas fa-check ml-1"></i>' +
            '</div>'

    $(".custom-konfirmasi").each(function(){
    	$(this).on("click",function(e){
            e.stopPropagation();
    		let id = $(this).attr("id");
    		var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
	    	$.ajax({
	            type: 'POST',
	            url: "/manajer-marketing/status-konfirmasi",
	            data:{
					_token: CSRF_TOKEN,
					ID_KONFIRMASI_PENJUALAN: id
	            },
	            success: function (results) {
	                if (results.success === true) {
						swal("Berhasil!", 
							"Status Konfirmasi berhasil disimpan!", 
                            "success");

                            let id_konfirmasi = $(".konfirmasi-"+id).attr("id").slice(11);
                            if(id_konfirmasi == id){
                                $(".konfirmasi-"+id).remove();
                            }

                            let id_label = $(".label-konfirmasi-"+id).attr("id").slice(17);
                            if(id_label == id){
                                $(".label-konfirmasi-"+id).append(El);
                            }
	                } else {
						swal("Gagal!", 
							"Status konfirmasi gagal disimpan!", 
							"error");
	                }

	            }
	        });
    	});
    });
});
